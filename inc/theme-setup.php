<?php
/**
 * Theme setup — supports, menus, image sizes.
 *
 * @package Qubyx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'qubyx_theme_setup' ) ) :
	function qubyx_theme_setup() {
		load_theme_textdomain( 'qubyx', QUBYX_THEME_DIR . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array(
			'height'      => 60,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		) );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'custom-spacing' );
		add_theme_support( 'custom-units' );
		add_theme_support( 'woocommerce' );

		add_editor_style( 'assets/css/editor.css' );

		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'qubyx' ),
			'footer'  => __( 'Footer Menu', 'qubyx' ),
		) );

		add_image_size( 'qubyx-hero', 1920, 1080, true );
		add_image_size( 'qubyx-card', 800, 600, true );
		add_image_size( 'qubyx-square', 800, 800, true );
	}
endif;
add_action( 'after_setup_theme', 'qubyx_theme_setup' );

/**
 * Remove unnecessary WP head bloat to keep the theme lean and SEO-clean.
 */
function qubyx_clean_head() {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}
add_action( 'init', 'qubyx_clean_head' );

/**
 * Lazy-load images by default (WP already does this — kept here for explicit intent).
 */
add_filter( 'wp_lazy_loading_enabled', '__return_true' );

/**
 * Body class additions.
 */
function qubyx_body_classes( $classes ) {
	if ( is_singular() ) {
		$classes[] = 'is-singular';
	}
	if ( is_front_page() ) {
		$classes[] = 'is-front';
	}
	if ( is_page_template() ) {
		$classes[] = 'has-page-template';
	}
	return $classes;
}
add_filter( 'body_class', 'qubyx_body_classes' );
