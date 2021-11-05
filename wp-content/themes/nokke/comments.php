<?php
/**
 * The template for displaying comments.
 * 
 * The area of the page that contains both current comments
 * and the comment form.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>
	<section class="section-comments bg-light pt-72 pb-72">
		<div class="container">
			<div class="row justify-content-center">
				<div class="
					<?php if ( 'fullwidth' !== nokke_layout_type( 'single_post' ) ) {
						echo 'col-lg-10';
						} else {
							echo 'col-lg-8';
						}
					?>">

					<div id="comments" class="entry__comments">

						<?php nokke_comments_before(); ?>

							<h2 class="entry-comments__title">    
								<?php
									comments_number( esc_html__( 'No Comments', 'nokke' ),
										esc_html__( '1 Comment', 'nokke' ),
										esc_html__( '% Comments', 'nokke' )
									);
								?>
							</h2>

							<?php the_comments_navigation(); ?>

							<ul class="comment-list">
								<?php
									wp_list_comments( array(
										'style'             => 'ul',
										'short_ping'        => true,
										'avatar_size'       => 60,
										'per_page'          => '',
										'rnokke_top_level' => true,
										'walker'            => new Nokke_Walker_Comment()
									) );
								?>
							</ul><!-- .comment-list -->

							<?php the_comments_navigation(); ?>					

						<?php
							if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
						?>
							<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'nokke' ); ?></p>
						<?php endif; ?>

					</div><!-- .entry-comments -->
				
				</div>
			</div>
		</div>
	</section>
<?php endif; // have_comments() ?>

<section class="section-comment-form pt-48">

	<?php if ( 'fullwidth' == nokke_layout_type( 'single_post' ) ) : ?>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

			<?php endif; ?>

				<?php
					$commenter = wp_get_current_commenter();
					$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

					$fields = array(
						'author' =>
						'<div class="row"><div class="col-lg-4"><div class="comment-form-input"><label for="author">' . esc_html__( 'Name', 'nokke' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div></div>',

						'email' =>
						'<div class="col-lg-4"><div class="comment-form-input"><label for="email">' . esc_html__( 'Email', 'nokke' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div></div>',

						'url' =>
						'<div class="col-lg-4"><div class="comment-form-input"><label for="url">' . esc_html__( 'Website', 'nokke' ) . '</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div>',

						'cookies' =>
						'<p class="consent-checkbox"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
						'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'nokke' ) . '</label></p>'
					);

					$args = array(
						'class_submit'  => 'btn btn--lg btn--color btn--button',
						'title_reply_before' => '<h2 class="comment-respond__title">',
						'title_reply' => esc_html__( 'Leave a Comment', 'nokke' ),
						'title_reply_after' => '</h2>',
						'comment_notes_before' => '',
						'comment_field' => '<label for="comment">' . esc_html_x( 'Comment', 'noun', 'nokke' ) . '</label><textarea id="comment" class="form-control comment-form__textarea" name="comment" rows="6" required="required"></textarea>',
						'fields' => apply_filters( 'nokke_comment_form_default_fields', $fields ),
						'submit_field' => '<p class="form-submit">%1$s %2$s</p>',
					);

					comment_form( $args );
				?>

			<?php if ( 'fullwidth' == nokke_layout_type( 'single_post' ) ) : ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</section> <!-- comment form -->