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

	// Set Theme Layout.
	if ( 'wide' === $theme_options['theme_layout'] ) {
		$classes[] = 'wide-theme-layout';
	} elseif ( 'centered' === $theme_options['theme_layout'] ) {
		$classes[] = 'centered-theme-layout';
	}

	// Set Header Layout.
	if ( 'vertical' === $theme_options['header_layout'] ) {
		$classes[] = 'vertical-header-layout';
	}

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$classes[] = 'site-title-hidden';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$classes[] = 'site-description-hidden';
	}

	// Set Blog Layout.
	if ( ( is_archive() || is_author() || is_category() || is_home() || is_tag() ) && 'post' == get_post_type() ) {
		if ( 'horizontal-list' === $theme_options['blog_layout'] || 'horizontal-list-alt' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-horizontal-list';
		} elseif ( 'vertical-list' === $theme_options['blog_layout'] || 'vertical-list-alt' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-vertical-list';
		} elseif ( 'two-column-grid' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-two-column-grid';
		} elseif ( 'three-column-grid' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-three-column-grid';
		}

		if ( 'horizontal-list-alt' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-horizontal-list-alt';
		}
	}

	// Hide Date?
	if ( false === $theme_options['meta_date'] ) {
		$classes[] = 'date-hidden';
	}

	// Hide Author?
	if ( false === $theme_options['meta_author'] ) {
		$classes[] = 'author-hidden';
	}

	// Hide Comments?
	if ( false === $theme_options['meta_comments'] ) {
		$classes[] = 'comments-hidden';
	}

	// Hide Categories?
	if ( false === $theme_options['meta_categories'] ) {
		$classes[] = 'categories-hidden';
	}

	// Hide Tags?
	if ( false === $theme_options['meta_tags'] ) {
		$classes[] = 'tags-hidden';
	}

	// Hide Post Navigation in Customizer for instant live preview.
	if ( is_customize_preview() && is_single() && false === $theme_options['post_navigation'] ) {
		$classes[] = 'post-navigation-hidden';
	}

	// Hide Featured Header image in Customizer for instant live preview.
	if ( is_customize_preview() && is_single() && has_post_thumbnail() && 'header-image' !== $theme_options['post_image_single'] ) {
		$classes[] = 'single-post-header-image-hidden';
	}

	// Hide Credit Link in Customizer for instant live preview.
	if ( is_customize_preview() && false === $theme_options['credit_link'] ) {
		$classes[] = 'credit-link-hidden';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'codename_body_classes' );


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
