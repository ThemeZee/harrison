<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @version 1.0
 * @package Codename
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="post-header entry-header">

		<?php codename_post_image(); ?>

		<?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php codename_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content entry-excerpt">

		<?php the_excerpt(); ?>
		<?php codename_more_link(); ?>

	</div><!-- .entry-content -->

</article>