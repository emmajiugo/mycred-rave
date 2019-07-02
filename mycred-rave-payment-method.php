<?php

/**
 * Plugin Name: myCRED Rave Payment Method
 * Description: Official myCRED payment gateway for Rave.
 * Version: 1.0.0
 * Author: Chigbo Ezejiugo
 * Author URI: http://github.com/emmajiugo
 * Requires at least: 3.0.1
 * Tested up to: 5.2
 *
 * Domain Path: /i18n/languages/
 */
require_once 'includes/classes/Autoload.php';
require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
if (is_plugin_active('mycred/mycred.php')) {
    
    add_filter('mycred_setup_gateways', 'register_custom_gateway');

    function register_custom_gateway($gateways) {
		
		$gateways['rave'] = array(
			'title'         => __('Rave Payment'),
			'documentation' => 'http://rave.flutterwave.com',
			'callback'      => array( 'myCRED_Rave' ),
			'icon'          => 'dashicons-admin-generic',
			'sandbox'       => true,
			'external'      => true,
			'custom_rate'   => true
		);

		return $gateways;

	}
}