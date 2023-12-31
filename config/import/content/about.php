<?php
/**
 * <themeName>.
 *
 * About page content optionally installed after theme activation.
 *
 * Visit `/wp-admin/admin.php?page=genesis-getting-started` to trigger import.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
// Photo by Fabrice Villard on Unsplash.
$<lowerSnakeCase>_about_image_url = CHILD_URL . '/config/import/images/about.jpg';
<n>
return <<<CONTENT
<!-- wp:image {"id":2141,"align":"center"} -->
<div class="wp-block-image"><figure class="aligncenter"><img src="$<lowerSnakeCase>_about_image_url" alt="" class="wp-image-2141"/></figure></div>
<!-- /wp:image -->
<n>
<!-- wp:atomic-blocks/ab-spacer {"spacerHeight":29} -->
<div style="color:#ddd" class="wp-block-atomic-blocks-ab-spacer ab-block-spacer ab-divider-solid ab-divider-size-1"><hr style="height:29px"/></div>
<!-- /wp:atomic-blocks/ab-spacer -->
<n>
<!-- wp:columns -->
<div class="wp-block-columns has-2-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>Hello! We are StudioPress, and  we build themes with an emphasis on typography, white space, and   mobile-optimized design to make your website look absolutely   breathtaking.  </p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<n>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"align":"right"} -->
<h2 style="text-align:right" id="mce_9">Contact Us</h2>
<!-- /wp:heading -->
<n>
<!-- wp:paragraph {"align":"right"} -->
<p style="text-align:right"> 555.555.5555</p>
<!-- /wp:paragraph -->
<n>
<!-- wp:paragraph {"align":"right"} -->
<p style="text-align:right">
1234 Block Blvd.<br>San Francisco, CA 94120
<n>
</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
CONTENT;
