<?php

/**
 * Customizer Colors
 *
 * @package Nokke
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/*-------------------------------------------------------*/
/* General Colors
/*-------------------------------------------------------*/
// Primary color
Kirki::add_field( 'nokke_settings_config', array(
    'type'        => 'color',
    'settings'    => 'nokke_settings_primary_color',
    'label'       => esc_html__( 'Primary color', 'nokke' ),
    'description' => esc_html__( 'Some elements should be customized with Elementor afterwards', 'nokke' ),
    'section'     => 'nokke_settings_general_colors',
    'default'     => $primary_color,
    'output'      => array(
    array(
    'element'  => $selectors['primary_color'],
    'property' => 'color',
),
    array(
    'element'  => ( isset( $selectors['shop_primary_color'] ) ? $selectors['shop_primary_color'] : null ),
    'property' => 'color',
),
    array(
    'element'  => '.wp-block-pullquote::before',
    'property' => 'color',
    'context'  => array( 'editor' ),
),
    array(
    'element'  => $selectors['primary_background_color'],
    'property' => 'background-color',
),
    array(
    'element'  => ( isset( $selectors['shop_primary_background_color'] ) ? $selectors['shop_primary_background_color'] : null ),
    'property' => 'background-color',
),
    array(
    'element'  => ( isset( $selectors['shop_buttons_color_hover'] ) ? $selectors['shop_buttons_color_hover'] : null ),
    'property' => 'background-color',
),
    array(
    'element'  => ( isset( $selectors['shop_primary_border_color'] ) ? $selectors['shop_primary_border_color'] : null ),
    'property' => 'border-color',
),
    array(
    'element'  => $selectors['primary_border_color'],
    'property' => 'border-color',
),
    array(
    'element'  => $selectors['primary_border_left_color'],
    'property' => 'border-color',
    'context'  => array( 'editor', 'front' ),
),
    array(
    'element'  => $selectors['primary_border_top_color'],
    'property' => 'border-top-color',
),
    array(
    'element'  => $selectors['primary_border_bottom_color'],
    'property' => 'border-bottom-color',
),
    array(
    'element'  => $selectors['buttons_color_editor'],
    'property' => 'background-color',
    'context'  => array( 'editor' ),
)
),
    'transport'   => 'auto',
) );
// Buttons hover background color
Kirki::add_field( 'nokke_settings_config', array(
    'type'      => 'color',
    'settings'  => 'nokke_settings_buttons_hover_background_color',
    'label'     => esc_html__( 'Buttons hover background color', 'nokke' ),
    'section'   => 'nokke_settings_general_colors',
    'default'   => $heading_color,
    'output'    => array( array(
    'element'  => $selectors['buttons_hover_color'],
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
// Page background color
Kirki::add_field( 'nokke_settings_config', array(
    'type'        => 'color',
    'settings'    => 'nokke_settings_page_background_color',
    'label'       => esc_html__( 'Page background color', 'nokke' ),
    'description' => esc_html__( 'Applies on a blog, archive and search results pages', 'nokke' ),
    'section'     => 'nokke_settings_general_colors',
    'default'     => '#ffffff',
    'output'      => array( array(
    'element'  => '.blog-section, .archive-section, .search-results-section',
    'property' => 'background-color',
) ),
    'transport'   => 'auto',
) );
// Headings colors
Kirki::add_field( 'nokke_settings_config', array(
    'type'      => 'color',
    'settings'  => 'nokke_settings_headings_color',
    'label'     => esc_html__( 'Headings color', 'nokke' ),
    'section'   => 'nokke_settings_general_colors',
    'default'   => $heading_color,
    'output'    => array(
    array(
    'element'  => $selectors['headings_color'],
    'property' => 'color',
),
    array(
    'element'  => ( isset( $selectors['shop_headings_color'] ) ? $selectors['shop_headings_color'] : null ),
    'property' => 'color',
),
    array(
    'element'  => '.nav__icon-toggle-bar',
    'property' => 'background-color',
),
    array(
    'element'  => '.edit-post-visual-editor .editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor h1.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h2.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h3.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h4.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h5.wp-block[data-type="core/heading"],
			.edit-post-visual-editor h6.wp-block[data-type="core/heading"]',
    'property' => 'color',
    'context'  => array( 'editor' ),
)
),
    'transport' => 'auto',
) );
// Text color
Kirki::add_field( 'nokke_settings_config', array(
    'type'      => 'color',
    'settings'  => 'nokke_settings_text_color',
    'label'     => esc_html__( 'Text', 'nokke' ),
    'section'   => 'nokke_settings_general_colors',
    'default'   => $text_color,
    'output'    => array(
    array(
    'element'  => $selectors['text_color'],
    'property' => 'color',
),
    array(
    'element'  => ( isset( $selectors['shop_text_color'] ) ? $selectors['shop_text_color'] : null ),
    'property' => 'color',
),
    array(
    'element'  => 'input::-webkit-input-placeholder',
    'property' => 'color',
    'context'  => array( 'front' ),
),
    array(
    'element'  => 'input:-moz-placeholder, input::-moz-placeholder',
    'property' => 'color',
    'context'  => array( 'front' ),
),
    array(
    'element'  => 'input:-ms-input-placeholder',
    'property' => 'color',
    'context'  => array( 'front' ),
),
    array(
    'element'  => '.edit-post-visual-editor .editor-styles-wrapper',
    'property' => 'color',
    'context'  => array( 'editor' ),
)
),
    'transport' => 'auto',
) );
// Borders color
Kirki::add_field( 'nokke_settings_config', array(
    'type'      => 'color',
    'settings'  => 'nokke_settings_borders_color',
    'label'     => esc_html__( 'Borders', 'nokke' ),
    'section'   => 'nokke_settings_general_colors',
    'default'   => $border_color,
    'output'    => array( array(
    'element'  => $selectors['border_color'],
    'property' => 'border-color',
), array(
    'element'  => ( isset( $selectors['shop_border_color'] ) ? $selectors['shop_border_color'] : null ),
    'property' => 'border-color',
), array(
    'element'     => '.nav__menu li a',
    'property'    => 'border-bottom-color',
    'media_query' => $bp_lg_down,
) ),
    'transport' => 'auto',
) );
// Background light
Kirki::add_field( 'nokke_settings_config', array(
    'type'      => 'color',
    'settings'  => 'nokke_settings_background_light_color',
    'label'     => esc_html__( 'Background light', 'nokke' ),
    'section'   => 'nokke_settings_general_colors',
    'default'   => $bg_light,
    'output'    => array( array(
    'element'  => '.page-title-regular_pages',
    'property' => 'background-color',
) ),
    'transport' => 'auto',
) );
nokke_pro_customizer_options( 'nokke_settings_general_colors', wp_unique_id() );