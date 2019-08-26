<?php
/**
 * The template for displaying articles in the loop with full content
 *
 * @version 1.0
 * @package Codename
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php codename_post_image_archives(); ?>

	<header class="post-header entry-header">

		<?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php codename_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content( esc_html( codename_get_option( 'read_more_link' ) ) ); ?>

	</div><!-- .entry-content -->

</article>
