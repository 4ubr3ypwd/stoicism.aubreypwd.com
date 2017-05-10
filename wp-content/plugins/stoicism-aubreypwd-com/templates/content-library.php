<?php
/**
 * Library single content.
 *
 * @since  1.0.0
 */
?>

<p class="the-library-thumbnail-image">
	<?php display_the_library_thumbnail_image(); ?>
</p>

<dl class="the-library-details">

	<!-- Link -->
	<dt><?php esc_html_e( 'Link', 'aubreypwd-stoicism' ); ?></dt>
	<dd><?php display_the_library_link(); ?></dd>

	<!-- Description -->
	<dt><?php esc_html_e( 'Description', 'aubreypwd-stoicism' ); ?></dt>
	<dd><?php display_the_library_description(); ?></dd>

	<!-- Notes -->
	<dt><?php esc_html_e( 'My Notes', 'aubreypwd-stoicism' ); ?></dt>
	<dd><?php display_the_library_notes(); ?></dd>
</dl>
