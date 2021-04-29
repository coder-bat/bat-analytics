<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       coder-bat.com
 * @since      1.0.0
 *
 * @package    Bat_Analytics
 * @subpackage Bat_Analytics/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bat_Analytics
 * @subpackage Bat_Analytics/includes
 * @author     Viral <harekrsna.viral@gmail.com>
 */
class Bat_Analytics_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bat-analytics',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
