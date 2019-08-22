<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Codename
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function codename_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'codename_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'codename' ),
		'priority' => 40,
		'panel'    => 'codename_options_panel',
	) );

	// Get Default Settings.
	$default = codename_default_options();

	// Add Post Details Headline.
	$wp_customize->add_control( new Codename_Customize_Header_Control(
		$wp_customize, 'codename_theme_options[post_details]', array(
			'label'    => esc_html__( 'Post Details', 'codename' ),
			'section'  => 'codename_section_post',
			'settings' => array(),
			'priority' => 20,
		)
	) );

	// Add Setting and Control for showing post date.
	$wp_customize->add_setting( 'codename_theme_options[meta_date]', array(
		'default'           => $default['meta_date'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'codename_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display date', 'codename' ),
		'section'  => 'codename_section_post',
		'settings' => 'codename_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 30,
	) );

	// Add Setting and Control for showing post author.
	$wp_customize->add_setting( 'codename_theme_options[meta_author]', array(
		'default'           => $default['meta_author'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'codename_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display author', 'codename' ),
		'section'  => 'codename_section_post',
		'settings' => 'codename_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 40,
	) );

	// Add Setting and Control for showing post categories.
	$wp_customize->add_setting( 'codename_theme_options[meta_categories]', array(
		'default'           => $default['meta_categories'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'codename_theme_options[meta_categories]', array(
		'label'    => esc_html__( 'Display categories', 'codename' ),
		'section'  => 'codename_section_post',
		'settings' => 'codename_theme_options[meta_categories]',
		'type'     => 'checkbox',
		'priority' => 50,
	) );

	// Add Single Post Headline.
	$wp_customize->add_control( new Codename_Customize_Header_Control(
		$wp_customize, 'codename_theme_options[single_post]', array(
			'label'    => esc_html__( 'Single Post', 'codename' ),
			'section'  => 'codename_section_post',
			'settings' => array(),
			'priority' => 60,
		)
	) );

	// Add Setting and Control for showing post tags.
	$wp_customize->add_setting( 'codename_theme_options[meta_tags]', array(
		'default'           => $default['meta_tags'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'codename_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display tags', 'codename' ),
		'section'  => 'codename_section_post',
		'settings' => 'codename_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 70,
	) );

	// Add Setting and Control for showing post navigation.
	$wp_customize->add_setting( 'codename_theme_options[post_navigation]', array(
		'default'           => $default['post_navigation'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'codename_theme_options[post_navigation]', array(
		'label'    => esc_html__( 'Display previous/next post navigation', 'codename' ),
		'section'  => 'codename_section_post',
		'settings' => 'codename_theme_options[post_navigation]',
		'type'     => 'checkbox',
		'priority' => 80,
	) );

	// Add Featured Images Headline.
	$wp_customize->add_control( new Codename_Customize_Header_Control(
		$wp_customize, 'codename_theme_options[featured_images]', array(
			'label'    => esc_html__( 'Featured Images', 'codename' ),
			'section'  => 'codename_section_post',
			'settings' => array(),
			'priority' => 90,
		)
	) );

	// Add Setting and Control for featured images on blog and archives.
	$wp_customize->add_setting( 'codename_theme_options[post_image_archives]', array(
		'default'           => $default['post_image_archives'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'codename_theme_options[post_image_archives]', array(
		'label'    => esc_html__( 'Display images on blog and archives', 'codename' ),
		'section'  => 'codename_section_post',
		'settings' => 'codename_theme_options[post_image_archives]',
		'type'     => 'checkbox',
		'priority' => 100,
	) );

	$wp_customize->selective_refresh->add_partial( 'codename_theme_options[post_image_archives]', array(
		'selector'         => '.site-main .post-wrapper',
		'render_callback'  => 'codename_customize_partial_blog_content',
		'fallback_refresh' => false,
	) );

	// Add Setting and Control for featured images on single posts.
	$wp_customize->add_setting( 'codename_theme_options[post_image_single]', array(
		'default'           => $default['post_image_single'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'codename_sanitize_select',
	) );

	$wp_customize->add_control( 'codename_theme_options[post_image_single]', array(
		'label'    => esc_html__( 'Featured Images on Single Posts', 'codename' ),
		'section'  => 'codename_section_post',
		'settings' => 'codename_theme_options[post_image_single]',
		'type'     => 'select',
		'priority' => 110,
		'choices'  => array(
			'header-image' => esc_html__( 'Display image in the header', 'codename' ),
			'above-title'  => esc_html__( 'Display image above post title', 'codename' ),
			'below-title'  => esc_html__( 'Display image below post title', 'codename' ),
			'hide-image'   => esc_html__( 'Hide featured image', 'codename' ),
		),
	) );

	$wp_customize->selective_refresh->add_partial( 'codename_theme_options[post_image_single]', array(
		'selector'         => '.single-post .content-area .site-main',
		'render_callback'  => 'codename_customize_partial_single_post',
		'fallback_refresh' => false,
	) );
}
add_action( 'customize_register', 'codename_customize_register_post_settings' );


/**
 * Render single posts partial
 */
function codename_customize_partial_single_post() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content', 'single' );
	}
}
