<?php
/**
 * The template used for displaying the archive page content.
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>

	<div class="entry-wrap">
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- end .entry-header -->

		<div class="entry-content cf">
			<h6><?php _e('The Latest 30 Posts', 'cocoa') ?></h6>
			<div class="archive-2columns">
				<?php the_content(); ?>

				<ul class="archive-posts">
					<?php wp_get_archives('type=postbypost&limit=30'); ?>
				</ul>
			</div><!-- end .archive-2columns -->

			<h6><?php _e('Filter by Month', 'cocoa') ?></h6>
			<ul class="archive-months cf">
				<?php wp_get_archives('type=monthly'); ?>
			</ul>

			<h6 class="headline-cats"><?php _e('Filter by Categories', 'cocoa') ?></h6>
			<ul class="archive-cats cf">
				<?php wp_list_categories('title_li=&hierarchical=0'); ?>
			</ul>

			<h6 class="headline-tags"><?php _e('Filter by Tag', 'cocoa') ?></h6>
			<div class="archive-tags cf">
				<?php wp_tag_cloud(); ?>
			</div>

		</div><!-- end .entry-content -->
	</div><!-- end .entry-wrap -->

</article><!-- end post-<?php the_ID(); ?> -->