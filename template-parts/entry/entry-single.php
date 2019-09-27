<?php
/**
 * The template for displaying the full content of a single post
 *
 * @version 1.0
 * @package Codename
 */
?>

<div class="entry-content">

	<?php the_content(); ?>
	<?php wp_link_pages(); ?>
	<?php codename_entry_tags(); ?>
	<?php do_action( 'codename_author_bio' ); ?>

</div><!-- .entry-content -->
