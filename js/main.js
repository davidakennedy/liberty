(function( $ ) {
	var stickyHeader = $( '.site-header' );
	var body = $( 'body' );
	var adminBar = libertyadminbar; //localized in functions.php
	var stickyHeaderOffset;

	if ( adminBar > 0 ) {
		stickyHeaderOffset = stickyHeader.offset().top - 32;
	} else {
		stickyHeaderOffset = stickyHeader.offset().top;
	}

	var stickyTime = function() {
		if( $( window ).scrollTop() > stickyHeaderOffset ) {
			body.addClass( 'sticking' );
		} else {
			body.removeClass( 'sticking' );
		}
	}

	/* Remove border from linked images */
	function linkedImages() {
		var imgs = $( '.entry-content img' );

		for ( var i = 0, imgslength = imgs.length; i < imgslength; i++ ) {
			if ( '' !== $( imgs[i] ).closest( 'a' ) ) {
				$( imgs[i] ).closest( 'a' ).addClass( 'no-line' );
			}
		}
	}

	// After window loads
	$( window ).load( function() {
		linkedImages();
		stickyTime();
	} );

	// After scrolling
	$( window ).scroll( function() {
		stickyTime();
	} );

	// After window is resized or infinite scroll loads new posts
	$( window ).on( 'resize post-load', function() {
		linkedImages();
	} );
})( jQuery );