<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>

<?php $options = $this->get_options('checkout'); ?>

<div class="wrap">
	<?php if ( function_exists('screen_icon') ) screen_icon('options-general'); ?>

	<?php $this->render_admin( 'navigation', array( 'sub' => 'checkout' ) ); ?>

	<?php $this->render_admin( 'message' ); ?>

	<form action="#" method="post">
	<h1><?php _e( 'Kleinanzeigen Kasse', 'kleinanzeigen' ); ?></h1>

		<table class="form-table">
			<tr>
				<th>
					<label for="annual_cost"><?php _e('Jährliche Zahlungsoption', 'kleinanzeigen' ) ?></label>
				</th>
				<td>
					<input type="text" id="annual_cost" class="small-text" name="annual_cost" value="<?php if ( isset( $options['annual_cost'] ) ) echo $options['annual_cost']; ?>" />
					<span class="description"><?php _e( 'Kosten des "Jährlichen" Dienstes.', 'kleinanzeigen' ); ?></span>
					<br /><br />
					<input type="text" name="annual_txt" value="<?php if ( isset( $options['annual_txt'] ) ) echo $options['annual_txt']; ?>" />
					<span class="description"><?php _e( 'Text des "Jährlichen" Dienstes.', 'kleinanzeigen' ); ?></span>
				</td>
			</tr>
			<tr>
				<th>
					<label for="one_time_cost"><?php _e( 'Einmalige Zahlungsoption', 'kleinanzeigen' ) ?></label>
				</th>
				<td>
					<input type="text" id="one_time_cost" class="small-text" name="one_time_cost" value="<?php if ( isset( $options['one_time_cost'] ) ) echo $options['one_time_cost']; ?>" />
					<span class="description"><?php _e( 'Kosten für den "Einmaligen" Service.', 'kleinanzeigen' ); ?></span>
					<br /><br />
					<input type="text" name="one_time_txt" value="<?php if ( isset( $options['one_time_txt'] ) ) echo $options['one_time_txt']; ?>" />
					<span class="description"><?php _e( 'Text des "One Time"-Dienstes.', 'kleinanzeigen' ); ?></span>
				</td>
			</tr>
			<tr>
				<th>
					<label for="tos_txt"><?php _e('Text der Nutzungsbedingungen', 'kleinanzeigen' ) ?></label>
				</th>
				<td>
					<textarea name="tos_txt" id="tos_txt" rows="15" cols="50"><?php if ( isset( $options['tos_txt'] ) ) echo $options['tos_txt']; ?></textarea>
					<br />
					<span class="description"><?php _e( 'Text für "Nutzungsbedingungen"', 'kleinanzeigen' ); ?></span>
				</td>
			</tr>
		</table>

		<p class="submit">
			<?php wp_nonce_field('verify'); ?>
			<input type="hidden" name="key" value="checkout" />
			<input type="submit" class="button-primary" name="save" value="<?php _e( 'Änderungen speichern', 'kleinanzeigen' ); ?>" />
		</p>

	</form>

</div>