<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @version 1.0
 * @package Codename
 */

get_header();

while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/post/content', esc_html( codename_get_option( 'post_image_single' ) ) );

	get_template_part( 'template-parts/post/post', 'footer' );

endwhile;

get_footer();
