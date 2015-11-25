<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @package    Wp_tigerton_ie_check
 * @subpackage Wp_tigerton-ie-check/public/partials
 */
	 
	$options 	= get_option($this->plugin_name);
	$popup_text = $options['popup_text'];
?>

<div id="tigerton-ie-checker-popup-bg">
	<div id="tigerton-ie-checker-popup-inner">
		<?php 
			if( !empty($popup_text) ) 
			{
				echo esc_attr_e( $popup_text, $this->plugin_name ); 
			}
			else
			{ 
				echo _e('Please turn of IE compatibility mode', $this->plugin_name); 
			}
		?>
		<button id="tigerton-ie-checker-popup-button"> X </button>
	</div>
</div>