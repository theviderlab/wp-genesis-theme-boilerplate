<?php
/**
 * <themeName>.
 *
 * This file adds the landing page template.
 *
 * Template Name: Landing
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
add_filter( 'body_class', '<lowerSnakeCase>_landing_body_class' );
/**
 * Adds landing page body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function <lowerSnakeCase>_landing_body_class( $classes ) {
<n>
	$classes[] = 'landing-page';
	return $classes;
<n>
}
<n>
// Removes Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );
<n>
add_action( 'wp_enqueue_scripts', '<lowerSnakeCase>_dequeue_skip_links' );
/**
 * Dequeues Skip Links Script.
 *
 * @since 1.0.0
 */
function <lowerSnakeCase>_dequeue_skip_links() {
<n>
	wp_dequeue_script( 'skip-links' );
<n>
}
<n>
// Removes site header elements.
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
<n>
// Removes navigation.
remove_theme_support( 'genesis-menus' );
<n>
// Removes site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
<n>
// Runs the Genesis loop.
genesis();
