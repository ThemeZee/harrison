<?php
/**
 * Add Support for Theme Addons
 *
 * @package Codename
 */

/**
 * Register support for Jetpack and theme addons
 */
function codename_theme_addons_setup() {

	// Add theme support for Codename Pro plugin.
	add_theme_support( 'codename-pro' );

	// Add theme support for ThemeZee Plugins.
	add_theme_support( 'themezee-breadcrumbs' );

	// Add theme support for Widget Bundle.
	add_theme_support( 'themezee-widget-bundle', array(
		'thumbnail_size' => array( 100, 80 ),
		'svg_icons'      => true,
	) );

	// Add theme support for Related Posts.
	add_theme_support( 'themezee-related-posts', array(
		'thumbnail_size' => array( 640, 360 ),
	) );

	// Add Theme Support for wooCommerce.
	add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'codename_theme_addons_setup' );


/**
 * Set wrapper start for wooCommerce
 */
function codename_wrapper_start() {
	echo '<section id="primary" class="content-area">';
	echo '<main id="main" class="site-main" role="main">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'codename_wrapper_start', 10 );


/**
 * Set wrapper end for wooCommerce
 */
function codename_wrapper_end() {
	echo '</main><!-- #main -->';
	echo '</section><!-- #primary -->';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'codename_wrapper_end', 10 );
