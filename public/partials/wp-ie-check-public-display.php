<?php
/**
 * The popup box that are displayed in the frontend.
 *
 * @author     Mathias Carlsson <info@mathiascarlsson.se>
 */
	$options 	 = get_option($this->plugin_name);
	$popup_text  = $options['popup_text'];
	$popup_title = $options['popup_title'];
	$dontCheck   = $options['check_never_again'];
?>

<div id="ie-checker-popup-bg">
	<div id="ie-checker-popup-inner">
		<?php 
			if( !empty($popup_title) ) {
				echo '<h1>' . esc_attr__( $popup_title, $this->plugin_name ) . '</h1>'; 
			}
			else { 
				echo '<h1>' . __('Please turn of ie compatibility mode', $this->plugin_name) . '</h1>'; 
			}
			
			if( !empty($popup_text) ) {
				echo '<p>' . esc_attr__( $popup_text, $this->plugin_name ) . '</p>'; 
			}
			else { 
				echo '<p>' . 
				__('Compatibility mode in IE is a feature that helps you view webpages that were designed for previous versions of the browser, 
				however having it enabled can break newer sites that were designed for modern browsers.', $this->plugin_name) . '</p>'; 
			}
		?>
		<div id="ie-checker-buttons">
			<?php if( $dontCheck ): ?>
				<button id="ie-checker-dismiss-button">
					<?php _e('Dont show this message again', $this->plugin_name); ?>
				</button>
			<?php endif ?>
			
			<button id="ie-checker-close-button">
				<?php _e('Close', $this->plugin_name); ?> 
			</button>
		</div>
	</div>
</div>