<?php

namespace aubreypwd\Stoicism;

/**
 * Term CPT.
 *
 * @since  1.0.0
 */
class Term_CPT extends \CPT_Core {

	/**
	 * Create CPT.
	 *
	 * @since  1.0.0
	 */
	function __construct() {

		// Labels.
		$labels = array(

			// Names.
			__( 'Stoic Term', 'aubreypwd-stoicism' ),
			__( 'Stoic Terms', 'aubreypwd-stoicism' ),

			// Slug.
			'terms',
		);

		// Options.
		$options = array(
			'supports' => array(
				'title',
				'editor',
			),

			// The icon.
			'menu_icon' => 'dashicons-testimonial',
		);

		// Use CPT_Core to create the CPT.
		parent::__construct( $labels, $options );
	}
}
