<?php

/**
 * Theme setup.
 *
 * @package Nokke
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
if ( !function_exists( 'nokke_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function nokke_setup()
    {
        load_theme_textdomain( 'nokke', NOKKE_DIR . '/languages' );
        // Enable theme support
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ) );
        add_theme_support( 'post-formats', array( 'video', 'audio' ) );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-background', apply_filters( 'nokke_custom_background_args', array(
            'default-color' => '#ffffff',
            'default-image' => '',
        ) ) );
        // Gutenberg
        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'editor-styles' );
        add_editor_style();
        add_theme_support( 'editor-color-palette', array(
            array(
            'name'  => esc_html__( 'golden', 'nokke' ),
            'slug'  => 'golden',
            'color' => '#bfa67a',
        ),
            array(
            'name'  => esc_html__( 'navy blue', 'nokke' ),
            'slug'  => 'navy-blue',
            'color' => '#163357',
        ),
            array(
            'name'  => esc_html__( 'silver', 'nokke' ),
            'slug'  => 'silver',
            'color' => '#F7F7F7',
        ),
            array(
            'name'  => esc_html__( 'dark grey', 'nokke' ),
            'slug'  => 'dark-grey',
            'color' => '#a5a5a5',
        ),
            array(
            'name'  => esc_html__( 'white', 'nokke' ),
            'slug'  => 'white',
            'color' => '#ffffff',
        ),
            array(
            'name'  => esc_html__( 'black', 'nokke' ),
            'slug'  => 'black',
            'color' => '#000000',
        )
        ) );
        // Thumbnails
        add_image_size(
            'nokke_thumbnail',
            110,
            88,
            true
        );
        add_image_size(
            'nokke_featured_medium',
            473,
            0,
            false
        );
        add_image_size(
            'nokke_featured_large',
            720,
            0,
            false
        );
        // Nav menus
        register_nav_menus( array(
            'primary-menu'       => esc_html__( 'Primary Menu', 'nokke' ),
            'footer-bottom-menu' => esc_html__( 'Footer Bottom Menu', 'nokke' ),
        ) );
        // Disable WooCommerce wizard redirect
        add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );
        add_filter( 'woocommerce_show_admin_notice', '__return_false' );
        add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_false' );
        // Disable Kirki telemetry
        add_filter( 'kirki_telemetry', '__return_false' );
        // Remove admin notices for Instagram Feed
        update_option( 'sbi_ignore_new_user_sale_notice', 'always' );
        update_option( 'sbi_rating_notice', 'dismissed' );
        remove_action( 'admin_notices', 'sbi_usage_tracking' );
        remove_action( 'admin_notices', 'sbi_usage_opt_in' );
        remove_action( 'admin_notices', 'sbi_notices_html' );
        // Allow shorcodes in text widgets
        add_filter( 'widget_text', 'do_shortcode' );
        // Mute Elementor upgrade message
        update_option( '_elementor_editor_upgrade_notice_dismissed', time() );
    }

}
// theme_setup
add_action( 'after_setup_theme', 'nokke_setup' );
// Update Elementor Defaults
if ( 1 != get_option( 'nokke_elementor_defaults', 0 ) ) {
    add_option( 'nokke_elementor_defaults', 0 );
}
/**
* Update Elementor defaults.
*/
function nokke_update_elementor_defaults()
{
    
    if ( 1 != get_option( 'nokke_elementor_defaults' ) ) {
        update_option( 'elementor_cpt_support', array(
            'post',
            'page',
            'projects',
            'services',
            'theme_template'
        ) );
        update_option( 'elementor_disable_color_schemes', 'yes' );
        update_option( 'elementor_disable_typography_schemes', 'yes' );
        update_option( 'nokke_elementor_defaults', 1 );
    }

}

add_action( 'init', 'nokke_update_elementor_defaults' );
// Disable Woo Variation Swatches activation redirect
if ( class_exists( 'Woo_Variation_Swatches' ) ) {
    remove_action( 'admin_init', array( Woo_Variation_Swatches(), 'after_plugin_active' ) );
}
/**
* Disable Elementor redirect.
*/
add_action( 'admin_init', function () {
    delete_transient( 'elementor_activation_redirect' );
    if ( did_action( 'elementor/loaded' ) ) {
        remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
    }
}, 1 );
/**
* Register widget areas.
*/
function nokke_widgets_init()
{
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'nokke' ),
        'id'            => 'nokke-blog-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'nokke' ),
        'id'            => 'nokke-page-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 1', 'nokke' ),
        'id'            => 'nokke-footer-col-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 2', 'nokke' ),
        'id'            => 'nokke-footer-col-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 3', 'nokke' ),
        'id'            => 'nokke-footer-col-3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 4', 'nokke' ),
        'id'            => 'nokke-footer-col-4',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'nokke_widgets_init' );