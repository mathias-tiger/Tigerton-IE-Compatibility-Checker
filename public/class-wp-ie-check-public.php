<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and functions
 *
 * Also the functions for setting and updating cookies,
 * checking for IE mode and show the popup.
 *
 * @author     Mathias Carlsson <info@mathiascarlsson.se>
 */
class WP_ie_check_Public {
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
        
        $this->wp_ie_check_options = get_option($this->plugin_name);
    }

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_styles() {
		 
		// If the option to turn off this plugin css is not checked, load css. 
		if( !get_option($this->plugin_name)['css_off'] ){
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-ie-check-public.css', array(), $this->version, 'all' );
		}	
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_scripts() {
				 
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-ie-check-public.js', array( 'jquery' ), $this->version, true );	
	}
	
    /**
	 * Check the options and set cookie accordingly
	 */
    public function wp_ie_cookie() {

		$cookie_time = strtotime( '+14 days' );
	    
	    // if the cookie dont exist and the selected page type is shown
	    if( !isset($_COOKIE['site_visitor']) && get_option($this->plugin_name)['check_only_on'] ) {
		    $cookie_value = "new";
		    setcookie( 'site_visitor', $cookie_value, $cookie_time, '/', COOKIE_DOMAIN);
	    }
	}
	
	 /*
	 * Returns true or false based on what page you are on.    
	 */
    public function wp_ie_checkPage() {
	  $check_only_on  = get_option($this->plugin_name)['check_only_on'];
    
    	switch($check_only_on) {
	    	case 1: $page = true;
	    		break;
	    	case 2:
	    		$page = is_front_page();
	    		break;
	    	case 3:
	    		$page = is_home();
	    		break;
	    	case 4:
	    		$page = is_search();
	    		break;
	    	case 5:
	    		$page = is_single();
	    		break;
	    	case 6:
	    		$page = is_page();
	    		break;
    		case 7:
    			$page = is_tag();
				break;
			case 8:
	    		$page = is_tax();
				break;
    		case 9:
	    		$page = is_archive();
	    		break; 
	    	default:
	    		$page = false;
    	}
    	return $page;
	}
	
	/**
	 * check options, cookie, and if IE mode, chooses to display popup or not.
	 */
    public function WP_ie_add_popup_code() {
	    $options   	= get_option($this->plugin_name);
    	$page 		= $this->WP_ie_checkPage();
    	 
    	// If the page is the page you want to check
    	if( $page ){

    		if( $options['debug'] ) {
				include_once( 'partials/wp-ie-check-public-display.php' );
				return;
			}
	    	
		    // if notset OR is new OR check always is on.
		    if (  !isset($_COOKIE['site_visitor']) || $_COOKIE['site_visitor'] == 'new' || $options['check_always'] ) {
		    	
				$agentStr 	= $_SERVER['HTTP_USER_AGENT'];
				$IsIE 		= false;
				$IsOn 		= "";
				$Version 	= "";
				
				if( strrpos( $agentStr, "MSIE 7.0") > -1 ) {
					$IsIE = true;
					$IsOn = true;
					
					if( strrpos( $agentStr, "Trident/7.0") > -1 ) {
						$Version = 'IE11';
					} 
					elseif( strrpos( $agentStr, "Trident/6.0") > -1 ) {
						$Version = 'IE10';
					} 
					elseif( strrpos( $agentStr, "Trident/5.0") > -1 ) {
						$Version = 'IE9';
					} 
					elseif( strrpos( $agentStr, "Trident/4.0") > -1 ) {
						$Version = 'IE8';
					} 
					else {
						$IsOn 	 = false; // compatability mimics 7, thus not on
						$Version = 'IE7';
					}
				} //IE 7
				
				// If the IE compatibility mode is on 
				if( $IsOn ) {
				    include_once( 'partials/wp-ie-check-public-display.php' );
			    }
			}
		}
    }

}