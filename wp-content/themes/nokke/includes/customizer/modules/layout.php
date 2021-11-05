<?php
/**
 * Customizer Layout
 *
 * @package Nokke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Blog layout
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'nokke_settings_blog_layout_type',
	'label'       => esc_html__( 'Layout type', 'nokke' ),
	'section'     => 'nokke_settings_blog_layout',
	'default'     => 'right-sidebar',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Blog columns
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'select',
	'settings'    => 'nokke_settings_blog_columns',
	'label'       => esc_html__( 'Columns', 'nokke' ),
	'description' => esc_html__( 'Use this option for regular blog pages, such as homepage', 'nokke' ),
	'section'     => 'nokke_settings_blog_layout',
	'default'     => 'col-lg-12',
	'choices'     => array(
		'col-lg-12' => esc_html__( '1 Column', 'nokke' ),
		'col-lg-6' => esc_html__( '2 Columns', 'nokke' ),
		'col-lg-4' => esc_html__( '3 Columns', 'nokke' ),
		'col-lg-3' => esc_html__( '4 Columns', 'nokke' ),
	),
) );


// Single post layout
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'nokke_settings_single_post_layout_type',
	'label'       => esc_html__( 'Layout type', 'nokke' ),
	'section'     => 'nokke_settings_single_post_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );


// Projects columns
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'select',
	'settings'    => 'nokke_settings_projects_columns',
	'label'       => esc_html__( 'Columns', 'nokke' ),
	'description' => esc_html__( 'Use this option for projects archive pages', 'nokke' ),
	'section'     => 'nokke_settings_projects_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_html__( '1 Column', 'nokke' ),
		'col-lg-6'  => esc_html__( '2 Columns', 'nokke' ),
		'col-lg-4'  => esc_html__( '3 Columns', 'nokke' ),
		'col-lg-3'  => esc_html__( '4 Columns', 'nokke' ),
	),
) );

// Services columns
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'select',
	'settings'    => 'nokke_settings_services_columns',
	'label'       => esc_html__( 'Columns', 'nokke' ),
	'description' => esc_html__( 'Use this option for services archive pages', 'nokke' ),
	'section'     => 'nokke_settings_services_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_html__( '1 Column', 'nokke' ),
		'col-lg-6'  => esc_html__( '2 Columns', 'nokke' ),
		'col-lg-4'  => esc_html__( '3 Columns', 'nokke' ),
		'col-lg-3'  => esc_html__( '4 Columns', 'nokke' ),
	),
) );

// Page Layout
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'nokke_settings_page_layout_type',
	'label'       => esc_html__( 'Layout type', 'nokke' ),
	'section'     => 'nokke_settings_page_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives Layout
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'nokke_settings_archive_layout_type',
	'label'       => esc_html__( 'Layout type', 'nokke' ),
	'section'     => 'nokke_settings_archive_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Archives columns
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'select',
	'settings'    => 'nokke_settings_archive_columns',
	'label'       => esc_html__( 'Columns', 'nokke' ),
	'section'     => 'nokke_settings_archive_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_html__( '1 Column', 'nokke' ),
		'col-lg-6'  => esc_html__( '2 Columns', 'nokke' ),
		'col-lg-4'  => esc_html__( '3 Columns', 'nokke' ),
		'col-lg-3'  => esc_html__( '4 Columns', 'nokke' ),
	),
) );

// Search Layout
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'radio-image',
	'settings'    => 'nokke_settings_search_results_layout_type',
	'label'       => esc_html__( 'Layout type', 'nokke' ),
	'section'     => 'nokke_settings_search_results_layout',
	'default'     => 'fullwidth',
	'choices'     => array(
		'left-sidebar'  => get_template_directory_uri() . '/assets/img/customizer/left-sidebar.png',
		'right-sidebar' => get_template_directory_uri() . '/assets/img/customizer/right-sidebar.png',
		'fullwidth'  		=> get_template_directory_uri() . '/assets/img/customizer/fullwidth.png',
	),
) );

// Search columns
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'select',
	'settings'    => 'nokke_settings_search_results_columns',
	'label'       => esc_html__( 'Columns', 'nokke' ),
	'section'     => 'nokke_settings_search_results_layout',
	'default'     => 'col-lg-4',
	'choices'     => array(
		'col-lg-12' => esc_html__( '1 Column', 'nokke' ),
		'col-lg-6'  => esc_html__( '2 Columns', 'nokke' ),
		'col-lg-4'  => esc_html__( '3 Columns', 'nokke' ),
		'col-lg-3'  => esc_html__( '4 Columns', 'nokke' ),
	),
) );