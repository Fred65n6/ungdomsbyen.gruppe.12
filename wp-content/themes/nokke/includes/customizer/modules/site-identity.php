<?php
/**
 * Customizer Site Identity
 *
 * @package Nokke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'title_tagline',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Site Logo', 'nokke' ) . '</h3>',
) );

// Logo Image Upload
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'image',
	'settings'    => 'nokke_settings_logo_dark',
	'label'       => esc_attr__( 'Upload logo', 'nokke' ),
	'section'     => 'title_tagline',
) );	

// Logo Retina Image Upload
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'image',
	'settings'    => 'nokke_settings_logo_dark_retina',
	'label'       => esc_attr__( 'Upload retina logo', 'nokke' ),
	'description' => esc_html__( 'Logo 2x bigger size', 'nokke' ),
	'section'     => 'title_tagline',
) );