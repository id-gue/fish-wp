<?php
/**
 * The template used for displaying page content.
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

		<div class="entry-content clearfix">
			<?php
			$note_value = get_post_meta( get_the_ID(), 'sidenote', true );
			// check if the note custom field has a value
			if( ! empty( $note_value ) ) {
				echo '<div class="page-note"> ' . ( wp_kses_post($note_value) ) . ' </div>';
			}
			?>
			<?php the_content(); ?>
		</div><!-- end .entry-content -->
	</div><!-- end .entry-wrap -->

</article><!-- end post-<?php the_ID(); ?> -->