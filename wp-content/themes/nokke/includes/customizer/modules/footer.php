<?php
/**
 * Customizer Footer
 *
 * @package Nokke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


if ( class_exists( 'Nokke_Core' ) ) {
	// Footer template notice
	Kirki::add_field( 'nokke_settings_config', array(
		'type'        => 'custom',
		'settings'    => 'nokke_settings_footer_template_notice',
		'section'     => 'nokke_settings_footer',
		'default'     => '<div class="notice notice-info"><p>' .		
			sprintf(
				esc_html__( 'To edit custom Elementor footer template navigate to %1$s', 'nokke' ),
				sprintf(
					'<a href="%s">%s</a>',
					esc_url( admin_url( 'edit.php?post_type=theme_template' ) ),
					esc_html__( 'Theme Templates.', 'nokke' )
				)
			) .
			'</p></div>',
	) );
}

// Show footer
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_footer_show',
	'label'       => esc_attr__( 'Show default footer', 'nokke' ),
	'section'     => 'nokke_settings_footer',
	'default'     => true,
) );

// Show footer widgets
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_footer_widgets_show',
	'label'       => esc_attr__( 'Show footer widgets', 'nokke' ),
	'section'     => 'nokke_settings_footer',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'nokke_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

// Footer columns
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'select',
	'settings'    => 'nokke_settings_footer_columns',
	'label'       => esc_html__( 'Number of columns', 'nokke' ),
	'section'     => 'nokke_settings_footer',
	'default'     => 'footer-col-4',
	'choices'     => array(
		'footer-col-1' => esc_html__( '1 Column', 'nokke' ),
		'footer-col-2' => esc_html__( '2 Columns', 'nokke' ),
		'footer-col-3' => esc_html__( '3 Columns', 'nokke' ),
		'footer-col-4' => esc_html__( '4 Columns', 'nokke' ),
	),
	'active_callback' => array(
		array(
			'setting'  => 'nokke_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );


// Show footer bottom menu
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_footer_bottom_menu_show',
	'label'       => esc_attr__( 'Show footer bottom menu', 'nokke' ),
	'section'     => 'nokke_settings_footer',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'nokke_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );


// Bottom footer text
Kirki::add_field( 'nokke_settings_config', array(
	'type'        			=> 'text',
	'settings'    			=> 'nokke_settings_footer_bottom_text',
	'section'     			=> 'nokke_settings_footer',
	'label'       			=> esc_html__( 'Bottom footer text', 'nokke' ),
	'description' 			=> esc_html__( 'Allowed HTML: a, span, i, em, strong', 'nokke' ),
	'sanitize_callback' => 'wp_kses_post',
	'default'     			=> sprintf( esc_html__( 'Copyright &copy; [current-year] %1$s' , 'nokke' ), get_bloginfo( 'name' ) ),
	'active_callback' 	=> array(
		array(
			'setting'  => 'nokke_settings_footer_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );