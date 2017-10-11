<?php
/**
 * Cocoa functions and definitions
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
    $content_width = 960;

/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/

function cocoa_setup() {

	// Make Cocoa available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'cocoa', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css' ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu().
	register_nav_menus( array (
		'primary' => __( 'Top primary menu', 'cocoa' ),
		'social' => __( 'Social menu', 'cocoa' ),
	) );

	// This theme supports all available post formats.
	add_theme_support( 'post-formats', array (
		'aside', 'link', 'quote', 'status', 'video', 'image'
	) );

	// Implement the Custom Header feature
	require get_template_directory() . '/inc/custom-header.php';

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'cocoa_custom_background_args', array(
		'default-color'	=> 'fff',
		'default-image'	=> '',
	) ) );

	// This theme supports infinite scroll.
	add_theme_support( 'infinite-scroll', array(
    	'container' => 'primary',
    	'footer_widgets' => 'footer-sidebar',
	) );

	// This theme uses post thumbnails.
	add_theme_support( 'post-thumbnails' );

	//  Adding several sizes for Post Thumbnails
	add_image_size( 'default-thumb', 1194 ); // Default post thumbnails (1194 pixels wide + unlimited height)
	add_image_size( 'recentpost-thumb', 450, 231, true ); // Recent Posts by Cateory thumbnails (cropped)

}
add_action( 'after_setup_theme', 'cocoa_setup' );


/*-----------------------------------------------------------------------------------*/
/*  Register Libre Baskerville Google font for Cocoa
/*-----------------------------------------------------------------------------------*/

function cocoa_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Libre Baskerville, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Libre Baskerville font: on or off', 'cocoa' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Libre Baskerville:400,700,400italic&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}


/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/

function cocoa_scripts() {
	global $wp_styles;

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	/// Loads JavaScript for scalable videos
	wp_enqueue_script( 'cocoa-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '2.0.5' );

	// FitVids for responsive videos
	wp_enqueue_script( 'cocoa-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1' );

	// Loads Custom Cocoa JavaScript functionality
	wp_enqueue_script( 'cocoa-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140426' );

	// Add Libre Baskerville font, used in the main stylesheet.
	wp_enqueue_style( 'cocoa-baskerville', cocoa_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	// Loads main stylesheet.
	wp_enqueue_style( 'cocoa-style', get_stylesheet_uri(), array(), '20140501' );

}
add_action( 'wp_enqueue_scripts', 'cocoa_scripts' );


/*-----------------------------------------------------------------------------------*/
/* Creates a nicely formatted and more specific title element text
/* for output in head of document, based on current view.
/*-----------------------------------------------------------------------------------*/

function cocoa_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'cocoa' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'cocoa_wp_title', 10, 2 );


/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/

function cocoa_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'cocoa_page_menu_args' );


/*-----------------------------------------------------------------------------------*/
/* Sets the authordata global when viewing an author archive.
/*-----------------------------------------------------------------------------------*/

function cocoa_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'cocoa_setup_author' );


/*-----------------------------------------------------------------------------------*/
/* Sets the post excerpt length.
/*-----------------------------------------------------------------------------------*/

function cocoa_excerptlength_widget( $length ) {

	return 30;
}
function cocoa_excerptlength_archives( $length ) {

    return 75;
}

function cocoa_excerpt( $length_callback = '', $more_callback = '' ) {

    if ( function_exists( $length_callback ) )
        add_filter( 'excerpt_length', $length_callback );

    if ( function_exists( $more_callback ) )
        add_filter( 'excerpt_more', $more_callback );

    $output = get_the_excerpt();
    $output = apply_filters( 'wptexturize', $output );
    $output = apply_filters( 'convert_chars', $output );
    $output = '<p>' . $output . '</p>'; // maybe wpautop( $foo, $br )
    echo $output;
}


/*-----------------------------------------------------------------------------------*/
/* Add Theme Customizer CSS
/*-----------------------------------------------------------------------------------*/

function cocoa_customize_css() {
    ?>
	<style type="text/css">
		.entry-content p a,
		blockquote cite a,
		.textwidget a,
		.about-text-wrap a,
		#comments .comment-text a,
		.authorbox p.author-description a,
		.entry-content p a:hover,
		blockquote cite a:hover,
		#comments .comment-text a:hover,
		.authorbox p.author-description a:hover {color: <?php echo get_theme_mod('link_color'); ?>;}
		a#mobile-open-btn,
		a#mobile-close-btn,
		a#desktop-open-btn,
		a#desktop-close-btn {
			color: <?php echo get_theme_mod('menubtn_color'); ?>;
		}
	</style>
    <?php
}
add_action( 'wp_head', 'cocoa_customize_css');


