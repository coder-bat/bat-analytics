<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       coder-bat.com
 * @since      1.0.0
 *
 * @package    Bat_Analytics
 * @subpackage Bat_Analytics/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bat_Analytics
 * @subpackage Bat_Analytics/public
 * @author     Viral <harekrsna.viral@gmail.com>
 */
class Bat_Analytics_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action('wp_ajax_home-page', 'wpse_track_home_page');
		add_action('wp_ajax_nopriv_track-home-page', 'wpse_track_home_page');
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bat_Analytics_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bat_Analytics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/bat-analytics-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bat_Analytics_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bat_Analytics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/bat-analytics-public.js', array('jquery'), $this->version, true);
		wp_localize_script('my-plugin-public', 'my-plugin', array('ajax_url' => admin_url('admin-ajax.php')));
	}

	public function wpse_track_home_page()
	{
		$options = get_option('bat-analytics');

		// reset all options
		// $options = [];
		// update_option('bat-analytics', $options);

		$single_option = $_POST['option'];
		$old_val = 0;
		$date = date("d-m-Y");
		if (!isset($options)) {
			$options = [];
		} else if (!isset($options[$date])) {
			$options[$date] = [];
		} else if (!isset($options[$date][$single_option])) {
			$options[$date][$single_option] = $old_val;
		}
		$old_val = intval($options[$date][$single_option]);

		$new_val = $old_val + 1;
		$options[$date][$single_option] = $new_val;
		update_option('bat-analytics', $options);
		die(json_encode(
			array(
				'success' => true,
				'message' => 'Database updated successfully.'
			)
		));
	}
}
