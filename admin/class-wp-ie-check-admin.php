<?php
/**
 * The admin-specific functionality of the plugin.
 * Defines the plugin name, version, and functions
 *
 * @author     Mathias Carlsson <info@mathiascarlsson.se>
 */
class WP_ie_check_Admin {

	// The ID of this plugin.
	private $plugin_name;

	// The version of this plugin.
	private $version;

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name 	= $plugin_name;
		$this->version 		= $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 */
	public function enqueue_styles() {
		
		//This function is provided for demonstration purposes only.
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-ie-check-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts() {
		
		//This function is provided for demonstration purposes only.
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-ie-check-admin.js', array( 'jquery' ), $this->version, true );
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 */
	public function add_plugin_admin_menu() {
		/*
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 */
		add_options_page( 'IE Checker Setup', 'IE Checker', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
		);
	}

	 /**
	 * Add settings action link to the plugins page.
	 */
	public function add_action_links( $links ) {
		/*
		 *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
		 */
		$settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge(  $settings_link, $links );
	}

	/**
	 * Render the settings page for this plugin.
	 */
	public function display_plugin_setup_page() {
		include_once( 'partials/wp-ie-check-admin-display.php' );
	}

	/**
	*  Save the plugin options
	*/
	public function options_update() {
		register_setting( $this->plugin_name, $this->plugin_name, array($this, 'validate') );
	}


	/**
	 * Validate all options fields
	 */
	public function validate($input) {
		$valid = array();

		// validation/sanitize
		$valid['check_always'] 			= ( isset($input['check_always']) && !empty($input['check_always']) ) ? 1 : 0;
		$valid['check_never_again'] 	= ( isset($input['check_never_again']) && !empty($input['check_never_again']) ) ? 1 : 0;
		$valid['css_off'] 				= ( isset($input['css_off']) && !empty($input['css_off']) ) ? 1 : 0;
		$valid['debug'] 				= ( isset($input['debug']) && !empty($input['debug']) ) ? 1 : 0;
		$valid['check_only_on'] 		= intval( $input['check_only_on'] );
		$valid['popup_title'] 			= sanitize_text_field($input['popup_title']);
		$valid['popup_text'] 			= sanitize_text_field($input['popup_text']);
		
		return $valid;
	}
}