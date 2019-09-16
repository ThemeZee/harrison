<?php
/**
 * Footer Copyright
 *
 * @version 1.0
 * @package Codename
 */


// Check if there is footer content available.
if ( is_active_sidebar( 'footer-copyright' ) || true === codename_get_option( 'credit_link' ) || '' !== codename_get_option( 'footer_text' ) ) :
	?>

	<div id="footer-line" class="site-info">

		<?php dynamic_sidebar( 'footer-copyright' ); ?>
		<?php codename_footer_text(); ?>
		<?php codename_credit_link(); ?>

	</div>

	<?php
endif;
