<?php
/**
 * Page title.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( nokke_is_woocommerce_activated() ) {
	if ( is_page('wishlist') ) {
		return;
	}

	if ( is_checkout() && get_theme_mod( 'nokke_settings_woocommerce_distraction_free_checkout', true ) ) {
		get_template_part( 'template-parts/header/header-checkout-template' );
		return;
	}
}

if ( ! get_theme_mod( 'nokke_settings_regular_pages_page_title_show', true ) ) {
	return;
}

$page_subtitle = get_post_meta( get_the_ID(), '_nokke_page_subtitle', true );
?>

<!-- Page Title -->
<div class="page-title">
	<div class="container">
		<div class="page-title__holder">
			<?php nokke_page_title_before(); ?>
			<div class="page-title__inner">

				<?php if ( ! is_front_page() ) : ?>
					<h1 class="page-title__title"><?php single_post_title(); ?></h1>
				<?php else : ?>
					<h1 class="page-title__title"><?php the_title(); ?></h1>
				<?php endif; ?>
				<?php nokke_page_title_after(); ?>
				<?php if ( $page_subtitle ) : ?>
					<!-- Subtitle -->
					<p class="page-title__subtitle"><?php echo esc_html( $page_subtitle ); ?></p>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div> <!-- .page-title -->