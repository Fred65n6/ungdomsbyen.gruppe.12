<?php
/**
 * Customizer General
 *
 * @package Nokke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


// Preloader
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_preloader_show',
	'label'       => esc_html__( 'Enable/Disable theme preloader', 'nokke' ),
	'section'     => 'nokke_settings_preloader',
	'default'     => true,
) );

// Back to top
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_back_to_top_show',
	'label'       => esc_html__( 'Back to top arrow', 'nokke' ),
	'section'     => 'nokke_settings_back_to_top',
	'default'     => true,
) );