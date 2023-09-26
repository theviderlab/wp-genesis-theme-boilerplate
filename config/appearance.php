<?php
/**
 * <themeName> appearance settings.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
$<lowerSnakeCase>_default_colors = [
	'link'   => '#0073e5',
	'accent' => '#0073e5',
];
<n>
$<lowerSnakeCase>_link_color = get_theme_mod(
	'<lowerSnakeCase>_link_color',
	$<lowerSnakeCase>_default_colors['link']
);
<n>
$<lowerSnakeCase>_accent_color = get_theme_mod(
	'<lowerSnakeCase>_accent_color',
	$<lowerSnakeCase>_default_colors['accent']
);
<n>
$<lowerSnakeCase>_link_color_contrast   = <lowerSnakeCase>_color_contrast( $<lowerSnakeCase>_link_color );
$<lowerSnakeCase>_link_color_brightness = <lowerSnakeCase>_color_brightness( $<lowerSnakeCase>_link_color, 35 );
<n>
return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700&display=swap',
	'content-width'        => 1062,
	'button-bg'            => $<lowerSnakeCase>_link_color,
	'button-color'         => $<lowerSnakeCase>_link_color_contrast,
	'button-outline-hover' => $<lowerSnakeCase>_link_color_brightness,
	'link-color'           => $<lowerSnakeCase>_link_color,
	'default-colors'       => $<lowerSnakeCase>_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Custom color', '<kebabCase>' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => $<lowerSnakeCase>_link_color,
		],
		[
			'name'  => __( 'Accent color', '<kebabCase>' ),
			'slug'  => 'theme-secondary',
			'color' => $<lowerSnakeCase>_accent_color,
		],
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Small', '<kebabCase>' ),
			'size' => 12,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', '<kebabCase>' ),
			'size' => 18,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', '<kebabCase>' ),
			'size' => 20,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', '<kebabCase>' ),
			'size' => 24,
			'slug' => 'larger',
		],
	],
];
