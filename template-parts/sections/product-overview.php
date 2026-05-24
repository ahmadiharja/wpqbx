<?php
/**
 * Product overview for the QUBYX product portfolio.
 *
 * @package Qubyx
 */

$products = new WP_Query( array(
	'post_type'      => 'product',
	'posts_per_page' => 6,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
) );
?>
<section class="section section--products">
	<div class="container">
		<header class="section__header section__header--split">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Products', 'qubyx' ); ?></p>
				<h2 class="section__title">
					<?php esc_html_e( 'Calibration software, sensors,', 'qubyx' ); ?><br>
					<span class="accent"><?php esc_html_e( 'and remote QA infrastructure.', 'qubyx' ); ?></span>
				</h2>
			</div>
			<a class="link-arrow" href="<?php echo esc_url( get_post_type_archive_link( 'product' ) ?: home_url( '/products/' ) ); ?>">
				<?php esc_html_e( 'See all products', 'qubyx' ); ?>
				<?php echo qubyx_icon( 'arrow-right', 14 ); // phpcs:ignore ?>
			</a>
		</header>

		<div class="product-grid">
			<?php if ( $products->have_posts() ) :
				while ( $products->have_posts() ) : $products->the_post();
					$tag = qubyx_field( 'hero_eyebrow', '', get_the_ID() );
				?>
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
						<?php if ( $tag ) : ?><span class="product-card__tag"><?php echo esc_html( $tag ); ?></span><?php endif; ?>
						<h3 class="product-card__title"><?php the_title(); ?></h3>
						<p class="product-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
						<span class="product-card__link">
							<?php esc_html_e( 'Explore', 'qubyx' ); ?>
							<?php echo qubyx_icon( 'arrow-right', 14 ); // phpcs:ignore ?>
						</span>
					</div>
				</a>
			<?php endwhile; wp_reset_postdata(); else :
				// Fallback static cards when no CPT entries exist yet.
				$placeholders = array(
					array(
						'tag'   => __( 'Software', 'qubyx' ),
						'title' => __( 'PerfectLum', 'qubyx' ),
						'desc'  => __( 'Medical display calibration and DICOM QA software with scheduling, history, and reporting.', 'qubyx' ),
						'href'  => home_url( '/products/perfectlum/' ),
					),
					array(
						'tag'   => __( 'Color', 'qubyx' ),
						'title' => __( 'PerfectChroma', 'qubyx' ),
						'desc'  => __( 'Professional display calibration for photographers, editors, designers, and studios.', 'qubyx' ),
						'href'  => home_url( '/products/perfectchroma/' ),
					),
					array(
						'tag'   => __( 'Enterprise', 'qubyx' ),
						'title' => __( 'Qubyx RemoteQA', 'qubyx' ),
						'desc'  => __( 'Centralized QA across every site, workstation, and display fleet.', 'qubyx' ),
						'href'  => home_url( '/products/qubyx-remoteqa/' ),
					),
				);

				foreach ( $placeholders as $p ) : ?>
					<a class="product-card" href="<?php echo esc_url( $p['href'] ); ?>">
						<?php if ( ! empty( $p['flag'] ) ) : ?>
							<span class="product-card__flag"><?php echo esc_html( $p['flag'] ); ?></span>
						<?php endif; ?>
						<div class="product-card__visual product-card__visual--ghost">
							<?php echo qubyx_icon( 'sparkles', 32 ); // phpcs:ignore ?>
						</div>
						<div class="product-card__body">
							<span class="product-card__tag"><?php echo esc_html( $p['tag'] ); ?></span>
							<h3 class="product-card__title"><?php echo esc_html( $p['title'] ); ?></h3>
							<p class="product-card__excerpt"><?php echo esc_html( $p['desc'] ); ?></p>
							<span class="product-card__link">
								<?php esc_html_e( 'Explore', 'qubyx' ); ?>
								<?php echo qubyx_icon( 'arrow-right', 14 ); // phpcs:ignore ?>
							</span>
						</div>
					</a>
			<?php endforeach; endif; ?>
		</div>
	</div>
</section>
