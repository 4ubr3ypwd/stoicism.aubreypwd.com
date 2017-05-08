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
		$this->attach();
	}

	/**
	 * Load application classes.
	 *
	 * @since  1.0.0
	 */
	private function classes() {
		require_once( 'class-term-cpt.php' );
		require_once( 'class-beginner-baby-step-cpt.php' );
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
		// require_once( 'vendor/WebDevStudios/Taxonomy_Core/Taxonomy_Core.php' );
	}

	/**
	 * Load and attach app elements to the app class.
	 *
	 * @since  1.0.0
	 */
	private function attach() {

		// Attach the term CPT!
		$this->term_cpt = new Term_CPT();

		// Beginner Baby Steps.
		$this->baby_step_cpt = new Beginner_Baby_Step_CPT();
	}
}
