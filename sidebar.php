<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package winerack
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="uk-width-medium-1-4">
    <aside id="secondary" class="widget-area">
    	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside><!-- #secondary -->
</div>