<?php if (!defined('ABSPATH')) die('Kein direkter Zugriff erlaubt!'); ?>

<?php screen_icon('options-general'); ?>
<h2><?php echo sprintf( __('Kleinanzeigen Einstellungen %s', $this->text_domain), CF_VERSION);?></h2>

<h2>

	<?php if($page == 'kleinanzeigen_settings'): ?>

	<a class="nav-tab <?php if ( $tab == 'general' || empty($tab))  echo 'nav-tab-active'; ?>" href="<?php echo esc_attr('admin.php?page=kleinanzeigen_settings&tab=general');?>" ><?php _e( 'Allgemein', $this->text_domain ); ?></a>
	<a class="nav-tab <?php if ( $tab == 'capabilities' || empty($tab))  echo 'nav-tab-active'; ?>" href="<?php echo esc_attr('admin.php?page=kleinanzeigen_settings&tab=capabilities');?>" ><?php _e( 'Fähigkeiten', $this->text_domain ); ?></a>
	<a class="nav-tab <?php if ( $tab == 'payments' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_attr('admin.php?page=kleinanzeigen_settings&tab=payments'); ?>" ><?php _e( 'Zahlungen', $this->text_domain ); ?></a>
	<a class="nav-tab <?php if ( $tab == 'payment-types' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_attr('admin.php?page=kleinanzeigen_settings&tab=payment-types'); ?>"><?php _e( 'Bezahlmöglichkeiten', $this->text_domain ); ?></a>

	<?php if ( class_exists( 'affiliateadmin' ) ):?>
	<a id="dr-settings_affiliate" class="nav-tab <?php if ( $tab == 'affiliate' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_attr('admin.php?page=kleinanzeigen_settings&tab=affiliate');?>"><?php _e( 'Partnerprogramm', $this->text_domain ); ?></a>
	<?php endif; ?>


	<a class="nav-tab <?php if ( $tab == 'shortcodes' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_attr('admin.php?page=kleinanzeigen_settings&tab=shortcodes' ); ?>"><?php _e( 'Shortcodes', $this->text_domain ); ?></a>

	<?php endif; ?>

	<?php if( $page == 'kleinanzeigen_credits'):?>
	<a class="nav-tab <?php if ( $tab == 'my-credits' || empty( $tab) )  echo 'nav-tab-active'; ?>" href="<?php echo esc_attr('admin.php?page=kleinanzeigen_credits&tab=my-credits'); ?>" ><?php _e( 'Mein Guthaben', $this->text_domain ); ?></a>
	<?php
	$current_user = wp_get_current_user();
	if(! empty($current_user->ID) && $current_user->has_cap('manage_options')): ?>
	<a class="nav-tab <?php if ( $tab == 'send-credits' || empty( $tab) )  echo 'nav-tab-active'; ?>" href="<?php echo esc_attr('admin.php?page=kleinanzeigen_credits&tab=send-credits'); ?>" ><?php _e( 'Sende Guthaben', $this->text_domain ); ?></a>
	<?php endif; ?>

	<?php endif; ?>

</h2>

<div class="clear"></div>