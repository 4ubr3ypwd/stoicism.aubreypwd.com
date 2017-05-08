<?php

namespace aubreypwd\Stoicism;

/**
 * Beginner Baby Step CPT.
 *
 * I had originally had the idea that there would be many baby steps organized
 * by level, but the admin view of that would be really messy maybe, so I
 * opted for levels to have their own CPT.
 *
 * @since  1.0.0
 */
class Beginner_Baby_Step_CPT extends \CPT_Core {

	/**
	 * Create CPT.
	 *
	 * @since  1.0.0
	 */
	function __construct() {

		// Labels.
		$labels = array(

			// Names.
			__( 'Beginner Baby Step', 'aubreypwd-stoicism' ),
			__( 'Beginner Baby Steps', 'aubreypwd-stoicism' ),

			// Slug.
			'beginner-baby-steps',
		);

		// Options.
		$options = array(
			'supports' => array(
				'title',
				'editor',
			),

			// The icon.
			'menu_icon' => 'dashicons-list-view',
		);

		// Use CPT_Core to create the CPT.
		parent::__construct( $labels, $options );
	}
}
