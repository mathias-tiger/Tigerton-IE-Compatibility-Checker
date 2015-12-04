<?php
/**
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @author     Mathias Carlsson <info@mathiascarlsson.se>
 */
?>
<div class="wrap" id="<?php echo $this->plugin_name;?>-wrapper">

	<h2 class="nav-tab-wrapper"><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<br/>
	<form method="post" name="ie_checker_options" action="options.php">
		<?php
			$options = get_option($this->plugin_name);
	
			$check_always 		  = $options['check_always'];		
			$check_never_again 	  = $options['check_never_again'];		
			$popup_title  		  = $options['popup_title'];
			$popup_text  		  = $options['popup_text'];
			$css_off 			  = $options['css_off'];
			$check_only_on		  = $options['check_only_on'];
			$debug				  = $options['debug'];
		
			settings_fields( $this->plugin_name );
			do_settings_sections( $this->plugin_name );
		?>
	
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Allow users to disable the checker', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-check_never_again">
				<input type="checkbox" id="<?php echo $this->plugin_name;?>-check_never_again" 
				name="<?php echo $this->plugin_name;?>[check_never_again]" value="1" <?php checked( $check_never_again, 1 ); ?>  />
				<span><?php esc_attr_e( 'Allow visitors to disable the checker ', $this->plugin_name ); ?></span>
				<i><?php esc_attr_e( '(if not checked the visitors will see the popup every time they visit the site)', $this->plugin_name ); ?></i>
			</label>
		</fieldset>

		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Always Check IE Compatibility mode', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-check_always">
				<input type="checkbox" id="<?php echo $this->plugin_name;?>-check_always" 
				name="<?php echo $this->plugin_name;?>[check_always]" value="1" <?php checked( $check_always, 1 ); ?>  />
				<span><?php esc_attr_e( 'Always check for ie compatibility mode ', $this->plugin_name ); ?></span>
				<i><?php esc_attr_e( '(even if it is a returning visitor and have the checker disabled)', $this->plugin_name ); ?></i>
			</label>
		</fieldset>
		
		<br/>
		
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Make check on', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-check_only_on">
				<span><?php esc_attr_e( 'Check on: ', $this->plugin_name ); ?></span>
				<select name="<?php echo $this->plugin_name;?>[check_only_on]">
					<option value="1" <?php selected( $check_only_on, 1 ); ?>>All Pages</option>
				    <option value="2" <?php selected( $check_only_on, 2 ); ?>>The Front Page</option>
				    <option value="3" <?php selected( $check_only_on, 3 ); ?>>The Main Page</option>
				    <option value="4" <?php selected( $check_only_on, 4 ); ?>>Any Search Result Page</option>
				    <option value="5" <?php selected( $check_only_on, 5 ); ?>>Any Single Post Page</option>
				    <option value="6" <?php selected( $check_only_on, 6 ); ?>>Any PAGE Page</option>
				    <option value="7" <?php selected( $check_only_on, 7 ); ?>>Any Tag Page</option>
				    <option value="8" <?php selected( $check_only_on, 8 ); ?>>Any Taxonomy Page</option>
				    <option value="9" <?php selected( $check_only_on, 9 ); ?>>Any Archive Page</option>
				</select>
				<i><?php esc_attr_e( ' (the page types you want the check to be enabled on)', $this->plugin_name ); ?></i>
			</label>
		</fieldset>
		
		<br/>
		
		<fieldset> 
			<legend class="screen-reader-text"><span><?php _e('Choose your preferred popup title', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-popup_title">
			<span><?php esc_attr_e( 'Choose your preferred popup title:', $this->plugin_name ); ?></span><br/>
				<input type="text" class="regular-text" id="<?php echo $this->plugin_name;?>-popup_title" 
				name="<?php echo $this->plugin_name;?>[popup_title]" value="<?php if(!empty($popup_title)) echo $popup_title;?>"
				placeholder="<?php esc_attr_e( 'Please turn of ie compatibility mode', $this->plugin_name ); ?>" />	                    
			</label>
		</fieldset>

		<br/>
		
		<fieldset> 
			<legend class="screen-reader-text"><span><?php _e('Choose your preferred popup text', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-popup_text">
			<span><?php esc_attr_e( 'Choose your preferred popup text:', $this->plugin_name ); ?></span><br/>
				<textarea rows="4" cols="50" 
					id="<?php echo $this->plugin_name;?>-popup_text" 
					name="<?php echo $this->plugin_name;?>[popup_text]" 
					placeholder="<?php esc_attr_e( 'Compatibility mode in IE is a feature that helps you view webpages that were designed for previous versions of the browser, however having it enabled can break newer sites that were designed for modern browsers.', $this->plugin_name ); ?>"><?php if(!empty($popup_text)) echo $popup_text;?></textarea>               
			</label>
		</fieldset>
		
		<br/>
		
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Do not load the plugin css-file', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-css_off">
				<input type="checkbox" id="<?php echo $this->plugin_name;?>-css_off" 
				name="<?php echo $this->plugin_name;?>[css_off]" value="1" <?php checked( $css_off, 1 ); ?>  />
				<span><?php esc_attr_e( 'Do not load the plugin css-file', $this->plugin_name ); ?></span>
				<i><?php esc_attr_e( '(you will need to create your own styles for the popup)', $this->plugin_name ); ?></i>
			</label>
		</fieldset>
		
		<br/>
		<hr/>

		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Debug this plugin', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-debug">
				<input type="checkbox" id="<?php echo $this->plugin_name;?>-debug" 
				name="<?php echo $this->plugin_name;?>[debug]" value="1" <?php checked( $debug, 1 ); ?>  />
				<span><?php esc_attr_e( 'Debug this plugin', $this->plugin_name ); ?></span>
				<i><?php esc_attr_e( '(makes the check popup on all browsers in any mode, regardless of the above settings)', $this->plugin_name ); ?></i>
			</label>
		</fieldset>
		
		<br/>

		<button class="button-delete" id="<?php echo $this->plugin_name;?>-delete-cookie">Reset cookie</button>

		<hr/>
		
		<?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>
    </form>

</div>