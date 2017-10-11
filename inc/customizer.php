<?php
/**
 * Cocoa Theme Customizer
 *
 * @package Cocoa
 * @since Cocoa 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since Cocoa 1.0
 */
function cocoa_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'cocoa_themeoptions', array(
		'title'         => __( 'Theme', 'cocoa' ),
		'priority'      => 135,
	) );

	// Add the custom settings and controls.
	$wp_customize->add_setting( 'header_textcolor' , array(
    	'default'     => '#000',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_setting( 'link_color' , array(
    	'default'     => '#000',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'        => __( 'Link Color', 'cocoa' ),
		'section'    => 'colors',
		'settings'   => 'link_color',
	) ) );

	$wp_customize->add_setting( 'menubtn_color' , array(
    	'default'     => '#000',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menubtn_color', array(
		'label'        => __( 'Menu Button Color', 'cocoa' ),
		'section'    => 'colors',
		'settings'   => 'menubtn_color',
	) ) );

	$wp_customize->add_setting( 'footer_text', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'footer_text', array(
		'label'         => __( 'Custom Footer Text', 'cocoa' ),
		'section'       => 'cocoa_themeoptions',
		'type'          => 'text',
	) );

}
add_action( 'customize_register', 'cocoa_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cocoa_customize_preview_js() {
	wp_enqueue_script( 'cocoa-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131221', true );
}
add_action( 'customize_preview_init', 'cocoa_customize_preview_js' );