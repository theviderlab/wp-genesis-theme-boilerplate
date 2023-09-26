<?php
/**
 * <themeName>.
 *
 * This file adds the required WooCommerce setup functions.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
// Adds product gallery support.
if ( class_exists( 'WooCommerce' ) ) {
<n>
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-zoom' );
<n>
}
<n>
add_filter( 'woocommerce_style_smallscreen_breakpoint', '<lowerSnakeCase>_woocommerce_breakpoint' );
/**
 * Modifies the WooCommerce breakpoints.
 *
 * @since 2.3.0
 *
 * @return string Pixel width of the theme's breakpoint.
 */
function <lowerSnakeCase>_woocommerce_breakpoint() {
<n>
	$current = genesis_site_layout( false );
	$layouts = [
		'one-sidebar' => [
			'content-sidebar',
			'sidebar-content',
		],
	];
<n>
	if ( in_array( $current, $layouts['one-sidebar'], true ) ) {
		return '1200px';
	}
<n>
	return '860px';
<n>
}
<n>
add_filter( 'genesiswooc_products_per_page', '<lowerSnakeCase>_default_products_per_page' );
/**
 * Sets the default products per page.
 *
 * @since 2.3.0
 *
 * @return int Number of products to show per page.
 */
function <lowerSnakeCase>_default_products_per_page() {
<n>
	return 8;
<n>
}
<n>
add_filter( 'woocommerce_pagination_args', '<lowerSnakeCase>_woocommerce_pagination' );
/**
 * Updates the next and previous arrows to the default Genesis style.
 *
 * @param array $args The previous and next text arguments.
 * @since 2.3.0
 *
 * @return array New next and previous text arguments.
 */
function <lowerSnakeCase>_woocommerce_pagination( $args ) {
<n>
	$args['prev_text'] = sprintf( '&laquo; %s', __( 'Previous Page', '<kebabCase>' ) );
	$args['next_text'] = sprintf( '%s &raquo;', __( 'Next Page', '<kebabCase>' ) );
<n>
	return $args;
<n>
}
<n>
add_action( 'after_switch_theme', '<lowerSnakeCase>_woocommerce_image_dimensions_after_theme_setup', 1 );
/**
 * Defines WooCommerce image sizes on theme activation.
 *
 * @since 2.3.0
 */
function <lowerSnakeCase>_woocommerce_image_dimensions_after_theme_setup() {
<n>
	global $pagenow;
<n>
	// Checks conditionally to see if we're activating the current theme and that WooCommerce is installed.
	if ( isset( $_GET['activated'] ) === false || ('themes.php' === $pagenow) === false || class_exists( 'WooCommerce' ) === false ) { // phpcs:ignore WordPress.CSRF.NonceVerification.NoNonceVerification -- low risk, follows official snippet at https://goo.gl/nnHHQa.
		return;
	}
<n>
	<lowerSnakeCase>_update_woocommerce_image_dimensions();
<n>
}
<n>
add_action( 'activated_plugin', '<lowerSnakeCase>_woocommerce_image_dimensions_after_woo_activation', 10, 2 );
/**
 * Defines the WooCommerce image sizes on WooCommerce activation.
 *
 * @since 2.3.0
 *
 * @param string $plugin The path of the plugin being activated.
 */
function <lowerSnakeCase>_woocommerce_image_dimensions_after_woo_activation( $plugin ) {
<n>
	// Checks to see if WooCommerce is being activated.
	if ( ('woocommerce/woocommerce.php' === $plugin) === false ) {
		return;
	}
<n>
	<lowerSnakeCase>_update_woocommerce_image_dimensions();
<n>
}
<n>
/**
 * Updates WooCommerce image dimensions.
 *
 * @since 2.3.0
 */
function <lowerSnakeCase>_update_woocommerce_image_dimensions() {
<n>
	// Updates image size options.
	update_option( 'woocommerce_single_image_width', 655 );    // Single product image.
	update_option( 'woocommerce_thumbnail_image_width', 500 ); // Catalog image.
<n>
	// Updates image cropping option.
	update_option( 'woocommerce_thumbnail_cropping', '1:1' );
<n>
}
<n>
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', '<lowerSnakeCase>_gallery_image_thumbnail' );
/**
 * Filters the WooCommerce gallery image dimensions.
 *
 * @since 2.6.0
 *
 * @param array $size The gallery image size and crop arguments.
 * @return array The modified gallery image size and crop arguments.
 */
function <lowerSnakeCase>_gallery_image_thumbnail( $size ) {
<n>
	$size = [
		'width'  => 180,
		'height' => 180,
		'crop'   => 1,
	];
<n>
	return $size;
<n>
}
