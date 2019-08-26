<?php
/**
 * Blog Settings
 *
 * Register Blog Settings section, settings and controls for Theme Customizer
 *
 * @package Codename
 */

/**
 * Adds blog settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function codename_customize_register_blog_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'codename_section_blog', array(
		'title'    => esc_html__( 'Blog Settings', 'codename' ),
		'priority' => 30,
		'panel'    => 'codename_options_panel',
	) );

	// Get Default Settings.
	$default = codename_default_options();

	// Add Settings and Controls for blog layout.
	$wp_customize->add_setting( 'codename_theme_options[blog_layout]', array(
		'default'           => $default['blog_layout'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_select',
	) );

	$wp_customize->add_control( 'codename_theme_options[blog_layout]', array(
		'label'    => esc_html__( 'Blog Layout', 'codename' ),
		'section'  => 'codename_section_blog',
		'settings' => 'codename_theme_options[blog_layout]',
		'type'     => 'select',
		'priority' => 10,
		'choices'  => array(
			'horizontal-list'   => esc_html__( 'Horizontal List', 'codename' ),
			'vertical-list'     => esc_html__( 'Vertical List', 'codename' ),
			'two-column-grid'   => esc_html__( 'Two Column Grid', 'codename' ),
			'three-column-grid' => esc_html__( 'Three Column Grid', 'codename' ),
		),
	) );

	// Add Settings and Controls for blog content.
	$wp_customize->add_setting( 'codename_theme_options[blog_content]', array(
		'default'           => $default['blog_content'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_select',
	) );

	$wp_customize->add_control( 'codename_theme_options[blog_content]', array(
		'label'    => esc_html__( 'Blog Content', 'codename' ),
		'section'  => 'codename_section_blog',
		'settings' => 'codename_theme_options[blog_content]',
		'type'     => 'radio',
		'priority' => 20,
		'choices'  => array(
			'index'   => esc_html__( 'Full post', 'codename' ),
			'excerpt' => esc_html__( 'Post excerpt', 'codename' ),
		),
	) );

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'codename_theme_options[excerpt_length]', array(
		'default'           => $default['excerpt_length'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'codename_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'codename' ),
		'section'  => 'codename_section_blog',
		'settings' => 'codename_theme_options[excerpt_length]',
		'type'     => 'text',
		'priority' => 30,
	) );

	// Add Setting and Control for Excerpt More Text.
	$wp_customize->add_setting( 'codename_theme_options[excerpt_more_text]', array(
		'default'           => $default['excerpt_more_text'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'codename_theme_options[excerpt_more_text]', array(
		'label'    => esc_html__( 'Excerpt More Text', 'codename' ),
		'section'  => 'codename_section_blog',
		'settings' => 'codename_theme_options[excerpt_more_text]',
		'type'     => 'text',
		'priority' => 40,
	) );

	// Add Partial for Blog Layout and Excerpt Length.
	$wp_customize->selective_refresh->add_partial( 'codename_blog_content_partial', array(
		'selector'         => '.site-main .post-wrapper',
		'settings'         => array(
			'codename_theme_options[blog_layout]',
			'codename_theme_options[blog_content]',
			'codename_theme_options[excerpt_length]',
			'codename_theme_options[excerpt_more_text]',
		),
		'render_callback'  => 'codename_customize_partial_blog_content',
		'fallback_refresh' => false,
	) );

	// Add Setting and Control for Read More Text.
	$wp_customize->add_setting( 'codename_theme_options[read_more_link]', array(
		'default'           => $default['read_more_link'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'codename_theme_options[read_more_link]', array(
		'label'    => esc_html__( 'Read More Link', 'codename' ),
		'section'  => 'codename_section_blog',
		'settings' => 'codename_theme_options[read_more_link]',
		'type'     => 'text',
		'priority' => 50,
	) );
}
add_action( 'customize_register', 'codename_customize_register_blog_settings' );

/**
 * Render the blog content for the selective refresh partial.
 */
function codename_customize_partial_blog_content() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content', esc_attr( codename_get_option( 'blog_content' ) ) );
	}
}
