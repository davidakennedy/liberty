/**
 * jetpack.js
 *
 * Handles JavaScript fired when Jetpack's infinite scroll loads more posts.
 */
 ( function( $ ) {
	$( document.body ).on( 'post-load', function () {
		// Go up in the Dom and get the closest parent element of a certain type.
		function closest( el, selector ) {
			var matchesSelector = el.matches || el.webkitMatchesSelector || el.mozMatchesSelector || el.msMatchesSelector;

			while ( el ) {
				if ( matchesSelector.call( el, selector ) ) {
					break;
				}
				el = el.parentElement;
			}
			return el;
		}

		/* Remove border from linked images */
		var imgs = document.querySelectorAll( '.entry-content img' );

		for ( var i = 0, imgslength = imgs.length; i < imgslength; i++ ) {
			if ( null !== closest( imgs[i], 'a' ) ) {
				closest( imgs[i], 'a' ).classList.add( 'no-line' );
			}
		}
	} );
} )( jQuery );