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
			__( 'Baby Step Level', 'aubreypwd-stoicism' ),
			__( 'Baby Step Levels', 'aubreypwd-stoicism' ),

			// Slug name.
			'baby-step-level',
		);

		return $this->taxonomy = register_via_taxonomy_core( $taxonomy, array(), array( 'baby-steps' ) );
	}
}
