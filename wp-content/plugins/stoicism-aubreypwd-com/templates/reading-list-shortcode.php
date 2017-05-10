<?php
/**
 * Shows the reading list shortcode content.
 *
 * @since 1.0.0
 */

if ( ! isset( $reading_lists ) ) {

	// This template is being loaded without a query.
	return;
}
?>

<?php if ( $reading_lists->have_posts() ) : ?>
	<ul>
		<?php while ( $reading_lists->have_posts() ) : $reading_lists->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
	</ul>
<?php endif;

// Reset post data.
wp_reset_postdata();
