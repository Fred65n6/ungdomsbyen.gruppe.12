<?php
/**
 * Search form
 *
 * @package Nokke
 */
?>

<form role="search" method="get" class="search-form relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-input" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'nokke' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-button" aria-label="<?php esc_attr_e( 'search button', 'nokke' ) ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="nokke-search search-icon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
	</button>
</form>