<?php

namespace aubreypwd\Stoicism;

/**
 * Baby Step CPT.
 *
 * @since  1.0.0
 */
class Baby_Step_CPT extends \CPT_Core {

	/**
	 * Create CPT.
	 *
	 * @since  1.0.0
	 */
	function __construct() {

		// Labels.
		$labels = array(

			// Names.
			__( 'Step', 'aubreypwd-stoicism' ),
			__( 'Steps', 'aubreypwd-stoicism' ),

			// Slug.
			'baby-steps',
		);

		// Options.
		$options = array(
			'supports' => array(
				'title',
				'editor',
			),

			// The icon.
			'menu_icon' => 'dashicons-exerpt-view',

			// /step instead of /baby-steps/
			'rewrite' => array(
				'slug' => 'step',
			),
		);

		// Use CPT_Core to create the CPT.
		parent::__construct( $labels, $options );
	}
}
