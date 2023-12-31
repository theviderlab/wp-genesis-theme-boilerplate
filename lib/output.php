<?php
/**
 * <themeName>.
 *
 * This file adds the required CSS to the front end.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
add_action( 'wp_enqueue_scripts', '<lowerSnakeCase>_css' );
/**
 * Checks the settings for the link color, and accent color.
 * If any of these value are set the appropriate CSS is output.
 *
 * @since 2.2.3
 */
function <lowerSnakeCase>_css() {
<n>
	$appearance = genesis_get_config( 'appearance' );
<n>
	$color_link   = get_theme_mod( '<lowerSnakeCase>_link_color', $appearance['default-colors']['link'] );
	$color_accent = get_theme_mod( '<lowerSnakeCase>_accent_color', $appearance['default-colors']['accent'] );
	$logo         = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
<n>
	if ( $logo ) {
		$logo_height           = absint( $logo[2] );
		$logo_max_width        = get_theme_mod( '<lowerSnakeCase>_logo_width', 350 );
		$logo_width            = absint( $logo[1] );
		$logo_ratio            = $logo_width / max( $logo_height, 1 );
		$logo_effective_height = min( $logo_width, $logo_max_width ) / max( $logo_ratio, 1 );
		$logo_padding          = max( 0, ( 60 - $logo_effective_height ) / 2 );
	}
<n>
	$css = '';
<n>
	$css .= ( $appearance['default-colors']['link'] === $color_link ) === false ? sprintf(
		'
<n>
		a,
		.entry-title a:focus,
		.entry-title a:hover,
		.genesis-nav-menu a:focus,
		.genesis-nav-menu a:hover,
		.genesis-nav-menu .current-menu-item > a,
		.genesis-nav-menu .sub-menu .current-menu-item > a:focus,
		.genesis-nav-menu .sub-menu .current-menu-item > a:hover,
		.menu-toggle:focus,
		.menu-toggle:hover,
		.sub-menu-toggle:focus,
		.sub-menu-toggle:hover {
			color: %s;
		}
<n>
		',
		$color_link
	) : '';

	$css .= ( $appearance['default-colors']['accent'] === $color_accent ) === false ? sprintf(
		'
<n>
		button:focus,
		button:hover,
		input[type="button"]:focus,
		input[type="button"]:hover,
		input[type="reset"]:focus,
		input[type="reset"]:hover,
		input[type="submit"]:focus,
		input[type="submit"]:hover,
		input[type="reset"]:focus,
		input[type="reset"]:hover,
		input[type="submit"]:focus,
		input[type="submit"]:hover,
		.site-container div.wpforms-container-full .wpforms-form input[type="submit"]:focus,
		.site-container div.wpforms-container-full .wpforms-form input[type="submit"]:hover,
		.site-container div.wpforms-container-full .wpforms-form button[type="submit"]:focus,
		.site-container div.wpforms-container-full .wpforms-form button[type="submit"]:hover,
		.button:focus,
		.button:hover {
			background-color: %1$s;
			color: %2$s;
		}
<n>
		@media only screen and (min-width: 960px) {
			.genesis-nav-menu > .menu-highlight > a:hover,
			.genesis-nav-menu > .menu-highlight > a:focus,
			.genesis-nav-menu > .menu-highlight.current-menu-item > a {
				background-color: %1$s;
				color: %2$s;
			}
		}
		',
		$color_accent,
		<lowerSnakeCase>_color_contrast( $color_accent )
	) : '';
<n>
	$css .= ( has_custom_logo() && ( 200 <= $logo_effective_height ) ) ?
		'
		.site-header {
			position: static;
		}
		'
	: '';
<n>
	$css .= ( has_custom_logo() && (( 350 === $logo_max_width ) === false) ) ? sprintf(
		'
		.wp-custom-logo .site-container .title-area {
			max-width: %spx;
		}
		',
		$logo_max_width
	) : '';
<n>
	// Place menu below logo and center logo once it gets big.
	$css .= ( has_custom_logo() && ( 600 <= $logo_max_width ) ) ?
		'
		.wp-custom-logo .title-area,
		.wp-custom-logo .menu-toggle,
		.wp-custom-logo .nav-primary {
			float: none;
		}
<n>
		.wp-custom-logo .title-area {
			margin: 0 auto;
			text-align: center;
		}
<n>
		@media only screen and (min-width: 960px) {
			.wp-custom-logo .nav-primary {
				text-align: center;
			}
<n>
			.wp-custom-logo .nav-primary .sub-menu {
				text-align: left;
			}
		}
		'
	: '';
<n>
	$css .= ( has_custom_logo() && $logo_padding && ( 1 < $logo_effective_height ) ) ? sprintf(
		'
		.wp-custom-logo .title-area {
			padding-top: %spx;
		}
		',
		$logo_padding + 5
	) : '';
<n>
	if ( $css ) {
		wp_add_inline_style( genesis_get_theme_handle(), $css );
	}
<n>
}
