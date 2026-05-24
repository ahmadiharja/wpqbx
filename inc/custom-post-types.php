<?php
/**
 * Custom Post Types.
 *
 * @package Qubyx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function qubyx_register_post_types() {

	// === Products ===
	register_post_type( 'product', array(
		'labels' => array(
			'name'               => __( 'Products', 'qubyx' ),
			'singular_name'      => __( 'Product', 'qubyx' ),
			'add_new_item'       => __( 'Add new product', 'qubyx' ),
			'edit_item'          => __( 'Edit product', 'qubyx' ),
			'new_item'           => __( 'New product', 'qubyx' ),
			'view_item'          => __( 'View product', 'qubyx' ),
			'search_items'       => __( 'Search products', 'qubyx' ),
			'not_found'          => __( 'No products found', 'qubyx' ),
			'menu_name'          => __( 'Products', 'qubyx' ),
		),
		'public'              => true,
		'has_archive'         => 'products',
		'show_in_rest'        => true,
		'menu_icon'           => 'dashicons-screenoptions',
		'menu_position'       => 20,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields' ),
		'rewrite'             => array( 'slug' => 'products', 'with_front' => false ),
		'capability_type'     => 'page',
	) );

	// === Resources / Articles ===
	register_post_type( 'resource', array(
		'labels' => array(
			'name'               => __( 'Resources', 'qubyx' ),
			'singular_name'      => __( 'Resource', 'qubyx' ),
			'add_new_item'       => __( 'Add new resource', 'qubyx' ),
			'edit_item'          => __( 'Edit resource', 'qubyx' ),
			'new_item'           => __( 'New resource', 'qubyx' ),
			'view_item'          => __( 'View resource', 'qubyx' ),
			'search_items'       => __( 'Search resources', 'qubyx' ),
			'not_found'          => __( 'No resources found', 'qubyx' ),
			'menu_name'          => __( 'Resources', 'qubyx' ),
		),
		'public'              => true,
		'has_archive'         => 'resources',
		'show_in_rest'        => true,
		'menu_icon'           => 'dashicons-welcome-learn-more',
		'menu_position'       => 21,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'custom-fields' ),
		'rewrite'             => array( 'slug' => 'resources', 'with_front' => false ),
	) );

	// === Taxonomy: Resource Categories ===
	register_taxonomy( 'resource_category', array( 'resource' ), array(
		'labels' => array(
			'name'          => __( 'Resource Categories', 'qubyx' ),
			'singular_name' => __( 'Resource Category', 'qubyx' ),
		),
		'public'            => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'hierarchical'      => true,
		'rewrite'           => array( 'slug' => 'resources/category' ),
	) );

	// === Taxonomy: Product Categories ===
	register_taxonomy( 'product_category', array( 'product' ), array(
		'labels' => array(
			'name'          => __( 'Product Categories', 'qubyx' ),
			'singular_name' => __( 'Product Category', 'qubyx' ),
		),
		'public'            => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'hierarchical'      => true,
		'rewrite'           => array( 'slug' => 'products/category' ),
	) );
}
add_action( 'init', 'qubyx_register_post_types' );

/**
 * Flush rewrite rules on theme activation.
 */
function qubyx_rewrite_flush() {
	qubyx_register_post_types();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'qubyx_rewrite_flush' );
