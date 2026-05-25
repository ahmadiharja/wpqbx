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
define( 'QUBYX_CI_URL', plugin_dir_url( __FILE__ ) );
define( 'QUBYX_CI_FILE', __FILE__ );
define( 'QUBYX_CI_WPML_CONTEXT', 'Qubyx Content Importer' );
define( 'QUBYX_CI_UPDATE_ENDPOINT', 'https://updates.qubyx.com/manifest.json' );

require_once QUBYX_CI_DIR . 'inc/content-data.php';
require_once QUBYX_CI_DIR . 'inc/updater.php';

add_action( 'plugins_loaded', 'qubyx_ci_load_textdomain' );
add_action( 'admin_menu', 'qubyx_ci_admin_menu' );
add_action( 'admin_enqueue_scripts', 'qubyx_ci_admin_assets' );
add_action( 'admin_init', 'qubyx_ci_register_wpml_strings' );
add_action( 'admin_init', 'qubyx_ci_register_settings' );
add_action( 'admin_post_qubyx_ci_import', 'qubyx_ci_handle_import' );
add_action( 'wp_ajax_qubyx_ci_ai_generate', 'qubyx_ci_ajax_ai_generate' );

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
		__( 'Qubyx Dashboard', 'qubyx-content-importer' ),
		__( 'QUBYX', 'qubyx-content-importer' ),
		'manage_options',
		'qubyx-dashboard',
		'qubyx_ci_render_dashboard_page',
		'dashicons-screenoptions',
		3
	);

	add_submenu_page(
		'qubyx-dashboard',
		__( 'Qubyx Dashboard', 'qubyx-content-importer' ),
		__( 'Dashboard', 'qubyx-content-importer' ),
		'manage_options',
		'qubyx-dashboard',
		'qubyx_ci_render_dashboard_page'
	);

	add_submenu_page(
		'qubyx-dashboard',
		__( 'Qubyx Importer', 'qubyx-content-importer' ),
		__( 'Importer', 'qubyx-content-importer' ),
		'manage_options',
		'qubyx-content-importer',
		'qubyx_ci_render_importer_page'
	);

	add_submenu_page(
		'qubyx-dashboard',
		__( 'Qubyx Content', 'qubyx-content-importer' ),
		__( 'Content', 'qubyx-content-importer' ),
		'manage_options',
		'qubyx-content',
		'qubyx_ci_render_content_page'
	);

	add_submenu_page(
		'qubyx-dashboard',
		__( 'Qubyx AI Writer', 'qubyx-content-importer' ),
		__( 'AI Writer', 'qubyx-content-importer' ),
		'manage_options',
		'qubyx-ai-writer',
		'qubyx_ci_render_ai_writer_page'
	);

	add_submenu_page(
		'qubyx-dashboard',
		__( 'Qubyx Updates', 'qubyx-content-importer' ),
		__( 'Updates', 'qubyx-content-importer' ),
		'manage_options',
		'qubyx-updates',
		'qubyx_ci_render_updates_page'
	);

	add_submenu_page(
		'qubyx-dashboard',
		__( 'Qubyx Settings', 'qubyx-content-importer' ),
		__( 'Settings', 'qubyx-content-importer' ),
		'manage_options',
		'qubyx-settings',
		'qubyx_ci_render_settings_page'
	);

	add_submenu_page(
		'qubyx-dashboard',
		__( 'Qubyx System', 'qubyx-content-importer' ),
		__( 'System', 'qubyx-content-importer' ),
		'manage_options',
		'qubyx-system',
		'qubyx_ci_render_system_page'
	);
}

/**
 * Load Qubyx admin assets.
 *
 * @param string $hook Current admin hook.
 */
function qubyx_ci_admin_assets( $hook ) {
	if ( false === strpos( $hook, 'qubyx' ) ) {
		return;
	}

	wp_enqueue_style(
		'qubyx-ci-admin',
		QUBYX_CI_URL . 'assets/admin.css',
		array(),
		QUBYX_CI_VERSION
	);

	wp_enqueue_script(
		'qubyx-ci-admin',
		QUBYX_CI_URL . 'assets/admin.js',
		array(),
		QUBYX_CI_VERSION,
		true
	);

	wp_localize_script(
		'qubyx-ci-admin',
		'QubyxCI',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'qubyx_ci_ai' ),
			'i18n'    => array(
				'generating' => __( 'Researching and drafting...', 'qubyx-content-importer' ),
				'error'      => __( 'The AI request could not be completed.', 'qubyx-content-importer' ),
			),
		)
	);
}

/**
 * Render the main dashboard.
 */
function qubyx_ci_render_dashboard_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$last_import = get_option( 'qubyx_ci_last_import' );
	$counts      = qubyx_ci_get_content_counts();
	$theme       = wp_get_theme();

	qubyx_ci_admin_header(
		'dashboard',
		__( 'QUBYX Dashboard', 'qubyx-content-importer' ),
		__( 'Manage the QUBYX WordPress system from one premium control surface.', 'qubyx-content-importer' )
	);
	?>
	<div class="qubyx-grid qubyx-grid--stats">
		<?php qubyx_ci_metric_card( __( 'Pages', 'qubyx-content-importer' ), $counts['pages'], __( 'Seeded landing and support pages.', 'qubyx-content-importer' ) ); ?>
		<?php qubyx_ci_metric_card( __( 'Products', 'qubyx-content-importer' ), $counts['products'], __( 'QUBYX product CPT entries.', 'qubyx-content-importer' ) ); ?>
		<?php qubyx_ci_metric_card( __( 'Resources', 'qubyx-content-importer' ), $counts['resources'], __( 'Guides, news, updates, and blog articles.', 'qubyx-content-importer' ) ); ?>
		<?php qubyx_ci_metric_card( __( 'Terms', 'qubyx-content-importer' ), $counts['terms'], __( 'Resource and product taxonomy terms.', 'qubyx-content-importer' ) ); ?>
	</div>

	<div class="qubyx-grid qubyx-grid--main">
		<section class="qubyx-panel qubyx-panel--hero">
			<div>
				<p class="qubyx-kicker"><?php esc_html_e( 'Site control', 'qubyx-content-importer' ); ?></p>
				<h2><?php esc_html_e( 'Keep the QUBYX website synced, structured, and ready to update.', 'qubyx-content-importer' ); ?></h2>
				<p><?php esc_html_e( 'Run the importer, review generated content, and manage private update settings without leaving the QUBYX admin area.', 'qubyx-content-importer' ); ?></p>
			</div>
			<div class="qubyx-actions">
				<a class="qubyx-button qubyx-button--primary" href="<?php echo esc_url( admin_url( 'admin.php?page=qubyx-content-importer' ) ); ?>"><?php esc_html_e( 'Open Importer', 'qubyx-content-importer' ); ?></a>
				<a class="qubyx-button" href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'View Site', 'qubyx-content-importer' ); ?></a>
			</div>
		</section>

		<section class="qubyx-panel">
			<h2><?php esc_html_e( 'System Status', 'qubyx-content-importer' ); ?></h2>
			<ul class="qubyx-status-list">
				<?php qubyx_ci_status_item( __( 'Theme', 'qubyx-content-importer' ), $theme->get( 'Name' ) . ' ' . $theme->get( 'Version' ), 'good' ); ?>
				<?php qubyx_ci_status_item( __( 'Importer', 'qubyx-content-importer' ), QUBYX_CI_VERSION, 'good' ); ?>
				<?php qubyx_ci_status_item( __( 'ACF', 'qubyx-content-importer' ), function_exists( 'acf_add_local_field_group' ) ? __( 'Active', 'qubyx-content-importer' ) : __( 'Not active', 'qubyx-content-importer' ), function_exists( 'acf_add_local_field_group' ) ? 'good' : 'warn' ); ?>
				<?php qubyx_ci_status_item( __( 'Last import', 'qubyx-content-importer' ), $last_import ? $last_import : __( 'Not yet recorded', 'qubyx-content-importer' ), $last_import ? 'good' : 'warn' ); ?>
			</ul>
		</section>
	</div>
	<?php
	qubyx_ci_admin_footer();
}

