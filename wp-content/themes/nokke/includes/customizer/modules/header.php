<?php
/**
 * Customizer Header
 *
 * @package Nokke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( class_exists( 'Nokke_Core' ) ) {
	// Header template notice
	Kirki::add_field( 'nokke_settings_config', array(
		'type'        => 'custom',
		'settings'    => 'nokke_settings_header_template_notice',
		'section'     => 'nokke_settings_default_header',
		'default'     => '<div class="notice notice-info"><p>' .		
			sprintf(
				esc_html__( 'To edit custom Elementor header template navigate to %1$s', 'nokke' ),
				sprintf(
					'<a href="%s">%s</a>',
					esc_url( admin_url( 'edit.php?post_type=theme_template' ) ),
					esc_html__( 'Theme Templates.', 'nokke' )
				)
			) .
			'</p></div>',
	) );
}

// Show default header
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_header_show',
	'label'       => esc_html__( 'Show default header', 'nokke' ),
	'section'     => 'nokke_settings_default_header',
	'default'     => true,
) );

// Sticky header
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_sticky_header_show',
	'label'       => esc_html__( 'Sticky header', 'nokke' ),
	'section'     => 'nokke_settings_default_header',
	'default'     => true,
	'active_callback' => array(
		array(
			'setting'  => 'nokke_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
) );

// Header container width
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'dimension',
	'settings'    => 'nokke_settings_header_container_width',
	'label'       => esc_html__( 'Header container width', 'nokke' ),
	'description' => esc_html__( "Example: 1200px or 80%", 'nokke' ),
	'section'     => 'nokke_settings_default_header',
	'default'     => '95%',
	'output'       => array(
		array(
			'element'     => '.nav__container',
			'property'    => 'max-width',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'nokke_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header height
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'nokke_settings_header_height',
	'label'       => esc_attr__( 'Header height', 'nokke' ),
	'description' => esc_html__( 'Will apply only on big screens', 'nokke' ),
	'section'     => 'nokke_settings_default_header',
	'default'     => 100,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__flex-parent',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.nav',
			'property'    => 'min-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.nav__menu > li > a',
			'property'    => 'line-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'nokke_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header sticky height
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'nokke_settings_header_sticky_height',
	'label'       => esc_attr__( 'Header sticky height', 'nokke' ),
	'description' => esc_html__( 'Will apply only on big screens', 'nokke' ),
	'section'     => 'nokke_settings_default_header',
	'default'     => 60,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__flex-parent',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.nav--sticky.sticky .nav__menu > li > a',
			'property'    => 'line-height',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'nokke_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Header mobile height
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'nokke_settings_header_mobile_height',
	'label'       => esc_attr__( 'Header mobile height', 'nokke' ),
	'description' => esc_html__( 'Will apply only on mobile screens', 'nokke' ),
	'section'     => 'nokke_settings_default_header',
	'default'     => 60,
	'choices'     => array(
		'min'  => '40',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header',
			'property'    => 'height',
			'units'       => 'px',
			'media_query' => $bp_lg_down,
		),
		array(
			'element'     => '.nav',
			'property'    => 'min-height',
			'units'       => 'px',
			'media_query' => $bp_lg_down,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'nokke_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );


// Logo
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'image',
	'settings'    => 'nokke_settings_logo_dark',
	'label'       => esc_html__( 'Upload logo', 'nokke' ),
	'section'     => 'nokke_settings_logo',
	'choices'     => [
		'save_as' => 'array',
	],
) );

// Logo width
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'nokke_settings_header_logo_width',
	'label'       => esc_attr__( 'Header logo width', 'nokke' ),
	'section'     => 'nokke_settings_logo',
	'default'     => 66,
	'choices'     => array(
		'min'  => '10',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header .logo',
			'property'    => 'max-width',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'transport' => 'auto',
) );

// Logo sticky width
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'nokke_settings_header_logo_sticky_width',
	'label'       => esc_attr__( 'Header logo sticky width', 'nokke' ),
	'section'     => 'nokke_settings_logo',
	'default'     => 42,
	'choices'     => array(
		'min'  => '10',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav--sticky.sticky .nav__header .logo',
			'property'    => 'max-width',
			'units'       => 'px',
		),
	),
	'transport' => 'auto',
) );


// Logo mobile width
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'nokke_settings_header_logo_mobile_width',
	'label'       => esc_attr__( 'Header logo mobile width', 'nokke' ),
	'section'     => 'nokke_settings_logo',
	'default'     => 42,
	'choices'     => array(
		'min'  => '10',
		'max'  => '200',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__header .logo',
			'property'    => 'max-width',
			'units'       => 'px',
			'media_query' => $bp_lg_down,
		),
	),
	'transport' => 'auto',
) );

// Menu items horizontal spacing
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'slider',
	'settings'    => 'nokke_settings_header_text_links_horizontal_spacing',
	'label'       => esc_attr__( 'Menu text links horizontal spacing', 'nokke' ),
	'description' => esc_html__( 'Will apply only on big screens', 'nokke' ),
	'section'     => 'nokke_settings_primary_menu',
	'default'     => 17,
	'choices'     => array(
		'min'  => '0',
		'max'  => '60',
		'step' => '1',
	),
	'output'       => array(
		array(
			'element'     => '.nav__menu > li',
			'property'    => 'padding-left',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
		array(
			'element'     => '.nav__menu > li',
			'property'    => 'padding-right',
			'units'       => 'px',
			'media_query' => $bp_lg_up,
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'nokke_settings_header_show',
			'operator' => '==',
			'value'    => true,
		)
	),
	'transport' => 'auto',
) );

// Last Menu Item Title
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'nokke_settings_primary_menu',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Last menu item', 'nokke' ) . '</h3>',
) );

// Last Item: Search
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_header_last_menu_item_search',
	'label'       => esc_html__( 'Search', 'nokke' ),
	'section'     => 'nokke_settings_primary_menu',
	'default'     => true,
) );

if ( nokke_is_woocommerce_activated() ) {
	// Last Item: Shopping cart
	Kirki::add_field( 'nokke_settings_config', array(
		'type'        => 'checkbox',
		'settings'    => 'nokke_settings_header_last_menu_item_shopping_cart',
		'label'       => esc_html__( 'Shopping Cart', 'nokke' ),
		'section'     => 'nokke_settings_primary_menu',
		'default'     => true,
	) );
}

// Last Item: HTML
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_header_last_menu_item_html',
	'label'       => esc_html__( 'HTML', 'nokke' ),
	'section'     => 'nokke_settings_primary_menu',
	'default'     => false,
) );

// Last Item: Text / HTML 
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'code',
	'settings'    => 'nokke_settings_header_last_menu_item_text_html',
	'label'       => esc_html__( 'Text / HTML / Shortcode', 'nokke' ),
	'section'     => 'nokke_settings_primary_menu',
	'choices'     => array(
		'language' => 'html',
	),
	'active_callback' => array(
		array(
			'setting'  => 'nokke_settings_header_last_menu_item_html',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

// Hide last menu item on mobile
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_header_last_menu_item_hide',
	'label'       => esc_attr__( 'Hide last menu item on mobile', 'nokke' ),
	'section'     => 'nokke_settings_primary_menu',
	'default'     => false,
) );

// Vertical Header
if ( class_exists( 'Nokke_Core_Theme_Templates' ) ) {
	$custom_headers = \Nokke_Core_Theme_Templates::get_theme_headers();
	$header_vertical = false;

	foreach( $custom_headers as $key => $value ) {
		$location = get_post_meta( $key, '_nokke_template_location', true );

		if ( 'header-vertical' === $location ) {
			$header_vertical = true;
		}
	}

	if ( $header_vertical ) {

		// Header width
		Kirki::add_field( 'nokke_settings_config', array(
			'type'        => 'slider',
			'settings'    => 'nokke_settings_vertical_header_width',
			'label'       => esc_html__( 'Vertical header width', 'nokke' ),
			'description' => esc_html__( 'Applies above 1200px breakpoint.', 'nokke' ),
			'section'     => 'nokke_settings_vertical_header',
			'default'     => 300,
			'choices'     => array(
				'min'  => '100',
				'max'  => '800',
				'step' => '1',
			),
			'output'       => array(
				array(
					'element'     => '.eversor-header-vertical--left',
					'property'    => 'margin-left',
					'units'       => 'px',
					'media_query' => $bp_xl_down,
				),
				array(
					'element'     => '.eversor-header-vertical--right',
					'property'    => 'margin-right',
					'units'       => 'px',
					'media_query' => $bp_xl_down,
				),
				array(
					'element'     => '.eversor-header--vertical',
					'property'    => 'width',
					'units'       => 'px',
					'media_query' => $bp_xl_down,
				),
			),
			'transport' => 'auto',
		) );
		
		// Header position
		Kirki::add_field( 'nokke_settings_config', array(
			'type'        => 'select',
			'settings'    => 'nokke_settings_vertical_header_position',
			'label'       => esc_html__( 'Vertical header position', 'nokke' ),
			'section'     => 'nokke_settings_vertical_header',
			'default'     => 'left',
			'choices'     => array(
				'left'  => esc_html__( 'Left', 'nokke' ),
				'right' => esc_html__( 'Right', 'nokke' ),
			),
		) );

	}	

}