<?php
/**
* The template for displaying My Classifieds page.
* You can override this file in your active theme.
*
* @package Classifieds
* @subpackage UI Front
* @since Classifieds 2.0
*/

global $current_user, $wp_query;

$current_user = wp_get_current_user();
$error = get_query_var('cf_error');

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$options_general = $this->get_options( 'general' );

$query_args = array(
'paged' => $paged,
'post_type' => 'kleinanzeigen',
'author' => $current_user->ID,
//'posts_per_page' => 1000,
);

if(isset($_GET['saved']) ) {
	$query_args['post_status'] = array('draft', 'pending');
	$sub = 'saved';
}elseif(isset($_GET['ended'])){
	$query_args['post_status'] = 'private';
	$sub = 'ended';
}else{
	$query_args['post_status'] = 'publish';
	$sub = 'active';
}

query_posts($query_args);

$cf_path = get_permalink($this->meine_kleinanzeigen_page_id);

remove_filter('the_content', array(&$this, 'meine_kleinanzeigen_content'));

?>

<script type="text/javascript" src="<?php echo $this->plugin_url . 'ui-front/js/ui-front.js'; ?>" >
</script>


<?php if ( !empty( $error ) ): ?>
<br /><div class="error"><?php echo $error . '<br />'; ?></div>
<?php endif; ?>

<div class="clear"></div>
<?php if ( $this->is_full_access() ): ?>
<div class="av-credits"><?php _e( 'Du hast Zugriff, um neue Anzeigen zu erstellen', 'kleinanzeigen' ); ?></div>
<?php elseif($this->use_credits): ?>
<div class="av-credits"><?php _e( 'Verfügbare Credits:', 'kleinanzeigen' ); ?> <?php echo $this->transactions->credits; ?></div>
<?php else:
echo do_shortcode('[cf_checkout_btn text="' . __('Anzeigen kaufen', 'kleinanzeigen') . '" view="loggedin"]');
?>
<?php endif; ?>

<div >
	<?php echo do_shortcode('[cf_add_kleinanzeige_btn text="' . __('Neue Kleinanzeige erstellen', 'kleinanzeigen') . '" view="loggedin"]'); ?>
	<?php echo do_shortcode('[cf_my_credits_btn text="' . __('Mein Guthaben', 'kleinanzeigen') . '" view="loggedin"]'); ?>
</div>

<ul class="cf_tabs">
	<li class="<?php if ( $sub == 'active') echo 'cf_active'; ?>"><a href="<?php echo $cf_path . '/?active'; ?>"><?php _e( 'Aktive Anzeigen', 'kleinanzeigen' ); ?></a></li>
	<li class="<?php if (  $sub == 'saved') echo 'cf_active'; ?>"><a href="<?php echo $cf_path . '/?saved'; ?>"><?php _e( 'Gespeicherte Anzeigen', 'kleinanzeigen' ); ?></a></li>
	<li class="<?php if (  $sub == 'ended') echo 'cf_active'; ?>"><a href="<?php echo $cf_path . '/?ended'; ?>"><?php _e( 'Beendete Anzeigen', 'kleinanzeigen' ); ?></a></li>
</ul>
<div class="clear"></div>
<?php if ( !have_posts() ): ?>
<br /><br />
<div class="info" id="message">
	<p><?php _e( 'Keine Kleinanzeigen gefunden.', 'kleinanzeigen' ); ?></p>
</div>
<?php endif; ?>

