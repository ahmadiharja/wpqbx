<?php
/**
 * Plugin Name: Qubyx Content Importer
 * Plugin URI: https://qubyx.com
 * Description: Seeds the Qubyx enterprise website content, menus, products, resources, posts, and WPML-ready strings.
 * Version: 1.0.0
 * Author: Qubyx
 * Author URI: https://qubyx.com
 * Text Domain: qubyx-content-importer
 * Domain Path: /languages
 * Update URI: https://updates.qubyx.com/qubyx-content-importer
 *
 * @package QubyxContentImporter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'QUBYX_CI_VERSION', '1.0.0' );
define( 'QUBYX_CI_DIR', plugin_dir_path( __FILE__ ) );
define( 'QUBYX_CI_FILE', __FILE__ );
define( 'QUBYX_CI_WPML_CONTEXT', 'Qubyx Content Importer' );
define( 'QUBYX_CI_UPDATE_ENDPOINT', 'https://updates.qubyx.com/manifest.json' );

require_once QUBYX_CI_DIR . 'inc/content-data.php';
require_once QUBYX_CI_DIR . 'inc/updater.php';

add_action( 'plugins_loaded', 'qubyx_ci_load_textdomain' );
add_action( 'admin_menu', 'qubyx_ci_admin_menu' );
add_action( 'admin_init', 'qubyx_ci_register_wpml_strings' );
add_action( 'admin_init', 'qubyx_ci_register_settings' );
add_action( 'admin_post_qubyx_ci_import', 'qubyx_ci_handle_import' );

/**
 * Load plugin translations.
 */
