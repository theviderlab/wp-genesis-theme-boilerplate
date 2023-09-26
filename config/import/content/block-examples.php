<?php
/**
 * <themeName>.
 *
 * Block example page content optionally installed after theme activation.
 *
 * Visit `/wp-admin/admin.php?page=genesis-getting-started` to trigger import.
 *
 * @package <themeName>
 * @author  <themeAuthor>
 * @license GPL-2.0-or-later
 * @link    <themeAuthorURI>
 */
<n>
return <<<CONTENT
<!-- wp:paragraph -->
<p>Below are examples of column classes that are available in the block editor.</p>
<!-- /wp:paragraph -->
<n>
<!-- wp:heading {"align":"left"} -->
<h2 style="text-align:left">Two Columns</h2>
<!-- /wp:heading -->
<n>
<!-- wp:columns -->
<div class="wp-block-columns has-2-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>This is an example of a WordPress post, you could edit this to put information about yourself or your site so readers know where you are coming from. You can create as many posts as you like in order to share with your readers what exactly is on your mind. </p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<n>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>This is an example of a WordPress post, you could edit this to put information about yourself or your site so readers know where you are coming from. You can create as many posts as you like in order to share with your readers what exactly is on your mind. </p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<n>
<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:heading {"align":"left"} -->
<h2 style="text-align:left">Three Columns</h2>
<!-- /wp:heading -->
<n>
<!-- wp:columns {"columns":3} -->
<div class="wp-block-columns has-3-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>
This is an example of a WordPress post, you could edit this to put information about yourself or your site so readers know where you are coming from. You can create as many posts as you like in order to share with your readers what exactly is on your mind.
<n>
</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<n>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>
This is an example of a WordPress post, you could edit this to put information about yourself or your site so readers know where you are coming from. You can create as many posts as you like in order to share with your readers what exactly is on your mind.
<n>
</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<n>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>
This is an example of a WordPress post, you could edit this to put information about yourself or your site so readers know where you are coming from. You can create as many posts as you like in order to share with your readers what exactly is on your mind.
<n>
</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<n>
<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator is-style-wide"/>
<!-- /wp:separator -->
<n>
<!-- wp:heading {"align":"left"} -->
<h2 style="text-align:left">Buttons</h2>
<!-- /wp:heading -->
<n>
<!-- wp:buttons {"align":"center"} -->
<div class="wp-block-buttons aligncenter"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link" href="#">Button</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<n>
<!-- wp:buttons {"align":"center"} -->
<div class="wp-block-buttons aligncenter"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" href="#">Outlined Button</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<n>
<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator is-style-wide"/>
<!-- /wp:separator -->
<n>
<!-- wp:heading {"align":"left"} -->
<h2 style="text-align:left">Blockquotes &amp; Pullquotes</h2>
<!-- /wp:heading -->
<n>
<!-- wp:pullquote {"align":"wide"} -->
<figure class="wp-block-pullquote alignwide"><blockquote><p>Good design is as little as possible. Less, but better, because it  concentrates on the essential aspects. Back to purity, back to  simplicity. </p><cite> <br>Dieter Rams</cite></blockquote></figure>
<!-- /wp:pullquote -->
CONTENT;
