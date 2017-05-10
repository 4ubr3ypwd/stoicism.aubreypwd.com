<?php

namespace aubreypwd\Stoicism;

/**
 * Reading CPT.
 *
 * @since  1.0.0
 */
class Library_CPT extends \CPT_Core {

	/**
	 * Create CPT.
	 *
	 * @since  1.0.0
	 */
	function __construct() {

		// Labels.
		$labels = array(

			// Names.
			__( 'Reading', 'aubreypwd-stoicism' ),
			__( 'Stoic Library', 'aubreypwd-stoicism' ),

			// Slug.
			'library',
		);

		// Options.
		$options = array(
			'supports' => array(
				'title',
			),

			// The icon.
			'menu_icon' => 'dashicons-book',
		);

		// Use CPT_Core to create the CPT.
		parent::__construct( $labels, $options );
	}
}
