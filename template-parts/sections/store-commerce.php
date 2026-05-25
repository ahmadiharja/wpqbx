<?php
/**
 * Store commerce page used by the Store WordPress page.
 *
 * @package Qubyx
 */

$qubyx_store_groups = qubyx_store_get_product_groups();
$qubyx_store_categories = array(
	'all'     => __( 'All products', 'qubyx' ),
	'medical' => __( 'Medical / DICOM', 'qubyx' ),
	'color'   => __( 'Color / Creative', 'qubyx' ),
	'epd'     => __( 'PerfectEPD', 'qubyx' ),
	'remote'  => __( 'Remote QA', 'qubyx' ),
	'sensors' => __( 'Sensors', 'qubyx' ),
	'bundles' => __( 'Bundles', 'qubyx' ),
	'free'    => __( 'Free tools', 'qubyx' ),
);
?>

<div class="adstore-page">
	<section class="adstore-hero">
		<div class="container">
			<h1 class="adstore-hero__title"><?php esc_html_e( 'Plans and pricing for QUBYX display quality.', 'qubyx' ); ?></h1>
			<p class="adstore-hero__sub"><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php esc_html_e( 'Learn more about QUBYX', 'qubyx' ); ?> <?php echo qubyx_icon( 'arrow-right', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a></p>
			<p class="adstore-hero__assurance"><?php esc_html_e( 'Choose a product, compare its plans, then add the exact option to cart.', 'qubyx' ); ?></p>
			<nav class="adstore-segments" role="tablist" aria-label="<?php esc_attr_e( 'Audience', 'qubyx' ); ?>">
				<button class="is-active" type="button" role="tab" aria-selected="true" data-audience="hospitals"><?php esc_html_e( 'Hospitals', 'qubyx' ); ?></button>
				<button type="button" role="tab" aria-selected="false" data-audience="color"><?php esc_html_e( 'Color pros', 'qubyx' ); ?></button>
				<button type="button" role="tab" aria-selected="false" data-audience="oem"><?php esc_html_e( 'OEM & manufacturing', 'qubyx' ); ?></button>
				<button type="button" role="tab" aria-selected="false" data-audience="consumer"><?php esc_html_e( 'Consumers', 'qubyx' ); ?></button>
				<button type="button" role="tab" aria-selected="false" data-audience="education"><?php esc_html_e( 'Education', 'qubyx' ); ?></button>
			</nav>
		</div>
	</section>

	<div class="adstore-promo">
		<div class="container adstore-promo__inner">
			<span class="adstore-promo__icon" aria-hidden="true">*</span>
			<span class="adstore-promo__text"><?php esc_html_e( 'PerfectLum and PerfectEPD use subscription-style plans. PerfectChroma is one-time purchase.', 'qubyx' ); ?></span>
			<a class="adstore-promo__btn" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php esc_html_e( 'View cart', 'qubyx' ); ?></a>
		</div>
	</div>

	<section class="adstore-catalog" id="all">
		<div class="container adstore-catalog__layout">
			<aside class="adstore-sidebar">
				<p class="adstore-sidebar__h"><?php esc_html_e( 'Categories', 'qubyx' ); ?></p>
				<ul>
					<?php foreach ( $qubyx_store_categories as $slug => $label ) : ?>
						<li>
							<a class="<?php echo 'all' === $slug ? 'is-active' : ''; ?>" href="#" data-category="<?php echo esc_attr( $slug ); ?>">
								<span class="ic" aria-hidden="true"><?php echo esc_html( strtoupper( substr( $slug, 0, 3 ) ) ); ?></span>
								<?php echo esc_html( $label ); ?>
								<span class="adstore-sidebar__count" data-count="<?php echo esc_attr( $slug ); ?>"></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				<p class="adstore-sidebar__h"><?php esc_html_e( 'Checkout', 'qubyx' ); ?></p>
				<ul>
					<li><a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><span class="ic" aria-hidden="true">CRT</span><?php esc_html_e( 'View cart', 'qubyx' ); ?></a></li>
					<li><a href="<?php echo esc_url( wc_get_checkout_url() ); ?>"><span class="ic" aria-hidden="true">PAY</span><?php esc_html_e( 'Checkout', 'qubyx' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>"><span class="ic" aria-hidden="true">QT</span><?php esc_html_e( 'Request quote', 'qubyx' ); ?></a></li>
				</ul>
			</aside>

			<div>
				<div class="adstore-toolbar">
					<p class="adstore-count" data-store-count><strong><?php esc_html_e( '0 results', 'qubyx' ); ?></strong> <?php esc_html_e( 'in All products', 'qubyx' ); ?></p>
				</div>

				<?php if ( empty( $qubyx_store_groups ) ) : ?>
					<p class="adstore-empty"><?php esc_html_e( 'No WooCommerce Store products found. Run the QUBYX importer to create the Store catalog.', 'qubyx' ); ?></p>
				<?php else : ?>
					<div class="adstore-grid" data-store-grid>
						<?php foreach ( $qubyx_store_groups as $group ) : ?>
							<?php $active_plan = $group['plans'][0] ?? array(); ?>
							<article class="adstore-card<?php echo ! empty( $group['featured'] ) ? ' is-featured' : ''; ?>" data-store-card data-categories="<?php echo esc_attr( implode( ',', $group['categories'] ) ); ?>" data-audiences="<?php echo esc_attr( implode( ',', $group['audiences'] ) ); ?>">
								<div class="adstore-card__icon adstore-card__icon--<?php echo esc_attr( $group['icon'] ); ?>"><?php echo esc_html( $group['code'] ); ?></div>
								<?php if ( ! empty( $group['badge'] ) ) : ?>
									<span class="adstore-card__badge<?php echo ! empty( $group['badge_class'] ) ? ' adstore-card__badge--' . esc_attr( $group['badge_class'] ) : ''; ?>"><?php echo esc_html( $group['badge'] ); ?></span>
								<?php endif; ?>
								<p class="adstore-card__tag"><?php echo esc_html( $group['tag'] ); ?></p>
								<h2 class="adstore-card__title"><?php echo esc_html( $group['title'] ); ?></h2>
								<p class="adstore-card__desc"><?php echo esc_html( $group['desc'] ); ?></p>

								<div class="adstore-plan-tabs" role="tablist" aria-label="<?php echo esc_attr( $group['title'] ); ?>">
									<?php foreach ( $group['plans'] as $index => $plan ) : ?>
										<button class="<?php echo 0 === $index ? 'is-active' : ''; ?>" type="button" data-plan-tab="<?php echo esc_attr( $plan['id'] ); ?>">
											<span class="adstore-plan-tabs__name"><?php echo esc_html( $plan['plan'] ); ?></span>
											<?php if ( ! empty( $plan['period'] ) ) : ?>
												<span class="adstore-plan-tabs__meta"><?php echo esc_html( $plan['period'] ); ?></span>
											<?php endif; ?>
										</button>
									<?php endforeach; ?>
								</div>

								<?php foreach ( $group['plans'] as $index => $plan ) : ?>
									<div class="adstore-plan<?php echo 0 === $index ? ' is-active' : ''; ?>" data-plan-panel="<?php echo esc_attr( $plan['id'] ); ?>" <?php echo 0 === $index ? '' : 'hidden'; ?>>
										<p class="adstore-card__plan"><?php echo esc_html( $plan['title'] ); ?></p>
										<div class="adstore-card__price-row">
											<?php if ( ! empty( $plan['price_old_html'] ) ) : ?>
												<span class="adstore-card__price-old"><?php echo wp_kses_post( $plan['price_old_html'] ); ?></span>
											<?php endif; ?>
											<span class="adstore-card__price"><?php echo wp_kses_post( $plan['price_html'] ); ?></span>
										</div>
										<?php if ( ! empty( $plan['period'] ) ) : ?>
											<p class="adstore-card__period"><?php echo esc_html( $plan['period'] ); ?></p>
										<?php endif; ?>
										<p class="adstore-card__desc"><?php echo esc_html( $plan['desc'] ); ?></p>
										<?php if ( ! empty( $plan['features'] ) ) : ?>
											<ul class="adstore-card__features">
												<?php foreach ( array_slice( $plan['features'], 0, 7 ) as $feature ) : ?>
													<li><?php echo qubyx_icon( 'check', 13 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo esc_html( $feature ); ?></li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
										<div class="adstore-card__footer">
											<span class="adstore-card__secure"><?php echo qubyx_icon( 'shield', 13 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php esc_html_e( 'WooCommerce product', 'qubyx' ); ?></span>
											<a class="adstore-card__cta" href="<?php echo esc_url( $plan['cta_href'] ); ?>"><?php echo esc_html( $plan['cta'] ); ?></a>
										</div>
									</div>
								<?php endforeach; ?>
							</article>
						<?php endforeach; ?>
					</div>
					<p class="adstore-empty" data-store-empty hidden><?php esc_html_e( 'No products match your selection. Try clearing the category filter or switching audience tab.', 'qubyx' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
