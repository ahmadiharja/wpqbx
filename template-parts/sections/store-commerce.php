<?php
/**
 * Store commerce page used by the Store WordPress page.
 *
 * @package Qubyx
 */

$qubyx_store_products = array(
	array(
		'code'       => 'LUM',
		'icon'       => 'lum',
		'tag'        => __( 'Medical / DICOM', 'qubyx' ),
		'categories' => array( 'medical' ),
		'audiences'  => array( 'hospitals', 'education' ),
		'title'      => __( 'PerfectLum Workstation', 'qubyx' ),
		'plan'       => __( '1 workstation', 'qubyx' ),
		'price'      => '349',
		'unit'       => __( '/year', 'qubyx' ),
		'period'     => __( 'Annual, billed once', 'qubyx' ),
		'desc'       => __( 'DICOM GSDF calibration and certified reports for a single radiologist or technologist workstation.', 'qubyx' ),
		'links'      => array( array( __( 'See all 3 plans', 'qubyx' ), '/store/perfectlum/' ) ),
		'cta'        => __( 'Buy now', 'qubyx' ),
		'cta_href'   => '/store/perfectlum/',
	),
	array(
		'code'        => 'LUM',
		'icon'        => 'lum',
		'tag'         => __( 'Medical / DICOM', 'qubyx' ),
		'badge'       => __( 'Most popular', 'qubyx' ),
		'badge_class' => 'pop',
		'featured'    => true,
		'categories'  => array( 'medical' ),
		'audiences'   => array( 'hospitals', 'education' ),
		'title'       => __( 'PerfectLum Department', 'qubyx' ),
		'plan'        => __( '10 seats - radiology', 'qubyx' ),
		'price_old'   => '2290',
		'price'       => '1990',
		'unit'        => __( '/year', 'qubyx' ),
		'period'      => __( 'Annual, billed once', 'qubyx' ),
		'desc'        => __( 'Multiple workstations, shared QA history, and centralised reporting for hospital radiology departments.', 'qubyx' ),
		'links'       => array(
			array( __( 'See all 3 plans', 'qubyx' ), '/store/perfectlum/' ),
			array( __( 'Compare PerfectLum tiers', 'qubyx' ), '/store/perfectlum/' ),
		),
		'cta'         => __( 'Buy now', 'qubyx' ),
		'cta_href'    => '/store/perfectlum/',
	),
	array(
		'code'       => 'CHR',
		'icon'       => 'chr',
		'tag'        => __( 'Color / Creative', 'qubyx' ),
		'categories' => array( 'color' ),
		'audiences'  => array( 'color', 'education' ),
		'title'      => __( 'PerfectChroma Solo', 'qubyx' ),
		'plan'       => __( '1 seat - 3 displays', 'qubyx' ),
		'price'      => '149',
		'unit'       => __( '/year', 'qubyx' ),
		'period'     => __( 'Annual, billed once', 'qubyx' ),
		'desc'       => __( 'Single-seat color calibration for photographers, retouchers, colorists, and designers.', 'qubyx' ),
		'links'      => array( array( __( 'See all 3 plans', 'qubyx' ), '/store/perfectchroma/' ) ),
		'cta'        => __( 'Buy now', 'qubyx' ),
		'cta_href'   => '/store/perfectchroma/',
	),
	array(
		'code'       => 'CHR',
		'icon'       => 'chr',
		'tag'        => __( 'Color / Creative', 'qubyx' ),
		'categories' => array( 'color' ),
		'audiences'  => array( 'color', 'education' ),
		'title'      => __( 'PerfectChroma Studio', 'qubyx' ),
		'plan'       => __( '10 seats - production', 'qubyx' ),
		'price'      => '790',
		'unit'       => __( '/year', 'qubyx' ),
		'period'     => __( 'Annual, billed once', 'qubyx' ),
		'desc'       => __( 'Professional color calibration for studios standardising color across edit, design, and review rooms.', 'qubyx' ),
		'links'      => array( array( __( 'See all 3 plans', 'qubyx' ), '/store/perfectchroma/' ) ),
		'cta'        => __( 'Buy now', 'qubyx' ),
		'cta_href'   => '/store/perfectchroma/',
	),
	array(
		'code'       => 'EPD',
		'icon'       => 'epd',
		'tag'        => __( 'E-paper / OEM', 'qubyx' ),
		'categories' => array( 'epd' ),
		'audiences'  => array( 'oem', 'education' ),
		'title'      => __( 'PerfectEPD Lab', 'qubyx' ),
		'plan'       => __( '3 lab seats', 'qubyx' ),
		'price'      => '6990',
		'unit'       => __( '/year', 'qubyx' ),
		'period'     => __( 'Annual, billed once', 'qubyx' ),
		'desc'       => __( 'E-paper display validation, reflectance, contrast, and uniformity QA for OEM teams and labs.', 'qubyx' ),
		'links'      => array( array( __( 'See all 3 plans', 'qubyx' ), '/store/perfectepd/' ) ),
		'cta'        => __( 'Buy now', 'qubyx' ),
		'cta_href'   => '/store/perfectepd/',
	),
	array(
		'code'       => 'BUN',
		'icon'       => 'bun',
		'tag'        => __( 'Bundle - Save 15%', 'qubyx' ),
		'badge'      => __( 'Save 490', 'qubyx' ),
		'categories' => array( 'bundles', 'medical' ),
		'audiences'  => array( 'hospitals' ),
		'title'      => __( 'Hospital QA Bundle', 'qubyx' ),
		'plan'       => __( 'Software + Sensor + Onboarding', 'qubyx' ),
		'price_old'  => '3380',
		'price'      => '2890',
		'period'     => __( 'One-time, billed once', 'qubyx' ),
		'desc'       => __( 'PerfectLum Department + SmartSensor S1 + onboarding + 1 year priority support - one PO, one delivery.', 'qubyx' ),
		'links'      => array( array( __( 'See all bundles', 'qubyx' ), '/store/bundles/' ) ),
		'cta'        => __( 'Buy bundle', 'qubyx' ),
		'cta_href'   => '/store/bundles/',
	),
	array(
		'code'        => 'BUN',
		'icon'        => 'bun',
		'tag'         => __( 'Bundle - Best value', 'qubyx' ),
		'badge'       => __( 'Best value', 'qubyx' ),
		'badge_class' => 'pop',
		'categories'  => array( 'bundles', 'color' ),
		'audiences'   => array( 'color' ),
		'title'       => __( 'Creative Studio Kit', 'qubyx' ),
		'plan'        => __( 'PerfectChroma + S2 + setup', 'qubyx' ),
		'price_old'   => '4080',
		'price'       => '3490',
		'period'      => __( 'One-time, billed once', 'qubyx' ),
		'desc'        => __( 'PerfectChroma Studio + SmartSensor S2 + brand-color setup for production teams calibrating across the pipeline.', 'qubyx' ),
		'links'       => array( array( __( 'See all bundles', 'qubyx' ), '/store/bundles/' ) ),
		'cta'         => __( 'Buy bundle', 'qubyx' ),
		'cta_href'    => '/store/bundles/',
	),
	array(
		'code'       => 'BUN',
		'icon'       => 'bun',
		'tag'        => __( 'Bundle - OEM', 'qubyx' ),
		'categories' => array( 'bundles', 'epd' ),
		'audiences'  => array( 'oem' ),
		'title'      => __( 'OEM Validation Pack', 'qubyx' ),
		'plan'       => __( 'PerfectEPD + S2 + integration', 'qubyx' ),
		'price_old'  => '13280',
		'price'      => '11490',
		'period'     => __( 'One-time, billed once', 'qubyx' ),
		'desc'       => __( 'PerfectEPD Lab + SmartSensor S2 + production-line integration + dedicated engineer for display manufacturers.', 'qubyx' ),
		'links'      => array( array( __( 'See all bundles', 'qubyx' ), '/store/bundles/' ) ),
		'cta'        => __( 'Buy bundle', 'qubyx' ),
		'cta_href'   => '/store/bundles/',
	),
	array(
		'code'       => 'S1',
		'icon'       => 's1',
		'tag'        => __( 'Sensor hardware', 'qubyx' ),
		'categories' => array( 'sensors' ),
		'audiences'  => array( 'hospitals', 'color', 'education' ),
		'title'      => __( 'SmartSensor S1', 'qubyx' ),
		'plan'       => __( 'Photometric sensor', 'qubyx' ),
		'price'      => '590',
		'period'     => __( 'One-time, 3-year warranty', 'qubyx' ),
		'desc'       => __( 'Compact luminance and RGB sensor - plug-and-play USB-C, NIST-traceable, for routine workstation QA.', 'qubyx' ),
		'links'      => array( array( __( 'See full sensor catalog', 'qubyx' ), '/store/sensors/' ) ),
		'cta'        => __( 'Buy now', 'qubyx' ),
		'cta_href'   => '/store/sensors/',
	),
	array(
		'code'        => 'S2',
		'icon'        => 's2',
		'tag'         => __( 'Sensor hardware - Pro', 'qubyx' ),
		'badge'       => __( 'New', 'qubyx' ),
		'badge_class' => 'new',
		'categories'  => array( 'sensors' ),
		'audiences'   => array( 'color', 'oem' ),
		'title'       => __( 'SmartSensor S2', 'qubyx' ),
		'plan'        => __( 'Spectroradiometer', 'qubyx' ),
		'price'       => '2290',
		'period'      => __( 'One-time, 3-year warranty', 'qubyx' ),
		'desc'        => __( 'Advanced spectro for HDR, wider color gamut, and OEM validation - Delta E below 0.5, ISO 17025 calibration.', 'qubyx' ),
		'links'       => array( array( __( 'See full sensor catalog', 'qubyx' ), '/store/sensors/' ) ),
		'cta'         => __( 'Buy now', 'qubyx' ),
		'cta_href'    => '/store/sensors/',
	),
);

