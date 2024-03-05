<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>

<?php $taxonomies = get_object_taxonomies( $this->post_type ); ?>

<?php $options = $this->get_options( 'general' ); ?>

<div class="wrap">
	<h2>
		<?php _e( 'Kleinanzeigen Dashboard', 'kleinanzeigen' ); ?>
		<a class="button add-new-h2" href="post-new.php?post_type=<?php echo $this->post_type; ?>"><?php _e( 'Neue Anzeige erstellen', 'kleinanzeigen' ); ?></a>
	</h2>

	<h3><?php _e( 'Aktive Anzeigen', 'kleinanzeigen' ); ?></h3>
	<table class="widefat">
		<thead>
			<tr>
				<th><?php _e( 'ID', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Titel', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Kategorien', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Haltbarkeitsdatum', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Bild', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Aktionen', 'kleinanzeigen' ); ?></th>
			</tr>
		</thead>
		<tbody>

			<?php $current_user = wp_get_current_user(); ?>
			<?php query_posts( array( 'author' => $current_user->ID, 'post_type' => array( $this->post_type ), 'post_status' => 'publish' ) ); ?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<tr>
				<td><?php the_ID(); ?></td>
				<td><?php the_title(); ?></td>
				<td><?php echo strip_tags(get_the_term_list(get_the_ID(), 'kleinanzeigen_categories', '',', ','') ); ?> </td>
				<td><?php echo $this->get_expiration_date( get_the_ID() ); ?></td>
				<td>
					<?php
					if ( '' == get_post_meta( get_the_ID(), '_thumbnail_id', true ) ) {
						if ( isset( $options['field_image_def'] ) && '' != $options['field_image_def'] )
						echo '<img width="16" height="16" title="no image" alt="no image" class="cf-no-image wp-post-image" src="' . $options['field_image_def'] . '">';
					} else {
						echo get_the_post_thumbnail( get_the_ID(), array( 16, 16 ) );
					}
					?>
				</td>
				<td>
				<a href="post.php?post=<?php the_ID(); ?>&amp;action=edit" class="action-links-<?php the_ID(); ?>"><?php _e( 'Anzeige bearbeiten', 'kleinanzeigen' ); ?></a> <span class="separators-<?php the_ID(); ?>"> | </span>
				<a href="javascript:kleinanzeigen.toggle_end('<?php the_ID(); ?>');" class="action-links-<?php the_ID(); ?>"><?php _e( 'Anzeige beenden', 'kleinanzeigen' ); ?></a> <span class="separators-<?php the_ID(); ?>"> | </span>
					<a href="javascript:kleinanzeigen.toggle_delete('<?php the_ID(); ?>');" class="action-links-<?php the_ID(); ?>"><?php _e( 'Anzeige löschen', 'kleinanzeigen' ); ?></a>
					<form action="#" method="post" id="form-<?php the_ID(); ?>" class="cf-form">
						<input type="hidden" name="action" value="" />
						<input type="hidden" name="post_id" value="<?php the_ID(); ?>" />
						<input type="submit" class="button confirm" value="<?php _e( 'Bestätige', 'kleinanzeigen' ); ?>" name="confirm" />
						<input type="submit" class="button cancel"  value="<?php _e( 'Abbrechen', 'kleinanzeigen' ); ?>" onclick="kleinanzeigen.cancel('<?php the_ID(); ?>'); return false;" />
					</form>
				</td>
			</tr>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>

		</tbody>
	</table>

	<h3><?php _e( 'Gespeicherte Anzeigen', 'kleinanzeigen' ); ?></h3>
	<table class="widefat">
		<thead>
			<tr>
				<th><?php _e( 'ID', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Titel', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Kategorien', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Haltbarkeitsdatum', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Bild', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Aktionen', 'kleinanzeigen' ); ?></th>
			</tr>
		</thead>
		<tbody>

			<?php $current_user = wp_get_current_user(); ?>
			<?php query_posts( array( 'author' => $current_user->ID, 'post_type' => array( $this->post_type ), 'post_status' => 'draft' ) ); ?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<tr>
				<td><?php the_ID(); ?></td>
				<td><?php the_title(); ?></td>
				<td><?php echo strip_tags(get_the_term_list(get_the_ID(), 'kleinanzeigen_categories', '',', ','') ); ?> </td>
				<td><?php echo $this->get_expiration_date( get_the_ID() ); ?></td>
				<td>
					<?php
					if ( '' == get_post_meta( get_the_ID(), '_thumbnail_id', true ) ) {
						if ( isset( $options['field_image_def'] ) && '' != $options['field_image_def'] )
						echo '<img width="16" height="16" title="no image" alt="no image" class="cf-no-image wp-post-image" src="' . $options['field_image_def'] . '">';
					} else {
						echo get_the_post_thumbnail( get_the_ID(), array( 16, 16 ) );
					}
					?>
				</td>
				<td>
				<a href="post.php?post=<?php the_ID(); ?>&amp;action=edit" class="action-links-<?php the_ID(); ?>"><?php _e( 'Anzeige bearbeiten', 'kleinanzeigen' ); ?></a> <span class="separators-<?php the_ID(); ?>"> | </span>
				<a href="javascript:kleinanzeigen.toggle_publish('<?php the_ID(); ?>');" class="action-links-<?php the_ID(); ?>"><?php _e( 'Anzeige veröffentlichen', 'kleinanzeigen' ); ?></a> <span class="separators-<?php the_ID(); ?>"> | </span>
					<a href="javascript:kleinanzeigen.toggle_delete('<?php the_ID(); ?>');" class="action-links-<?php the_ID(); ?>"><?php _e( 'Anzeige löschen', 'kleinanzeigen' ); ?></a>
					<form action="#" method="post" id="form-<?php the_ID(); ?>" class="cf-form">
						<input type="hidden" name="action" value="" />
						<input type="hidden" name="post_id" value="<?php the_ID(); ?>" />

					<?php
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
						?>
						<option value="<?php echo $field_option; ?>"><?php  echo sprintf(__('%s', 'kleinanzeigen'), $field_option); ?></option>
						<?php endforeach; ?>
					</select>
						<input type="submit" class="button confirm" value="<?php _e( 'Bestätige', 'kleinanzeigen' ); ?>" name="confirm" />
						<input type="submit" class="button cancel"  value="<?php _e( 'Abbrechen', 'kleinanzeigen' ); ?>" onclick="javascript:kleinanzeigen.cancel('<?php the_ID(); ?>'); return false;" />
					</form>
				</td>
			</tr>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>

		</tbody>
	</table>

	<h3><?php _e( 'Beendete Anzeigen', 'kleinanzeigen' ); ?></h3>
	<table class="widefat">
		<thead>
			<tr>
				<th><?php _e( 'ID', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Titel', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Kategorien', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Haltbarkeitsdatum', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Bild', 'kleinanzeigen' ); ?></th>
				<th><?php _e( 'Aktionen', 'kleinanzeigen' ); ?></th>
			</tr>
		</thead>
		<tbody>

			<?php $current_user = wp_get_current_user(); ?>
			<?php query_posts( array( 'author' => $current_user->ID, 'post_type' => array( $this->post_type ), 'post_status' => 'private' ) ); ?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<tr>
				<td><?php the_ID(); ?></td>
				<td><?php the_title(); ?></td>
				<td><?php echo strip_tags(get_the_term_list(get_the_ID(), 'kleinanzeigen_categories', '',', ','') ); ?> </td>
				<td><?php echo $this->get_expiration_date( get_the_ID() ); ?></td>
				<td>
					<?php
					if ( '' == get_post_meta( get_the_ID(), '_thumbnail_id', true ) ) {
						if ( isset( $options['field_image_def'] ) && '' != $options['field_image_def'] )
						echo '<img width="16" height="16" title="no image" alt="no image" class="cf-no-image wp-post-image" src="' . $options['field_image_def'] . '">';
					} else {
						echo get_the_post_thumbnail( get_the_ID(), array( 16, 16 ) );
					}
					?>
				</td>
				<td>
				<a href="post.php?post=<?php the_ID(); ?>&action=edit" class="action-links-<?php the_ID(); ?>"><?php _e( 'Anzeige bearbeiten', 'kleinanzeigen' ); ?></a> <span class="separators-<?php the_ID(); ?>"> | </span>
				<a href="javascript:kleinanzeigen.toggle_publish('<?php the_ID(); ?>');" class="action-links-<?php the_ID(); ?>"><?php _e( 'Anzeige erneuern', 'kleinanzeigen' ); ?></a> <span class="separators-<?php the_ID(); ?>"> | </span>
					<a href="javascript:kleinanzeigen.toggle_delete('<?php the_ID(); ?>');" class="action-links-<?php the_ID(); ?>"><?php _e( 'Anzeige löschen', 'kleinanzeigen' ); ?></a>
					<form action="#" method="post" id="form-<?php the_ID(); ?>" class="cf-form">
						<input type="hidden" name="action" value="" />
						<input type="hidden" name="post_id" value="<?php the_ID(); ?>" />
					<?php
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
						?>
						<option value="<?php echo $field_option; ?>"><?php  echo sprintf(__('%s', 'kleinanzeigen'), $field_option); ?></option>
						<?php endforeach; ?>
					</select>
						<input type="submit" class="button confirm" value="<?php _e( 'Bestätige', 'kleinanzeigen' ); ?>" name="confirm" />
						<input type="submit" class="button cancel"  value="<?php _e( 'Abbrechen', 'kleinanzeigen' ); ?>" onclick="javascript:kleinanzeigen.cancel('<?php the_ID(); ?>'); return false;" />
					</form>
				</td>
			</tr>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>

		</tbody>
	</table>
</div>