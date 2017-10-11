<?php
/**
 * Template Name: Archive Page
 * Description: An archive page template
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */

get_header(); ?>

<div id="primary" class="site-content cf" role="main">

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the archive page content template.
			get_template_part( 'content', 'archive' );

		endwhile;
	?>

	</div><!-- end #primary -->

<?php get_footer(); ?>