<?php
/**
 * Final CTA section.
 *
 * @package Qubyx
 */

$heading   = qubyx_field( 'final_cta_heading',   __( 'Bring every critical display into a managed QA program.', 'qubyx' ) );
$text      = qubyx_field( 'final_cta_text',      __( 'Talk with QUBYX about software, sensors, remote QA, volume licensing, and partner deployment.', 'qubyx' ) );
$primary   = qubyx_field( 'final_cta_primary' );
$secondary = qubyx_field( 'final_cta_secondary' );
?>
<section class="section section--cta">
	<div class="container">
		<div class="cta">
			<div class="cta__inner">
				<p class="eyebrow eyebrow--invert">
					<span class="eyebrow__dot" aria-hidden="true"></span>
					<?php esc_html_e( 'Enterprise demo', 'qubyx' ); ?>
				</p>
				<h2 class="cta__title"><?php echo esc_html( $heading ); ?></h2>
				<p class="cta__text"><?php echo esc_html( $text ); ?></p>
				<div class="cta__actions">
					<?php
					if ( $primary ) {
						qubyx_render_link( $primary, 'btn--invert btn--lg', __( 'Request demo', 'qubyx' ) );
					} else {
						echo '<a class="btn btn--invert btn--lg" href="' . esc_url( home_url( '/request-demo/' ) ) . '">' . esc_html__( 'Request demo', 'qubyx' ) . qubyx_icon( 'arrow-right', 14, 'class="btn__icon"' ) . '</a>'; // phpcs:ignore
					}
					if ( $secondary ) {
						qubyx_render_link( $secondary, 'btn--ghost-invert btn--lg', __( 'Talk to sales', 'qubyx' ) );
					} else {
						echo '<a class="btn btn--ghost-invert btn--lg" href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html__( 'Talk to sales', 'qubyx' ) . '</a>'; // phpcs:ignore
					}
					?>
				</div>
				<ul class="cta__assurances">
					<li><?php echo qubyx_icon( 'check', 14 ); ?> <?php esc_html_e( 'Product walkthrough', 'qubyx' ); ?></li>
					<li><?php echo qubyx_icon( 'check', 14 ); ?> <?php esc_html_e( 'Deployment planning', 'qubyx' ); ?></li>
					<li><?php echo qubyx_icon( 'check', 14 ); ?> <?php esc_html_e( 'Volume licensing', 'qubyx' ); ?></li>
					<li><?php echo qubyx_icon( 'check', 14 ); ?> <?php esc_html_e( 'Partner support', 'qubyx' ); ?></li>
				</ul>
			</div>
		</div>
	</div>
</section>
