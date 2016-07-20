/**
 * main.js
 *
 * Handles the sticky header and utility functions needed in theme.
 */
( function() {
	var stickyHeader = document.querySelectorAll( '.site-header' )[0];
	var body = document.getElementsByTagName( 'body' )[0];
	var adminBar = libertyadminbar; //localized in functions.php
	var stickyHeaderOffset;

	// A few utilty functions.
	// Get the offset of an elment.
	function offset( el ) {
		var rect = el.getBoundingClientRect();
		return {
			top: rect.top + document.body.scrollTop,
			left: rect.left + document.body.scrollLeft
		};
	}

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

	if ( adminBar > 0 ) {
		stickyHeaderOffset = offset( stickyHeader ).top - 32;
	} else {
		stickyHeaderOffset = offset( stickyHeader ).top;
	}

	var stickyTime = function() {
		if ( body.scrollTop > stickyHeaderOffset ) {
			if ( -1 === body.className.indexOf( 'sticking' ) ) {
				body.className += ' sticking';
			}
		} else {
			body.className = body.className.replace( ' sticking', '' );
		}
	};

	/* Remove border from linked images */
	var linkedImages = function() {
		var imgs = document.querySelectorAll( '.entry-content img' );

		for ( var i = 0, imgslength = imgs.length; i < imgslength; i++ ) {
			if ( null !== closest( imgs[i], 'a' ) ) {
				closest( imgs[i], 'a' ).classList.add( 'no-line' );
			}
		}
	};

	// After window loads
	document.addEventListener( 'DOMContentLoaded', function() {
		stickyTime();
		linkedImages();
	});

	// After scrolling
	window.addEventListener( 'scroll', function() {
		stickyTime();
	} );

	// After window is resized or infinite scroll loads new posts
	window.addEventListener( 'resize', function() {
		linkedImages();
	} );
} )();