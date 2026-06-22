( function () {
	'use strict';

	function copyToClipboard( text ) {
		if ( navigator.clipboard && navigator.clipboard.writeText ) {
			return navigator.clipboard.writeText( text );
		}

		return new Promise( function ( resolve, reject ) {
			var textarea = document.createElement( 'textarea' );
			textarea.value = text;
			textarea.setAttribute( 'readonly', '' );
			textarea.style.position = 'absolute';
			textarea.style.left = '-9999px';
			document.body.appendChild( textarea );
			textarea.select();

			try {
				var success = document.execCommand( 'copy' );
				document.body.removeChild( textarea );
				if ( success ) {
					resolve();
				} else {
					reject();
				}
			} catch ( error ) {
				document.body.removeChild( textarea );
				reject( error );
			}
		} );
	}

	function showCopiedState( button ) {
		if ( button.copyTimeout ) {
			window.clearTimeout( button.copyTimeout );
		}

		button.classList.add( 'is-copied' );
		button.copyTimeout = window.setTimeout( function () {
			button.classList.remove( 'is-copied' );
			button.copyTimeout = null;
		}, 2000 );
	}

	document.addEventListener( 'click', function ( event ) {
		var button = event.target.closest( '.pwp-copy-link button' );
		if ( ! button ) {
			return;
		}

		var url = button.getAttribute( 'data-url' );
		if ( ! url ) {
			return;
		}

		event.preventDefault();

		copyToClipboard( url ).then( function () {
			showCopiedState( button );
		} );
	} );
} )();
