<?php

namespace aubreypwd\Stoicism;

/**
 * Baby Step CPT.
 *
 * @since  1.0.0
 */
class Baby_Step_Shortcodes {

	/**
	 * Construct.
	 *
	 * @since  1.0.0
	 */
	function __construct() {
		add_shortcode( 'baby-steps', array( $this, 'baby_steps' ) );
	}

	/**
	 * Baby steps shortcode.
	 *
	 *     [baby-steps level="beginner"]
	 *
	 * @since  1.0.0
	 *
	 * @param  array $atts  Attributes.
	 * @return string       Shortcode template content.
	 */
	public function baby_steps( $atts ) {
		$atts = (object) shortcode_atts( array(
			'level' => 'all',
		), $atts );

		// No arguments.
		$args = array();

		if ( 'all' !== $atts->level && is_string( $atts->level ) ) {
			$args = array(
				'tax_query' => array(

					// Filter by level.
					array(
						'taxonomy' => 'baby-step-level',
						'field'    => 'slug',
						'terms'    => array( $atts->level ),
					),
				),
			);
		}

		$baby_steps = new \WP_Query( array_merge( $args, array(
			'post_type'              => 'baby-steps',
			'post_status'            => 'publish',
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'posts_per_page'         => 1000,
		) ) );

		// Buffer the output.
		ob_start();

		// Load the shortcode template.
		require( dirname( __FILE__ ) . '/templates/baby-step-shortcode.php' );

		// Show the content.
		return ob_get_clean();
	}
}
