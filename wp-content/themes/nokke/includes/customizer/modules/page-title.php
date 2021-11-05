<?php
/**
 * Customizer Page Title
 *
 * @package Nokke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Page title padding
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'dimensions',
	'settings'    => 'nokke_settings_page_title_padding',
	'label'       => esc_attr__( 'Page title top/bottom padding', 'nokke' ),
	'section'     => 'nokke_settings_page_title',
	'default'     => [
		'padding-top'    => '60px',
		'padding-bottom' => '60px',
	],
	'output'       => array(
		array(
			'element'     => '.page-title',
		),
	),
) );


// Show page breadcrumbs
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_breadcrumbs_pages_show',
	'label'       => esc_attr__( 'Show breadcrumbs on a regular pages', 'nokke' ),
	'section'     => 'nokke_settings_page_title',
	'default'     => false,
) );

// Show single post breadcrumbs
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_breadcrumbs_single_post_show',
	'label'       => esc_attr__( 'Show breadcrumbs on a single post', 'nokke' ),
	'section'     => 'nokke_settings_page_title',
	'default'     => false,
) );