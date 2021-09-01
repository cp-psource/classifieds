<?php
/*
Plugin Name: Kleinanzeigen
Plugin URI: https://n3rds.work/docs/kleinanzeigen-handbuch/
Description: Füge Kleinanzeigen zu Deinem Blog, Netzwerk oder Deiner BuddyPress-Seite hinzu. Erstelle und verwalte Anzeigen, lade Bilder hoch, sende E-Mails, aktiviere das Kreditsystem und berechne Deinen Benutzern die Platzierung von Anzeigen in Deinem Netzwerk oder auf der BuddyPress-Seite.
Version: 2.4.0
Author: WMS N@W
Author URI: https://n3rds.work
License: GNU General Public License (Version 2 - GPLv2)
Text Domain: classifieds
Domain Path: /languages
Network: false
*/

$plugin_header_translate = array(
__('Kleinanzeigen - Füge Kleinanzeigen zu Deinem Blog, Netzwerk oder Deiner BuddyPress-Seite hinzu. Erstelle und verwalte Anzeigen, lade Bilder hoch, sende E-Mails, aktiviere das Kreditsystem und berechne Deinen Benutzern die Platzierung von Anzeigen in Deinem Netzwerk oder auf der BuddyPress-Seite.', 'classifieds'),
__('DerN3rd', 'classifieds'),
__('https://n3rds.work', 'classifieds'),
__('Kleinanzeigen', 'classifieds'),
);

/*
Authors - DerN3rd


Copyright 2012-2021 WMS N@W (https://n3rds.work)


This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License (Version 2 - GPLv2) as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
require 'plugin-update-checker/plugin-update-checker.php';
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://n3rds.work//wp-update-server/?action=get_metadata&slug=classifieds', 
	__FILE__, 
	'classifieds' 
);

/* Define plugin version */
define ( 'CF_VERSION', '2.4.0' );
define ( 'CF_DB_VERSION', '2.0' );

/* define the plugin folder url */
define ( 'CF_PLUGIN_URL', plugin_dir_url(__FILE__));
/* define the plugin folder dir */
define ( 'CF_PLUGIN_DIR', plugin_dir_path(__FILE__));
// The key for the options array
define( 'CF_TEXT_DOMAIN', 'classifieds' );
// The key for the options array
define( 'CF_OPTIONS_NAME', 'classifieds_options' );
// The key for the captcha transient
define( 'CF_CAPTCHA', 'cf_captcha_' );

// include core files
//If another version of CustomPress not loaded, load ours.
if(!class_exists('CustomPress_Core')) include_once 'core/custompress/loader.php';

register_deactivation_hook( __FILE__, function() {
        //Remove Classifieds custom post types and fields

        $ct_custom_post_types = get_site_option( 'ct_custom_post_types' );
        unset($ct_custom_post_types['classifieds']);
        update_site_option( 'ct_custom_post_types', $ct_custom_post_types );
        
        $ct_custom_post_types = get_option( 'ct_custom_post_types' );
        unset($ct_custom_post_types['classifieds']);
        update_option( 'ct_custom_post_types', $ct_custom_post_types );
        
        $ct_custom_taxonomies = get_site_option('ct_custom_taxonomies');
        unset($ct_custom_taxonomies['classifieds_tags']);
        update_site_option( 'ct_custom_taxonomies', $ct_custom_taxonomies );
        
        $ct_custom_taxonomies = get_option('ct_custom_taxonomies');
        unset($ct_custom_taxonomies['classifieds_tags']);
        update_option( 'ct_custom_taxonomies', $ct_custom_taxonomies );
        
        $ct_custom_taxonomies = get_site_option('ct_custom_taxonomies');
        unset($ct_custom_taxonomies['classifieds_categories']);
        update_site_option( 'ct_custom_taxonomies', $ct_custom_taxonomies );
        
        $ct_custom_taxonomies = get_option('ct_custom_taxonomies');
        unset($ct_custom_taxonomies['classifieds_categories']);
        update_option( 'ct_custom_taxonomies', $ct_custom_taxonomies );
        
        $ct_network_custom_fields = ( get_site_option( 'ct_custom_fields' ) );
        unset($ct_network_custom_fields['selectbox_4cf582bd61fa4'], $ct_network_custom_fields['text_4cfeb3eac6f1f']);
        update_site_option( 'ct_custom_fields', $ct_network_custom_fields );
        
        $ct_custom_fields = ( get_option( 'ct_custom_fields' ) );
        unset($ct_custom_fields['selectbox_4cf582bd61fa4'], $ct_custom_fields['text_4cfeb3eac6f1f']);
        update_option( 'ct_custom_fields', $ct_custom_fields );
        
        //Remove Virtual pages @todo
        
        flush_rewrite_rules();

} );

/* Load plugin files */
include_once 'core/core.php';
include_once 'core/payments.php';
include_once 'core/paypal-express-gateway.php';
include_once 'core/functions.php';