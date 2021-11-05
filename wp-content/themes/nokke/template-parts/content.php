<?php
/**
 * Masonry grid post layout.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$columns = get_theme_mod( 'nokke_settings_blog_columns', 'col-lg-12' );
$image_size = ( 'col-lg-12' == $columns ) ? 'nokke_featured_large' : 'nokke_featured_medium';
?>

<article itemtype="https://schema.org/Article" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<!-- Post thumb -->
		<figure class="entry__img-holder">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( esc_html( $image_size ), array( 'class' => 'entry__img' ) ); ?>
			</a>
		</figure>
	<?php endif; ?>

	<div class="entry__header">

		<?php if ( is_home() ) : ?>
			<?php if ( get_theme_mod( 'nokke_settings_meta_date_show', true ) ) : ?>
				<?php nokke_meta_date(); ?>
			<?php endif; ?>	
		<?php endif; ?>		

		<div class="entry__header-content">
			<?php the_title( sprintf( '<h2 class="entry__title"><a href="%s">',
			esc_url( get_permalink() ) ),
			'</a></h2>' ); ?>

			<?php if ( get_theme_mod( 'nokke_settings_meta_author_show', true ) || get_theme_mod( 'nokke_settings_meta_category_show', true ) || get_theme_mod( 'nokke_settings_meta_comments_show', true ) ) : ?>
				<div class="entry__meta">
					
					<?php if ( is_archive() || is_search() ) : ?>
						<?php if ( get_theme_mod( 'nokke_settings_meta_date_show', true ) ) : ?>
							<?php nokke_meta_date( true ); ?>
						<?php endif; ?>	
					<?php endif; ?>

					<?php if ( get_theme_mod( 'nokke_settings_meta_author_show', true ) ) : ?>
						<?php echo nokke_meta_author(); ?>
					<?php endif; ?>				

					<?php if ( get_theme_mod( 'nokke_settings_meta_category_show', true ) ) : ?>
						<?php nokke_meta_category(); ?>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'nokke_settings_meta_comments_show', true ) ) : ?>
						<?php nokke_meta_comments(); ?>
					<?php endif; ?>

				</div>
			<?php endif; ?>
		</div>
	</div>	
	

	<div class="entry__body">		

		<?php if ( get_the_excerpt() ) : ?>
			<!-- Excerpt -->
			<div class="entry__excerpt">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>

		<?php nokke_read_more(); ?>

	</div> <!-- .entry__body -->

</article><!-- #post-## -->