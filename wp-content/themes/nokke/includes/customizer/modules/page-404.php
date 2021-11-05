<?php
/**
 * Customizer Page 404
 *
 * @package Nokke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Title
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'text',
	'settings'    => 'nokke_settings_page_404_title',
	'label'       => esc_attr__( 'Page 404 title', 'nokke' ),
	'section'     => 'nokke_settings_page_404',
	'default'     => esc_html__( 'Page Not Found', 'nokke' ),
) );

// Description text
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'text',
	'settings'    => 'nokke_settings_page_404_description',
	'label'       => esc_attr__( 'Page 404 description text', 'nokke' ),
	'section'     => 'nokke_settings_page_404',
	'default'     => esc_html__( 'Oops! The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'nokke' ),
) );

// Button text
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'text',
	'settings'    => 'nokke_settings_page_404_button_text',
	'label'       => esc_attr__( 'Page 404 button text', 'nokke' ),
	'section'     => 'nokke_settings_page_404',
	'default'     => esc_html__( 'Take Me Back Home', 'nokke' ),
) );