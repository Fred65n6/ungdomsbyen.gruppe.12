<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Nokke
 */

get_header();

$title = get_theme_mod( 'nokke_settings_page_404_title', __( 'Page Not Found', 'nokke' ) );
$description = get_theme_mod( 'nokke_settings_page_404_description', __( 'Oops! The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'nokke' ) );
$button_text = get_theme_mod( 'nokke_settings_page_404_button_text', __( 'Back to Home', 'nokke' ) );

?>

<div class="page-404-section bg-light">

	<div class="container text-center">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<main class="site-main" role="main">

					<div class="page-404">
						<h1 class="page-404__title mt-32 mb-16"><?php echo esc_html( $title ); ?></h1>					
						<h2 class="page-404__number"><?php echo apply_filters( 'nokke_404_number', esc_html__( '404', 'nokke' ) ); ?></h2>
						<p class="page-404__text mb-72"><?php echo esc_html( $description ); ?></p>

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--lg btn--color btn--icon hover-pulse">
							<span><?php echo esc_html( $button_text ); ?></span>
						</a>
					</div>

				</main>
			</div>
		</div>				
	</div>

</div>

<?php get_footer();