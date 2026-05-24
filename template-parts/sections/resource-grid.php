<?php
/**
 * Resource grid — latest 3 articles.
 *
 * @package Qubyx
 */

$resources = new WP_Query( array(
	'post_type'      => 'resource',
	'posts_per_page' => 3,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

if ( ! $resources->have_posts() ) {
	// Soft-fail with built-in posts so the section still renders.
	$resources = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
	) );
}
if ( ! $resources->have_posts() ) {
	return;
}
?>
<section class="section section--resources">
	<div class="container">
		<header class="section__header section__header--split">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Resource library', 'qubyx' ); ?></p>
				<h2 class="section__title">
					<?php esc_html_e( 'Guides, comparisons,', 'qubyx' ); ?>
					<span class="accent"><?php esc_html_e( 'technical notes, and news.', 'qubyx' ); ?></span>
				</h2>
			</div>
			<a class="link-arrow" href="<?php echo esc_url( get_post_type_archive_link( 'resource' ) ?: home_url( '/resources/' ) ); ?>">
				<?php esc_html_e( 'Open resources', 'qubyx' ); ?>
				<?php echo qubyx_icon( 'arrow-right', 14 ); // phpcs:ignore ?>
			</a>
		</header>

		<div class="resource-grid">
			<?php while ( $resources->have_posts() ) : $resources->the_post();
				$reading = qubyx_reading_time( get_the_ID() );
				$cats    = get_the_terms( get_the_ID(), 'resource_category' );
				$cat     = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : get_post_type_object( get_post_type() )->labels->singular_name;
				?>
				<a class="resource-card" href="<?php the_permalink(); ?>">
					<div class="resource-card__media">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'qubyx-card', array( 'loading' => 'lazy' ) ); ?>
						<?php else : ?>
							<div class="resource-card__media-ghost"><?php echo qubyx_icon( 'sparkles', 28 ); // phpcs:ignore ?></div>
						<?php endif; ?>
					</div>
					<div class="resource-card__body">
						<p class="mono resource-card__meta">
							<?php echo esc_html( $cat ); ?>
							<span aria-hidden="true">/</span>
							<?php echo esc_html( sprintf( /* translators: %d: minutes */ __( '%d min read', 'qubyx' ), $reading ) ); ?>
						</p>
						<h3 class="resource-card__title"><?php the_title(); ?></h3>
						<p class="resource-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
					</div>
				</a>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
