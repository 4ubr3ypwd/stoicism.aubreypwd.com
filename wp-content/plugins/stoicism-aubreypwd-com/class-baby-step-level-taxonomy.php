<?php

namespace aubreypwd\Stoicism;

/**
 * Baby Step Taxonomy.
 *
 * @since  1.0.0
 */
class Baby_Step_Level_Taxonomy {

	/**
	 * Create Taxonomy.
	 *
	 * @since  1.0.0
	 * @return Taxonomy_Core Taxonomy Core object.
	 */
	function __construct() {
		if ( isset( $this->taxonomy ) ) {
			return $this->taxonomy;
		}

		// Taxonomy configuration.
		$taxonomy = array(

			// Actual names.
			__( 'Level', 'aubreypwd-stoicism' ),
			__( 'Levels', 'aubreypwd-stoicism' ),

			// Slug name.
			'baby-step-level',
		);

		return $this->taxonomy = register_via_taxonomy_core( $taxonomy, array(

			// /level instead of /baby-step-level.
			'rewrite' => array(
				'slug' => 'steps',
			),
		), array( 'baby-steps' ) );
	}
}
