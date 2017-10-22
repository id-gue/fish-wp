<?php
/**
 * The main template file.
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content cf" role="main">
		<?php
            // Start the Loop.
            query_posts(
                array(
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'taxonomy'  => 'category',
                            'field'     => 'name',
                            'terms'     => 'main'
                        )
                    )
                )
            );

            while ( have_posts() ) : the_post();

                get_template_part( 'content', 'detailed' );

            endwhile;
		?>
	</div><!-- end #primary -->

	<?php
		// Previous/next post navigation.
		cocoa_content_nav( 'nav-below' ); ?>

	<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
	<div id="footer-widgets" class="widget-area cf" role="complementary">
		<?php dynamic_sidebar( 'footer-sidebar' ); ?>
	</div><!-- end #footer-widgets -->
	<?php endif; ?>

<?php get_footer(); ?>