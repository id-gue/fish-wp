<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */

get_header(); ?>

<div id="primary" class="site-content cf" role="main">

	<?php if ( have_posts() ) : ?>

		<header class="archive-header">
			<h2 class="archive-title">
			<?php
			if ( is_category() ) :
				printf( __( 'All posts filed under: %s', 'cocoa' ), '<span>' . single_cat_title( '', false ) . '</span>' );

			elseif ( is_tag() ) :
				printf( __( 'All posts tagged: %s', 'cocoa' ), '<span>' . single_tag_title( '', false ) . '</span>' );

			elseif ( is_author() ) :
				printf( __( 'Author: %s', 'cocoa' ), '<span class="vcard">' . get_the_author() . '</span>' );

			elseif ( is_day() ) :
				printf( __( 'Day: %s', 'cocoa' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( 'Month: %s', 'cocoa' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( 'Year: %s', 'cocoa' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			else :
				_e( 'Archives', 'cocoa' );

			endif;
			?>
			</h2>
			<?php
			if ( is_category() ) {
				// show an optional category description
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

				} elseif ( is_tag() ) {
				// show an optional tag description
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) )
					echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
				}
			?>
		</header><!-- end .archive-header -->

		<?php rewind_posts(); ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'cocoa' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'cocoa' ); ?></p>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

</div><!-- end #primary -->

		<?php cocoa_content_nav( 'nav-below' ); ?>

<?php get_footer(); ?>