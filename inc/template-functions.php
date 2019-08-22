<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Codename
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function codename_body_classes( $classes ) {

	// Get theme options from database.
	$theme_options = codename_theme_options();

	// Set Blog Layout.
	if ( 'horizontal-list' === $theme_options['blog_layout'] ) {
		$classes[] = 'blog-layout-horizontal-list';
	} elseif ( 'vertical-list' === $theme_options['blog_layout'] ) {
		$classes[] = 'blog-layout-vertical-list';
	} elseif ( 'two-column-grid' === $theme_options['blog_layout'] ) {
		$classes[] = 'blog-layout-two-column-grid';
	} elseif ( 'three-column-grid' === $theme_options['blog_layout'] ) {
		$classes[] = 'blog-layout-three-column-grid';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'codename_body_classes' );


/**
 * Hide Elements with CSS.
 *
 * @return void
 */
function codename_hide_elements() {

	// Get theme options from database.
	$theme_options = codename_theme_options();

	$elements = array();

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$elements[] = '.site-title';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$elements[] = '.site-description';
	}

	// Allow plugins to add own elements.
	$elements = apply_filters( 'codename_hide_elements', $elements );

	// Return early if no elements are hidden.
	if ( empty( $elements ) ) {
		return;
	}

	// Create CSS.
	$classes    = implode( ', ', $elements );
	$custom_css = $classes . ' { position: absolute; clip: rect(1px, 1px, 1px, 1px); width: 1px; height: 1px; overflow: hidden; }';

	// Add Custom CSS.
	wp_add_inline_style( 'codename-stylesheet', $custom_css );
}
add_filter( 'wp_enqueue_scripts', 'codename_hide_elements', 11 );


/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function codename_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	// Get excerpt length from database.
	$excerpt_length = codename_get_option( 'excerpt_length' );

	// Return excerpt text.
	if ( $excerpt_length >= 0 ) :
		return absint( $excerpt_length );
	else :
		return 55; // Number of words.
	endif;
}
add_filter( 'excerpt_length', 'codename_excerpt_length' );


/**
 * Change excerpt more text for posts
 *
 * @param String $more_text Excerpt More Text.
 * @return string
 */
function codename_excerpt_more( $more_text ) {

	if ( is_admin() ) {
		return $more_text;
	}

	return esc_html( ' ' . codename_get_option( 'excerpt_more_text' ) );
}
add_filter( 'excerpt_more', 'codename_excerpt_more' );
