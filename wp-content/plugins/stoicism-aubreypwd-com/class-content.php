<?php

namespace aubreypwd\Stoicism;

/**
 * Content Template.
 *
 * This handles adding content to the_content filter.
 *
 * @author Aubrey Portwood
 * @since  1.0.0
 */
class Content {

	/**
	 * Arguments (defaults).
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 *
	 * @var array
	 */
	private $args = array(
		'post_type' => 'post',
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

		if ( is_string( $this->args->template ) && '' !== $this->args->template ) {

			// Filter the content if we have a template.
			add_filter( 'the_content', array( $this, 'add_template_to_the_content' ) );
		}
	}

	/**
	 * Add our template content to the_content.
	 *
	 * @author Aubrey Portwood
	 * @since  1.0.0
	 *
	 * @param  string $content The current content from the_content.
	 * @return string          The current content with the template added.
	 */
	public function add_template_to_the_content( $content ) {
		if ( get_post_type() !== $this->args->post_type || ! is_string( $this->args->template ) ) {

			// Only add the template on the given post type.
			return $content;
		}

		// The template we should load.
		$file = dirname( __FILE__ ) . "/templates/{$this->args->template}";

		if ( stream_resolve_include_path( $file ) ) {

			// Buffer the output.
			ob_start();

			// Of this template.s
			load_template( $file );

			// Add the template's content to the already existing content.
			$content .= ob_get_clean();
		}

		// Return the content with any additional template content added to it.
		return $content;
	}
}
