<?php
/**
 * OEM supplier-style product layout.
 *
 * @package Qubyx
 */

$title       = qubyx_field( 'hero_headline', get_the_title() );
$description = qubyx_field( 'hero_description', get_the_excerpt() );
$gallery     = qubyx_field( 'oem_gallery', array() );
$quick_facts = qubyx_field( 'oem_quick_facts', array() );
$procurement = qubyx_field( 'oem_procurement_rows', array() );
$capabilities = qubyx_field( 'oem_capabilities', array() );
$customization = qubyx_field( 'oem_customization', array() );
$applications = qubyx_field( 'oem_applications', array() );
$accuracy_rows = qubyx_field( 'oem_accuracy_rows', array() );
$specs = qubyx_field( 'specifications', array() );
$primary_cta = qubyx_field( 'cta_primary' );
$secondary_cta = qubyx_field( 'cta_secondary' );
$sku = qubyx_field( 'oem_sku', 'S1 OEM module' );
$lead = qubyx_field( 'oem_lead_time', 'Project-based' );
$moq = qubyx_field( 'oem_moq', 'By OEM program' );
$sample = qubyx_field( 'oem_sample_policy', 'Engineering sample on request' );

if ( empty( $gallery ) ) {
	$hero = qubyx_field( 'hero_image_url', '' );
	if ( $hero ) {
		$gallery[] = array( 'image' => $hero, 'label' => __( 'Integrated display view', 'qubyx' ) );
	}
}
?>

