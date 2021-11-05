<?php
/**
 * Customizer Blog
 *
 * @package Nokke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
* Meta
*/

// Meta category
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_meta_category_show',
	'label'       => esc_attr__( 'Show meta category', 'nokke' ),
	'section'     => 'nokke_settings_post_meta',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_meta_date_show',
	'label'       => esc_attr__( 'Show meta date', 'nokke' ),
	'section'     => 'nokke_settings_post_meta',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_meta_author_show',
	'label'       => esc_attr__( 'Show meta author', 'nokke' ),
	'section'     => 'nokke_settings_post_meta',
	'default'     => true,
) );


// Post excerpt
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_post_excerpt_show',
	'label'       => esc_attr__( 'Show post excerpt', 'nokke' ),
	'section'     => 'nokke_settings_post_meta',
	'default'     => true,
) );


/**
* Single Post
*/

// Meta category
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_single_category_show',
	'label'       => esc_attr__( 'Show category', 'nokke' ),
	'section'     => 'nokke_settings_single_post',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_single_date_show',
	'label'       => esc_attr__( 'Show date', 'nokke' ),
	'section'     => 'nokke_settings_single_post',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_single_author_show',
	'label'       => esc_attr__( 'Show author', 'nokke' ),
	'section'     => 'nokke_settings_single_post',
	'default'     => true,
) );

// Post tags
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_post_tags_show',
	'label'       => esc_attr__( 'Show tags', 'nokke' ),
	'section'     => 'nokke_settings_single_post',
	'default'     => true,
) );

// Post author box
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_author_box_show',
	'label'       => esc_attr__( 'Show author box', 'nokke' ),
	'section'     => 'nokke_settings_single_post',
	'default'     => true,
) );

// Related posts heading
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'nokke_settings_single_post',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Related Posts', 'nokke' ) . '</h3>',
) );

// Related posts
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_related_posts_show',
	'label'       => esc_attr__( 'Show related posts', 'nokke' ),
	'section'     => 'nokke_settings_single_post',
	'default'     => true,
) );

// Related by
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'select',
	'settings'    => 'nokke_settings_related_posts_relation',
	'label'       => esc_html__( 'Related by', 'nokke' ),
	'section'     => 'nokke_settings_single_post',
	'default'     => 'category',
	'choices'     => array(
		'category' => esc_attr__( 'Category', 'nokke' ),
		'tag' => esc_attr__( 'Tag', 'nokke' ),
		'author' => esc_attr__( 'Author', 'nokke' ),
	),
) );


/**
* Socials Share Buttons
*/

// Social Share Buttons
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_post_share_buttons_show',
	'label'       => esc_html__( 'Show share buttons', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => true,
) );

// Facebook Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_facebook',
	'label'       => esc_html__( 'Facebook', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => true,
) );

// Twitter Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_twitter',
	'label'       => esc_html__( 'Twitter', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => true,
) );

// Linkedin Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_linkedin',
	'label'       => esc_html__( 'Linkedin', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => false,
) );

// Pinterest Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_pinterest',
	'label'       => esc_html__( 'Pinterest', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => true,
) );

// Vkontakte Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_vkontakte',
	'label'       => esc_html__( 'Vkontakte', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => false,
) );

// Pocket Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_pocket',
	'label'       => esc_html__( 'Pocket', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => true,
) );

// Facebook Messenger Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_facebook_messenger',
	'label'       => esc_html__( 'Facebook Messenger', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => false,
) );

// Whatsapp Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_whatsapp',
	'label'       => esc_html__( 'Whatsapp', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => false,
) );

// Viber Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_viber',
	'label'       => esc_html__( 'Viber', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => false,
) );

// Telegram Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_telegram',
	'label'       => esc_html__( 'Telegram', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => false,
) );

// Reddit Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_reddit',
	'label'       => esc_html__( 'Reddit', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => false,
) );

// Email Share
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'checkbox',
	'settings'    => 'nokke_settings_share_email',
	'label'       => esc_html__( 'Email', 'nokke' ),
	'section'     => 'nokke_settings_social_share',
	'default'     => true,
) );


/**
* Read More
*/

// Read More Show
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'toggle',
	'settings'    => 'nokke_settings_read_more_show',
	'label'       => esc_attr__( 'Show read more', 'nokke' ),
	'section'     => 'nokke_settings_read_more',
	'default'     => true,
) );

// Read More Text
Kirki::add_field( 'nokke_settings_config', array(
	'type'        => 'text',
	'settings'    => 'nokke_settings_read_more_text',
	'label'       => esc_attr__( 'Read more text', 'nokke' ),
	'section'     => 'nokke_settings_read_more',
	'default'     => esc_html__( 'Read More', 'nokke' ),
) );