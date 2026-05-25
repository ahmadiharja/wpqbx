<?php
/**
 * Qubyx Theme — bootstrap.
 *
 * Loads modular files from /inc. Keep this file minimal.
 *
 * @package Qubyx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'QUBYX_THEME_VERSION', '1.0.4' );
define( 'QUBYX_THEME_DIR', get_template_directory() );
define( 'QUBYX_THEME_URI', get_template_directory_uri() );

require_once QUBYX_THEME_DIR . '/inc/theme-setup.php';
require_once QUBYX_THEME_DIR . '/inc/enqueue.php';
require_once QUBYX_THEME_DIR . '/inc/custom-post-types.php';
require_once QUBYX_THEME_DIR . '/inc/acf-fields.php';
require_once QUBYX_THEME_DIR . '/inc/helpers.php';
require_once QUBYX_THEME_DIR . '/inc/store.php';
