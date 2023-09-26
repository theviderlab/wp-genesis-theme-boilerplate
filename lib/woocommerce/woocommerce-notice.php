<?php
/**
 * <themeName>.
 *
 * This file adds the Genesis Connect for WooCommerce notice.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
add_action( 'admin_print_styles', '<lowerSnakeCase>_remove_woocommerce_notice' );
/**
 * Removes the default WooCommerce Notice.
 *
 * @since 2.3.0
 */
function <lowerSnakeCase>_remove_woocommerce_notice() {
<n>
	// If below version WooCommerce 2.3.0, exit early.
	if ( class_exists( 'WC_Admin_Notices' ) === false ) {
		return;
	}
<n>
	WC_Admin_Notices::remove_notice( 'theme_support' );
<n>
}
<n>
add_action( 'admin_notices', '<lowerSnakeCase>_woocommerce_theme_notice' );
/**
 * Adds a prompt to activate Genesis Connect for WooCommerce
 * if WooCommerce is active but Genesis Connect is not.
 *
 * @since 2.3.0
 */
function <lowerSnakeCase>_woocommerce_theme_notice() {
<n>
	// If WooCommerce isn't installed or Genesis Connect is installed, exit early.
	if ( class_exists( 'WooCommerce' ) === false || function_exists( 'gencwooc_setup' ) ) {
		return;
	}
<n>
	// If user doesn't have access, exit early.
	if ( current_user_can( 'manage_woocommerce' ) === false ) {
		return;
	}
<n>
	// If message dismissed, exit early.
	if ( get_user_option( '<lowerSnakeCase>_woocommerce_message_dismissed', get_current_user_id() ) ) {
		return;
	}
<n>
	/* translators: %s: child theme name */
	$notice_html = sprintf( __( 'Please install and activate <a href="https://wordpress.org/plugins/genesis-connect-woocommerce/" target="_blank">Genesis Connect for WooCommerce</a> to <strong>enable WooCommerce support for %s</strong>.', '<kebabCase>' ), wp_get_theme()->get( 'Name' ) );
<n>
	if ( current_user_can( 'install_plugins' ) ) {
		$plugin_slug  = 'genesis-connect-woocommerce';
		$admin_url    = network_admin_url( 'update.php' );
		$install_link = sprintf(
			'<a href="%s">%s</a>',
			wp_nonce_url(
				add_query_arg(
					[
						'action' => 'install-plugin',
						'plugin' => $plugin_slug,
					],
					$admin_url
				),
				'install-plugin_' . $plugin_slug
			),
			__( 'install and activate Genesis Connect for WooCommerce', '<kebabCase>' )
		);
<n>
		/* translators: 1: plugin install prompt presented as link, 2: child theme name */
		$notice_html = sprintf( __( 'Please %1$s to <strong>enable WooCommerce support for %2$s</strong>.', '<kebabCase>' ), $install_link, wp_get_theme()->get( 'Name' ) );
	}
<n>
	echo '<div class="notice notice-info is-dismissible <kebabCase>-woocommerce-notice"><p>' . wp_kses_post( $notice_html ) . '</p></div>';
<n>
}
<n>
add_action( 'wp_ajax_<lowerSnakeCase>_dismiss_woocommerce_notice', '<lowerSnakeCase>_dismiss_woocommerce_notice' );
/**
 * Adds option to dismiss Genesis Connect for Woocommerce plugin install prompt.
 *
 * @since 2.3.0
 */
function <lowerSnakeCase>_dismiss_woocommerce_notice() {
<n>
	update_user_option( get_current_user_id(), '<lowerSnakeCase>_woocommerce_message_dismissed', 1 );
<n>
}
<n>
add_action( 'admin_enqueue_scripts', '<lowerSnakeCase>_notice_script' );
/**
 * Enqueues script to clear the Genesis Connect for WooCommerce plugin install prompt on dismissal.
 *
 * @since 2.3.0
 */
function <lowerSnakeCase>_notice_script() {
<n>
	wp_enqueue_script( '<lowerSnakeCase>_notice_script', get_stylesheet_directory_uri() . '/lib/woocommerce/js/notice-update.js', [ 'jquery' ], '1.0', true );
<n>
}
<n>
add_action( 'switch_theme', '<lowerSnakeCase>_reset_woocommerce_notice', 10, 2 );
/**
 * Clears the Genesis Connect for WooCommerce plugin install prompt on theme change.
 *
 * @since 2.3.0
 */
function <lowerSnakeCase>_reset_woocommerce_notice() {
<n>
	global $wpdb;
<n>
	$args  = [
		'meta_key'   => $wpdb->prefix . '<lowerSnakeCase>_woocommerce_message_dismissed', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
		'meta_value' => 1, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
	];
	$users = get_users( $args );
<n>
	foreach ( $users as $user ) {
		delete_user_option( $user->ID, '<lowerSnakeCase>_woocommerce_message_dismissed' );
	}
<n>
}
<n>
add_action( 'deactivated_plugin', '<lowerSnakeCase>_reset_woocommerce_notice_on_deactivation', 10, 2 );
/**
 * Clears the Genesis Connect for WooCommerce plugin prompt on deactivation.
 *
 * @since 2.3.0
 *
 * @param string $plugin The plugin slug.
 * @param bool   $network_deactivating Whether the plugin is deactivated for all sites in the network. or just the current site.
 */
function <lowerSnakeCase>_reset_woocommerce_notice_on_deactivation( $plugin, $network_deactivating ) {
<n>
	// Conditional check to see if we're deactivating WooCommerce or Genesis Connect for WooCommerce.
	if ( ('woocommerce/woocommerce.php' === $plugin) === false && ('genesis-connect-woocommerce/genesis-connect-woocommerce.php' === $plugin) === false ) {
		return;
	}
<n>
	<lowerSnakeCase>_reset_woocommerce_notice();
<n>
}
