<?php
/**
 * Asset enqueueing.
 *
 * @package Qubyx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function qubyx_enqueue_assets() {
	// Google Fonts — Manrope (Basier Square analog) + JetBrains Mono.
	wp_enqueue_style(
		'qubyx-fonts',
		'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap',
		array(),
		null
	);

	// Main stylesheet.
	wp_enqueue_style(
		'qubyx-main',
		QUBYX_THEME_URI . '/assets/css/main.css',
		array( 'qubyx-fonts' ),
		QUBYX_THEME_VERSION
	);

	// Theme stylesheet header (required for child-theme compatibility).
	wp_enqueue_style(
		'qubyx-style',
		get_stylesheet_uri(),
		array( 'qubyx-main' ),
		QUBYX_THEME_VERSION
	);

	// Main JS — defer for performance.
	wp_enqueue_script(
		'qubyx-main',
		QUBYX_THEME_URI . '/assets/js/main.js',
		array(),
		QUBYX_THEME_VERSION,
		array( 'in_footer' => true, 'strategy' => 'defer' )
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'qubyx_enqueue_assets' );

/**
 * Preconnect to font origin for faster paint.
 */
function qubyx_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' );
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'qubyx_resource_hints', 10, 2 );
