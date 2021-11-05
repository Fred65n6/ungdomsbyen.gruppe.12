<?php

/**
 * Theme Customizer
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
function nokke_customize_register( $wp_customize )
{
    // Customize Background Settings
    $wp_customize->get_section( 'background_image' )->title = esc_html__( 'Background Styles', 'nokke' );
    $wp_customize->get_control( 'background_color' )->section = 'background_image';
    // Remove colors section
    $wp_customize->remove_section( 'colors' );
}

add_action( 'customize_register', 'nokke_customize_register' );
// Check if Kirki is installed

if ( class_exists( 'Kirki' ) ) {
    function nokke_customizer_options()
    {
        // Selector Vars
        $selectors = array(
            'primary_color'               => 'a,
				.breadcrumbs a:hover,
				.breadcrumbs a:focus,
				.loader,
				.comment-edit-link,
				.entry__title a:focus,
				.entry__title a:hover,
				.entry-navigation__title a:focus,
				.entry-navigation__title a:hover,
				.footer .widget.widget_calendar a,
				.widget_rss .rsswidget:hover,
				.widget_recent_entries a:hover,
				.widget_recent_comments a:hover,
				.widget_nav_menu a:hover,
				.widget_archive a:hover,
				.widget_pages a:hover,
				.widget_categories a:hover,
				.widget_meta a:hover,
				.widget-popular-posts .widget-popular-posts__entry-title a:hover,
				.footer__nav-menu li a:hover,
				.footer__widgets .widget a:hover,
				.copyright a:hover,
				.copyright a:focus,
				.link-underline:hover,
				.link-underline:focus,
				.project__category:hover,
				.project__category:focus,
				.project__title:hover a,
				.project__title:focus a,
				.service__title:hover,
				.service__title:focus,
				.read-more:hover,
				.read-more:focus,
				.related-posts__entry-title:hover a,
				.wp-block-pullquote::before,
				.nav__right-item .nokke-menu-search__trigger:hover,
				.nokke-header .nav__menu > li > a:hover,
				.nokke-header .nav__menu > li > a:focus,
				.nokke-header .nav__menu > li.active > a,
				.nokke-header .nav__menu > .current_page_parent > a,
				.nokke-header .nav__menu .current-menu-item > a,
				.nokke-header .nav__dropdown-menu > li > a:hover,
				.nokke-header .nav__dropdown-menu > li > a:focus,
				.nav__right-item a:hover,
				.nav__right-item button:hover',
            'primary_background_color'    => '.nav__icon-toggle:focus .nav__icon-toggle-bar,
				.nav__icon-toggle:hover .nav__icon-toggle-bar,
				#back-to-top:hover,
				.post-page-numbers.current,
				.post-page-numbers:not(span):hover,
				.link-underline:after,
				.eversor-field-type-input::after,
				.trail-items li::after,
				.social:focus,
				.social:hover,
				.comment-author__post-author-label,
				
				input[type="button"],
				input[type="reset"],
				input[type="submit"],
				
				.elementor-widget-button .elementor-button,

				.btn--color,
				.button',
            'primary_border_color'        => 'input:focus,
				textarea:focus',
            'primary_border_top_color'    => '.elementor-widget-tabs .elementor-tab-title.elementor-active',
            'primary_border_left_color'   => 'blockquote, .edit-post-visual-editor .wp-block-quote',
            'primary_border_bottom_color' => '.newsletter .form-group input[type=email]:focus, .newsletter .form-group input[type=text]:focus',
            'border_color'                => 'input,
				select,
				textarea,
				.pagination a,
				.pagination span,
				.elementor-widget-sidebar .widget,
				.sidebar .widget,
				.entry,
				table td,
				table th',
            'headings_color'              => 'h1,h2,h3,h4,h5,h6,
				label,
				a:hover,
				a:focus,
				.comment-author__name,
				.entry__tags-label,
				.entry__share-label,
				.entry__category-item:hover,
				.entry__category-item:focus,				
				.nokke-header .nav__menu > li > a,
				.nokke-header .nokke-menu-cart__url,
				.nokke-header .nokke-menu-search__trigger,
				.widget-title,
				table tbody tr th,
				table thead tr th,				
				.widget-popular-posts .widget-popular-posts__entry-title a',
            'text_color'                  => 'body,
				input,
				figcaption,
				.comment-form-cookies-consent label,
				.pagination span,
				.pagination a,
				.search-button,
				.search-form__button,
				.widget-search-button,
				.nokke-header .nav__dropdown-menu > li > a',
            'footer_widgets_text_color'   => '.footer,
				.footer__nav-menu li a,
				.footer .widget_recent_entries a,
				.footer .widget_nav_menu a,
				.footer .widget_categories a,
				.footer .widget_pages a,
				.footer .widget_archive a,
				.footer .widget_meta a',
            'post_links_color'            => '.single-post__entry-article p a, .single-post__entry-article li:not(.wp-social-link) a',
            'post_meta_color'             => '.entry__meta-item, .entry__meta li, .entry__meta a, .comment-date',
            'headings'                    => 'h1,h2,h3,h4,h5,h6,
				label,
				.comment-author,
				.comment-metadata,
				.entry__tags-label,
				.entry__share-label,
				.entry-navigation__label',
            'h1'                          => 'h1, .h1',
            'h2'                          => 'h2, .h2',
            'h3'                          => 'h3, .h3',
            'h4'                          => 'h4, .h4',
            'h5'                          => 'h5, .h5',
            'h6'                          => 'h6, .h6',
            'base_font'                   => 'body',
            'buttons'                     => 'input[type="button"],
				input[type="reset"],
				input[type="submit"],
				button,
				.btn,
				.button,
				.elementor-button,
				.elementor-button.elementor-size-md,
				.elementor-button.elementor-size-lg,
				.elementor-button.elementor-size-xl,
				.wp-block-button .wp-block-button__link,
				.added_to_cart',
            'buttons_hover_color'         => 'button:focus,
				button:hover,
				.button:focus
				.button:hover,
				.btn:hover,
				.btn:focus,
				input[type="button"]:focus,
				input[type="button"]:hover,
				input[type="reset"]:focus,
				input[type="reset"]:hover,
				input[type="submit"]:focus,
				input[type="submit"]:hover,
				.elementor-widget-button .elementor-button:focus,
				.elementor-widget-button .elementor-button:hover,
				.mc4wp-form-fields input[type=submit]:focus,
				.mc4wp-form-fields input[type=submit]:hover',
            'buttons_color_editor'        => '.wp-block-button__link:not(.has-background),
				.wp-block-button__link:not(.has-background):active,
				.wp-block-button__link:not(.has-background):focus,
				.wp-block-button__link:not(.has-background):hover,
				.wp-block-button__link:not(.has-background):visited',
        );
        if ( function_exists( 'nokke_get_typekit_fonts' ) ) {
            $typekit_fonts = nokke_get_typekit_fonts();
        }
        $heading_font = ( isset( $typekit_fonts ) && !empty($typekit_fonts && isset( $typekit_fonts[0] )) ? $typekit_fonts[0] : 'Montserrat' );
        $body_font = ( isset( $typekit_fonts ) && !empty($typekit_fonts && isset( $typekit_fonts[1] )) ? $typekit_fonts[1] : 'PT Sans' );
        $heading_color = '#242424';
        $text_color = '#6E6E6E';
        $text_color_light = '#A5A5A5';
        $meta_color = '#a7a7a7';
        $border_color = '#E3E3E3';
        $primary_color = '#bfa67a';
        $mobile_menu_dividers_color = '#E3E3E3';
        $bg_light = '#F7F7F7';
        $bg_dark = '#060606';
        $bp_xl_up = '@media (min-width: 1200px)';
        $bp_xl_down = '@media (min-width: 1199px)';
        $bp_lg_up = '@media (min-width: 1025px)';
        $bp_lg_down = '@media (max-width: 1024px)';
        // Kirki
        Kirki::add_config( 'nokke_settings_config', array(
            'capability'  => 'edit_theme_options',
            'option_type' => 'theme_mod',
            'option_name' => 'nokke_settings_config',
        ) );
        /**
         * SECTIONS / PANELS
         **/
        $priority = 20;
        $uniqid = 1;
        // 1. GENERAL PANEL
        Kirki::add_panel( 'nokke_settings_general', array(
            'title'    => esc_attr__( 'General', 'nokke' ),
            'priority' => $priority++,
        ) );
        // Preloader
        Kirki::add_section( 'nokke_settings_preloader', array(
            'title' => esc_html__( 'Preloader', 'nokke' ),
            'panel' => 'nokke_settings_general',
        ) );
        // Back to Top
        Kirki::add_section( 'nokke_settings_back_to_top', array(
            'title' => esc_html__( 'Back to Top', 'nokke' ),
            'panel' => 'nokke_settings_general',
        ) );
        // Portfolio
        Kirki::add_section( 'nokke_settings_portfolio', array(
            'title' => esc_html__( 'Portfolio', 'nokke' ),
            'panel' => 'nokke_settings_general',
        ) );
        // 2. HEADER PANEL
        Kirki::add_panel( 'nokke_settings_header', array(
            'title'    => esc_html__( 'Header & Logo', 'nokke' ),
            'priority' => $priority++,
        ) );
        // Default Header
        Kirki::add_section( 'nokke_settings_default_header', array(
            'title'       => esc_html__( 'Default Header', 'nokke' ),
            'description' => esc_html__( 'Options for the default header', 'nokke' ),
            'panel'       => 'nokke_settings_header',
        ) );
        // Logo
        Kirki::add_section( 'nokke_settings_logo', array(
            'title' => esc_html__( 'Logo', 'nokke' ),
            'panel' => 'nokke_settings_header',
        ) );
        // Primary Menu
        Kirki::add_section( 'nokke_settings_primary_menu', array(
            'title' => esc_html__( 'Primary Menu', 'nokke' ),
            'panel' => 'nokke_settings_header',
        ) );
        // 3. FOOTER
        Kirki::add_section( 'nokke_settings_footer', array(
            'title'    => esc_html__( 'Footer', 'nokke' ),
            'priority' => $priority++,
        ) );
        // 4. LAYOUT PANEL
        Kirki::add_panel( 'nokke_settings_layout', array(
            'title'    => esc_html__( 'Layout', 'nokke' ),
            'priority' => $priority++,
        ) );
        // Blog Layout
        Kirki::add_section( 'nokke_settings_blog_layout', array(
            'title'       => esc_html__( 'Blog', 'nokke' ),
            'description' => esc_html__( 'Layout options for the blog pages', 'nokke' ),
            'panel'       => 'nokke_settings_layout',
        ) );
        // Single Post Layout
        Kirki::add_section( 'nokke_settings_single_post_layout', array(
            'title' => esc_html__( 'Single Post', 'nokke' ),
            'panel' => 'nokke_settings_layout',
        ) );
        // Projects Layout
        Kirki::add_section( 'nokke_settings_projects_layout', array(
            'title'       => esc_html__( 'Projects', 'nokke' ),
            'description' => esc_html__( 'Layout options for the projects archive pages', 'nokke' ),
            'panel'       => 'nokke_settings_layout',
        ) );
        // Services Layout
        Kirki::add_section( 'nokke_settings_services_layout', array(
            'title'       => esc_html__( 'Services', 'nokke' ),
            'description' => esc_html__( 'Layout options for the services archive pages', 'nokke' ),
            'panel'       => 'nokke_settings_layout',
        ) );
        // Page Layout
        Kirki::add_section( 'nokke_settings_page_layout', array(
            'title'       => esc_html__( 'Page', 'nokke' ),
            'description' => esc_html__( 'Layout options for the regular pages', 'nokke' ),
            'panel'       => 'nokke_settings_layout',
        ) );
        // Archive Layout
        Kirki::add_section( 'nokke_settings_archive_layout', array(
            'title'       => esc_html__( 'Archive', 'nokke' ),
            'description' => esc_html__( 'Layout options for archive and categories pages', 'nokke' ),
            'panel'       => 'nokke_settings_layout',
        ) );
        // Search Results Layout
        Kirki::add_section( 'nokke_settings_search_results_layout', array(
            'title'       => esc_html__( 'Search Results', 'nokke' ),
            'description' => esc_html__( 'Layout options for search result page', 'nokke' ),
            'panel'       => 'nokke_settings_layout',
        ) );
        // 5. COLORS PANEL
        Kirki::add_panel( 'nokke_settings_colors', array(
            'title'    => esc_html__( 'Colors', 'nokke' ),
            'priority' => $priority++,
        ) );
        // General Colors
        Kirki::add_section( 'nokke_settings_general_colors', array(
            'title' => esc_html__( 'General', 'nokke' ),
            'panel' => 'nokke_settings_colors',
        ) );
        // 6. TYPOGRAPHY
        Kirki::add_section( 'nokke_settings_typography', array(
            'title'    => esc_html__( 'Typography', 'nokke' ),
            'priority' => $priority++,
        ) );
        // 7. BLOG PANEL
        Kirki::add_panel( 'nokke_settings_blog', array(
            'title'    => esc_attr__( 'Blog', 'nokke' ),
            'priority' => $priority++,
        ) );
        // Post Meta
        Kirki::add_section( 'nokke_settings_post_meta', array(
            'title'       => esc_html__( 'Post Meta', 'nokke' ),
            'description' => esc_html__( 'These options will apply to the default WordPress posts. Customize Elementor widgets post meta via Elementor.', 'nokke' ),
            'panel'       => 'nokke_settings_blog',
        ) );
        // Single Post
        Kirki::add_section( 'nokke_settings_single_post', array(
            'title' => esc_html__( 'Single Post', 'nokke' ),
            'panel' => 'nokke_settings_blog',
        ) );
        // Post Excerpt
        Kirki::add_section( 'nokke_settings_post_excerpt', array(
            'title' => esc_html__( 'Excerpt', 'nokke' ),
            'panel' => 'nokke_settings_blog',
        ) );
        // Read More
        Kirki::add_section( 'nokke_settings_read_more', array(
            'title' => esc_html__( 'Read More', 'nokke' ),
            'panel' => 'nokke_settings_blog',
        ) );
        // 8. PAGE TITLE
        Kirki::add_section( 'nokke_settings_page_title', array(
            'title'    => esc_attr__( 'Page Title / Breadcrumbs', 'nokke' ),
            'priority' => $priority++,
        ) );
        // 12. Page 404
        Kirki::add_section( 'nokke_settings_page_404', array(
            'title'       => esc_html__( 'Page 404', 'nokke' ),
            'description' => esc_html__( 'Settings for page 404', 'nokke' ),
            'priority'    => $priority++,
        ) );
        /**
         * Pro Customizer Options
         */
        function nokke_pro_customizer_options( $section, $uniqid )
        {
            if ( nokke_fs()->is_not_paying() ) {
                Kirki::add_field( 'nokke_settings_config', array(
                    'type'     => 'custom',
                    'settings' => 'nokke_pro_options_' . $uniqid,
                    'section'  => $section,
                    'default'  => '<hr><h4>' . esc_attr__( 'More Options Available in Nokke Pro', 'nokke' ) . '</h4>' . '<a href="' . esc_url( nokke_fs()->get_upgrade_url() ) . '" class="button button-primary">' . esc_html__( 'Upgrade Now!', 'nokke' ) . '</a>',
                ) );
            }
        }
        
        // Load modules
        require_once NOKKE_DIR . '/includes/customizer/modules/general.php';
        require_once NOKKE_DIR . '/includes/customizer/modules/header.php';
        require_once NOKKE_DIR . '/includes/customizer/modules/footer.php';
        require_once NOKKE_DIR . '/includes/customizer/modules/layout.php';
        require_once NOKKE_DIR . '/includes/customizer/modules/page-title.php';
        require_once NOKKE_DIR . '/includes/customizer/modules/blog.php';
        require_once NOKKE_DIR . '/includes/customizer/modules/colors.php';
        require_once NOKKE_DIR . '/includes/customizer/modules/typography.php';
        require_once NOKKE_DIR . '/includes/customizer/modules/page-404.php';
    }
    
    nokke_customizer_options();
}

// endif Kirki check