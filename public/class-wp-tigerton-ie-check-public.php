<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://lostwebdesigns.com
 * @since      1.0.0
 *
 * @package    Wp_Cbf
 * @subpackage Wp_Cbf/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Cbf
 * @subpackage Wp_Cbf/public
 * @author     Guillaume Kanoufi <g.kanoufi@gmail.com>
 */
class Wp_tigerton_ie_check_Public {

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
    public function __construct( $plugin_name, $version ) 
    {
        $this->plugin_name 	= $plugin_name;
        $this->version 		= $version;
        
        $this->wp_tigerton_ie_check_options = get_option($this->plugin_name);
    }


	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() 
	{
		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Cbf_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Cbf_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-tigerton-ie-check-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() 
	{
		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Cbf_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Cbf_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-tigerton-ie-check-public.js', array( 'jquery' ), $this->version, true );

	}
	
	
	
	


	/*

    public function wp_tigerton_ie_add_header_code() 
    {
        if( !empty($this->wp_tigerton_ie_check_options['add_check_header']) )
        {
	        // TO DO check if there is already a meta, if it is .. dont add a second.
	        // javascript or php 
	        // $_SERVER['HTTP_USER_AGENT'];
	        
	        
	        // if is in browser in comp-mode call function that adds a popup..
 
            //echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
            
        }
    }
    
    */
    
    
    public function wp_tigerton_ie_newuser_cookie() 
    {
	    $options 		= get_option($this->plugin_name);
		$check_always 	= $options['check_always'];
	    
	    if ( $check_always ) 
	    {
		    $cookie_value = "check_always";
	        setcookie( 'site_newvisitor', $cookie_value, time()+3600*24*100, COOKIEPATH, COOKIE_DOMAIN);
	    }
	    elseif( !isset($_COOKIE['site_newvisitor']) )
	    {
		    $cookie_value = "new";
	        setcookie( 'site_newvisitor', $cookie_value, time()+3600*24*100, COOKIEPATH, COOKIE_DOMAIN);
	    }
	    else
	    {
		    $cookie_value = "returning";
	        setcookie( 'site_newvisitor', $cookie_value, time()+3600*24*100, COOKIEPATH, COOKIE_DOMAIN);
	    }
	}

    public function wp_tigerton_ie_add_popup_code() 
    {
	    if ( isset($_COOKIE['site_newvisitor']) && $_COOKIE['site_newvisitor'] != 'returning' ) 
	    {
			$agentStr 	= $_SERVER['HTTP_USER_AGENT'];
			$IsIE 		= false;
			$IsOn 		= "";  //defined only if IE
			$Version 	= "";
			
			if( strrpos( $agentStr, "MSIE 7.0") > -1 ) 
			{
				$IsIE = true;
				$IsOn = true;
				
				if( strrpos( $agentStr, "Trident/6.0") > -1 ) 
				{
					$Version = 'IE10';
				} 
				else if (agentStr.indexOf("Trident/5.0") > -1) 
				{
					$Version = 'IE9';
				} 
				else if (agentStr.indexOf("Trident/4.0") > -1) 
				{
					$Version = 'IE8';
				} 
				else 
				{
					$IsOn 	 = false; // compatability mimics 7, thus not on
					$Version = 'IE7';
				}
			} //IE 7
			
		    if( !$IsOn )
		    {
			    include_once( 'partials/wp-tigerton-ie-check-public-display.php' );
		    }
		}
    }
    
    

}
