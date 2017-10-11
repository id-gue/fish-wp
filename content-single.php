<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_format() ) : // Sticky Headers only for Standard Posts. ?>
		<header class="entry-header">
	<?php else : ?>
		<header class="entry-header-single">
	<?php endif; ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
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
					<?php $tags_list = get_the_tag_list();
					if ( $tags_list ): ?>
						<div class="entry-tags"><?php the_tags('<ul><li>',' / ','</li></ul>'); ?></div>
					<?php endif; // get_the_tag_list() ?>
				</div><!-- end .entry-details -->
		</header><!-- end .entry-header -->

		<div class="entry-wrap">
		<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'cocoa' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('default-thumb'); ?></a>
			</div><!-- end .entry-thumbnail -->
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'cocoa' ), 'after' => '</div>' ) ); ?>
		</div><!-- end .entry-content -->

		<?php if ( ! get_post_format() && ( get_the_author_meta( 'description' )) ): // Show author bio only for standard posts ?>
		<div class="authorbox cf">
			<div class="author-info">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'cocoa_author_bio_avatar_size', 90 ) ); ?>
				<p class="author-name"><span><?php _e('The Author', 'cocoa') ?></span><?php printf( "<a href='" .  esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) . "' rel='author'>" . get_the_author() . "</a>" ); ?></p>
				<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
			</div><!-- end .author-info -->
		</div><!-- end .author-wrap -->
	<?php endif; ?>
	</div><!-- end .entry-wrap -->

</article><!-- end .post-<?php the_ID(); ?> -->