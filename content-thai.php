<?php
/**
 * The default template for displaying thai content
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="entry-details">
					<div class="entry-date">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
					</div><!-- end .entry-date -->
					<div class="entry-author">
					<?php
						printf( __( 'by <a href="%1$s" title="%2$s">%3$s</a>', 'cocoa' ),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						sprintf( esc_attr__( 'All posts by %s', 'cocoa' ), get_the_author() ),
						get_the_author() );
					?>
					</div><!-- end .entry-author -->
					<?php edit_post_link( __( 'Edit', 'cocoa' ), '<div class="entry-edit">', '</div>' ); ?>
					<?php if ( comments_open() ) : ?>
					<div class="entry-comments">
						<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'cocoa' ) . '</span>', __( 'comment 1', 'cocoa' ), __( 'comments %', 'cocoa' ) ); ?>
					</div><!-- end .entry-comments -->
					<?php endif; // comments_open() ?>
					<div class="entry-cats">
						<?php the_category(' / '); ?>
					</div><!-- end .entry-cats -->
			</div><!-- end .entry-details -->
		</header><!-- end .entry-header -->

		<div class="entry-wrap">
		<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cocoa' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('default-thumb'); ?></a>
			</div><!-- end .entry-thumbnail -->
		<?php endif; ?>

            <div class="entry-content">
                <?php the_content( __( 'Read More', 'cocoa' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'cocoa' ), 'after' => '</div>' ) ); ?>
            </div><!-- end .entry-content -->

	</div><!-- end .entry-wrap -->

</article><!-- end post -<?php the_ID(); ?> -->