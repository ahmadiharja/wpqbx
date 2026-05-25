<?php
/**
 * Store commerce page used by the Store WordPress page.
 *
 * @package Qubyx
 */

$qubyx_store_products = qubyx_store_get_products();
$qubyx_store_categories = array(
	'all'     => __( 'All products', 'qubyx' ),
	'medical' => __( 'Medical / DICOM', 'qubyx' ),
	'color'   => __( 'Color / Creative', 'qubyx' ),
	'epd'     => __( 'E-paper / OEM', 'qubyx' ),
	'remote'  => __( 'Remote QA', 'qubyx' ),
	'sensors' => __( 'Sensors', 'qubyx' ),
	'bundles' => __( 'Bundles', 'qubyx' ),
	'free'    => __( 'Free tools', 'qubyx' ),
);

$qubyx_store_faqs = array(
	array( __( 'Are Store cards managed in WooCommerce?', 'qubyx' ), __( 'Yes. Products marked as QUBYX Store products in WooCommerce feed this catalog. Title, price, sale price, description, and product URL come from WooCommerce.', 'qubyx' ) ),
	array( __( 'Which products are subscriptions?', 'qubyx' ), __( 'PerfectLum and PerfectEPD are positioned as annual maintenance or subscription products. PerfectChroma is positioned as a one-time purchase.', 'qubyx' ) ),
	array( __( 'Can I request a quote?', 'qubyx' ), __( 'Yes. OEM, enterprise, sensor, and volume buyers should request a quote or demo before purchasing.', 'qubyx' ) ),
);
?>

