<?php
/*
 * Plugin Name: Postcodes to Ship Zones
 * Plugin URI: https://www.enigmaweb.com.au
 * Description: Allows you to specify shipping zone names in WooCommerce using WooCommerce Postcodes
 * Author: Enigma Web
 * Author URI: https://www.enigmaweb.com.au
 * Version: 1.0
 * Text Domain: wc-pc-to-sz
 */

/**
 * The Class handles the libraries and functions required for the class SRS.
 */
public class PostCodesToShipZones{
	/**
	 * PostCodesToShipZones constructor.
	 */
	public function __construct() {
		$this->onActive();
	}
	
	
	/**
	 * The method defines what actions to take when the plugin is Activated
	 * @method onActive
	 *
	 */
	public function onActive(){
		
	}
	
}
$wooPostcodeToShipZones = new PostCodesToShipZones();
