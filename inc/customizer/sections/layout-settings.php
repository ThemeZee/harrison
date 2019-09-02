<?php
/**
 * Layout Settings
 *
 * Register Layout Settings section, settings and controls for Theme Customizer
 *
 * @package Codename
 */

/**
 * Adds Layout settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function codename_customize_register_layout_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'codename_section_layout', array(
		'title'    => esc_html__( 'Layout Settings', 'codename' ),
		'priority' => 10,
		'panel'    => 'codename_options_panel',
	) );

	// Get Default Settings.
	$default = codename_default_options();

	// Add Settings and Controls for theme layout.
	$wp_customize->add_setting( 'codename_theme_options[theme_layout]', array(
		'default'           => $default['theme_layout'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_select',
	) );

	$wp_customize->add_control( 'codename_theme_options[theme_layout]', array(
		'label'    => esc_html__( 'Theme Layout', 'codename' ),
		'section'  => 'codename_section_layout',
		'settings' => 'codename_theme_options[theme_layout]',
		'type'     => 'select',
		'priority' => 10,
		'choices'  => array(
			'centered' => esc_html__( 'Centered Layout', 'codename' ),
			'wide'     => esc_html__( 'Wide Layout', 'codename' ),
		),
	) );

	// Add Settings and Controls for header layout.
	$wp_customize->add_setting( 'codename_theme_options[header_layout]', array(
		'default'           => $default['header_layout'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_select',
	) );

	$wp_customize->add_control( 'codename_theme_options[header_layout]', array(
		'label'    => esc_html__( 'Header Layout', 'codename' ),
		'section'  => 'codename_section_layout',
		'settings' => 'codename_theme_options[header_layout]',
		'type'     => 'select',
		'priority' => 20,
		'choices'  => array(
			'horizontal' => esc_html__( 'Horizontal', 'codename' ),
			'vertical'   => esc_html__( 'Vertical', 'codename' ),
		),
	) );
}
add_action( 'customize_register', 'codename_customize_register_layout_settings' );
