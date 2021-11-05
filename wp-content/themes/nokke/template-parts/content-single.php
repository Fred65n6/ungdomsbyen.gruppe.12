<?php
/**
 * Single post
 *
 * @package Nokke
 */
?>

<?php 
	$tags_show = get_theme_mod( 'nokke_settings_post_tags_show', true );
	$socials_share_show = get_theme_mod( 'nokke_settings_post_share_buttons_show', true );
?>

<div class="single-post__content">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry single-post__entry' ); ?>>	
		<div class="entry__article-wrap">

			<?php nokke_entry_content_top(); ?>

			<div class="entry__article clearfix">
				<?php the_content(); ?>
			</div>

			<?php nokke_multi_page_pagination(); ?>

			<?php nokke_entry_content_bottom(); ?>

		</div> <!-- .entry__article-wrap -->	
	</article><!-- #post-## -->

	<?php if ( $tags_show || $socials_share_show ) : ?>
		<div class="row">
			<?php if ( $tags_show && has_tag() ) : ?>
				<div class="<?php if ( $socials_share_show && function_exists( 'nokke_social_sharing_buttons' ) ) { echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?>">
					<!-- Tags -->
					<div class="entry__tags">
						<span class="entry__tags-label"><?php echo apply_filters( 'nokke_tags_label', esc_html__( "Tags:", 'nokke' ) ); ?></span>						 
						<?php the_tags( '', ', ', '' ); ?>
					</div> <!-- end tags -->
				</div>
			<?php endif; ?>

			<?php if ( $socials_share_show && function_exists( 'nokke_social_sharing_buttons' ) ) : ?>
				<div class="<?php if ( $tags_show ) { echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?>">
					<!-- Share -->
					<div class="entry__share <?php if ( $tags_show && has_tag() ) { echo 'entry__share--right'; } ?>">
						<span class="entry__share-label"><?php echo apply_filters( 'nokke_share_label', esc_html__( "Share:", 'nokke' ) ); ?></span>		
						<?php echo nokke_social_sharing_buttons( 'socials--no-base' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'nokke_settings_author_box_show', true ) ) {
		nokke_author_box();
	} ?>

</div> <!-- .single-post__content -->

<?php if ( get_theme_mod( 'nokke_settings_related_posts_show', true ) ) {
	nokke_related_posts();
} ?>

<?php
	// Comments
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
?>