/**
 * Render importer UI.
 */
function qubyx_ci_render_importer_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$last_import = get_option( 'qubyx_ci_last_import' );
	qubyx_ci_admin_header(
		'importer',
		__( 'Content Importer', 'qubyx-content-importer' ),
		__( 'Create or update pages, resources, products, taxonomies, menus, and SEO metadata.', 'qubyx-content-importer' )
	);
	qubyx_ci_import_notice();
	?>
	<div class="qubyx-grid qubyx-grid--main">
		<section class="qubyx-panel qubyx-panel--hero">
			<div>
				<p class="qubyx-kicker"><?php esc_html_e( 'Idempotent import', 'qubyx-content-importer' ); ?></p>
				<h2><?php esc_html_e( 'Sync the QUBYX content model into WordPress.', 'qubyx-content-importer' ); ?></h2>
				<p><?php esc_html_e( 'The importer updates seeded content by key, so it can be run repeatedly during development and after private code updates.', 'qubyx-content-importer' ); ?></p>
				<?php if ( $last_import ) : ?>
					<p class="qubyx-muted">
						<?php
						printf(
							/* translators: %s: import date. */
							esc_html__( 'Last import: %s', 'qubyx-content-importer' ),
							esc_html( $last_import )
						);
						?>
					</p>
				<?php endif; ?>
			</div>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="qubyx_ci_import" />
				<?php wp_nonce_field( 'qubyx_ci_import', 'qubyx_ci_nonce' ); ?>
				<button class="qubyx-button qubyx-button--primary qubyx-button--large" type="submit"><?php esc_html_e( 'Import or Update Content', 'qubyx-content-importer' ); ?></button>
			</form>
		</section>

		<section class="qubyx-panel">
			<h2><?php esc_html_e( 'What gets synced', 'qubyx-content-importer' ); ?></h2>
			<ul class="qubyx-check-list">
				<li><?php esc_html_e( 'Pages and landing-page content.', 'qubyx-content-importer' ); ?></li>
				<li><?php esc_html_e( 'Product and Resource custom post type entries.', 'qubyx-content-importer' ); ?></li>
				<li><?php esc_html_e( 'Resource and product categories.', 'qubyx-content-importer' ); ?></li>
				<li><?php esc_html_e( 'Primary/footer menus and internal links.', 'qubyx-content-importer' ); ?></li>
				<li><?php esc_html_e( 'Yoast and Rank Math compatible SEO meta.', 'qubyx-content-importer' ); ?></li>
			</ul>
		</section>
	</div>
	<?php
	qubyx_ci_admin_footer();
}

/**
 * Render content overview.
 */
function qubyx_ci_render_content_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$counts = qubyx_ci_get_content_counts();
	qubyx_ci_admin_header(
		'content',
		__( 'Content', 'qubyx-content-importer' ),
		__( 'Review the WordPress content surface generated for QUBYX.', 'qubyx-content-importer' )
	);
	?>
	<div class="qubyx-grid qubyx-grid--cards">
		<?php qubyx_ci_link_card( __( 'Pages', 'qubyx-content-importer' ), $counts['pages'], admin_url( 'edit.php?post_type=page' ), __( 'Review imported site pages.', 'qubyx-content-importer' ) ); ?>
		<?php qubyx_ci_link_card( __( 'Products', 'qubyx-content-importer' ), $counts['products'], admin_url( 'edit.php?post_type=product' ), __( 'Manage QUBYX product entries.', 'qubyx-content-importer' ) ); ?>
		<?php qubyx_ci_link_card( __( 'Resources', 'qubyx-content-importer' ), $counts['resources'], admin_url( 'edit.php?post_type=resource' ), __( 'Manage guides, news, and blog resources.', 'qubyx-content-importer' ) ); ?>
		<?php qubyx_ci_link_card( __( 'Menus', 'qubyx-content-importer' ), __( 'Primary', 'qubyx-content-importer' ), admin_url( 'nav-menus.php' ), __( 'Review navigation imported by QUBYX.', 'qubyx-content-importer' ) ); ?>
	</div>
	<?php
	qubyx_ci_admin_footer();
}

/**
 * Render AI writer page.
 */
