<?php
/**
 * Private update client for the Qubyx theme and importer plugin.
 *
 * The update server is intentionally generic: it returns a manifest with
 * package metadata, while WordPress still performs the installation.
 *
 * @package QubyxContentImporter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'QUBYX_CI_UPDATE_CACHE_KEY', 'qubyx_ci_update_manifest' );
define( 'QUBYX_CI_THEME_STYLESHEET', 'qubyx-theme' );
define( 'QUBYX_CI_DEFERRED_IMPORT_HOOK', 'qubyx_ci_deferred_auto_import' );

add_filter( 'pre_set_site_transient_update_plugins', 'qubyx_ci_filter_plugin_updates' );
add_filter( 'plugins_api', 'qubyx_ci_plugins_api', 20, 3 );
add_filter( 'pre_set_site_transient_update_themes', 'qubyx_ci_filter_theme_updates' );
add_action( 'upgrader_process_complete', 'qubyx_ci_schedule_import_after_update', 10, 2 );
add_action( QUBYX_CI_DEFERRED_IMPORT_HOOK, 'qubyx_ci_run_deferred_auto_import' );
add_action( 'admin_init', 'qubyx_ci_maybe_run_pending_auto_import' );

/**
 * Add plugin update data from the private manifest.
 *
 * @param object $transient WordPress update transient.
 * @return object
 */
function qubyx_ci_filter_plugin_updates( $transient ) {
	if ( empty( $transient ) || ! is_object( $transient ) ) {
		return $transient;
	}

	$package = qubyx_ci_get_manifest_package( 'qubyx-content-importer' );
	if ( ! $package || empty( $package['version'] ) || empty( $package['download_url'] ) ) {
		return $transient;
	}

	$plugin_file = plugin_basename( QUBYX_CI_FILE );
	if ( empty( $transient->response ) || ! is_array( $transient->response ) ) {
		$transient->response = array();
	}

	if ( ! version_compare( QUBYX_CI_VERSION, $package['version'], '<' ) ) {
		unset( $transient->response[ $plugin_file ] );
		return $transient;
	}

	$transient->response[ $plugin_file ] = (object) array(
		'id'            => $package['id'] ?? 'qubyx-content-importer',
		'slug'          => 'qubyx-content-importer',
		'plugin'        => $plugin_file,
		'new_version'   => $package['version'],
		'url'           => $package['homepage'] ?? 'https://qubyx.com',
		'package'       => $package['download_url'],
		'requires'      => $package['requires'] ?? '6.0',
		'tested'        => $package['tested'] ?? '',
		'requires_php'  => $package['requires_php'] ?? '7.4',
		'last_updated'  => $package['last_updated'] ?? '',
		'icons'         => $package['icons'] ?? array(),
		'banners'       => $package['banners'] ?? array(),
	);

	return $transient;
}

/**
 * Populate plugin details modal for the private updater.
 *
 * @param false|object|array $result Existing result.
 * @param string             $action API action.
 * @param object             $args Plugin args.
 * @return false|object|array
 */
function qubyx_ci_plugins_api( $result, $action, $args ) {
	if ( 'plugin_information' !== $action || empty( $args->slug ) || 'qubyx-content-importer' !== $args->slug ) {
		return $result;
	}

	$package = qubyx_ci_get_manifest_package( 'qubyx-content-importer' );
	if ( ! $package ) {
		return $result;
	}

	return (object) array(
		'name'          => $package['name'] ?? 'Qubyx Content Importer',
		'slug'          => 'qubyx-content-importer',
		'version'       => $package['version'] ?? QUBYX_CI_VERSION,
		'author'        => $package['author'] ?? 'Qubyx',
		'homepage'      => $package['homepage'] ?? 'https://qubyx.com',
		'requires'      => $package['requires'] ?? '6.0',
		'tested'        => $package['tested'] ?? '',
		'requires_php'  => $package['requires_php'] ?? '7.4',
		'last_updated'  => $package['last_updated'] ?? '',
		'download_link' => $package['download_url'] ?? '',
		'sections'      => $package['sections'] ?? array(
			'description' => __( 'Imports and updates Qubyx website content, taxonomies, menus, and SEO metadata.', 'qubyx-content-importer' ),
			'changelog'   => __( 'See the Qubyx update manifest for release notes.', 'qubyx-content-importer' ),
		),
	);
}

/**
 * Add theme update data from the private manifest.
 *
 * @param object $transient WordPress theme update transient.
 * @return object
 */
function qubyx_ci_filter_theme_updates( $transient ) {
	if ( empty( $transient ) || ! is_object( $transient ) ) {
		return $transient;
	}

	$package = qubyx_ci_get_manifest_package( 'qubyx-theme' );
	if ( ! $package || empty( $package['version'] ) || empty( $package['download_url'] ) ) {
		return $transient;
	}

	$theme = wp_get_theme( QUBYX_CI_THEME_STYLESHEET );
	if ( ! $theme->exists() ) {
		return $transient;
	}

	$current = $theme->get( 'Version' );
	if ( empty( $transient->response ) || ! is_array( $transient->response ) ) {
		$transient->response = array();
	}

	if ( ! version_compare( $current, $package['version'], '<' ) ) {
		unset( $transient->response[ QUBYX_CI_THEME_STYLESHEET ] );
		return $transient;
	}

	$transient->response[ QUBYX_CI_THEME_STYLESHEET ] = array(
		'theme'        => QUBYX_CI_THEME_STYLESHEET,
		'new_version'  => $package['version'],
		'url'          => $package['homepage'] ?? 'https://qubyx.com',
		'package'      => $package['download_url'],
		'requires'     => $package['requires'] ?? '6.0',
		'requires_php' => $package['requires_php'] ?? '7.4',
	);

	return $transient;
}

