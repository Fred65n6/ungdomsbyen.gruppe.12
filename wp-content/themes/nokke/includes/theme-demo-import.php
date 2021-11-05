<?php

/**
 * Theme Demo Import.
 *
 * @package Nokke
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/*
* Demo Import
*/
function nokke_ocdi_import_files()
{
    $url = 'https://nokke.deothemes.com';
    return array( array(
        'import_file_name'           => 'Demo Import Free',
        'import_file_url'            => 'https://nokke-free.deothemes.com/import/demo-content.xml',
        'import_widget_file_url'     => 'https://nokke-free.deothemes.com/import/widgets.wie',
        'import_customizer_file_url' => 'https://nokke-free.deothemes.com/import/customizer.dat',
        'import_preview_image_url'   => 'https://nokke-free.deothemes.com/import/preview.jpg',
        'preview_url'                => 'https://nokke-free.deothemes.com',
    ) );
}

add_filter( 'pt-ocdi/import_files', 'nokke_ocdi_import_files' );
/**
* Assign menus and front page after demo import
*
* @param array $selected_import array with demo import data
*/
function nokke_ocdi_after_import( $selected_import )
{
    // Assign menus to their locations.
    $primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'Footer Bottom Menu', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
        'primary-menu'       => $primary_menu->term_id,
        'footer-bottom-menu' => $footer_menu->term_id,
    ) );
    // Delete WooCommerce duplicates
    $pages2 = array(
        'cart',
        'checkout',
        'my-account',
        'wishlist'
    );
    foreach ( $pages2 as $page2 ) {
        $page = get_page_by_path( $page2 . '-2' );
        if ( $page ) {
            wp_delete_post( $page->ID, true );
        }
    }
    $shop2 = get_page_by_path( 'shop-2' );
    
    if ( $shop2 ) {
        $shop1 = get_page_by_path( 'shop' );
        wp_delete_post( $shop1->ID, true );
        wp_update_post( [
            'post_name' => 'shop',
            'ID'        => $shop2->ID,
        ] );
    }
    
    // Assign WooCommerce pages
    $shop = get_page_by_path( 'shop' );
    $cart = get_page_by_path( 'cart' );
    $checkout = get_page_by_path( 'checkout' );
    $wishlist = get_page_by_path( 'wishlist' );
    $myaccount = get_page_by_path( 'my-account' );
    update_option( 'woocommerce_shop_page_id', $shop->ID );
    update_option( 'woocommerce_cart_page_id', $cart->ID );
    update_option( 'woocommerce_checkout_page_id', $checkout->ID );
    update_option( 'woocommerce_myaccount_page_id', $myaccount->ID );
    // Assign front page based on demo import
    switch ( $selected_import ) {
        case 0:
            $front_page_id = get_page_by_title( 'Home' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        case 1:
            $front_page_id = get_page_by_title( 'Home 2' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        case 2:
            $front_page_id = get_page_by_title( 'Home 3' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        case 3:
            $front_page_id = get_page_by_title( 'Home 4' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        case 4:
            $front_page_id = get_page_by_title( 'Home 5' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        case 5:
            $front_page_id = get_page_by_title( 'Home 6' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
        default:
            $front_page_id = get_page_by_title( 'Home' );
            $blog_page_id = get_page_by_title( 'Blog' );
            update_option( 'page_on_front', $front_page_id->ID );
            break;
    }
    $blog_page_id = get_page_by_title( 'Blog' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_for_posts', $blog_page_id->ID );
    update_option( 'elementor_active_kit', 107 );
    // Omit installing WooCommerce pages
    delete_option( '_wc_needs_pages' );
    delete_transient( '_wc_activation_redirect' );
    flush_rewrite_rules();
    global  $wpdb ;
    // Change attribute types
    $table_name = $wpdb->prefix . 'woocommerce_attribute_taxonomies';
    $wpdb->query( "UPDATE `{$table_name}` SET `attribute_type` = 'color' WHERE `attribute_name` = 'color'" );
    $wpdb->query( "UPDATE `{$table_name}` SET `attribute_type` = 'button' WHERE `attribute_name` = 'size'" );
    $woo_atts_transient = get_transient( 'wc_attribute_taxonomies' );
    $woo_atts_transient[0]->attribute_type = 'color';
    $woo_atts_transient[1]->attribute_type = 'button';
    set_transient( 'wc_attribute_taxonomies', $woo_atts_transient );
}

add_action( 'pt-ocdi/after_import', 'nokke_ocdi_after_import' );
/* Disable Branding */
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );