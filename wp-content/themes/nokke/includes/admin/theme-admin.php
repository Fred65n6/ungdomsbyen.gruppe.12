<?php
/**
 * Theme admin functions.
 *
 * @package Nokke
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* Add admin menu
*
* @since 1.0.0
*/
function nokke_theme_admin_menu() {
	add_theme_page(
		esc_html__( 'Nokke Getting Started', 'nokke' ),
		esc_html__( 'Nokke', 'nokke' ),
		'manage_options',
		'nokke-theme',
		'nokke_admin_page_content',
		30
	);
}
add_action( 'admin_menu', 'nokke_theme_admin_menu' );


/**
* Add admin page content
*
* @since 1.0.0
*/
function nokke_admin_page_content() {
	$theme = wp_get_theme();
	$theme_name = 'Nokke';
	$active_theme_name  = strtolower( preg_replace( '#[^a-zA-Z]#', '', $theme->template ) );
	$docs_url = 'https://docs.deothemes.com/nokke/knowledgebase/';

	$urls = array(
		'theme-url'									=> 'https://nokke.deothemes.com/',
		'rating-url'								=> 'https://wordpress.org/support/theme/nokke/reviews/?rate=5#new-post',
		'docs' 											=> 'https://docs.deothemes.com/nokke',
		'video-tutorials'						=> 'https://www.youtube.com/watch?v=R9tPDGK1q-Q&list=PLaPNmyRO67T0BsLPlGdrXO0T_5SxM5A4-&ab_channel=DeoThemes',
		'header-footer-builder'			=> $docs_url . 'header-footer-builder',
		'product-builder'						=> $docs_url . 'product-builder',
		'mega-menu-builder' 				=> $docs_url . 'mega-menu-builder',
		'page-layout'								=> $docs_url . 'page-layout',
		'gdpr'											=> $docs_url . 'gdpr',
		'home-page-demos'						=> $docs_url . 'home-page-demos'
	);

	$buttons = array(
		'logo' => array(
			'link_url'		 => admin_url( 'customize.php?autofocus[section]=nokke_settings_logo' ),
			'link_text'    => esc_html__( 'Logo', 'nokke' ),
			'icon'    		 => 'dashicons dashicons-format-image',
		),
		'header' => array(
			'link_url'		 => admin_url( 'customize.php?autofocus[panel]=nokke_settings_header' ),
			'link_text'    => esc_html__( 'Header', 'nokke' ),
			'icon'    		 => 'dashicons dashicons-align-center',
		),
		'footer' => array(
			'link_url'		 => admin_url( 'customize.php?autofocus[section]=nokke_settings_footer' ),
			'link_text'    => esc_html__( 'Footer', 'nokke' ),
			'icon'				 => 'dashicons dashicons-align-full-width'
		),
		'layout' => array(
			'link_url'		 => admin_url( 'customize.php?autofocus[panel]=nokke_settings_layout' ),
			'link_text'    => esc_html__( 'Layout', 'nokke' ),
			'icon'				 => 'dashicons dashicons-layout'
		),
		'colors' => array(
			'link_url'		 => admin_url( 'customize.php?autofocus[panel]=nokke_settings_colors' ),
			'link_text'    => esc_html__( 'Colors', 'nokke' ),
			'icon'				 => 'dashicons dashicons-admin-appearance'
		),
		'typography' => array(
			'link_url'		 => admin_url( 'customize.php?autofocus[section]=nokke_settings_typography' ),
			'link_text'    => esc_html__( 'Typography', 'nokke' ),
			'icon'				 => 'dashicons dashicons-editor-textcolor'
		),
		'customizer' => array(
			'link_url'		 => admin_url( 'customize.php' ),
			'link_text'    => esc_html__( 'Customizer', 'nokke' ),
			'icon'				 => 'dashicons dashicons-admin-generic'
		),
	);

	if ( nokke_fs()->can_use_premium_code__premium_only() && defined( 'NOKKE_CORE_VERSION' ) ) {
		$buttons['theme_templates'] = array(
			'link_url'		 => admin_url( 'edit.php?post_type=theme_template' ),
			'link_text'    => esc_html__( 'Theme Templates', 'nokke' ),
			'icon'				 => 'dashicons dashicons-table-row-after'
		);

		$buttons['adobe_fonts'] = array(
			'link_url'		 => admin_url( 'admin.php?page=nokke-core-custom-typekit-fonts' ),
			'link_text'    => esc_html__( 'Adobe Fonts', 'nokke' ),
			'icon'				 => 'dashicons dashicons-editor-spellcheck'
		);

		$buttons['integrations'] = array(
			'link_url'		 => admin_url( 'admin.php?page=nokke-core-integrations' ),
			'link_text'    => esc_html__( 'Google Map', 'nokke' ),
			'icon'				 => 'dashicons dashicons-location-alt'
		);
	}

	$videos = array(
		'theme-installation' => array(
			'links' => array(
				array(
					'link_url'		 => 'https://www.youtube.com/watch?v=O9cfL3sqwvc',
					'link_text'    => esc_html__( 'Theme Installation', 'nokke' ),
					'link_img_src' => NOKKE_URI . '/assets/admin/img/videos/nokke_video_demo_import.jpg'
				)
			)
		),
		'color-editing' => array(
			'links' => array(
				array(
					'link_url'		 => 'https://www.youtube.com/watch?v=MpjPEHzWti8&list=PLaPNmyRO67T0BsLPlGdrXO0T_5SxM5A4-&index=3&ab_channel=DeoThemes',
					'link_text'    => esc_html__( 'Color Editing', 'nokke' ),
					'link_img_src' => NOKKE_URI . '/assets/admin/img/videos/nokke_video_colors_editing.jpg'
				)
			)
		),
		'product-builder' => array(
			'links' => array(
				array(
					'link_url'		 => 'https://www.youtube.com/watch?v=2zUr4KWO6rQ&list=PLaPNmyRO67T0BsLPlGdrXO0T_5SxM5A4-&index=2&ab_channel=DeoThemes',
					'link_text'    => esc_html__( 'Product Builder', 'nokke' ),
					'link_img_src' => NOKKE_URI . '/assets/admin/img/videos/nokke_video_product_builder.jpg'
				)
			)
		),
	);

	$info = array(
		'header-footer-builder' => array(
			'title'			=> esc_html__( 'Header / Footer Builder', 'nokke' ),
			'class'			=> 'nokke-addon-list-item',
			'title_url' => $urls['header-footer-builder'],
			'links'			=> array(
				array(
					'link_class'	 => 'nokke-learn-more',
					'link_url'		 => $urls['header-footer-builder'],
					'link_text'    => esc_html__( 'Learn More &#187;', 'nokke' ),
					'target_blank' => true
				),
			),
		),
		'product-builder' => array(
			'title'			=> esc_html__( 'Product Builder', 'nokke' ),
			'class'			=> 'nokke-addon-list-item',
			'title_url' => $urls['product-builder'],
			'links'			=> array(
				array(
					'link_class'	 => 'nokke-learn-more',
					'link_url'		 => $urls['product-builder'],
					'link_text'    => esc_html__( 'Learn More &#187;', 'nokke' ),
					'target_blank' => true
				),
			),
		),
		'mega-menu-builder' => array(
			'title'			=> esc_html__( 'Mega Menu Builder', 'nokke' ),
			'class'			=> 'nokke-addon-list-item',
			'title_url' => $urls['mega-menu-builder'],
			'links'			=> array(
				array(
					'link_class'	 => 'nokke-learn-more',
					'link_url'		 => $urls['mega-menu-builder'],
					'link_text'    => esc_html__( 'Learn More &#187;', 'nokke' ),
					'target_blank' => true
				),
			),
		),
		'page-layouts' => array(
			'title'			=> esc_html__( 'Page Layout', 'nokke' ),
			'class'			=> 'nokke-addon-list-item',
			'title_url' => $urls['page-layout'],
			'links'			=> array(
				array(
					'link_class'	 => 'nokke-learn-more',
					'link_url'		 => $urls['page-layout'],
					'link_text'    => esc_html__( 'Learn More &#187;', 'nokke' ),
					'target_blank' => true
				),
			),
		),
		'gdpr' => array(
			'title'			=> esc_html__( 'GDPR Tools', 'nokke' ),
			'class'			=> 'nokke-addon-list-item',
			'title_url' => $urls['gdpr'],
			'links'			=> array(
				array(
					'link_class'	 => 'nokke-learn-more',
					'link_url'		 => $urls['gdpr'],
					'link_text'    => esc_html__( 'Learn More &#187;', 'nokke' ),
					'target_blank' => true
				),
			),
		),				
	);

	$features = array(
		'demos' => array(
			'title'			=> esc_html__( 'Home Pages', 'nokke' ),
			'url'				=> '',
			'free'			=> esc_html__( '1', 'nokke' ),
			'pro'				=> esc_html__( '6', 'nokke' ),
		),
		'headers-footers' => array(
			'title'			=> esc_html__( 'Headers and Footers', 'nokke' ),
			'url'				=> '',
			'free'			=> esc_html__( '1', 'nokke' ),
			'pro'				=> esc_html__( '6', 'nokke' )
		),
		'rtl-translation' => array(
			'title'			=> esc_html__( 'RTL and Translation Ready', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'demo-import' => array(
			'title'			=> esc_html__( 'One Click Demo Import', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),	
		'24-7-support' => array(
			'title'			=> esc_html__( 'Priority email support', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon nokke-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),		
		'builder' => array(
			'title'			=> esc_html__( 'Header / footer / product builder', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon nokke-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'elementor-widgets' => array(
			'title'			=> esc_html__( 'Elementor widgets', 'nokke' ),
			'url'				=> '',
			'free'			=> esc_html__( 'Basic', 'nokke' ),
			'pro'				=> esc_html__( '45+ premium widgets', 'nokke' ),
		),
		'megamenu' => array(
			'title'			=> esc_html__( 'Customizable mega menu', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon nokke-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'gdpr' => array(
			'title'			=> esc_html__( 'GDPR tools', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon nokke-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'acf-pro' => array(
			'title'			=> esc_html__( 'ACF Pro integrated', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon nokke-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'slider-revolution' => array(
			'title'			=> esc_html__( 'Slider Revolution', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon nokke-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> esc_html__( 'Included (save $85)', 'nokke' ),
		),
		'currency-language' => array(
			'title'			=> esc_html__( 'Currency and language switcher', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon nokke-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'off-canvas-mini-cart' => array(
			'title'			=> esc_html__( 'Off-canvas mini cart', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon nokke-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'distraction-free-checkout' => array(
			'title'			=> esc_html__( 'Distraction free checkout', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon nokke-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),
		'dynamic-portfolio' => array(
			'title'			=> esc_html__( 'Dynamic portfolio', 'nokke' ),
			'url'				=> '',
			'free'			=> '<i class="nokke-list-item-icon nokke-list-item-icon--no dashicons dashicons-no" aria-hidden="true"></i>',
			'pro'				=> '<i class="nokke-list-item-icon dashicons dashicons-yes" aria-hidden="true"></i>'
		),		
		'typography' => array(
			'title'			=> esc_html__( 'Typography', 'nokke' ),
			'url'				=> '',
			'free'			=> esc_html__( 'Google Fonts', 'nokke' ),
			'pro'				=> esc_html__( 'Google Fonts + Adobe Fonts', 'nokke' )
		),
		'colors' => array(
			'title'			=> esc_html__( 'Colors', 'nokke' ),
			'url'				=> '',
			'free'			=> esc_html__( 'Limited', 'nokke' ),
			'pro'				=> esc_html__( 'Advanced', 'nokke' )
		),	
	);

	$demos = array(
		'home-1' => array(
			'title'			=> esc_html__( 'Home Main', 'nokke' ),
			'url'				=> $urls['theme-url'],
			'preview'		=> $urls['theme-url'] . '/import/01/preview.jpg',
		),
		'home-2' => array(
			'title'			=> esc_html__( 'Creative Agency', 'nokke' ),
			'url'				=> $urls['theme-url'] . 'creative-agency',
			'preview'		=> $urls['theme-url'] . '/import/02/preview.jpg',
		),
		'home-3' => array(
			'title'			=> esc_html__( 'Studio Dark', 'nokke' ),
			'url'				=> $urls['theme-url'] . 'studio-dark',
			'preview'		=> $urls['theme-url'] . '/import/03/preview.jpg',
		),
		'home-4' => array(
			'title'			=> esc_html__( 'Online Store', 'nokke' ),
			'url'				=> $urls['theme-url'] . 'online-store',
			'preview'		=> $urls['theme-url'] . '/import/04/preview.jpg',
		),
		'home-5' => array(
			'title'			=> esc_html__( 'Interior Slider', 'nokke' ),
			'url'				=> $urls['theme-url'] . 'interior-slider',
			'preview'		=> $urls['theme-url'] . '/import/05/preview.jpg',
		),
		'home-6' => array(
			'title'			=> esc_html__( 'Portfolio Masonry', 'nokke' ),
			'url'				=> $urls['theme-url'] . 'portfolio-masonry',
			'preview'		=> $urls['theme-url'] . '/import/06/preview.jpg',
		),
	);

	?>

		<div class="nokke-page-header">
			<div class="nokke-page-header__container">
				<div class="nokke-page-header__branding">
					<a href="<?php echo esc_url( $urls['theme-url'] ); ?>" target="_blank" rel="noopener" >
						<img src="<?php echo esc_url( NOKKE_URI . '/assets/admin/img/theme_logo.png' ); ?>" class="nokke-page-header__logo" alt="<?php echo esc_attr__( 'Nokke', 'nokke' ); ?>" />
					</a>
					<span class="nokke-theme-version"><?php echo esc_html( NOKKE_VERSION ); ?></span>
				</div>
				<div class="nokke-page-header__tagline">
					<span  class="nokke-page-header__tagline-text">				
						<?php echo esc_html__( 'Made by ', 'nokke' ); ?>
						<a href="https://deothemes.com/"><?php echo esc_html__( 'DeoThemes', 'nokke' ); ?></a>						
					</span>					
				</div>				
			</div>
		</div>

		<div class="wrap nokke-container">
			<div class="nokke-grid">

				<div class="nokke-grid-content">
					<div class="nokke-body">

						<h1 class="nokke-title"><?php esc_html_e( 'Getting Started', 'nokke' ); ?></h1>
						<p class="nokke-intro-text">
							<?php echo esc_html__( 'Nokke is now installed and ready to use. Get ready to build something beautiful. To get started check the links below. We hope you enjoy it!', 'nokke' ); ?>
						</p>
						
						<?php
							$wizard_completed = get_option( 'merlin_' . $active_theme_name . '_completed' );

							if ( ! $wizard_completed ) : ?>
								<a href="<?php echo esc_url( admin_url( 'themes.php?page=merlin' ) ); ?>" class="button button-primary button-hero">
									<?php echo esc_html__( 'Run Setup Wizard', 'nokke' ); ?>
								</a>
							<?php endif;
						?>

						<!-- Navigation Buttons -->
						<ul class="nokke-navigation-buttons">
							<?php foreach ( $buttons as $button => $link ) {
								echo '<li class="nokke-navigation-buttons__item">';
									echo '<a href="' . esc_url( $link['link_url'] ) . '" class="nokke-navigation-buttons__url">';
										echo '<span class="nokke-navigation-buttons__icon ' . esc_attr( $link['icon'] ) . '"></span>';
										echo '<span class="nokke-navigation-buttons__label">' . esc_html( $link['link_text'] ) . '</span>';
									echo '</a>';
								echo '</li>';
							}	?>
						</ul>

						<!-- Pro Demos -->
						<section class="nokke-section">
							<h2 class="nokke-heading"><?php echo esc_html( $theme_name ) . esc_html__( ' Pro Predefined Demos', 'nokke' ); ?></h2>
							<ul class="nokke-pro-demos">
								<?php foreach ( $demos as $demo ) : ?>
									<li class="nokke-pro-demos__item">
										<a href="<?php echo esc_url( $demo['url'] ); ?>" <?php the_title_attribute( $demo['title'] ); ?>>
											<img src="<?php echo esc_url( $demo['preview'] ); ?>" alt="<?php echo esc_attr( $demo['title'] ); ?>">
											<h2 class="nokke-pro-demos__item-title"><?php echo esc_html( $demo['title'] ); ?></h2>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</section>

						<!-- Comparison -->
						<section class="nokke-section">
							<h2 class="nokke-heading"><?php echo esc_html__( 'Free Vs Pro', 'nokke' ); ?></h2>
							<table class="nokke-comparison widefat striped table-view-list">
								<thead>
									<tr>
										<th><span><?php echo esc_html__( 'Features', 'nokke' ); ?></span></th>
										<th><span><?php printf( esc_html__( '%s Free', 'nokke' ), $theme_name ); ?></span></th>
										<th><span><?php printf( esc_html__( '%s Pro', 'nokke' ), $theme_name ); ?></span></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ( $features as $feature ) : ?>
										<tr>
											<td><?php echo esc_html( $feature['title'] ); ?></td>
											<td><?php echo wp_kses( $feature['free'], array(
												'i' => array(
													'class' => array(),
													'aria-hidden' => array()
												)
											) ); ?></td>
											<td><?php echo wp_kses( $feature['pro'], array(
												'i' => array(
													'class' => array(),
													'aria-hidden' => array()
												)
											) ); ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<a href="<?php echo esc_url( nokke_fs()->get_upgrade_url() ); ?>" class="button button-primary button-hero">
								<span><?php echo esc_html__( 'Get Pro', 'nokke' ); ?></span>
							</a>
						</section>
						
					</div> <!-- .body -->

				</div> <!-- .content -->
				
				<aside class="nokke-grid-sidebar">
					<div class="nokke-grid-sidebar-widget-area">

						<div class="nokke-widget">
							<h2 class="nokke-widget-title"><?php echo esc_html__( 'Useful Links', 'nokke' ); ?></h2>
							<ul class="nokke-useful-links">
								<li>
									<a href="https://wordpress.org/support/theme/nokke/reviews/#new-post" target="_blank"><?php echo esc_html__( 'Rate Us ★★★★★', 'nokke' ); ?></a>
								</li>
								<li>
									<a href="https://docs.deothemes.com/nokke" target="_blank"><?php echo esc_html__( 'Knowledge Base', 'nokke' ); ?></a>
								</li>
								<li>
									<a href="<?php echo esc_url( admin_url( 'themes.php?page=nokke-theme-contact' ) ); ?>"><?php echo esc_html__( 'Support', 'nokke' ); ?></a>
								</li>
							</ul>
						</div>

						<div class="nokke-widget nokke-widget-video-tutorials">
							<h2 class="nokke-widget-title"><?php esc_html_e( 'Video Tutorials', 'nokke' ) ?></h2>
							<ul class="nokke-video-tutorials">
								<?php
								foreach ( (array) $videos as $video_items => $video ) {
									echo '<li class="nokke-video-tutorials__item">';
										foreach ( $video['links'] as $key => $link ) {
											echo '<a href="' . esc_url( $link['link_url'] ) . '" class="nokke-video-tutorials__url" target="_blank" rel="noopener">';
												echo '<img src="' . esc_url( $link['link_img_src'] ) . '" alt="' . esc_html( $link['link_text'] ) . '" class="nokke-video-tutorials__img" />';
												echo '<span class="nokke-video-tutorials__label">' . esc_html( $link['link_text'] ) . '</span>';
											echo '</a>';
										}
									echo '</li>';
								}
								?>
							</ul>
						</div>					

					</div>					
				</aside>	

			</div> <!-- .grid -->

		</div>
	<?php
}


/**
* Change theme icon
*
* @since 1.0.0
*/
function nokke_fs_custom_icon() {
	return NOKKE_DIR . '/assets/admin/img/theme-icon.png';
} 
nokke_fs()->add_filter( 'plugin_icon' , 'nokke_fs_custom_icon' );


/**
 * Add extra permissions to Freemius
 */
function nokke_freemius_extra_permissions( $permissions ) {
	$permissions['newsletter'] = array(
		'icon-class' => 'dashicons dashicons-email-alt',
		'label'      => nokke_fs()->get_text_inline( 'Newsletter', 'nokke' ),
		'desc'       => nokke_fs()->get_text_inline( 'Your email is added to our newsletter. Updates, announcements, marketing, no spam. Unsubscribe anytime.', 'nokke' ),
		'priority'   => 15,
	);
	return $permissions;
}
nokke_fs()->add_filter( 'permission_list', 'nokke_freemius_extra_permissions' );




/**
* Adds an admin notice upon successful activation.
*/
function nokke_activation_admin_notice() {
	global $current_user;
	global $current_screen;

	// Don't show on Nokke main admin page
	if ( $current_screen->id === 'appearance_page_nokke-theme' || $current_screen->id === 'toplevel_page_nokke' ) {
		return;
	}

	if ( is_admin() ) {

		$current_theme = wp_get_theme();
		$welcome_dismissed = get_user_meta( $current_user->ID, 'nokke_wizard_admin_notice' );

		if ( ( $current_theme->get('Name') == "Nokke" || $current_theme->get('Name') == "Nokke Pro" ) && ! $welcome_dismissed ) {
			add_action( 'admin_notices', 'nokke_wizard_admin_notice', 99 );
		}

		wp_enqueue_style( 'nokke-wizard-notice-css', get_template_directory_uri() . '/assets/admin/css/wizard-notice.css' );

	}
}
add_action( 'current_screen', 'nokke_activation_admin_notice' );



/**
* Adds a button to dismiss the notice
*/
function nokke_dismiss_wizard_notice() {
	global $current_user;
	$user_id = $current_user->ID;

	if ( isset( $_GET['nokke_wizard_dismiss'] ) && $_GET['nokke_wizard_dismiss'] == '1' ) {
		add_user_meta( $user_id, 'nokke_wizard_admin_notice', 'true', true );
	}
}
add_action( 'admin_init', 'nokke_dismiss_wizard_notice', 1 );


/**
* Display an admin notice linking to the wizard screen
*/
function nokke_wizard_admin_notice() {
	if ( current_user_can( 'customize' ) ) : ?>
		<div class="notice theme-notice welcome-panel">
			<div class="theme-notice-logo">
				<img src="<?php echo esc_url( NOKKE_URI . '/assets/admin/img/theme_thumb.png' ); ?>" alt="<?php esc_attr_e( 'Nokke', 'nokke' ) ?>">
			</div>
			<div class="theme-notice-message wp-theme-fresh">
				<h2><?php esc_html_e( 'Thank you for choosing Nokke!', 'nokke' ); ?></h2>
				<?php if ( class_exists( 'Merlin' ) ) : ?>
					<p class="about-description"><?php esc_html_e( 'Run the Setup Wizard to configure your new theme and begin customizing your site.', 'nokke' ); ?></p>
				<?php else : ?>
					<p class="about-description"><?php esc_html_e( 'Follow the steps to configure your new theme and begin customizing your site.', 'nokke' ); ?></p>
				<?php endif; ?>
			</div>
			<div class="theme-notice-cta">
				<?php if ( class_exists( 'Merlin' ) ) : ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=merlin' ) ); ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php esc_html_e( 'Run Setup Wizard', 'nokke' ); ?></a>
				<?php else : ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=nokke-theme' ) ); ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php esc_html_e( 'Setup Instructions', 'nokke' ); ?></a>
				<?php endif; ?>
				<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'nokke_wizard_dismiss', '1' ) ) ); ?>" class="notice-dismiss" target="_parent"></a>
			</div>
		</div>
	<?php endif;
}
