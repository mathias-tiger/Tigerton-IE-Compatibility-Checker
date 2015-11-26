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
				echo '<h1>' . esc_attr__( $popup_text, $this->plugin_name ) . '</h1>'; 
			}
			else { 
				echo '<h1>' . __('Please turn of ie compatibility mode', $this->plugin_name) . '</h1>'; 
			}
		?>
		<div id="tigerton-ie-checker-buttons">
			<?php if( $dontCheck ): ?>
				<button id="tigerton-ie-checker-dismiss-button">
					<?php _e('Dont show this message again', $this->plugin_name); ?>
				</button>
			<?php endif ?>
			
			<button id="tigerton-ie-checker-close-button">
				<?php _e('Close', $this->plugin_name); ?> 
			</button>
		</div>
	</div>
</div>