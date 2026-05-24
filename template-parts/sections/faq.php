<?php
/**
 * FAQ section with native <details>.
 *
 * @package Qubyx
 */

$faqs = qubyx_field( 'faqs', array(
	array(
		'question' => __( 'What does QUBYX make?', 'qubyx' ),
		'answer'   => __( 'QUBYX makes display calibration, verification, remote QA, and measurement products for medical imaging, color-critical production, OEM display validation, and enterprise display operations.', 'qubyx' ),
	),
	array(
		'question' => __( 'Which products are part of the QUBYX site?', 'qubyx' ),
		'answer'   => __( 'The enterprise site covers PerfectLum, PerfectChroma, PerfectEPD, Qubyx RemoteQA, Qubyx SmartSensor S1, and Qubyx SmartSensor S2.', 'qubyx' ),
	),
	array(
		'question' => __( 'Can the content be translated with WPML?', 'qubyx' ),
		'answer'   => __( 'Yes. The importer saves content into WordPress pages, posts, product CPT entries, resource CPT entries, and ACF/post meta. Use WPML post translation plus ACFML for field translations; seed strings are also registered for WPML String Translation.', 'qubyx' ),
	),
	array(
		'question' => __( 'Can this support a store?', 'qubyx' ),
		'answer'   => __( 'Yes. The importer creates a Store page and product navigation now. WooCommerce can be added later for checkout, quotes, bundles, maintenance plans, and subscriptions.', 'qubyx' ),
	),
) );

if ( empty( $faqs ) ) {
	return;
}
?>
<section class="section section--faq" id="faq">
	<div class="container faq__container">
		<header class="section__header">
			<p class="eyebrow"><?php esc_html_e( 'FAQ', 'qubyx' ); ?></p>
			<h2 class="section__title">
				<?php esc_html_e( 'Questions, answered', 'qubyx' ); ?>
				<span class="accent"><?php esc_html_e( 'plainly.', 'qubyx' ); ?></span>
			</h2>
		</header>

		<div class="faq" itemscope itemtype="https://schema.org/FAQPage">
			<?php foreach ( $faqs as $i => $faq ) : ?>
				<details class="faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"<?php echo 0 === $i ? ' open' : ''; ?>>
					<summary class="faq__q">
						<span itemprop="name"><?php echo esc_html( $faq['question'] ); ?></span>
						<span class="faq__icon" aria-hidden="true">
							<?php echo qubyx_icon( 'plus', 18, 'class="faq__icon-plus"' ); // phpcs:ignore ?>
							<?php echo qubyx_icon( 'minus', 18, 'class="faq__icon-minus"' ); // phpcs:ignore ?>
						</span>
					</summary>
					<div class="faq__a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<div itemprop="text"><?php echo wp_kses_post( wpautop( $faq['answer'] ) ); ?></div>
					</div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
