<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://maakapay.com/employee/ashwin
 * @since             1.0.0
 * @package           Maakapay_Wordpress
 *
 * @wordpress-plugin
 * Plugin Name:       Maakapay Invoice Payer
 * Plugin URI:        https://maakapay.com/plugins/maakapay-invoice-payer
 * Description:       Intergate <strong>Nabil Bank</strong> Payment Gateway to wordpress for directly accepting the card <strong>Debit/Credit</strong>.
 * Version:           1.0.2
 * Author:            Maakapay
 * Author URI:        https://maakapay.com/employee/ashwin
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       maakapay-wordpress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MAAKAPAY_WORDPRESS_VERSION', '1.0.2' );
define( 'MAAKAPAY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-maakapay-wordpress-activator.php
 */
function activate_maakapay_wordpress() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-maakapay-wordpress-activator.php';
	Maakapay_Wordpress_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-maakapay-wordpress-deactivator.php
 */
function deactivate_maakapay_wordpress() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-maakapay-wordpress-deactivator.php';
	Maakapay_Wordpress_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_maakapay_wordpress' );
register_deactivation_hook( __FILE__, 'deactivate_maakapay_wordpress' );

add_action('activated_plugin','maakapay_error_log');

function maakapay_error_log() {
    file_put_contents(dirname(__file__).'/error_activation.txt', ob_get_contents());
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-maakapay-wordpress.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_maakapay_wordpress() {

	$plugin = new Maakapay_Wordpress();
	$plugin->run();

}
run_maakapay_wordpress();
