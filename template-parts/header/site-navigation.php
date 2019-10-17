<?php
/**
 * Main Navigation
 *
 * @version 1.0
 * @package Codename
 */
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<button class="primary-menu-toggle menu-toggle" aria-controls="primary-menu" aria-expanded="false">
		<?php
		echo codename_get_svg( 'menu' );
		echo codename_get_svg( 'close' );
		?>
		<span class="menu-toggle-text"><?php esc_html_e( 'Menu', 'codename' ); ?></span>
	</button>

	<div class="primary-navigation">

		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'codename' ); ?>">

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
				)
			);
			?>
		</nav><!-- #site-navigation -->

	</div><!-- .primary-navigation -->

<?php endif; ?>

<?php do_action( 'codename_after_navigation' ); ?>
