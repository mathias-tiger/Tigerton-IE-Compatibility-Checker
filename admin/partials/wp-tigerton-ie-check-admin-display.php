<?php

/**
 * Provide a admin area view for the plugin
 * This file is used to markup the admin-facing aspects of the plugin.
 */
?>
<div class="wrap">

	<h2 class="nav-tab-wrapper"><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<br/>
	<form method="post" name="tigerton_ie_checker_options" action="options.php">
		<?php
			$options = get_option($this->plugin_name);
	
			$check_always 		  = $options['check_always'];		
			$check_never_again 	  = $options['check_never_again'];		
			$popup_text  		  = $options['popup_text'];
			$check_only_frontpage = $options['check_only_frontpage'];
			$css_off 			  = $options['css_off'];
		
			settings_fields( $this->plugin_name );
			do_settings_sections( $this->plugin_name );
		?>
	
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Allow users to disable the checker', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-check_never_again">
				<input type="checkbox" id="<?php echo $this->plugin_name;?>-check_never_again" 
				name="<?php echo $this->plugin_name;?>[check_never_again]" value="1" <?php checked( $check_never_again, 1 ); ?>  />
				<span><?php esc_attr_e( 'Allow users to disable the checker', $this->plugin_name ); ?></span>
			</label>
		</fieldset>

		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Always Check IE Compatibility mode', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-check_always">
				<input type="checkbox" id="<?php echo $this->plugin_name;?>-check_always" 
				name="<?php echo $this->plugin_name;?>[check_always]" value="1" <?php checked( $check_always, 1 ); ?>  />
				<span><?php esc_attr_e( 'Always check for ie compatibility mode', $this->plugin_name ); ?></span>
			</label>
		</fieldset>
		
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Make check only on front page', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-check_only_frontpage">
				<input type="checkbox" id="<?php echo $this->plugin_name;?>-check_only_frontpage" 
				name="<?php echo $this->plugin_name;?>[check_only_frontpage]" value="1" <?php checked( $check_only_frontpage, 1 ); ?>  />
				<span><?php esc_attr_e( 'Make check only on front page', $this->plugin_name ); ?></span>
			</label>
		</fieldset>
		
		<br/>
		
		<fieldset> 
			<legend class="screen-reader-text"><span><?php _e('Choose your prefered popup text', $this->plugin_name);?></span></legend>
			<span><?php esc_attr_e( 'Choose your prefered popup text', $this->plugin_name ); ?></span><br/>
			<label for="<?php echo $this->plugin_name;?>-popup_text">
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name;?>-popup_text" 
				name="<?php echo $this->plugin_name;?>[popup_text]" value="<?php if(!empty($popup_text)) echo $popup_text;?>"
				placeholder="<?php esc_attr_e( 'Please turn of ie compatibility mode', $this->plugin_name ); ?>" />	                    
			</label>
		</fieldset>
		
		
		<br/>
		
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Do not load plugin css', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-css_off">
				<input type="checkbox" id="<?php echo $this->plugin_name;?>-css_off" 
				name="<?php echo $this->plugin_name;?>[css_off]" value="1" <?php checked( $css_off, 1 ); ?>  />
				<span><?php esc_attr_e( 'Do not load plugin css', $this->plugin_name ); ?></span>
			</label>
		</fieldset>
		
		<?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>
    </form>

</div>
