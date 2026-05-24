<?php
/**
 * Front Page template.
 *
 * Composes the marketing homepage from reusable section parts.
 *
 * @package Qubyx
 */

get_header();

get_template_part( 'template-parts/sections/hero' );
get_template_part( 'template-parts/sections/feature-grid' );
get_template_part( 'template-parts/sections/product-overview' );
get_template_part( 'template-parts/sections/comparison' );
get_template_part( 'template-parts/sections/testimonials' );
get_template_part( 'template-parts/sections/resource-grid' );
get_template_part( 'template-parts/sections/faq' );
get_template_part( 'template-parts/sections/cta' );

get_footer();
