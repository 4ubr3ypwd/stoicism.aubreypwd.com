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
		$this->notices();
	}

	/**
	 * Trigger notices.
	 *
	 * @since  1.0.0
	 */
	public function notices() {
		if ( ! class_exists( 'CMB2' ) ) {
			add_action( 'admin_notices', array( $this, 'no_cmb2_notice' ) );
		}
	}

	/**
	 * Not CMB2 Plugin notice.
	 *
	 * @since  1.0.0
	 */
	public function no_cmb2_notice() {
		?>
			<div id="message" class="error notice is-dismissible">
				<p><?php esc_html_e( 'Aubrey on Stoicism requires CMB2 plugin to work, please install and/or activate it.', 'aubreypwd-stoicism' ); ?></p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php esc_html_e( 'Dismiss', 'aubreypwd-stoicism' ); ?></span></button>
			</div>
		<?php
	}

	/**
	 * Load application classes.
	 *
	 * @since  1.0.0
	 */
	private function classes() {
		require_once( 'class-term-cpt.php' );
		require_once( 'class-baby-step-cpt.php' );
		require_once( 'class-library-cpt.php' );
		require_once( 'class-library-fields.php' );
		require_once( 'class-baby-step-level-taxonomy.php' );
		require_once( 'class-baby-step-shortcodes.php' );
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
		require_once( 'vendor/WebDevStudios/Taxonomy_Core/Taxonomy_Core.php' );
	}

	/**
	 * Load and attach app elements to the app class.
	 *
	 * @since  1.0.0
	 */
	private function attach() {

		// Attach the term CPT!
		$this->term_cpt = new Term_CPT();

		// The baby steps.
		$this->baby_step_cpt = new Baby_Step_CPT();

		// Library.
		$this->library = new Library_CPT();

		// Fields for the library.
		$this->library_fields = new Library_Fields();

		// Baby step taxonomy.
		$this->baby_step_level_taxonomy = new Baby_Step_Level_Taxonomy();

		// Baby step short codes.
		$this->baby_step_shortcodes = new Baby_Step_Shortcodes();
	}
}
