<?php
/**
 * Shows the baby step shortcode content.
 *
 * @since 1.0.0
 */

if ( ! isset( $baby_steps ) ) {

	// This template is being loaded without a query.
	return;
}
?>

<?php if ( $baby_steps->have_posts() ) : ?>
	<ul>
		<?php while ( $baby_steps->have_posts() ) : $baby_steps->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
	</ul>
<?php endif;

// Reset post data.
wp_reset_postdata();
