<?php
/**
 * Adds front-end inline styles for the custom Gutenberg color palette.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
add_action( 'wp_enqueue_scripts', '<lowerSnakeCase>_custom_gutenberg_css' );
/**
 * Outputs front-end inline styles based on colors declared in config/appearance.php.
 *
 * @since 2.9.0
 */
function <lowerSnakeCase>_custom_gutenberg_css() {
<n>
	$appearance = genesis_get_config( 'appearance' );
<n>
	$css = <<<CSS
.ab-block-post-grid .ab-post-grid-items h2 a:hover {
	color: {$appearance['link-color']};
}
<n>
.site-container .wp-block-button .wp-block-button__link {
	background-color: {$appearance['link-color']};
}
<n>
.wp-block-button .wp-block-button__link:not(.has-background),
.wp-block-button .wp-block-button__link:not(.has-background):focus,
.wp-block-button .wp-block-button__link:not(.has-background):hover {
	color: {$appearance['button-color']};
}
<n>
.site-container .wp-block-button.is-style-outline .wp-block-button__link {
	color: {$appearance['button-bg']};
}
<n>
.site-container .wp-block-button.is-style-outline .wp-block-button__link:focus,
.site-container .wp-block-button.is-style-outline .wp-block-button__link:hover {
	color: {$appearance['button-outline-hover']};
}
CSS;
<n>
	$css .= <lowerSnakeCase>_inline_font_sizes();
	$css .= <lowerSnakeCase>_inline_color_palette();
<n>
	wp_add_inline_style( genesis_get_theme_handle() . '-gutenberg', $css );
<n>
}
<n>
add_action( 'enqueue_block_editor_assets', '<lowerSnakeCase>_custom_gutenberg_admin_css' );
/**
 * Outputs back-end inline styles based on colors declared in config/appearance.php.
 *
 * Note this will appear before the style-editor.css injected by JavaScript,
 * so overrides will need to have higher specificity.
 *
 * @since 2.9.0
 */
function <lowerSnakeCase>_custom_gutenberg_admin_css() {
<n>
	$appearance = genesis_get_config( 'appearance' );
<n>
	$css = <<<CSS
.ab-block-post-grid .ab-post-grid-items h2 a:hover,
.block-editor__container .editor-styles-wrapper a {
	color: {$appearance['link-color']};
}
<n>
.editor-styles-wrapper .editor-rich-text .button,
.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
	background-color: {$appearance['button-bg']};
	color: {$appearance['button-color']};
}
<n>
.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link {
	color: {$appearance['button-bg']};
}
<n>
.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus,
.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover {
	color: {$appearance['button-outline-hover']};
}
CSS;
<n>
	$css .= <lowerSnakeCase>_editor_inline_color_palette();
<n>
	wp_add_inline_style( genesis_get_theme_handle() . '-gutenberg-fonts', $css );
<n>
}
<n>
/**
 * Generate CSS for editor font sizes from the provided theme support.
 *
 * @since 2.9.0
 *
 * @return string The CSS for editor font sizes if theme support was declared.
 */
function <lowerSnakeCase>_inline_font_sizes() {
<n>
	$css               = '';
	$editor_font_sizes = get_theme_support( 'editor-font-sizes' );
<n>
	if ( $editor_font_sizes === false ) {
		return '';
	}
<n>
	foreach ( $editor_font_sizes[0] as $font_size ) {
		$css .= <<<CSS
		.site-container .has-{$font_size['slug']}-font-size {
			font-size: {$font_size['size']}px;
		}
CSS;
	}
<n>
	return $css;
<n>
}
<n>
/**
 * Generate CSS for editor colors based on theme color palette support.
 *
 * @since 2.9.0
 *
 * @return string The editor colors CSS if `editor-color-palette` theme support was declared.
 */
function <lowerSnakeCase>_inline_color_palette() {
<n>
	$css                  = '';
	$appearance           = genesis_get_config( 'appearance' );
	$editor_color_palette = $appearance['editor-color-palette'];
<n>
	foreach ( $editor_color_palette as $color_info ) {
		$css .= <<<CSS
		.site-container .has-{$color_info['slug']}-color,
		.site-container .wp-block-button .wp-block-button__link.has-{$color_info['slug']}-color,
		.site-container .wp-block-button.is-style-outline .wp-block-button__link.has-{$color_info['slug']}-color {
			color: {$color_info['color']};
		}
<n>
		.site-container .has-{$color_info['slug']}-background-color,
		.site-container .wp-block-button .wp-block-button__link.has-{$color_info['slug']}-background-color,
		.site-container .wp-block-pullquote.is-style-solid-color.has-{$color_info['slug']}-background-color {
			background-color: {$color_info['color']};
		}
CSS;
	}
<n>
	return $css;
}
<n>
/**
 * Generate CSS for editor colors based on theme color palette support.
 *
 * @since 3.3.0
 *
 * @return string The editor colors CSS if `editor-color-palette` theme support was declared.
 */
function <lowerSnakeCase>_editor_inline_color_palette() {
<n>
	$css                  = '';
	$appearance           = genesis_get_config( 'appearance' );
	$editor_color_palette = $appearance['editor-color-palette'];
<n>
	foreach ( $editor_color_palette as $color_info ) {
		$css .= <<<CSS
		.has-{$color_info['slug']}-color {
			color: {$color_info['color']};
		}
CSS;
	}
<n>
	return $css;
<n>
}