function qubyx_ci_render_ai_writer_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$settings = qubyx_ci_get_settings();
	$has_key  = (bool) qubyx_ci_get_openai_api_key();
	$resource_categories = qubyx_ci_get_ai_terms_for_select( 'resource_category' );
	$post_categories     = qubyx_ci_get_ai_terms_for_select( 'category' );
	qubyx_ci_admin_header(
		'ai',
		__( 'AI Writer', 'qubyx-content-importer' ),
		__( 'Research topics and create SEO-ready WordPress drafts for the QUBYX site.', 'qubyx-content-importer' )
	);
	?>
	<div class="qubyx-grid qubyx-grid--main qubyx-ai-layout">
		<section class="qubyx-panel qubyx-ai-composer">
			<div class="qubyx-ai-composer__head">
				<div>
					<p class="qubyx-kicker"><?php esc_html_e( 'Research assistant', 'qubyx-content-importer' ); ?></p>
					<h2><?php esc_html_e( 'Generate a researched article draft.', 'qubyx-content-importer' ); ?></h2>
					<p><?php esc_html_e( 'Give the assistant a topic, audience, and SEO angle. It can use web search, then save the result as a draft post or resource.', 'qubyx-content-importer' ); ?></p>
				</div>
				<span class="qubyx-ai-key-status <?php echo esc_attr( $has_key ? 'is-ready' : 'is-missing' ); ?>">
					<?php echo esc_html( $has_key ? __( 'API ready', 'qubyx-content-importer' ) : __( 'API key missing', 'qubyx-content-importer' ) ); ?>
				</span>
			</div>

			<form class="qubyx-ai-form" data-qubyx-ai-form>
				<div class="qubyx-field">
					<label for="qubyx_ai_topic"><?php esc_html_e( 'Topic or brief', 'qubyx-content-importer' ); ?></label>
					<textarea id="qubyx_ai_topic" name="topic" rows="5" required placeholder="<?php esc_attr_e( 'Example: DICOM display calibration checklist for radiology departments preparing annual QA audits.', 'qubyx-content-importer' ); ?>"></textarea>
				</div>
				<div class="qubyx-form-grid">
					<div class="qubyx-field">
						<label for="qubyx_ai_keywords"><?php esc_html_e( 'SEO keywords', 'qubyx-content-importer' ); ?></label>
						<input id="qubyx_ai_keywords" name="keywords" type="text" placeholder="<?php esc_attr_e( 'DICOM calibration, medical display QA, GSDF', 'qubyx-content-importer' ); ?>" />
					</div>
					<div class="qubyx-field">
						<label for="qubyx_ai_audience"><?php esc_html_e( 'Audience', 'qubyx-content-importer' ); ?></label>
						<input id="qubyx_ai_audience" name="audience" type="text" value="<?php esc_attr_e( 'Healthcare imaging and enterprise display QA teams', 'qubyx-content-importer' ); ?>" />
					</div>
				</div>
				<div class="qubyx-form-grid">
					<div class="qubyx-field">
						<label for="qubyx_ai_post_type"><?php esc_html_e( 'Draft type', 'qubyx-content-importer' ); ?></label>
						<select id="qubyx_ai_post_type" name="post_type">
							<option value="resource"><?php esc_html_e( 'Resource article', 'qubyx-content-importer' ); ?></option>
							<option value="post"><?php esc_html_e( 'Blog post', 'qubyx-content-importer' ); ?></option>
							<option value="page"><?php esc_html_e( 'Page draft', 'qubyx-content-importer' ); ?></option>
						</select>
					</div>
					<div class="qubyx-field">
						<label for="qubyx_ai_layout"><?php esc_html_e( 'Article layout', 'qubyx-content-importer' ); ?></label>
						<select id="qubyx_ai_layout" name="resource_layout">
							<option value="guide"><?php esc_html_e( 'Guide', 'qubyx-content-importer' ); ?></option>
							<option value="news"><?php esc_html_e( 'News / update', 'qubyx-content-importer' ); ?></option>
							<option value="blog"><?php esc_html_e( 'Blog / opinion', 'qubyx-content-importer' ); ?></option>
						</select>
					</div>
				</div>
				<div class="qubyx-form-grid">
					<div class="qubyx-field" data-qubyx-resource-category>
						<label for="qubyx_ai_resource_category"><?php esc_html_e( 'Resource category', 'qubyx-content-importer' ); ?></label>
						<select id="qubyx_ai_resource_category" name="resource_category">
							<?php foreach ( $resource_categories as $slug => $label ) : ?>
								<option value="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $label ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="qubyx-field" data-qubyx-post-category hidden>
						<label for="qubyx_ai_post_category"><?php esc_html_e( 'Post category', 'qubyx-content-importer' ); ?></label>
						<select id="qubyx_ai_post_category" name="post_category">
							<?php foreach ( $post_categories as $slug => $label ) : ?>
								<option value="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $label ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="qubyx-field">
						<label for="qubyx_ai_seo_intent"><?php esc_html_e( 'SEO intent', 'qubyx-content-importer' ); ?></label>
						<select id="qubyx_ai_seo_intent" name="seo_intent">
							<option value="informational"><?php esc_html_e( 'Informational', 'qubyx-content-importer' ); ?></option>
							<option value="commercial"><?php esc_html_e( 'Commercial evaluation', 'qubyx-content-importer' ); ?></option>
							<option value="technical"><?php esc_html_e( 'Technical / compliance', 'qubyx-content-importer' ); ?></option>
							<option value="announcement"><?php esc_html_e( 'Announcement', 'qubyx-content-importer' ); ?></option>
						</select>
					</div>
				</div>
				<div class="qubyx-form-grid">
					<div class="qubyx-field">
						<label for="qubyx_ai_language"><?php esc_html_e( 'Language', 'qubyx-content-importer' ); ?></label>
						<select id="qubyx_ai_language" name="language">
							<option value="English"><?php esc_html_e( 'English', 'qubyx-content-importer' ); ?></option>
							<option value="Indonesian"><?php esc_html_e( 'Indonesian', 'qubyx-content-importer' ); ?></option>
						</select>
					</div>
					<div class="qubyx-field">
						<label for="qubyx_ai_model"><?php esc_html_e( 'Model', 'qubyx-content-importer' ); ?></label>
						<input id="qubyx_ai_model" name="model" type="text" value="<?php echo esc_attr( $settings['openai_model'] ); ?>" />
					</div>
				</div>
				<div class="qubyx-ai-options">
					<label><input type="checkbox" name="use_web_search" value="1" <?php checked( $settings['ai_use_web_search'] ); ?> /> <?php esc_html_e( 'Use web research with citations', 'qubyx-content-importer' ); ?></label>
					<label><input type="checkbox" name="save_draft" value="1" checked /> <?php esc_html_e( 'Create WordPress draft after generation', 'qubyx-content-importer' ); ?></label>
				</div>
				<button class="qubyx-button qubyx-button--primary qubyx-button--large" type="submit" <?php disabled( ! $has_key ); ?>><?php esc_html_e( 'Generate Draft', 'qubyx-content-importer' ); ?></button>
			</form>
		</section>

		<aside class="qubyx-panel qubyx-ai-sidebar">
			<h2><?php esc_html_e( 'AI Setup', 'qubyx-content-importer' ); ?></h2>
			<ul class="qubyx-status-list">
				<?php qubyx_ci_status_item( __( 'Credential', 'qubyx-content-importer' ), $has_key ? qubyx_ci_get_openai_key_source_label() : __( 'Add a key in Settings or environment.', 'qubyx-content-importer' ), $has_key ? 'good' : 'warn' ); ?>
				<?php qubyx_ci_status_item( __( 'Default model', 'qubyx-content-importer' ), $settings['openai_model'], 'good' ); ?>
				<?php qubyx_ci_status_item( __( 'Web research', 'qubyx-content-importer' ), ! empty( $settings['ai_use_web_search'] ) ? __( 'Enabled', 'qubyx-content-importer' ) : __( 'Disabled', 'qubyx-content-importer' ), ! empty( $settings['ai_use_web_search'] ) ? 'good' : 'warn' ); ?>
			</ul>
			<a class="qubyx-button" href="<?php echo esc_url( admin_url( 'admin.php?page=qubyx-settings' ) ); ?>"><?php esc_html_e( 'Open AI Settings', 'qubyx-content-importer' ); ?></a>
		</aside>
	</div>

	<section class="qubyx-panel qubyx-ai-result" data-qubyx-ai-result hidden>
		<div class="qubyx-ai-result__head">
			<h2><?php esc_html_e( 'Generated Draft', 'qubyx-content-importer' ); ?></h2>
			<div data-qubyx-ai-actions></div>
		</div>
		<div class="qubyx-ai-result__body" data-qubyx-ai-output></div>
	</section>
	<?php
	qubyx_ci_admin_footer();
}

/**
 * Render updates page.
 */
