<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 * 
 * @author     Guillaume Kanoufi <g.kanoufi@gmail.com>
 */
class Wp_tigerton_ie_check_Public {
	/**
	 * The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 */
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
		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-tigerton-ie-check-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_scripts() {
		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-tigerton-ie-check-public.js', array( 'jquery' ), $this->version, true );
	}
    
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
	    else
	    {
		    $cookie_value = "returning";
	        setcookie( 'site_newvisitor', $cookie_value, $cookie_time, COOKIEPATH, COOKIE_DOMAIN);
	    }
	}

    public function wp_tigerton_ie_add_popup_code() {

    	$c_always =  get_option($this->plugin_name)['check_always'];
    	
    	// if returning  and  check always is off 	= dont check
    	if ( $_COOKIE['site_newvisitor'] === 'returning' && !$c_always ) { return; }

    	// if never check  and  check always is off 	= dont check
    	if ( $_COOKIE['site_newvisitor'] === 'check_never_again' && !$c_always ) { return; }
    	
	    // if Notset  or  is new  or  check always is on = do check
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
			
			// CHANGE TO TRUE, only false for debug.
		    if( $IsOn == false ) {
			    include_once( 'partials/wp-tigerton-ie-check-public-display.php' );
		    }
		}
    }
	

}