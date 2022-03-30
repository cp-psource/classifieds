<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>

<?php
/**
* The template for displaying BuddyPress Classifieds component - My Credits page.
* You can override this file in your active theme.
*
* @package Classifieds
* @subpackage UI Front BuddyPress
* @since Classifieds 2.0
*/

$options = $this->get_options('payments');

?>

<div class="profile">

	<!-- Begin My Credits -->

	<div class="my-credits">

		<h3><?php _e( 'Verfügbares Kleinanzeigen-Guthaben', 'kleinanzeigen' ); ?></h3>
		<table class="form-table">
			<tr>
				<th>
					<label for="available_credits"><?php _e('Verfügbares Guthaben', 'kleinanzeigen' ) ?></label>
				</th>
				<td>
					<input type="text" id="available_credits" size="5" class="small-text" name="available_credits" value="<?php echo $this->transactions->credits; ?>" disabled="disabled" />
					<span class="description"><?php _e( 'Dein derzeit verfügbares Guthaben.', 'kleinanzeigen' ); ?></span>
				</td>
			</tr>
		</table>

		<h3><?php _e( 'Kaufe zusätzliches Kleinanzeigen-Guthaben', 'kleinanzeigen' ); ?></h3>
		<table class="form-table">
			<tr>
				<th>
					<label><?php _e('Kaufe zusätzliches Kleinanzeigen-Guthaben', 'kleinanzeigen' ) ?></label>
				</th>
				<td>
					<p class="submit">
						<?php echo do_shortcode('[cf_checkout_btn text="' . __('Kleinanzeigen-Guthaben kaufen', 'kleinanzeigen') . '" ]'); ?>
					</p>
				</td>
			</tr>
		</table>

		<?php $credits_log = $this->transactions->credits_log; ?>
		<h3><?php _e( 'Kaufhistorie', 'kleinanzeigen' ); ?></h3>
		<?php if ( is_array( $credits_log ) ): ?>
		<table class="form-table">
			<?php foreach ( $credits_log as $log ): ?>
			<tr>
				<th>
					<label for="available_credits"><?php _e('Kaufdatum:', 'kleinanzeigen' ) ?> <?php echo $this->format_date( $log['date'] ); ?></label>
				</th>
				<td>
					<input type="text" id="available_credits" size="5" class="small-text" name="available_credits" value="<?php echo $log['credits']; ?>" disabled="disabled" />
					<span class="description"><?php _e( 'Kleinanzeigen Guthaben gekauft.', 'kleinanzeigen' ); ?></span>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php else: ?>
		<?php echo $credits_log; ?>
		<?php endif; ?>
	</div>

</div>