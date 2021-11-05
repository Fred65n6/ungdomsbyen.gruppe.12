<?php

/**
 * Theme functions and definitions.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
// Set the content width based on the theme's design and stylesheet.

if ( !isset( $content_width ) ) {
    $content_width = 1500;
    /* pixels */
}

// Constants
define( 'NOKKE_VERSION', '1.0.1' );
define( 'NOKKE_DIR', get_template_directory() );
define( 'NOKKE_URI', get_template_directory_uri() );

if ( !function_exists( 'nokke_fs' ) ) {
    // Create a helper function for easy SDK access.
    function nokke_fs()
    {
        global  $nokke_fs ;
        
        if ( !isset( $nokke_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $nokke_fs = fs_dynamic_init( array(
                'id'             => '6272',
                'slug'           => 'nokke',
                'premium_slug'   => 'nokke-pro',
                'type'           => 'theme',
                'public_key'     => 'pk_f5a3a95122784fececbbfbaa8272d',
                'is_premium'     => false,
                'premium_suffix' => 'Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'    => 'nokke-theme',
                'support' => false,
                'parent'  => array(
                'slug' => 'themes.php',
            ),
            ),
                'is_live'        => true,
            ) );
        }
        
        return $nokke_fs;
    }
    
    // Init Freemius.
    nokke_fs();
    // Signal that SDK was initiated.
    do_action( 'nokke_fs_loaded' );
}

// Includes
require_once NOKKE_DIR . '/includes/admin/theme-admin.php';
require_once NOKKE_DIR . '/includes/theme-setup.php';
require_once NOKKE_DIR . '/includes/theme-functions.php';
require_once NOKKE_DIR . '/includes/theme-hooks.php';
require_once NOKKE_DIR . '/includes/template-tags.php';
require_once NOKKE_DIR . '/includes/template-parts.php';
require_once NOKKE_DIR . '/includes/class-nokke-breadcrumb-trail.php';
require_once NOKKE_DIR . '/includes/class-nokke-query.php';
require_once NOKKE_DIR . '/includes/class-nokke-walker-nav-menu.php';
require_once NOKKE_DIR . '/includes/class-nokke-walker-comment.php';
require_once NOKKE_DIR . '/includes/customizer/customizer.php';
/**
 * Theme update functions.
 */
require_once NOKKE_DIR . '/includes/theme-update/class-nokke-theme-update.php';
/**
* TGM plugins activation.
*/
require_once NOKKE_DIR . '/includes/tgmpa/tgm-plugin-activation.php';
/**
* Demo Import.
*/
require_once NOKKE_DIR . '/includes/theme-demo-import.php';
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
    require_once NOKKE_DIR . '/includes/compatibility/class-nokke-elementor.php';
}
/**
* Theme Wizard.
*/
require_once get_parent_theme_file_path( '/includes/merlin/vendor/autoload.php' );
require_once get_parent_theme_file_path( '/includes/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/includes/merlin/merlin-config.php' );
require_once get_parent_theme_file_path( '/includes/merlin/merlin-filters.php' );
/**
 * Theme styles.
 */
function nokke_theme_styles()
{
    wp_enqueue_style(
        'nokke-styles',
        NOKKE_URI . '/style.min.css',
        array(),
        NOKKE_VERSION,
        'all'
    );
    wp_style_add_data( 'nokke-styles', 'rtl', 'replace' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    // Fonts
    if ( !class_exists( 'Kirki' ) ) {
        wp_enqueue_style( 'nokke-google-fonts', '//fonts.googleapis.com/css2?family=Montserrat:ital,wght@400;700&family=PT+Sans:ital,wght@0,400;0,700;1,400&display=swap' );
    }
}

add_action( 'wp_enqueue_scripts', 'nokke_theme_styles' );
/**
 * Block editor styles.
 */
function nokke_block_assets()
{
    wp_enqueue_style( 'nokke-block-editor-styles', get_theme_file_uri( '/assets/css/editor.min.css' ), false );
    wp_style_add_data( 'nokke-block-editor-styles', 'rtl', 'replace' );
    if ( function_exists( 'nokke_get_typekit_fonts' ) ) {
        $typekit_fonts = nokke_get_typekit_fonts();
    }
    
    if ( !empty($typekit_fonts) ) {
        $typekit_info = get_option( 'nokke-typekit-fonts' );
        $typekit_id = $typekit_info['custom-typekit-font-id'];
        if ( !empty($typekit_id) ) {
            wp_enqueue_style( 'nokke-typekit-fonts', '//use.typekit.net/' . $typekit_id . '.css' );
        }
    }
    
    if ( !class_exists( 'Kirki' ) || empty($typekit_fonts) ) {
        wp_enqueue_style( 'nokke-block-editor-google-fonts', '//fonts.googleapis.com/css2?family=Montserrat:ital,wght@400;700&family=PT+Sans:ital,wght@0,400;0,700;1,400&display=swap' );
    }
}

add_action( 'enqueue_block_editor_assets', 'nokke_block_assets' );
/**
 * Theme scripts.
 */
function nokke_theme_scripts()
{
    
    if ( is_archive() || is_search() || is_home() ) {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'imagesloaded' );
    }
    
    wp_enqueue_script(
        'bootstrap',
        NOKKE_URI . '/assets/js/vendor/min/bootstrap.min.js',
        array(),
        NOKKE_VERSION,
        true
    );
    wp_enqueue_script(
        'body-scroll-lock',
        NOKKE_URI . '/assets/js/vendor/min/bodyScrollLock.min.js',
        array(),
        NOKKE_VERSION,
        true
    );
    wp_enqueue_script(
        'modernizr',
        NOKKE_URI . '/assets/js/vendor/min/modernizr.min.js',
        array(),
        NOKKE_VERSION,
        true
    );
    if ( nokke_is_woocommerce_activated() ) {
        wp_enqueue_script(
            'nokke-woo-scripts',
            NOKKE_URI . '/assets/js/woo-scripts.min.js',
            array(),
            NOKKE_VERSION,
            true
        );
    }
    wp_register_script(
        'nokke-scripts',
        NOKKE_URI . '/assets/js/scripts.min.js',
        array(),
        NOKKE_VERSION,
        true
    );
    wp_enqueue_script( 'nokke-scripts' );
    $Nokke_Data = array(
        'home_url'   => esc_url( home_url( '/' ) ),
        'theme_path' => NOKKE_URI,
    );
    wp_localize_script( 'nokke-scripts', 'Nokke_Data', $Nokke_Data );
}

add_action( 'wp_enqueue_scripts', 'nokke_theme_scripts' );
/**
 * Theme admin scripts and styles.
 */
function nokke_admin_scripts()
{
    $screen = get_current_screen();
    wp_enqueue_style( 'nokke-admin-styles', NOKKE_URI . '/assets/admin/css/admin-styles.css' );
    
    if ( $screen->id === 'appearance_page_one-click-demo-import' ) {
        wp_register_script(
            'nokke-admin-scripts',
            NOKKE_URI . '/assets/admin/js/nokke-admin-scripts.js',
            array( 'jquery-core' ),
            false,
            true
        );
        wp_enqueue_script( 'nokke-admin-scripts' );
    }

}

add_action( 'admin_enqueue_scripts', 'nokke_admin_scripts' );
/**
 * Theme WP Customizer scripts and styles.
 */
function nokke_customizer_scripts()
{
    wp_enqueue_style( 'nokke-customizer-styles', NOKKE_URI . '/assets/css/customizer/customizer.css' );
}

add_action( 'customize_controls_enqueue_scripts', 'nokke_customizer_scripts' );