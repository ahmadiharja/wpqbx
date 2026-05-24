<?php
/**
 * Search results template.
 *
 * @package Qubyx
 */

get_header(); ?>

<section class="section section--page-header">
	<div class="container container--narrow">
		<p class="eyebrow"><span class="eyebrow__dot" aria-hidden="true"></span><?php esc_html_e( 'Search', 'qubyx' ); ?></p>
		<h1 class="h-display"><?php
			/* translators: %s: search query */
			printf( esc_html__( 'Results for %s', 'qubyx' ), '<em>' . esc_html( get_search_query() ) . '</em>' );
		?></h1>

		<form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input name="s" type="search" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search again', 'qubyx' ); ?>" />
			<button type="submit" class="btn btn--primary btn--sm"><?php esc_html_e( 'Search', 'qubyx' ); ?></button>
		</form>
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
						'eyebrow' => get_post_type_object( get_post_type() )->labels->singular_name,
					) ); ?>
				<?php endwhile; ?>
			</div>
			<div class="pagination">
				<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
			</div>
		<?php else : ?>
			<p class="text-muted"><?php esc_html_e( 'No matches. Try a different search.', 'qubyx' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer();
