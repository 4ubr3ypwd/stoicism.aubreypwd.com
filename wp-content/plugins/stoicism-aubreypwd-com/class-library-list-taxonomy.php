<?php

namespace aubreypwd\Stoicism;

/**
 * Library Reading List Taxonomy.
 *
 * @since  1.0.0
 */
class Library_List_Taxonomy {

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
			__( 'Reading List', 'aubreypwd-stoicism' ),
			__( 'Reading Lists', 'aubreypwd-stoicism' ),

			// Slug name.
			'reading-list',
		);

		return $this->taxonomy = register_via_taxonomy_core( $taxonomy, array(), array( 'library' ) );
	}
}
