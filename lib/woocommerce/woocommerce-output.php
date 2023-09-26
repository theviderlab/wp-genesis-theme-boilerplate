<?php
/**
 * <themeName>.
 *
 * This file adds the WooCommerce styles and the Customizer additions for WooCommerce.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
add_filter( 'woocommerce_enqueue_styles', '<lowerSnakeCase>_woocommerce_styles' );
/**
 * Enqueues the theme's custom WooCommerce styles to the WooCommerce plugin.
 *
 * @param array $enqueue_styles The WooCommerce styles to enqueue.
 * @since 2.3.0
 *
 * @return array Modified WooCommerce styles to enqueue.
 */
function <lowerSnakeCase>_woocommerce_styles( $enqueue_styles ) {
<n>
	$enqueue_styles[ genesis_get_theme_handle() . '-woocommerce-styles' ] = [
		'src'     => get_stylesheet_directory_uri() . '/lib/woocommerce/<kebabCase>-woocommerce.css',
		'deps'    => '',
		'version' => genesis_get_theme_version(),
		'media'   => 'screen',
	];
<n>
	return $enqueue_styles;
<n>
}
<n>
add_action( 'wp_enqueue_scripts', '<lowerSnakeCase>_woocommerce_css' );
/**
 * Adds the themes's custom CSS to the WooCommerce stylesheet.
 *
 * @since 2.3.0
 *
 * @return string CSS to be outputted after the theme's custom WooCommerce stylesheet.
 */
function <lowerSnakeCase>_woocommerce_css() {
<n>
	// If WooCommerce isn't active, exit early.
	if ( class_exists( 'WooCommerce' ) === false ) {
		return;
	}
<n>
	$appearance = genesis_get_config( 'appearance' );
<n>
	$color_link   = get_theme_mod( '<lowerSnakeCase>_link_color', $appearance['default-colors']['link'] );
	$color_accent = get_theme_mod( '<lowerSnakeCase>_accent_color', $appearance['default-colors']['accent'] );
<n>
	$woo_css = '';
<n>
	$woo_css .= ( $appearance['default-colors']['link'] === $color_link ) === false ? sprintf(
		'
<n>
		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:focus,
		.woocommerce ul.products li.product h3:hover,
		.woocommerce ul.products li.product .price,
		.woocommerce .woocommerce-breadcrumb a:hover,
		.woocommerce .woocommerce-breadcrumb a:focus,
		.woocommerce .widget_layered_nav ul li.chosen a::before,
		.woocommerce .widget_layered_nav_filters ul li a::before,
		.woocommerce .widget_rating_filter ul li.chosen a::before {
			color: %s;
		}
<n>
	',
		$color_link
	) : '';
<n>
	$woo_css .= ( $appearance['default-colors']['accent'] === $color_accent ) === false ? sprintf(
		'
		.woocommerce a.button:hover,
		.woocommerce a.button:focus,
		.woocommerce a.button.alt:hover,
		.woocommerce a.button.alt:focus,
		.woocommerce button.button:hover,
		.woocommerce button.button:focus,
		.woocommerce button.button.alt:hover,
		.woocommerce button.button.alt:focus,
		.woocommerce input.button:hover,
		.woocommerce input.button:focus,
		.woocommerce input.button.alt:hover,
		.woocommerce input.button.alt:focus,
		.woocommerce input[type="submit"]:hover,
		.woocommerce input[type="submit"]:focus,
		.woocommerce span.onsale,
		.woocommerce #respond input#submit:hover,
		.woocommerce #respond input#submit:focus,
		.woocommerce #respond input#submit.alt:hover,
		.woocommerce #respond input#submit.alt:focus,
		.woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce.widget_price_filter .ui-slider .ui-slider-range {
			background-color: %1$s;
			color: %2$s;
		}
<n>
		.woocommerce-error,
		.woocommerce-info,
		.woocommerce-message {
			border-top-color: %1$s;
		}
<n>
		.woocommerce-error::before,
		.woocommerce-info::before,
		.woocommerce-message::before {
			color: %1$s;
		}
<n>
	',
		$color_accent,
		<lowerSnakeCase>_color_contrast( $color_accent )
	) : '';
<n>
	if ( $woo_css ) {
		wp_add_inline_style( genesis_get_theme_handle() . '-woocommerce-styles', $woo_css );
	}
<n>
}