/**
 * Fetch one package entry from the update manifest.
 *
 * @param string $package_id Package ID.
 * @return array|null
 */
function qubyx_ci_get_manifest_package( $package_id ) {
	$manifest = qubyx_ci_get_update_manifest();
	if ( empty( $manifest['packages'] ) || ! is_array( $manifest['packages'] ) ) {
		return null;
	}

	if ( isset( $manifest['packages'][ $package_id ] ) && is_array( $manifest['packages'][ $package_id ] ) ) {
		return $manifest['packages'][ $package_id ];
	}

	foreach ( $manifest['packages'] as $package ) {
		if ( is_array( $package ) && ( $package['id'] ?? '' ) === $package_id ) {
			return $package;
		}
	}

	return null;
}

/**
 * Fetch and cache the update manifest.
 *
 * @return array
 */
function qubyx_ci_get_update_manifest() {
	$cached = get_site_transient( QUBYX_CI_UPDATE_CACHE_KEY );
	if ( is_array( $cached ) ) {
		return $cached;
	}

	$settings = function_exists( 'qubyx_ci_get_settings' ) ? qubyx_ci_get_settings() : array();
	$endpoint = $settings['update_endpoint'] ?? QUBYX_CI_UPDATE_ENDPOINT;
	$endpoint = apply_filters( 'qubyx_ci_update_endpoint', $endpoint );

	if ( empty( $endpoint ) ) {
		return array();
	}

	$response = wp_remote_get(
		$endpoint,
		array(
			'timeout' => 12,
			'headers' => array(
				'Accept'        => 'application/json',
				'X-Qubyx-Site'  => home_url( '/' ),
				'X-Qubyx-Agent' => 'qubyx-content-importer/' . QUBYX_CI_VERSION,
			),
		)
	);

	if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
		set_site_transient( QUBYX_CI_UPDATE_CACHE_KEY, array(), 30 * MINUTE_IN_SECONDS );
		return array();
	}

	$manifest = json_decode( wp_remote_retrieve_body( $response ), true );
	if ( ! is_array( $manifest ) ) {
		$manifest = array();
	}

	set_site_transient( QUBYX_CI_UPDATE_CACHE_KEY, $manifest, 6 * HOUR_IN_SECONDS );
	return $manifest;
}

/**
 * Clear cached update data.
 */
function qubyx_ci_clear_update_cache() {
	delete_site_transient( QUBYX_CI_UPDATE_CACHE_KEY );
	delete_site_transient( 'update_plugins' );
	delete_site_transient( 'update_themes' );
}

/**
 * Schedule a content import after Qubyx code updates.
 *
 * @param WP_Upgrader $upgrader Upgrader instance.
 * @param array       $options Upgrader options.
 */
function qubyx_ci_schedule_import_after_update( $upgrader, $options ) {
	unset( $upgrader );

	$settings = function_exists( 'qubyx_ci_get_settings' ) ? qubyx_ci_get_settings() : array();
	if ( empty( $settings['auto_import_after_update'] ) ) {
		return;
	}

	$action = $options['action'] ?? '';
	$type   = $options['type'] ?? '';
	if ( 'update' !== $action || ! in_array( $type, array( 'plugin', 'theme' ), true ) ) {
		return;
	}

	$did_update_q = false;
	if ( 'plugin' === $type ) {
		$plugins = $options['plugins'] ?? array();
		$did_update_q = in_array( plugin_basename( QUBYX_CI_FILE ), $plugins, true );
	}

	if ( 'theme' === $type ) {
		$themes = $options['themes'] ?? array();
		$did_update_q = in_array( QUBYX_CI_THEME_STYLESHEET, $themes, true );
	}

	if ( ! $did_update_q ) {
		return;
	}

	update_option( 'qubyx_ci_pending_auto_import', current_time( 'mysql' ), false );
	qubyx_ci_clear_update_cache();

	if ( ! wp_next_scheduled( QUBYX_CI_DEFERRED_IMPORT_HOOK ) ) {
		wp_schedule_single_event( time() + 30, QUBYX_CI_DEFERRED_IMPORT_HOOK );
	}
}

/**
 * Run a pending auto import on admin load if WP-Cron has not fired yet.
 */
function qubyx_ci_maybe_run_pending_auto_import() {
	if ( ! get_option( 'qubyx_ci_pending_auto_import' ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}

	qubyx_ci_run_deferred_auto_import();
}

/**
 * Run the importer after an update.
 */
function qubyx_ci_run_deferred_auto_import() {
	if ( ! get_option( 'qubyx_ci_pending_auto_import' ) ) {
		return;
	}

	delete_option( 'qubyx_ci_pending_auto_import' );

	if ( function_exists( 'qubyx_ci_run_import' ) ) {
		$result = qubyx_ci_run_import();
		update_option(
			'qubyx_ci_last_auto_import',
			array(
				'ran_at' => current_time( 'mysql' ),
				'result' => $result,
			),
			false
		);
	}
}
