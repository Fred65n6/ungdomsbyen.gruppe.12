<?php
/**
 * The template for displaying all pages.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
	<?php
		// Check if the page built with Elementor
		if ( nokke_is_elementor_page() ) : ?>

			<?php nokke_primary_content_top(); ?>

			<main class="elementor-main-content site-main">

				<?php nokke_primary_content_before(); ?>

				<?php the_content(); ?>

				<?php nokke_primary_content_after(); ?>

			</main>

			<?php nokke_comments(); ?>

			<?php nokke_primary_content_bottom(); ?>

		<?php else : ?>			

			<?php
				// Page Title
				get_template_part( 'template-parts/page-title/page-title' );
			?>

			<div class="page-section pb-56">
				<div class="container">
					<div class="row">

						<?php nokke_primary_content_top(); ?>

						<div id="primary" class="content page-content col-lg mb-32">
							<main class="site-main">

								<?php nokke_primary_content_before(); ?>

								<div class="entry__article clearfix">
									<?php the_content(); ?>
								</div>

								<?php nokke_multi_page_pagination(); ?>
								
								<?php nokke_comments(); ?>

								<?php nokke_primary_content_after(); ?>

							</main>
						</div> <!-- .page-content -->

						<?php nokke_primary_content_bottom(); ?>

						<?php
							// Sidebar
							if ( nokke_is_active_sidebar( 'page', 'page', 'fullwidth' ) ) {
								nokke_sidebar( 'nokke-page-sidebar' );
							}
						?>						

					</div> <!-- .row -->
				</div> <!-- .container -->			
			</div> <!-- .page-section -->

	<?php endif; ?> <!-- elementor check -->	
<?php endwhile; endif; ?>

<?php get_footer(); ?>