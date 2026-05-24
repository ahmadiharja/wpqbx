<?php
/**
 * Hero section with centered enterprise headline, accent phrase, and product mockup.
 *
 * ACF fields read (all optional):
 *   hero_eyebrow, hero_headline, hero_accent_phrase, hero_subhead,
 *   hero_cta_primary, hero_image
 *
 * If `hero_accent_phrase` matches a substring of `hero_headline`, it'll be wrapped
 * in <span class="accent"> for the colored highlight.
 *
 * @package Qubyx
 */

$eyebrow  = qubyx_field( 'hero_eyebrow',  __( 'Enterprise display calibration and QA', 'qubyx' ) );
$headline = qubyx_field( 'hero_headline', __( 'QUBYX display quality infrastructure for every screen that matters', 'qubyx' ) );
$accent   = qubyx_field( 'hero_accent_phrase', __( 'every screen that matters', 'qubyx' ) );
$subhead  = qubyx_field( 'hero_subhead',  __( 'QUBYX builds calibration software, remote QA systems, and measurement sensors for medical imaging, color-critical production, OEM display validation, and enterprise display fleets.', 'qubyx' ) );
$image    = qubyx_field( 'hero_image' );
$cta_p    = qubyx_field( 'hero_cta_primary' );

// Build heading with optional accent wrap.
$rendered_headline = esc_html( $headline );
if ( ! empty( $accent ) && false !== stripos( $headline, $accent ) ) {
	$rendered_headline = str_ireplace(
		$accent,
		'<span class="accent">' . esc_html( $accent ) . '</span>',
		esc_html( $headline )
	);
}
?>
<section class="section section--hero">
	<div class="hero-bg" aria-hidden="true"></div>

	<div class="container hero__container">
		<div class="hero__copy">
			<p class="eyebrow">
				<span class="eyebrow__dot" aria-hidden="true"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</p>

			<h1 class="hero__title"><?php echo $rendered_headline; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped above ?></h1>

			<p class="hero__subtitle"><?php echo esc_html( $subhead ); ?></p>

			<div class="hero__actions">
				<?php
				if ( $cta_p ) {
					qubyx_render_link( $cta_p, 'btn--primary btn--lg', __( 'Request enterprise demo', 'qubyx' ) );
				} else {
					echo '<a class="btn btn--primary btn--lg" href="' . esc_url( home_url( '/request-demo/' ) ) . '"><span>' . esc_html__( 'Request enterprise demo', 'qubyx' ) . '</span>' . qubyx_icon( 'arrow-right', 14, 'class="btn__icon"' ) . '</a>'; // phpcs:ignore
				}
				?>
			</div>

			<p class="hero__trust">
				<span><?php esc_html_e( 'Medical QA', 'qubyx' ); ?></span>
				<span class="hero__trust-divider" aria-hidden="true"></span>
				<span class="hero__trust-rating">
					<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
					<?php esc_html_e( 'Color-critical production', 'qubyx' ); ?>
				</span>
			</p>
		</div>

		<?php if ( $image && is_array( $image ) ) : ?>
			<div class="hero__mockup">
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" loading="eager" style="width:100%;border-radius:var(--r-xl);" />
			</div>
		<?php else : ?>
			<div class="hero__mockup" aria-hidden="true">
				<div class="hero__mockup-window">
					<div class="hero__mockup-titlebar">
						<span></span><span></span><span></span>
						<code>qubyx.com / remoteqa</code>
					</div>
					<div class="hero__mockup-canvas">
						<div class="hero__mockup-sidebar">
							<div class="hero__mockup-sidebar-row is-active"><span class="dot"></span> <?php esc_html_e( 'Fleet', 'qubyx' ); ?></div>
							<div class="hero__mockup-sidebar-row"><span class="dot"></span> <?php esc_html_e( 'PerfectLum', 'qubyx' ); ?></div>
							<div class="hero__mockup-sidebar-row"><span class="dot"></span> <?php esc_html_e( 'PerfectChroma', 'qubyx' ); ?></div>
							<div class="hero__mockup-sidebar-row"><span class="dot"></span> <?php esc_html_e( 'RemoteQA', 'qubyx' ); ?></div>
							<div class="hero__mockup-sidebar-row"><span class="dot"></span> <?php esc_html_e( 'Sensors', 'qubyx' ); ?></div>
							<div class="hero__mockup-sidebar-row"><span class="dot"></span> <?php esc_html_e( 'Reports', 'qubyx' ); ?></div>
						</div>
						<div class="hero__mockup-main">
							<div class="hero__mockup-cards">
								<div class="hero__mockup-card"><p class="label"><?php esc_html_e( 'Displays', 'qubyx' ); ?></p><p class="value">1,248</p></div>
								<div class="hero__mockup-card is-accent"><p class="label"><?php esc_html_e( 'Verified', 'qubyx' ); ?></p><p class="value">98.7%</p></div>
								<div class="hero__mockup-card"><p class="label"><?php esc_html_e( 'Sites', 'qubyx' ); ?></p><p class="value">42</p></div>
								<div class="hero__mockup-card"><p class="label"><?php esc_html_e( 'Reports', 'qubyx' ); ?></p><p class="value">8.4k</p></div>
							</div>
							<div class="hero__mockup-chart">
								<div class="hero__mockup-chart-header">
									<strong><?php esc_html_e( 'QA completion / last 30 days', 'qubyx' ); ?></strong>
								</div>
								<div class="hero__mockup-chart-bars">
									<div style="--h: 48%"></div><div style="--h: 62%"></div><div style="--h: 55%"></div>
									<div style="--h: 70%"></div><div style="--h: 64%"></div><div style="--h: 78%"></div>
									<div style="--h: 72%"></div><div style="--h: 84%"></div><div style="--h: 80%"></div>
									<div style="--h: 88%"></div><div style="--h: 95%"></div><div style="--h: 100%"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>

	<div class="hero__marquee" aria-hidden="true">
		<div class="hero__marquee-track">
			<span><?php esc_html_e( 'Software', 'qubyx' ); ?></span><span>/</span>
			<span>PerfectLum</span><span>/</span>
			<span>PerfectChroma</span><span>/</span>
			<span>PerfectEPD</span><span>/</span>
			<span>Qubyx RemoteQA</span><span>/</span>
			<span>SmartSensor S1</span><span>/</span>
			<span>SmartSensor S2</span><span>/</span>
			<span><?php esc_html_e( 'Enterprise display QA', 'qubyx' ); ?></span><span>/</span>
			<span><?php esc_html_e( 'Medical imaging', 'qubyx' ); ?></span><span>/</span>
			<span><?php esc_html_e( 'Color management', 'qubyx' ); ?></span><span>/</span>
		</div>
	</div>
</section>
