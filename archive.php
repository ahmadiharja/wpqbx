<?php
/**
 * Generic archive template (used for tags, dates, taxonomies, and CPT archives without their own template).
 *
 * @package Qubyx
 */

get_header(); ?>

<section class="section section--page-header">
	<div class="container container--narrow">
		<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
		<p class="eyebrow"><span class="eyebrow__dot" aria-hidden="true"></span><?php
			if ( is_post_type_archive( 'product' ) ) {
				esc_html_e( 'Products', 'qubyx' );
			} elseif ( is_post_type_archive( 'resource' ) ) {
				esc_html_e( 'Resources', 'qubyx' );
			} else {
				esc_html_e( 'Archive', 'qubyx' );
			}
		?></p>
		<h1 class="h-display"><?php the_archive_title(); ?></h1>
		<?php $desc = get_the_archive_description(); if ( $desc ) : ?>
			<p class="page__lede"><?php echo wp_kses_post( $desc ); ?></p>
		<?php endif; ?>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="card-grid card-grid--3">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/components/card', null, array(
						'href'    => get_permalink(),
						'title'   => get_the_title(),
						'excerpt' => get_the_excerpt(),
						'image'   => get_the_post_thumbnail_url( null, 'qubyx-card' ),
						'eyebrow' => get_the_date(),
					) ); ?>
				<?php endwhile; ?>
			</div>

			<div class="pagination">
				<?php the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => __( '← Previous', 'qubyx' ), 'next_text' => __( 'Next →', 'qubyx' ) ) ); ?>
			</div>
		<?php else : ?>
			<p class="text-muted"><?php esc_html_e( 'Nothing here yet.', 'qubyx' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/cta' ); ?>
<?php get_footer();
