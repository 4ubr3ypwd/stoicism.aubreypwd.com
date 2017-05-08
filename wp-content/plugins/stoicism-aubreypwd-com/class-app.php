<?php

namespace aubreypwd\Stoicism;

/**
 * Loader.
 *
 * @since  1.0.0
 */
class App {

	/**
	 * Construct.
	 *
	 * @since  1.0.0
	 */
	function __construct() {
		$this->vendor();
		$this->classes();
	}

	/**
	 * Load application classes.
	 *
	 * @since  1.0.0
	 */
	private function classes() {
		require_once( 'class-term-cpt.php' );
	}

	/**
	 * Load vendor libraries.
	 *
	 * @since  1.0.0
	 *
	 * @see  https://github.com/WebDevStudios/CPT_Core CPT Core is used to create CPT's fast!
	 */
	private function vendor() {
		require_once( 'vendor/WebDevStudios/CPT_Core/CPT_Core.php' );
	}
}
