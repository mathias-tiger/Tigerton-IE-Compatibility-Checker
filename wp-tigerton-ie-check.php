<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://lostwebdesigns.com
 * @since             1.0.0
 * @package           Wp_tigerton-ie-check
 *
 * @wordpress-plugin
 * Plugin Name:       Tigerton IE Check
 * Plugin URI:        http://www.tigerton.se
 * Description:       
 * Version:           1.0.0
 * Author:            Mathias Karlsson
 * Author URI:        http://www.tigerton.se
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-tigerton-ie-check
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-tigerton-ie-check-activator.php
 */
function activate_wp_tigerton_ie_check() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-tigerton-ie-check-activator.php';
	Wp_tigerton_ie_check_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-tigerton-ie-check-deactivator.php
 */
function deactivate_wp_tigerton_ie_check() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-tigerton-ie-check-deactivator.php';
	Wp_tigerton_ie_check_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_tigerton_ie_check' );
register_deactivation_hook( __FILE__, 'deactivate_wp_tigerton-ie-check' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-tigerton-ie-check.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_tigerton_ie_check() {

	$plugin = new Wp_tigerton_ie_check();
	$plugin->run();

}
run_wp_tigerton_ie_check();
