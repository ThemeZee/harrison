<?php
/**
 * Add Support for Theme Addons
 *
 * @package Harrison
 */

/**
 * Register support for Jetpack and theme addons
 */
function harrison_theme_addons_setup() {

	// Add theme support for Harrison Pro plugin.
	add_theme_support( 'harrison-pro' );

	// Add theme support for ThemeZee Breadcrumbs plugin.
	add_theme_support( 'themezee-breadcrumbs' );

	// Add theme support for ThemeZee Widget Bundle plugin.
	add_theme_support(
		'themezee-widget-bundle',
		array(
			'thumbnail_size' => array( 150, 150 ),
			'svg_icons'      => true,
		)
	);

	// Add theme support for ThemeZee Related Posts plugin.
	add_theme_support(
		'themezee-related-posts',
		array(
			'thumbnail_size' => array( 720, 360 ),
		)
	);

	// Add theme support for Infinite Scroll.
	add_theme_support(
		'infinite-scroll',
		array(
			'container'      => 'post-wrapper',
			'footer_widgets' => 'footer',
			'wrapper'        => false,
			'render'         => 'harrison_infinite_scroll_render',
		)
	);

	// Add theme support for wooCommerce.
	add_theme_support( 'woocommerce' );

	// Add theme support for AMP.
	add_theme_support( 'amp' );
}
add_action( 'after_setup_theme', 'harrison_theme_addons_setup' );


/**
 * Custom render function for Infinite Scroll.
 */
function harrison_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/blog/content', esc_html( harrison_get_option( 'blog_layout' ) ) );
	}
}


/**
 * Set wrapper start for wooCommerce
 */
function harrison_wrapper_start() {
	echo '<main id="main" class="site-main" role="main">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'harrison_wrapper_start', 10 );


/**
 * Set wrapper end for wooCommerce
 */
function harrison_wrapper_end() {
	echo '</main><!-- #main -->';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'harrison_wrapper_end', 10 );


/* Remove sidebar from wooCommerce templates */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/**
 * Checks if AMP page is rendered.
 */
function harrison_is_amp() {
	return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
}


/**
 * Adds amp support for menu toggle.
 */
function harrison_amp_menu_toggle() {
	if ( harrison_is_amp() ) {
		echo "[aria-expanded]=\"primaryMenuExpanded? 'true' : 'false'\" ";
		echo 'on="tap:AMP.setState({primaryMenuExpanded: !primaryMenuExpanded})"';
	}
}


/**
 * Adds amp support for mobile dropdown navigation menu.
 */
function harrison_amp_menu_is_toggled() {
	if ( harrison_is_amp() ) {
		echo "[class]=\"'main-navigation' + ( primaryMenuExpanded ? ' toggled-on' : '' )\"";
	}
}


/**
 * Filter the HTML output of a nav menu item to add the AMP dropdown button to reveal the sub-menu.
 * This is only used for AMP since in JS it is added via initNavigation() in navigation.js.
 * Source: https://amp-wp.org/documentation/playbooks/navigation-sub-menu-buttons/
 *
 * @param string $item_output   Nav menu item HTML.
 * @param object $item          Nav menu item.
 * @return string Modified nav menu item HTML.
 */
function harrison_amp_menu_dropdown_toggles( $item_output, $item, $depth, $args ) {

	// Return early if AMP is not used.
	if ( ! harrison_is_amp() ) {
		return $item_output;
	}

	// Check if primary or secondary navigation is filtered.
	if ( 'primary' !== $args->theme_location && 'secondary' !== $args->theme_location ) {
		return $item_output;
	}

	// Skip when the item has no sub-menu.
	if ( ! in_array( 'menu-item-has-children', $item->classes, true ) ) {
		return $item_output;
	}

	// Obtain the initial expanded state.
	$expanded = in_array( 'current-menu-ancestor', $item->classes, true );

	// Generate a unique state ID.
	static $nav_menu_item_number = 0;
	$nav_menu_item_number++;
	$expanded_state_id = 'navMenuItemExpanded' . $nav_menu_item_number;

	// Create new state for managing storing the whether the sub-menu is expanded.
	$item_output .= sprintf(
		'<amp-state id="%s"><script type="application/json">%s</script></amp-state>',
		esc_attr( $expanded_state_id ),
		wp_json_encode( $expanded )
	);

	/*
	* Create the toggle button which mutates the state and which has class and
	* aria-expanded attributes which react to the state changes.
	*/
	$dropdown_button  = '<button';
	$dropdown_class   = 'dropdown-toggle';
	$toggled_class    = 'toggled-on';
	$dropdown_button .= sprintf(
		' class="%s" [class]="%s"',
		esc_attr( $dropdown_class . ( $expanded ? " $toggled_class" : '' ) ),
		esc_attr( sprintf( "%s + ( $expanded_state_id ? %s : '' )", wp_json_encode( $dropdown_class ), wp_json_encode( " $toggled_class" ) ) )
	);
	$dropdown_button .= sprintf(
		' aria-expanded="%s" [aria-expanded]="%s"',
		esc_attr( wp_json_encode( $expanded ) ),
		esc_attr( "$expanded_state_id ? 'true' : 'false'" )
	);
	$dropdown_button .= sprintf(
		' on="%s"',
		esc_attr( "tap:AMP.setState( { $expanded_state_id: ! $expanded_state_id } )" )
	);
	$dropdown_button .= '>';

	// Add SVG icon.
	$dropdown_button .= $expanded ? harrison_get_svg( 'collapse' ) : harrison_get_svg( 'expand' );

	// Let the screen reader text in the button also update based on the expanded state.
	$dropdown_button .= sprintf(
		'<span class="screen-reader-text" [text]="%s">%s</span>',
		esc_attr( sprintf( "$expanded_state_id ? %s : %s", wp_json_encode( esc_html__( 'Collapse child menu', 'harrison' ) ), wp_json_encode( esc_html__( 'Expand child menu', 'harrison' ) ) ) ),
		esc_html( $expanded ? esc_html__( 'Collapse child menu', 'harrison' ) : esc_html__( 'Expand child menu', 'harrison' ) )
	);

	$dropdown_button .= '</button>';

	$item_output .= $dropdown_button;
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'harrison_amp_menu_dropdown_toggles', 10, 4 );
