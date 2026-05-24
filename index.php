<?php
/**
 * Fallback template — also serves as the blog index.
 *
 * @package Qubyx
 */

get_header(); ?>

<section class="section section--hero-sm">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Journal', 'qubyx' ); ?></p>
		<h1 class="h-display"><?php
			if ( is_home() ) {
				single_post_title();
			} elseif ( is_search() ) {
				/* translators: %s: search query. */
				printf( esc_html__( 'Search results for: %s', 'qubyx' ), '<em>' . esc_html( get_search_query() ) . '</em>' );
			} else {
				esc_html_e( 'Latest writing', 'qubyx' );
			}
		?></h1>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="card-grid card-grid--3">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/components/card', null, array(
						'href'       => get_permalink(),
						'title'      => get_the_title(),
						'excerpt'    => get_the_excerpt(),
						'image'      => get_the_post_thumbnail_url( null, 'large' ),
						'eyebrow'    => get_the_date(),
					) ); ?>
				<?php endwhile; ?>
			</div>

			<div class="pagination">
				<?php the_posts_pagination( array(
					'mid_size'  => 1,
					'prev_text' => __( '← Previous', 'qubyx' ),
					'next_text' => __( 'Next →', 'qubyx' ),
				) ); ?>
			</div>
		<?php else : ?>
			<p class="text-muted"><?php esc_html_e( 'Nothing here yet — check back soon.', 'qubyx' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/cta' ); ?>

<?php get_footer();
