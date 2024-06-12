<?php if (!defined('ABSPATH')) die('No direct access allowed!'); ?>
<?php
$cf_labels_txt = array (
'recurring' => __( 'Gutgeschriebene Affiliate-Zahlung für angemeldete Mitglieder (wiederkehrende Zahlungen):', $this->text_domain ),
'one_time'  => __( 'Gutgeschriebene Affiliate-Zahlung für Dauermitglied (Einmalzahlungen):', $this->text_domain ),
);

$payment_settings   = $this->get_options( 'payment_settings' );

$affiliate_settings['payment_settings']['recurring_cost'] = empty($payment_settings['recurring_cost']) ? 0 : $payment_settings['recurring_cost'];
$affiliate_settings['payment_settings']['one_time_cost']  = empty($payment_settings['one_time_cost']) ? 0 : $payment_settings['one_time_cost'];
$affiliate_settings['cf_labels_txt']                      = $cf_labels_txt;
$affiliate_settings['cost']                               = $this->get_options( 'affiliate_settings' );

?>

<div class="wrap">

	<?php $this->render_admin( 'navigation', array( 'page' => 'classifieds_settings', 'tab' => 'affiliate' ) ); ?>
	<?php $this->render_admin( 'message' ); ?>

	<h1><?php _e( 'Partnerprogramm Einstellungen', $this->text_domain ); ?></h1>
	<p class="description">
		<?php _e( 'Hier kannst Du die Belohnung für Deine Partner festlegen.', $this->text_domain ) ?>
	</p>
	<div class="postbox">
		<h3 class='hndle'><span><?php _e( 'Partnerprogramm', $this->text_domain ) ?></span></h3>
		<div class="inside">
			<?php if ( !class_exists( 'affiliateadmin' ) || !defined( 'AFF_CLASSIFIEDS_ADDON' ) ): ?>
			<p>
				<?php _e( 'Diese Funktion ist erst nach der Installation des <b>Affiliate-Plugins</b> und der Aktivierung der <b>Kleinanzeigen-Erweiterung</b> verfügbar.', $this->text_domain ) ?>
				<br />
				<?php printf ( __( 'Weitere Informationen zum Affiliate-Plugin erhältst Du <a href="%s" target="_blank">hier</a>.', $this->text_domain ), 'https://cp-psource.github.io/affiliate/' ); ?>
				<br /><br />

				<?php _e( 'Bitte aktiviere:', $this->text_domain ) ?>
				<br />
				<?php _e( '1. Das <b>Affiliate-Plugin</b>', $this->text_domain ) ?>
				<?php if ( class_exists( 'affiliate' ) ) _e( ' - <i>Erledigt</i>', $this->text_domain ); ?>
				<br />
				<?php _e( '2. Die <b>Kleinanzeigen-Erweiterung</b> im Affiliate-Plugin', $this->text_domain ) ?>
			</p>
			<?php endif;?>

			<?php do_action( 'classifieds_affiliate_settings', $affiliate_settings ); ?>

		</div>
	</div>

</div>
