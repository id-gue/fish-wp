<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
		?>
	</div><!-- end #primary -->

	<?php
		// Previous/next post navigation.
		cocoa_post_nav( 'nav-single' ); ?>

	<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
	<div id="footer-widgets" class="widget-area cf" role="complementary">
		<?php dynamic_sidebar( 'footer-sidebar' ); ?>
	</div><!-- end #footer-widgets -->
	<?php endif; ?>

<?php get_footer(); ?>