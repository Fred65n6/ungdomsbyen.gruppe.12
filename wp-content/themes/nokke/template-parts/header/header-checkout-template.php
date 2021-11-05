<?php
/**
 * The checkout header template file
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
} ?>

<header class="nokke-header nav" role="banner" itemtype="https://schema.org/WPHeader" itemscope="itemscope">
	<div class="nav__holder">
		<div class="nav__container container">
			<div class="nav__flex-parent flex-parent">

				<div class="nav__header">
					<?php nokke_logo(); ?>
				</div>

				<!-- Back to cart -->
				<div class="nokke-back-to-cart">
					<i class="nokke-icon-chevron-left" aria-hidden="true"></i>
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php echo esc_html__( 'Back to Cart', 'nokke' ); ?></a>
				</div>

			</div> <!-- .flex-parent -->
		</div> <!-- .nav__container -->
	</div> <!-- .nav__holder -->
</header> <!-- .nokke-header -->