(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
	 * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
	 * be doing this, we should try to minimize doing that in our own work.
	 */
	
	
	/**
	 * Remove the popup html on click
	 */
	$('#tigerton-ie-checker-close-button').click(function() {	  
		$('#tigerton-ie-checker-popup-bg').remove();
	});	


	/**
	 * Remove the popup html on click and.. work in progress
	 */
	$('#tigerton-ie-checker-dismiss-button').click(function() {	  
		$('#tigerton-ie-checker-popup-bg').remove();


		var data = {
		'action': 'wp_tigerton_ie_action_callback',
		'whatever': ajax_object.we_value      // We pass php values differently!
		};

		// We can also pass the url value separately from ajaxurl for front end AJAX implementations
		jQuery.post(ajax_object.ajax_url, data, function(response) {
			alert('Got this from the server: ' + response);
		});


	});	
	
})( jQuery );