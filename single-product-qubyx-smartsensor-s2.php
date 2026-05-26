<?php
/**
 * Single Product template for QUBYX SmartSensor S2.
 *
 * @package Qubyx
 */

get_header();

$asset_base = QUBYX_THEME_URI . '/assets/images/smartsensor-s2/';
$specs      = array(
	array( 'label' => 'Connection', 'value' => 'USB, I2C, UART' ),
	array( 'label' => 'Filter technology', 'value' => 'CIE tristimulus glass filter' ),
	array( 'label' => 'Resolution', 'value' => '20 bit' ),
	array( 'label' => 'Calibration and verification', 'value' => 'Background verification and automatic recalibration when out of range' ),
	array( 'label' => 'Supported backlights', 'value' => 'CCFL, LED, RGB LED, OLED' ),
	array( 'label' => 'Dynamic range', 'value' => '0.001 to 5000 cd/m2' ),
	array( 'label' => 'Wavelength range', 'value' => '400 - 690 nm' ),
);
$accuracy   = array(
	array( 'metric' => 'White accuracy', 'standard' => '+/- 0.002', 'low' => '+/- 0.0035' ),
	array( 'metric' => 'Color accuracy', 'standard' => '+/- 0.0035', 'low' => '+/- 0.006' ),
	array( 'metric' => 'Luminance accuracy', 'standard' => '+/- 2%', 'low' => '+/- 4%' ),
	array( 'metric' => 'Repeatability', 'standard' => '+/- 0.001, 0.5%', 'low' => '+/- 0.002, 2%' ),
	array( 'metric' => 'Measurement speed', 'standard' => '0.5 sec / measurement', 'low' => '0.5 sec / measurement' ),
);
?>

