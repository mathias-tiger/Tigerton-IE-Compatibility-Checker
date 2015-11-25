(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note that this assume you're going to use jQuery, so it prepares
	 * the $ function reference to be used within the scope of this
	 * function.
	 *
	 * From here, you're able to define handlers for when the DOM is
	 * ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * Or when the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and so on.
	 *
	 * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
	 * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
	 * be doing this, we should try to minimize doing that in our own work.
	 */
	
	
	/*
	function IECompatibility() 
	{
		console.log('Texting IE Compaibility');
		
		var agentStr 	= navigator.userAgent;
		this.IsIE 		= false;
		this.IsOn 		= undefined;  //defined only if IE
		this.Version 	= undefined;
		
		if (agentStr.indexOf("MSIE 7.0") > -1) 
		{
			this.IsIE = true;
			this.IsOn = true;
			
			if (agentStr.indexOf("Trident/6.0") > -1) 
			{
				this.Version = 'IE10';
			} 
			else if (agentStr.indexOf("Trident/5.0") > -1) 
			{
				this.Version = 'IE9';
			} 
			else if (agentStr.indexOf("Trident/4.0") > -1) 
			{
				this.Version = 'IE8';
			} 
			else 
			{
				this.IsOn = false; // compatability mimics 7, thus not on
				this.Version = 'IE7';
			}
		} //IE 7
	}
	
	
	var iec = new IECompatibility();
	console.log('IsIE: ' + iec.IsIE + '\nVersion: ' + iec.Version + '\nCompatability On: ' + iec.IsOn);
	*/
	
	$('#tigerton-ie-checker-popup-button').click(function() 
	{
		//console.log( "Handler for .click() called." );	  
		$('#tigerton-ie-checker-popup-bg').remove();
	});	
	
	 
	 

})( jQuery );
