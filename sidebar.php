<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OnPoint
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-lg-3 offset-lg-1">
    <div class="side-bar">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
</div>
