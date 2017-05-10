<?php

namespace aubreypwd\Stoicism;

/**
 * Template.
 *
 * This replaces everything between the header and footer with something else.
 *
 * @author Aubrey Portwood
 * @since  1.0.0
 */
class Template {

	/**
	 * Arguments (defaults).
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 *
	 * @var array
	 */
	private $args = array(
		'taxonomy'  => '',
		'template'  => '',
	);

	/**
	 * Create CPT.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	function __construct( $args ) {

		// Set any new args.
		$this->args = (object) wp_parse_args( $args, $this->args );

		// Init on template redirect.
		add_action( 'template_redirect', array( $this, 'replace_template' ) );
	}

	/**
	 * Replace the template.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 */
	public function replace_template() {

		// The current queried object.
		$queried_object = get_queried_object();

		$template = is_string( $this->args->template ) && '' !== $this->args->template;
		$taxonomy = is_string( $this->args->taxonomy ) && is_a( $queried_object, 'WP_Term' ) && $this->args->taxonomy === $queried_object->taxonomy;

		if ( $template && $taxonomy ) {
			add_action( 'template_include', array( $this, 'template' ) );
		}
	}

	/**
	 * Load a different template.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 *
	 * @param  string $template The template to load.
	 * @return string           The template to load (possibly our template).
	 */
	public function template( $template ) {
		if ( ! is_string( $this->args->template ) ) {

			// Only add the template on the given post type.
			return $template;
		}

		// The template we should load.
		$file = dirname( __FILE__ ) . "/templates/{$this->args->template}";

		if ( stream_resolve_include_path( $file ) ) {

			// Use our template instead.
			return $file;
		}

		// Return the template with any additional template template added to it.
		return $template;
	}
}
