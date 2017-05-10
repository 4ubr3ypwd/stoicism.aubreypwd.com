<?php

namespace aubreypwd\Stoicism;

/**
 * Loader.
 *
 * @author Aubrey Portwood
 * @since  1.0.0
 */
class App {

	/**
	 * Construct.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	function __construct() {
		$this->vendor();
		$this->classes();
		$this->attach();
		$this->notices();
		$this->helpers();
	}

	/**
	 * Load helper functions.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	function helpers() {
		require_once( 'helpers.php' );
	}

	/**
	 * Trigger notices.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	public function notices() {
		add_action( 'init', array( $this, 'check' ) );
	}

	/**
	 * Check for requirements and show notices.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	public function check() {
		if ( false === $this->cmb2->loaded ) {
			add_action( 'admin_notices', array( $this, 'no_cmb2_notice' ) );
		}
	}

	/**
	 * Not CMB2 Plugin notice.
	 *
	 * @author Aubrey Portwood
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
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	private function classes() {
		require_once( 'class-term-cpt.php' );
		require_once( 'class-content.php' );
		require_once( 'class-baby-step-cpt.php' );
		require_once( 'class-library-cpt.php' );
		require_once( 'class-library-list-taxonomy.php' );
		require_once( 'class-reading-list-shortcodes.php' );
		require_once( 'class-cmb2-loader.php' );
		require_once( 'class-library-fields.php' );
		require_once( 'class-baby-step-level-taxonomy.php' );
		require_once( 'class-baby-step-shortcodes.php' );
	}

	/**
	 * Load vendor libraries.
	 *
	 * Note that CMB2 isn't here, we use the WP.org plugin to require
	 * that library.
	 *
	 * @author Aubrey Portwood
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
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	private function attach() {

		// Load CMB2.
		$this->cmb2 = new CMB2_Loader();

		// Attach the term CPT!
		$this->term_cpt = new Term_CPT();

		// The baby steps.
		$this->baby_step_cpt = new Baby_Step_CPT();

		// Baby step taxonomy.
		$this->baby_step_level_taxonomy = new Baby_Step_Level_Taxonomy();

		// Library.
		$this->library = new Library_CPT();

		// Fields for the library.
		$this->library_fields = new Library_Fields( $this );

		// Taxonomy for reading lists.
		$this->library_list_taxonomy = new Library_List_Taxonomy();

		// Baby step short codes.
		$this->baby_step_shortcodes = new Baby_Step_Shortcodes();

		// Reading list shortcode.
		$this->reading_list_shortcodes = new Reading_List_Shortcodes();
	}
}
