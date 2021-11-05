<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package Nokke
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'nokke-blog-sidebar' ) ) {
	return;
}
?>

<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope" id="secondary" class="widget-area" role="complementary">
	
	<?php nokke_sidebar_before(); ?>

	<?php dynamic_sidebar( 'nokke-blog-sidebar' ); ?>

	<?php nokke_sidebar_after(); ?>

</div><!-- #secondary -->
