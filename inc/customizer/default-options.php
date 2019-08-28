<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package Codename
 */

/**
* Get a single theme option
*
* @return mixed
*/
function codename_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = codename_theme_options();

	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function codename_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'codename_theme_options', array() ), codename_default_options() );

	// Return theme options.
	return apply_filters( 'codename_theme_options', $theme_options );
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function codename_default_options() {

	$default_options = array(
		'site_title'          => true,
		'site_description'    => true,
		'blog_layout'         => 'vertical-list',
		'blog_content'        => 'excerpt',
		'excerpt_length'      => 25,
		'excerpt_more_text'   => '[...]',
		'read_more_link'      => esc_html__( 'Continue reading', 'codename' ),
		'meta_date'           => true,
		'meta_author'         => true,
		'meta_comments'       => false,
		'meta_categories'     => true,
		'meta_tags'           => true,
		'post_navigation'     => true,
		'post_image_archives' => true,
		'post_image_single'   => 'header-image',
		'primary_color'       => '#003344',
		'secondary_color'     => '#268f97',
		'accent_color'        => '#c9493b',
		'highlight_color'     => '#f9d26e',
		'light_gray_color'    => '#e4e4e4',
		'gray_color'          => '#848484',
		'dark_gray_color'     => '#242424',
		'link_color'          => '#268f97',
		'link_hover_color'    => '#003344',
		'header_color'        => '#003344',
		'title_color'         => '#003344',
		'title_hover_color'   => '#268f97',
		'footer_color'        => '#003344',
		'text_font'           => 'SystemFontStack',
		'title_font'          => 'SystemFontStack',
		'title_is_bold'       => true,
		'title_is_uppercase'  => false,
		'navi_font'           => 'SystemFontStack',
		'navi_is_bold'        => false,
		'navi_is_uppercase'   => false,
	);

	return apply_filters( 'codename_default_options', $default_options );
}