function qubyx_ci_load_textdomain() {
	load_plugin_textdomain( 'qubyx-content-importer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Add the importer screen.
 */
function qubyx_ci_admin_menu() {
	add_menu_page(
		__( 'Qubyx Content Importer', 'qubyx-content-importer' ),
		__( 'QUBYX', 'qubyx-content-importer' ),
		'manage_options',
		'qubyx-content-importer',
		'qubyx_ci_render_admin_page',
		'dashicons-screenoptions',
		3
	);

	add_submenu_page(
		'qubyx-content-importer',
		__( 'Qubyx Content Importer', 'qubyx-content-importer' ),
		__( 'Importer', 'qubyx-content-importer' ),
		'manage_options',
		'qubyx-content-importer',
		'qubyx_ci_render_admin_page'
	);
}

/**
 * Render importer UI.
 */
function qubyx_ci_render_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$last_import = get_option( 'qubyx_ci_last_import' );
	$settings    = qubyx_ci_get_settings();
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Qubyx Content Importer', 'qubyx-content-importer' ); ?></h1>
		<p><?php esc_html_e( 'Create or update the enterprise Qubyx website seed content. The importer is idempotent and stores content in WordPress posts, pages, custom post types, terms, menus, and post meta.', 'qubyx-content-importer' ); ?></p>
		<?php if ( $last_import ) : ?>
			<div class="notice notice-info inline">
				<p>
					<?php
					printf(
						/* translators: %s: import date. */
						esc_html__( 'Last import: %s', 'qubyx-content-importer' ),
						esc_html( $last_import )
					);
					?>
				</p>
			</div>
		<?php endif; ?>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="qubyx_ci_import" />
			<?php wp_nonce_field( 'qubyx_ci_import', 'qubyx_ci_nonce' ); ?>
			<?php submit_button( __( 'Import or Update Qubyx Content', 'qubyx-content-importer' ), 'primary large' ); ?>
		</form>
		<p class="description"><?php esc_html_e( 'WPML String Translation users: strings are registered under the "Qubyx Content Importer" context before import. For page and ACF translations, use WPML post translation and ACFML.', 'qubyx-content-importer' ); ?></p>

		<hr />
		<h2><?php esc_html_e( 'Automatic Updates', 'qubyx-content-importer' ); ?></h2>
		<p><?php esc_html_e( 'The importer can receive private theme/plugin updates from the Qubyx update server, then run the content sync after a successful code update.', 'qubyx-content-importer' ); ?></p>
		<form method="post" action="options.php">
			<?php settings_fields( 'qubyx_ci_settings' ); ?>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><label for="qubyx_ci_update_endpoint"><?php esc_html_e( 'Update manifest URL', 'qubyx-content-importer' ); ?></label></th>
					<td>
						<input class="regular-text code" type="url" id="qubyx_ci_update_endpoint" name="qubyx_ci_settings[update_endpoint]" value="<?php echo esc_attr( $settings['update_endpoint'] ); ?>" />
						<p class="description"><?php esc_html_e( 'Cloudflare Worker endpoint that returns the latest Qubyx theme and importer package metadata.', 'qubyx-content-importer' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Post-update content sync', 'qubyx-content-importer' ); ?></th>
					<td>
						<label>
							<input type="checkbox" name="qubyx_ci_settings[auto_import_after_update]" value="1" <?php checked( $settings['auto_import_after_update'] ); ?> />
							<?php esc_html_e( 'Run the importer automatically after Qubyx theme or plugin updates.', 'qubyx-content-importer' ); ?>
						</label>
					</td>
				</tr>
			</table>
			<?php submit_button( __( 'Save Update Settings', 'qubyx-content-importer' ) ); ?>
		</form>
	</div>
	<?php
}

/**
 * Register importer/updater settings.
 */
function qubyx_ci_register_settings() {
	register_setting(
		'qubyx_ci_settings',
		'qubyx_ci_settings',
		array(
			'type'              => 'array',
			'sanitize_callback' => 'qubyx_ci_sanitize_settings',
			'default'           => qubyx_ci_default_settings(),
		)
	);
}

/**
 * Default settings.
 *
 * @return array
 */
function qubyx_ci_default_settings() {
	return array(
		'update_endpoint'          => QUBYX_CI_UPDATE_ENDPOINT,
		'auto_import_after_update' => 1,
	);
}

/**
 * Read settings with defaults.
 *
 * @return array
 */
function qubyx_ci_get_settings() {
	$saved = get_option( 'qubyx_ci_settings', array() );
	return wp_parse_args( is_array( $saved ) ? $saved : array(), qubyx_ci_default_settings() );
}

/**
 * Sanitize settings.
 *
 * @param array $settings Raw settings.
 * @return array
 */
function qubyx_ci_sanitize_settings( $settings ) {
	$settings = is_array( $settings ) ? $settings : array();

	return array(
		'update_endpoint'          => esc_url_raw( $settings['update_endpoint'] ?? QUBYX_CI_UPDATE_ENDPOINT ),
		'auto_import_after_update' => empty( $settings['auto_import_after_update'] ) ? 0 : 1,
	);
}

/**
 * Handle import action.
 */
function qubyx_ci_handle_import() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to import content.', 'qubyx-content-importer' ) );
	}

	check_admin_referer( 'qubyx_ci_import', 'qubyx_ci_nonce' );

	$result = qubyx_ci_run_import();
	$url    = add_query_arg(
		array(
			'page'       => 'qubyx-content-importer',
			'imported'   => 1,
			'posts'      => (int) $result['posts'],
			'terms'      => (int) $result['terms'],
			'menu_items' => (int) $result['menu_items'],
		),
		admin_url( 'tools.php' )
	);

	wp_safe_redirect( $url );
	exit;
}

/**
 * Register all seed strings with WPML String Translation.
 */
function qubyx_ci_register_wpml_strings() {
	if ( ! function_exists( 'qubyx_ci_content_data' ) ) {
		return;
	}

	qubyx_ci_walk_translatable_strings(
		qubyx_ci_content_data(),
		'seed',
		function ( $name, $value ) {
			do_action( 'wpml_register_single_string', QUBYX_CI_WPML_CONTEXT, $name, $value );
		}
	);
}

