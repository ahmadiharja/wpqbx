<?php
/**
 * Product archive template.
 *
 * @package Qubyx
 */

get_header();
?>

<section class="section section--page-header">
	<div class="container container--narrow">
		<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
		<p class="eyebrow"><span class="eyebrow__dot" aria-hidden="true"></span><?php esc_html_e( 'Products', 'qubyx' ); ?></p>
		<h1 class="h-display"><?php esc_html_e( 'QUBYX product portfolio', 'qubyx' ); ?></h1>
		<p class="page__lede"><?php esc_html_e( 'Calibration software, remote QA infrastructure, and measurement sensors for medical, color-critical, OEM, and enterprise display workflows.', 'qubyx' ); ?></p>
	</div>
</section>

<section class="section section--products">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="product-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $tag = qubyx_field( 'hero_eyebrow', '', get_the_ID() ); ?>
					<a class="product-card" href="<?php the_permalink(); ?>">
						<div class="product-card__visual">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'qubyx-card', array( 'loading' => 'lazy' ) ); ?>
							<?php else : ?>
								<div class="product-card__visual-placeholder">
									<?php echo qubyx_icon( 'sparkles', 32 ); // phpcs:ignore ?>
								</div>
							<?php endif; ?>
						</div>
						<div class="product-card__body">
							<?php if ( $tag ) : ?>
								<span class="product-card__tag"><?php echo esc_html( $tag ); ?></span>
							<?php endif; ?>
							<h2 class="product-card__title"><?php the_title(); ?></h2>
							<p class="product-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
							<span class="product-card__link">
								<?php esc_html_e( 'Explore product', 'qubyx' ); ?>
								<?php echo qubyx_icon( 'arrow-right', 14 ); // phpcs:ignore ?>
							</span>
						</div>
					</a>
				<?php endwhile; ?>
			</div>

			<div class="pagination">
				<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
			</div>
		<?php else : ?>
			<p class="text-muted"><?php esc_html_e( 'Product pages will appear here after running the Qubyx Content Importer.', 'qubyx' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/cta' ); ?>
<?php get_footer(); ?>
