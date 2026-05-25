<?php
/**
 * Feature grid with bento layout and pill badges.
 *
 * ACF `features` repeater fields per item: badge, title, description, span ('wide' or '')
 *
 * @package Qubyx
 */

$features = qubyx_field( 'features', array() );
$eyebrow  = qubyx_field( 'features_eyebrow', __( 'QUBYX platform', 'qubyx' ) );
$heading  = qubyx_field( 'features_heading', __( 'Software, sensors, and', 'qubyx' ) );
$accent   = qubyx_field( 'features_accent', __( 'remote QA for critical displays.', 'qubyx' ) );
$lede     = qubyx_field( 'features_intro', __( 'Build a managed program for calibration, verification, reporting, and display quality evidence across medical and professional environments.', 'qubyx' ) );

if ( empty( $features ) ) {
	$features = array(
		array(
			'badge'       => __( 'Medical QA', 'qubyx' ),
			'title'       => __( 'DICOM calibration for diagnostic confidence', 'qubyx' ),
			'description' => __( 'PerfectLum supports DICOM Part 14 GSDF calibration, scheduled QA, history, and reporting for medical display programs.', 'qubyx' ),
			'span'        => 'wide',
		),
		array(
			'badge'       => __( 'Remote QA', 'qubyx' ),
			'title'       => __( 'Fleet visibility across every site', 'qubyx' ),
			'description' => __( 'Qubyx RemoteQA centralizes scheduling, status review, reporting, and export-ready evidence across connected displays.', 'qubyx' ),
		),
		array(
			'badge'       => __( 'Color', 'qubyx' ),
			'title'       => __( 'Professional color verification', 'qubyx' ),
			'description' => __( 'PerfectChroma gives creative teams a practical path to repeatable color, presets, validation, and documentation.', 'qubyx' ),
		),
		array(
			'badge'       => __( 'Sensors', 'qubyx' ),
			'title'       => __( 'Hardware for repeatable measurements', 'qubyx' ),
			'description' => __( 'SmartSensor S1 and S2 position QUBYX as a software-plus-measurement platform, not just another utility.', 'qubyx' ),
		),
		array(
			'badge'       => __( 'Content engine', 'qubyx' ),
			'title'       => __( 'SEO pages for buying, comparing, and troubleshooting', 'qubyx' ),
			'description' => __( 'The content model supports product hubs, comparison pages, compliance guides, technical notes, blog posts, news, and store journeys.', 'qubyx' ),
			'span'        => 'wide',
		),
	);
}
?>
<section class="section section--features" id="features">
	<div class="container">
		<header class="section__header">
			<p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 class="section__title">
				<?php echo esc_html( $heading ); ?>
				<span class="accent"><?php echo esc_html( $accent ); ?></span>
			</h2>
			<p class="section__lede">
				<?php echo esc_html( $lede ); ?>
			</p>
		</header>

		<div class="bento">
			<?php foreach ( $features as $f ) :
				$span  = $f['span'] ?? '';
				$badge = $f['badge'] ?? __( 'Feature', 'qubyx' );
				$title = $f['title'] ?? '';
				$desc  = $f['description'] ?? '';
				?>
				<article class="bento__cell <?php echo esc_attr( $span ? 'bento__cell--' . $span : '' ); ?>">
					<span class="bento__badge"><?php echo esc_html( $badge ); ?></span>
					<h3 class="bento__title"><?php echo esc_html( $title ); ?></h3>
					<p class="bento__desc"><?php echo esc_html( $desc ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
