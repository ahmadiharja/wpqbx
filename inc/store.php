<?php
/**
 * Store helpers.
 *
 * @package Qubyx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Parse comma or newline separated card metadata.
 */
function qubyx_store_parse_list( $value ) {
	if ( is_array( $value ) ) {
		return array_values( array_filter( array_map( 'trim', $value ) ) );
	}

	$parts = preg_split( '/[\r\n,]+/', (string) $value );
	return array_values( array_filter( array_map( 'trim', $parts ) ) );
}

/**
 * Fallback store cards used before WooCommerce products are imported.
 */
function qubyx_store_default_products() {
	return array(
		array(
			'code'       => 'LUM',
			'icon'       => 'lum',
			'tag'        => __( 'Medical / DICOM', 'qubyx' ),
			'categories' => array( 'medical' ),
			'audiences'  => array( 'hospitals', 'education' ),
			'title'      => __( 'PerfectLum 4', 'qubyx' ),
			'plan'       => __( '1 Year Maintenance Plan', 'qubyx' ),
			'price_html' => '$480<small>/year</small>',
			'period'     => __( 'Annual maintenance subscription', 'qubyx' ),
			'desc'       => __( 'DICOM calibration and QA software for one workstation, including reporting, scheduling, and remote management readiness.', 'qubyx' ),
			'features'   => array( __( 'Per-workstation licensing', 'qubyx' ), __( 'Calibrates up to 6 displays', 'qubyx' ), __( 'Windows and Mac compatible', 'qubyx' ), __( 'DICOM, TG18, TG270, DIN, ACR workflows', 'qubyx' ) ),
			'links'      => array( array( __( 'View PerfectLum plans', 'qubyx' ), '/store/perfectlum/' ) ),
			'cta'        => __( 'Choose plan', 'qubyx' ),
			'cta_href'   => '/store/perfectlum/',
		),
		array(
			'code'        => 'LUM',
			'icon'        => 'lum',
			'tag'         => __( 'Medical / DICOM', 'qubyx' ),
			'badge'       => __( 'Maintenance', 'qubyx' ),
			'categories'  => array( 'medical' ),
			'audiences'   => array( 'hospitals', 'education' ),
			'title'       => __( 'PerfectLum 3 Years', 'qubyx' ),
			'plan'        => __( '3 Years Maintenance Plan', 'qubyx' ),
			'price_html'  => '$288<small>/3 years</small>',
			'period'      => __( 'Multi-year maintenance subscription', 'qubyx' ),
			'desc'        => __( 'Extended maintenance for PerfectLum with updates, priority email support, remote desktop support, and license resets.', 'qubyx' ),
			'features'    => array( __( 'Priority email-based support', 'qubyx' ), __( 'Remote desktop TC connection', 'qubyx' ), __( 'Access to all updates', 'qubyx' ), __( 'License resets during 3 years', 'qubyx' ) ),
			'links'       => array( array( __( 'Compare maintenance plans', 'qubyx' ), '/store/perfectlum/' ) ),
			'cta'         => __( 'Get started', 'qubyx' ),
			'cta_href'    => '/store/perfectlum/',
		),
		array(
			'code'        => 'LUM',
			'icon'        => 'lum',
			'tag'         => __( 'Medical / DICOM', 'qubyx' ),
			'badge'       => __( 'Most popular', 'qubyx' ),
			'badge_class' => 'pop',
			'featured'    => true,
			'categories'  => array( 'medical' ),
			'audiences'   => array( 'hospitals', 'education' ),
			'title'       => __( 'PerfectLum 5 Years', 'qubyx' ),
			'plan'        => __( '5 Years Maintenance Plan', 'qubyx' ),
			'price_html'  => '$360<small>/5 years</small>',
			'period'      => __( 'Best-value maintenance subscription', 'qubyx' ),
			'desc'        => __( 'Longer maintenance coverage for PerfectLum teams that want updates, new releases, priority support, and license reset coverage.', 'qubyx' ),
			'features'    => array( __( 'Unlimited priority email-based support', 'qubyx' ), __( 'Remote desktop TC connection', 'qubyx' ), __( 'Access to all updates', 'qubyx' ), __( 'Unlock new releases of PerfectLum', 'qubyx' ), __( 'License resets during 5 years', 'qubyx' ) ),
			'links'       => array( array( __( 'Compare maintenance plans', 'qubyx' ), '/store/perfectlum/' ) ),
			'cta'         => __( 'Get started', 'qubyx' ),
			'cta_href'    => '/store/perfectlum/',
		),
		array(
			'code'           => 'CHR',
			'icon'           => 'chr',
			'tag'            => __( 'Color / Creative', 'qubyx' ),
			'categories'     => array( 'color' ),
			'audiences'      => array( 'color', 'consumer', 'education' ),
			'title'          => __( 'PerfectChroma Pro License', 'qubyx' ),
			'plan'           => __( 'One Time Purchase', 'qubyx' ),
			'price_old_html' => '$399',
			'price_html'     => '$199',
			'period'         => __( 'Lifetime license', 'qubyx' ),
			'desc'           => __( 'Hardware calibration engine for essential color accuracy and seamless workflow integration.', 'qubyx' ),
			'features'       => array( __( 'Full PerfectChroma software', 'qubyx' ), __( 'Support for major colorimeters', 'qubyx' ), __( 'Delta-E below 1.0 accuracy', 'qubyx' ), __( 'Smart calibration presets', 'qubyx' ), __( '1-year free updates', 'qubyx' ) ),
			'links'          => array( array( __( 'View PerfectChroma bundles', 'qubyx' ), '/store/perfectchroma/' ) ),
			'cta'            => __( 'Choose this plan', 'qubyx' ),
			'cta_href'       => '/store/perfectchroma/',
		),
		array(
			'code'           => 'CHR',
			'icon'           => 'chr',
			'tag'            => __( 'Color / Creative', 'qubyx' ),
			'badge'          => __( 'Most popular', 'qubyx' ),
			'badge_class'    => 'pop',
			'featured'       => true,
			'categories'     => array( 'color' ),
			'audiences'      => array( 'color', 'consumer', 'education' ),
			'title'          => __( 'PerfectChroma Pro Bundle', 'qubyx' ),
			'plan'           => __( 'One Time Purchase', 'qubyx' ),
			'price_old_html' => '$699',
			'price_html'     => '$499',
			'period'         => __( 'Lifetime license bundle', 'qubyx' ),
			'desc'           => __( 'Supercharged calibration bundle with X-Rite i1Display Pro, advanced 3D LUTs, and priority updates.', 'qubyx' ),
			'features'       => array( __( 'Full PerfectChroma software license', 'qubyx' ), __( '1x X-Rite i1Display Pro OEM Sensor', 'qubyx' ), __( 'Delta-E below 1.0 professional accuracy', 'qubyx' ), __( 'Photo, Video, and Web presets', 'qubyx' ), __( 'Advanced LUT export', 'qubyx' ) ),
			'links'          => array( array( __( 'View PerfectChroma bundles', 'qubyx' ), '/store/perfectchroma/' ) ),
			'cta'            => __( 'Choose this plan', 'qubyx' ),
			'cta_href'       => '/store/perfectchroma/',
		),
		array(
			'code'           => 'CHR',
			'icon'           => 'chr',
			'tag'            => __( 'Color / Creative', 'qubyx' ),
			'categories'     => array( 'color' ),
			'audiences'      => array( 'color', 'consumer' ),
			'title'          => __( 'PerfectChroma Studio Bundle', 'qubyx' ),
			'plan'           => __( 'One Time Purchase', 'qubyx' ),
			'price_old_html' => '$999',
			'price_html'     => '$799',
			'period'         => __( 'Lifetime studio bundle', 'qubyx' ),
			'desc'           => __( 'Fleet-ready color calibration bundle with multiple licenses, remote management, and central reporting.', 'qubyx' ),
			'features'       => array( __( '3 PerfectChroma licenses', 'qubyx' ), __( '1 X-Rite i1Display Pro Sensor', 'qubyx' ), __( 'Remote management dashboard', 'qubyx' ), __( 'Profile distribution across network', 'qubyx' ), __( 'Priority team support', 'qubyx' ) ),
			'links'          => array( array( __( 'View PerfectChroma bundles', 'qubyx' ), '/store/perfectchroma/' ) ),
			'cta'            => __( 'Choose this plan', 'qubyx' ),
			'cta_href'       => '/store/perfectchroma/',
		),
		array(
			'code'       => 'EPD',
			'icon'       => 'epd',
			'tag'        => __( 'E-paper / OEM', 'qubyx' ),
			'categories' => array( 'epd' ),
			'audiences'  => array( 'oem', 'education' ),
			'title'      => __( 'PerfectEPD Annual', 'qubyx' ),
			'plan'       => __( 'Annual Subscription', 'qubyx' ),
			'price_html' => __( 'Request quote', 'qubyx' ),
			'period'     => __( 'Annual validation subscription', 'qubyx' ),
			'desc'       => __( 'E-paper display validation, reflectance, contrast, and uniformity QA for OEM teams and lab workflows.', 'qubyx' ),
			'features'   => array( __( 'Annual software access', 'qubyx' ), __( 'Reflectance and contrast validation', 'qubyx' ), __( 'OEM lab workflow support', 'qubyx' ), __( 'Reporting for QA teams', 'qubyx' ) ),
			'links'      => array( array( __( 'View PerfectEPD plan', 'qubyx' ), '/store/perfectepd/' ) ),
			'cta'        => __( 'Request quote', 'qubyx' ),
			'cta_href'   => '/store/perfectepd/',
		),
		array(
			'code'       => 'RQA',
			'icon'       => 'rqa',
			'tag'        => __( 'Remote QA', 'qubyx' ),
			'categories' => array( 'remote', 'free' ),
			'audiences'  => array( 'hospitals', 'oem', 'education' ),
			'title'      => __( 'Qubyx Web Remote QA', 'qubyx' ),
			'plan'       => __( 'Free Hosted Access', 'qubyx' ),
			'price_html' => __( 'Free', 'qubyx' ),
			'period'     => __( 'Hosted web RemoteQA entry point', 'qubyx' ),
			'desc'       => __( 'Free web access path for remote QA visibility, task review, and getting teams started with centralized display quality.', 'qubyx' ),
			'features'   => array( __( 'Hosted web access', 'qubyx' ), __( 'Remote QA onboarding path', 'qubyx' ), __( 'Central display status story', 'qubyx' ), __( 'Upgrade path for enterprise deployments', 'qubyx' ) ),
			'links'      => array( array( __( 'Learn about RemoteQA', 'qubyx' ), '/products/qubyx-remoteqa/' ) ),
			'cta'        => __( 'Try remote', 'qubyx' ),
			'cta_href'   => '/products/qubyx-remoteqa/',
		),
		array(
			'code'       => 'S1',
			'icon'       => 's1',
			'tag'        => __( 'OEM hardware', 'qubyx' ),
			'categories' => array( 'sensors', 'oem' ),
			'audiences'  => array( 'oem' ),
			'title'      => __( 'Qubyx SmartSensor S1', 'qubyx' ),
			'plan'       => __( 'Manufacturing / OEM', 'qubyx' ),
			'price_html' => __( 'Request quote', 'qubyx' ),
			'period'     => __( 'OEM procurement path', 'qubyx' ),
			'desc'       => __( 'Sensor option for manufacturers and OEM validation programs that need repeatable measurement in production or lab workflows.', 'qubyx' ),
			'features'   => array( __( 'OEM validation positioning', 'qubyx' ), __( 'Production and lab workflow fit', 'qubyx' ), __( 'Pairs with PerfectLum and PerfectEPD', 'qubyx' ), __( 'Quote-led procurement', 'qubyx' ) ),
			'links'      => array( array( __( 'View sensor catalog', 'qubyx' ), '/store/sensors/' ) ),
			'cta'        => __( 'Request quote', 'qubyx' ),
			'cta_href'   => '/store/sensors/',
		),
		array(
			'code'       => 'S2',
			'icon'       => 's2',
			'tag'        => __( 'Consumer hardware', 'qubyx' ),
			'categories' => array( 'sensors', 'consumer' ),
			'audiences'  => array( 'consumer', 'color' ),
			'title'      => __( 'Qubyx SmartSensor S2', 'qubyx' ),
			'plan'       => __( 'Consumer / Creative', 'qubyx' ),
			'price_html' => __( 'Request quote', 'qubyx' ),
			'period'     => __( 'General purchasing path', 'qubyx' ),
			'desc'       => __( 'General-purpose sensor path for consumers and creative teams that need dependable color measurement.', 'qubyx' ),
			'features'   => array( __( 'Consumer and creative positioning', 'qubyx' ), __( 'Color measurement workflow', 'qubyx' ), __( 'Pairs with PerfectChroma', 'qubyx' ), __( 'Simple purchase or quote path', 'qubyx' ) ),
			'links'      => array( array( __( 'View sensor catalog', 'qubyx' ), '/store/sensors/' ) ),
			'cta'        => __( 'View sensor', 'qubyx' ),
			'cta_href'   => '/store/sensors/',
		),
		array(
			'code'       => 'OST',
			'icon'       => 'rqa',
			'tag'        => __( 'Open source tools', 'qubyx' ),
			'categories' => array( 'free', 'color', 'medical' ),
			'audiences'  => array( 'hospitals', 'color', 'consumer', 'education' ),
			'title'      => __( 'Qubyx OS Tools', 'qubyx' ),
			'plan'       => __( 'Free / Open Source', 'qubyx' ),
			'price_html' => __( 'Free', 'qubyx' ),
			'period'     => __( 'Open-source color management tools', 'qubyx' ),
			'desc'       => __( 'Open-source tools for advanced ICC Device Link profiles, 3D LUT generation, and vendor-independent color workflows.', 'qubyx' ),
			'features'   => array( __( 'Device Link ICC profile generation', 'qubyx' ), __( '3D LUT workflow support', 'qubyx' ), __( 'Vendor-independent calibration path', 'qubyx' ), __( 'Pairs with PerfectLum for enterprise QA', 'qubyx' ) ),
			'links'      => array( array( __( 'Read about OS Tools', 'qubyx' ), '/get-display-color-accuracy-solely-qubyx-os-tools/' ) ),
			'cta'        => __( 'Learn more', 'qubyx' ),
			'cta_href'   => '/get-display-color-accuracy-solely-qubyx-os-tools/',
		),
		array(
			'code'       => 'BUN',
			'icon'       => 'bun',
			'tag'        => __( 'PerfectLum bundle', 'qubyx' ),
			'categories' => array( 'bundles', 'medical', 'sensors' ),
			'audiences'  => array( 'hospitals', 'oem' ),
			'title'      => __( 'PerfectLum and S1 Sensor', 'qubyx' ),
			'plan'       => __( 'Software + sensor bundle', 'qubyx' ),
			'price_html' => '$680',
			'period'     => __( 'Bundle purchase', 'qubyx' ),
			'desc'       => __( 'PerfectLum 4 bundled with the PerfectLum S1 luminance and colorimeter for DICOM calibration and display verification.', 'qubyx' ),
			'features'   => array( __( 'PerfectLum 4 software', 'qubyx' ), __( 'PerfectLum S1 luminance and colorimeter', 'qubyx' ), __( 'Easy setup and maintenance', 'qubyx' ), __( 'Windows and Mac compatible', 'qubyx' ) ),
			'links'      => array( array( __( 'View bundles', 'qubyx' ), '/store/bundles/' ) ),
			'cta'        => __( 'Configure bundle', 'qubyx' ),
			'cta_href'   => '/store/bundles/',
		),
	);
}