/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/

add_filter('use_default_gallery_style', '__return_false');


if ( ! function_exists( 'cocoa_comment' ) ) :
/*-----------------------------------------------------------------------------------*/
/* Comments template cocoa_comment
/*-----------------------------------------------------------------------------------*/
function cocoa_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">

			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 45 ); ?>
			</div>

			<div class="comment-details cf">
				<div class="comment-author">
					<?php printf( __( '%s <span class="says">says</span>', 'cocoa' ), wp_kses_post( sprintf( '%s', get_comment_author_link() ) ) ); ?>
				</div><!-- end .comment-author -->
				<ul class="comment-meta">
					<li class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
						/* translators: 1: date */
							printf( __( '%1$s' ),
							get_comment_date());
						?></a>
					</li>
					<?php edit_comment_link();?>
				</ul><!-- end .comment-meta -->

			</div><!-- end .comment-details -->

			<div class="comment-text">
			<?php comment_text(); ?>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'cocoa' ); ?></p>
				<?php endif; ?>
			</div><!-- end .comment-text -->
			<?php if ( comments_open () ) : ?>
				<div class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'cocoa' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
			<?php endif; ?>

		</article><!-- end .comment -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="pingback">
		<p><?php _e( '<span>Pingback:</span>', 'cocoa' ); ?> <?php comment_author_link(); ?></p>
		<p class="pingback-edit"><?php edit_comment_link(); ?></p>
	<?php
			break;
	endswitch;
}
endif;


/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/

function cocoa_widgets_init() {

	register_sidebar( array (
		'name' => __( 'Footer Widget Area', 'cocoa' ),
		'id' => 'footer-sidebar',
		'description' => __( 'Widgets will appear in a single-column footer widget area.', 'cocoa' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title-wrap"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	) );

	register_sidebar( array (
		'name' => __( 'Header Widget Area', 'cocoa' ),
		'id' => 'header-sidebar',
		'description' => __( 'Widgets will appear in an overlay header widget area.', 'cocoa' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s cf">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title-wrap"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	) );

}
add_action( 'widgets_init', 'cocoa_widgets_init' );


if ( ! function_exists( 'cocoa_content_nav' ) ) :


/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous pages when applicable.
/*-----------------------------------------------------------------------------------*/

function cocoa_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="nav-wrap cf">
			<nav id="<?php echo $nav_id; ?>">
				<div class="nav-previous"><?php next_posts_link( __( '<span>Previous Posts</span>', 'cocoa'  ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( '<span>Next Posts</span>', 'cocoa' ) ); ?></div>
			</nav>
		</div><!-- end .nav-wrap -->
	<?php endif;
}

endif; // cocoa_content_nav


/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous post when applicable.
/*-----------------------------------------------------------------------------------*/

function cocoa_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="nav-wrap cf">
		<nav id="nav-single">
			<div class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">Previous Post</span>%title', 'cocoa' ) ); ?></div>
			<div class="nav-next"><?php next_post_link('%link', __( '<span class="meta-nav">Next Post</span>%title', 'cocoa' ) ); ?></div>
		</nav><!-- #nav-single -->
	</div><!-- end .nav-wrap -->
	<?php
}


/*-----------------------------------------------------------------------------------*/
/* Extends the default WordPress body classes
/*-----------------------------------------------------------------------------------*/
function cocoa_body_class( $classes ) {

	// add 'info-close' to the $classes array
	$classes[] = 'info-close';

	// add 'nav-close' to the $classes array
	$classes[] = 'nav-close';

	if ( is_page_template( 'page-templates/page-archive.php' ) )
		$classes[] = 'template-archive';

    if ( is_page_template( 'page-templates/page-thai.php' ) ){
        foreach( $classes as $key => $value) {
            if ($value == 'page') {
                unset( $classes[$key] );
            }
        }
    }

	return $classes;
}
add_filter( 'body_class', 'cocoa_body_class' );


/*-----------------------------------------------------------------------------------*/
/* Customizer additions
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';

/*-----------------------------------------------------------------------------------*/
/* Grab the Cocoa Custom widgets.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/widgets.php' );

/*-----------------------------------------------------------------------------------*/
/* Grab the Cocoa Custom shortcodes.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/shortcodes.php' );

