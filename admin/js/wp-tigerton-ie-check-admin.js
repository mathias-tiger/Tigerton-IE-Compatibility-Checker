(function( $ ) {
	'use strict';

	/**
	 * All of the code for the admin-specific JavaScript source
	 */
	$('#wp-tigerton-ie-check-delete-cookie').click(function() {
	    document.cookie = "site_visitor=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
	});

})( jQuery );
