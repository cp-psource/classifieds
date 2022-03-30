<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>
<?php
$cf_labels_txt = array (
'recurring' => __( 'Affiliate-Zahlung für unterzeichnetes Mitglied gutgeschrieben (wiederkehrende Zahlungen):', 'kleinanzeigen' ),
'one_time'  => __( 'Affiliate-Zahlung für Dauermitglied gutgeschrieben (einmalige Zahlungen):', 'kleinanzeigen' ),
);

$payment_settings   = $this->get_options( 'payment_settings' );

$affiliate_settings['payment_settings']['recurring_cost'] = empty($payment_settings['recurring_cost']) ? 0 : $payment_settings['recurring_cost'];
$affiliate_settings['payment_settings']['one_time_cost']  = empty($payment_settings['one_time_cost']) ? 0 : $payment_settings['one_time_cost'];
$affiliate_settings['cf_labels_txt']                      = $cf_labels_txt;
$affiliate_settings['cost']                               = $this->get_options( 'affiliate_settings' );

?>

<div class="wrap">

	<?php $this->render_admin( 'navigation', array( 'page' => 'kleinanzeigen_settings', 'tab' => 'affiliate' ) ); ?>
	<?php $this->render_admin( 'message' ); ?>

	<h1><?php _e( 'Affiliate-Einstellungen', 'kleinanzeigen' ); ?></h1>
	<p class="description">
		<?php _e( 'Hier kannst Du die Belohnung für Deine Partner festlegen.', 'kleinanzeigen' ) ?>
	</p>
	<div class="postbox">
		<h3 class='hndle'><span><?php _e( 'Affiliate', 'kleinanzeigen' ) ?></span></h3>
		<div class="inside">
			<?php if ( !class_exists( 'affiliateadmin' ) || !defined( 'AFF_CLASSIFIEDS_ADDON' ) ): ?>
			<p>
				<?php _e( 'Diese Funktion wird erst nach der Installation des <b>Affiliate-Plugins</b> und der Aktivierung des <b>Kleinanzeigen-Add-Ons</b> dort verfügbar sein.', 'kleinanzeigen' ) ?>
				<br />
				<?php printf ( __( 'Weitere Informationen zum Affiliate-Plugin erhältst Du <a href="%s" target="_blank">hier</a>.', 'kleinanzeigen' ), 'https://n3rds.work/piestingtal_source/ps-affiliate-plugin/' ); ?>
				<br /><br />

				<?php _e( 'Bitte aktiviere:', 'kleinanzeigen' ) ?>
				<br />
				<?php _e( '1. Das <b>Affiliate Plugin</b>', 'kleinanzeigen' ) ?>
				<?php if ( class_exists( 'affiliate' ) ) _e( ' - <i>Vollendet</i>', 'kleinanzeigen' ); ?>
				<br />
				<?php _e( '2. Das <b>Kleinanzeigen-Add-on</b> im Affiliate-Plugin', 'kleinanzeigen' ) ?>
			</p>
			<?php endif;?>

			<?php do_action( 'kleinanzeigen_affiliate_settings', $affiliate_settings ); ?>

		</div>
	</div>

</div>
