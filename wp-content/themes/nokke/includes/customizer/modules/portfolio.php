<?php
/**
 * Portfolio
 *
 * @package Nokke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* Back to link
*/
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'dropdown-pages',
	'settings'    => 'nokke_settings_portfolio_back_to_link_page',
	'label'       => esc_html__( 'Back To Link', 'nokke' ),
	'description'	=> esc_html__( 'Choose "Back To" page to link from single project', 'nokke' ),
	'section'     => 'nokke_settings_portfolio',
	'default'     => 36,
) );