<?php
/**
 * Provide a public-facing view for the plugin
 */
	 
	$options 	= get_option($this->plugin_name);
	$popup_text = $options['popup_text'];
	$dontCheck  = $options['check_never_again'];
?>

<div id="tigerton-ie-checker-popup-bg">
	<div id="tigerton-ie-checker-popup-inner">
		<?php 
			if( !empty($popup_text) ) {
				echo esc_attr_e( $popup_text, $this->plugin_name ); 
			}
			else { 
				echo _e('Please turn of IE compatibility mode', $this->plugin_name); 
			}
		?>
		<div id="tigerton-ie-checker-buttons">
			<?php if( $dontCheck ): ?>
				<button id="tigerton-ie-checker-dismiss-button">
					<?php echo _e('Dont show this message again', $this->plugin_name); ?>
				</button>
			<?php endif ?>
			
			<button id="tigerton-ie-checker-close-button">
				<?php echo _e('Close', $this->plugin_name); ?> 
			</button>
		</div>
	</div>
</div>