$qubyx_store_categories = array(
	'all'     => __( 'All products', 'qubyx' ),
	'medical' => __( 'Medical / DICOM', 'qubyx' ),
	'color'   => __( 'Color / Creative', 'qubyx' ),
	'epd'     => __( 'E-paper / OEM', 'qubyx' ),
	'sensors' => __( 'Sensors', 'qubyx' ),
	'bundles' => __( 'Bundles', 'qubyx' ),
);

$qubyx_store_faqs = array(
	array( __( 'Can I request a quote?', 'qubyx' ), __( 'Yes. Enterprise and volume buyers should request a quote or demo before purchasing.', 'qubyx' ) ),
	array( __( 'What can be sold here later?', 'qubyx' ), __( 'Software licenses, sensor bundles, maintenance plans, onboarding, and support services.', 'qubyx' ) ),
	array( __( 'Is WooCommerce planned?', 'qubyx' ), __( 'The page is designed to become a store experience while still supporting quote-led enterprise purchasing.', 'qubyx' ) ),
);
?>

<div class="adstore-page">
	<section class="adstore-hero">
		<div class="container">
			<h1 class="adstore-hero__title"><?php esc_html_e( 'Plans and pricing for QUBYX display quality.', 'qubyx' ); ?></h1>
			<p class="adstore-hero__sub"><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php esc_html_e( 'Learn more about QUBYX', 'qubyx' ); ?> <?php echo qubyx_icon( 'arrow-right', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a></p>
			<p class="adstore-hero__assurance"><?php esc_html_e( 'Start with confidence - 30-day free trial on every plan, no credit card.', 'qubyx' ); ?></p>
			<nav class="adstore-segments" aria-label="<?php esc_attr_e( 'Audience', 'qubyx' ); ?>">
				<a class="is-active" href="#" data-audience="hospitals"><?php esc_html_e( 'Hospitals', 'qubyx' ); ?></a>
				<a href="#" data-audience="color"><?php esc_html_e( 'Color pros', 'qubyx' ); ?></a>
				<a href="#" data-audience="oem"><?php esc_html_e( 'OEM & manufacturing', 'qubyx' ); ?></a>
				<a href="#" data-audience="education"><?php esc_html_e( 'Education', 'qubyx' ); ?></a>
			</nav>
		</div>
	</section>

	<div class="adstore-promo">
		<div class="container adstore-promo__inner">
			<span class="adstore-promo__icon" aria-hidden="true">*</span>
			<span class="adstore-promo__text"><?php esc_html_e( 'Save 15% on annual plans when paired with a SmartSensor bundle.', 'qubyx' ); ?> <a href="<?php echo esc_url( home_url( '/store/bundles/' ) ); ?>"><?php esc_html_e( 'See terms', 'qubyx' ); ?></a>.</span>
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
						<article class="adstore-card<?php echo ! empty( $product['featured'] ) ? ' is-featured' : ''; ?>" data-categories="<?php echo esc_attr( implode( ',', $product['categories'] ) ); ?>" data-audiences="<?php echo esc_attr( implode( ',', $product['audiences'] ) ); ?>">
							<div class="adstore-card__icon adstore-card__icon--<?php echo esc_attr( $product['icon'] ); ?>"><?php echo esc_html( $product['code'] ); ?></div>
							<?php if ( ! empty( $product['badge'] ) ) : ?>
								<span class="adstore-card__badge<?php echo ! empty( $product['badge_class'] ) ? ' adstore-card__badge--' . esc_attr( $product['badge_class'] ) : ''; ?>"><?php echo esc_html( $product['badge'] ); ?></span>
							<?php endif; ?>
							<p class="adstore-card__tag"><?php echo esc_html( $product['tag'] ); ?></p>
							<h2 class="adstore-card__title"><?php echo esc_html( $product['title'] ); ?></h2>
							<p class="adstore-card__plan"><?php echo esc_html( $product['plan'] ); ?></p>
							<div class="adstore-card__price-row">
								<?php if ( ! empty( $product['price_old'] ) ) : ?>
									<span class="adstore-card__price-old">&euro;<?php echo esc_html( number_format_i18n( (int) $product['price_old'] ) ); ?></span>
								<?php endif; ?>
								<span class="adstore-card__price">&euro;<?php echo esc_html( number_format_i18n( (int) $product['price'] ) ); ?><?php if ( ! empty( $product['unit'] ) ) : ?><small><?php echo esc_html( $product['unit'] ); ?></small><?php endif; ?></span>
							</div>
							<p class="adstore-card__period"><?php echo esc_html( $product['period'] ); ?></p>
							<p class="adstore-card__desc"><?php echo esc_html( $product['desc'] ); ?></p>
							<div class="adstore-card__links">
								<?php foreach ( $product['links'] as $link ) : ?>
									<a href="<?php echo esc_url( home_url( $link[1] ) ); ?>"><?php echo esc_html( $link[0] ); ?> <?php echo qubyx_icon( 'arrow-right', 13 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
								<?php endforeach; ?>
							</div>
							<div class="adstore-card__footer">
								<span class="adstore-card__secure"><?php echo qubyx_icon( 'shield', 13 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> <?php esc_html_e( 'Secure checkout', 'qubyx' ); ?></span>
								<a class="adstore-card__cta" href="<?php echo esc_url( home_url( $product['cta_href'] ) ); ?>"><?php echo esc_html( $product['cta'] ); ?></a>
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
				<div class="adstore-trust__item"><span class="adstore-trust__icon"><?php echo qubyx_icon( 'shield', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><strong><?php esc_html_e( 'Secure checkout', 'qubyx' ); ?></strong><p><?php esc_html_e( 'SSL-encrypted, PCI-compliant. We never store card details.', 'qubyx' ); ?></p></div>
				<div class="adstore-trust__item"><span class="adstore-trust__icon"><?php echo qubyx_icon( 'check', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><strong><?php esc_html_e( '30-day refund', 'qubyx' ); ?></strong><p><?php esc_html_e( 'Cancel within 30 days for a full refund, no questions.', 'qubyx' ); ?></p></div>
				<div class="adstore-trust__item"><span class="adstore-trust__icon"><?php echo qubyx_icon( 'check', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><strong><?php esc_html_e( 'Real-engineer onboarding', 'qubyx' ); ?></strong><p><?php esc_html_e( 'Onboarding from a medical-physics engineer, not a chatbot.', 'qubyx' ); ?></p></div>
				<div class="adstore-trust__item"><span class="adstore-trust__icon"><?php echo qubyx_icon( 'check', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><strong><?php esc_html_e( 'Used by 300+ hospitals', 'qubyx' ); ?></strong><p><?php esc_html_e( 'Trusted across 50 countries since 2002.', 'qubyx' ); ?></p></div>
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
