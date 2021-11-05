<?php
/**
 * The template for displaying all single posts.
 *
 * @package Nokke
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( 'projects' == get_post_type() || 'services' == get_post_type() ) : ?>	

		<?php the_content(); ?>

	<?php else : ?>

		<?php nokke_entry_featured_image_before(); ?>

		<?php nokke_entry_featured_image(); ?>

		<?php nokke_entry_featured_image_after(); ?>

		<?php nokke_entry_section_before(); ?>

		<div class="section-wrap pt-72 pb-40">
			<div class="container">
				<div class="row">

					<!-- blog content -->
					<div class="content blog__content col-lg mb-40">
						<main class="site-main">
					
							<?php
								if ( function_exists( 'nokke_save_post_views' ) ) {
									nokke_save_post_views( get_the_ID() );
								}

								get_template_part( 'template-parts/content-single', get_post_format() );
							?>
							
						</main>
					</div> <!-- .blog__content -->

					<?php
						if ( nokke_is_active_sidebar( 'blog', 'single_post', 'fullwidth' ) ) {
							nokke_sidebar( 'nokke-blog-sidebar' );
						}
					?>

				</div>
			</div>

		</div> <!-- .section-wrap -->

		<?php nokke_post_nav(); ?>

	<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>