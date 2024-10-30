<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://maakapay.com/employee/ashwin
 * @since      1.0.0
 *
 * @package    Maakapay_Wordpress
 * @subpackage Maakapay_Wordpress/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Maakapay_Wordpress
 * @subpackage Maakapay_Wordpress/includes
 * @author     Babin (Ashwin) Rana <ashwin@maakapay.com>
 */
class Maakapay_Wordpress_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'maakapay-wordpress',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
