<?php
/**
 * Shows the baby step shortcode content.
 *
 * @since 1.0.0
 */
?>

<?php if ( $baby_steps->have_posts() ) : ?>
	<ol>
		<?php while ( $baby_steps->have_posts() ) : $baby_steps->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
	</ol>
<?php endif;

// Reset post data.
wp_reset_postdata();
