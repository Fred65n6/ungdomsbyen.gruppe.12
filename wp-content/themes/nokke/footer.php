<?php
/**
 * The template for displaying the footer.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

	<?php nokke_footer_before(); ?>

	<?php nokke_footer(); ?>		
	
	<?php nokke_footer_after(); ?>

	<?php nokke_back_to_top(); ?>

	<?php nokke_content_bottom(); ?>

	</div> <!-- #content -->

	<?php nokke_content_after(); ?>

</div> <!-- .main-wrapper -->

<?php nokke_body_bottom(); ?>

<?php wp_footer(); ?>
</body>
</html>