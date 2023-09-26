<?php
/**
 * <themeName>
 *
 * This file adds functions to the theme.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
// Starts the engine.
require_once get_template_directory() . '/lib/init.php';
<n>
// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';
<n>
add_action( 'after_setup_theme', '<lowerSnakeCase>_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function <lowerSnakeCase>_localization_setup() {
<n>
	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );
<n>
}
<n>
// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';
<n>
// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';
<n>
// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';
<n>
// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';
<n>
// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';
<n>
// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';
<n>
add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}
<n>
// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}
<n>
add_action( 'wp_enqueue_scripts', '<lowerSnakeCase>_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function <lowerSnakeCase>_enqueue_scripts_styles() {
<n>
	$appearance = genesis_get_config( 'appearance' );
<n>
	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);
<n>
	wp_enqueue_style( 'dashicons' );
<n>
	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}
<n>
	wp_enqueue_script( genesis_get_theme_handle() . '-script', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), 1.1, true);
<n>
}
<n>
add_action( 'after_setup_theme', '<lowerSnakeCase>_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function <lowerSnakeCase>_theme_support() {
<n>
	$theme_supports = genesis_get_config( 'theme-supports' );
<n>
	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
<n>
}
<n>
add_action( 'after_setup_theme', '<lowerSnakeCase>_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
function <lowerSnakeCase>_post_type_support() {
<n>
	$post_type_supports = genesis_get_config( 'post-type-supports' );
<n>
	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}
<n>
}
<n>
// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );
add_image_size( 'genesis-singular-images', 702, 526, true );
<n>
// Removes header right widget area.
unregister_sidebar( 'header-right' );
<n>
// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );
<n>
// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
<n>
// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );
<n>
// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );
<n>
add_filter( 'wp_nav_menu_args', '<lowerSnakeCase>_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function <lowerSnakeCase>_secondary_menu_args( $args ) {
<n>
	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}
<n>
	return $args;
<n>
}
<n>
add_filter( 'genesis_author_box_gravatar_size', '<lowerSnakeCase>_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function <lowerSnakeCase>_author_box_gravatar( $size ) {
<n>
	return 90;
<n>
}
<n>
add_filter( 'genesis_comment_list_args', '<lowerSnakeCase>_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function <lowerSnakeCase>_comments_gravatar( $args ) {
<n>
	$args['avatar_size'] = 60;
	return $args;
<n>
}
<n>
//* Change the footer text
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', '<lowerSnakeCase>_custom_footer' );
function <lowerSnakeCase>_custom_footer() {
	?>
	<p>Copyright &copy; 2023 &middot; <themeCustomer> &middot; <?php _e("Developer:", '<kebabCase>'); ?> <a href="<themeAuthorURI>"><themeAuthor></a></p>
	<?php
}
