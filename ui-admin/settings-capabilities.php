<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>

<?php
$options = $this->get_options('general');

?>

<div class="wrap">

	<?php $this->render_admin( 'navigation', array( 'page' => 'kleinanzeigen_settings', 'tab' => 'capabilities' ) ); ?>
	<?php $this->render_admin( 'message' ); ?>

	<h1><?php _e( 'Einstellungen für Funktionen', 'kleinanzeigen' ); ?></h1>

	<form action="#" method="post" class="cf-general" >
		<div class="postbox">
			<h3 class='hndle'><span><?php _e( 'Fähigkeiten', 'kleinanzeigen' ) ?></span></h3>
			<div class="inside">
				<table class="form-table">
					<tr>
						<th>
							<label for="roles"><?php _e( 'Funktionen zuweisen', 'kleinanzeigen' ) ?></label>
							<img id="ajax-loader" alt="ajax-loader" src="<?php echo admin_url('images/loading.gif'); ?>" />
						</th>
						<td>
							<select id="roles" name="roles">
							<?php wp_dropdown_roles('administrator'); ?>
							</select>
							<br /><span class="description"><?php _e('Wähle eine Rolle aus, der Du Kleinanzeigen-Funktionen zuweisen möchtest.', 'kleinanzeigen'); ?></span>

							<br /><br />

							<div id="capabilities">
								<?php
								foreach ( $this->capability_map as $capability => $description ):
								?>
								<input type="checkbox" name="capabilities[<?php echo $capability; ?>]" id="<?php echo $capability; ?>" value="1" />
								<label for="<?php echo $capability; ?>"><span class="description"><?php echo $description; ?></span></label>
								<br />
								<?php endforeach; ?>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<p class="submit">
			<?php wp_nonce_field('verify'); ?>
			<input type="hidden" name="action" value="cf_save" />
			<input type="hidden" name="key" value="general" />
			<input type="submit" class="button-primary" name="save" value="Änderungen dieser Rolle speichern">
		</p>
	</form>
</div>

