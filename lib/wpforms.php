<?php
/**
 * <themeName> WPForms helper functions.
 *
 * Assists with the creation of a WPForms form, and the replacement of contact
 * page content with a working contact form block during one-click theme setup.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
/**
 * Creates a WPForms form if one added by a <themeName> does not exist.
 *
 * @since 2.10.0
 *
 * @return int|null ID of form if one exists or gets created. Null if form creation fails or WPForms is inactive.
 */
function <lowerSnakeCase>_maybe_create_wpforms_form() { // phpcs:ignore -- <lowerSnakeCase> prefix for functions shared between themes.
<n>
	if ( function_exists( 'wpforms' ) === false ) {
		return;
	}
<n>
	// Form creation requires WPForms 1.5.2 or higher.
	// If the site already as an earlier version of the plugin installed, don't create a form.
	// Plugins do not get upgraded during one-click theme setup.
	if ( function_exists( 'get_plugins' ) ) {
		$plugin_data          = get_plugins();
		$wpforms_lite_version = isset( $plugin_data['wpforms-lite/wpforms.php']['Version'] ) ? $plugin_data['wpforms-lite/wpforms.php']['Version'] : '';
<n>
		if ( version_compare( $wpforms_lite_version, '1.5.2', '<' ) ) {
			return;
		}
	}
<n>
	$existing_form_id = get_option( 'genesis_onboarding_wpforms_id' );
<n>
	if ( $existing_form_id ) {
		$wpform = get_post( $existing_form_id );
<n>
		// Don't create another form if a valid one already exists.
		if ( $wpform && 'wpforms' === $wpform->post_type ) {
			return $existing_form_id;
		}
<n>
		// Stored ID no longer points to a WPForms form.
		delete_option( 'genesis_onboarding_wpforms_id' );
	}
<n>
	// Creates a form using the WPForms 'contact' template.
	$new_form_id = wpforms()->form->add(
		esc_html__( 'Simple Contact Form', '<kebabCase>' ),
		[],
		[
			'template' => 'contact',
			'builder'  => false,
		]
	);
<n>
	if ( $new_form_id ) {
		update_option( 'genesis_onboarding_wpforms_id', $new_form_id, false );
		return $new_form_id;
	}
<n>
}
<n>
/**
 * Replace contact page placeholder content with a block displaying the form.
 *
 * @since 2.10.0
 *
 * @param array $content The content config.
 * @param array $imported_posts Imported posts with content short name as keys and IDs as values.
 */
function <lowerSnakeCase>_insert_contact_form( $content, $imported_posts ) { // phpcs:ignore -- <lowerSnakeCase> prefix for functions shared between themes.
<n>
	$form_id = <lowerSnakeCase>_maybe_create_wpforms_form();
<n>
	if ( $form_id && array_key_exists( 'contact', $imported_posts ) ) {
		$contact_page = [
			'ID'           => $imported_posts['contact'],
			'post_content' => "<!-- wp:wpforms/form-selector {\"formId\":\"{$form_id}\"} /-->",
		];
<n>
		wp_update_post( $contact_page );
	}
<n>
}