function qubyx_ci_render_updates_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$settings = qubyx_ci_get_settings();
	$manifest = function_exists( 'qubyx_ci_get_update_manifest' ) ? qubyx_ci_get_update_manifest() : array();
	qubyx_ci_admin_header(
		'updates',
		__( 'Updates', 'qubyx-content-importer' ),
		__( 'Connect WordPress to the private QUBYX update manifest.', 'qubyx-content-importer' )
	);
	?>
	<div class="qubyx-grid qubyx-grid--main">
		<section class="qubyx-panel">
			<h2><?php esc_html_e( 'Update Channel', 'qubyx-content-importer' ); ?></h2>
			<ul class="qubyx-status-list">
				<?php qubyx_ci_status_item( __( 'Manifest URL', 'qubyx-content-importer' ), $settings['update_endpoint'], ! empty( $settings['update_endpoint'] ) ? 'good' : 'warn' ); ?>
				<?php qubyx_ci_status_item( __( 'Manifest status', 'qubyx-content-importer' ), ! empty( $manifest['packages'] ) ? __( 'Available', 'qubyx-content-importer' ) : __( 'Not available yet', 'qubyx-content-importer' ), ! empty( $manifest['packages'] ) ? 'good' : 'warn' ); ?>
				<?php qubyx_ci_status_item( __( 'Auto import', 'qubyx-content-importer' ), ! empty( $settings['auto_import_after_update'] ) ? __( 'Enabled', 'qubyx-content-importer' ) : __( 'Disabled', 'qubyx-content-importer' ), ! empty( $settings['auto_import_after_update'] ) ? 'good' : 'warn' ); ?>
			</ul>
		</section>

		<section class="qubyx-panel">
			<h2><?php esc_html_e( 'Update Settings', 'qubyx-content-importer' ); ?></h2>
			<?php qubyx_ci_render_settings_form(); ?>
		</section>
	</div>
	<?php
	qubyx_ci_admin_footer();
}

/**
 * Render settings page.
 */
function qubyx_ci_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	qubyx_ci_admin_header(
		'settings',
		__( 'Settings', 'qubyx-content-importer' ),
		__( 'Configure importer behavior and private update preferences.', 'qubyx-content-importer' )
	);
	?>
	<section class="qubyx-panel qubyx-panel--wide">
		<?php qubyx_ci_render_settings_form(); ?>
	</section>
	<?php
	qubyx_ci_admin_footer();
}

/**
 * Render system page.
 */
function qubyx_ci_render_system_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	qubyx_ci_admin_header(
		'system',
		__( 'System', 'qubyx-content-importer' ),
		__( 'Technical checks for the local QUBYX WordPress installation.', 'qubyx-content-importer' )
	);
	?>
	<section class="qubyx-panel qubyx-panel--wide">
		<h2><?php esc_html_e( 'Environment', 'qubyx-content-importer' ); ?></h2>
		<ul class="qubyx-status-list qubyx-status-list--wide">
			<?php qubyx_ci_status_item( __( 'WordPress', 'qubyx-content-importer' ), get_bloginfo( 'version' ), 'good' ); ?>
			<?php qubyx_ci_status_item( __( 'PHP', 'qubyx-content-importer' ), PHP_VERSION, version_compare( PHP_VERSION, '7.4', '>=' ) ? 'good' : 'warn' ); ?>
			<?php qubyx_ci_status_item( __( 'Theme stylesheet', 'qubyx-content-importer' ), wp_get_theme()->get_stylesheet(), 'good' ); ?>
			<?php qubyx_ci_status_item( __( 'Plugin path', 'qubyx-content-importer' ), plugin_basename( QUBYX_CI_FILE ), 'good' ); ?>
		</ul>
	</section>
	<?php
	qubyx_ci_admin_footer();
}

/**
 * Render the Qubyx admin shell header.
 *
 * @param string $active Active tab key.
 * @param string $title Page title.
 * @param string $subtitle Page subtitle.
 */
function qubyx_ci_admin_header( $active, $title, $subtitle ) {
	$tabs = qubyx_ci_admin_tabs();
	?>
	<div class="wrap qubyx-admin">
		<div class="qubyx-admin__shell">
			<header class="qubyx-admin__hero">
				<div class="qubyx-admin__brand">
					<span class="qubyx-admin__logo" aria-hidden="true">Q</span>
					<div>
						<p class="qubyx-admin__eyebrow"><?php esc_html_e( 'QUBYX WordPress Suite', 'qubyx-content-importer' ); ?></p>
						<h1><?php echo esc_html( $title ); ?></h1>
					</div>
				</div>
				<p><?php echo esc_html( $subtitle ); ?></p>
			</header>
			<nav class="qubyx-admin__tabs" aria-label="<?php esc_attr_e( 'Qubyx admin sections', 'qubyx-content-importer' ); ?>">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<a class="<?php echo esc_attr( $active === $key ? 'is-active' : '' ); ?>" href="<?php echo esc_url( $tab['url'] ); ?>">
						<span aria-hidden="true"><?php echo esc_html( $tab['icon'] ); ?></span>
						<?php echo esc_html( $tab['label'] ); ?>
					</a>
				<?php endforeach; ?>
			</nav>
			<div class="qubyx-admin__body">
	<?php
}

/**
 * Close the Qubyx admin shell.
 */
