<?php
/**
 * Baby Step Level Taxonomy Template.
 *
 * @since  1.0.0
 */

get_header(); ?>

<header class="page-header">
	<h1 class="page-title"><?php single_cat_title(); ?></h1>

	<!-- The term description -->
	<p class="term-description entry-content"><?php echo term_description( get_queried_object_id(), 'baby-step-level' ); ?></p>
</header>

<?php if ( have_posts() ) : ?>

	<!-- The list of posts in that term -->
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<header class="page-header">
					<h4><a href="<?php get_the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>

<?php else : ?>

	<p><?php esc_html_e( 'No steps.', 'aubreypwd-stoicism' ); ?></p>

<?php endif; ?>

<?php function_exists( 'penscratch_paging_nav' ) ? penscratch_paging_nav() : void; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
