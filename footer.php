<?php
/**
 * The template for displaying the footer.
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */
?>

<footer id="colophon" class="site-footer cf">
	<div class="footer-search">
		<?php get_template_part( 'searchform-footer' ); ?>
	</div><!-- end .footer-search -->

	<div id="site-info">
		<ul class="credit" role="contentinfo">
			<?php if ( get_theme_mod( 'footer_text' ) ) : ?>
				<li><?php echo wp_kses_post( get_theme_mod( 'footer_text' ) ); ?></li>
			<?php else : ?>
			<li class="copyright"><?php _e('Copyright', 'cocoa') ?> &copy; <?php echo date('Y'); ?> <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo(); ?>.</a></li>
			<li class="wp-credit">
				<?php _e('Proudly powered by', 'cocoa') ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'cocoa' ) ); ?>" ><?php _e('WordPress.', 'cocoa') ?></a>
			</li>
			<li>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'cocoa' ), 'Cocoa', '<a href="http://www.elmastudio.de/en/" rel="designer">Elmastudio</a>' ); ?>
			</li>
			<?php endif; ?>
		</ul><!-- end .credit -->
	</div><!-- end #site-info -->

</footer><!-- end #colophon -->
</div><!-- end #main-wrap -->

</div><!-- end #container -->

<?php wp_footer(); ?>

</body>
</html>