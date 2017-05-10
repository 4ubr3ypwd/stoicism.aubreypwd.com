<?php
/**
 * Baby Step Level Taxonomy Template.
 *
 * @since  1.0.0
 */

get_header(); ?>

<h1><?php single_cat_title(); ?></h1>

<?php if ( have_posts() ) : ?>

	<ol>
		<?php while ( have_posts() ) : the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
			</li>
		<?php endwhile; ?>
	</ol>

<?php else : ?>

	<p><?php esc_html_e( 'No steps.', 'aubreypwd-stoicism' ); ?></p>

<?php endif; ?>

<?php function_exists( 'penscratch_paging_nav' ) ? penscratch_paging_nav() : void; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
