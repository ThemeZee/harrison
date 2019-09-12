<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package Codename
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class Codename_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'codename' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/codename/', 'codename' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=codename&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'codename' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=codename&utm_source=customizer&utm_campaign=codename" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'codename' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/codename-documentation/', 'codename' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=codename&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'codename' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/codename/reviews/?filter=5', 'codename' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'codename' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
