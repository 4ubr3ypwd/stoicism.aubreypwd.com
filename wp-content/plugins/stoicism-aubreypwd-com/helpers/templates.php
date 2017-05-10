<?php
/**
 * Template helper functions.
 *
 * @since  1.0.0
 */

use aubreypwd\Stoicism;

/**
 * Display the library link.
 *
 * May display the affiliate, normal, or file link.
 *
 * @author Aubrey Portwood
 * @since  1.0.0
 */
function display_the_library_link() {

	// Get the file.
	$file = get_post_meta( get_the_ID(), 'file', true );

	if ( is_string( $file ) && '' !== $file ) {

		// What will display on the screen.
		$download = __( 'Download', 'aubreypwd-stoicism' );

		// We found a file show download link.
		echo wp_kses_post( "<a href='{$file}'>{$download}</a>" );

		// Bail we have a link.
		return;
	}
}
