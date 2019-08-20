<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @version 1.0
 * @package Codename
 */

get_header();

if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/post/content' );

	endwhile;

	codename_pagination();

else :

	get_template_part( 'template-parts/page/content', 'none' );

endif;

get_footer();