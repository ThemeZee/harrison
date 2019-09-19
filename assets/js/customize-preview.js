/**
 * Customizer Live Preview
 *
 * Reloads changes on Theme Customizer Preview asynchronously for better usability
 *
 * @package Codename
 */

( function( $ ) {

	// Site Title textfield.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site Description textfield.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Site Title checkbox.
	wp.customize( 'codename_theme_options[site_title]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				hideElement( '.site-title' );
			} else {
				showElement( '.site-title' );
			}
		} );
	} );

	// Site Description checkbox.
	wp.customize( 'codename_theme_options[site_description]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				hideElement( '.site-description' );
			} else {
				showElement( '.site-description' );
			}
		} );
	} );

	// Theme Layout.
	wp.customize( 'codename_theme_options[theme_layout]', function( value ) {
		value.bind( function( newval ) {
			if ( 'wide' === newval ) {
				$( 'body' ).addClass( 'wide-theme-layout' );
			} else {
				$( 'body' ).removeClass( 'wide-theme-layout' );
			}
		} );
	} );

	// Header Layout.
	wp.customize( 'codename_theme_options[header_layout]', function( value ) {
		value.bind( function( newval ) {
			if ( 'vertical' === newval ) {
				$( 'body' ).addClass( 'vertical-header-layout' );
			} else {
				$( 'body' ).removeClass( 'vertical-header-layout' );
			}
		} );
	} );

	// Blog Layout.
	wp.customize( 'codename_theme_options[blog_layout]', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).removeClass( 'blog-layout-horizontal-list' );
			$( 'body' ).removeClass( 'blog-layout-horizontal-list-alt' );
			$( 'body' ).removeClass( 'blog-layout-vertical-list' );
			$( 'body' ).removeClass( 'blog-layout-two-column-grid' );
			$( 'body' ).removeClass( 'blog-layout-three-column-grid' );

			if ( 'horizontal-list' === newval || 'horizontal-list-alt' === newval ) {
				$( 'body' ).addClass( 'blog-layout-horizontal-list' );
			} else if ( 'vertical-list' === newval || 'vertical-list-alt' === newval ) {
				$( 'body' ).addClass( 'blog-layout-vertical-list' );
			} else if ( 'two-column-grid' === newval ) {
				$( 'body' ).addClass( 'blog-layout-two-column-grid' );
			} else if ( 'three-column-grid' === newval ) {
				$( 'body' ).addClass( 'blog-layout-three-column-grid' );
			}

			if ( 'horizontal-list-alt' === newval ) {
				$( 'body' ).addClass( 'blog-layout-horizontal-list-alt' );
			}
		} );
	} );

	// Read More Link textfield.
	wp.customize( 'codename_theme_options[read_more_link]', function( value ) {
		value.bind( function( to ) {
			$( 'a.more-link' ).text( to );
		} );
	} );

	// Post Date checkbox.
	wp.customize( 'codename_theme_options[meta_date]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'date-hidden' );
			} else {
				$( 'body' ).removeClass( 'date-hidden' );
			}
		} );
	} );

	// Post Author checkbox.
	wp.customize( 'codename_theme_options[meta_author]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'author-hidden' );
			} else {
				$( 'body' ).removeClass( 'author-hidden' );
			}
		} );
	} );

	// Post Comments checkbox.
	wp.customize( 'codename_theme_options[meta_comments]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'comments-hidden' );
			} else {
				$( 'body' ).removeClass( 'comments-hidden' );
			}
		} );
	} );

	// Post Category checkbox.
	wp.customize( 'codename_theme_options[meta_categories]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'categories-hidden' );
			} else {
				$( 'body' ).removeClass( 'categories-hidden' );
			}
		} );
	} );

	// Post Tags checkbox.
	wp.customize( 'codename_theme_options[meta_tags]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'tags-hidden' );
			} else {
				$( 'body' ).removeClass( 'tags-hidden' );
			}
		} );
	} );

	// Post Navigation checkbox.
	wp.customize( 'codename_theme_options[post_navigation]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'post-navigation-hidden' );
			} else {
				$( 'body' ).removeClass( 'post-navigation-hidden' );
			}
		} );
	} );

	// Featured Header Image checkbox.
	wp.customize( 'codename_theme_options[post_image_single]', function( value ) {
		value.bind( function( newval ) {
			if ( 'header-image' !== newval ) {
				$( 'body' ).addClass( 'single-post-header-image-hidden' );
			} else {
				$( 'body' ).removeClass( 'single-post-header-image-hidden' );
			}
		} );
	} );

	/* Primary Color Option */
	wp.customize( 'codename_theme_options[primary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--primary-color', newval );
		} );
	} );

	/* Secondary Color Option */
	wp.customize( 'codename_theme_options[secondary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--secondary-color', newval );
		} );
	} );

	/* Accent Color Option */
	wp.customize( 'codename_theme_options[accent_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--accent-color', newval );
		} );
	} );

	/* Highlight Color Option */
	wp.customize( 'codename_theme_options[highlight_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--highlight-color', newval );
		} );
	} );

	/* Light Gray Color Option */
	wp.customize( 'codename_theme_options[light_gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--light-gray-color', newval );
		} );
	} );

	/* Gray Color Option */
	wp.customize( 'codename_theme_options[gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gray-color', newval );
		} );
	} );

	/* Dark Gray Color Option */
	wp.customize( 'codename_theme_options[dark_gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--dark-gray-color', newval );
		} );
	} );

	/* Page Background Color Option */
	wp.customize( 'codename_theme_options[page_background_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, medium_text_color, light_text_color, border_color, light_bg_color;

			if( isColorDark( newval ) ) {
				text_color        = 'rgba(255, 255, 255, 0.9)';
				medium_text_color = 'rgba(255, 255, 255, 0.7)';
				light_text_color  = 'rgba(255, 255, 255, 0.5)';
				border_color      = 'rgba(255, 255, 255, 0.1)';
				light_bg_color    = 'rgba(255, 255, 255, 0.05)';
			} else {
				text_color        = 'rgba(0, 0, 0, 0.9)';
				medium_text_color = 'rgba(0, 0, 0, 0.7)';
				light_text_color  = 'rgba(0, 0, 0, 0.5)';
				border_color      = 'rgba(0, 0, 0, 0.1)';
				light_bg_color    = 'rgba(0, 0, 0, 0.05)';
			}

			document.documentElement.style.setProperty( '--page-background-color', newval );
			document.documentElement.style.setProperty( '--text-color', text_color );
			document.documentElement.style.setProperty( '--medium-text-color', medium_text_color );
			document.documentElement.style.setProperty( '--light-text-color', light_text_color );
			document.documentElement.style.setProperty( '--page-border-color', border_color );
			document.documentElement.style.setProperty( '--page-light-bg-color', light_bg_color );
		} );
	} );

	/* Link Color Option */
	wp.customize( 'codename_theme_options[link_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--link-color', newval );
			document.documentElement.style.setProperty( '--button-color', newval );
		} );
	} );

	/* Link Color Hover Option */
	wp.customize( 'codename_theme_options[link_hover_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--link-hover-color', newval );
			document.documentElement.style.setProperty( '--button-hover-color', newval );
		} );
	} );

	/* Header Color Option */
	wp.customize( 'codename_theme_options[header_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, hover_color, border_color;

			if( isColorLight( newval ) ) {
				text_color = 'rgba(0, 0, 0, 0.95)';
				hover_color = 'rgba(0, 0, 0, 0.5)';
				border_color = 'rgba(0, 0, 0, 0.1)';
			} else {
				text_color = 'rgba(255, 255, 255, 0.95)';
				hover_color = 'rgba(255, 255, 255, 0.5)';
				border_color = 'rgba(255, 255, 255, 0.1)';
			}

			document.documentElement.style.setProperty( '--header-background-color', newval );
			document.documentElement.style.setProperty( '--header-text-color', text_color );
			document.documentElement.style.setProperty( '--header-text-hover-color', hover_color );
			document.documentElement.style.setProperty( '--header-border-color', border_color );
		} );
	} );

	/* Title Color Option */
	wp.customize( 'codename_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--title-color', newval );
		} );
	} );

	/* Title Hover Color Option */
	wp.customize( 'codename_theme_options[title_hover_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--title-hover-color', newval );
		} );
	} );

	/* Footer Color Option */
	wp.customize( 'codename_theme_options[footer_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, link_color;

			if( isColorLight( newval ) ) {
				text_color = '#242424';
				link_color = 'rgba(0, 0, 0, 0.6)';
			} else {
				text_color = '#ffffff';
				link_color = 'rgba(255, 255, 255, 0.6)';
			}

			document.documentElement.style.setProperty( '--footer-background-color', newval );
			document.documentElement.style.setProperty( '--footer-text-color', text_color );
			document.documentElement.style.setProperty( '--footer-link-color', link_color );
			document.documentElement.style.setProperty( '--footer-link-hover-color', text_color );
		} );
	} );

	function hideElement( element ) {
		$( element ).css({
			clip: 'rect(1px, 1px, 1px, 1px)',
			position: 'absolute',
			width: '1px',
			height: '1px',
			overflow: 'hidden',
		});
	}

	function showElement( element ) {
		$( element ).css({
			clip: 'auto',
			position: 'relative',
			width: 'auto',
			height: 'auto',
			overflow: 'visible',
		});
	}

	function hexdec( hexString ) {
		hexString = ( hexString + '' ).replace( /[^a-f0-9]/gi, '' );
		return parseInt( hexString, 16 );
	}

	function getColorBrightness( hexColor ) {

		// Remove # string.
		hexColor = hexColor.replace( '#', '' );

		// Convert into RGB.
		var r = hexdec( hexColor.substring( 0, 2 ) );
		var g = hexdec( hexColor.substring( 2, 4 ) );
		var b = hexdec( hexColor.substring( 4, 6 ) );

		return ( ( ( r * 299 ) + ( g * 587 ) + ( b * 114 ) ) / 1000 );
	}

	function isColorLight( hexColor ) {
		return ( getColorBrightness( hexColor ) > 130 );
	}

	function isColorDark( hexColor ) {
		return ( getColorBrightness( hexColor ) <= 130 );
	}

} )( jQuery );
