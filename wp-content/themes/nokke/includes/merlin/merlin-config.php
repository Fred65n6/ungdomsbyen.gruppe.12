<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'directory'            => 'includes/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'merlin', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'themes.php', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => false, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => home_url( '/' ), // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Theme Setup', 'nokke' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'nokke' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'nokke' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'nokke' ),

		'btn-skip'                 => esc_html__( 'Skip', 'nokke' ),
		'btn-next'                 => esc_html__( 'Next', 'nokke' ),
		'btn-start'                => esc_html__( 'Start', 'nokke' ),
		'btn-no'                   => esc_html__( 'Cancel', 'nokke' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'nokke' ),
		'btn-child-install'        => esc_html__( 'Install', 'nokke' ),
		'btn-content-install'      => esc_html__( 'Install', 'nokke' ),
		'btn-import'               => esc_html__( 'Import', 'nokke' ),
		'btn-license-activate'     => esc_html__( 'Upgrade', 'nokke' ),
		'btn-license-skip'         => esc_html__( 'Later', 'nokke' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'nokke' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s Pro is Activated', 'nokke' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'nokke' ),
		'license-label'            => esc_html__( 'License key', 'nokke' ),
		'license-success%s'        => esc_html__( 'The theme is already upgraded, so you can go to the next step!', 'nokke' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'nokke' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'nokke' ),

		/* translators: Theme Name */
		'pro-version-header%s'		 => esc_html__( '%s Pro Features', 'nokke' ),
		'pro-version-text%s'			 => esc_html__( 'Build better websites with %s Pro. Save tons of time.', 'nokke' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'nokke' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'nokke' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It should take only a few minutes.', 'nokke' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'nokke' ),

		'child-header'             => esc_html__( 'Install Child Theme', 'nokke' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'nokke' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'nokke' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'nokke' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'nokke' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'nokke' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'nokke' ),

		'plugins-header'           => esc_html__( 'Install Plugins', 'nokke' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'nokke' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'nokke' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'nokke' ),
		'plugins-action-link'      => esc_html__( 'Advanced', 'nokke' ),

		'import-header'            => esc_html__( 'Import Content', 'nokke' ),
		'import'                   => esc_html__( 'Let\'s import content to your website. This could take some minutes. Please wait.', 'nokke' ),
		'import-demo-link'         => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://nokke.deothemes.com', esc_html__( 'Explore Demos', 'nokke' ) ),
		'import-action-link'       => esc_html__( 'Advanced', 'nokke' ),

		'ready-header'             => esc_html__( 'All done. Have fun!', 'nokke' ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'nokke' ),
		'ready-action-link'        => esc_html__( 'Extras', 'nokke' ),
		'ready-big-button'         => esc_html__( 'View your website', 'nokke' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://docs.deothemes.com/nokke/', esc_html__( 'Documentation', 'nokke' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', admin_url( 'themes.php?page=nokke-theme-contact' ), esc_html__( 'Get Theme Support', 'nokke' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'nokke' ) ),
	),
	$features = array(
		array(
			'title' => esc_html__( '6 Home page demos', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'Header / footer / product builder', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'Customizable Mega Menu', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'Multiple unique headers and footers', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'Slider Revolution included (Save $85)', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'ACF Pro included (Save $49)', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'WooCommerce integration', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'Dynamic portfolio', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( '40+ Custom elementor widgets', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'Currency and language switcher', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'Off-canvas mini cart', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'Distraction-free checkout', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'Fully optimized for Gutenberg', 'nokke' ),
			'url' 	=> '#',
		),
		array(
			'title' => esc_html__( 'Priority email support', 'nokke' ),
			'url' 	=> '#',
		)
	)
);
