<?php
/**
 * Page title for archive pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$archive_title    	 = get_the_archive_title();
$archive_description = get_the_archive_description();
$projects_title			 = get_theme_mod( 'nokke_settings_project_archives_title', esc_html__( 'Projects', 'nokke' ) );
?>

<?php if ( $archive_title || $archive_description ) : ?>

	<!-- Page Title -->
	<div class="page-title text-center">
		<div class="container">
			<div class="page-title__holder">
				<?php nokke_page_title_before(); ?>

					<div class="page-title__inner">
						<?php if ( $archive_title ) : ?>						
							<h1 class="page-title__title">
								<?php
									if ( is_post_type_archive( 'projects' ) ) :
										echo wp_kses_post( $projects_title );

									elseif ( is_tax( 'projects_categories' ) || is_tax( 'services_categories' ) || is_category() || is_tag() ) :
										single_cat_title();

									else :
										echo wp_kses_post( $archive_title );

									endif;
								?>
							</h1>
						<?php endif; ?>

						<?php
							if ( is_post_type_archive( 'projects' ) ) {
								printf( '<p class="page-title__subtitle">%s</p>', get_theme_mod( 'nokke_settings_project_archives_subtitle', esc_html__( 'Here are the best features that makes nokke the most powerful, fast and user-friendly platform.', 'nokke' ) ));
							} elseif ( $archive_description ) {
								?>
								<div class="page-title__description"><?php echo wp_kses_post( wpautop( $archive_description ) ); ?></div>
								<?php
							}
						?>

					</div>				
			
				<?php nokke_page_title_after(); ?>

			</div>
		</div>
	</div> <!-- .page-title -->

<?php endif; ?>