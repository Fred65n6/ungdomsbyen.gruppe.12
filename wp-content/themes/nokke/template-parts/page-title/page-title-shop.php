<?php
/**
 * Page title for shop pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! get_theme_mod( 'nokke_settings_shop_page_title_show', true ) ) {
	return;
}

$page_title_desc = get_theme_mod( 'nokke_settings_woocommerce_page_title_description', esc_html__( '— Simple and beautiful way to sell products.', 'nokke' ) );

if ( is_shop() ) : ?>
	<div class="page-title-shop-archive">
		<div class="container">
			<h1 class="page-title__title"><?php woocommerce_page_title(); ?></h1>

			<?php if ( $page_title_desc ) : ?>
				<p class="page-title__description"><?php echo esc_html( $page_title_desc ); ?></p>
			<?php endif; ?>

		</div>
	</div>
<?php else : ?>

<!-- Page Title -->
<div class="page-title page-title-shop">
	<div class="container">
		<div class="page-title__holder">
			<?php nokke_page_title_before(); ?>
				<h1 class="page-title__title"><?php woocommerce_page_title(); ?></h1>
			<?php nokke_page_title_after(); ?>
		</div>
	</div>
</div> <!-- .page-title -->

<?php endif;