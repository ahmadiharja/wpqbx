<?php
/**
 * The header for the Qubyx theme.
 *
 * @package Qubyx
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<meta name="theme-color" content="#FAF9F5" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'qubyx' ); ?></a>

<header class="site-header" data-site-header>
	<div class="site-header__container container">
		<a class="site-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<span class="site-header__brand-mark" aria-hidden="true">
					<svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 2L2 7v10l10 5 10-5V7L12 2z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
						<path d="M2 7l10 5 10-5M12 12v10" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
					</svg>
				</span>
				<span class="site-header__brand-text"><?php bloginfo( 'name' ); ?></span>
			<?php endif; ?>
		</a>

		<?php
		$qubyx_mega_nav = array(
			array(
				'label'    => __( 'Products', 'qubyx' ),
				'url'      => home_url( '/products/' ),
				'featured' => array(
					'label' => __( 'Product portfolio', 'qubyx' ),
					'desc'  => __( 'Software, remote QA, and sensors for every critical display workflow.', 'qubyx' ),
					'url'   => home_url( '/products/' ),
				),
				'columns'  => array(
					array(
						'heading' => __( 'Software', 'qubyx' ),
						'links'   => array(
							array( __( 'PerfectLum', 'qubyx' ), home_url( '/products/perfectlum/' ), __( 'Medical display calibration and DICOM QA.', 'qubyx' ) ),
							array( __( 'PerfectChroma', 'qubyx' ), home_url( '/products/perfectchroma/' ), __( 'Professional color calibration workflows.', 'qubyx' ) ),
							array( __( 'PerfectEPD', 'qubyx' ), home_url( '/products/perfectepd/' ), __( 'E-paper display validation and QA.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Remote QA', 'qubyx' ),
						'links'   => array(
							array( __( 'Qubyx RemoteQA', 'qubyx' ), home_url( '/products/qubyx-remoteqa/' ), __( 'Centralized display QA across sites.', 'qubyx' ) ),
							array( __( 'Enterprise display management', 'qubyx' ), home_url( '/solutions/enterprise-display-management/' ), __( 'Fleet visibility, scheduling, and evidence.', 'qubyx' ) ),
							array( __( 'Remote monitor QA', 'qubyx' ), home_url( '/solutions/remote-monitor-qa/' ), __( 'Centralized scheduling, reports, and QA evidence.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Sensors', 'qubyx' ),
						'links'   => array(
							array( __( 'SmartSensor S1', 'qubyx' ), home_url( '/products/qubyx-smartsensor-s1/' ), __( 'Compact luminance QA sensor.', 'qubyx' ) ),
							array( __( 'SmartSensor S2', 'qubyx' ), home_url( '/products/qubyx-smartsensor-s2/' ), __( 'Advanced validation sensor path.', 'qubyx' ) ),
							array( __( 'Store', 'qubyx' ), home_url( '/store/' ), __( 'Licenses, bundles, and quotes.', 'qubyx' ) ),
						),
					),
				),
			),
			array(
				'label'    => __( 'Solutions', 'qubyx' ),
				'url'      => home_url( '/solutions/' ),
				'featured' => array(
					'label' => __( 'Solutions hub', 'qubyx' ),
					'desc'  => __( 'SEO-ready pages for healthcare, enterprise, creative, OEM, and e-paper workflows.', 'qubyx' ),
					'url'   => home_url( '/solutions/' ),
				),
				'columns'  => array(
					array(
						'heading' => __( 'By workflow', 'qubyx' ),
						'links'   => array(
							array( __( 'Medical display QA', 'qubyx' ), home_url( '/solutions/medical-display-qa/' ), __( 'Radiology and diagnostic display programs.', 'qubyx' ) ),
							array( __( 'DICOM calibration', 'qubyx' ), home_url( '/solutions/dicom-calibration/' ), __( 'GSDF calibration and medical display conformance.', 'qubyx' ) ),
							array( __( 'Multi-site hospital networks', 'qubyx' ), home_url( '/solutions/multi-site-hospital-networks/' ), __( 'Enterprise healthcare display QA across locations.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'By team', 'qubyx' ),
						'links'   => array(
							array( __( 'Enterprise display management', 'qubyx' ), home_url( '/solutions/enterprise-display-management/' ), __( 'Centralized display QA operations.', 'qubyx' ) ),
							array( __( 'Color-critical workflows', 'qubyx' ), home_url( '/solutions/color-critical-workflows/' ), __( 'Photography, video, design, and prepress.', 'qubyx' ) ),
							array( __( 'OEM display calibration', 'qubyx' ), home_url( '/solutions/oem-display-calibration/' ), __( 'Manufacturer and integrator validation.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Specialized', 'qubyx' ),
						'links'   => array(
							array( __( 'E-paper display QA', 'qubyx' ), home_url( '/solutions/epaper-display-qa/' ), __( 'EPD contrast and reflectance workflows.', 'qubyx' ) ),
							array( __( 'Display manufacturing', 'qubyx' ), home_url( '/industries/display-manufacturing/' ), __( 'OEM validation and production QA workflows.', 'qubyx' ) ),
							array( __( 'Broadcast and post-production', 'qubyx' ), home_url( '/industries/broadcast-post-production/' ), __( 'Monitor calibration for video and studio delivery.', 'qubyx' ) ),
						),
					),
				),
			),
			array(
				'label'    => __( 'Store', 'qubyx' ),
				'url'      => home_url( '/store/' ),
				'featured' => array(
					'label' => __( 'QUBYX store', 'qubyx' ),
					'desc'  => __( 'Commerce entry point for licenses, bundles, sensors, maintenance, quotes, and enterprise purchasing.', 'qubyx' ),
					'url'   => home_url( '/store/' ),
				),
				'columns'  => array(
					array(
						'heading' => __( 'Shop', 'qubyx' ),
						'links'   => array(
							array( __( 'Software licenses', 'qubyx' ), home_url( '/store/' ), __( 'PerfectLum, PerfectChroma, and product licensing.', 'qubyx' ) ),
							array( __( 'Sensor bundles', 'qubyx' ), home_url( '/store/' ), __( 'SmartSensor S1/S2 and software bundles.', 'qubyx' ) ),
							array( __( 'Maintenance plans', 'qubyx' ), home_url( '/store/' ), __( 'Support, updates, onboarding, and services.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Enterprise', 'qubyx' ),
						'links'   => array(
							array( __( 'Request quote', 'qubyx' ), home_url( '/request-demo/' ), __( 'Volume pricing and procurement support.', 'qubyx' ) ),
							array( __( 'Volume licensing', 'qubyx' ), home_url( '/store/' ), __( 'Multi-seat and multi-site purchasing.', 'qubyx' ) ),
							array( __( 'Partner purchasing', 'qubyx' ), home_url( '/partners/' ), __( 'OEM, reseller, and integrator programs.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Evaluate', 'qubyx' ),
						'links'   => array(
							array( __( 'Request demo', 'qubyx' ), home_url( '/request-demo/' ), __( 'See the right product path first.', 'qubyx' ) ),
							array( __( 'Product comparison', 'qubyx' ), home_url( '/products/' ), __( 'Compare software, sensors, and RemoteQA.', 'qubyx' ) ),
							array( __( 'Contact sales', 'qubyx' ), home_url( '/contact/' ), __( 'Talk through requirements and deployment.', 'qubyx' ) ),
						),
					),
				),
			),
			array(
				'label'    => __( 'Resources', 'qubyx' ),
				'url'      => home_url( '/resources/' ),
				'featured' => array(
					'label' => __( 'Resource library', 'qubyx' ),
					'desc'  => __( 'Guides, comparisons, compliance explainers, technical notes, news, and blog content.', 'qubyx' ),
					'url'   => home_url( '/resources/' ),
				),
				'columns'  => array(
					array(
						'heading' => __( 'Learn', 'qubyx' ),
						'links'   => array(
							array( __( 'Guides', 'qubyx' ), home_url( '/resources/category/guides/' ), __( 'Practical calibration guides.', 'qubyx' ) ),
							array( __( 'Compliance', 'qubyx' ), home_url( '/resources/category/compliance/' ), __( 'Standards and audit workflows.', 'qubyx' ) ),
							array( __( 'Technical notes', 'qubyx' ), home_url( '/resources/category/technical-notes/' ), __( 'Sensors, drift, and architecture.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Compare', 'qubyx' ),
						'links'   => array(
							array( __( 'Calman alternative', 'qubyx' ), home_url( '/compare/calman-alternative/' ), __( 'Professional calibration comparison.', 'qubyx' ) ),
							array( __( 'DisplayCAL alternative', 'qubyx' ), home_url( '/compare/displaycal-alternative/' ), __( 'Open-source vs managed QA.', 'qubyx' ) ),
							array( __( 'Datacolor Spyder alternative', 'qubyx' ), home_url( '/compare/datacolor-spyder-alternative/' ), __( 'Consumer tools vs enterprise QA.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Updates', 'qubyx' ),
						'links'   => array(
								array( __( 'Blog', 'qubyx' ), home_url( '/resources/category/blog/' ), __( 'Ideas and market commentary.', 'qubyx' ) ),
								array( __( 'News', 'qubyx' ), home_url( '/resources/category/news/' ), __( 'Company and product announcements.', 'qubyx' ) ),
								array( __( 'Product updates', 'qubyx' ), home_url( '/resources/category/product-updates/' ), __( 'Release and feature notes.', 'qubyx' ) ),
						),
					),
				),
			),
			array(
				'label'    => __( 'Support', 'qubyx' ),
				'url'      => home_url( '/support/' ),
				'featured' => array(
					'label' => __( 'Support center', 'qubyx' ),
					'desc'  => __( 'Downloads, documentation, support contact, warranty, security, and deployment help.', 'qubyx' ),
					'url'   => home_url( '/support/' ),
				),
				'columns'  => array(
					array(
						'heading' => __( 'Help', 'qubyx' ),
						'links'   => array(
							array( __( 'Downloads', 'qubyx' ), home_url( '/downloads/' ), __( 'Installers, manuals, and release notes.', 'qubyx' ) ),
							array( __( 'Documentation', 'qubyx' ), home_url( '/support/documentation/' ), __( 'Setup, calibration, reports, and sensors.', 'qubyx' ) ),
							array( __( 'Contact support', 'qubyx' ), home_url( '/support/contact-support/' ), __( 'Product assistance and troubleshooting.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Trust', 'qubyx' ),
						'links'   => array(
							array( __( 'Security', 'qubyx' ), home_url( '/security/' ), __( 'Enterprise review and deployment notes.', 'qubyx' ) ),
							array( __( 'Warranty and RMA', 'qubyx' ), home_url( '/support/warranty-rma/' ), __( 'Hardware support and return flow.', 'qubyx' ) ),
							array( __( 'Contact', 'qubyx' ), home_url( '/contact/' ), __( 'Sales, support, partners, and routing.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Buy', 'qubyx' ),
						'links'   => array(
							array( __( 'Store', 'qubyx' ), home_url( '/store/' ), __( 'Software, sensors, and bundles.', 'qubyx' ) ),
							array( __( 'Request demo', 'qubyx' ), home_url( '/request-demo/' ), __( 'Book an enterprise walkthrough.', 'qubyx' ) ),
							array( __( 'Partners', 'qubyx' ), home_url( '/partners/' ), __( 'OEM, reseller, and integrator programs.', 'qubyx' ) ),
						),
					),
				),
			),
			array(
				'label'    => __( 'Company', 'qubyx' ),
				'url'      => home_url( '/company/' ),
				'featured' => array(
					'label' => __( 'QUBYX company', 'qubyx' ),
					'desc'  => __( 'Company, partners, contact, legal, privacy, cookies, and enterprise trust pages.', 'qubyx' ),
					'url'   => home_url( '/company/' ),
				),
				'columns'  => array(
					array(
						'heading' => __( 'About', 'qubyx' ),
						'links'   => array(
							array( __( 'Company', 'qubyx' ), home_url( '/company/' ), __( 'Corporate overview.', 'qubyx' ) ),
							array( __( 'About QUBYX', 'qubyx' ), home_url( '/company/about/' ), __( 'Brand and product mission.', 'qubyx' ) ),
							array( __( 'Partners', 'qubyx' ), home_url( '/partners/' ), __( 'Partner and OEM programs.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Contact', 'qubyx' ),
						'links'   => array(
							array( __( 'Contact', 'qubyx' ), home_url( '/contact/' ), __( 'General routing page.', 'qubyx' ) ),
							array( __( 'Request demo', 'qubyx' ), home_url( '/request-demo/' ), __( 'Enterprise conversion page.', 'qubyx' ) ),
							array( __( 'Store', 'qubyx' ), home_url( '/store/' ), __( 'Commerce and quote page.', 'qubyx' ) ),
						),
					),
					array(
						'heading' => __( 'Legal', 'qubyx' ),
						'links'   => array(
							array( __( 'Privacy', 'qubyx' ), home_url( '/privacy/' ), __( 'Website, product, and support privacy information.', 'qubyx' ) ),
							array( __( 'Terms', 'qubyx' ), home_url( '/terms/' ), __( 'Website, software, store, and support terms.', 'qubyx' ) ),
							array( __( 'Cookies', 'qubyx' ), home_url( '/cookies/' ), __( 'Analytics, preferences, consent, and embedded media.', 'qubyx' ) ),
						),
					),
				),
			),
		);
		?>
		<nav class="site-nav mega-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'qubyx' ); ?>">
			<ul class="mega-nav__list">
				<?php foreach ( $qubyx_mega_nav as $item ) : ?>
					<li class="mega-nav__item">
						<a class="mega-nav__trigger" href="<?php echo esc_url( $item['url'] ); ?>" aria-haspopup="true">
							<?php echo esc_html( $item['label'] ); ?>
							<span aria-hidden="true"><?php echo qubyx_icon( 'arrow-right', 11 ); // phpcs:ignore ?></span>
						</a>
						<div class="mega-nav__panel">
							<div class="mega-nav__banner">
								<div class="mega-nav__banner-content">
									<span class="mega-nav__banner-icon" aria-hidden="true"><?php echo qubyx_icon( 'arrow-right', 18 ); // phpcs:ignore ?></span>
									<div class="mega-nav__banner-text">
										<p class="mega-nav__banner-tag"><?php echo esc_html( $item['featured']['label'] ); ?></p>
										<p class="mega-nav__banner-title"><?php echo esc_html( $item['featured']['desc'] ); ?></p>
									</div>
								</div>
								<a class="mega-nav__banner-cta" href="<?php echo esc_url( $item['featured']['url'] ); ?>">
									<?php esc_html_e( 'Explore', 'qubyx' ); ?>
									<?php echo qubyx_icon( 'arrow-right', 13 ); // phpcs:ignore ?>
								</a>
							</div>
							<div class="mega-nav__columns">
								<?php foreach ( $item['columns'] as $column ) : ?>
									<div class="mega-nav__column">
										<p class="mega-nav__heading"><?php echo esc_html( $column['heading'] ); ?></p>
										<ul>
											<?php foreach ( $column['links'] as $link ) : ?>
												<?php
												$link_title = $link[0];
												$icon_text  = strtoupper( substr( preg_replace( '/[^a-z0-9]/i', '', $link_title ), 0, 3 ) );
												$icon_class = 'mn-i--soft';

												if ( false !== stripos( $link_title, 'PerfectLum' ) || false !== stripos( $link_title, 'DICOM' ) || false !== stripos( $link_title, 'Medical' ) ) {
													$icon_class = 'mn-i--lum';
												} elseif ( false !== stripos( $link_title, 'PerfectChroma' ) || false !== stripos( $link_title, 'Color' ) ) {
													$icon_class = 'mn-i--chr';
												} elseif ( false !== stripos( $link_title, 'PerfectEPD' ) || false !== stripos( $link_title, 'E-paper' ) ) {
													$icon_class = 'mn-i--epd';
												} elseif ( false !== stripos( $link_title, 'RemoteQA' ) || false !== stripos( $link_title, 'Remote' ) ) {
													$icon_class = 'mn-i--rqa';
												} elseif ( false !== stripos( $link_title, 'Enterprise' ) || false !== stripos( $link_title, 'Security' ) ) {
													$icon_class = 'mn-i--ent';
												} elseif ( false !== stripos( $link_title, 'S1' ) ) {
													$icon_class = 'mn-i--s1';
												} elseif ( false !== stripos( $link_title, 'S2' ) ) {
													$icon_class = 'mn-i--s2';
												}
												?>
												<li>
													<a class="mega-nav__link" href="<?php echo esc_url( $link[1] ); ?>">
														<span class="mega-nav__link-icon <?php echo esc_attr( $icon_class ); ?>" aria-hidden="true"><?php echo esc_html( $icon_text ?: 'QB' ); ?></span>
														<span class="mega-nav__link-body">
															<span><?php echo esc_html( $link_title ); ?></span>
															<small><?php echo esc_html( $link[2] ); ?></small>
														</span>
													</a>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="mega-nav__footer">
								<div class="mega-nav__footer-content">
									<span class="mega-nav__footer-icon" aria-hidden="true"><?php echo qubyx_icon( 'arrow-right', 16 ); // phpcs:ignore ?></span>
									<p class="mega-nav__footer-text">
										<strong><?php echo esc_html( $item['featured']['label'] ); ?></strong>
										<?php echo esc_html( $item['featured']['desc'] ); ?>
									</p>
								</div>
								<a class="mega-nav__footer-cta" href="<?php echo esc_url( $item['featured']['url'] ); ?>">
									<?php esc_html_e( 'Learn more', 'qubyx' ); ?>
									<?php echo qubyx_icon( 'arrow-right', 14 ); // phpcs:ignore ?>
								</a>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<div class="site-header__actions">

			<?php
			/**
			 * Language switcher.
			 * The "url" is a hook for WPML / Polylang / TranslatePress —
			 * they auto-rewrite the URL when the plugin is active.
			 * Without a translation plugin the links act as static anchors.
			 */
			$qubyx_languages = array(
				'en' => array(
					'label' => __( 'English', 'qubyx' ),
					'url'   => apply_filters( 'qubyx_lang_url_en', home_url( '/' ) ),
					'flag'  => '<svg viewBox="0 0 60 30" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><clipPath id="us-h"><circle cx="30" cy="15" r="15"/></clipPath><g clip-path="url(#us-h)"><rect width="60" height="30" fill="#B22234"/><path stroke="#fff" stroke-width="2.31" d="M0 3.46h60M0 8.08h60M0 12.69h60M0 17.31h60M0 21.92h60M0 26.54h60"/><rect width="24" height="16.15" fill="#3C3B6E"/></g></svg>',
					'is_default' => true,
				),
				'fr' => array(
					'label' => __( 'Français', 'qubyx' ),
					'url'   => apply_filters( 'qubyx_lang_url_fr', home_url( '/fr/' ) ),
					'flag'  => '<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><clipPath id="fr-h"><circle cx="30" cy="20" r="20"/></clipPath><g clip-path="url(#fr-h)"><rect width="20" height="40" fill="#0055A4"/><rect x="20" width="20" height="40" fill="#fff"/><rect x="40" width="20" height="40" fill="#EF4135"/></g></svg>',
				),
				'de' => array(
					'label' => __( 'Deutsch', 'qubyx' ),
					'url'   => apply_filters( 'qubyx_lang_url_de', home_url( '/de/' ) ),
					'flag'  => '<svg viewBox="0 0 60 36" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><clipPath id="de-h"><circle cx="30" cy="18" r="18"/></clipPath><g clip-path="url(#de-h)"><rect width="60" height="12" fill="#000"/><rect y="12" width="60" height="12" fill="#DD0000"/><rect y="24" width="60" height="12" fill="#FFCE00"/></g></svg>',
				),
				'ko' => array(
					'label' => __( '한국어', 'qubyx' ),
					'url'   => apply_filters( 'qubyx_lang_url_ko', home_url( '/ko/' ) ),
					'flag'  => '<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><clipPath id="ko-h"><circle cx="30" cy="20" r="20"/></clipPath><g clip-path="url(#ko-h)"><rect width="60" height="40" fill="#fff"/><circle cx="30" cy="20" r="8" fill="#CD2E3A"/><path d="M22 20a8 8 0 0 1 16 0 4 4 0 0 1-8 0 4 4 0 0 0-8 0z" fill="#0047A0"/></g></svg>',
				),
				'es' => array(
					'label' => __( 'Español', 'qubyx' ),
					'url'   => apply_filters( 'qubyx_lang_url_es', home_url( '/es/' ) ),
					'flag'  => '<svg viewBox="0 0 60 40" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><clipPath id="es-h"><circle cx="30" cy="20" r="20"/></clipPath><g clip-path="url(#es-h)"><rect width="60" height="40" fill="#AA151B"/><rect y="10" width="60" height="20" fill="#F1BF00"/></g></svg>',
				),
			);

			$current_locale = function_exists( 'get_locale' ) ? get_locale() : 'en_US';
			$current_lang   = 'en';
			if ( 0 === strpos( $current_locale, 'fr' ) ) { $current_lang = 'fr'; }
			elseif ( 0 === strpos( $current_locale, 'de' ) ) { $current_lang = 'de'; }
			elseif ( 0 === strpos( $current_locale, 'ko' ) ) { $current_lang = 'ko'; }
			elseif ( 0 === strpos( $current_locale, 'es' ) ) { $current_lang = 'es'; }
			$current = $qubyx_languages[ $current_lang ];
			?>
			<div class="lang-switch" data-lang-switch>
				<button class="lang-switch__trigger" type="button" aria-haspopup="true" aria-expanded="false" aria-label="<?php esc_attr_e( 'Change language', 'qubyx' ); ?>">
					<span class="lang-flag" data-current-flag><?php echo $current['flag']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				</button>
				<div class="lang-switch__panel" role="menu">
					<?php foreach ( $qubyx_languages as $code => $lang ) : ?>
						<a class="lang-switch__item<?php echo $code === $current_lang ? ' is-active' : ''; ?>" role="menuitem" data-lang="<?php echo esc_attr( $code ); ?>" href="<?php echo esc_url( $lang['url'] ); ?>" hreflang="<?php echo esc_attr( $code ); ?>">
							<span class="lang-flag"><?php echo $lang['flag']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
							<span class="lang-switch__label"><?php echo esc_html( $lang['label'] ); ?></span>
						</a>
					<?php endforeach; ?>
				</div>
			</div>

			<a class="site-header__login" href="<?php echo esc_url( home_url( '/downloads/' ) ); ?>"><?php esc_html_e( 'Downloads', 'qubyx' ); ?></a>
			<a class="btn btn--primary btn--sm" href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>">
				<?php esc_html_e( 'Request demo', 'qubyx' ); ?>
				<span class="btn__icon" aria-hidden="true">
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
				</span>
			</a>
			<button class="site-header__menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav" data-mobile-toggle>
				<span class="screen-reader-text"><?php esc_html_e( 'Open menu', 'qubyx' ); ?></span>
				<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
			</button>
		</div>
	</div>

	<div class="site-mobile-nav" id="mobile-nav" hidden>
		<ul class="site-mobile-nav__list">
			<?php foreach ( $qubyx_mega_nav as $item ) : ?>
				<li>
					<a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
					<ul class="sub-menu">
						<?php foreach ( $item['columns'] as $column ) : ?>
							<?php foreach ( $column['links'] as $link ) : ?>
								<li><a href="<?php echo esc_url( $link[1] ); ?>"><?php echo esc_html( $link[0] ); ?></a></li>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</ul>
				</li>
			<?php endforeach; ?>
		</ul>
		<a class="btn btn--primary btn--block" href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>"><?php esc_html_e( 'Request demo', 'qubyx' ); ?></a>
	</div>
</header>

<main id="main" class="site-main">
