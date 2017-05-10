<?php

namespace aubreypwd\Stoicism;

/**
 * Library fields.
 *
 * @author Aubrey Portwood
 * @since  1.0.0
 */
class Library_Fields {

	/**
	 * Create CMB2 Fields.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 *
	 * @return Taxonomy_Core Taxonomy Core object.
	 */
	function __construct( $app ) {
		if ( false === $app->cmb2->loaded ) {

			// The CMB2 plugin must not be activated.
			return;
		}
	}
}
