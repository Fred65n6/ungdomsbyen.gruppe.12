<?php
/**
 * Customizer Typography
 *
 * @package Nokke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Add custom choice
 */
if ( ! function_exists( 'nokke_add_custom_choice' ) ) {
	function nokke_add_custom_choice() {
		return array(
			'fonts' => apply_filters( 'nokke_kirki_font_choices', array() ),
			'variant' => array( 'regular', 'italic' )
		);
	}
}


// Base font
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_base_font',
	'label'       => esc_html__( 'Base font', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-family'    => $body_font,
		'font-size'      => '16px',
		'line-height'    => '1.5',
		'letter-spacing' => 'normal',
		'text-transform' => 'none',
		'variant' => 'regular',
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['base_font'],
		),
		array(
			'element' => '.edit-post-visual-editor .editor-styles-wrapper',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));


/*-------------------------------------------------------*/
/* Headings font
/*-------------------------------------------------------*/

// Headings
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_headings_font',
	'label'       => esc_html__( 'Headings font', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-family'    => $heading_font,
		'font-weight' 	 => '700',
		'line-height' 	 => '1.3',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['headings'],
		),
		array(
			'element' => isset( $selectors['shop_headings_font'] ) ? $selectors['shop_headings_font'] : null,
		),
		array(
			'element' => '.edit-post-visual-editor h1.wp-block[data-type="core/heading"],
			.edit-post-visual-editor .editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor h2.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h3.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h4.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h5.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));


// H1
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_headings_h1',
	'label'       => esc_html__( 'H1 Headings', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-size'   	 => '38px',
		'text-transform' => 'none'
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['h1'],
		),
		array(
			'element' => '.edit-post-visual-editor h1.wp-block[data-type="core/heading"],
			.edit-post-visual-editor .editor-post-title__block .editor-post-title__input',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H2
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_headings_h2',
	'label'       => esc_html__( 'H2 Headings', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-size'   	 => '32px',
		'text-transform' => 'none'
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['h2'],
		),
		array(
			'element' => '.edit-post-visual-editor h2.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H3
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_headings_h3',
	'label'       => esc_html__( 'H3 Headings', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-size'   	 => '28px',
		'text-transform' => 'none'
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['h3'],
		),
		array(
			'element' => '.edit-post-visual-editor h3.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H4
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_headings_h4',
	'label'       => esc_html__( 'H4 Headings', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-size'   	 => '24px',
		'text-transform' => 'none'
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['h4'],
		),
		array(
			'element' => '.edit-post-visual-editor h4.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H5
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_headings_h5',
	'label'       => esc_html__( 'H5 Headings', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-size'   	 => '20px',
		'text-transform' => 'none'
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['h5'],
		),
		array(
			'element' => '.edit-post-visual-editor h5.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));

// H6
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_headings_h6',
	'label'       => esc_html__( 'H6 Headings', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-size'   	 => '16px',
		'text-transform' => 'none'
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => 'h6',
		),
		array(
			'element' => '.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));


// Post typography
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_post_typography',
	'label'       => esc_html__( 'Post article text', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-size'      => '18px',
		'line-height'    => '1.8',
		'letter-spacing' => 'normal',
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => '.entry__article',
		),
		array(
			'element' => '.edit-post-visual-editor .editor-styles-wrapper',
			'context' => array( 'editor' ),
		)
	),
	'transport' => 'auto',
));


/*-------------------------------------------------------*/
/* Forms
/*-------------------------------------------------------*/

// Buttons typography
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_buttons_typography',
	'label'       => esc_html__( 'Buttons', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-family'    => $heading_font,
		'font-weight'		 => '700',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => $selectors['buttons'],
		),
		array(
			'element' => '.wp-block-button .wp-block-button__link',
			'context' => array( 'editor' ),			
		)
	),
	'transport' => 'auto',
));


/*-------------------------------------------------------*/
/* Header
/*-------------------------------------------------------*/

// Menu Links typography
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_menu_links_typography',
	'label'       => esc_html__( 'Menu links', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-family'    => $heading_font,
		'font-weight' 	 => '700',
		'font-size'			 => '13px',
		'letter-spacing' => 'normal',
		'text-transform' => 'uppercase'
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => '.nav__menu > li > a',
		),
	),
	'transport' => 'auto',
));

// Dropdown menu Links typography
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'typography',
	'settings'    => 'nokke_settings_dropdown_menu_links_typography',
	'label'       => esc_html__( 'Dropdown menu links', 'nokke' ),
	'section'     => 'nokke_settings_typography',
	'default'     => array(
		'font-family'    => $body_font,
		'variant' 			 => '400',
		'font-size'			 => '16px',
		'letter-spacing' => 'normal',
		'text-transform' => 'none'
	),
	'choices'  => nokke_add_custom_choice(),
	'output' => array(
		array(
			'element' => '.nav__dropdown-menu li a',
		),
	),
	'transport' => 'auto',
));