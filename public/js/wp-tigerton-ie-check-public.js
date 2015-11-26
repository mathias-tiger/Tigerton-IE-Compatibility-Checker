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
	 * Remove the popup html on click and set/update cookie
	 */
	$('#tigerton-ie-checker-dismiss-button').click(function() {	  
		$('#tigerton-ie-checker-popup-bg').remove();
		
		//Set cookie
		var d = new Date();
	    d.setTime( d.getTime() + (3600 * 24 * 100) );
	    var expires = 'expires=' + d.toUTCString();
	    document.cookie = 'site_newvisitor' + '=' + 'check_never_again' + '; ' + expires;
	});	
	
})( jQuery );