<?php
/**
 * <themeName>.
 *
 * This file adds the required helper functions.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
/**
 * Calculates if white or gray would contrast more with the provided color.
 *
 * @since 2.2.3
 *
 * @param string $color A color in hex format.
 * @return string The hex code for the most contrasting color: dark grey or white.
 */
function <lowerSnakeCase>_color_contrast( $color ) {
<n>
	$hexcolor = str_replace( '#', '', $color );
	$red      = hexdec( substr( $hexcolor, 0, 2 ) );
	$green    = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue     = hexdec( substr( $hexcolor, 4, 2 ) );
<n>
	$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );
<n>
	return ( $luminosity > 128 ) ? '#333333' : '#ffffff';
<n>
}
<n>
/**
 * Generates a lighter or darker color from a starting color.
 * Used to generate complementary hover tints from user-chosen colors.
 *
 * @since 2.2.3
 *
 * @param string $color A color in hex format.
 * @param int    $change The amount to reduce or increase brightness by.
 * @return string Hex code for the adjusted color brightness.
 */
function <lowerSnakeCase>_color_brightness( $color, $change ) {
<n>
	$hexcolor = str_replace( '#', '', $color );
<n>
	$red   = hexdec( substr( $hexcolor, 0, 2 ) );
	$green = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue  = hexdec( substr( $hexcolor, 4, 2 ) );
<n>
	$red   = max( 0, min( 255, $red + $change ) );
	$green = max( 0, min( 255, $green + $change ) );
	$blue  = max( 0, min( 255, $blue + $change ) );
<n>
	return '#' . dechex( $red ) . dechex( $green ) . dechex( $blue );
<n>
}