/**
 * Run the full import.
 *
 * @return array Import counts.
 */
function qubyx_ci_run_import() {
	$data   = qubyx_ci_translate_dataset( qubyx_ci_content_data() );
	$result = array(
		'posts'      => 0,
		'terms'      => 0,
		'menu_items' => 0,
	);

	$term_ids = qubyx_ci_import_terms( $data['terms'] ?? array() );
	$result['terms'] = count( $term_ids );

	$post_ids = array();

	foreach ( $data['pages'] ?? array() as $key => $page ) {
		$post_ids[ $key ] = qubyx_ci_upsert_post( 'page', $key, $page, $post_ids );
		$result['posts']++;
	}

	foreach ( $data['products'] ?? array() as $key => $product ) {
		$post_ids[ $key ] = qubyx_ci_upsert_post( 'product', $key, $product, $post_ids );
		qubyx_ci_set_terms( $post_ids[ $key ], $product['terms'] ?? array() );
		$result['posts']++;
	}

	foreach ( $data['resources'] ?? array() as $key => $resource ) {
		$post_ids[ $key ] = qubyx_ci_upsert_post( 'resource', $key, $resource, $post_ids );
		qubyx_ci_set_terms( $post_ids[ $key ], $resource['terms'] ?? array() );
		$result['posts']++;
	}

	foreach ( $data['posts'] ?? array() as $key => $post ) {
		$post_ids[ $key ] = qubyx_ci_upsert_post( 'post', $key, $post, $post_ids );
		qubyx_ci_set_terms( $post_ids[ $key ], $post['terms'] ?? array() );
		$result['posts']++;
	}

	qubyx_ci_set_site_pages( $post_ids );
	$result['menu_items'] = qubyx_ci_import_menus( $data['menus'] ?? array() );

	update_option( 'qubyx_ci_last_import', current_time( 'mysql' ) );
	flush_rewrite_rules();

	return $result;
}

/**
 * Create or update a seeded post.
 *
 * @param string $post_type Post type.
 * @param string $key Seed key.
 * @param array  $item Post data.
 * @param array  $post_ids Already-created seed IDs.
 * @return int
 */
function qubyx_ci_upsert_post( $post_type, $key, $item, $post_ids = array() ) {
	$existing = qubyx_ci_get_seeded_post_id( $key, $post_type );
	$parent   = 0;

	if ( ! empty( $item['parent'] ) && ! empty( $post_ids[ $item['parent'] ] ) ) {
		$parent = (int) $post_ids[ $item['parent'] ];
	}

	$postarr = array(
		'ID'           => $existing,
		'post_type'    => $post_type,
		'post_status'  => $item['post_status'] ?? 'publish',
		'post_title'   => $item['post_title'] ?? '',
		'post_name'    => $item['post_name'] ?? sanitize_title( $item['post_title'] ?? $key ),
		'post_excerpt' => $item['post_excerpt'] ?? '',
		'post_content' => $item['post_content'] ?? '',
		'menu_order'   => isset( $item['menu_order'] ) ? (int) $item['menu_order'] : 0,
		'post_parent'  => $parent,
	);

	$post_id = $existing ? wp_update_post( $postarr, true ) : wp_insert_post( $postarr, true );

	if ( is_wp_error( $post_id ) ) {
		return 0;
	}

	update_post_meta( $post_id, '_qubyx_seed_key', $key );

	foreach ( $item['meta'] ?? array() as $meta_key => $meta_value ) {
		qubyx_ci_update_meta( $post_id, $meta_key, $meta_value );
	}

	qubyx_ci_update_seo_meta( $post_id, $item );

	return (int) $post_id;
}

/**
 * Find an existing seeded post.
 */
function qubyx_ci_get_seeded_post_id( $key, $post_type ) {
	$query = new WP_Query(
		array(
			'post_type'              => $post_type,
			'post_status'            => 'any',
			'fields'                 => 'ids',
			'posts_per_page'         => 1,
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'meta_key'               => '_qubyx_seed_key',
			'meta_value'             => $key,
		)
	);

	if ( ! empty( $query->posts[0] ) ) {
		return (int) $query->posts[0];
	}

	return 0;
}

