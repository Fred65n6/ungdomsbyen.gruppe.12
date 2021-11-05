<?php
/**
 * If no content
 * 
 * @package Nokke
 */
?>

<div class="row justify-content-center">
	<div class="col-md-6">
		<article <?php post_class('entry'); ?>>

			<div class="text-center">
				<h4 class="mb-16"><?php esc_html_e( 'There is no content to display', 'nokke' ); ?></h4>
				<p class="mb-24"><?php esc_html_e('Don\'t fret! Let\'s get you back on track. Perhaps searching can help', 'nokke') ?></p>
				<?php get_search_form(); ?>
			</div>
					
		</article>
	</div>
</div>