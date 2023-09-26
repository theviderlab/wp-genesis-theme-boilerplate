<?php
/**
 * Gutenberg theme support.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
add_action( 'wp_enqueue_scripts', '<lowerSnakeCase>_enqueue_gutenberg_frontend_styles' );
/**
 * Enqueues Gutenberg front-end styles.
 *
 * @since 2.7.0
 */
function <lowerSnakeCase>_enqueue_gutenberg_frontend_styles() {
<n>
	wp_enqueue_style(
		genesis_get_theme_handle() . '-gutenberg',
		get_stylesheet_directory_uri() . '/lib/gutenberg/front-end.css',
		[ genesis_get_theme_handle() ],
		genesis_get_theme_version()
	);
<n>
}
<n>
add_action( 'enqueue_block_editor_assets', '<lowerSnakeCase>_block_editor_styles' );
/**
 * Enqueues Gutenberg admin editor fonts and styles.
 *
 * @since 2.7.0
 */
function <lowerSnakeCase>_block_editor_styles() {
<n>
	$appearance = genesis_get_config( 'appearance' );
<n>
	wp_enqueue_style(
		genesis_get_theme_handle() . '-gutenberg-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);
<n>
}
<n>
add_filter( 'body_class', '<lowerSnakeCase>_blocks_body_classes' );
/**
 * Adds body classes to help with block styling.
 *
 * - `has-no-blocks` if content contains no blocks.
 * - `first-block-[block-name]` to allow changes based on the first block (such as removing padding above a Cover block).
 * - `first-block-align-[alignment]` to allow styling adjustment if the first block is wide or full-width.
 *
 * @since 2.8.0
 *
 * @param array $classes The original classes.
 * @return array The modified classes.
 */
function <lowerSnakeCase>_blocks_body_classes( $classes ) {
<n>
	if ( is_singular() === false || function_exists( 'has_blocks' ) === false || function_exists( 'parse_blocks' ) === false ) {
		return $classes;
	}
<n>
	if (has_blocks() === false ) {
		$classes[] = 'has-no-blocks';
		return $classes;
	}
<n>
	$post_object = get_post( get_the_ID() );
	$blocks      = (array) parse_blocks( $post_object->post_content );
<n>
	if ( isset( $blocks[0]['blockName'] ) ) {
		$classes[] = 'first-block-' . str_replace( '/', '-', $blocks[0]['blockName'] );
	}
<n>
	if ( isset( $blocks[0]['attrs']['align'] ) ) {
		$classes[] = 'first-block-align-' . $blocks[0]['attrs']['align'];
	}
<n>
	return $classes;
<n>
}
<n>
// Add support for editor styles.
add_theme_support( 'editor-styles' );
<n>
// Enqueue editor styles.
add_editor_style( '/lib/gutenberg/style-editor.css' );
<n>
// Adds support for block alignments.
add_theme_support( 'align-wide' );
<n>
// Make media embeds responsive.
add_theme_support( 'responsive-embeds' );
<n>
$<lowerSnakeCase>_appearance = genesis_get_config( 'appearance' );
<n>
// Adds support for editor font sizes.
add_theme_support(
	'editor-font-sizes',
	$<lowerSnakeCase>_appearance['editor-font-sizes']
);
<n>
// Adds support for editor color palette.
add_theme_support(
	'editor-color-palette',
	$<lowerSnakeCase>_appearance['editor-color-palette']
);
<n>
require_once get_stylesheet_directory() . '/lib/gutenberg/inline-styles.php';
<n>
add_action( 'after_setup_theme', '<lowerSnakeCase>_content_width', 0 );
/**
 * Set content width to match the “wide” Gutenberg block width.
 */
function <lowerSnakeCase>_content_width() {
<n>
	$appearance = genesis_get_config( 'appearance' );
<n>
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- See https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/924
	$GLOBALS['content_width'] = apply_filters( '<lowerSnakeCase>_content_width', $appearance['content-width'] );
<n>
}
