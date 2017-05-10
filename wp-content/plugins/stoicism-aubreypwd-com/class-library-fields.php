<?php

namespace aubreypwd\Stoicism;
use \CMB2;

/**
 * Library fields.
 *
 * @author Aubrey Portwood
 * @since  1.0.0
 */
class Library_Fields {

	/**
	 * CMB2 metabox.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 *
	 * @var CMB2
	 */
	public $metabox;

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

		// Add fields.
		add_action( 'cmb2_admin_init', array( $this, 'metabox' ) );
	}

	/**
	 * Create the metabox.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	public function metabox() {
		$this->metabox = new CMB2( array(
			'id'           => 'aubreypwd-stoicism-library-fields',
			'title'        => esc_html__( 'Library', 'aubreypwd-stoicism' ),
			'object_types' => array( 'library' ),
		) );

		// Add fields to this.
		$this->fields();
	}

	/**
	 * Add the fields.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	public function fields() {

		// Affiliate link.
		$this->metabox->add_field( array(
			'name'     => esc_html__( 'Affiliate URL', 'aubreypwd-stoicism' ),
			'desc'     => esc_html__( 'Affiliate URL. Will use this first.', 'aubreypwd-stoicism' ),
			'id'       => 'affiliate_url',
			'type'     => 'text_url',
		) );

		// Normal link.
		$this->metabox->add_field( array(
			'name'     => esc_html__( 'Normal URL', 'aubreypwd-stoicism' ),
			'desc'     => esc_html__( 'The non-affiliate normal URL to the resource. Used when there is no affiliate link.', 'aubreypwd-stoicism' ),
			'id'       => 'normal_url',
			'type'     => 'text_url',
		) );
	}
}
