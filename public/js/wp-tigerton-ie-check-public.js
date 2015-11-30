(function( $ ) {
	'use strict';
	/**
	 * All of the JavaScript code for frontend
	 */

	// Remove the popup html on click
	$('#tigerton-ie-checker-close-button').click(function() {	  
		$('#tigerton-ie-checker-popup-bg').remove();
	});	
	
	//Remove the popup html on click and set/update cookie
	$('#tigerton-ie-checker-dismiss-button').click(function() {	  
		$('#tigerton-ie-checker-popup-bg').remove();
		
		//Set cookie
		var d = new Date();
	    d.setTime( d.getTime() + (14 * 24 * 3600 * 1000) );
	    var expires = 'expires=' + d.toUTCString();
	    document.cookie = 'site_visitor' + '=' + 'dont_check' + '; ' + expires +'; path=/';
	});	
	
})( jQuery );