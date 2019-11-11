<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @version 1.0
 * @package Codename
 */

get_header();

if ( have_posts() ) :
	?>

	<main id="main" class="site-main" role="main">

		<?php codename_archive_header(); ?>

		<div id="post-wrapper" class="post-wrapper">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/blog/content', esc_html( codename_get_option( 'blog_layout' ) ) );

		endwhile;
		?>

		</div>

	</main><!-- #main -->

	<?php
	codename_pagination();

else :

	get_template_part( 'template-parts/page/content', 'none' );

endif;

get_footer();
