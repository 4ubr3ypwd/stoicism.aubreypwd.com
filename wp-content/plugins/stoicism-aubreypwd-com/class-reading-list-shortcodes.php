<?php

namespace aubreypwd\Stoicism;
use \WP_Query;

/**
 * Reading List Shortcodes.
 *
 * @author Aubrey Portwood
 * @since  1.0.0
 */
class Reading_List_Shortcodes {

	/**
	 * Construct.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	function __construct() {
		add_shortcode( 'reading-list', array( $this, 'reading_list' ) );
		add_shortcode( 'reading_list', array( $this, 'reading_list' ) );
	}

	/**
	 * Reading list shortcode.
	 *
	 *     [reading-list list="reading-list-category-slug"]
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 *
	 * @param  array $atts  Attributes.
	 * @return string       Shortcode template content.
	 */
	public function reading_list( $atts ) {
		$atts = (object) shortcode_atts( array(
			'list' => 'all',
		), $atts );

		// No arguments.
		$args = array();

		if ( 'all' !== $atts->list && is_string( $atts->list ) ) {
			$args = array(
				'tax_query' => array(

					// Filter by level.
					array(
						'taxonomy' => 'reading-list',
						'field'    => 'slug',
						'terms'    => array( $atts->list ),
					),
				),
			);
		}

		$reading_lists = new WP_Query( array_merge( $args, array(
			'post_type'              => 'library',
			'post_status'            => 'publish',
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'posts_per_page'         => 1000,
			'order'                  => 'ASC',
			'orderby'                => 'post_title',
		) ) );

		// Buffer the output.
		ob_start();

		// Load the shortcode template.
		require( dirname( __FILE__ ) . '/templates/reading-list-shortcode.php' );

		// Show the content.
		return ob_get_clean();
	}
}
