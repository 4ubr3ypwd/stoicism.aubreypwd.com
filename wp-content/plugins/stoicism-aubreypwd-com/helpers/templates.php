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
 *
 * @return void Early exit when we find the link.
 */
function display_the_library_link() {

	// The post to get data from.
	$post_id = get_the_ID();

	// Affilate link.
	$affiliate_url = get_post_meta( $post_id, 'affiliate_url', true );

	if ( is_string( $affiliate_url ) && '' !== trim( $affiliate_url ) ) {

		// What will display on the screen.
		$text = __( 'View', 'aubreypwd-stoicism' );

		// We found a file show download link.
		echo wp_kses_post( "<a href='{$affiliate_url}' target='_blank'>{$text}</a>" );

		// Bail, we have a link.
		return;
	}

	// Affilate link.
	$normal_url = get_post_meta( $post_id, 'normal_url', true );

	if ( is_string( $normal_url ) && '' !== trim( $normal_url ) ) {

		// What will display on the screen.
		$text = __( 'View', 'aubreypwd-stoicism' );

		// We found a file show download link.
		echo wp_kses_post( "<a href='{$normal_url}' target='_blank'>{$text}</a>" );

		// Bail, we have a link.
		return;
	}

	// Get the file.
	$file = get_post_meta( $post_id, 'file', true );

	if ( is_string( $file ) && '' !== trim( $file ) ) {

		// What will display on the screen.
		$text = __( 'Download', 'aubreypwd-stoicism' );

		// We found a file show download link.
		echo wp_kses_post( "<a href='{$file}'>{$text}</a>" );

		// Bail we have a link.
		return;
	}

	// Default when no link.
	esc_html_e( 'No link', 'aubreypwd-stoicism' );
}

/**
 * Display the library item description.
 *
 * @author Aubrey Portwood
 * @since  1.0.0
 *
 * @return void Early bail if we don't have description.
 */
function display_the_library_description() {

	// Get the description.
	$description = get_post_meta( get_the_ID(), 'description', true );

	if ( '' === trim( $description ) ) {

		// No description.
		esc_html_e( 'No description', 'aubreypwd-stoicism' );

		// Just stop here.
		return;
	}

	// Description.
	echo wp_kses_post( $description );
}