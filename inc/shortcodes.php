<?php
/**
 * Available Cocoa Shortcodes
 *
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Cocoa Shortcodes
/*-----------------------------------------------------------------------------------*/
// Enable shortcodes in widget areas
add_filter( 'widget_text', 'do_shortcode' );

// Replace WP autop formatting
if (!function_exists( "cocoa_remove_wpautop")) {
	function cocoa_remove_wpautop($content) {
		$content = do_shortcode( shortcode_unautop( $content ) );
		$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
		return $content;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Multi Columns Shortcodes
/* Don't forget to add "_last" behind the shortcode if it is the last column.
/*-----------------------------------------------------------------------------------*/

// Two Columns
function cocoa_shortcode_two_columns_one( $atts, $content = null ) {
   return '<div class="two-columns-one">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one', 'cocoa_shortcode_two_columns_one' );

function cocoa_shortcode_two_columns_one_last( $atts, $content = null ) {
   return '<div class="two-columns-one last">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one_last', 'cocoa_shortcode_two_columns_one_last' );

// Three Columns
function cocoa_shortcode_three_columns_one($atts, $content = null) {
   return '<div class="three-columns-one">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one', 'cocoa_shortcode_three_columns_one' );

function cocoa_shortcode_three_columns_one_last($atts, $content = null) {
   return '<div class="three-columns-one last">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one_last', 'cocoa_shortcode_three_columns_one_last' );

function cocoa_shortcode_three_columns_two($atts, $content = null) {
   return '<div class="three-columns-two">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two', 'cocoa_shortcode_three_columns_two' );

function cocoa_shortcode_three_columns_two_last($atts, $content = null) {
   return '<div class="three-columns-two last">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two_last', 'cocoa_shortcode_three_columns_two_last' );

// Four Columns
function cocoa_shortcode_four_columns_one($atts, $content = null) {
   return '<div class="four-columns-one">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one', 'cocoa_shortcode_four_columns_one' );

function cocoa_shortcode_four_columns_one_last($atts, $content = null) {
   return '<div class="four-columns-one last">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one_last', 'cocoa_shortcode_four_columns_one_last' );

function cocoa_shortcode_four_columns_two($atts, $content = null) {
   return '<div class="four-columns-two">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two', 'cocoa_shortcode_four_columns_two' );

function cocoa_shortcode_four_columns_two_last($atts, $content = null) {
   return '<div class="four-columns-two last">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two_last', 'cocoa_shortcode_four_columns_two_last' );

function cocoa_shortcode_four_columns_three($atts, $content = null) {
   return '<div class="four-columns-three">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three', 'cocoa_shortcode_four_columns_three' );

function cocoa_shortcode_four_columns_three_last($atts, $content = null) {
   return '<div class="four-columns-three last">' . cocoa_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three_last', 'cocoa_shortcode_four_columns_three_last' );


// Divide Text Shortcode
function cocoa_shortcode_divider($atts, $content = null) {
   return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'cocoa_shortcode_divider' );


/*-----------------------------------------------------------------------------------*/
/* Info Boxes Shortcodes
/*-----------------------------------------------------------------------------------*/

function cocoa_shortcode_white_box($atts, $content = null) {
   return '<div class="white-box">' . do_shortcode( cocoa_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'white_box', 'cocoa_shortcode_white_box' );

function cocoa_shortcode_yellow_box($atts, $content = null) {
   return '<div class="yellow-box">' . do_shortcode( cocoa_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'yellow_box', 'cocoa_shortcode_yellow_box' );

function cocoa_shortcode_red_box($atts, $content = null) {
   return '<div class="red-box">' . do_shortcode( cocoa_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'red_box', 'cocoa_shortcode_red_box' );

function cocoa_shortcode_blue_box($atts, $content = null) {
   return '<div class="blue-box">' . do_shortcode( cocoa_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'blue_box', 'cocoa_shortcode_blue_box' );

function cocoa_shortcode_green_box($atts, $content = null) {
   return '<div class="green-box">' . do_shortcode( cocoa_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'green_box', 'cocoa_shortcode_green_box' );

function cocoa_shortcode_lightgrey_box($atts, $content = null) {
   return '<div class="lightgrey-box">' . do_shortcode( cocoa_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'lightgrey_box', 'cocoa_shortcode_lightgrey_box' );

function cocoa_shortcode_grey_box($atts, $content = null) {
   return '<div class="grey-box">' . do_shortcode( cocoa_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'grey_box', 'cocoa_shortcode_grey_box' );

function cocoa_shortcode_dark_box($atts, $content = null) {
   return '<div class="dark-box">' . do_shortcode( cocoa_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'dark_box', 'cocoa_shortcode_dark_box' );


/*-----------------------------------------------------------------------------------*/
/* Buttons Shortcodes
/*-----------------------------------------------------------------------------------*/
function cocoa_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target' => '',
    'color'	=> '',
    'size'	=> '',
	 'form'	=> '',
	 'font'	=> '',
    ), $atts));

	$color = ($color) ? ' '.$color. '-btn' : '';
	$size = ($size) ? ' '.$size. '-btn' : '';
	$form = ($form) ? ' '.$form. '-btn' : '';
	$font = ($font) ? ' '.$font. '-btn' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="standard-btn' .$color.$size.$form.$font. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

    return $out;
}
add_shortcode('button', 'cocoa_button');

