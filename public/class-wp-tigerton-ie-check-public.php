<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two hooks for
 * enqueue the frontend-specific stylesheet and JavaScript.
 *
 * Also the functions for setting and updating cookies,
 * checking for IE mode and show the popup.
 */
class Wp_tigerton_ie_check_Public {
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
        
        $this->wp_tigerton_ie_check_options = get_option($this->plugin_name);
    }

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_styles() {
		 
		// If the option to turn off this plugin css is not checked, load css. 
		if( !get_option($this->plugin_name)['css_off'] ){
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-tigerton-ie-check-public.css', array(), $this->version, 'all' );
		}	
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_scripts() {
				 
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-tigerton-ie-check-public.js', array( 'jquery' ), $this->version, true );	
	}
	
	
    /**
	 * Check the options and set cookie accordingly
	 */
    public function wp_tigerton_ie_cookie() {
	    $options 			= get_option($this->plugin_name);
		$check_always 		= $options['check_always'];

		$cookie_time 		= time()+3600*24*100;
	    
	    if ( $check_always )  
	    {
		    $cookie_value = "check_always";
	        setcookie( 'site_newvisitor', $cookie_value, $cookie_time, COOKIEPATH, COOKIE_DOMAIN);
	    }
	    
	    elseif( !isset($_COOKIE['site_newvisitor']) )
	    {
		    $cookie_value = "new";
	        setcookie( 'site_newvisitor', $cookie_value, $cookie_time, COOKIEPATH, COOKIE_DOMAIN);
	    }
	    /*
		else
	    {
		    $cookie_value = "returning";
	        setcookie( 'site_newvisitor', $cookie_value, $cookie_time, COOKIEPATH, COOKIE_DOMAIN);
	    }
	    */
	    
	}
	
	/**
	 * check options, cookie, and if IE mode, chooses to display popup or not.
	 */
    public function wp_tigerton_ie_add_popup_code() {

    	$c_always  = get_option($this->plugin_name)['check_always'];
    	$c_only_p  = get_option($this->plugin_name)['check_only_on'];
    
    	switch($c_only_p)
    	{
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
    	
    	// if the page is the page you want to check
    	if( $page ){
    	
	    	// if returning  and  check always is off = dont check
	    	//if ( $_COOKIE['site_newvisitor'] === 'returning' && !$c_always ) { return; }
	
	    	// if never check  and  check always is off = dont check
	    	if ( $_COOKIE['site_newvisitor'] === 'check_never_again' && !$c_always ) { return; }
	    	
		    // if notset  or  is new  or  check always is on = do check
		    if (  !isset($_COOKIE['site_newvisitor']) || $_COOKIE['site_newvisitor'] == 'new' || $c_always ) {
		    	
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
			
			    if( $IsOn ) {
				    include_once( 'partials/wp-tigerton-ie-check-public-display.php' );
			    }
			}
		}
    }
	
}