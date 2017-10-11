<?php
/**
 * The template for displaying search results.
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */

get_header(); ?>

<div id="primary" class="site-content cf" role="main">

	<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h2 class="archive-title"><?php echo absint($wp_query->found_posts); ?> <?php printf( __( 'Search Results for: %s', 'cocoa' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			</header><!--end .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php	get_template_part( 'content' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php else : ?>

			<article id="post-0" class="page no-results not-found">
				<div class="entry-wrap">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'cocoa' ); ?></h1>
					</header><!--end .entry-header -->
					<div class="entry-content cf">
						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cocoa' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- end .entry-content -->
				</div><!-- end .entry-wrap -->
			</article>

	<?php endif; ?>

</div><!-- end #primary -->

<?php cocoa_content_nav( 'nav-below' ); ?>

<?php get_footer(); ?>