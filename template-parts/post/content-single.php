<?php
/**
 * The template for displaying single posts
 *
 * @version 1.0
 * @package Codename
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php codename_post_image_above_title(); ?>

	<header class="post-header entry-header">

		<?php the_title( '<h1 class="post-title entry-title">', '</h1>' ); ?>

		<?php codename_entry_meta(); ?>

	</header><!-- .entry-header -->

	<?php codename_post_image_below_title(); ?>

	<div class="entry-content">

		<?php //codename_post_image(); ?>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
		<?php codename_entry_tags(); ?>

	</div><!-- .entry-content -->

</article>