<main class="oem-product">
	<section class="oem-product__hero">
		<div class="container">
			<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
			<div class="oem-product__grid">
				<div class="oem-gallery" aria-label="<?php esc_attr_e( 'Product gallery', 'qubyx' ); ?>">
					<?php if ( ! empty( $gallery ) ) : ?>
						<figure class="oem-gallery__main">
							<img src="<?php echo esc_url( $gallery[0]['image'] ?? '' ); ?>" alt="<?php echo esc_attr( $gallery[0]['label'] ?? $title ); ?>" />
						</figure>
						<div class="oem-gallery__thumbs">
							<?php foreach ( $gallery as $item ) : ?>
								<figure>
									<img src="<?php echo esc_url( $item['image'] ?? '' ); ?>" alt="<?php echo esc_attr( $item['label'] ?? $title ); ?>" loading="lazy" />
								</figure>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="oem-summary">
					<p class="oem-summary__eyebrow"><?php esc_html_e( 'OEM / ODM Display Calibration Module', 'qubyx' ); ?></p>
					<h1><?php echo esc_html( $title ); ?></h1>
					<p class="oem-summary__desc"><?php echo esc_html( $description ); ?></p>

					<div class="oem-summary__meta" aria-label="<?php esc_attr_e( 'Procurement summary', 'qubyx' ); ?>">
						<div><span><?php esc_html_e( 'Model', 'qubyx' ); ?></span><strong><?php echo esc_html( $sku ); ?></strong></div>
						<div><span><?php esc_html_e( 'MOQ', 'qubyx' ); ?></span><strong><?php echo esc_html( $moq ); ?></strong></div>
						<div><span><?php esc_html_e( 'Lead time', 'qubyx' ); ?></span><strong><?php echo esc_html( $lead ); ?></strong></div>
						<div><span><?php esc_html_e( 'Sample', 'qubyx' ); ?></span><strong><?php echo esc_html( $sample ); ?></strong></div>
					</div>

					<div class="oem-summary__actions">
						<?php qubyx_render_link( $primary_cta, 'btn--primary btn--lg', __( 'Request OEM quote', 'qubyx' ) ); ?>
						<?php qubyx_render_link( $secondary_cta, 'btn--ghost btn--lg', __( 'Ask for datasheet', 'qubyx' ) ); ?>
					</div>

					<div class="oem-summary__supplier">
						<strong><?php esc_html_e( 'QUBYX supplier profile', 'qubyx' ); ?></strong>
						<span><?php esc_html_e( 'Precision display calibration, hardware, and fleet management solutions for OEM and regulated display workflows.', 'qubyx' ); ?></span>
					</div>
				</div>

				<aside class="oem-inquiry" aria-label="<?php esc_attr_e( 'Inquiry panel', 'qubyx' ); ?>">
					<p><?php esc_html_e( 'Inquiry actions', 'qubyx' ); ?></p>
					<a class="oem-inquiry__primary" href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>"><?php esc_html_e( 'Contact supplier', 'qubyx' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Send technical question', 'qubyx' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/store/sensors/' ) ); ?>"><?php esc_html_e( 'View sensor catalog', 'qubyx' ); ?></a>
				</aside>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $quick_facts ) ) : ?>
		<section class="oem-band">
			<div class="container oem-facts">
				<?php foreach ( $quick_facts as $fact ) : ?>
					<div>
						<span><?php echo esc_html( $fact['label'] ?? '' ); ?></span>
						<strong><?php echo esc_html( $fact['value'] ?? '' ); ?></strong>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<section class="section oem-section">
		<div class="container oem-two-col">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Procurement overview', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'Built for display manufacturers that need calibration inside the product.', 'qubyx' ); ?></h2>
			</div>
			<div class="oem-data-list">
				<?php foreach ( $procurement as $row ) : ?>
					<div>
						<span><?php echo esc_html( $row['label'] ?? '' ); ?></span>
						<strong><?php echo esc_html( $row['value'] ?? '' ); ?></strong>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $capabilities ) ) : ?>
		<section class="section oem-section oem-section--soft">
			<div class="container">
				<div class="oem-section__head">
					<p class="eyebrow"><?php esc_html_e( 'OEM capability', 'qubyx' ); ?></p>
					<h2><?php esc_html_e( 'What the S1 adds to a display product line.', 'qubyx' ); ?></h2>
				</div>
				<div class="oem-capability-grid">
					<?php foreach ( $capabilities as $item ) : ?>
						<article>
							<span><?php echo esc_html( $item['badge'] ?? '' ); ?></span>
							<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
							<p><?php echo esc_html( $item['description'] ?? '' ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="section oem-section">
		<div class="container oem-detail-grid">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Technical specification', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'Module, measurement, and interface details.', 'qubyx' ); ?></h2>
			</div>
			<div class="oem-spec-table">
				<?php foreach ( $specs as $row ) : ?>
					<div><span><?php echo esc_html( $row['label'] ?? '' ); ?></span><strong><?php echo esc_html( $row['value'] ?? '' ); ?></strong></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $accuracy_rows ) ) : ?>
		<section class="section oem-section oem-section--soft">
			<div class="container">
				<div class="oem-section__head">
					<p class="eyebrow"><?php esc_html_e( 'Measurement performance', 'qubyx' ); ?></p>
					<h2><?php esc_html_e( 'Accuracy ranges from the official S1 brochure.', 'qubyx' ); ?></h2>
				</div>
				<div class="oem-accuracy">
					<div class="oem-accuracy__row oem-accuracy__row--head">
						<span><?php esc_html_e( 'Metric', 'qubyx' ); ?></span>
						<span><?php esc_html_e( 'Standard range', 'qubyx' ); ?></span>
						<span><?php esc_html_e( 'Low-light range', 'qubyx' ); ?></span>
					</div>
					<?php foreach ( $accuracy_rows as $row ) : ?>
						<div class="oem-accuracy__row">
							<span><?php echo esc_html( $row['metric'] ?? '' ); ?></span>
							<span><?php echo esc_html( $row['standard'] ?? '' ); ?></span>
							<span><?php echo esc_html( $row['low'] ?? '' ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="section oem-section">
		<div class="container oem-split-list">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Customization options', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'A practical OEM conversation starter.', 'qubyx' ); ?></h2>
				<ul>
					<?php foreach ( $customization as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Applications', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'Where embedded measurement matters.', 'qubyx' ); ?></h2>
				<ul>
					<?php foreach ( $applications as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<section class="oem-final">
		<div class="container">
			<div>
				<p><?php esc_html_e( 'OEM display calibration hardware', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'Ready to evaluate SmartSensor S1 for your display program?', 'qubyx' ); ?></h2>
			</div>
			<a class="btn btn--invert btn--lg" href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>"><?php esc_html_e( 'Request OEM quote', 'qubyx' ); ?></a>
		</div>
	</section>

	<div class="oem-sticky-inquiry" aria-label="<?php esc_attr_e( 'Sticky inquiry bar', 'qubyx' ); ?>">
		<div class="container">
			<span><?php esc_html_e( 'QUBYX SmartSensor S1', 'qubyx' ); ?></span>
			<strong><?php esc_html_e( 'Embedded OEM calibration module', 'qubyx' ); ?></strong>
			<a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>"><?php esc_html_e( 'Contact supplier', 'qubyx' ); ?></a>
		</div>
	</div>
</main>
