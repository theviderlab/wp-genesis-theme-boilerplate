/**
 * Trigger AJAX request to save state when the WooCommerce notice is dismissed.
 *
 * @version 2.3.0
 *
 * @author <themeAuthor>
 * @license GPL-2.0-or-later
 * @package <themeName>
 */

jQuery( document ).on(
	'click', '.v<kebabCase>-woocommerce-notice .notice-dismiss', function() {

		jQuery.ajax(
			{
				url: ajaxurl,
				data: {
					action: '<lowerSnakeCase>_dismiss_woocommerce_notice'
				}
			}
		);

	}
);