function qubyx_ci_admin_footer() {
	?>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Admin tabs used by the plugin shell.
 *
 * @return array
 */
function qubyx_ci_admin_tabs() {
	return array(
		'dashboard' => array(
			'label' => __( 'Dashboard', 'qubyx-content-importer' ),
			'icon'  => '01',
			'url'   => admin_url( 'admin.php?page=qubyx-dashboard' ),
		),
		'importer'  => array(
			'label' => __( 'Importer', 'qubyx-content-importer' ),
			'icon'  => '02',
			'url'   => admin_url( 'admin.php?page=qubyx-content-importer' ),
		),
		'content'   => array(
			'label' => __( 'Content', 'qubyx-content-importer' ),
			'icon'  => '03',
			'url'   => admin_url( 'admin.php?page=qubyx-content' ),
		),
		'ai'        => array(
			'label' => __( 'AI Writer', 'qubyx-content-importer' ),
			'icon'  => '04',
			'url'   => admin_url( 'admin.php?page=qubyx-ai-writer' ),
		),
		'updates'   => array(
			'label' => __( 'Updates', 'qubyx-content-importer' ),
			'icon'  => '05',
			'url'   => admin_url( 'admin.php?page=qubyx-updates' ),
		),
		'settings'  => array(
			'label' => __( 'Settings', 'qubyx-content-importer' ),
			'icon'  => '06',
			'url'   => admin_url( 'admin.php?page=qubyx-settings' ),
		),
		'system'    => array(
			'label' => __( 'System', 'qubyx-content-importer' ),
			'icon'  => '07',
			'url'   => admin_url( 'admin.php?page=qubyx-system' ),
		),
	);
}

/**
 * Show importer result notice.
 */
function qubyx_ci_import_notice() {
	if ( empty( $_GET['imported'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}

	$posts      = isset( $_GET['posts'] ) ? absint( $_GET['posts'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$terms      = isset( $_GET['terms'] ) ? absint( $_GET['terms'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$menu_items = isset( $_GET['menu_items'] ) ? absint( $_GET['menu_items'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	?>
	<div class="qubyx-notice">
		<strong><?php esc_html_e( 'Import complete.', 'qubyx-content-importer' ); ?></strong>
		<span>
			<?php
			printf(
				/* translators: 1: post count, 2: term count, 3: menu item count. */
				esc_html__( '%1$d content items, %2$d terms, and %3$d menu items were synced.', 'qubyx-content-importer' ),
				$posts,
				$terms,
				$menu_items
			);
			?>
		</span>
	</div>
	<?php
}

/**
 * Content counts for dashboard cards.
 *
 * @return array
 */
function qubyx_ci_get_content_counts() {
	$page_counts     = wp_count_posts( 'page' );
	$product_counts  = post_type_exists( 'product' ) ? wp_count_posts( 'product' ) : null;
	$resource_counts = post_type_exists( 'resource' ) ? wp_count_posts( 'resource' ) : null;
	$resource_terms  = taxonomy_exists( 'resource_category' ) ? wp_count_terms( 'resource_category', array( 'hide_empty' => false ) ) : 0;
	$product_terms   = taxonomy_exists( 'product_category' ) ? wp_count_terms( 'product_category', array( 'hide_empty' => false ) ) : 0;

	return array(
		'pages'     => isset( $page_counts->publish ) ? (int) $page_counts->publish : 0,
		'products'  => $product_counts && isset( $product_counts->publish ) ? (int) $product_counts->publish : 0,
		'resources' => $resource_counts && isset( $resource_counts->publish ) ? (int) $resource_counts->publish : 0,
		'terms'     => (int) $resource_terms + (int) $product_terms,
	);
}

/**
 * Render a metric card.
 *
 * @param string     $label Label.
 * @param int|string $value Value.
 * @param string     $detail Detail.
 */
function qubyx_ci_metric_card( $label, $value, $detail ) {
	?>
	<section class="qubyx-metric">
		<span><?php echo esc_html( $label ); ?></span>
		<strong><?php echo esc_html( $value ); ?></strong>
		<p><?php echo esc_html( $detail ); ?></p>
	</section>
	<?php
}

/**
 * Render a status row.
 *
 * @param string $label Label.
 * @param string $value Value.
 * @param string $state State, good or warn.
 */
function qubyx_ci_status_item( $label, $value, $state = 'good' ) {
	?>
	<li>
		<span class="qubyx-status-dot qubyx-status-dot--<?php echo esc_attr( $state ); ?>" aria-hidden="true"></span>
		<div>
			<strong><?php echo esc_html( $label ); ?></strong>
			<p><?php echo esc_html( $value ); ?></p>
		</div>
	</li>
	<?php
}

/**
 * Render a linked content card.
 *
 * @param string     $label Label.
 * @param int|string $value Value.
 * @param string     $url URL.
 * @param string     $detail Detail.
 */
function qubyx_ci_link_card( $label, $value, $url, $detail ) {
	?>
	<a class="qubyx-link-card" href="<?php echo esc_url( $url ); ?>">
		<span><?php echo esc_html( $label ); ?></span>
		<strong><?php echo esc_html( $value ); ?></strong>
		<p><?php echo esc_html( $detail ); ?></p>
	</a>
	<?php
}

/**
 * Render the Qubyx settings form.
 */
function qubyx_ci_render_settings_form() {
	$settings = qubyx_ci_get_settings();
	$has_saved_key = ! empty( $settings['openai_api_key'] );
	$has_env_key   = (bool) qubyx_ci_get_openai_api_key_from_environment();
	?>
	<form class="qubyx-form" method="post" action="options.php">
		<?php settings_fields( 'qubyx_ci_settings' ); ?>
		<h3><?php esc_html_e( 'AI Credentials', 'qubyx-content-importer' ); ?></h3>
		<div class="qubyx-field">
			<label for="qubyx_ci_openai_api_key"><?php esc_html_e( 'OpenAI API key', 'qubyx-content-importer' ); ?></label>
			<input class="regular-text code" type="password" id="qubyx_ci_openai_api_key" name="qubyx_ci_settings[openai_api_key]" value="" autocomplete="new-password" placeholder="<?php echo esc_attr( $has_saved_key ? __( 'Saved key configured. Leave blank to keep it.', 'qubyx-content-importer' ) : __( 'Uses environment key when left blank.', 'qubyx-content-importer' ) ); ?>" />
			<p>
				<?php
				echo esc_html(
					$has_saved_key
						? __( 'A WordPress-stored API key is configured. Leave this field blank to keep the existing key.', 'qubyx-content-importer' )
						: ( $has_env_key ? __( 'No WordPress key is saved. The plugin will use the local environment key.', 'qubyx-content-importer' ) : __( 'No API key is currently available. Add one here or define OPENAI_API_KEY in the environment.', 'qubyx-content-importer' ) )
				);
				?>
			</p>
		</div>
		<div class="qubyx-form-grid">
			<div class="qubyx-field">
				<label for="qubyx_ci_openai_model"><?php esc_html_e( 'Default AI model', 'qubyx-content-importer' ); ?></label>
				<input class="regular-text code" type="text" id="qubyx_ci_openai_model" name="qubyx_ci_settings[openai_model]" value="<?php echo esc_attr( $settings['openai_model'] ); ?>" />
			</div>
			<div class="qubyx-field qubyx-field--toggle">
				<label>
					<input type="checkbox" name="qubyx_ci_settings[ai_use_web_search]" value="1" <?php checked( $settings['ai_use_web_search'] ); ?> />
					<span><?php esc_html_e( 'Enable web research by default in AI Writer.', 'qubyx-content-importer' ); ?></span>
				</label>
			</div>
		</div>
		<hr />
		<h3><?php esc_html_e( 'Private Updates', 'qubyx-content-importer' ); ?></h3>
		<div class="qubyx-field">
			<label for="qubyx_ci_update_endpoint"><?php esc_html_e( 'Update manifest URL', 'qubyx-content-importer' ); ?></label>
			<input class="regular-text code" type="url" id="qubyx_ci_update_endpoint" name="qubyx_ci_settings[update_endpoint]" value="<?php echo esc_attr( $settings['update_endpoint'] ); ?>" />
			<p><?php esc_html_e( 'Cloudflare Worker endpoint that returns QUBYX theme and importer package metadata.', 'qubyx-content-importer' ); ?></p>
		</div>
		<div class="qubyx-field qubyx-field--toggle">
			<label>
				<input type="checkbox" name="qubyx_ci_settings[auto_import_after_update]" value="1" <?php checked( $settings['auto_import_after_update'] ); ?> />
				<span><?php esc_html_e( 'Run the importer automatically after QUBYX theme or plugin updates.', 'qubyx-content-importer' ); ?></span>
			</label>
		</div>
		<button class="qubyx-button qubyx-button--primary" type="submit"><?php esc_html_e( 'Save Settings', 'qubyx-content-importer' ); ?></button>
	</form>
	<?php
}

/**
 * Return the active OpenAI API key without exposing it.
 *
 * @return string
 */
function qubyx_ci_get_openai_api_key() {
	$settings = qubyx_ci_get_settings();
	if ( ! empty( $settings['openai_api_key'] ) ) {
		return (string) $settings['openai_api_key'];
	}

	return qubyx_ci_get_openai_api_key_from_environment();
}

/**
 * Read OpenAI API key from constants or environment variables.
 *
 * @return string
 */
function qubyx_ci_get_openai_api_key_from_environment() {
	if ( defined( 'QUBYX_OPENAI_API_KEY' ) && QUBYX_OPENAI_API_KEY ) {
		return (string) QUBYX_OPENAI_API_KEY;
	}

	if ( defined( 'OPENAI_API_KEY' ) && OPENAI_API_KEY ) {
		return (string) OPENAI_API_KEY;
	}

	$env_key = getenv( 'QUBYX_OPENAI_API_KEY' );
	if ( $env_key ) {
		return (string) $env_key;
	}

	$env_key = getenv( 'OPENAI_API_KEY' );
	if ( $env_key ) {
		return (string) $env_key;
	}

	return '';
}

/**
 * Describe where the OpenAI key is coming from without revealing it.
 *
 * @return string
 */
function qubyx_ci_get_openai_key_source_label() {
	$settings = qubyx_ci_get_settings();
	if ( ! empty( $settings['openai_api_key'] ) ) {
		return __( 'Stored in QUBYX settings', 'qubyx-content-importer' );
	}

	if ( qubyx_ci_get_openai_api_key_from_environment() ) {
		return __( 'Loaded from local environment', 'qubyx-content-importer' );
	}

	return __( 'Not configured', 'qubyx-content-importer' );
}

/**
 * AJAX handler for AI article generation.
 */
function qubyx_ci_ajax_ai_generate() {
	check_ajax_referer( 'qubyx_ci_ai', 'nonce' );

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_send_json_error( array( 'message' => __( 'You are not allowed to use QUBYX AI Writer.', 'qubyx-content-importer' ) ), 403 );
	}

	$topic = isset( $_POST['topic'] ) ? sanitize_textarea_field( wp_unslash( $_POST['topic'] ) ) : '';
	if ( '' === trim( $topic ) ) {
		wp_send_json_error( array( 'message' => __( 'Please enter a topic or brief.', 'qubyx-content-importer' ) ), 400 );
	}

	$args = array(
		'topic'             => $topic,
		'keywords'          => isset( $_POST['keywords'] ) ? sanitize_text_field( wp_unslash( $_POST['keywords'] ) ) : '',
		'audience'          => isset( $_POST['audience'] ) ? sanitize_text_field( wp_unslash( $_POST['audience'] ) ) : '',
		'post_type'         => isset( $_POST['post_type'] ) ? sanitize_key( wp_unslash( $_POST['post_type'] ) ) : 'resource',
		'resource_layout'   => isset( $_POST['resource_layout'] ) ? sanitize_key( wp_unslash( $_POST['resource_layout'] ) ) : 'guide',
		'resource_category' => isset( $_POST['resource_category'] ) ? sanitize_key( wp_unslash( $_POST['resource_category'] ) ) : '',
		'post_category'     => isset( $_POST['post_category'] ) ? sanitize_key( wp_unslash( $_POST['post_category'] ) ) : '',
		'seo_intent'        => isset( $_POST['seo_intent'] ) ? sanitize_key( wp_unslash( $_POST['seo_intent'] ) ) : 'informational',
		'language'          => isset( $_POST['language'] ) ? sanitize_text_field( wp_unslash( $_POST['language'] ) ) : 'English',
		'model'             => isset( $_POST['model'] ) ? sanitize_text_field( wp_unslash( $_POST['model'] ) ) : '',
		'use_web_search'    => ! empty( $_POST['use_web_search'] ),
	);

	$args['resource_category'] = qubyx_ci_normalize_ai_resource_category( $args['resource_category'], $args['resource_layout'] );
	$args['post_category']     = qubyx_ci_normalize_ai_post_category( $args['post_category'], $args['resource_layout'] );

	$article = qubyx_ci_generate_ai_article( $args );
	if ( is_wp_error( $article ) ) {
		wp_send_json_error( array( 'message' => $article->get_error_message() ), 500 );
	}

	$draft = null;
	if ( ! empty( $_POST['save_draft'] ) ) {
		$draft = qubyx_ci_create_ai_draft( $article, $args );
		if ( is_wp_error( $draft ) ) {
			wp_send_json_error( array( 'message' => $draft->get_error_message(), 'article' => $article ), 500 );
		}
	}

	wp_send_json_success(
		array(
			'article' => $article,
			'draft'   => $draft,
		)
	);
}

/**
 * Generate an article with OpenAI Responses API.
 *
 * @param array $args Generation args.
 * @return array|WP_Error
 */
function qubyx_ci_generate_ai_article( $args ) {
	$api_key = qubyx_ci_get_openai_api_key();
	if ( ! $api_key ) {
		return new WP_Error( 'qubyx_ai_missing_key', __( 'OpenAI API key is missing. Add it in QUBYX Settings or define OPENAI_API_KEY in the environment.', 'qubyx-content-importer' ) );
	}

	$settings = qubyx_ci_get_settings();
	$model    = ! empty( $args['model'] ) ? $args['model'] : ( $settings['openai_model'] ?? 'gpt-5-mini' );
	$schema   = qubyx_ci_ai_article_schema();
	$prompt   = qubyx_ci_build_ai_prompt( $args );
	$body     = array(
		'model' => $model,
		'input' => array(
			array(
				'role'    => 'system',
				'content' => 'You are the QUBYX editorial research assistant. Create factual, useful, SEO-aware WordPress drafts for display calibration, DICOM QA, RemoteQA, SmartSensor, healthcare imaging, creative color workflows, OEM display validation, and enterprise display management. Avoid unsupported claims. Cite sources when web research is used.',
			),
			array(
				'role'    => 'user',
				'content' => $prompt,
			),
		),
		'text'  => array(
			'format' => array(
				'type'        => 'json_schema',
				'name'        => 'qubyx_article',
				'description' => 'QUBYX WordPress article draft',
				'schema'      => $schema,
				'strict'      => false,
			),
		),
	);

	if ( ! empty( $args['use_web_search'] ) ) {
		$body['tools'] = array(
			array(
				'type'                => 'web_search',
				'search_context_size' => 'medium',
			),
		);
		$body['tool_choice'] = 'auto';
		$body['include']     = array( 'web_search_call.action.sources' );
	}

	$response = wp_remote_post(
		'https://api.openai.com/v1/responses',
		array(
			'timeout' => 90,
			'headers' => array(
				'Authorization' => 'Bearer ' . $api_key,
				'Content-Type'  => 'application/json',
			),
			'body'    => wp_json_encode( $body ),
		)
	);

	if ( is_wp_error( $response ) ) {
		return $response;
	}

	$status = wp_remote_retrieve_response_code( $response );
	$data   = json_decode( wp_remote_retrieve_body( $response ), true );
	if ( $status < 200 || $status >= 300 ) {
		$message = $data['error']['message'] ?? __( 'OpenAI request failed.', 'qubyx-content-importer' );
		return new WP_Error( 'qubyx_ai_openai_error', sanitize_text_field( $message ) );
	}

	$text = qubyx_ci_extract_openai_text( is_array( $data ) ? $data : array() );
	if ( ! $text ) {
		return new WP_Error( 'qubyx_ai_empty_response', __( 'OpenAI returned an empty response.', 'qubyx-content-importer' ) );
	}

	$article = qubyx_ci_parse_ai_article_json( $text );
	if ( is_wp_error( $article ) ) {
		return $article;
	}

	$article['citations'] = qubyx_ci_normalize_ai_citations( $article['citations'] ?? array(), is_array( $data ) ? $data : array() );
	return $article;
}

/**
 * Build the AI article prompt.
 *
 * @param array $args Generation args.
 * @return string
 */
function qubyx_ci_build_ai_prompt( $args ) {
	return sprintf(
		"Create a %1\$s QUBYX article draft in %2\$s.\n\nTopic or brief:\n%3\$s\n\nAudience: %4\$s\nSEO keywords: %5\$s\nDraft type: %6\$s\nResource layout: %7\$s\nSelected resource category: %8\$s\nSelected post category: %9\$s\nSEO intent: %10\$s\n\nReturn only valid JSON matching the supplied schema. content_html must be clean WordPress-friendly HTML with headings, paragraphs, lists, and no markdown fences. Include a practical introduction, scannable sections, and a final CTA that routes readers toward QUBYX products, resources, or demo requests. Generate Rank Math-ready SEO metadata: a focused keyphrase, 3-8 secondary keyphrases, a concise SEO title, a meta description under 160 characters, and a slug aligned with the selected category and user keywords. The article layout must match the selected category: guides/compliance/technical-notes/case-studies should be practical long-form; news/product-updates should read like announcements or release notes; blog should read like editorial insight. If web research is used, include citations with title and URL.",
		$args['resource_layout'] ?? 'guide',
		$args['language'] ?? 'English',
		$args['topic'] ?? '',
		$args['audience'] ?? '',
		$args['keywords'] ?? '',
		$args['post_type'] ?? 'resource',
		$args['resource_layout'] ?? 'guide',
		$args['resource_category'] ?? '',
		$args['post_category'] ?? '',
		$args['seo_intent'] ?? 'informational'
	);
}

/**
 * JSON schema for AI article response.
 *
 * @return array
 */
function qubyx_ci_ai_article_schema() {
	return array(
		'type'                 => 'object',
		'additionalProperties' => false,
		'properties'           => array(
			'title'           => array( 'type' => 'string' ),
			'slug'            => array( 'type' => 'string' ),
			'excerpt'         => array( 'type' => 'string' ),
			'seo_title'       => array( 'type' => 'string' ),
			'seo_description' => array( 'type' => 'string' ),
			'focus_keyphrase' => array( 'type' => 'string' ),
			'secondary_keyphrases' => array( 'type' => 'array', 'items' => array( 'type' => 'string' ) ),
			'rank_math_pillar_content' => array( 'type' => 'boolean' ),
			'content_html'    => array( 'type' => 'string' ),
			'reading_time'    => array( 'type' => 'integer' ),
			'summary'         => array( 'type' => 'string' ),
			'tags'            => array( 'type' => 'array', 'items' => array( 'type' => 'string' ) ),
			'citations'       => array(
				'type'  => 'array',
				'items' => array(
					'type'                 => 'object',
					'additionalProperties' => false,
					'properties'           => array(
						'title' => array( 'type' => 'string' ),
						'url'   => array( 'type' => 'string' ),
					),
					'required'             => array( 'title', 'url' ),
				),
			),
		),
		'required'             => array( 'title', 'slug', 'excerpt', 'seo_title', 'seo_description', 'focus_keyphrase', 'secondary_keyphrases', 'rank_math_pillar_content', 'content_html', 'reading_time', 'summary', 'tags', 'citations' ),
	);
}

/**
 * Extract text from a Responses API response.
 *
 * @param array $data Response data.
 * @return string
 */
function qubyx_ci_extract_openai_text( $data ) {
	if ( ! empty( $data['output_text'] ) && is_string( $data['output_text'] ) ) {
		return $data['output_text'];
	}

	foreach ( $data['output'] ?? array() as $item ) {
		if ( ( $item['type'] ?? '' ) !== 'message' ) {
			continue;
		}

		foreach ( $item['content'] ?? array() as $content ) {
			if ( isset( $content['text'] ) && is_string( $content['text'] ) ) {
				return $content['text'];
			}
		}
	}

	return '';
}

/**
 * Parse article JSON from model output.
 *
 * @param string $text Output text.
 * @return array|WP_Error
 */
function qubyx_ci_parse_ai_article_json( $text ) {
	$text = trim( $text );
	$text = preg_replace( '/^```(?:json)?\s*/i', '', $text );
	$text = preg_replace( '/\s*```$/', '', $text );
	$data = json_decode( $text, true );

	if ( ! is_array( $data ) ) {
		return new WP_Error( 'qubyx_ai_invalid_json', __( 'OpenAI returned a response that could not be parsed as article JSON.', 'qubyx-content-importer' ) );
	}

	return array(
		'title'           => sanitize_text_field( $data['title'] ?? '' ),
		'slug'            => sanitize_title( $data['slug'] ?? ( $data['title'] ?? '' ) ),
		'excerpt'         => sanitize_textarea_field( $data['excerpt'] ?? '' ),
		'seo_title'       => sanitize_text_field( $data['seo_title'] ?? ( $data['title'] ?? '' ) ),
		'seo_description' => sanitize_textarea_field( $data['seo_description'] ?? ( $data['excerpt'] ?? '' ) ),
		'focus_keyphrase' => sanitize_text_field( $data['focus_keyphrase'] ?? '' ),
		'secondary_keyphrases' => array_values( array_filter( array_map( 'sanitize_text_field', (array) ( $data['secondary_keyphrases'] ?? array() ) ) ) ),
		'rank_math_pillar_content' => ! empty( $data['rank_math_pillar_content'] ),
		'content_html'    => wp_kses_post( $data['content_html'] ?? '' ),
		'reading_time'    => max( 1, absint( $data['reading_time'] ?? 6 ) ),
		'summary'         => sanitize_textarea_field( $data['summary'] ?? ( $data['excerpt'] ?? '' ) ),
		'tags'            => array_values( array_filter( array_map( 'sanitize_text_field', (array) ( $data['tags'] ?? array() ) ) ) ),
		'citations'       => (array) ( $data['citations'] ?? array() ),
	);
}

/**
 * Normalize citations from model JSON and Responses API annotations/sources.
 *
 * @param array $citations Model citations.
 * @param array $response_data Raw response data.
 * @return array
 */
function qubyx_ci_normalize_ai_citations( $citations, $response_data ) {
	$items = array();

	foreach ( $citations as $citation ) {
		$url = esc_url_raw( $citation['url'] ?? '' );
		if ( ! $url ) {
			continue;
		}
		$items[ $url ] = array(
			'title' => sanitize_text_field( $citation['title'] ?? $url ),
			'url'   => $url,
		);
	}

	foreach ( $response_data['output'] ?? array() as $output ) {
		foreach ( $output['content'] ?? array() as $content ) {
			foreach ( $content['annotations'] ?? array() as $annotation ) {
				$url = esc_url_raw( $annotation['url'] ?? '' );
				if ( $url ) {
					$items[ $url ] = array(
						'title' => sanitize_text_field( $annotation['title'] ?? $url ),
						'url'   => $url,
					);
				}
			}
		}
	}

	return array_values( $items );
}

/**
 * Get terms for AI Writer select fields.
 *
 * @param string $taxonomy Taxonomy name.
 * @return array
 */
function qubyx_ci_get_ai_terms_for_select( $taxonomy ) {
	$fallbacks = array(
		'resource_category' => array(
			'guides'          => __( 'Guides', 'qubyx-content-importer' ),
			'compliance'      => __( 'Compliance', 'qubyx-content-importer' ),
			'technical-notes' => __( 'Technical Notes', 'qubyx-content-importer' ),
			'case-studies'    => __( 'Case Studies', 'qubyx-content-importer' ),
			'news'            => __( 'News', 'qubyx-content-importer' ),
			'product-updates' => __( 'Product Updates', 'qubyx-content-importer' ),
			'blog'            => __( 'Blog', 'qubyx-content-importer' ),
		),
		'category'          => array(
			'blog'            => __( 'Blog', 'qubyx-content-importer' ),
			'news'            => __( 'News', 'qubyx-content-importer' ),
			'product-updates' => __( 'Product Updates', 'qubyx-content-importer' ),
		),
	);

	if ( ! taxonomy_exists( $taxonomy ) ) {
		return $fallbacks[ $taxonomy ] ?? array();
	}

	$terms = get_terms(
		array(
			'taxonomy'   => $taxonomy,
			'hide_empty' => false,
			'orderby'    => 'name',
			'order'      => 'ASC',
		)
	);

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		return $fallbacks[ $taxonomy ] ?? array();
	}

	$options = array();
	foreach ( $terms as $term ) {
		if ( 'uncategorized' === $term->slug ) {
			continue;
		}
		$options[ $term->slug ] = $term->name;
	}

	return $options ?: ( $fallbacks[ $taxonomy ] ?? array() );
}

/**
 * Normalize AI resource category.
 *
 * @param string $category Category slug.
 * @param string $layout Resource layout.
 * @return string
 */
function qubyx_ci_normalize_ai_resource_category( $category, $layout ) {
	$allowed = array_keys( qubyx_ci_get_ai_terms_for_select( 'resource_category' ) );
	if ( in_array( $category, $allowed, true ) ) {
		return $category;
	}

	if ( 'news' === $layout ) {
		return in_array( 'news', $allowed, true ) ? 'news' : reset( $allowed );
	}

	if ( 'blog' === $layout ) {
		return in_array( 'blog', $allowed, true ) ? 'blog' : reset( $allowed );
	}

	return in_array( 'guides', $allowed, true ) ? 'guides' : reset( $allowed );
}

/**
 * Normalize AI post category.
 *
 * @param string $category Category slug.
 * @param string $layout Resource layout.
 * @return string
 */
function qubyx_ci_normalize_ai_post_category( $category, $layout ) {
	$allowed = array_keys( qubyx_ci_get_ai_terms_for_select( 'category' ) );
	if ( in_array( $category, $allowed, true ) ) {
		return $category;
	}

	if ( 'news' === $layout ) {
		return in_array( 'news', $allowed, true ) ? 'news' : reset( $allowed );
	}

	return in_array( 'blog', $allowed, true ) ? 'blog' : reset( $allowed );
}

/**
 * Normalize layout to match selected category.
 *
 * @param string $layout Layout.
 * @param string $category Category slug.
 * @return string
 */
function qubyx_ci_normalize_ai_resource_layout( $layout, $category ) {
	if ( in_array( $category, array( 'news', 'product-updates' ), true ) ) {
		return 'news';
	}

	if ( 'blog' === $category ) {
		return 'blog';
	}

	return in_array( $layout, array( 'guide', 'news', 'blog' ), true ) ? $layout : 'guide';
}

/**
 * Create a WordPress draft from an AI article.
 *
 * @param array $article Article data.
 * @param array $args Generation args.
 * @return array|WP_Error
 */
function qubyx_ci_create_ai_draft( $article, $args ) {
	$post_type = in_array( $args['post_type'] ?? 'resource', array( 'post', 'page', 'resource' ), true ) ? $args['post_type'] : 'resource';
	$layout    = qubyx_ci_normalize_ai_resource_layout( $args['resource_layout'] ?? 'guide', $args['resource_category'] ?? '' );
	$post_id   = wp_insert_post(
		array(
			'post_type'    => $post_type,
			'post_status'  => 'draft',
			'post_title'   => $article['title'],
			'post_name'    => $article['slug'],
			'post_excerpt' => $article['excerpt'],
			'post_content' => $article['content_html'],
			'meta_input'   => array(
				'_qubyx_ai_generated' => current_time( 'mysql' ),
				'summary'             => $article['summary'],
				'reading_time'        => $article['reading_time'],
				'resource_layout'     => $layout,
			),
		),
		true
	);

	if ( is_wp_error( $post_id ) ) {
		return $post_id;
	}

	qubyx_ci_update_seo_meta(
		$post_id,
		array(
			'post_title'      => $article['title'],
			'post_excerpt'    => $article['excerpt'],
			'seo_title'       => $article['seo_title'],
			'seo_description' => $article['seo_description'],
			'focus_keyphrase' => $article['focus_keyphrase'],
			'secondary_keyphrases' => $article['secondary_keyphrases'],
			'rank_math_pillar_content' => $article['rank_math_pillar_content'],
		)
	);

	if ( 'resource' === $post_type && taxonomy_exists( 'resource_category' ) ) {
		$term = qubyx_ci_normalize_ai_resource_category( $args['resource_category'] ?? '', $layout );
		wp_set_object_terms( $post_id, array( $term ), 'resource_category', false );
	}

	if ( 'post' === $post_type && taxonomy_exists( 'category' ) ) {
		$term = qubyx_ci_normalize_ai_post_category( $args['post_category'] ?? '', $layout );
		wp_set_object_terms( $post_id, array( $term ), 'category', false );
	}

	if ( ! empty( $article['tags'] ) && taxonomy_exists( 'post_tag' ) && 'page' !== $post_type ) {
		wp_set_post_tags( $post_id, $article['tags'], false );
	}

	if ( ! empty( $article['citations'] ) ) {
		update_post_meta( $post_id, '_qubyx_ai_citations', $article['citations'] );
	}

	return array(
		'id'       => $post_id,
		'edit_url' => get_edit_post_link( $post_id, 'raw' ),
		'view_url' => get_preview_post_link( $post_id ),
	);
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
		'openai_api_key'           => '',
		'openai_model'             => 'gpt-5-mini',
		'ai_use_web_search'        => 1,
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
	$current  = qubyx_ci_get_settings();
	$new_key  = isset( $settings['openai_api_key'] ) ? trim( (string) $settings['openai_api_key'] ) : '';

	return array(
		'update_endpoint'          => esc_url_raw( $settings['update_endpoint'] ?? QUBYX_CI_UPDATE_ENDPOINT ),
		'auto_import_after_update' => empty( $settings['auto_import_after_update'] ) ? 0 : 1,
		'openai_api_key'           => '' === $new_key ? ( $current['openai_api_key'] ?? '' ) : sanitize_text_field( $new_key ),
		'openai_model'             => sanitize_text_field( $settings['openai_model'] ?? 'gpt-5-mini' ),
		'ai_use_web_search'        => empty( $settings['ai_use_web_search'] ) ? 0 : 1,
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
		admin_url( 'admin.php' )
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
	$focus_keyphrase = $item['focus_keyphrase'] ?? '';
	$secondary_keyphrases = $item['secondary_keyphrases'] ?? array();

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

	if ( $focus_keyphrase ) {
		update_post_meta( $post_id, 'rank_math_focus_keyword', $focus_keyphrase );
		update_post_meta( $post_id, '_yoast_wpseo_focuskw', $focus_keyphrase );
	}

	if ( ! empty( $secondary_keyphrases ) && is_array( $secondary_keyphrases ) ) {
		update_post_meta( $post_id, '_qubyx_secondary_keyphrases', array_values( array_map( 'sanitize_text_field', $secondary_keyphrases ) ) );
	}

	if ( ! empty( $item['rank_math_pillar_content'] ) ) {
		update_post_meta( $post_id, 'rank_math_pillar_content', 'on' );
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
