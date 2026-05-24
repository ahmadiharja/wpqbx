<?php
/**
 * Page template with section-aware layouts.
 *
 * @package Qubyx
 */

get_header();
while ( have_posts() ) :
	the_post();

	$page_path = trim( (string) get_page_uri( get_the_ID() ), '/' );
	$slug      = get_post_field( 'post_name', get_the_ID() );
	$family    = 'company';

	if ( 'store' === $slug ) {
		$family = 'store';
	} elseif ( 0 === strpos( $page_path, 'solutions' ) || 0 === strpos( $page_path, 'industries' ) ) {
		$family = 'solution';
	} elseif ( 0 === strpos( $page_path, 'support' ) || in_array( $slug, array( 'downloads', 'security' ), true ) ) {
		$family = 'support';
	} elseif ( 0 === strpos( $page_path, 'resources' ) || 0 === strpos( $page_path, 'compare' ) || in_array( $slug, array( 'blog' ), true ) ) {
		$family = 'resource';
	} elseif ( 'products' === $slug ) {
		$family = 'product';
	}

	$family_data = array(
		'product'  => array(
			'label' => __( 'Product portfolio', 'qubyx' ),
			'items' => array(
				array( __( 'Software', 'qubyx' ), __( 'Calibration and QA products for medical, creative, OEM, and EPD workflows.', 'qubyx' ) ),
				array( __( 'Remote QA', 'qubyx' ), __( 'Fleet visibility, schedules, reports, and status review for managed programs.', 'qubyx' ) ),
				array( __( 'Sensors', 'qubyx' ), __( 'Measurement hardware paths for repeatable luminance, color, and validation checks.', 'qubyx' ) ),
			),
			'links' => array(
				array( __( 'PerfectLum', 'qubyx' ), '/products/perfectlum/' ),
				array( __( 'PerfectChroma', 'qubyx' ), '/products/perfectchroma/' ),
				array( __( 'Qubyx RemoteQA', 'qubyx' ), '/products/qubyx-remoteqa/' ),
			),
		),
		'solution' => array(
			'label' => __( 'Solution workflow', 'qubyx' ),
			'items' => array(
				array( __( 'Define', 'qubyx' ), __( 'Clarify display role, owner, risk, and measurement requirements.', 'qubyx' ) ),
				array( __( 'Measure', 'qubyx' ), __( 'Use the right software and sensor path for the target workflow.', 'qubyx' ) ),
				array( __( 'Document', 'qubyx' ), __( 'Keep reports, history, schedules, and exceptions visible to the team.', 'qubyx' ) ),
			),
			'links' => array(
				array( __( 'PerfectLum', 'qubyx' ), '/products/perfectlum/' ),
				array( __( 'RemoteQA', 'qubyx' ), '/products/qubyx-remoteqa/' ),
				array( __( 'Request demo', 'qubyx' ), '/request-demo/' ),
			),
		),
		'store'    => array(
			'label' => __( 'Commerce path', 'qubyx' ),
			'items' => array(
				array( __( 'Licenses', 'qubyx' ), __( 'Product paths for software evaluation, purchasing, and renewal.', 'qubyx' ) ),
				array( __( 'Bundles', 'qubyx' ), __( 'Sensor and software packages for teams building a QA program.', 'qubyx' ) ),
				array( __( 'Quotes', 'qubyx' ), __( 'Volume, partner, and enterprise purchasing conversations.', 'qubyx' ) ),
			),
			'links' => array(
				array( __( 'Products', 'qubyx' ), '/products/' ),
				array( __( 'Request quote', 'qubyx' ), '/request-demo/' ),
				array( __( 'Partners', 'qubyx' ), '/partners/' ),
			),
		),
		'resource' => array(
			'label' => __( 'Research path', 'qubyx' ),
			'items' => array(
				array( __( 'Intent', 'qubyx' ), __( 'Answer a specific display calibration or QA search question.', 'qubyx' ) ),
				array( __( 'Evidence', 'qubyx' ), __( 'Explain workflow, standards, measurement, and buyer criteria.', 'qubyx' ) ),
				array( __( 'Next step', 'qubyx' ), __( 'Route readers to products, solutions, support, or demo pages.', 'qubyx' ) ),
			),
			'links' => array(
				array( __( 'Guides', 'qubyx' ), '/resources/category/guides/' ),
				array( __( 'Compliance', 'qubyx' ), '/resources/category/compliance/' ),
				array( __( 'Compare', 'qubyx' ), '/compare/' ),
			),
		),
		'support'  => array(
			'label' => __( 'Support routing', 'qubyx' ),
			'items' => array(
				array( __( 'Identify', 'qubyx' ), __( 'Prepare product, version, OS, sensor, license, and display context.', 'qubyx' ) ),
				array( __( 'Resolve', 'qubyx' ), __( 'Use downloads, documentation, support, warranty, or security routes.', 'qubyx' ) ),
				array( __( 'Continue', 'qubyx' ), __( 'Keep deployed calibration and RemoteQA workflows moving.', 'qubyx' ) ),
			),
			'links' => array(
				array( __( 'Downloads', 'qubyx' ), '/downloads/' ),
				array( __( 'Documentation', 'qubyx' ), '/support/documentation/' ),
				array( __( 'Contact support', 'qubyx' ), '/support/contact-support/' ),
			),
		),
		'company'  => array(
			'label' => __( 'Company path', 'qubyx' ),
			'items' => array(
				array( __( 'Trust', 'qubyx' ), __( 'Company, privacy, security, legal, and contact pages for review.', 'qubyx' ) ),
				array( __( 'Partners', 'qubyx' ), __( 'OEM, reseller, integrator, and enterprise deployment conversations.', 'qubyx' ) ),
				array( __( 'Conversion', 'qubyx' ), __( 'Contact and demo routes for qualified product discussions.', 'qubyx' ) ),
			),
			'links' => array(
				array( __( 'About QUBYX', 'qubyx' ), '/company/about/' ),
				array( __( 'Partners', 'qubyx' ), '/partners/' ),
				array( __( 'Contact', 'qubyx' ), '/contact/' ),
			),
		),
	);

	$current = $family_data[ $family ];
	?>

	<section class="section qubyx-single-hero qubyx-single-hero--<?php echo esc_attr( $family ); ?>">
		<div class="container qubyx-single-hero__grid">
			<div>
				<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
				<p class="eyebrow"><?php echo esc_html( $current['label'] ); ?></p>
				<h1 class="h-display"><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="page__lede"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
				<div class="hero__actions">
					<a class="btn btn--primary btn--lg" href="<?php echo esc_url( home_url( 'support' === $family ? '/support/contact-support/' : '/request-demo/' ) ); ?>">
						<?php echo esc_html( 'support' === $family ? __( 'Contact support', 'qubyx' ) : __( 'Request demo', 'qubyx' ) ); ?>
					</a>
					<a class="btn btn--ghost btn--lg" href="<?php echo esc_url( home_url( 'store' === $family ? '/products/' : '/contact/' ) ); ?>">
						<?php echo esc_html( 'store' === $family ? __( 'View products', 'qubyx' ) : __( 'Contact QUBYX', 'qubyx' ) ); ?>
					</a>
				</div>
			</div>
			<div class="qubyx-single-visual" aria-label="<?php echo esc_attr( $current['label'] ); ?>">
				<?php foreach ( $current['items'] as $item ) : ?>
					<div>
						<strong><?php echo esc_html( $item[0] ); ?></strong>
						<span><?php echo esc_html( $item[1] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section qubyx-single-body qubyx-single-body--<?php echo esc_attr( $family ); ?>">
		<div class="container qubyx-single-layout qubyx-single-layout--<?php echo esc_attr( $family ); ?>">
			<article class="prose qubyx-single-content">
				<?php the_content(); ?>
				<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links"><span>' . __( 'Pages:', 'qubyx' ) . '</span>',
						'after'  => '</div>',
					)
				);
				?>
			</article>

			<aside class="qubyx-single-aside">
				<h2><?php esc_html_e( 'Related paths', 'qubyx' ); ?></h2>
				<ul>
					<?php foreach ( $current['links'] as $link ) : ?>
						<li>
							<a href="<?php echo esc_url( home_url( $link[1] ) ); ?>">
								<?php echo esc_html( $link[0] ); ?>
								<?php echo qubyx_icon( 'arrow-right', 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</aside>
		</div>
	</section>

<?php endwhile; ?>

<?php get_template_part( 'template-parts/sections/cta' ); ?>
<?php get_footer(); ?>
