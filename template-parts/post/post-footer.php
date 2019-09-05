<?php
/**
 * The template for displaying comments and post navigation on single posts
 *
 * @version 1.0
 * @package Codename
 */
?>

<div class="post-footer">

	<?php
	codename_post_navigation();

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>

</div>
