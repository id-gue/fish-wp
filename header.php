<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main-wrap">
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */
 ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ie-only.css" />
	<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="mobile-btns">
		<a href="#" id="mobile-open-btn"><span><?php _e('Open', 'cocoa') ?></span></a>
		<a href="#" id="mobile-close-btn"><span><?php _e('Close', 'cocoa') ?></span></a>
	</div><!-- end #mobile-btns -->

	<div id="mobile-container">
	<nav id="site-nav" class="cf">
		<div class="menu-wrap">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'false') ); ?>
		</div><!-- end .menu-wrap -->
	</nav><!-- end #site-nav -->

	<?php if ( is_active_sidebar( 'header-sidebar' ) ) : ?>
	<div class="desktop-btns">
		<a href="#" id="desktop-open-btn"><span><?php _e('Open', 'cocoa') ?></span></a>
		<a href="#" id="desktop-close-btn"><span><?php _e('Close', 'cocoa') ?></span></a>
	</div><!-- end .desktop-btns -->
	<div class="overlay-wrap">
		<div id="header-widgets" class="widget-area cf" role="complementary">
			<?php dynamic_sidebar( 'header-sidebar' ); ?>
		</div><!-- end #header-widgets -->
	</div><!-- end .header-overlay -->
	<?php endif; ?>

	</div><!-- end .mobile-container -->

	<div id="container">
	<header id="masthead" class="cf" role="banner">
		<div id="site-title" class="clearfix">
			<?php if ( get_header_image() ) : ?>
			<div id="site-header">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				</a>
			</div><!-- end #site-header -->
			<?php endif; ?>
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php if ( '' != get_bloginfo('description') ) : ?>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>
		</div><!-- end #site-title -->

		<?php if ( is_active_sidebar( 'sidebar-about' )  && is_front_page() ) : ?>
		<div id="site-about" class="widget-area cf" role="complementary">
			<?php dynamic_sidebar( 'sidebar-about' ); ?>
		</div><!-- #site-about -->
		<?php endif; ?>

	</header><!-- end #masthead -->

<div id="main-wrap">