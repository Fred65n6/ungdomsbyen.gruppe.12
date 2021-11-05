<?php

/**
 * WooCommerce
 *
 * @package Nokke
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/*-------------------------------------------------------*/
/* WooCommerce
/*-------------------------------------------------------*/
/*-------------------------------------------------------*/
/* WooCommerce Cart
/*-------------------------------------------------------*/
$cart_layout = array(
    'dropdown' => esc_html__( 'Dropdown', 'nokke' ),
);
// Mini cart layout
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'select',
    'settings' => 'nokke_settings_woocommerce_mini_cart_layout',
    'label'    => esc_html__( 'Mini-cart layout', 'nokke' ),
    'section'  => 'nokke_settings_woocommerce_cart',
    'default'  => 'dropdown',
    'choices'  => $cart_layout,
) );
/*-------------------------------------------------------*/
/* Product Social Share Buttons
/*-------------------------------------------------------*/
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'toggle',
    'settings' => 'nokke_settings_product_share_buttons_show',
    'label'    => esc_html__( 'Show share buttons', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Facebook Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_facebook',
    'label'    => esc_html__( 'Facebook', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Twitter Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_twitter',
    'label'    => esc_html__( 'Twitter', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Linkedin Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_linkedin',
    'label'    => esc_html__( 'Linkedin', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Pinterest Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_pinterest',
    'label'    => esc_html__( 'Pinterest', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Pocket Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_pocket',
    'label'    => esc_html__( 'Pocket', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Facebook Messenger Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_facebook_messenger',
    'label'    => esc_html__( 'Facebook Messenger', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Whatsapp Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_whatsapp',
    'label'    => esc_html__( 'Whatsapp', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Viber Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_viber',
    'label'    => esc_html__( 'Viber', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Telegram Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_telegram',
    'label'    => esc_html__( 'Telegram', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Reddit Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_reddit',
    'label'    => esc_html__( 'Reddit', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
// Email Share
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'checkbox',
    'settings' => 'nokke_settings_product_share_email',
    'label'    => esc_html__( 'Email', 'nokke' ),
    'section'  => 'nokke_settings_product_social_share',
    'default'  => false,
) );
/*-------------------------------------------------------*/
/* Catalog
/*-------------------------------------------------------*/
// Page description
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'text',
    'settings' => 'nokke_settings_woocommerce_page_title_description',
    'label'    => esc_attr__( 'Page title description', 'nokke' ),
    'section'  => 'woocommerce_product_catalog',
    'default'  => esc_html__( '— Simple and beautiful way to sell products.', 'nokke' ),
) );
/*-------------------------------------------------------*/
/* Product Elements
/*-------------------------------------------------------*/
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'custom',
    'settings' => 'separator-' . $uniqid++,
    'section'  => 'woocommerce_product_catalog',
    'default'  => '<h3 class="customizer-title">' . esc_html__( 'Display Product Elements', 'nokke' ) . '</h3>',
) );
// Show product Sale badge
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'toggle',
    'settings' => 'nokke_settings_woocommerce_product_sale_badge_show',
    'label'    => esc_html__( 'Show sale badge', 'nokke' ),
    'section'  => 'woocommerce_product_catalog',
    'default'  => true,
) );
// Show product title
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'toggle',
    'settings' => 'nokke_settings_woocommerce_product_title_show',
    'label'    => esc_html__( 'Show title', 'nokke' ),
    'section'  => 'woocommerce_product_catalog',
    'default'  => true,
) );
// Show product rating
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'toggle',
    'settings' => 'nokke_settings_woocommerce_product_rating_show',
    'label'    => esc_html__( 'Show rating', 'nokke' ),
    'section'  => 'woocommerce_product_catalog',
    'default'  => true,
) );
// Show product price
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'toggle',
    'settings' => 'nokke_settings_woocommerce_product_price_show',
    'label'    => esc_html__( 'Show price', 'nokke' ),
    'section'  => 'woocommerce_product_catalog',
    'default'  => true,
) );
// Show product Add To Wishlist button
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'toggle',
    'settings' => 'nokke_settings_woocommerce_product_catalog_wishlist_show',
    'label'    => esc_html__( 'Show add to wishlist button', 'nokke' ),
    'section'  => 'woocommerce_product_catalog',
    'default'  => true,
) );
// Show product Add To Cart button
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'toggle',
    'settings' => 'nokke_settings_woocommerce_product_catalog_button_show',
    'label'    => esc_html__( 'Show add to cart button', 'nokke' ),
    'section'  => 'woocommerce_product_catalog',
    'default'  => true,
) );
// Show distraction free checkout
Kirki::add_field( 'nokke_settings_config', array(
    'type'     => 'toggle',
    'settings' => 'nokke_settings_woocommerce_distraction_free_checkout',
    'label'    => esc_html__( 'Distraction free checkout', 'nokke' ),
    'section'  => 'woocommerce_checkout',
    'default'  => false,
    'priority' => 1,
) );