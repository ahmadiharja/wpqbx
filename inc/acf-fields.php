<?php
/**
 * ACF Pro field group registration (programmatic, version-controlled).
 *
 * If ACF is not installed, this file does nothing — templates use fallback
 * content via qubyx_field() helper.
 *
 * @package Qubyx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return; // ACF not active — fail silently.
}

add_action( 'acf/init', 'qubyx_register_acf_fields' );

function qubyx_register_acf_fields() {

	// =====================================================
	// PRODUCT FIELDS
	// =====================================================
	acf_add_local_field_group( array(
		'key'      => 'group_qubyx_product',
		'title'    => __( 'Product Page', 'qubyx' ),
		'fields'   => array(

			// HERO
			array( 'key' => 'field_p_tab_hero', 'type' => 'tab', 'label' => __( 'Hero', 'qubyx' ) ),
			array( 'key' => 'field_p_eyebrow',      'name' => 'hero_eyebrow',      'label' => __( 'Eyebrow label', 'qubyx' ),      'type' => 'text' ),
			array( 'key' => 'field_p_headline',     'name' => 'hero_headline',     'label' => __( 'Hero headline', 'qubyx' ),      'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_p_description',  'name' => 'hero_description',  'label' => __( 'Hero description', 'qubyx' ),   'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_p_cta_primary',  'name' => 'cta_primary',       'label' => __( 'Primary CTA', 'qubyx' ),        'type' => 'link' ),
			array( 'key' => 'field_p_cta_secondary','name' => 'cta_secondary',     'label' => __( 'Secondary CTA', 'qubyx' ),      'type' => 'link' ),
			array( 'key' => 'field_p_hero_image',   'name' => 'hero_image',        'label' => __( 'Hero image / screenshot', 'qubyx' ), 'type' => 'image', 'return_format' => 'array' ),

			// FEATURES
			array( 'key' => 'field_p_tab_features', 'type' => 'tab', 'label' => __( 'Features', 'qubyx' ) ),
			array( 'key' => 'field_p_features_intro', 'name' => 'features_intro', 'label' => __( 'Features intro', 'qubyx' ), 'type' => 'textarea', 'rows' => 2 ),
			array(
				'key'        => 'field_p_features',
				'name'       => 'features',
				'label'      => __( 'Feature cards', 'qubyx' ),
				'type'       => 'repeater',
				'layout'     => 'block',
				'button_label' => __( 'Add feature', 'qubyx' ),
				'sub_fields' => array(
					array( 'key' => 'field_f_badge', 'name' => 'badge', 'label' => __( 'Badge', 'qubyx' ), 'type' => 'text' ),
					array( 'key' => 'field_f_icon',  'name' => 'icon',        'label' => __( 'Icon (SVG/PNG)', 'qubyx' ), 'type' => 'image', 'return_format' => 'array' ),
					array( 'key' => 'field_f_title', 'name' => 'title',       'label' => __( 'Title', 'qubyx' ),         'type' => 'text' ),
					array( 'key' => 'field_f_desc',  'name' => 'description', 'label' => __( 'Description', 'qubyx' ),   'type' => 'textarea', 'rows' => 2 ),
					array( 'key' => 'field_f_span',  'name' => 'span',        'label' => __( 'Card span', 'qubyx' ),     'type' => 'select', 'choices' => array( '' => __( 'Default', 'qubyx' ), 'wide' => __( 'Wide', 'qubyx' ) ) ),
				),
			),

			// BENEFITS
			array( 'key' => 'field_p_tab_benefits', 'type' => 'tab', 'label' => __( 'Benefits', 'qubyx' ) ),
			array(
				'key' => 'field_p_benefits', 'name' => 'benefits', 'label' => __( 'Benefits', 'qubyx' ),
				'type' => 'repeater', 'layout' => 'table',
				'sub_fields' => array(
					array( 'key' => 'field_b_title',  'name' => 'title',  'label' => __( 'Benefit', 'qubyx' ),     'type' => 'text' ),
					array( 'key' => 'field_b_detail', 'name' => 'detail', 'label' => __( 'Detail', 'qubyx' ),      'type' => 'text' ),
				),
			),

			// SPECS
			array( 'key' => 'field_p_tab_specs', 'type' => 'tab', 'label' => __( 'Specifications', 'qubyx' ) ),
			array(
				'key' => 'field_p_specs', 'name' => 'specifications', 'label' => __( 'Technical specifications', 'qubyx' ),
				'type' => 'repeater', 'layout' => 'table',
				'sub_fields' => array(
					array( 'key' => 'field_s_label', 'name' => 'label', 'label' => __( 'Label', 'qubyx' ), 'type' => 'text' ),
					array( 'key' => 'field_s_value', 'name' => 'value', 'label' => __( 'Value', 'qubyx' ), 'type' => 'text' ),
				),
			),

			// COMPARISON
			array( 'key' => 'field_p_tab_compare', 'type' => 'tab', 'label' => __( 'Comparison', 'qubyx' ) ),
			array( 'key' => 'field_p_compare_intro', 'name' => 'comparison_intro', 'label' => __( 'Comparison intro', 'qubyx' ), 'type' => 'textarea', 'rows' => 2 ),
			array(
				'key' => 'field_p_compare_columns', 'name' => 'comparison_columns', 'label' => __( 'Plans / columns', 'qubyx' ),
				'type' => 'repeater', 'layout' => 'table',
				'sub_fields' => array(
					array( 'key' => 'field_cc_name',      'name' => 'name',      'label' => __( 'Plan name', 'qubyx' ),     'type' => 'text' ),
					array( 'key' => 'field_cc_highlight', 'name' => 'highlight', 'label' => __( 'Highlighted?', 'qubyx' ),  'type' => 'true_false' ),
				),
			),
			array(
				'key' => 'field_p_compare_rows', 'name' => 'comparison_rows', 'label' => __( 'Comparison rows', 'qubyx' ),
				'type' => 'repeater', 'layout' => 'block',
				'sub_fields' => array(
					array( 'key' => 'field_cr_feature', 'name' => 'feature', 'label' => __( 'Feature', 'qubyx' ), 'type' => 'text' ),
					array( 'key' => 'field_cr_values',  'name' => 'values',  'label' => __( 'Values (one per column)', 'qubyx' ), 'type' => 'repeater', 'layout' => 'table', 'sub_fields' => array(
						array( 'key' => 'field_crv', 'name' => 'value', 'label' => __( 'Value', 'qubyx' ), 'type' => 'text' ),
					) ),
				),
			),

			// FAQ
			array( 'key' => 'field_p_tab_faq', 'type' => 'tab', 'label' => __( 'FAQ', 'qubyx' ) ),
			array(
				'key' => 'field_p_faqs', 'name' => 'faqs', 'label' => __( 'FAQ items', 'qubyx' ),
				'type' => 'repeater', 'layout' => 'block',
				'sub_fields' => array(
					array( 'key' => 'field_fq', 'name' => 'question', 'label' => __( 'Question', 'qubyx' ), 'type' => 'text' ),
					array( 'key' => 'field_fa', 'name' => 'answer',   'label' => __( 'Answer', 'qubyx' ),   'type' => 'wysiwyg', 'media_upload' => 0 ),
				),
			),

			// FINAL CTA
			array( 'key' => 'field_p_tab_finalcta', 'type' => 'tab', 'label' => __( 'Final CTA', 'qubyx' ) ),
			array( 'key' => 'field_p_final_heading',  'name' => 'final_cta_heading',  'label' => __( 'Heading', 'qubyx' ),  'type' => 'text' ),
			array( 'key' => 'field_p_final_text',     'name' => 'final_cta_text',     'label' => __( 'Text', 'qubyx' ),     'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_p_final_primary',  'name' => 'final_cta_primary',  'label' => __( 'Primary CTA', 'qubyx' ),  'type' => 'link' ),
			array( 'key' => 'field_p_final_secondary','name' => 'final_cta_secondary','label' => __( 'Secondary CTA', 'qubyx' ),'type' => 'link' ),
		),
		'location' => array(
			array(
				array( 'param' => 'post_type', 'operator' => '==', 'value' => 'product' ),
			),
		),
	) );

	// =====================================================
	// RESOURCE / ARTICLE FIELDS
	// =====================================================
	acf_add_local_field_group( array(
		'key'    => 'group_qubyx_resource',
		'title'  => __( 'Resource Metadata', 'qubyx' ),
		'fields' => array(
			array( 'key' => 'field_r_reading_time', 'name' => 'reading_time', 'label' => __( 'Reading time (min)', 'qubyx' ), 'type' => 'number' ),
			array(
				'key'           => 'field_r_layout',
				'name'          => 'resource_layout',
				'label'         => __( 'Article layout', 'qubyx' ),
				'type'          => 'select',
				'choices'       => array(
					'guide' => __( 'Guide / long-form', 'qubyx' ),
					'news'  => __( 'News / product update', 'qubyx' ),
					'blog'  => __( 'Blog / opinion', 'qubyx' ),
				),
				'default_value' => 'guide',
				'return_format' => 'value',
			),
			array( 'key' => 'field_r_summary',      'name' => 'summary',      'label' => __( 'Summary / TL;DR', 'qubyx' ),    'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_r_show_toc',     'name' => 'show_toc',     'label' => __( 'Show Table of Contents?', 'qubyx' ), 'type' => 'true_false', 'default_value' => 1 ),
			array( 'key' => 'field_r_author_name',  'name' => 'resource_author_name', 'label' => __( 'Author name', 'qubyx' ), 'type' => 'text' ),
			array( 'key' => 'field_r_author_role',  'name' => 'resource_author_role', 'label' => __( 'Author role', 'qubyx' ), 'type' => 'text' ),
			array(
				'key'          => 'field_r_metrics',
				'name'         => 'resource_metrics',
				'label'        => __( 'Case study / guide metrics', 'qubyx' ),
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => __( 'Add metric', 'qubyx' ),
				'sub_fields'   => array(
					array( 'key' => 'field_r_metric_value', 'name' => 'value', 'label' => __( 'Value', 'qubyx' ), 'type' => 'text' ),
					array( 'key' => 'field_r_metric_label', 'name' => 'label', 'label' => __( 'Label', 'qubyx' ), 'type' => 'text' ),
				),
			),
			array(
				'key' => 'field_r_related', 'name' => 'related_resources', 'label' => __( 'Related resources', 'qubyx' ),
				'type' => 'relationship', 'post_type' => array( 'resource' ), 'min' => 0, 'max' => 3, 'return_format' => 'id',
			),
		),
		'location' => array(
			array(
				array( 'param' => 'post_type', 'operator' => '==', 'value' => 'resource' ),
			),
		),
	) );

	// =====================================================
	// FRONT PAGE FIELDS
	// =====================================================
	acf_add_local_field_group( array(
		'key'    => 'group_qubyx_front',
		'title'  => __( 'Front Page Sections', 'qubyx' ),
		'fields' => array(
			array( 'key' => 'field_fp_tab_hero', 'type' => 'tab', 'label' => __( 'Hero', 'qubyx' ) ),
			array( 'key' => 'field_fp_eyebrow',    'name' => 'hero_eyebrow',    'label' => __( 'Hero eyebrow', 'qubyx' ),    'type' => 'text', 'default_value' => 'DICOM display calibration' ),
			array( 'key' => 'field_fp_headline',   'name' => 'hero_headline',   'label' => __( 'Hero headline', 'qubyx' ),   'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_fp_accent',     'name' => 'hero_accent_phrase', 'label' => __( 'Hero accent phrase', 'qubyx' ), 'type' => 'text' ),
			array( 'key' => 'field_fp_subhead',    'name' => 'hero_subhead',    'label' => __( 'Hero subheading', 'qubyx' ), 'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_fp_hero_image', 'name' => 'hero_image',      'label' => __( 'Hero image', 'qubyx' ),      'type' => 'image', 'return_format' => 'array' ),
			array( 'key' => 'field_fp_cta_p',      'name' => 'hero_cta_primary','label' => __( 'Primary CTA', 'qubyx' ),     'type' => 'link' ),
			array( 'key' => 'field_fp_cta_s',      'name' => 'hero_cta_secondary','label' => __( 'Secondary CTA', 'qubyx' ),'type' => 'link' ),
			array( 'key' => 'field_fp_tab_features', 'type' => 'tab', 'label' => __( 'Features', 'qubyx' ) ),
			array(
				'key' => 'field_fp_features',
				'name' => 'features',
				'label' => __( 'Feature cards', 'qubyx' ),
				'type' => 'repeater',
				'layout' => 'block',
				'button_label' => __( 'Add feature', 'qubyx' ),
				'sub_fields' => array(
					array( 'key' => 'field_fp_feature_badge', 'name' => 'badge', 'label' => __( 'Badge', 'qubyx' ), 'type' => 'text' ),
					array( 'key' => 'field_fp_feature_title', 'name' => 'title', 'label' => __( 'Title', 'qubyx' ), 'type' => 'text' ),
					array( 'key' => 'field_fp_feature_desc', 'name' => 'description', 'label' => __( 'Description', 'qubyx' ), 'type' => 'textarea', 'rows' => 2 ),
					array( 'key' => 'field_fp_feature_span', 'name' => 'span', 'label' => __( 'Card span', 'qubyx' ), 'type' => 'select', 'choices' => array( '' => __( 'Default', 'qubyx' ), 'wide' => __( 'Wide', 'qubyx' ) ) ),
				),
			),
			array( 'key' => 'field_fp_tab_social', 'type' => 'tab', 'label' => __( 'Social proof', 'qubyx' ) ),
			array(
				'key' => 'field_fp_testimonials',
				'name' => 'testimonials',
				'label' => __( 'Testimonials', 'qubyx' ),
				'type' => 'repeater',
				'layout' => 'block',
				'button_label' => __( 'Add testimonial', 'qubyx' ),
				'sub_fields' => array(
					array( 'key' => 'field_fp_t_quote', 'name' => 'quote', 'label' => __( 'Quote', 'qubyx' ), 'type' => 'textarea', 'rows' => 3 ),
					array( 'key' => 'field_fp_t_name', 'name' => 'name', 'label' => __( 'Name', 'qubyx' ), 'type' => 'text' ),
					array( 'key' => 'field_fp_t_title', 'name' => 'title', 'label' => __( 'Title', 'qubyx' ), 'type' => 'text' ),
				),
			),
			array( 'key' => 'field_fp_tab_faq', 'type' => 'tab', 'label' => __( 'FAQ', 'qubyx' ) ),
			array(
				'key' => 'field_fp_faqs',
				'name' => 'faqs',
				'label' => __( 'FAQ items', 'qubyx' ),
				'type' => 'repeater',
				'layout' => 'block',
				'button_label' => __( 'Add FAQ', 'qubyx' ),
				'sub_fields' => array(
					array( 'key' => 'field_fp_faq_question', 'name' => 'question', 'label' => __( 'Question', 'qubyx' ), 'type' => 'text' ),
					array( 'key' => 'field_fp_faq_answer', 'name' => 'answer', 'label' => __( 'Answer', 'qubyx' ), 'type' => 'wysiwyg', 'media_upload' => 0 ),
				),
			),
			array( 'key' => 'field_fp_tab_cta', 'type' => 'tab', 'label' => __( 'Final CTA', 'qubyx' ) ),
			array( 'key' => 'field_fp_final_heading', 'name' => 'final_cta_heading', 'label' => __( 'Heading', 'qubyx' ), 'type' => 'text' ),
			array( 'key' => 'field_fp_final_text', 'name' => 'final_cta_text', 'label' => __( 'Text', 'qubyx' ), 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_fp_final_primary', 'name' => 'final_cta_primary', 'label' => __( 'Primary CTA', 'qubyx' ), 'type' => 'link' ),
			array( 'key' => 'field_fp_final_secondary', 'name' => 'final_cta_secondary', 'label' => __( 'Secondary CTA', 'qubyx' ), 'type' => 'link' ),
		),
		'location' => array(
			array(
				array( 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ),
			),
		),
	) );
}
