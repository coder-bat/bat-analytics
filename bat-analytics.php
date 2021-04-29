<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              coder-bat.com
 * @since             1.0.0
 * @package           Bat_Analytics
 *
 * @wordpress-plugin
 * Plugin Name:       Bat Analytics
 * Plugin URI:        bat-analytics
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Viral
 * Author URI:        coder-bat.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bat-analytics
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
define( 'BAT_ANALYTICS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bat-analytics-activator.php
 */
function activate_bat_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bat-analytics-activator.php';
	Bat_Analytics_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bat-analytics-deactivator.php
 */
function deactivate_bat_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bat-analytics-deactivator.php';
	Bat_Analytics_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bat_analytics' );
register_deactivation_hook( __FILE__, 'deactivate_bat_analytics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bat-analytics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bat_analytics() {

	$plugin = new Bat_Analytics();
	$plugin->run();

}
run_bat_analytics();
