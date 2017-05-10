<?php

namespace aubreypwd\Stoicism;

/**
 * Scripts
 *
 * @since  1.0.0
 */
class Scripts {

	/**
	 * Enqueues scripts.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Load scripts.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	public function scripts() {
		wp_enqueue_style( 'aubreypwd-stoicism-css', plugins_url( 'assets/aubreypwd-stoicism.css', __FILE__ ), array(), time() );
	}
}