/**
 * Update ACF/post meta with a value.
 */
function qubyx_ci_update_meta( $post_id, $key, $value ) {
	if ( function_exists( 'update_field' ) ) {
		update_field( $key, $value, $post_id );
	}

	update_post_meta( $post_id, $key, $value );
}

/**
 * Seed common SEO plugin meta fields.
 */
function qubyx_ci_update_seo_meta( $post_id, $item ) {
	$title       = $item['seo_title'] ?? ( ( $item['post_title'] ?? '' ) . ' | QUBYX' );
	$description = $item['seo_description'] ?? ( $item['post_excerpt'] ?? '' );

	if ( $title ) {
		update_post_meta( $post_id, '_qubyx_meta_title', $title );
		update_post_meta( $post_id, '_yoast_wpseo_title', $title );
		update_post_meta( $post_id, 'rank_math_title', $title );
	}

	if ( $description ) {
		update_post_meta( $post_id, '_qubyx_meta_description', $description );
		update_post_meta( $post_id, '_yoast_wpseo_metadesc', $description );
		update_post_meta( $post_id, 'rank_math_description', $description );
	}
}

/**
 * Import terms.
 */
function qubyx_ci_import_terms( $terms_by_taxonomy ) {
	$term_ids = array();

	foreach ( $terms_by_taxonomy as $taxonomy => $terms ) {
		foreach ( $terms as $term ) {
			if ( ! taxonomy_exists( $taxonomy ) ) {
				continue;
			}

			$existing = get_term_by( 'slug', $term['slug'], $taxonomy );
			if ( $existing ) {
				$term_id = (int) $existing->term_id;
				wp_update_term(
					$term_id,
					$taxonomy,
					array(
						'name'        => $term['name'],
						'description' => $term['description'] ?? '',
					)
				);
			} else {
				$created = wp_insert_term(
					$term['name'],
					$taxonomy,
					array(
						'slug'        => $term['slug'],
						'description' => $term['description'] ?? '',
					)
				);
				$term_id = is_wp_error( $created ) ? 0 : (int) $created['term_id'];
			}

			if ( $term_id ) {
				$term_ids[] = $term_id;
			}
		}
	}

	return $term_ids;
}

/**
 * Assign terms to a post.
 */
function qubyx_ci_set_terms( $post_id, $terms_by_taxonomy ) {
	foreach ( $terms_by_taxonomy as $taxonomy => $slugs ) {
		if ( taxonomy_exists( $taxonomy ) ) {
			wp_set_object_terms( $post_id, $slugs, $taxonomy, false );
		}
	}
}

/**
 * Configure front page and posts page.
 */
