<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @version 1.0
 * @package Codename
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php codename_post_image_archives(); ?>

	<div class="entry-wrap">

		<header class="post-header entry-header">

			<?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php codename_entry_meta(); ?>

		</header><!-- .entry-header -->

		<div class="entry-content entry-excerpt">

			<?php the_excerpt(); ?>
			<?php codename_more_link(); ?>

		</div><!-- .entry-content -->

	</div>

</article>