/**
 * Get Store products from WooCommerce, falling back to static cards.
 */
function qubyx_store_get_products() {
	if ( ! function_exists( 'wc_get_products' ) ) {
		return qubyx_store_default_products();
	}

	$ids = wc_get_products(
		array(
			'status'     => 'publish',
			'limit'      => -1,
			'return'     => 'ids',
			'orderby'    => 'menu_order',
			'order'      => 'ASC',
			'meta_key'   => '_qubyx_store_product',
			'meta_value' => '1',
		)
	);

	if ( empty( $ids ) ) {
		return qubyx_store_default_products();
	}

	$cards = array();
	foreach ( $ids as $id ) {
		$product = wc_get_product( $id );
		if ( ! $product ) {
			continue;
		}

		$price_html = $product->get_price_html();
		if ( '' === $price_html && '' !== $product->get_price() ) {
			$price_html = wc_price( $product->get_price() );
		}
		if ( '' === $price_html && '0' === (string) $product->get_price() ) {
			$price_html = __( 'Free', 'qubyx' );
		}

		$regular_price = $product->get_regular_price();
		$sale_price    = $product->get_sale_price();
		$price_old     = ( '' !== $sale_price && '' !== $regular_price && (float) $regular_price > (float) $sale_price ) ? wc_price( $regular_price ) : '';

		$cards[] = array(
			'code'           => get_post_meta( $id, '_qubyx_store_code', true ) ?: strtoupper( substr( preg_replace( '/[^a-z0-9]/i', '', $product->get_name() ), 0, 3 ) ),
			'icon'           => get_post_meta( $id, '_qubyx_store_icon', true ) ?: 'lum',
			'tag'            => get_post_meta( $id, '_qubyx_store_tag', true ) ?: __( 'QUBYX product', 'qubyx' ),
			'badge'          => get_post_meta( $id, '_qubyx_store_badge', true ),
			'badge_class'    => get_post_meta( $id, '_qubyx_store_badge_class', true ),
			'featured'       => '1' === get_post_meta( $id, '_qubyx_store_featured', true ),
			'categories'     => qubyx_store_parse_list( get_post_meta( $id, '_qubyx_store_categories', true ) ),
			'audiences'      => qubyx_store_parse_list( get_post_meta( $id, '_qubyx_store_audiences', true ) ),
			'title'          => $product->get_name(),
			'plan'           => get_post_meta( $id, '_qubyx_store_plan', true ),
			'price_old_html' => $price_old,
			'price_html'     => $price_html ?: __( 'Request quote', 'qubyx' ),
			'period'         => get_post_meta( $id, '_qubyx_store_period', true ),
			'desc'           => $product->get_short_description() ?: wp_strip_all_tags( $product->get_description() ),
			'features'       => qubyx_store_parse_list( get_post_meta( $id, '_qubyx_store_features', true ) ),
			'links'          => array( array( __( 'View product', 'qubyx' ), get_permalink( $id ) ) ),
			'cta'            => get_post_meta( $id, '_qubyx_store_cta', true ) ?: ( $product->is_purchasable() ? __( 'Add to cart', 'qubyx' ) : __( 'View details', 'qubyx' ) ),
			'cta_href'       => $product->is_purchasable() ? $product->add_to_cart_url() : get_permalink( $id ),
		);
	}

	return $cards ?: qubyx_store_default_products();
}

/**
 * Prevent Store SKUs from polluting the product portfolio archive.
 */
function qubyx_exclude_store_products_from_archive( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! $query->is_post_type_archive( 'product' ) ) {
		return;
	}

	$meta_query   = (array) $query->get( 'meta_query' );
	$meta_query[] = array(
		'key'     => '_qubyx_store_product',
		'compare' => 'NOT EXISTS',
	);
	$query->set( 'meta_query', $meta_query );
}
add_action( 'pre_get_posts', 'qubyx_exclude_store_products_from_archive' );
