<?php
/**
 * Store helpers.
 *
 * @package Qubyx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function qubyx_store_parse_list( $value ) {
	$parts = is_array( $value ) ? $value : preg_split( '/[\r\n,|]+/', (string) $value );
	return array_values( array_filter( array_map( 'trim', $parts ) ) );
}

function qubyx_store_product_meta( $product, $key, $default = '' ) {
	$value = get_post_meta( $product->get_id(), $key, true );
	return '' !== $value ? $value : $default;
}

function qubyx_store_price_html( $product ) {
	$price = $product->get_price();
	if ( '0' === (string) $price ) {
		return __( 'Free', 'qubyx' );
	}

	if ( '' !== (string) $price ) {
		return wc_price( $price );
	}

	return __( 'Request quote', 'qubyx' );
}

function qubyx_store_plan_from_product( $product ) {
	$id            = $product->get_id();
	$regular_price = $product->get_regular_price();
	$sale_price    = $product->get_sale_price();
	$old_price     = ( '' !== $sale_price && '' !== $regular_price && (float) $regular_price > (float) $sale_price ) ? wc_price( $regular_price ) : '';

	return array(
		'id'             => $id,
		'order'          => (int) $product->get_menu_order(),
		'title'          => $product->get_name(),
		'plan'           => qubyx_store_product_meta( $product, '_qubyx_store_plan', $product->get_name() ),
		'period'         => qubyx_store_product_meta( $product, '_qubyx_store_period' ),
		'desc'           => $product->get_short_description() ?: wp_strip_all_tags( $product->get_description() ),
		'price_html'     => qubyx_store_price_html( $product ),
		'price_old_html' => $old_price,
		'features'       => qubyx_store_parse_list( qubyx_store_product_meta( $product, '_qubyx_store_features' ) ),
		'cta'            => qubyx_store_product_meta( $product, '_qubyx_store_cta', $product->is_purchasable() ? __( 'Add to cart', 'qubyx' ) : __( 'View details', 'qubyx' ) ),
		'cta_href'       => $product->is_purchasable() ? $product->add_to_cart_url() : get_permalink( $id ),
	);
}

function qubyx_store_get_product_groups() {
	if ( ! function_exists( 'wc_get_products' ) ) {
		return array();
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

	$groups = array();
	foreach ( $ids as $id ) {
		$product = wc_get_product( $id );
		if ( ! $product ) {
			continue;
		}

		$key = qubyx_store_product_meta( $product, '_qubyx_store_group', $product->get_slug() );
		if ( ! isset( $groups[ $key ] ) ) {
			$groups[ $key ] = array(
				'key'        => $key,
				'code'       => qubyx_store_product_meta( $product, '_qubyx_store_code', strtoupper( substr( preg_replace( '/[^a-z0-9]/i', '', $product->get_name() ), 0, 3 ) ) ),
				'icon'       => qubyx_store_product_meta( $product, '_qubyx_store_icon', 'lum' ),
				'tag'        => qubyx_store_product_meta( $product, '_qubyx_store_tag', __( 'QUBYX product', 'qubyx' ) ),
				'badge'      => qubyx_store_product_meta( $product, '_qubyx_store_badge' ),
				'badge_class' => qubyx_store_product_meta( $product, '_qubyx_store_badge_class' ),
				'featured'   => '1' === qubyx_store_product_meta( $product, '_qubyx_store_featured', '0' ),
				'title'      => qubyx_store_product_meta( $product, '_qubyx_store_group_title', $product->get_name() ),
				'desc'       => qubyx_store_product_meta( $product, '_qubyx_store_group_desc', $product->get_short_description() ),
				'categories' => array(),
				'audiences'  => array(),
				'plans'      => array(),
			);
		}

		$groups[ $key ]['categories'] = array_values( array_unique( array_merge( $groups[ $key ]['categories'], qubyx_store_parse_list( qubyx_store_product_meta( $product, '_qubyx_store_categories' ) ) ) ) );
		$groups[ $key ]['audiences']  = array_values( array_unique( array_merge( $groups[ $key ]['audiences'], qubyx_store_parse_list( qubyx_store_product_meta( $product, '_qubyx_store_audiences' ) ) ) ) );
		$groups[ $key ]['plans'][]    = qubyx_store_plan_from_product( $product );
	}

	foreach ( $groups as &$group ) {
		usort(
			$group['plans'],
			function ( $a, $b ) {
				return ( $a['order'] ?? 0 ) <=> ( $b['order'] ?? 0 );
			}
		);

		$group['order'] = min( array_column( $group['plans'], 'order' ) );
	}
	unset( $group );

	uasort(
		$groups,
		function ( $a, $b ) {
			return ( $a['order'] ?? 0 ) <=> ( $b['order'] ?? 0 );
		}
	);

	return array_values( $groups );
}

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
