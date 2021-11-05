<?php

/**
 * Template parts.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */
add_action( 'nokke_header', 'nokke_header_markup' );
add_action( 'nokke_masthead', 'nokke_masthead_template' );
add_action( 'nokke_menu_after', 'nokke_last_menu_item' );
add_action( 'nokke_footer', 'nokke_footer_template' );
add_action( 'nokke_comments', 'nokke_comments_template' );
add_action( 'nokke_page_title_after', 'nokke_breadcrumbs' );
add_action( 'nokke_entry_section_before', 'nokke_breadcrumbs' );
add_action( 'nokke_entry_featured_image', 'nokke_featured_image_markup' );
if ( !function_exists( 'nokke_header_markup' ) ) {
    /**
     * Get site Header
     */
    function nokke_header_markup()
    {
        if ( !get_theme_mod( 'nokke_settings_header_show', true ) ) {
            return;
        }
        if ( nokke_is_woocommerce_activated() ) {
            if ( is_checkout() && get_theme_mod( 'nokke_settings_woocommerce_distraction_free_checkout', false ) ) {
                return;
            }
        }
        $header_classes = array( 'nokke-header', 'nav' );
        $header_sticky = ( get_theme_mod( 'nokke_settings_sticky_header_show', true ) ? 'nav--sticky ' : '' );
        $header_classes = implode( ' ', $header_classes );
        ?>	

		<header class="<?php 
        echo  esc_attr( $header_classes ) ;
        ?>" role="banner" itemtype="https://schema.org/WPHeader" itemscope="itemscope">
			<div class="nav__holder <?php 
        echo  esc_attr( $header_sticky ) ;
        ?>">
				<div class="nav__container container">
					<div class="nav__flex-parent flex-parent">

						<?php 
        nokke_masthead();
        ?>

					</div> <!-- .flex-parent -->
				</div> <!-- .nav__container -->
			</div> <!-- .nav__holder -->
		</header> <!-- .deo-header -->		
		
		<?php 
    }

}
if ( !function_exists( 'nokke_masthead_template' ) ) {
    /**
     * Header main template
     */
    function nokke_masthead_template()
    {
        get_template_part( 'template-parts/header/header-main-template' );
    }

}
if ( !function_exists( 'nokke_last_menu_item' ) ) {
    /**
     * Header last item in menu
     */
    function nokke_last_menu_item( $is_mobile = false )
    {
        $text_html = get_theme_mod( 'nokke_settings_header_last_menu_item_text_html' );
        $hide_on_mobile = get_theme_mod( 'nokke_settings_header_last_menu_item_hide', false );
        $search = get_theme_mod( 'nokke_settings_header_last_menu_item_search', true );
        $cart = get_theme_mod( 'nokke_settings_header_last_menu_item_shopping_cart', true );
        $html = get_theme_mod( 'nokke_settings_header_last_menu_item_html', false );
        if ( $hide_on_mobile ) {
            return;
        }
        if ( false === $search && false === $cart && false === $account && false === $html ) {
            return;
        }
        if ( !$is_mobile ) {
            echo  '<div class="nav__right d-lg-flex d-none">' ;
        }
        
        if ( $search ) {
            ?>
				<div class="nav__right-item">
					<div class="nokke-menu-search">
						<button type="button" class="nokke-menu-search__trigger" title="<?php 
            echo  esc_attr__( 'Open Search', 'nokke' ) ;
            ?>">
							<i class="nokke-icon-search nokke-menu-search__icon" aria-hidden="true"></i>
						</button>
						<div class="nokke-menu-search-modal" tabindex="-1" aria-hidden="true" aria-label="<?php 
            echo  esc_attr( 'Search Modal', 'nokke' ) ;
            ?>">
							<div class="nokke-menu-search-modal__inner">
								<div class="container">
									<?php 
            get_search_form();
            ?>
								</div>				
							</div>
						</div>
					</div>
				</div>				
				<?php 
        }
        
        
        if ( $html ) {
            echo  '<div class="nav__right-item">' ;
            // We don't escape output here, so user can enter any HTML
            echo  do_shortcode( $text_html ) ;
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo  '</div>' ;
        }
        
        if ( !$is_mobile ) {
            echo  '</div>' ;
        }
    }

}
if ( !function_exists( 'nokke_menu_mobile' ) ) {
    /**
     * Mobile menu
     */
    function nokke_menu_mobile()
    {
        ?>
		<div class="nav__mobile d-lg-none">

			<?php 
        nokke_last_menu_item( true );
        ?>

			<?php 
        
        if ( has_nav_menu( 'primary-menu' ) ) {
            ?>
				<!-- Mobile toggle -->
				<button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
					<span class="visually-hidden"><?php 
            esc_html_e( 'Toggle navigation', 'nokke' );
            ?></span>
					<span class="nav__icon-toggle-bar"></span>
					<span class="nav__icon-toggle-bar"></span>
					<span class="nav__icon-toggle-bar"></span>
				</button>
			<?php 
        }
        
        ?>

		</div>
		<?php 
    }

}
if ( !function_exists( 'nokke_logo' ) ) {
    /**
     * Logo
     */
    function nokke_logo()
    {
        $width = get_theme_mod( 'nokke_settings_header_logo_width' );
        $logo = get_theme_mod( 'nokke_settings_logo_dark' );
        $size = ( is_customize_preview() ? 'full' : [ $width, 0 ] );
        ?>

		<!-- Logo -->
		<a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>" class="logo-url logo-dark" itemtype="https://schema.org/Organization" itemscope="itemscope">
			<?php 
        
        if ( isset( $logo['id'] ) ) {
            ?>
				<img src="<?php 
            echo  esc_url( $logo['url'] ) ;
            ?>"
				class="logo logo--dark"
				width="<?php 
            echo  esc_attr( $logo['width'] ) ;
            ?>"
				height="<?php 
            echo  esc_attr( $logo['height'] ) ;
            ?>"
				alt="<?php 
            bloginfo( 'name' );
            ?>" />
			<?php 
        } else {
            ?>
				<span class="site-title site-title--dark"><?php 
            bloginfo( 'name' );
            ?></span>
				<?php 
            $tagline = get_bloginfo( 'description', 'display' );
            ?>
				<p class="site-tagline"><?php 
            echo  esc_html( $tagline ) ;
            ?></p>
			<?php 
        }
        
        ?>
		</a>

		<?php 
    }

}
if ( !function_exists( 'nokke_footer_template' ) ) {
    /**
     * Footer main template
     */
    function nokke_footer_template()
    {
        if ( class_exists( 'woocommerce' ) ) {
            if ( is_checkout() && get_theme_mod( 'nokke_settings_woocommerce_distraction_free_checkout', false ) ) {
                return;
            }
        }
        get_template_part( 'template-parts/footer/footer-main-template' );
    }

}
if ( !function_exists( 'nokke_comments_template' ) ) {
    /**
     * Comments template
     */
    function nokke_comments_template()
    {
        
        if ( comments_open() || get_comments_number() ) {
            ?>
			<!-- Comments -->
			<?php 
            
            if ( nokke_is_elementor_page() ) {
                ?>
				<div class="container">
			<?php 
            } else {
                ?>
				<div class="comments-wrap">
			<?php 
            }
            
            ?>
				<?php 
            comments_template();
            ?>
			</div>
		<?php 
        }
    
    }

}
if ( !function_exists( 'nokke_preloader' ) ) {
    /**
     * Preloader
     */
    function nokke_preloader()
    {
        if ( get_theme_mod( 'nokke_settings_preloader_show', true ) ) {
            ?>
			<div class="loader-mask">
				<div class="loader">
					<div></div>
				</div>
			</div>
		<?php 
        }
    }

}
if ( !function_exists( 'nokke_back_to_top' ) ) {
    /**
     * Back to top
     */
    function nokke_back_to_top()
    {
        
        if ( get_theme_mod( 'nokke_settings_back_to_top_show', true ) ) {
            ?>
			<!-- Back to top -->
			<div id="back-to-top">
				<a href="#top">
					<i class="nokke-icon-chevron-up" aria-label="<?php 
            echo  esc_attr__( 'Back to top', 'nokke' ) ;
            ?>" aria-hidden="true"></i>
				</a>
			</div>
		<?php 
        }
    
    }

}
if ( !function_exists( 'nokke_primary_content_markup_top' ) ) {
    /**
     * Content markup top
     */
    function nokke_primary_content_markup_top()
    {
        ?>
			<div class="container">
				<div class="row">
		<?php 
    }

}
if ( !function_exists( 'nokke_primary_content_markup_bottom' ) ) {
    /**
     * Content markup bottom
     */
    function nokke_primary_content_markup_bottom()
    {
        ?>
				</div>
			</div>
		<?php 
    }

}
if ( !function_exists( 'nokke_breadcrumbs' ) ) {
    /**
     * Breadcrumbs
     *
     * @since 1.0.0
     */
    function nokke_breadcrumbs()
    {
        if ( !function_exists( 'breadcrumb_trail' ) ) {
            return;
        }
        
        if ( is_archive() && !is_search() && get_theme_mod( 'nokke_settings_archives_breadcrumbs_show', true ) ) {
            if ( nokke_is_woocommerce_activated() ) {
                if ( is_shop() ) {
                    return;
                }
            }
            breadcrumb_trail( array(
                'show_browse' => false,
            ) );
        }
        
        if ( nokke_is_woocommerce_activated() ) {
            if ( is_shop() && get_theme_mod( 'nokke_settings_shop_breadcrumbs_show', true ) ) {
                breadcrumb_trail( array(
                    'show_browse' => false,
                ) );
            }
        }
        if ( is_search() && get_theme_mod( 'nokke_settings_search_results_breadcrumbs_show', true ) ) {
            breadcrumb_trail( array(
                'show_browse' => false,
            ) );
        }
        
        if ( is_page() || is_home() && get_theme_mod( 'nokke_settings_regular_pages_breadcrumbs_show', true ) ) {
            if ( nokke_is_woocommerce_activated() ) {
                if ( is_shop() ) {
                    return;
                }
            }
            breadcrumb_trail( array(
                'show_browse' => false,
            ) );
        }
        
        
        if ( is_single() && get_theme_mod( 'nokke_settings_single_post_breadcrumbs_show', false ) ) {
            ?>
			<div class="breadcrumbs-wrap">
				<div class="container">
					<?php 
            breadcrumb_trail( array(
                'show_browse' => false,
            ) );
            ?>
				</div>
			</div>
			<?php 
        }
    
    }

}
if ( !function_exists( 'nokke_featured_image_markup' ) ) {
    /**
     * Single Entry Featured Image
     *
     * @since 1.0.0
     */
    function nokke_featured_image_markup()
    {
        
        if ( has_post_thumbnail() ) {
            ?>

			<!-- Featured Image -->
			<div class="single-post__featured-img bg-overlay bg-overlay--dark" <?php 
            
            if ( has_post_thumbnail() ) {
                ?>style="background-image: url(<?php 
                echo  esc_url( the_post_thumbnail_url() ) ;
                ?>);"<?php 
            }
            
            ?>>
				<figure class="single-post__featured-img-container d-none">
					<?php 
            the_post_thumbnail( 'full', array(
                'class' => 'single-post__featured-img-image',
            ) );
            ?>
				</figure>

				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8">

							<header class="single-post__entry-header">
								<?php 
            
            if ( get_theme_mod( 'nokke_settings_single_category_show', true ) ) {
                ?>
									<?php 
                nokke_meta_category();
                ?>
								<?php 
            }
            
            ?>
								<h1 class="single-post__entry-title"><?php 
            the_title();
            ?></h1>
								
								<div class="entry__meta single-post__entry-meta">
									<?php 
            
            if ( get_theme_mod( 'nokke_settings_single_author_show', true ) ) {
                ?>
										<?php 
                nokke_meta_author();
                ?>
									<?php 
            }
            
            ?>

									<?php 
            
            if ( get_theme_mod( 'nokke_settings_single_date_show', true ) ) {
                ?>
										<?php 
                nokke_meta_date( true );
                ?>
									<?php 
            }
            
            ?>
								</div>

							</header>

						</div>
					</div>
				</div>

			</div>

		<?php 
        }
    
    }

}
if ( !function_exists( 'nokke_read_more' ) ) {
    /**
     * Read more
     *
     * @since 1.0.0
     */
    function nokke_read_more()
    {
        $text = get_theme_mod( 'nokke_settings_read_more_text', __( 'Read More', 'nokke' ) );
        
        if ( get_theme_mod( 'nokke_settings_read_more_show', true ) ) {
            ?>
			<!-- Read More -->
			<div class="entry__read-more">			
				<a href="<?php 
            the_permalink();
            ?>" class="read-more">
					<?php 
            
            if ( $text ) {
                ?>
						<span class="read-more__text">
							<?php 
                echo  esc_html( $text ) ;
                ?>
						</span>
					<?php 
            }
            
            ?>
					<svg class="read-more__icon" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
				</a>
			</div>
		<?php 
        }
    
    }

}
if ( !function_exists( 'nokke_footer_bottom_text' ) ) {
    /**
     * Footer bottom text
     *
     * @since 1.0.0
     */
    function nokke_footer_bottom_text()
    {
        $output = get_theme_mod( 'nokke_settings_footer_bottom_text', sprintf( esc_html__( 'Copyright &copy; [current-year] %1$s', 'nokke' ), get_bloginfo( 'name' ) ) );
        $output = str_replace( '[current-year]', date_i18n( 'Y' ), $output );
        echo  do_shortcode( wp_kses_post( $output ) ) ;
    }

}