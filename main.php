<?php
/*
 * Plugin Name: WC Postcode Names
 * Plugin URI: https://www.enigmaweb.com.au
 * Description: Allows you to specify shipping zone names in WooCommerce using WooCommerce Postcodes
 * Author: Enigma Web
 * Author URI: https://www.enigmaweb.com.au
 * Version: 1.0
 */
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
include( ABSPATH . 'wp-content\plugins\woocommerce\includes\class-wc-shipping-zones.php' );
include 'includes/WCPostCodes.php';

$postcodes = null;
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	register_activation_hook( plugin_basename( 'wc-postcode-names\main.php' ), array( $this, 'onActivation' ) );
	add_action( 'admin_menu', 'adminMenu' );
} else {
	deactivate_plugins( plugin_basename( 'wc-postcode-names\main.php' ) );
	errorMsg( 'Shipping Zones plugin requires WooCommerce to be activated in order to work. Please install and 
	activate WooCommerce and then try again.', 'deactivated' );
}

function errorMsg( $message, $identifier ) {
	echo '<div class="notice notice-error is-dismissible">';
	echo '<p>' . __( $message,
			'wc-postcode-names-' . $identifier ) . '</p>';
	echo '</div>';
}

function onActivation() {
	
	
}

function adminMenu() {
	add_submenu_page(
		'woocommerce' //Parent Slug
		, 'Shipping Zones' //Page Title
		, 'Shipping Zones' //Menu Title
		, 'manage_options'  // User Capability
		, 'shipping_zones' // Menu slug
		, 'pluginPage' // Call back function
	);
}

function pluginPage() {
	$postcodes = new WCPostCodes();
	echo '<pre>';
	print_r( $postcodes->PostcodeToShipzones() );
	echo '</pre>';
	
}