<main class="s2-product">
	<section class="s2-hero">
		<div class="container s2-hero__grid">
			<div class="s2-hero__copy">
				<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
				<p class="s2-kicker"><?php esc_html_e( 'Consumer display calibration sensor', 'qubyx' ); ?></p>
				<h1><?php esc_html_e( 'QUBYX SmartSensor S2', 'qubyx' ); ?></h1>
				<p><?php esc_html_e( 'Premium external measurement for users who want dependable monitor, TV, and projector calibration without turning color accuracy into a lab project.', 'qubyx' ); ?></p>
				<div class="s2-hero__actions">
					<a class="btn btn--primary btn--lg" href="<?php echo esc_url( home_url( '/store/sensors/' ) ); ?>"><?php esc_html_e( 'View sensor options', 'qubyx' ); ?></a>
					<a class="btn btn--ghost btn--lg" href="<?php echo esc_url( home_url( '/products/perfectchroma/' ) ); ?>"><?php esc_html_e( 'Pair with PerfectChroma', 'qubyx' ); ?></a>
				</div>
			</div>
			<figure class="s2-hero__media">
				<img src="<?php echo esc_url( $asset_base . 'smartsensor-s2-source-1-1.jpeg' ); ?>" alt="<?php esc_attr_e( 'QUBYX SmartSensor S2 attached to a professional monitor', 'qubyx' ); ?>" />
			</figure>
		</div>
	</section>

	<section class="s2-strip">
		<div class="container">
			<div><span><?php esc_html_e( 'Dynamic range', 'qubyx' ); ?></span><strong><?php esc_html_e( '0.001 to 5000 cd/m2', 'qubyx' ); ?></strong></div>
			<div><span><?php esc_html_e( 'Measurement speed', 'qubyx' ); ?></span><strong><?php esc_html_e( '0.5 sec / measurement', 'qubyx' ); ?></strong></div>
			<div><span><?php esc_html_e( 'Works with', 'qubyx' ); ?></span><strong><?php esc_html_e( 'Displays, TVs, and projectors', 'qubyx' ); ?></strong></div>
			<div><span><?php esc_html_e( 'Software ecosystem', 'qubyx' ); ?></span><strong><?php esc_html_e( 'PerfectChroma, PerfectLum, PerfectEPD, RemoteQA', 'qubyx' ); ?></strong></div>
		</div>
	</section>

	<section class="section s2-intro">
		<div class="container s2-two-col">
			<div>
				<p class="s2-kicker"><?php esc_html_e( 'Why it exists', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'Accurate calibration begins with accurate measurement.', 'qubyx' ); ?></h2>
			</div>
			<div class="s2-intro__copy">
				<p><?php esc_html_e( 'SmartSensor S2 is a professional external colorimeter designed for contact and distance measurements. For consumer buyers, that means a practical measurement device for a personal workstation, home studio, editing suite, design desk, or high-end viewing setup.', 'qubyx' ); ?></p>
				<p><?php esc_html_e( 'It gives the calibration workflow reliable optical data, so color, luminance, ambient light, and display behavior can be checked with confidence over time.', 'qubyx' ); ?></p>
			</div>
		</div>
	</section>

	<section class="section s2-workflow">
		<div class="container">
			<div class="s2-section-head">
				<p class="s2-kicker"><?php esc_html_e( 'Consumer workflow', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'A clearer path from setup to repeatable color.', 'qubyx' ); ?></h2>
			</div>
			<div class="s2-steps">
				<article><span>01</span><h3><?php esc_html_e( 'Place the sensor', 'qubyx' ); ?></h3><p><?php esc_html_e( 'Use contact measurement for monitor calibration or distance measurement where positioning and repeatability matter.', 'qubyx' ); ?></p></article>
				<article><span>02</span><h3><?php esc_html_e( 'Measure the display', 'qubyx' ); ?></h3><p><?php esc_html_e( 'Capture luminance and color readings for calibration, verification, and color-managed display workflows.', 'qubyx' ); ?></p></article>
				<article><span>03</span><h3><?php esc_html_e( 'Calibrate with QUBYX', 'qubyx' ); ?></h3><p><?php esc_html_e( 'Pair S2 with QUBYX software such as PerfectChroma for creative monitor calibration or PerfectLum for medical display QA.', 'qubyx' ); ?></p></article>
				<article><span>04</span><h3><?php esc_html_e( 'Keep checking over time', 'qubyx' ); ?></h3><p><?php esc_html_e( 'Use repeatable verification to reduce guesswork after display aging, room changes, or new creative delivery requirements.', 'qubyx' ); ?></p></article>
			</div>
		</div>
	</section>

	<section class="section s2-showcase">
		<div class="container s2-showcase__grid">
			<figure>
				<img src="<?php echo esc_url( $asset_base . 'smartsensor-s2-source-2-2.png' ); ?>" alt="<?php esc_attr_e( 'QUBYX SmartSensor S2 distance measurement sensor body', 'qubyx' ); ?>" loading="lazy" />
			</figure>
			<figure>
				<img src="<?php echo esc_url( $asset_base . 'smartsensor-s2-source-2-4.jpeg' ); ?>" alt="<?php esc_attr_e( 'QUBYX SmartSensor S2 contact measurement sensor body', 'qubyx' ); ?>" loading="lazy" />
			</figure>
			<div>
				<p class="s2-kicker"><?php esc_html_e( 'Two measurement modes', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'Contact and distance measurement for real-world setups.', 'qubyx' ); ?></h2>
				<p><?php esc_html_e( 'S2 is built for displays, TVs, and projectors, so the same product story can support creators, editors, home theater users, medical reviewers, and technical teams that need consistent readings without an embedded OEM sensor.', 'qubyx' ); ?></p>
			</div>
		</div>
	</section>

	<section class="section s2-capabilities">
		<div class="container">
			<div class="s2-section-head">
				<p class="s2-kicker"><?php esc_html_e( 'Measurement capability', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'What SmartSensor S2 helps you measure.', 'qubyx' ); ?></h2>
			</div>
			<div class="s2-capability-grid">
				<article><h3><?php esc_html_e( 'Accurate luminance', 'qubyx' ); ?></h3><p><?php esc_html_e( 'Measure display brightness and luminance response to keep visual performance consistent across professional screens.', 'qubyx' ); ?></p></article>
				<article><h3><?php esc_html_e( 'Reliable color', 'qubyx' ); ?></h3><p><?php esc_html_e( 'Capture color values for calibration, verification, and color-managed workflows in creative and technical environments.', 'qubyx' ); ?></p></article>
				<article><h3><?php esc_html_e( 'Long-term stability', 'qubyx' ); ?></h3><p><?php esc_html_e( 'Use a stable optical measurement path for recurring QA checks and calibration maintenance over time.', 'qubyx' ); ?></p></article>
				<article><h3><?php esc_html_e( 'Advanced optics', 'qubyx' ); ?></h3><p><?php esc_html_e( 'Support demanding readings from grayscale response checks to color accuracy verification.', 'qubyx' ); ?></p></article>
				<article><h3><?php esc_html_e( 'Ambient light support', 'qubyx' ); ?></h3><p><?php esc_html_e( 'Evaluate room conditions that affect how display color and contrast are perceived.', 'qubyx' ); ?></p></article>
				<article><h3><?php esc_html_e( 'Distance workflow support', 'qubyx' ); ?></h3><p><?php esc_html_e( 'Keep positioning consistent for setups where viewing distance and measurement geometry affect results.', 'qubyx' ); ?></p></article>
			</div>
		</div>
	</section>

	<section class="section s2-ecosystem">
		<div class="container s2-two-col">
			<div>
				<p class="s2-kicker"><?php esc_html_e( 'QUBYX ecosystem', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'One sensor path across calibration and QA software.', 'qubyx' ); ?></h2>
			</div>
			<div class="s2-links">
				<a href="<?php echo esc_url( home_url( '/products/perfectchroma/' ) ); ?>"><strong><?php esc_html_e( 'PerfectChroma', 'qubyx' ); ?></strong><span><?php esc_html_e( 'Consumer and creative monitor calibration workflows.', 'qubyx' ); ?></span></a>
				<a href="<?php echo esc_url( home_url( '/products/perfectlum/' ) ); ?>"><strong><?php esc_html_e( 'PerfectLum', 'qubyx' ); ?></strong><span><?php esc_html_e( 'Medical display calibration, DICOM QA, and reporting.', 'qubyx' ); ?></span></a>
				<a href="<?php echo esc_url( home_url( '/products/perfectepd/' ) ); ?>"><strong><?php esc_html_e( 'PerfectEPD', 'qubyx' ); ?></strong><span><?php esc_html_e( 'Specialized display verification for mapping and imagery workflows.', 'qubyx' ); ?></span></a>
				<a href="<?php echo esc_url( home_url( '/products/qubyx-remoteqa/' ) ); ?>"><strong><?php esc_html_e( 'RemoteQA', 'qubyx' ); ?></strong><span><?php esc_html_e( 'Centralized status, review, and quality assurance context.', 'qubyx' ); ?></span></a>
			</div>
		</div>
	</section>

	<section class="section s2-specs">
		<div class="container s2-two-col">
			<div>
				<p class="s2-kicker"><?php esc_html_e( 'Specification', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'Official S2 brochure details.', 'qubyx' ); ?></h2>
			</div>
			<div class="s2-spec-table">
				<?php foreach ( $specs as $row ) : ?>
					<div><span><?php echo esc_html( $row['label'] ); ?></span><strong><?php echo esc_html( $row['value'] ); ?></strong></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section s2-accuracy">
		<div class="container">
			<div class="s2-section-head">
				<p class="s2-kicker"><?php esc_html_e( 'Accuracy ranges', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'Standard and low-light measurement performance.', 'qubyx' ); ?></h2>
			</div>
			<div class="s2-accuracy-table">
				<div class="s2-accuracy-table__row s2-accuracy-table__row--head">
					<span><?php esc_html_e( 'Metric', 'qubyx' ); ?></span>
					<span><?php esc_html_e( 'Standard range: 1 cd/m2 < Y < 5000 cd/m2', 'qubyx' ); ?></span>
					<span><?php esc_html_e( 'Low-light range: 0.05 cd/m2 < Y < 1.0 cd/m2', 'qubyx' ); ?></span>
				</div>
				<?php foreach ( $accuracy as $row ) : ?>
					<div class="s2-accuracy-table__row">
						<span><?php echo esc_html( $row['metric'] ); ?></span>
						<span><?php echo esc_html( $row['standard'] ); ?></span>
						<span><?php echo esc_html( $row['low'] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="s2-final">
		<div class="container">
			<div>
				<p><?php esc_html_e( 'Premium external display measurement', 'qubyx' ); ?></p>
				<h2><?php esc_html_e( 'Ready to calibrate your own screen with better measurement confidence?', 'qubyx' ); ?></h2>
			</div>
			<a class="btn btn--invert btn--lg" href="<?php echo esc_url( home_url( '/store/sensors/' ) ); ?>"><?php esc_html_e( 'View sensor options', 'qubyx' ); ?></a>
		</div>
	</section>
</main>

<?php
get_footer();