function qubyx_ci_set_site_pages( $post_ids ) {
	if ( ! empty( $post_ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', (int) $post_ids['home'] );
	}

	if ( ! empty( $post_ids['blog'] ) ) {
		update_option( 'page_for_posts', (int) $post_ids['blog'] );
	}
}

/**
 * Import primary and footer menus.
 */
function qubyx_ci_import_menus( $menus ) {
	$count = 0;

	foreach ( $menus as $location => $menu ) {
		$menu_id = qubyx_ci_get_or_create_menu( $menu['name'] );
		$parents = array();

		foreach ( $menu['items'] as $item ) {
			$parent_id = 0;
			if ( ! empty( $item['parent'] ) && ! empty( $parents[ $item['parent'] ] ) ) {
				$parent_id = $parents[ $item['parent'] ];
			}

			$item_id = qubyx_ci_add_menu_link( $menu_id, $item['title'], $item['url'], $parent_id );
			if ( ! empty( $item['key'] ) ) {
				$parents[ $item['key'] ] = $item_id;
			}
			$count++;
		}

		$locations = get_theme_mod( 'nav_menu_locations', array() );
		$locations[ $location ] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}

	return $count;
}

/**
 * Get or create a menu.
 */
function qubyx_ci_get_or_create_menu( $name ) {
	$menu = wp_get_nav_menu_object( $name );
	if ( $menu ) {
		return (int) $menu->term_id;
	}

	return (int) wp_create_nav_menu( $name );
}

/**
 * Add a custom-link menu item if it does not already exist.
 */
function qubyx_ci_add_menu_link( $menu_id, $title, $url, $parent_id = 0 ) {
	$url = qubyx_ci_normalize_url( $url );

	$items = wp_get_nav_menu_items( $menu_id, array( 'post_status' => 'any' ) );
	foreach ( $items ?: array() as $item ) {
		if ( (int) $item->menu_item_parent === (int) $parent_id && $item->url === $url ) {
			if ( $item->title !== $title ) {
				wp_update_nav_menu_item(
					$menu_id,
					$item->ID,
					array(
						'menu-item-title'     => $title,
						'menu-item-url'       => $url,
						'menu-item-status'    => 'publish',
						'menu-item-type'      => 'custom',
						'menu-item-parent-id' => $parent_id,
					)
				);
			}
			return (int) $item->ID;
		}
	}

	return (int) wp_update_nav_menu_item(
		$menu_id,
		0,
		array(
			'menu-item-title'     => $title,
			'menu-item-url'       => $url,
			'menu-item-status'    => 'publish',
			'menu-item-type'      => 'custom',
			'menu-item-parent-id' => $parent_id,
		)
	);
}

/**
 * Normalize relative URLs.
 */
function qubyx_ci_normalize_url( $url ) {
	if ( 0 === strpos( $url, 'http://' ) || 0 === strpos( $url, 'https://' ) || '#' === $url ) {
		return $url;
	}

	return home_url( $url );
}

/**
 * Recursively register strings, skipping technical keys.
 */
function qubyx_ci_walk_translatable_strings( $value, $path, $callback, $key = '' ) {
	if ( is_array( $value ) ) {
		foreach ( $value as $child_key => $child_value ) {
			qubyx_ci_walk_translatable_strings( $child_value, $path . '.' . $child_key, $callback, (string) $child_key );
		}
		return;
	}

	if ( is_string( $value ) && qubyx_ci_is_translatable_key( $key, $value ) ) {
		$callback( $path, $value );
	}
}

/**
 * Translate a full dataset with WPML String Translation when available.
 */
function qubyx_ci_translate_dataset( $value, $path = 'seed', $key = '' ) {
	if ( is_array( $value ) ) {
		$translated = array();
		foreach ( $value as $child_key => $child_value ) {
			$translated[ $child_key ] = qubyx_ci_translate_dataset( $child_value, $path . '.' . $child_key, (string) $child_key );
		}
		return $translated;
	}

	if ( is_string( $value ) && qubyx_ci_is_translatable_key( $key, $value ) ) {
		do_action( 'wpml_register_single_string', QUBYX_CI_WPML_CONTEXT, $path, $value );
		return apply_filters( 'wpml_translate_single_string', $value, QUBYX_CI_WPML_CONTEXT, $path );
	}

	return $value;
}

/**
 * Avoid translating slugs, URLs, and technical values.
 */
function qubyx_ci_is_translatable_key( $key, $value ) {
	$skip = array(
		'post_name',
		'slug',
		'url',
		'href',
		'target',
		'type',
		'post_type',
		'post_status',
		'parent',
		'key',
		'span',
		'taxonomy',
	);

	if ( in_array( $key, $skip, true ) ) {
		return false;
	}

	if ( preg_match( '#^(https?:)?//#', $value ) ) {
		return false;
	}

	if ( preg_match( '#^/[a-z0-9/_-]+/?$#', $value ) ) {
		return false;
	}

	return '' !== trim( $value );
}
