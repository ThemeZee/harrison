<?php
/**
 * Typography Settings
 *
 * Register Typography Settings
 *
 * @package Codename
 */

/**
 * Adds all Typography settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function codename_customize_register_typography_settings( $wp_customize ) {

	// Add Section for Theme Fonts.
	$wp_customize->add_section( 'codename_section_typography', array(
		'title'    => esc_html__( 'Typography', 'codename' ),
		'priority' => 20,
		'panel'    => 'codename_options_panel',
	) );

	// Get Default Fonts from settings.
	$default = codename_default_options();

	// Add Text Font setting.
	$wp_customize->add_setting( 'codename_theme_options[text_font]', array(
		'default'           => $default['text_font'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Codename_Customize_Font_Control(
		$wp_customize, 'text_font', array(
			'label'    => esc_html__( 'Body Font', 'codename' ),
			'section'  => 'codename_section_typography',
			'settings' => 'codename_theme_options[text_font]',
			'priority' => 10,
		)
	) );

	// Add Title Font setting.
	$wp_customize->add_setting( 'codename_theme_options[title_font]', array(
		'default'           => $default['title_font'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Codename_Customize_Font_Control(
		$wp_customize, 'title_font', array(
			'label'    => esc_html_x( 'Headings', 'Font Setting', 'codename' ),
			'section'  => 'codename_section_typography',
			'settings' => 'codename_theme_options[title_font]',
			'priority' => 20,
		)
	) );

	// Add Title Font Weight setting.
	$wp_customize->add_setting( 'codename_theme_options[title_is_bold]', array(
		'default'           => $default['title_is_bold'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'codename_theme_options[title_is_bold]', array(
		'label'    => esc_html_x( 'Bold', 'Font Setting', 'codename' ),
		'section'  => 'codename_section_typography',
		'settings' => 'codename_theme_options[title_is_bold]',
		'type'     => 'checkbox',
		'priority' => 30,
	) );

	// Add Title Uppercase setting.
	$wp_customize->add_setting( 'codename_theme_options[title_is_uppercase]', array(
		'default'           => $default['title_is_uppercase'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'codename_theme_options[title_is_uppercase]', array(
		'label'    => esc_html_x( 'Uppercase', 'Font Setting', 'codename' ),
		'section'  => 'codename_section_typography',
		'settings' => 'codename_theme_options[title_is_uppercase]',
		'type'     => 'checkbox',
		'priority' => 40,
	) );

	// Add Navigation Font setting.
	$wp_customize->add_setting( 'codename_theme_options[navi_font]', array(
		'default'           => $default['navi_font'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Codename_Customize_Font_Control(
		$wp_customize, 'navi_font', array(
			'label'    => esc_html_x( 'Navigation', 'Font Setting', 'codename' ),
			'section'  => 'codename_section_typography',
			'settings' => 'codename_theme_options[navi_font]',
			'priority' => 50,
		)
	) );

	// Add Navi Font Weight setting.
	$wp_customize->add_setting( 'codename_theme_options[navi_is_bold]', array(
		'default'           => $default['navi_is_bold'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'codename_theme_options[navi_is_bold]', array(
		'label'    => esc_html_x( 'Bold', 'Font Setting', 'codename' ),
		'section'  => 'codename_section_typography',
		'settings' => 'codename_theme_options[navi_is_bold]',
		'type'     => 'checkbox',
		'priority' => 60,
	) );

	// Add Navi Uppercase setting.
	$wp_customize->add_setting( 'codename_theme_options[navi_is_uppercase]', array(
		'default'           => $default['navi_is_uppercase'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'codename_theme_options[navi_is_uppercase]', array(
		'label'    => esc_html_x( 'Uppercase', 'Font Setting', 'codename' ),
		'section'  => 'codename_section_typography',
		'settings' => 'codename_theme_options[navi_is_uppercase]',
		'type'     => 'checkbox',
		'priority' => 70,
	) );

	// Add GT Local Fonts control.
	if ( ! class_exists( 'ThemeZee_Local_Fonts' ) ) {
		$wp_customize->add_control( new Codename_Customize_Plugin_Control(
			$wp_customize, 'gt_local_fonts_plugin', array(
				'label'       => esc_html__( 'More Fonts', 'codename' ),
				'description' => esc_html__( 'You can install the GT Local Fonts plugin to extend the typography options with additional local GDPR-compatible fonts.', 'codename' ),
				'section'     => 'codename_section_typography',
				'settings'    => array(),
				'priority'    => 80,
			)
		) );
	}
}
add_action( 'customize_register', 'codename_customize_register_typography_settings' );