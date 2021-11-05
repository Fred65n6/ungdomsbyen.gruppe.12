<?php
/**
 * The main header template file
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
} ?>

<div class="nav__header">

	<?php nokke_logo(); ?>

	<?php nokke_menu_mobile(); ?>

</div> <!-- .nav__header -->

<?php nokke_menu_before(); ?>

<?php if ( has_nav_menu('primary-menu') ) : ?>
	<!-- Navbar -->
	<nav class="nav__wrap collapse navbar-collapse" id="navbar-collapse" role="navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" aria-label="<?php echo esc_attr__( 'Primary menu', 'nokke' ); ?>">		
		<?php			
			wp_nav_menu( array(
				'theme_location'  => 'primary-menu',
				'fallback_cb'			=> '__return_false',
				'container'       => false,
				'menu_class'      => 'nav__menu',
				'walker'          => new Nokke_Walker_Nav_Menu()
			) );
		?>

		<?php nokke_last_menu_item_after(); ?>

	</nav> <!-- end nav__wrap -->
<?php endif; ?>

<?php nokke_menu_after(); ?>