<div class="adstore-page">
	<section class="adstore-hero">
		<div class="container">
			<h1 class="adstore-hero__title"><?php esc_html_e( 'Plans and pricing for QUBYX display quality.', 'qubyx' ); ?></h1>
			<p class="adstore-hero__sub"><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php esc_html_e( 'Learn more about QUBYX', 'qubyx' ); ?> <?php echo qubyx_icon( 'arrow-right', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a></p>
			<p class="adstore-hero__assurance"><?php esc_html_e( 'Software, sensors, free tools, and bundles for medical, creative, OEM, and consumer display workflows.', 'qubyx' ); ?></p>
			<nav class="adstore-segments" aria-label="<?php esc_attr_e( 'Audience', 'qubyx' ); ?>">
				<a class="is-active" href="#" data-audience="hospitals"><?php esc_html_e( 'Hospitals', 'qubyx' ); ?></a>
				<a href="#" data-audience="color"><?php esc_html_e( 'Color pros', 'qubyx' ); ?></a>
				<a href="#" data-audience="oem"><?php esc_html_e( 'OEM & manufacturing', 'qubyx' ); ?></a>
				<a href="#" data-audience="consumer"><?php esc_html_e( 'Consumers', 'qubyx' ); ?></a>
				<a href="#" data-audience="education"><?php esc_html_e( 'Education', 'qubyx' ); ?></a>
			</nav>
		</div>
	</section>

	<div class="adstore-promo">
		<div class="container adstore-promo__inner">
			<span class="adstore-promo__icon" aria-hidden="true">*</span>
			<span class="adstore-promo__text"><?php esc_html_e( 'PerfectLum and PerfectEPD use subscription-style maintenance. PerfectChroma plans are one-time purchases.', 'qubyx' ); ?></span>
			<a class="adstore-promo__btn" href="<?php echo esc_url( home_url( '/store/bundles/' ) ); ?>"><?php esc_html_e( 'View bundles', 'qubyx' ); ?></a>
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
				<p class="adstore-sidebar__h"><?php esc_html_e( 'For organisations', 'qubyx' ); ?></p>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/store/enterprise/' ) ); ?>"><span class="ic" aria-hidden="true">ENT</span><?php esc_html_e( 'Enterprise', 'qubyx' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/store/education/' ) ); ?>"><span class="ic" aria-hidden="true">EDU</span><?php esc_html_e( 'Education', 'qubyx' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>"><span class="ic" aria-hidden="true">QT</span><?php esc_html_e( 'Request quote', 'qubyx' ); ?></a></li>
				</ul>
			</aside>

			<div>
				<div class="adstore-toolbar">
					<p class="adstore-count" data-store-count><strong><?php esc_html_e( '0 results', 'qubyx' ); ?></strong> <?php esc_html_e( 'in All products', 'qubyx' ); ?></p>
					<div class="adstore-sort">
						<label for="qubyx_store_sort"><?php esc_html_e( 'Sort by', 'qubyx' ); ?></label>
						<select id="qubyx_store_sort">
							<option><?php esc_html_e( 'Recommended', 'qubyx' ); ?></option>
							<option><?php esc_html_e( 'Price low to high', 'qubyx' ); ?></option>
							<option><?php esc_html_e( 'Price high to low', 'qubyx' ); ?></option>
							<option><?php esc_html_e( 'Newest', 'qubyx' ); ?></option>
						</select>
					</div>
				</div>

				<div class="adstore-grid" data-store-grid>
					<?php foreach ( $qubyx_store_products as $product ) : ?>
						<?php
						$categories = ! empty( $product['categories'] ) ? $product['categories'] : array( 'all' );
						$audiences  = ! empty( $product['audiences'] ) ? $product['audiences'] : array( 'hospitals' );
						?>
						<article class="adstore-card<?php echo ! empty( $product['featured'] ) ? ' is-featured' : ''; ?>" data-categories="<?php echo esc_attr( implode( ',', $categories ) ); ?>" data-audiences="<?php echo esc_attr( implode( ',', $audiences ) ); ?>">
							<div class="adstore-card__icon adstore-card__icon--<?php echo esc_attr( $product['icon'] ?? 'lum' ); ?>"><?php echo esc_html( $product['code'] ?? 'QB' ); ?></div>
							<?php if ( ! empty( $product['badge'] ) ) : ?>
								<span class="adstore-card__badge<?php echo ! empty( $product['badge_class'] ) ? ' adstore-card__badge--' . esc_attr( $product['badge_class'] ) : ''; ?>"><?php echo esc_html( $product['badge'] ); ?></span>
							<?php endif; ?>
							<p class="adstore-card__tag"><?php echo esc_html( $product['tag'] ?? '' ); ?></p>
							<h2 class="adstore-card__title"><?php echo esc_html( $product['title'] ?? '' ); ?></h2>
							<p class="adstore-card__plan"><?php echo esc_html( $product['plan'] ?? '' ); ?></p>
							<div class="adstore-card__price-row">
								<?php if ( ! empty( $product['price_old_html'] ) ) : ?>
									<span class="adstore-card__price-old"><?php echo wp_kses_post( $product['price_old_html'] ); ?></span>
								<?php endif; ?>
								<span class="adstore-card__price"><?php echo wp_kses_post( $product['price_html'] ?? '' ); ?></span>
							</div>
							<?php if ( ! empty( $product['period'] ) ) : ?>
								<p class="adstore-card__period"><?php echo esc_html( $product['period'] ); ?></p>
							<?php endif; ?>
							<p class="adstore-card__desc"><?php echo esc_html( $product['desc'] ?? '' ); ?></p>
							<?php if ( ! empty( $product['features'] ) ) : ?>
								<ul class="adstore-card__features">
									<?php foreach ( array_slice( $product['features'], 0, 5 ) as $feature ) : ?>
										<li><?php echo qubyx_icon( 'check', 13 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php echo esc_html( $feature ); ?></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
							<div class="adstore-card__links">
								<?php foreach ( $product['links'] ?? array() as $link ) : ?>
									<a href="<?php echo esc_url( 0 === strpos( $link[1], 'http' ) ? $link[1] : home_url( $link[1] ) ); ?>"><?php echo esc_html( $link[0] ); ?> <?php echo qubyx_icon( 'arrow-right', 13 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
								<?php endforeach; ?>
							</div>
							<div class="adstore-card__footer">
								<span class="adstore-card__secure"><?php echo qubyx_icon( 'shield', 13 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php esc_html_e( 'WooCommerce product', 'qubyx' ); ?></span>
								<a class="adstore-card__cta" href="<?php echo esc_url( $product['cta_href'] ?? '#' ); ?>"><?php echo esc_html( $product['cta'] ?? __( 'View details', 'qubyx' ) ); ?></a>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
				<p class="adstore-empty" data-store-empty hidden><?php esc_html_e( 'No products match your selection. Try clearing the category filter or switching audience tab.', 'qubyx' ); ?></p>
			</div>
		</div>
	</section>

	<section class="adstore-trust">
		<div class="container">
			<div class="adstore-trust__grid">
				<div class="adstore-trust__item"><span class="adstore-trust__icon"><?php echo qubyx_icon( 'shield', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><strong><?php esc_html_e( 'WooCommerce managed', 'qubyx' ); ?></strong><p><?php esc_html_e( 'Update prices, sale prices, titles, and product descriptions from Products in WordPress admin.', 'qubyx' ); ?></p></div>
				<div class="adstore-trust__item"><span class="adstore-trust__icon"><?php echo qubyx_icon( 'check', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><strong><?php esc_html_e( 'Correct plan types', 'qubyx' ); ?></strong><p><?php esc_html_e( 'PerfectLum and PerfectEPD are annual. PerfectChroma is one-time purchase.', 'qubyx' ); ?></p></div>
				<div class="adstore-trust__item"><span class="adstore-trust__icon"><?php echo qubyx_icon( 'check', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><strong><?php esc_html_e( 'Hardware positioning', 'qubyx' ); ?></strong><p><?php esc_html_e( 'SmartSensor S1 is positioned for OEM/manufacturing; SmartSensor S2 for consumer and creative buyers.', 'qubyx' ); ?></p></div>
				<div class="adstore-trust__item"><span class="adstore-trust__icon"><?php echo qubyx_icon( 'check', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><strong><?php esc_html_e( 'Free entry products', 'qubyx' ); ?></strong><p><?php esc_html_e( 'Qubyx Web Remote QA and QUBYX OS Tools can appear beside paid products without checkout friction.', 'qubyx' ); ?></p></div>
			</div>
		</div>
	</section>

	<section class="adstore-catalog">
		<div class="container">
			<div class="adstore-faq">
				<h2><?php esc_html_e( 'Frequently asked questions', 'qubyx' ); ?></h2>
				<?php foreach ( $qubyx_store_faqs as $faq ) : ?>
					<details>
						<summary><?php echo esc_html( $faq[0] ); ?></summary>
						<div><?php echo esc_html( $faq[1] ); ?></div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