<div class="cf_tab_container">

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php echo $this->pagination( $this->pagination_top ); ?>

	<?php while ( have_posts() ) : the_post(); ?>
	<?php // cf_debug( $wp_query ); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<div class="cf-ad">
			<div class="cf-pad">
				<div class="cf-image">
					<?php
					if ( '' == get_post_meta( get_the_ID(), '_thumbnail_id', true ) ) {
						if ( ! empty( $options_general['field_image_def'] ) )
						echo '<img width="150" height="150" title="no image" alt="no image" class="cf-no-image wp-post-image" src="' . $options_general['field_image_def'] . '">';
					} else {
						echo get_the_post_thumbnail( get_the_ID(), 'medium' );
					}
					?>
				</div>
				<div class="cf-info">
					<table>
						<tr>
							<th><?php _e( 'Titel', 'kleinanzeigen' ); ?></th>
							<td>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Kategorien', 'kleinanzeigen' ); ?></th>
							<td>
								<?php $taxonomies = get_object_taxonomies( 'kleinanzeigen', 'names' ); ?>
								<?php foreach ( $taxonomies as $taxonomy ): ?>
								<?php echo get_the_term_list( get_the_ID(), $taxonomy, '', ', ', '' ) . ' '; ?>
								<?php endforeach; ?>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Läuft ab', 'kleinanzeigen' ); ?></th>
							<td><?php echo $this->get_expiration_date( get_the_ID() ); ?></td>
						</tr>
					</table>
				</div>

				<form action="#" method="post" id="action-form-<?php the_ID(); ?>" class="action-form">
					<?php wp_nonce_field('verify'); ?>
					<input type="hidden" name="post_id" value="<?php the_ID(); ?>" />
					<input type="hidden" name="url" value="<?php the_permalink(); ?>" />
					<?php
					if(current_user_can('edit_kleinanzeige', get_the_ID())){
						echo do_shortcode('[cf_edit_kleinanzeige_btn text="' . __('Anzeige bearbeiten', 'kleinanzeigen') . '" view="always" post="' . get_the_ID() . '"]');
					}
					?>

					<?php if ( isset( $sub ) && $sub == 'active' ): ?>
					<button type="submit" name="end" value="<?php _e('Anzeige beenden', 'kleinanzeigen' ); ?>" onclick="kleinanzeigen.toggle_end('<?php the_ID(); ?>'); return false;" ><?php _e('Anzeige beenden', 'kleinanzeigen' ); ?></button>
					<?php elseif ( isset( $sub ) && ( $sub == 'saved' || $sub == 'ended' ) ): ?>
					<button type="submit" name="renew" value="<?php _e('Anzeige erneuern', 'kleinanzeigen' ); ?>" onclick="kleinanzeigen.toggle_renew('<?php the_ID(); ?>'); return false;" ><?php _e('Anzeige erneuern', 'kleinanzeigen' ); ?></button>
					<?php endif; ?>

					<?php if(current_user_can( 'delete_kleinanzeigen' )): ?>
					<button type="submit" name="delete" value="<?php _e('Anzeige löschen', 'kleinanzeigen' ); ?>" onclick="kleinanzeigen.toggle_delete('<?php the_ID(); ?>'); return false;" ><?php _e('Anzeige löschen', 'kleinanzeigen' ); ?></button>
					<?php endif; ?>
				</form>

				<form action="#" method="post" id="confirm-form-<?php the_ID(); ?>" class="confirm-form">
					<?php wp_nonce_field('verify'); ?>
					<input type="hidden" name="action" />
					<input type="hidden" name="post_id" value="<?php the_ID(); ?>" />
					<input type="hidden" name="post_title" value="<?php the_title(); ?>" />

					<span id="cf-delete-<?php the_ID(); ?>"><?php _e('Anzeige löschen', 'kleinanzeigen' ); ?></span>
					<span id="cf-renew-<?php the_ID(); ?>"><?php _e('Anzeige erneuern', 'kleinanzeigen' ); ?></span>
					<span id="cf-end-<?php the_ID(); ?>"><?php _e('Anzeige beenden', 'kleinanzeigen' ); ?></span>
					<?php if ( isset( $sub ) && ( $sub == 'saved' || $sub == 'ended' ) ):
					$cf_payments = $this->get_options('payments');

					//Get the duration options
					global $CustomPress_Core;
					if(isset($CustomPress_Core)){
						$durations = $CustomPress_Core->all_custom_fields['selectbox_4cf582bd61fa4']['field_options'];
					}
					?>
					<select name="duration">
						<?php
						//make duration options
						foreach ( $durations as $key => $field_option ):
						if( empty($field_option ) ) continue;
						if($this->use_credits):
						?>
						<option value="<?php echo $field_option; ?>"><?php echo sprintf(__('%s für %s Guthaben', 'kleinanzeigen'), $field_option, round($field_option + 0) * $cf_payments['credits_per_week']); ?></option>
						<?php else: ?>
						<option value="<?php echo $field_option; ?>"><?php echo $field_option; ?></option>
						<?php endif; ?>
						<?php endforeach; ?>
					</select>
					<?php endif; ?>
					<input type="submit" class="button confirm" value="<?php _e( 'Bestätige', 'kleinanzeigen' ); ?>" name="confirm" />
					<input type="submit" class="button cancel"  value="<?php _e( 'Abbrechen', 'kleinanzeigen' ); ?>" onclick="kleinanzeigen.cancel('<?php the_ID(); ?>'); return false;" />
				</form>
			</div>
		</div>
	</div><!-- #post-## -->
	<div class="clear"></div>

	<?php endwhile; ?>
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php echo $this->pagination( $this->pagination_bottom ); ?>
</div><!-- .cf_tab_container -->
<?php
if(is_object($wp_query)) $wp_query->post_count = 0;
?>
<!-- End my Classifieds -->
