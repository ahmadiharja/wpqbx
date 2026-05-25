<?php
/**
 * Qubyx enterprise seed content.
 *
 * @package QubyxContentImporter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return importer data.
 *
 * Text is intentionally stored here instead of in templates. The importer
 * registers these strings with WPML String Translation and then saves the
 * selected language version into WordPress content/meta.
 *
 * @return array
 */
function qubyx_ci_content_data() {
	return array(
		'terms'     => qubyx_ci_terms(),
		'pages'     => qubyx_ci_pages(),
		'products'  => qubyx_ci_products(),
		'store_products' => qubyx_ci_store_products(),
		'resources' => qubyx_ci_resources(),
		'posts'     => qubyx_ci_posts(),
		'menus'     => qubyx_ci_menus(),
	);
}

/**
 * Taxonomies and post categories.
 */
function qubyx_ci_terms() {
	return array(
		'product_category'  => array(
			array( 'slug' => 'software', 'name' => 'Software', 'description' => 'Calibration, validation, and QA software for professional display fleets.' ),
			array( 'slug' => 'remote-qa', 'name' => 'Remote QA', 'description' => 'Centralized services for monitoring display quality across teams and sites.' ),
			array( 'slug' => 'sensors', 'name' => 'Sensors', 'description' => 'Measurement hardware for luminance and color quality assurance workflows.' ),
		),
		'resource_category' => array(
			array( 'slug' => 'guides', 'name' => 'Guides', 'description' => 'Practical guides for display calibration and quality assurance.' ),
			array( 'slug' => 'compliance', 'name' => 'Compliance', 'description' => 'Standards, audit workflows, and regulatory readiness.' ),
			array( 'slug' => 'technical-notes', 'name' => 'Technical Notes', 'description' => 'Measurement methods, drift, sensors, and system architecture.' ),
			array( 'slug' => 'case-studies', 'name' => 'Case Studies', 'description' => 'Enterprise examples across healthcare, production, and display manufacturing.' ),
			array( 'slug' => 'news', 'name' => 'News', 'description' => 'Company announcements, partnerships, and QUBYX press updates.' ),
			array( 'slug' => 'product-updates', 'name' => 'Product Updates', 'description' => 'Release notes and product improvements for QUBYX software, sensors, and services.' ),
			array( 'slug' => 'blog', 'name' => 'Blog', 'description' => 'Opinions, market commentary, and ideas about display quality and calibration culture.' ),
		),
		'category'          => array(
			array( 'slug' => 'news', 'name' => 'News', 'description' => 'Company and product announcements from QUBYX.' ),
			array( 'slug' => 'blog', 'name' => 'Blog', 'description' => 'Ideas and updates from the QUBYX team.' ),
			array( 'slug' => 'product-updates', 'name' => 'Product Updates', 'description' => 'Release notes and product improvements.' ),
		),
	);
}

/**
 * Core pages.
 */
function qubyx_ci_pages() {
	$pages = array(
		'home'         => array(
			'post_title'   => 'QUBYX',
			'post_name'    => 'home',
			'post_excerpt' => 'Enterprise display calibration, verification, and remote quality assurance for medical and color-critical organizations.',
			'post_content' => '<!-- wp:heading --><h2>Display quality infrastructure for regulated teams</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX helps hospitals, imaging centers, display manufacturers, and creative facilities keep every critical screen measurable, compliant, and ready for work.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>DICOM Part 14 GSDF calibration and reporting</li><li>Remote QA for distributed display fleets</li><li>Color-critical validation for production teams</li><li>Measurement hardware for repeatable workflows</li></ul><!-- /wp:list -->',
			'meta'         => array(
				'hero_eyebrow'          => 'Enterprise display calibration and QA',
				'hero_headline'         => 'QUBYX display quality infrastructure for every screen that matters',
				'hero_accent_phrase'    => 'every screen that matters',
				'hero_subhead'          => 'QUBYX builds calibration software, remote QA systems, and measurement sensors for medical imaging, color-critical production, OEM display validation, and enterprise display fleets.',
				'hero_cta_primary'      => array( 'title' => 'Request enterprise demo', 'url' => '/request-demo/', 'target' => '' ),
				'hero_cta_secondary'    => array( 'title' => 'Explore products', 'url' => '/products/', 'target' => '' ),
				'features'              => array(
					array( 'badge' => 'Medical QA', 'title' => 'Built for diagnostic display confidence', 'description' => 'PerfectLum supports DICOM calibration, QA testing, scheduling, history, and reports for medical display workflows.', 'span' => 'wide' ),
					array( 'badge' => 'Remote operations', 'title' => 'Manage fleets from one place', 'description' => 'Qubyx RemoteQA centralizes task scheduling, status review, and reporting across connected displays.', 'span' => '' ),
					array( 'badge' => 'Color critical', 'title' => 'Trust creative color decisions', 'description' => 'PerfectChroma helps photographers, editors, designers, and studios validate repeatable color output.', 'span' => '' ),
					array( 'badge' => 'Hardware', 'title' => 'Sensors for repeatable measurement', 'description' => 'SmartSensor products pair with QUBYX software to make luminance and color QA easier to operate.', 'span' => '' ),
					array( 'badge' => 'SEO engine', 'title' => 'Resources for every buying stage', 'description' => 'Guides, comparisons, technical notes, and compliance content support high-intent searches across the calibration market.', 'span' => 'wide' ),
				),
				'testimonials'          => array(
					array( 'quote' => 'QUBYX gives our team a repeatable way to document display quality instead of chasing manual spreadsheets.', 'name' => 'Medical Physics Lead', 'title' => 'Multi-site imaging network' ),
					array( 'quote' => 'Remote scheduling and reporting are the difference between reactive QA and a managed display program.', 'name' => 'Enterprise PACS Administrator', 'title' => 'Hospital IT operations' ),
					array( 'quote' => 'For color work, the value is simple: fewer surprises between the monitor, the client, and delivery.', 'name' => 'Studio Technical Director', 'title' => 'Post-production facility' ),
				),
				'faqs'                  => array(
					array( 'question' => 'What does QUBYX make?', 'answer' => 'QUBYX makes display calibration, verification, remote QA, and measurement products for medical imaging, creative production, OEM display validation, and enterprise display operations.' ),
					array( 'question' => 'Is QUBYX only for healthcare?', 'answer' => 'No. PerfectLum focuses on medical display QA, while PerfectChroma, PerfectEPD, RemoteQA, and SmartSensor products support broader color-critical, enterprise, and manufacturer workflows.' ),
					array( 'question' => 'Can QUBYX content support multiple languages?', 'answer' => 'Yes. Product names, solution pages, resources, support pages, and conversion paths are structured so global teams can localize the website while keeping a consistent enterprise message.' ),
					array( 'question' => 'Can this site support a store?', 'answer' => 'Yes. The QUBYX Store can present licenses, sensor bundles, quote requests, maintenance plans, and future checkout paths without changing the main website architecture.' ),
				),
				'final_cta_heading'     => 'Bring every critical display into a managed QA program.',
				'final_cta_text'        => 'Talk with QUBYX about software, sensors, remote QA, volume licensing, and partner deployment.',
				'final_cta_primary'     => array( 'title' => 'Request enterprise demo', 'url' => '/request-demo/', 'target' => '' ),
				'final_cta_secondary'   => array( 'title' => 'Contact sales', 'url' => '/contact/', 'target' => '' ),
			),
		),
		'solutions'    => array(
			'post_title'   => 'Solutions',
			'post_name'    => 'solutions',
			'post_excerpt' => 'Display QA solutions for healthcare, creative production, enterprise IT, OEMs, and e-paper display teams.',
			'post_content' => '<!-- wp:heading --><h2>Solutions by workflow</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX products can be deployed as single-workstation calibration tools, centralized remote QA programs, or integrated validation workflows for manufacturers and enterprise teams.</p><!-- /wp:paragraph --><!-- wp:columns --><div class="wp-block-columns"><div class="wp-block-column"><h3>Medical display QA</h3><p>DICOM calibration, conformance checks, reports, and scheduled QA for radiology and diagnostic imaging teams.</p></div><div class="wp-block-column"><h3>Enterprise display management</h3><p>Centralized status, task scheduling, and reporting for distributed workstations and multi-site organizations.</p></div><div class="wp-block-column"><h3>Color-critical workflows</h3><p>Verification and documentation for photography, video, design, prepress, and post-production environments.</p></div></div><!-- /wp:columns -->',
		),
		'solution-medical-display-qa' => array(
			'post_title'   => 'Medical Display QA',
			'post_name'    => 'medical-display-qa',
			'parent'       => 'solutions',
			'post_excerpt' => 'Medical display QA software and workflow guidance for radiology, diagnostic imaging, and hospital compliance teams.',
			'post_content' => '<!-- wp:heading --><h2>Medical display QA for diagnostic confidence</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Medical display QA programs should cover radiology monitor calibration, DICOM calibration software, AAPM TG18, AAPM TG270, DIN 6868-157, and audit-ready display reporting.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>DICOM Part 14 GSDF calibration</li><li>Acceptance and constancy checks</li><li>Scheduled QA and corrective action tracking</li><li>Reports for medical physicists and imaging administrators</li></ul><!-- /wp:list -->',
		),
		'solution-enterprise-display-management' => array(
			'post_title'   => 'Enterprise Display Management',
			'post_name'    => 'enterprise-display-management',
			'parent'       => 'solutions',
			'post_excerpt' => 'Centralized display calibration management for multi-site organizations, hospitals, production teams, and enterprise IT.',
			'post_content' => '<!-- wp:heading --><h2>Manage display quality across every site</h2><!-- /wp:heading --><!-- wp:paragraph --><p>This page should rank for enterprise display calibration software, centralized display QA, remote monitor QA, and multi-site display management.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Centralized fleet status</li><li>Remote task scheduling</li><li>Role-based operational workflows</li><li>Exportable reports and history</li></ul><!-- /wp:list -->',
		),
		'solution-color-critical-workflows' => array(
			'post_title'   => 'Color-Critical Workflows',
			'post_name'    => 'color-critical-workflows',
			'parent'       => 'solutions',
			'post_excerpt' => 'Professional display calibration for photography, video, post-production, prepress, design, and brand color workflows.',
			'post_content' => '<!-- wp:heading --><h2>Color confidence for professional delivery</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Professional display calibration software supports photographers, video editors, designers, prepress teams, ICC profile workflows, LUT calibration discussions, and repeatable delivery review.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Smart presets for photography, video, web, and prepress</li><li>Verification reports before delivery</li><li>Display drift monitoring</li><li>Team-wide color consistency</li></ul><!-- /wp:list -->',
		),
		'solution-oem-display-calibration' => array(
			'post_title'   => 'OEM Display Calibration',
			'post_name'    => 'oem-display-calibration',
			'parent'       => 'solutions',
			'post_excerpt' => 'Display calibration and validation workflows for OEMs, manufacturers, integrators, and production QA teams.',
			'post_content' => '<!-- wp:heading --><h2>Calibration workflows for display manufacturers</h2><!-- /wp:heading --><!-- wp:paragraph --><p>This page supports OEM display calibration, factory display validation, production QA, panel verification, and post-deployment monitoring search intent.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Production validation content model</li><li>Repeatable measurement procedures</li><li>Integration and partner deployment paths</li><li>Reporting for internal and customer QA</li></ul><!-- /wp:list -->',
		),
		'solution-epaper-display-qa' => array(
			'post_title'   => 'E-paper Display QA',
			'post_name'    => 'epaper-display-qa',
			'parent'       => 'solutions',
			'post_excerpt' => 'Calibration, reflectance, contrast, and quality assurance workflows for electronic paper display systems.',
			'post_content' => '<!-- wp:heading --><h2>E-paper display QA for specialized screens</h2><!-- /wp:heading --><!-- wp:paragraph --><p>E-paper display QA content covers EPD display measurement, contrast measurement, reflectance QA, and electronic paper display validation for specialized teams.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Contrast and reflectance measurement workflows</li><li>Uniformity and repeatability concepts</li><li>OEM and lab validation use cases</li><li>Internal QA documentation</li></ul><!-- /wp:list -->',
		),
		'store'        => array(
			'post_title'   => 'Store',
			'post_name'    => 'store',
			'post_excerpt' => 'Explore QUBYX software licenses, remote QA plans, sensors, bundles, and enterprise purchasing options.',
			'post_content' => '<!-- wp:heading --><h2>Software, sensors, and enterprise bundles</h2><!-- /wp:heading --><!-- wp:paragraph --><p>The QUBYX Store is the commerce entry point for quote requests, software licenses, sensor bundles, maintenance plans, and future WooCommerce checkout flows.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>PerfectLum licenses and volume pricing</li><li>PerfectChroma licenses and bundles</li><li>RemoteQA deployment plans</li><li>SmartSensor S1 and S2 hardware</li><li>Maintenance and onboarding plans</li></ul><!-- /wp:list -->',
		),
		'store-perfectlum' => array(
			'post_title'   => 'PerfectLum Pricing',
			'post_name'    => 'perfectlum',
			'parent'       => 'store',
			'post_excerpt' => 'PerfectLum pricing for DICOM calibration, medical display QA, reporting, and department-wide display quality programs.',
			'post_content' => '<!-- wp:heading --><h2>PerfectLum plans for medical display QA</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Use this page for PerfectLum workstation, department, and enterprise pricing. Buyers should understand display count, reporting needs, support coverage, and whether the plan is for one workstation or a managed imaging program.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Workstation licensing</li><li>Department plans</li><li>Volume pricing</li><li>RemoteQA and SmartSensor bundle paths</li></ul><!-- /wp:list -->',
		),
		'store-perfectchroma' => array(
			'post_title'   => 'PerfectChroma Pricing',
			'post_name'    => 'perfectchroma',
			'parent'       => 'store',
			'post_excerpt' => 'PerfectChroma pricing for photographers, editors, studios, designers, and color-critical production teams.',
			'post_content' => '<!-- wp:heading --><h2>PerfectChroma plans for color-critical teams</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Use this page for PerfectChroma solo, studio, and production pricing. The content should explain seats, display count, calibration workflows, sensor bundles, and support expectations.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Solo creative workflows</li><li>Studio team plans</li><li>SmartSensor S2 bundles</li><li>Support and update options</li></ul><!-- /wp:list -->',
		),
		'store-perfectepd' => array(
			'post_title'   => 'PerfectEPD Pricing',
			'post_name'    => 'perfectepd',
			'parent'       => 'store',
			'post_excerpt' => 'PerfectEPD pricing for e-paper validation, reflectance measurement, OEM display QA, and lab workflows.',
			'post_content' => '<!-- wp:heading --><h2>PerfectEPD plans for e-paper validation</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Use this page for PerfectEPD lab, OEM, and enterprise validation pricing. Buyers should understand lab seats, measurement hardware, onboarding, and production QA support.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Lab validation plans</li><li>OEM support paths</li><li>SmartSensor S2 bundles</li><li>Dedicated engineering options</li></ul><!-- /wp:list -->',
		),
		'store-sensors' => array(
			'post_title'   => 'SmartSensor Catalog',
			'post_name'    => 'sensors',
			'parent'       => 'store',
			'post_excerpt' => 'SmartSensor S1 and S2 catalog for luminance, color, HDR, and validation measurement workflows.',
			'post_content' => '<!-- wp:heading --><h2>SmartSensor hardware for repeatable measurement</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Use this page to compare SmartSensor S1 and SmartSensor S2 purchasing paths. The page should explain measurement use cases, warranty, calibration, and recommended software bundles.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>SmartSensor S1 for routine QA</li><li>SmartSensor S2 for advanced color and OEM validation</li><li>Warranty and calibration notes</li><li>Software bundle recommendations</li></ul><!-- /wp:list -->',
		),
		'store-bundles' => array(
			'post_title'   => 'QUBYX Bundles',
			'post_name'    => 'bundles',
			'parent'       => 'store',
			'post_excerpt' => 'Software, SmartSensor, onboarding, and support bundles for hospitals, studios, OEMs, and enterprise teams.',
			'post_content' => '<!-- wp:heading --><h2>Software and sensor bundles</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Use this page for curated bundles that combine QUBYX software, SmartSensor hardware, onboarding, and support into a single purchasing path.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Hospital QA Bundle</li><li>Creative Studio Kit</li><li>OEM Validation Pack</li><li>Custom enterprise bundles</li></ul><!-- /wp:list -->',
		),
		'store-enterprise' => array(
			'post_title'   => 'Enterprise Pricing',
			'post_name'    => 'enterprise',
			'parent'       => 'store',
			'post_excerpt' => 'Enterprise pricing for multi-site display QA, volume licensing, procurement, RemoteQA, and support coverage.',
			'post_content' => '<!-- wp:heading --><h2>Enterprise purchasing for managed display QA</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Use this page for volume licensing, procurement support, multi-site onboarding, RemoteQA planning, security review, and dedicated support conversations.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>50-1000+ display programs</li><li>Procurement and PO support</li><li>RemoteQA deployment planning</li><li>Security and support review</li></ul><!-- /wp:list -->',
		),
		'store-education' => array(
			'post_title'   => 'Education Licensing',
			'post_name'    => 'education',
			'parent'       => 'store',
			'post_excerpt' => 'Education licensing for universities, labs, students, teaching programs, and academic display quality workflows.',
			'post_content' => '<!-- wp:heading --><h2>Education licensing for labs and students</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Use this page for academic licensing, teaching labs, research groups, student access, and discounted hardware or software bundle paths.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Academic lab licensing</li><li>Student access paths</li><li>Research and teaching workflows</li><li>Sensor bundle discounts</li></ul><!-- /wp:list -->',
		),
		'blog'         => array(
			'post_title'   => 'Blog',
			'post_name'    => 'blog',
			'post_excerpt' => 'QUBYX articles, news, product updates, and calibration market commentary.',
			'post_content' => '<!-- wp:paragraph --><p>QUBYX blog index.</p><!-- /wp:paragraph -->',
		),
		'support'      => array(
			'post_title'   => 'Support',
			'post_name'    => 'support',
			'post_excerpt' => 'Documentation, downloads, support requests, and implementation help for QUBYX products.',
			'post_content' => '<!-- wp:heading --><h2>Support for deployed display QA programs</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Find product downloads, documentation, compatibility guidance, and implementation support for QUBYX software and sensors.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Product downloads and release notes</li><li>Sensor and workstation compatibility</li><li>RemoteQA deployment guidance</li><li>Maintenance plan and support requests</li></ul><!-- /wp:list -->',
		),
		'downloads'    => array(
			'post_title'   => 'Downloads',
			'post_name'    => 'downloads',
			'post_excerpt' => 'Product downloads and documentation for QUBYX software.',
			'post_content' => '<!-- wp:heading --><h2>Downloads and documentation</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Publish installers, manuals, release notes, and product documentation here. Keep download access clear for current customers and evaluation users.</p><!-- /wp:paragraph -->',
		),
		'documentation' => array(
			'post_title'   => 'Documentation',
			'post_name'    => 'documentation',
			'parent'       => 'support',
			'post_excerpt' => 'QUBYX documentation for product setup, calibration workflows, sensors, RemoteQA, reporting, and deployment.',
			'post_content' => '<!-- wp:heading --><h2>Documentation for QUBYX products</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX documentation should help users with PerfectLum, PerfectChroma, RemoteQA deployment, SmartSensor pairing, reports, and troubleshooting.</p><!-- /wp:paragraph --><!-- wp:list --><ul><li>Installation and activation</li><li>Calibration workflow setup</li><li>Sensor compatibility</li><li>Report generation and export</li></ul><!-- /wp:list -->',
		),
		'contact-support' => array(
			'post_title'   => 'Contact Support',
			'post_name'    => 'contact-support',
			'parent'       => 'support',
			'post_excerpt' => 'Contact QUBYX support for product assistance, deployment help, troubleshooting, and maintenance plan questions.',
			'post_content' => '<!-- wp:heading --><h2>Contact QUBYX support</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Route customer requests by product, license, operating system, sensor, number of displays, site, urgency, and support plan.</p><!-- /wp:paragraph -->',
		),
		'warranty-rma' => array(
			'post_title'   => 'Warranty and RMA',
			'post_name'    => 'warranty-rma',
			'parent'       => 'support',
			'post_excerpt' => 'Warranty, returns, RMA, and hardware support information for QUBYX sensor products and bundles.',
			'post_content' => '<!-- wp:heading --><h2>Warranty and RMA support</h2><!-- /wp:heading --><!-- wp:paragraph --><p>SmartSensor warranty and RMA support should explain hardware support, return steps, RMA intake, serial number requirements, and reseller routing.</p><!-- /wp:paragraph -->',
		),
		'company'      => array(
			'post_title'   => 'Company',
			'post_name'    => 'company',
			'post_excerpt' => 'QUBYX develops display calibration and QA technology for medical and professional imaging workflows.',
			'post_content' => '<!-- wp:heading --><h2>About QUBYX</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX builds software and measurement tools for organizations that depend on trustworthy display performance. The company serves medical imaging, creative production, OEM validation, and enterprise display operations.</p><!-- /wp:paragraph -->',
		),
		'about'        => array(
			'post_title'   => 'About QUBYX',
			'post_name'    => 'about',
			'parent'       => 'company',
			'post_excerpt' => 'A display calibration software company focused on confidence, repeatability, and QA evidence.',
			'post_content' => '<!-- wp:heading --><h2>Built around measurable screen quality</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX products help teams replace guesswork with measurements, schedules, repeatable targets, and reports that can be reviewed by operators, managers, customers, and auditors.</p><!-- /wp:paragraph -->',
		),
		'partners'     => array(
			'post_title'   => 'Partners',
			'post_name'    => 'partners',
			'post_excerpt' => 'Partner with QUBYX for OEM, reseller, integrator, and enterprise display QA programs.',
			'post_content' => '<!-- wp:heading --><h2>Partner with QUBYX</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX works with display OEMs, resellers, integrators, healthcare IT teams, and calibration professionals to deliver reliable display QA programs.</p><!-- /wp:paragraph -->',
		),
		'contact'      => array(
			'post_title'   => 'Contact',
			'post_name'    => 'contact',
			'post_excerpt' => 'Contact QUBYX sales, support, partnerships, or product specialists.',
			'post_content' => '<!-- wp:heading --><h2>Talk with QUBYX</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Tell us about your displays, sites, standards, sensors, and reporting requirements. A QUBYX specialist can help route your request to sales, support, or engineering.</p><!-- /wp:paragraph -->',
		),
		'request-demo' => array(
			'post_title'   => 'Request Demo',
			'post_name'    => 'request-demo',
			'post_excerpt' => 'Book an enterprise QUBYX demo for PerfectLum, PerfectChroma, PerfectEPD, RemoteQA, or SmartSensor workflows.',
			'post_content' => '<!-- wp:heading --><h2>Request an enterprise demo</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Request a product walkthrough and share product interest, number of displays, industry, current QA process, required standards, and timeline.</p><!-- /wp:paragraph -->',
		),
		'privacy'      => array(
			'post_title'   => 'Privacy Policy',
			'post_name'    => 'privacy',
			'post_excerpt' => 'Privacy policy for QUBYX website visitors, customers, trial users, partners, and support contacts.',
			'post_content' => '<!-- wp:heading --><h2>Privacy Policy</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX privacy information covers website forms, analytics, support data, product trials, email subscriptions, and customer communications.</p><!-- /wp:paragraph -->',
		),
		'terms'        => array(
			'post_title'   => 'Terms of Service',
			'post_name'    => 'terms',
			'post_excerpt' => 'Terms of service for QUBYX website, software evaluation, support, store, and customer communications.',
			'post_content' => '<!-- wp:heading --><h2>Terms of Service</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX terms organize expectations for website use, purchases, trials, software licenses, support, and partner communications.</p><!-- /wp:paragraph -->',
		),
		'cookies'      => array(
			'post_title'   => 'Cookie Policy',
			'post_name'    => 'cookies',
			'post_excerpt' => 'Cookie policy for analytics, marketing, embedded content, forms, and website preferences on QUBYX.com.',
			'post_content' => '<!-- wp:heading --><h2>Cookie Policy</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX cookie information covers analytics, marketing, embedded media, consent tools, and regional compliance requirements.</p><!-- /wp:paragraph -->',
		),
		'security'     => array(
			'post_title'   => 'Security',
			'post_name'    => 'security',
			'post_excerpt' => 'Security information for QUBYX software, RemoteQA deployments, hosted services, and enterprise customers.',
			'post_content' => '<!-- wp:heading --><h2>Security for enterprise display QA</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX security information should explain hosted and local deployment options, access control, support procedures, data handling, updates, and enterprise security review paths.</p><!-- /wp:paragraph -->',
		),
		'compare'      => array(
			'post_title'   => 'Compare',
			'post_name'    => 'compare',
			'post_excerpt' => 'Comparison pages for display calibration software and QA workflow buyers.',
			'post_content' => '<!-- wp:heading --><h2>Compare calibration workflows</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Use these pages to help buyers compare QUBYX products against manual QA, generic utilities, open-source workflows, and consumer calibration tools.</p><!-- /wp:paragraph -->',
		),
		'calman-alternative' => array(
			'post_title'   => 'Calman Alternative for Enterprise Display QA',
			'post_name'    => 'calman-alternative',
			'parent'       => 'compare',
			'post_excerpt' => 'A comparison-oriented page for teams evaluating professional display calibration software.',
			'post_content' => '<!-- wp:heading --><h2>Evaluating Calman alternatives?</h2><!-- /wp:heading --><!-- wp:paragraph --><p>QUBYX pages should target workflow-fit comparisons, not shallow competitor claims. Focus on medical QA, remote fleet management, reporting, sensor support, and deployment requirements.</p><!-- /wp:paragraph -->',
		),
		'displaycal-alternative' => array(
			'post_title'   => 'DisplayCAL Alternative for Professional Teams',
			'post_name'    => 'displaycal-alternative',
			'parent'       => 'compare',
			'post_excerpt' => 'A comparison page for teams that need supported display calibration, reporting, and managed workflows.',
			'post_content' => '<!-- wp:heading --><h2>From open-source workflows to managed QA</h2><!-- /wp:heading --><!-- wp:paragraph --><p>DisplayCAL is widely known in technical communities. This page should explain when a managed commercial workflow is needed: support, reporting, scheduling, policy, and repeatable enterprise deployment.</p><!-- /wp:paragraph -->',
		),
		'datacolor-spyder-alternative' => array(
			'post_title'   => 'Datacolor Spyder Alternative for Professional Calibration',
			'post_name'    => 'datacolor-spyder-alternative',
			'parent'       => 'compare',
			'post_excerpt' => 'A comparison page for buyers moving from consumer calibration toward professional QA workflows.',
			'post_content' => '<!-- wp:heading --><h2>When consumer calibration is not enough</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Professional display QA goes beyond individual monitor calibration by adding scheduled validation, reports, fleet visibility, standards, and support.</p><!-- /wp:paragraph -->',
		),
	);

	return qubyx_ci_enrich_pages( $pages );
}

/**
 * Add full SEO page content for every mega-menu destination.
 *
 * @param array $pages Base page seeds.
 * @return array
 */
function qubyx_ci_enrich_pages( $pages ) {
	$seo_pages = array(
		'solutions' => qubyx_ci_seo_page(
			'Solutions',
			'solutions',
			'Display calibration and quality assurance solutions for healthcare, creative production, enterprise IT, OEM display teams, and e-paper workflows.',
			array(
				'primary_keyword' => 'display calibration solutions',
				'intro'           => 'QUBYX solutions organize display calibration, verification, remote QA, and reporting around the way critical teams actually work: clinical reading, creative delivery, distributed fleet management, manufacturing validation, and specialized e-paper measurement.',
				'sections'        => array(
					array( 'heading' => 'Choose the right display QA workflow', 'body' => 'A medical imaging team may need DICOM Part 14 GSDF calibration, audit-ready reporting, and scheduled constancy checks. A studio may need repeatable color calibration for photography, video, and prepress. An enterprise IT team may need visibility across hundreds of workstations. QUBYX connects these needs through software, sensors, and remote QA architecture.' ),
					array( 'heading' => 'Built for measurable evidence', 'body' => 'Every solution page is designed around search intent and operational intent: what must be calibrated, who owns the process, which standards matter, which reports are required, and how the work scales across displays, locations, and teams.' ),
					array( 'heading' => 'From single workstation to managed fleet', 'body' => 'Start with one product, then extend into RemoteQA, SmartSensor hardware, support, and purchasing workflows. The content model supports demos, quotes, store paths, resources, comparisons, and future multilingual localization.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Which QUBYX solution is best for hospitals?', 'answer' => 'Medical Display QA, DICOM Calibration, and Multi-site Hospital Networks are the strongest entry points for radiology, diagnostic imaging, and healthcare QA teams.' ),
					array( 'question' => 'Which solution fits creative teams?', 'answer' => 'Color-Critical Workflows connects PerfectChroma to photographers, editors, designers, video teams, and prepress environments that need trustworthy screen-to-delivery color.' ),
					array( 'question' => 'Can these pages support enterprise SEO?', 'answer' => 'Yes. Each destination has a primary keyword, supporting sections, internal links, FAQ content, and SEO meta for Yoast and Rank Math.' ),
				),
				'links'           => array(
					array( 'label' => 'Medical Display QA', 'url' => '/solutions/medical-display-qa/' ),
					array( 'label' => 'Enterprise Display Management', 'url' => '/solutions/enterprise-display-management/' ),
					array( 'label' => 'Color-Critical Workflows', 'url' => '/solutions/color-critical-workflows/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'solution-medical-display-qa' => qubyx_ci_seo_page(
			'Medical Display QA',
			'medical-display-qa',
			'Medical display QA software and workflow guidance for radiology, diagnostic imaging, teleradiology, and hospital compliance teams.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'medical display QA software',
				'intro'           => 'Medical display QA is the operational layer that keeps diagnostic screens calibrated, verified, documented, and ready for clinical interpretation. QUBYX content positions PerfectLum and RemoteQA for radiology teams that need repeatable DICOM calibration and audit-ready evidence.',
				'sections'        => array(
					array( 'heading' => 'DICOM calibration for diagnostic confidence', 'body' => 'PerfectLum is positioned for DICOM Part 14 GSDF calibration, conformance checks, acceptance testing, consistency checks, and reporting for medical displays used in radiology, teleradiology, mammography review, dental imaging, and other diagnostic workflows.' ),
					array( 'heading' => 'QA evidence for medical physicists and administrators', 'body' => 'The page explains how teams can document display identity, calibration date, sensor data, target response, test result, operator notes, and corrective action history. That evidence helps replace informal checks with a repeatable quality program.' ),
					array( 'heading' => 'Remote readiness for modern healthcare', 'body' => 'Healthcare networks increasingly manage displays across campuses, imaging centers, reading rooms, and home workstations. QUBYX RemoteQA content connects medical display QA to centralized monitoring, scheduling, and reporting.' ),
				),
				'faqs'            => array(
					array( 'question' => 'What is medical display QA?', 'answer' => 'Medical display QA is the process of calibrating, testing, documenting, and maintaining diagnostic displays so image presentation remains measurable and consistent.' ),
					array( 'question' => 'Which standards should this page mention?', 'answer' => 'Use standards and guidance terms such as DICOM Part 14 GSDF, AAPM TG18, AAPM TG270, DIN 6868-157, ACR, and local policy requirements where relevant.' ),
					array( 'question' => 'Which QUBYX product belongs here?', 'answer' => 'PerfectLum is the primary product, with RemoteQA and SmartSensor S1/S2 supporting fleet workflows and measurement needs.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'DICOM Calibration', 'url' => '/solutions/dicom-calibration/' ),
					array( 'label' => 'Multi-site Hospital Networks', 'url' => '/solutions/multi-site-hospital-networks/' ),
					array( 'label' => 'DICOM display calibration guide', 'url' => '/resources/dicom-display-calibration-guide/' ),
				),
			)
		),
		'solution-dicom-calibration' => qubyx_ci_seo_page(
			'DICOM Calibration',
			'dicom-calibration',
			'DICOM calibration software content for medical displays, GSDF conformance, radiology monitor QA, and diagnostic image consistency.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'DICOM calibration software',
				'intro'           => 'DICOM calibration aligns medical display grayscale behavior to the GSDF response expected in diagnostic imaging workflows. This page targets buyers and technical evaluators searching for DICOM monitor calibration software, GSDF conformance, and medical display calibration evidence.',
				'sections'        => array(
					array( 'heading' => 'Why GSDF calibration matters', 'body' => 'Radiology interpretation depends on subtle luminance differences. A display that drifts away from target behavior can make image review less consistent across workstations, sites, and reading conditions. DICOM calibration helps bring display response back into a measurable standard.' ),
					array( 'heading' => 'What a complete workflow includes', 'body' => 'A complete DICOM calibration workflow includes sensor measurement, target selection, calibration, verification, acceptance or constancy testing, saved history, and reports that administrators can review later.' ),
					array( 'heading' => 'Where QUBYX fits', 'body' => 'PerfectLum provides the product story for calibration and QA; RemoteQA extends the story to centralized scheduling and monitoring; SmartSensor hardware supports repeatable measurement workflows.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Is DICOM calibration only for premium medical monitors?', 'answer' => 'No. The content can explain calibrated workflows across diagnostic, review, teleradiology, and mixed display environments while avoiding unsupported hardware claims.' ),
					array( 'question' => 'How often should DICOM displays be checked?', 'answer' => 'Frequency depends on policy, standards, display class, and clinical risk. The page should recommend scheduled QA rather than one-time calibration.' ),
					array( 'question' => 'Can DICOM calibration be managed remotely?', 'answer' => 'Yes. QUBYX RemoteQA content supports centralized scheduling, status review, and reporting for distributed medical displays.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'Medical Display QA', 'url' => '/solutions/medical-display-qa/' ),
					array( 'label' => 'Remote Monitor QA', 'url' => '/solutions/remote-monitor-qa/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'solution-remote-monitor-qa' => qubyx_ci_seo_page(
			'Remote Monitor QA',
			'remote-monitor-qa',
			'Remote monitor QA software for centralized display calibration scheduling, fleet status, reports, and multi-site quality programs.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'remote monitor QA software',
				'intro'           => 'Remote monitor QA turns display quality from a workstation-by-workstation task into a managed program. This page explains how administrators can schedule calibration, review status, collect reports, and reduce manual site visits across distributed display fleets.',
				'sections'        => array(
					array( 'heading' => 'Centralize display quality operations', 'body' => 'RemoteQA content should speak to PACS administrators, medical physics groups, enterprise IT, and service teams that need a live view of display status, overdue checks, completed reports, exceptions, and site coverage.' ),
					array( 'heading' => 'Reduce manual maintenance overhead', 'body' => 'A central QA workflow helps teams avoid travel-heavy maintenance routines, missed calibration windows, scattered spreadsheets, and inconsistent documentation between locations.' ),
					array( 'heading' => 'Support local and hosted deployment narratives', 'body' => 'QUBYX can position remote workflows for hosted service, local server, intranet, relay, and customer-controlled deployment discussions without overpromising a single architecture for every buyer.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Who needs remote monitor QA?', 'answer' => 'Organizations with multiple displays, multiple rooms, or multiple facilities need centralized QA more than teams managing a single workstation.' ),
					array( 'question' => 'What does RemoteQA track?', 'answer' => 'The page can describe scheduling, task completion, status review, reports, history, exceptions, and administrative visibility.' ),
					array( 'question' => 'Does remote QA replace sensors?', 'answer' => 'No. Remote QA organizes the program; sensors and software still provide measurement and calibration data.' ),
				),
				'links'           => array(
					array( 'label' => 'Qubyx RemoteQA', 'url' => '/products/qubyx-remoteqa/' ),
					array( 'label' => 'Enterprise Display Management', 'url' => '/solutions/enterprise-display-management/' ),
					array( 'label' => 'Remote monitor QA program guide', 'url' => '/resources/remote-monitor-qa-program/' ),
					array( 'label' => 'Security', 'url' => '/security/' ),
				),
			)
		),
		'solution-multi-site-hospital-networks' => qubyx_ci_seo_page(
			'Multi-site Hospital Networks',
			'multi-site-hospital-networks',
			'Display calibration and remote QA content for hospital networks, imaging chains, teleradiology teams, and multi-facility radiology programs.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'multi-site hospital display QA',
				'intro'           => 'Large healthcare networks need display QA that works across reading rooms, imaging centers, satellite sites, and remote radiology workstations. This page targets enterprise healthcare search intent around consistent imaging display performance across facilities.',
				'sections'        => array(
					array( 'heading' => 'One display policy across many locations', 'body' => 'The content explains how a network can standardize targets, test schedules, evidence requirements, reporting structure, and escalation paths so every site follows the same display QA program.' ),
					array( 'heading' => 'Visibility for administrators and QA owners', 'body' => 'Multi-site teams need to know which displays are calibrated, which tasks are overdue, which reports are ready, and where exceptions require action. This is where RemoteQA, PerfectLum, and support workflows connect.' ),
					array( 'heading' => 'Designed for procurement and compliance review', 'body' => 'This page should help buyers frame volume licensing, SmartSensor hardware needs, maintenance plans, onboarding, security review, and demo requests for enterprise healthcare purchasing.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Can QUBYX support multiple hospital sites?', 'answer' => 'The content positions QUBYX for centralized policy, scheduling, reporting, and product planning across distributed display environments.' ),
					array( 'question' => 'Which product is most relevant?', 'answer' => 'PerfectLum is the medical QA anchor, while Qubyx RemoteQA supports centralized management and SmartSensor hardware supports measurement workflows.' ),
					array( 'question' => 'Should this page mention teleradiology?', 'answer' => 'Yes. Teleradiology and home reading workflows are important search intents for multi-site diagnostic display consistency.' ),
				),
				'links'           => array(
					array( 'label' => 'Medical Display QA', 'url' => '/solutions/medical-display-qa/' ),
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'Qubyx RemoteQA', 'url' => '/products/qubyx-remoteqa/' ),
					array( 'label' => 'Contact sales', 'url' => '/contact/' ),
				),
			)
		),
		'solution-teleradiology-display-qa' => qubyx_ci_seo_page(
			'Teleradiology Display QA',
			'teleradiology-display-qa',
			'Teleradiology display QA content for remote reading workstations, home radiology setups, DICOM calibration, and distributed diagnostic display reporting.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'teleradiology display QA',
				'intro'           => 'Teleradiology teams need the same confidence in remote reading displays that hospitals expect in controlled reading rooms. QUBYX helps frame a QA program for home workstations, remote radiologists, distributed imaging teams, and multi-site diagnostic review.',
				'sections'        => array(
					array( 'heading' => 'Remote reading still depends on display quality', 'body' => 'Diagnostic confidence does not stop at the hospital network edge. Remote displays can drift, room conditions can vary, and QA evidence can become fragmented without a structured workflow.' ),
					array( 'heading' => 'DICOM calibration beyond the reading room', 'body' => 'PerfectLum can support DICOM calibration, verification, and reporting language for remote radiology workstations, while RemoteQA can help administrators see which displays are ready and which require attention.' ),
					array( 'heading' => 'A practical program for distributed teams', 'body' => 'A teleradiology QA program can define display requirements, sensor workflow, scheduled checks, reporting expectations, corrective action paths, and escalation between remote readers and central QA owners.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Why does teleradiology need display QA?', 'answer' => 'Remote reading environments can vary widely, so calibration, verification, and documentation help maintain a consistent diagnostic display workflow.' ),
					array( 'question' => 'Which QUBYX products are relevant?', 'answer' => 'PerfectLum is the medical calibration anchor, with Qubyx RemoteQA supporting centralized status and SmartSensor hardware supporting measurement workflows.' ),
					array( 'question' => 'Can remote displays be managed centrally?', 'answer' => 'Yes. A remote QA workflow can help administrators review schedules, completion status, reports, and exceptions across distributed workstations.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'Remote Monitor QA', 'url' => '/solutions/remote-monitor-qa/' ),
					array( 'label' => 'Medical Display QA', 'url' => '/solutions/medical-display-qa/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'solution-mammography-display-qa' => qubyx_ci_seo_page(
			'Mammography Display QA',
			'mammography-display-qa',
			'Mammography display QA content for high-confidence medical imaging review, calibration evidence, scheduled checks, and diagnostic display consistency.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'mammography display QA',
				'intro'           => 'Mammography review depends on subtle image detail and consistent display behavior. QUBYX positions mammography display QA around measurable luminance response, scheduled verification, documented procedures, and reviewable evidence.',
				'sections'        => array(
					array( 'heading' => 'High-detail imaging needs disciplined QA', 'body' => 'Mammography environments often require tighter attention to display class, viewing conditions, calibration history, and quality documentation than general-purpose review workflows.' ),
					array( 'heading' => 'Calibration evidence for clinical teams', 'body' => 'A useful workflow records display identity, measurement device, calibration target, QA result, operator, date, and corrective action so imaging teams can review performance over time.' ),
					array( 'heading' => 'Connect specialist review to enterprise operations', 'body' => 'PerfectLum, SmartSensor hardware, and RemoteQA can be positioned together for breast imaging centers, hospital networks, and distributed review programs.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Is mammography display QA different from general medical display QA?', 'answer' => 'It is a specialized clinical workflow where display performance, viewing conditions, documentation, and policy alignment can carry higher operational importance.' ),
					array( 'question' => 'What should teams document?', 'answer' => 'Display identity, calibration target, measurement method, QA result, date, operator, report, and corrective action history.' ),
					array( 'question' => 'Which QUBYX product should lead?', 'answer' => 'PerfectLum should be the primary product path, with SmartSensor and RemoteQA content supporting measurement and fleet visibility.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'Medical Imaging', 'url' => '/industries/medical-imaging/' ),
					array( 'label' => 'DICOM Calibration', 'url' => '/solutions/dicom-calibration/' ),
					array( 'label' => 'Contact sales', 'url' => '/contact/' ),
				),
			)
		),
		'solution-pathology-display-calibration' => qubyx_ci_seo_page(
			'Pathology Display Calibration',
			'pathology-display-calibration',
			'Pathology display calibration content for digital pathology review, color consistency, diagnostic workstations, and image quality confidence.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'pathology display calibration',
				'intro'           => 'Digital pathology review brings display quality into another clinical decision workflow. QUBYX can position pathology display calibration around color consistency, luminance stability, workstation verification, and repeatable evidence for image review teams.',
				'sections'        => array(
					array( 'heading' => 'Digital pathology needs stable visual conditions', 'body' => 'Pathology images depend on color, contrast, luminance, and viewing context. A managed calibration workflow helps teams reduce avoidable variation across diagnostic review stations.' ),
					array( 'heading' => 'Bridge medical QA and color-critical validation', 'body' => 'Pathology display calibration can connect PerfectLum medical QA positioning with PerfectChroma color workflow language where teams need consistent color presentation and documentation.' ),
					array( 'heading' => 'Support labs and enterprise imaging programs', 'body' => 'Hospitals, labs, and enterprise imaging groups can use calibration reports, scheduled checks, sensor workflows, and RemoteQA visibility to keep review displays accountable.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Why does digital pathology need calibration?', 'answer' => 'Consistent display behavior helps reduce avoidable variation in color and luminance presentation across pathology review workstations.' ),
					array( 'question' => 'Which product path fits pathology?', 'answer' => 'Depending on the workflow, PerfectLum, PerfectChroma, SmartSensor hardware, and RemoteQA may all be relevant.' ),
					array( 'question' => 'Can this support lab networks?', 'answer' => 'Yes. Remote QA and reporting can help labs track display status and evidence across multiple workstations or sites.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectChroma', 'url' => '/products/perfectchroma/' ),
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'Medical Imaging', 'url' => '/industries/medical-imaging/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'solution-enterprise-display-management' => qubyx_ci_seo_page(
			'Enterprise Display Management',
			'enterprise-display-management',
			'Centralized display calibration management for multi-site organizations, hospitals, production teams, OEMs, and enterprise IT.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'enterprise display management',
				'intro'           => 'Enterprise display management gives organizations a structured way to govern display calibration, validation, reporting, and ownership across teams, buildings, countries, and mixed hardware environments.',
				'sections'        => array(
					array( 'heading' => 'Move from isolated calibration to managed display infrastructure', 'body' => 'Enterprise buyers need more than one calibration event. They need inventory, schedules, policies, operator roles, reports, exceptions, maintenance plans, and repeatable purchasing paths for software and sensors.' ),
					array( 'heading' => 'Support regulated and color-critical teams', 'body' => 'Hospitals, manufacturing groups, media teams, and quality departments each require trustworthy display output. QUBYX content frames display quality as a business-critical control layer.' ),
					array( 'heading' => 'Connect software, sensors, and services', 'body' => 'The page should guide visitors toward PerfectLum, PerfectChroma, PerfectEPD, RemoteQA, SmartSensor hardware, store bundles, and enterprise demo workflows.' ),
				),
				'faqs'            => array(
					array( 'question' => 'What is enterprise display management?', 'answer' => 'It is the coordinated management of display calibration, QA schedules, evidence, ownership, reports, and fleet visibility across an organization.' ),
					array( 'question' => 'Is this only for healthcare?', 'answer' => 'No. Healthcare is a core use case, but enterprise display management also applies to OEM validation, creative operations, manufacturing, and quality programs.' ),
					array( 'question' => 'How should buyers start?', 'answer' => 'Start with the product and workflow most tied to risk, then evaluate RemoteQA, sensors, maintenance, and volume licensing.' ),
				),
				'links'           => array(
					array( 'label' => 'Qubyx RemoteQA', 'url' => '/products/qubyx-remoteqa/' ),
					array( 'label' => 'Store', 'url' => '/store/' ),
					array( 'label' => 'Security', 'url' => '/security/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'solution-color-critical-workflows' => qubyx_ci_seo_page(
			'Color-Critical Workflows',
			'color-critical-workflows',
			'Professional display calibration for photographers, videographers, editors, designers, prepress teams, and brand color workflows.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'professional display calibration software',
				'intro'           => 'Color-critical work depends on consistent screen behavior. This page connects PerfectChroma to creative teams that need confidence from capture to edit, proof, grade, print, web, and client delivery.',
				'sections'        => array(
					array( 'heading' => 'Calibration for real creative deliverables', 'body' => 'PerfectChroma content should map calibration to concrete outputs: prints, online campaigns, video edits, soft proofs, brand assets, and multi-display editing setups.' ),
					array( 'heading' => 'Standards without unnecessary complexity', 'body' => 'Creative buyers search for sRGB, Adobe RGB, Rec.709, DCI-P3, ICC profiles, white point, luminance, and monitor drift. The page should explain these concepts in workflow language, not only lab language.' ),
					array( 'heading' => 'Verification before delivery', 'body' => 'The strongest enterprise story is not only calibration, but repeatable verification and proof that the display was within target when critical work was approved.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Who should use PerfectChroma?', 'answer' => 'Photographers, videographers, editors, designers, prepress teams, studios, and serious creators who need repeatable display color.' ),
					array( 'question' => 'Which standards belong on the page?', 'answer' => 'Mention sRGB, Adobe RGB, Rec.709, DCI-P3, ICC profiles, ISO 12646, and print or broadcast workflow targets where appropriate.' ),
					array( 'question' => 'Can this support team workflows?', 'answer' => 'Yes. The page should speak to studios and organizations that need consistent results across multiple workstations.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectChroma', 'url' => '/products/perfectchroma/' ),
					array( 'label' => 'DisplayCAL Alternative', 'url' => '/compare/displaycal-alternative/' ),
					array( 'label' => 'Datacolor Spyder Alternative', 'url' => '/compare/datacolor-spyder-alternative/' ),
					array( 'label' => 'Shop licenses', 'url' => '/store/' ),
				),
			)
		),
		'solution-oem-display-calibration' => qubyx_ci_seo_page(
			'OEM Display Calibration',
			'oem-display-calibration',
			'Display calibration, validation, reporting, and partner deployment workflows for OEMs, display manufacturers, and integrators.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'OEM display calibration',
				'intro'           => 'OEM display calibration content targets manufacturers and integrators that need repeatable validation, factory QA language, partner deployment paths, and post-deployment quality evidence.',
				'sections'        => array(
					array( 'heading' => 'Validation for display products and systems', 'body' => 'OEM teams need to validate luminance, color, uniformity, grayscale behavior, and customer-facing quality processes without turning each deployment into a custom project.' ),
					array( 'heading' => 'Partner-ready calibration content', 'body' => 'The page should support reseller, integrator, bundled software, sensor, documentation, and support discussions. It can route high-fit visitors toward partners and contact forms.' ),
					array( 'heading' => 'Quality evidence after shipment', 'body' => 'Display QA can continue after installation through reports, maintenance plans, RemoteQA, and customer success workflows.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Can QUBYX support OEM workflows?', 'answer' => 'The content positions QUBYX for OEM calibration, validation, partner deployment, reporting, and product discussions.' ),
					array( 'question' => 'Which products are relevant?', 'answer' => 'PerfectLum, PerfectChroma, PerfectEPD, RemoteQA, and SmartSensor hardware may all be relevant depending on the display technology and market.' ),
					array( 'question' => 'Should this page include technical claims?', 'answer' => 'Keep claims evidence-based and editable. Add final specifications only after QUBYX confirms them.' ),
				),
				'links'           => array(
					array( 'label' => 'Display Manufacturing', 'url' => '/industries/display-manufacturing/' ),
					array( 'label' => 'Partners', 'url' => '/partners/' ),
					array( 'label' => 'PerfectEPD', 'url' => '/products/perfectepd/' ),
					array( 'label' => 'Contact sales', 'url' => '/contact/' ),
				),
			)
		),
		'solution-epaper-display-qa' => qubyx_ci_seo_page(
			'E-paper Display QA',
			'epaper-display-qa',
			'Calibration, contrast, reflectance, uniformity, and QA workflows for electronic paper display systems and EPD teams.',
			array(
				'parent'          => 'solutions',
				'primary_keyword' => 'e-paper display QA',
				'intro'           => 'E-paper display QA needs a different content story than emissive monitor calibration. This page introduces PerfectEPD for teams measuring contrast, reflectance, uniformity, viewing conditions, and repeatability in electronic paper workflows.',
				'sections'        => array(
					array( 'heading' => 'Measurement for reflective display behavior', 'body' => 'EPD quality depends on ambient light, reflectance, contrast, surface behavior, refresh characteristics, and viewing context. The page should teach buyers why repeatable procedure design matters.' ),
					array( 'heading' => 'Useful for OEM and lab teams', 'body' => 'PerfectEPD content can support display makers, system builders, lab validation groups, and teams testing specialized screens for retail, signage, medical, industrial, or embedded use cases.' ),
					array( 'heading' => 'Build an evidence trail', 'body' => 'A structured QA page should route readers toward technical notes, product demos, partner conversations, and future product-specific documentation.' ),
				),
				'faqs'            => array(
					array( 'question' => 'What is e-paper display QA?', 'answer' => 'It is a repeatable process for measuring and documenting display qualities such as contrast, reflectance, uniformity, and performance under defined viewing conditions.' ),
					array( 'question' => 'Who is PerfectEPD for?', 'answer' => 'PerfectEPD is positioned for OEMs, labs, and specialized display teams working with electronic paper display systems.' ),
					array( 'question' => 'Does e-paper QA use the same workflow as medical monitors?', 'answer' => 'No. The page should explain the differences while still connecting to QUBYX measurement and reporting principles.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectEPD', 'url' => '/products/perfectepd/' ),
					array( 'label' => 'E-paper measurement basics', 'url' => '/resources/epaper-display-measurement-basics/' ),
					array( 'label' => 'OEM Display Calibration', 'url' => '/solutions/oem-display-calibration/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'industries' => qubyx_ci_seo_page(
			'Industries',
			'industries',
			'Industry pages for healthcare, display manufacturing, broadcast, post-production, medical imaging, and specialized display QA programs.',
			array(
				'primary_keyword' => 'display calibration by industry',
				'intro'           => 'QUBYX industry pages map product value to the people who buy and operate display QA: radiology administrators, medical physicists, color teams, OEM engineers, production leads, and enterprise IT.',
				'sections'        => array(
					array( 'heading' => 'Healthcare and medical imaging', 'body' => 'Healthcare pages emphasize DICOM calibration, diagnostic display QA, audit evidence, teleradiology, and multi-site consistency.' ),
					array( 'heading' => 'Manufacturing and OEM programs', 'body' => 'Manufacturing pages explain validation, repeatable measurement procedures, product QA, partner deployment, and post-sale support.' ),
					array( 'heading' => 'Creative production and broadcast', 'body' => 'Creative pages connect monitor calibration to Rec.709, DCI-P3, sRGB, Adobe RGB, proofing, client delivery, and team-wide confidence.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Why create industry pages?', 'answer' => 'Industry pages capture search demand from buyers who describe their problem by role, market, and risk rather than by product name.' ),
					array( 'question' => 'Are these pages import-ready?', 'answer' => 'Yes. They are seeded as WordPress pages and can be translated through WPML like the rest of the content.' ),
					array( 'question' => 'Which industry should be prioritized first?', 'answer' => 'Healthcare and medical imaging are the strongest P0/P1 opportunities, followed by display manufacturing and broadcast or post-production.' ),
				),
				'links'           => array(
					array( 'label' => 'Display Manufacturing', 'url' => '/industries/display-manufacturing/' ),
					array( 'label' => 'Broadcast and Post-production', 'url' => '/industries/broadcast-post-production/' ),
					array( 'label' => 'Medical Imaging', 'url' => '/industries/medical-imaging/' ),
					array( 'label' => 'Solutions', 'url' => '/solutions/' ),
				),
			)
		),
		'industry-display-manufacturing' => qubyx_ci_seo_page(
			'Display Manufacturing',
			'display-manufacturing',
			'Display calibration, validation, quality assurance, and reporting content for manufacturers, OEMs, labs, and integrators.',
			array(
				'parent'          => 'industries',
				'primary_keyword' => 'display manufacturing calibration',
				'intro'           => 'Display manufacturers and integrators need repeatable calibration and QA content that can support product validation, customer confidence, factory processes, and post-installation quality workflows.',
				'sections'        => array(
					array( 'heading' => 'Validate more than a single screen', 'body' => 'Manufacturing QA often needs consistent procedures across models, lots, workstations, sensor setups, and product lines. QUBYX content should frame calibration as a repeatable process, not a one-off adjustment.' ),
					array( 'heading' => 'Connect factory QA to field evidence', 'body' => 'After deployment, teams may need RemoteQA, reports, support, and maintenance plans to keep display performance visible across customers and sites.' ),
					array( 'heading' => 'Support partner and OEM sales motions', 'body' => 'This page routes visitors toward OEM calibration, PerfectEPD, SmartSensor hardware, partner programs, and enterprise contact paths.' ),
				),
				'faqs'            => array(
					array( 'question' => 'What should manufacturers measure?', 'answer' => 'Potential topics include luminance, color, uniformity, grayscale response, contrast, reflectance, stability, and workflow repeatability depending on display technology.' ),
					array( 'question' => 'Can QUBYX content support OEM partners?', 'answer' => 'Yes. The page is designed to connect product, partner, store, and support paths for OEM and integrator conversations.' ),
					array( 'question' => 'Should this include exact device specifications?', 'answer' => 'Only after QUBYX confirms them. The seed content stays useful without making unsupported technical claims.' ),
				),
				'links'           => array(
					array( 'label' => 'OEM Display Calibration', 'url' => '/solutions/oem-display-calibration/' ),
					array( 'label' => 'PerfectEPD', 'url' => '/products/perfectepd/' ),
					array( 'label' => 'SmartSensor S2', 'url' => '/products/qubyx-smartsensor-s2/' ),
					array( 'label' => 'Partners', 'url' => '/partners/' ),
				),
			)
		),
		'industry-broadcast-post-production' => qubyx_ci_seo_page(
			'Broadcast and Post-production',
			'broadcast-post-production',
			'Monitor calibration and color verification content for broadcast, editing, grading, post-production, and studio delivery workflows.',
			array(
				'parent'          => 'industries',
				'primary_keyword' => 'broadcast monitor calibration',
				'intro'           => 'Broadcast and post-production teams depend on calibrated monitors for editorial decisions, color grading, client review, and final delivery. This page positions PerfectChroma for professional color workflows without drifting into consumer-only messaging.',
				'sections'        => array(
					array( 'heading' => 'Color decisions need stable displays', 'body' => 'A calibrated monitor helps editors and color teams reduce surprises between the timeline, client review, web delivery, broadcast output, and archive.' ),
					array( 'heading' => 'Match content to delivery standards', 'body' => 'The page can support Rec.709, DCI-P3, HDR workflow language, sRGB, luminance targets, white point, gamma, verification, and repeatable profile management.' ),
					array( 'heading' => 'Built for teams, not only individuals', 'body' => 'Studios need repeatable calibration across edit bays, remote editors, freelancers, client review stations, and shared workstations.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Is PerfectChroma only for photographers?', 'answer' => 'No. PerfectChroma can be positioned for video editors, colorists, designers, prepress teams, studios, and serious creators.' ),
					array( 'question' => 'Which standards should the page include?', 'answer' => 'Use Rec.709, DCI-P3, sRGB, Adobe RGB, ICC profile, gamma, white point, and verification language where relevant.' ),
					array( 'question' => 'How does this connect to enterprise SEO?', 'answer' => 'It captures industry-specific demand and routes visitors to PerfectChroma, comparisons, store, and demo flows.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectChroma', 'url' => '/products/perfectchroma/' ),
					array( 'label' => 'Color-Critical Workflows', 'url' => '/solutions/color-critical-workflows/' ),
					array( 'label' => 'Store', 'url' => '/store/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'industry-healthcare' => qubyx_ci_seo_page(
			'Healthcare',
			'healthcare',
			'Healthcare display calibration and QA content for hospitals, imaging centers, radiology groups, and teleradiology networks.',
			array(
				'parent'          => 'industries',
				'primary_keyword' => 'healthcare display calibration',
				'intro'           => 'Healthcare organizations need display QA programs that support clinical confidence, documentation, consistency, and distributed operations across reading environments.',
				'sections'        => array(
					array( 'heading' => 'For radiology and diagnostic imaging', 'body' => 'This page routes clinical buyers toward DICOM calibration, medical display QA, PerfectLum, SmartSensor workflows, and RemoteQA.' ),
					array( 'heading' => 'For IT and QA administration', 'body' => 'Healthcare IT needs visibility into schedules, exceptions, support, updates, licensing, and enterprise deployment options.' ),
					array( 'heading' => 'For procurement and compliance review', 'body' => 'The content supports demo requests, volume quotes, security review, documentation, maintenance, and support routing.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Which QUBYX product fits healthcare?', 'answer' => 'PerfectLum is the primary healthcare product, with RemoteQA and SmartSensor hardware supporting enterprise display QA programs.' ),
					array( 'question' => 'Does this page replace Medical Display QA?', 'answer' => 'No. Healthcare is an industry hub; Medical Display QA is the workflow page for diagnostic display quality.' ),
					array( 'question' => 'Can this page target teleradiology?', 'answer' => 'Yes. It can link to multi-site and remote QA pages for deeper teleradiology content.' ),
				),
				'links'           => array(
					array( 'label' => 'Medical Display QA', 'url' => '/solutions/medical-display-qa/' ),
					array( 'label' => 'Multi-site Hospital Networks', 'url' => '/solutions/multi-site-hospital-networks/' ),
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'Contact support', 'url' => '/support/contact-support/' ),
				),
			)
		),
		'industry-medical-imaging' => qubyx_ci_seo_page(
			'Medical Imaging',
			'medical-imaging',
			'Medical imaging display calibration content for radiology, teleradiology, diagnostic review, and image quality assurance teams.',
			array(
				'parent'          => 'industries',
				'primary_keyword' => 'medical imaging display calibration',
				'intro'           => 'Medical imaging pages should speak directly to the teams responsible for diagnostic image presentation: radiologists, medical physicists, PACS administrators, imaging directors, and QA owners.',
				'sections'        => array(
					array( 'heading' => 'Display quality affects image interpretation', 'body' => 'Subtle grayscale and luminance differences can matter in medical image review. A structured calibration and QA program helps keep displays aligned with policy and clinical expectations.' ),
					array( 'heading' => 'Support both primary and remote reading', 'body' => 'Hospitals increasingly need display consistency across primary reading rooms, satellite locations, and teleradiology environments.' ),
					array( 'heading' => 'Create a documented QA record', 'body' => 'Reports, history, schedules, and corrective action notes help teams demonstrate that display quality is being actively managed.' ),
				),
				'faqs'            => array(
					array( 'question' => 'What product should medical imaging teams review?', 'answer' => 'PerfectLum is the primary product page, supported by RemoteQA and SmartSensor content.' ),
					array( 'question' => 'Is this page different from Healthcare?', 'answer' => 'Yes. Medical Imaging is narrower and focused on diagnostic display calibration and QA search intent.' ),
					array( 'question' => 'Should this page include compliance language?', 'answer' => 'Yes, but it should route detailed standards content to DICOM Calibration and Medical Display QA pages.' ),
				),
				'links'           => array(
					array( 'label' => 'DICOM Calibration', 'url' => '/solutions/dicom-calibration/' ),
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'Medical Display QA', 'url' => '/solutions/medical-display-qa/' ),
					array( 'label' => 'DICOM guide', 'url' => '/resources/dicom-display-calibration-guide/' ),
				),
			)
		),
		'store' => qubyx_ci_seo_page(
			'Store',
			'store',
			'Explore QUBYX software licenses, SmartSensor hardware, maintenance plans, enterprise bundles, quote requests, and future WooCommerce purchasing paths.',
			array(
				'primary_keyword' => 'display calibration software store',
				'intro'           => 'The QUBYX Store page is the commercial entry point for software licenses, sensors, enterprise bundles, maintenance plans, quote requests, and future checkout flows.',
				'sections'        => array(
					array( 'heading' => 'Software licenses', 'body' => 'Create clear purchasing paths for PerfectLum, PerfectChroma, PerfectEPD, and Qubyx RemoteQA. The page can support trial, demo, quote, and volume licensing calls to action.' ),
					array( 'heading' => 'Sensor and software bundles', 'body' => 'SmartSensor S1 and SmartSensor S2 can be positioned alongside product workflows so visitors understand which measurement hardware belongs with their use case.' ),
					array( 'heading' => 'Enterprise purchasing', 'body' => 'Store content should support procurement questions around volume pricing, maintenance plans, support coverage, partner purchasing, onboarding, and reseller or OEM programs.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Can this become WooCommerce later?', 'answer' => 'Yes. The page is seeded as a normal WordPress page today and can later become a WooCommerce storefront or landing page without changing the navigation strategy.' ),
					array( 'question' => 'What should buyers do before purchasing?', 'answer' => 'Enterprise buyers should request a demo or quote when they have multiple displays, multiple sites, security requirements, or workflow-specific needs.' ),
					array( 'question' => 'Does the store support partners?', 'answer' => 'Yes. The page links to partner purchasing and quote flows for OEM, reseller, and integrator conversations.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'SmartSensor S1', 'url' => '/products/qubyx-smartsensor-s1/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
					array( 'label' => 'Partners', 'url' => '/partners/' ),
				),
			)
		),
		'blog' => qubyx_ci_seo_page(
			'Blog',
			'blog',
			'QUBYX articles, news, product updates, compliance explainers, and display calibration insights for medical, creative, OEM, and enterprise teams.',
			array(
				'primary_keyword' => 'display calibration blog',
				'intro'           => 'The QUBYX Blog is the editorial home for display calibration education, product updates, compliance explainers, industry articles, and practical guidance for teams that manage critical screens.',
				'sections'        => array(
					array( 'heading' => 'Education for every buying stage', 'body' => 'Use the blog to answer early-stage questions about DICOM calibration, professional color workflows, remote monitor QA, e-paper display measurement, sensors, and enterprise display quality programs.' ),
					array( 'heading' => 'News and product updates', 'body' => 'Publish product release notes, SmartSensor updates, RemoteQA improvements, event announcements, partner news, and customer-safe company updates.' ),
					array( 'heading' => 'SEO topics that support the product portfolio', 'body' => 'Blog content should internally link to PerfectLum, PerfectChroma, PerfectEPD, RemoteQA, SmartSensor products, comparison pages, support pages, and request-demo paths.' ),
				),
				'faqs'            => array(
					array( 'question' => 'What should QUBYX publish first?', 'answer' => 'Start with DICOM calibration, remote monitor QA, medical display QA, professional monitor calibration, and comparison topics because they map closely to buyer search intent.' ),
					array( 'question' => 'Should blog posts be translated?', 'answer' => 'Translate priority articles through WPML once the English content proves useful for search and conversion.' ),
					array( 'question' => 'How should blog posts convert?', 'answer' => 'Each article should link to a relevant product, solution, resource, support page, store page, or demo request.' ),
				),
				'links'           => array(
					array( 'label' => 'Resource library', 'url' => '/resources/' ),
					array( 'label' => 'Compare', 'url' => '/compare/' ),
					array( 'label' => 'Medical Display QA', 'url' => '/solutions/medical-display-qa/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
				'final_heading'   => 'Explore QUBYX insights',
				'final_body'      => 'Use the blog to move from calibration questions to product decisions, support resources, and enterprise deployment planning.',
			)
		),
		'support' => qubyx_ci_seo_page(
			'Support',
			'support',
			'QUBYX support hub for downloads, documentation, product help, deployment questions, warranty, security review, and customer assistance.',
			array(
				'primary_keyword' => 'QUBYX support',
				'intro'           => 'The Support hub helps customers, evaluators, partners, and administrators find the right next step for QUBYX software, sensors, documentation, downloads, warranty, and enterprise deployment needs.',
				'sections'        => array(
					array( 'heading' => 'Product downloads and documentation', 'body' => 'Route users to installers, manuals, release notes, compatibility notes, setup instructions, report workflows, sensor pairing, and RemoteQA deployment guidance.' ),
					array( 'heading' => 'Help for active deployments', 'body' => 'Support content should capture product, version, operating system, license, sensor, site, number of displays, urgency, and the workflow the customer is trying to complete.' ),
					array( 'heading' => 'Trust and maintenance paths', 'body' => 'Enterprise users often need security review, warranty information, RMA instructions, support plan coverage, and maintenance plan details before renewal or expansion.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Where should customers download QUBYX software?', 'answer' => 'Use the Downloads page for installers, manuals, release notes, and product-specific download guidance.' ),
					array( 'question' => 'Where should technical documentation live?', 'answer' => 'Use the Documentation page for setup, calibration, sensors, RemoteQA, reporting, and troubleshooting articles.' ),
					array( 'question' => 'How should support forms be structured?', 'answer' => 'Capture product, license, operating system, sensor, number of displays, site, issue summary, urgency, and contact details.' ),
				),
				'links'           => array(
					array( 'label' => 'Downloads', 'url' => '/downloads/' ),
					array( 'label' => 'Documentation', 'url' => '/support/documentation/' ),
					array( 'label' => 'Contact support', 'url' => '/support/contact-support/' ),
					array( 'label' => 'Security', 'url' => '/security/' ),
				),
			)
		),
		'downloads' => qubyx_ci_seo_page(
			'Downloads',
			'downloads',
			'Download hub for QUBYX installers, manuals, release notes, product documentation, evaluation links, and update guidance.',
			array(
				'primary_keyword' => 'QUBYX downloads',
				'intro'           => 'The Downloads page is the practical hub for customers and evaluators who need installers, manuals, release notes, update guidance, compatibility notes, and product-specific documentation.',
				'sections'        => array(
					array( 'heading' => 'Organize downloads by product', 'body' => 'Separate PerfectLum, PerfectChroma, PerfectEPD, Qubyx RemoteQA, SmartSensor utilities, manuals, and release notes so users do not have to guess which file belongs to their workflow.' ),
					array( 'heading' => 'Support evaluation and maintenance users', 'body' => 'The page should support trial users, current license holders, maintenance plan customers, and enterprise administrators who need repeatable installation paths.' ),
					array( 'heading' => 'Keep support routing close', 'body' => 'Every download path should make it easy to reach documentation, support contact, store, and demo pages if a user is uncertain.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Should downloads be public?', 'answer' => 'The seed content supports either public downloads or gated downloads depending on QUBYX policy.' ),
					array( 'question' => 'What should each download include?', 'answer' => 'Include product name, version, platform, release date, file type, documentation link, and support path.' ),
					array( 'question' => 'Where do release notes belong?', 'answer' => 'They can live on Downloads, Product Updates, or Documentation, with internal links between all three.' ),
				),
				'links'           => array(
					array( 'label' => 'Documentation', 'url' => '/support/documentation/' ),
					array( 'label' => 'Contact support', 'url' => '/support/contact-support/' ),
					array( 'label' => 'Store', 'url' => '/store/' ),
					array( 'label' => 'Product updates', 'url' => '/resources/category/product-updates/' ),
				),
			)
		),
		'documentation' => qubyx_ci_seo_page(
			'Documentation',
			'documentation',
			'QUBYX documentation for installation, calibration setup, sensors, RemoteQA deployment, reports, troubleshooting, and product workflows.',
			array(
				'parent'          => 'support',
				'primary_keyword' => 'QUBYX documentation',
				'intro'           => 'QUBYX Documentation is the structured knowledge base for product setup, calibration, reporting, RemoteQA deployment, sensors, troubleshooting, and support preparation.',
				'sections'        => array(
					array( 'heading' => 'Start with setup paths', 'body' => 'Organize documentation around installation, activation, sensor setup, display connection, product selection, operating system notes, and first calibration.' ),
					array( 'heading' => 'Document repeatable workflows', 'body' => 'Create content for DICOM calibration, color presets, e-paper measurement, task scheduling, report export, history review, and troubleshooting.' ),
					array( 'heading' => 'Make support faster', 'body' => 'Good documentation should help users gather product versions, sensor details, logs, screenshots, report files, and environment details before contacting support.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Should documentation be translated?', 'answer' => 'Yes. Documentation pages should be translated through WPML and maintained as product-specific knowledge grows.' ),
					array( 'question' => 'Can this become a knowledge base?', 'answer' => 'Yes. It starts as a page and can later become a documentation post type, help center, or searchable knowledge base.' ),
					array( 'question' => 'What should the first docs cover?', 'answer' => 'Installation, activation, sensor pairing, calibration setup, RemoteQA deployment, reporting, and common troubleshooting.' ),
				),
				'links'           => array(
					array( 'label' => 'Downloads', 'url' => '/downloads/' ),
					array( 'label' => 'Contact support', 'url' => '/support/contact-support/' ),
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'Qubyx RemoteQA', 'url' => '/products/qubyx-remoteqa/' ),
				),
			)
		),
		'contact-support' => qubyx_ci_seo_page(
			'Contact Support',
			'contact-support',
			'Contact QUBYX support for product assistance, deployment help, troubleshooting, licensing, sensors, downloads, and maintenance questions.',
			array(
				'parent'          => 'support',
				'primary_keyword' => 'contact QUBYX support',
				'intro'           => 'Contact Support should capture the details QUBYX needs to help customers quickly: product, license, environment, sensor, display count, workflow, urgency, and support plan.',
				'sections'        => array(
					array( 'heading' => 'Route requests by product and urgency', 'body' => 'Users should be able to select PerfectLum, PerfectChroma, PerfectEPD, RemoteQA, SmartSensor S1, SmartSensor S2, downloads, licensing, or general support.' ),
					array( 'heading' => 'Collect useful technical context', 'body' => 'Ask for operating system, product version, sensor model, display type, number of displays, site, report files, screenshots, and steps already attempted.' ),
					array( 'heading' => 'Connect support to enterprise success', 'body' => 'Support requests can route to maintenance plan discussions, security review, onboarding, documentation, warranty, store, or demo flows where appropriate.' ),
				),
				'faqs'            => array(
					array( 'question' => 'What information should users include?', 'answer' => 'Product name, version, OS, sensor, license, display count, site, issue summary, urgency, and relevant reports or screenshots.' ),
					array( 'question' => 'Is this for sales questions?', 'answer' => 'Sales questions should route to Contact or Request Demo, but this page can provide cross-links for users who arrive in the wrong place.' ),
					array( 'question' => 'Can warranty requests start here?', 'answer' => 'Yes, but hardware warranty and return requests should also link to Warranty and RMA.' ),
				),
				'links'           => array(
					array( 'label' => 'Documentation', 'url' => '/support/documentation/' ),
					array( 'label' => 'Warranty and RMA', 'url' => '/support/warranty-rma/' ),
					array( 'label' => 'Security', 'url' => '/security/' ),
					array( 'label' => 'Contact sales', 'url' => '/contact/' ),
				),
			)
		),
		'warranty-rma' => qubyx_ci_seo_page(
			'Warranty and RMA',
			'warranty-rma',
			'Warranty, returns, RMA, hardware support, serial number, reseller, and replacement guidance for QUBYX sensor products and bundles.',
			array(
				'parent'          => 'support',
				'primary_keyword' => 'QUBYX warranty RMA',
				'intro'           => 'Warranty and RMA content gives customers a clear path for sensor hardware support, return eligibility, serial number collection, troubleshooting, replacement steps, and reseller routing.',
				'sections'        => array(
					array( 'heading' => 'Prepare the right information', 'body' => 'Ask users to gather product name, sensor serial number, purchase channel, order reference, issue description, photos if relevant, and troubleshooting steps completed.' ),
					array( 'heading' => 'Separate software support from hardware support', 'body' => 'Some issues can be solved through documentation or support contact; others may require warranty review, reseller coordination, or return instructions.' ),
					array( 'heading' => 'Keep the process enterprise-friendly', 'body' => 'Large customers may need multi-unit replacement planning, maintenance plan review, or partner coordination before hardware is moved between sites.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Which products need RMA content?', 'answer' => 'SmartSensor hardware and hardware bundles are the primary fit, while software issues should usually route to support documentation or contact support.' ),
					array( 'question' => 'How should warranty terms be maintained?', 'answer' => 'QUBYX should keep warranty language aligned with current hardware policies, reseller terms, regional requirements, and support procedures.' ),
					array( 'question' => 'Can resellers use this RMA workflow?', 'answer' => 'Yes. QUBYX can include reseller and partner routing once policies are confirmed.' ),
				),
				'links'           => array(
					array( 'label' => 'SmartSensor S1', 'url' => '/products/qubyx-smartsensor-s1/' ),
					array( 'label' => 'SmartSensor S2', 'url' => '/products/qubyx-smartsensor-s2/' ),
					array( 'label' => 'Contact support', 'url' => '/support/contact-support/' ),
					array( 'label' => 'Partners', 'url' => '/partners/' ),
				),
			)
		),
		'company' => qubyx_ci_seo_page(
			'Company',
			'company',
			'QUBYX company overview for display calibration, color management, medical display QA, remote quality assurance, sensors, and enterprise display workflows.',
			array(
				'primary_keyword' => 'QUBYX display calibration company',
				'intro'           => 'QUBYX builds display calibration, quality assurance, remote management, and measurement solutions for teams that rely on trustworthy screens in medical, creative, manufacturing, and enterprise environments.',
				'sections'        => array(
					array( 'heading' => 'Focused on measurable display quality', 'body' => 'The company story should emphasize repeatable measurement, calibration evidence, professional software, sensor workflows, enterprise support, and continuous display performance.' ),
					array( 'heading' => 'A portfolio for critical screens', 'body' => 'QUBYX product content spans PerfectLum for medical display QA, PerfectChroma for professional color calibration, PerfectEPD for e-paper display QA, RemoteQA for fleet operations, and SmartSensor hardware.' ),
					array( 'heading' => 'Built for partners and global buyers', 'body' => 'Company content should route OEMs, resellers, healthcare teams, studios, and enterprise buyers toward partner, demo, store, support, and contact paths.' ),
				),
				'faqs'            => array(
					array( 'question' => 'What does QUBYX do?', 'answer' => 'QUBYX develops display calibration, QA, remote management, and measurement solutions for professional and regulated environments.' ),
					array( 'question' => 'Which products belong to QUBYX?', 'answer' => 'The site architecture includes PerfectLum, PerfectChroma, PerfectEPD, Qubyx RemoteQA, SmartSensor S1, and SmartSensor S2.' ),
					array( 'question' => 'Who should contact QUBYX?', 'answer' => 'Hospitals, imaging centers, studios, OEMs, integrators, partners, and enterprise teams that need managed display quality.' ),
				),
				'links'           => array(
					array( 'label' => 'About QUBYX', 'url' => '/company/about/' ),
					array( 'label' => 'Partners', 'url' => '/partners/' ),
					array( 'label' => 'Contact', 'url' => '/contact/' ),
					array( 'label' => 'Store', 'url' => '/store/' ),
				),
			)
		),
		'about' => qubyx_ci_seo_page(
			'About QUBYX',
			'about',
			'About QUBYX: a display calibration and quality assurance company focused on measurable screen performance and reliable imaging workflows.',
			array(
				'parent'          => 'company',
				'primary_keyword' => 'about QUBYX',
				'intro'           => 'About QUBYX should explain the company in customer language: better display confidence, repeatable QA, professional calibration, sensor-supported workflows, and enterprise-ready reporting.',
				'sections'        => array(
					array( 'heading' => 'Why display quality deserves infrastructure', 'body' => 'In clinical, creative, and manufacturing workflows, the display is the point where data becomes human judgment. QUBYX content should make that risk visible and solvable.' ),
					array( 'heading' => 'Product-led company narrative', 'body' => 'Use the product portfolio to explain the company: PerfectLum, PerfectChroma, PerfectEPD, RemoteQA, SmartSensor S1, and SmartSensor S2 each serve a different quality need.' ),
					array( 'heading' => 'Trust, translation, and scale', 'body' => 'The page should remain editable and translatable for global markets while preserving a consistent enterprise positioning.' ),
				),
				'faqs'            => array(
					array( 'question' => 'What should the About page avoid?', 'answer' => 'Avoid vague marketing claims. Lead with display quality, calibration, QA evidence, and product relevance.' ),
					array( 'question' => 'Can this page support recruiting or PR later?', 'answer' => 'Yes, but the current seed focuses on enterprise buyers and partner trust.' ),
					array( 'question' => 'How should it be translated?', 'answer' => 'Translate the page through WPML and keep product names consistent unless QUBYX defines local market naming.' ),
				),
				'links'           => array(
					array( 'label' => 'Company', 'url' => '/company/' ),
					array( 'label' => 'Partners', 'url' => '/partners/' ),
					array( 'label' => 'Security', 'url' => '/security/' ),
					array( 'label' => 'Contact', 'url' => '/contact/' ),
				),
			)
		),
		'partners' => qubyx_ci_seo_page(
			'Partners',
			'partners',
			'Partner with QUBYX for OEM display calibration, reseller programs, integrator workflows, enterprise deployment, and display QA solutions.',
			array(
				'primary_keyword' => 'QUBYX partners',
				'intro'           => 'QUBYX Partners attracts OEMs, resellers, integrators, healthcare technology providers, calibration specialists, and enterprise service teams that can help deploy QUBYX products.',
				'sections'        => array(
					array( 'heading' => 'OEM and manufacturer partnerships', 'body' => 'QUBYX partner content can support display makers and integrators who need bundled calibration, validation workflows, software licensing, and support paths.' ),
					array( 'heading' => 'Reseller and integrator programs', 'body' => 'Resellers and integrators need product positioning, store or quote workflows, implementation guidance, documentation, and support escalation.' ),
					array( 'heading' => 'Enterprise deployment support', 'body' => 'Partners can help customers plan pilots, configure workflows, select sensors, train teams, and scale display QA across sites.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Who can partner with QUBYX?', 'answer' => 'OEMs, resellers, integrators, consultants, healthcare technology providers, and service organizations that support display quality workflows.' ),
					array( 'question' => 'What should partner forms capture?', 'answer' => 'Company type, region, industry focus, products of interest, customer base, technical capabilities, and partnership goal.' ),
					array( 'question' => 'Can partners buy through the store?', 'answer' => 'The seed content supports partner purchasing paths, but final commerce rules should be confirmed by QUBYX.' ),
				),
				'links'           => array(
					array( 'label' => 'OEM Display Calibration', 'url' => '/solutions/oem-display-calibration/' ),
					array( 'label' => 'Store', 'url' => '/store/' ),
					array( 'label' => 'Contact', 'url' => '/contact/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'contact' => qubyx_ci_seo_page(
			'Contact',
			'contact',
			'Contact QUBYX for sales, support routing, product questions, partnerships, enterprise display QA, demos, and purchasing guidance.',
			array(
				'primary_keyword' => 'contact QUBYX',
				'intro'           => 'QUBYX Contact routes every visitor to the right path: sales, support, partner inquiry, demo, store question, security review, or product-specific guidance.',
				'sections'        => array(
					array( 'heading' => 'Sales and product questions', 'body' => 'Ask visitors which product or workflow they are evaluating, how many displays they manage, their industry, current calibration process, required standards, and purchasing timeline.' ),
					array( 'heading' => 'Support and customer routing', 'body' => 'Existing customers should be routed toward Contact Support, Documentation, Downloads, Warranty and RMA, or Security depending on the issue.' ),
					array( 'heading' => 'Partnership and enterprise routing', 'body' => 'OEMs, resellers, and enterprise buyers should be able to identify partnership, quote, volume licensing, or demo needs quickly.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Should Contact replace Request Demo?', 'answer' => 'No. Contact is a general routing page; Request Demo is the primary conversion page for qualified product and enterprise conversations.' ),
					array( 'question' => 'What fields should the form include?', 'answer' => 'Name, email, company, country, industry, product interest, number of displays, inquiry type, and message.' ),
					array( 'question' => 'Should support requests go here?', 'answer' => 'They can, but the page should link clearly to Contact Support for faster technical routing.' ),
				),
				'links'           => array(
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
					array( 'label' => 'Contact support', 'url' => '/support/contact-support/' ),
					array( 'label' => 'Partners', 'url' => '/partners/' ),
					array( 'label' => 'Store', 'url' => '/store/' ),
				),
			)
		),
		'request-demo' => qubyx_ci_seo_page(
			'Request Demo',
			'request-demo',
			'Request a QUBYX demo for PerfectLum, PerfectChroma, PerfectEPD, Qubyx RemoteQA, SmartSensor products, or enterprise display QA workflows.',
			array(
				'primary_keyword' => 'QUBYX demo',
				'intro'           => 'Request Demo is the main conversion page for QUBYX enterprise buyers. It should help the team qualify product fit, workflow urgency, scale, standards, deployment requirements, and purchasing path.',
				'sections'        => array(
					array( 'heading' => 'Choose the right product walkthrough', 'body' => 'Let visitors select PerfectLum, PerfectChroma, PerfectEPD, RemoteQA, SmartSensor S1, SmartSensor S2, store bundles, or general enterprise display QA.' ),
					array( 'heading' => 'Capture enterprise context', 'body' => 'Useful qualification fields include number of displays, number of sites, industry, current calibration tools, required standards, timeline, security needs, and purchasing role.' ),
					array( 'heading' => 'Route high-intent visitors', 'body' => 'Demo requests can lead to quote conversations, proof-of-concept planning, support documentation, store bundles, partner programs, or security review.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Who should request a demo?', 'answer' => 'Organizations evaluating QUBYX products for medical display QA, color-critical work, remote display management, sensors, or OEM validation.' ),
					array( 'question' => 'What should visitors prepare?', 'answer' => 'Product interest, display count, locations, current workflow, standards, sensors, timeline, and purchasing or technical requirements.' ),
					array( 'question' => 'Can this page support paid search?', 'answer' => 'Yes. It has product and workflow language that can support high-intent campaigns and organic conversion paths.' ),
				),
				'links'           => array(
					array( 'label' => 'Products', 'url' => '/products/' ),
					array( 'label' => 'Solutions', 'url' => '/solutions/' ),
					array( 'label' => 'Store', 'url' => '/store/' ),
					array( 'label' => 'Contact', 'url' => '/contact/' ),
				),
			)
		),
		'security' => qubyx_ci_seo_page(
			'Security',
			'security',
			'Security information for QUBYX software, RemoteQA deployments, hosted and local options, access control, support processes, and enterprise review.',
			array(
				'primary_keyword' => 'QUBYX security',
				'intro'           => 'The Security page helps enterprise buyers and healthcare teams review how QUBYX approaches deployment, access, data handling, support, updates, remote QA architecture, and security questions.',
				'sections'        => array(
					array( 'heading' => 'Support different deployment discussions', 'body' => 'Remote QA buyers may ask about hosted service, local server, intranet, relay, internet access, user roles, and facility-controlled workflows. The page should frame these options for review without finalizing architecture details prematurely.' ),
					array( 'heading' => 'Clarify what display QA data is', 'body' => 'Display QA workflows typically focus on device, calibration, test, status, and reporting data. If healthcare customers ask about patient data, the page should route to confirmed QUBYX security documentation and internal review.' ),
					array( 'heading' => 'Make enterprise review easy', 'body' => 'The page should give buyers a path for security questionnaires, documentation, support contacts, product architecture questions, and deployment planning.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Should this page make compliance claims?', 'answer' => 'Only include confirmed claims reviewed by QUBYX. The seed content is structured for enterprise review but avoids unsupported guarantees.' ),
					array( 'question' => 'Where should security questionnaires go?', 'answer' => 'Route them through Contact or Contact Support with enterprise review context.' ),
					array( 'question' => 'Is security relevant to RemoteQA?', 'answer' => 'Yes. Remote QA architecture, access control, deployment mode, and support procedures are important buying criteria.' ),
				),
				'links'           => array(
					array( 'label' => 'Qubyx RemoteQA', 'url' => '/products/qubyx-remoteqa/' ),
					array( 'label' => 'Remote Monitor QA', 'url' => '/solutions/remote-monitor-qa/' ),
					array( 'label' => 'Contact support', 'url' => '/support/contact-support/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'privacy' => qubyx_ci_seo_page(
			'Privacy Policy',
			'privacy',
			'Privacy policy for QUBYX website visitors, customers, trial users, support contacts, partners, and enterprise buyers.',
			array(
				'primary_keyword' => 'QUBYX privacy policy',
				'intro'           => 'This Privacy Policy page explains how QUBYX can organize privacy information for website visitors, customers, trial users, partners, support contacts, and enterprise buyers who interact with QUBYX.com.',
				'sections'        => array(
					array( 'heading' => 'Information customers may provide', 'body' => 'QUBYX website forms may collect contact details, company information, product interest, support details, demo requirements, purchasing context, and messages submitted through sales, support, partner, or store workflows.' ),
					array( 'heading' => 'How privacy content should be structured', 'body' => 'A complete policy should cover website analytics, forms, email communication, product trial requests, support handling, partner inquiries, embedded media, cookies, and regional privacy requirements.' ),
					array( 'heading' => 'Enterprise review path', 'body' => 'Healthcare, OEM, and enterprise buyers may need privacy and security review before deployment. This page should link to Security, Contact Support, and Contact for documentation requests.' ),
				),
				'faqs'            => array(
					array( 'question' => 'How is this privacy policy maintained?', 'answer' => 'QUBYX should review the policy whenever website forms, analytics, support processes, product trials, or customer communication workflows change.' ),
					array( 'question' => 'Should this page be translated?', 'answer' => 'Yes. Translate the approved final policy through WPML for each market where QUBYX operates.' ),
					array( 'question' => 'Where should security questions go?', 'answer' => 'Security and deployment review questions should route to the Security page or Contact Support.' ),
				),
				'links'           => array(
					array( 'label' => 'Security', 'url' => '/security/' ),
					array( 'label' => 'Contact support', 'url' => '/support/contact-support/' ),
					array( 'label' => 'Terms of Service', 'url' => '/terms/' ),
					array( 'label' => 'Cookie Policy', 'url' => '/cookies/' ),
				),
				'final_heading'   => 'Privacy review',
				'final_body'      => 'This policy helps visitors understand privacy considerations across QUBYX website, sales, support, partner, and product-evaluation interactions.',
			)
		),
		'terms' => qubyx_ci_seo_page(
			'Terms of Service',
			'terms',
			'Terms of service for QUBYX website use, software evaluation, purchasing workflows, support requests, store activity, and customer communications.',
			array(
				'primary_keyword' => 'QUBYX terms of service',
				'intro'           => 'The Terms of Service page gives QUBYX a structured place to explain website use, account or form interactions, product evaluation, purchasing paths, support communications, and acceptable use.',
				'sections'        => array(
					array( 'heading' => 'Website and communication terms', 'body' => 'Terms content can cover how visitors use QUBYX.com, submit forms, request demos, contact support, download resources, subscribe to updates, and communicate with QUBYX teams.' ),
					array( 'heading' => 'Software, store, and evaluation paths', 'body' => 'The page should eventually connect to license terms, trial terms, store terms, quote terms, refund policies, maintenance plans, partner purchasing, and product-specific agreements.' ),
					array( 'heading' => 'Support and documentation boundaries', 'body' => 'Terms should clarify that documentation, comparison pages, and support content help users evaluate workflows but do not replace signed agreements, official quotes, or legal terms.' ),
				),
				'faqs'            => array(
					array( 'question' => 'How are these terms maintained?', 'answer' => 'QUBYX should review terms when website functionality, product trials, store workflows, support processes, or commercial policies change.' ),
					array( 'question' => 'Should product licenses be separate?', 'answer' => 'Yes. Software license terms, maintenance plans, and store terms may require separate documents or linked agreements.' ),
					array( 'question' => 'Can this page be translated?', 'answer' => 'Yes. Translate the approved final terms through WPML after legal review.' ),
				),
				'links'           => array(
					array( 'label' => 'Privacy Policy', 'url' => '/privacy/' ),
					array( 'label' => 'Cookie Policy', 'url' => '/cookies/' ),
					array( 'label' => 'Store', 'url' => '/store/' ),
					array( 'label' => 'Contact', 'url' => '/contact/' ),
				),
				'final_heading'   => 'Terms review',
				'final_body'      => 'These terms help organize expectations for QUBYX website, software evaluation, store, support, and customer communication workflows.',
			)
		),
		'cookies' => qubyx_ci_seo_page(
			'Cookie Policy',
			'cookies',
			'Cookie policy for QUBYX website analytics, forms, embedded content, preferences, marketing tools, and regional consent requirements.',
			array(
				'primary_keyword' => 'QUBYX cookie policy',
				'intro'           => 'The Cookie Policy page explains how QUBYX can describe cookies and similar technologies used for analytics, website functionality, forms, embedded content, preferences, marketing measurement, and consent management.',
				'sections'        => array(
					array( 'heading' => 'Cookie categories to document', 'body' => 'A complete policy can separate strictly necessary cookies, analytics cookies, preference cookies, embedded media cookies, form-related cookies, and marketing or campaign measurement cookies.' ),
					array( 'heading' => 'Consent and user choice', 'body' => 'The page should connect to any consent tool QUBYX uses and explain how visitors can manage browser settings or cookie preferences where supported.' ),
					array( 'heading' => 'Regional compliance planning', 'body' => 'Cookie language may need to vary by region. WPML translation should happen after the final policy and consent approach are approved.' ),
				),
				'faqs'            => array(
					array( 'question' => 'How is this cookie policy maintained?', 'answer' => 'QUBYX should review the policy whenever analytics, marketing tools, embeds, forms, or consent software change.' ),
					array( 'question' => 'Should cookie categories be updated later?', 'answer' => 'Yes. Update the policy when analytics, marketing tools, embeds, forms, or consent software change.' ),
					array( 'question' => 'Where should privacy information link?', 'answer' => 'Link to Privacy Policy, Terms of Service, and Contact for additional questions.' ),
				),
				'links'           => array(
					array( 'label' => 'Privacy Policy', 'url' => '/privacy/' ),
					array( 'label' => 'Terms of Service', 'url' => '/terms/' ),
					array( 'label' => 'Security', 'url' => '/security/' ),
					array( 'label' => 'Contact', 'url' => '/contact/' ),
				),
				'final_heading'   => 'Cookie policy review',
				'final_body'      => 'This policy helps visitors understand how QUBYX can organize cookie categories, consent choices, analytics, embedded media, and regional compliance requirements.',
			)
		),
		'compare' => qubyx_ci_seo_page(
			'Compare',
			'compare',
			'Comparison hub for display calibration software, medical display QA, professional color workflows, open-source tools, consumer sensors, and enterprise buying decisions.',
			array(
				'primary_keyword' => 'display calibration software comparison',
				'intro'           => 'The Compare hub helps buyers evaluate QUBYX against alternative workflows, not just alternative brand names. It should focus on fit, reporting, scale, standards, support, and operational risk.',
				'sections'        => array(
					array( 'heading' => 'Compare workflows before features', 'body' => 'A buyer may compare QUBYX with consumer calibration kits, open-source tools, home-grown spreadsheets, generic utilities, or other professional software. The right answer depends on evidence, support, standards, and scale.' ),
					array( 'heading' => 'Support high-intent SEO', 'body' => 'Comparison pages are strong for organic search because buyers often look for alternatives when they already understand the category and need a better fit.' ),
					array( 'heading' => 'Keep the tone fair and useful', 'body' => 'Avoid shallow competitor attacks. Explain when QUBYX is a stronger fit: medical QA, remote display management, structured reporting, enterprise support, and professional workflow needs.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Which comparisons are seeded?', 'answer' => 'Calman Alternative, DisplayCAL Alternative, Datacolor Spyder Alternative, plus roadmap pages for best monitor calibration software and medical display calibration software.' ),
					array( 'question' => 'Should competitor names be translated?', 'answer' => 'Usually no. Product names should remain consistent unless WPML market strategy says otherwise.' ),
					array( 'question' => 'How do comparisons convert?', 'answer' => 'Route readers to product pages, store, demo, and support resources after explaining decision criteria.' ),
				),
				'links'           => array(
					array( 'label' => 'Calman Alternative', 'url' => '/compare/calman-alternative/' ),
					array( 'label' => 'DisplayCAL Alternative', 'url' => '/compare/displaycal-alternative/' ),
					array( 'label' => 'Datacolor Spyder Alternative', 'url' => '/compare/datacolor-spyder-alternative/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'calman-alternative' => qubyx_ci_seo_page(
			'Calman Alternative for Enterprise Display QA',
			'calman-alternative',
			'A comparison page for buyers evaluating Calman alternatives for medical display QA, professional calibration, reporting, and enterprise display management.',
			array(
				'parent'          => 'compare',
				'primary_keyword' => 'Calman alternative',
				'intro'           => 'Teams searching for a Calman alternative may need more than calibration controls. This page should help buyers compare workflow fit: medical QA, remote fleet visibility, reports, support, deployment, and the difference between display tuning and managed QA evidence.',
				'sections'        => array(
					array( 'heading' => 'When QUBYX may be the better fit', 'body' => 'QUBYX content should emphasize regulated display QA, DICOM workflows, centralized reporting, multi-site programs, and enterprise support when those needs matter more than a single calibration session.' ),
					array( 'heading' => 'Compare decision criteria', 'body' => 'Useful criteria include target workflow, standards support, sensor compatibility, reporting, scheduling, fleet visibility, IT involvement, purchase path, and support requirements.' ),
					array( 'heading' => 'Route by audience', 'body' => 'Healthcare buyers should continue to PerfectLum and Medical Display QA. Creative buyers should compare PerfectChroma and Color-Critical Workflows. Enterprise buyers should review RemoteQA.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Is this page negative about Calman?', 'answer' => 'No. It should be a balanced alternative page focused on workflow fit, not claims that require legal review.' ),
					array( 'question' => 'Which QUBYX products should be linked?', 'answer' => 'PerfectLum, PerfectChroma, and Qubyx RemoteQA are the main paths depending on the visitor.' ),
					array( 'question' => 'What is the conversion goal?', 'answer' => 'Request Demo, Store, and product comparison paths.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'PerfectChroma', 'url' => '/products/perfectchroma/' ),
					array( 'label' => 'Enterprise Display Management', 'url' => '/solutions/enterprise-display-management/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'displaycal-alternative' => qubyx_ci_seo_page(
			'DisplayCAL Alternative for Professional Teams',
			'displaycal-alternative',
			'A DisplayCAL alternative page for teams that need supported calibration software, reporting, repeatable workflows, and enterprise-ready display QA.',
			array(
				'parent'          => 'compare',
				'primary_keyword' => 'DisplayCAL alternative',
				'intro'           => 'DisplayCAL is known by technical users, but many professional teams eventually need supported workflows, documentation, reporting, scheduling, and accountability. This page explains when a managed QUBYX workflow is the better fit.',
				'sections'        => array(
					array( 'heading' => 'Open tools and managed QA solve different problems', 'body' => 'Open-source calibration can be valuable for skilled users. Enterprise teams often need repeatability across operators, support, evidence, update paths, and purchase accountability.' ),
					array( 'heading' => 'For creative and medical workflows', 'body' => 'Creative teams can evaluate PerfectChroma for color-critical delivery. Medical teams can evaluate PerfectLum for DICOM calibration and medical display QA.' ),
					array( 'heading' => 'Decision criteria for teams', 'body' => 'Compare support, reports, scheduling, sensor guidance, documentation, translation needs, store paths, and deployment scale.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Who should consider a DisplayCAL alternative?', 'answer' => 'Teams that need support, repeatable procedures, documentation, reporting, or managed deployment rather than a self-managed technical workflow.' ),
					array( 'question' => 'Which QUBYX product is closest?', 'answer' => 'PerfectChroma for professional color workflows and PerfectLum for medical display QA.' ),
					array( 'question' => 'Should the page mention open source respectfully?', 'answer' => 'Yes. The page should be fair, useful, and focused on organizational needs.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectChroma', 'url' => '/products/perfectchroma/' ),
					array( 'label' => 'Color-Critical Workflows', 'url' => '/solutions/color-critical-workflows/' ),
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'Store', 'url' => '/store/' ),
				),
			)
		),
		'datacolor-spyder-alternative' => qubyx_ci_seo_page(
			'Datacolor Spyder Alternative for Professional Calibration',
			'datacolor-spyder-alternative',
			'A Datacolor Spyder alternative page for buyers moving from consumer monitor calibration toward professional display QA and enterprise workflows.',
			array(
				'parent'          => 'compare',
				'primary_keyword' => 'Datacolor Spyder alternative',
				'intro'           => 'Teams searching for a Datacolor Spyder alternative often need to move beyond individual monitor tuning toward repeatable calibration, evidence, reporting, support, and multi-display workflows.',
				'sections'        => array(
					array( 'heading' => 'When consumer calibration is not enough', 'body' => 'Consumer tools can be useful for personal monitor setup. Professional and regulated teams need calibration targets, verification, history, reporting, policy, and workflow repeatability.' ),
					array( 'heading' => 'For creators, studios, and enterprises', 'body' => 'PerfectChroma should be positioned for photographers, videographers, designers, editors, and studios that require reliable color output across deliverables.' ),
					array( 'heading' => 'For medical and enterprise QA', 'body' => 'If a visitor manages diagnostic displays or distributed fleets, the page should route them toward PerfectLum, RemoteQA, and medical display QA content.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Is this page for individual hobby users?', 'answer' => 'It may attract them, but the QUBYX positioning should favor serious creators, studios, medical users, and teams with repeatable QA needs.' ),
					array( 'question' => 'Which QUBYX product should lead?', 'answer' => 'PerfectChroma for professional color calibration, with PerfectLum and RemoteQA for regulated or enterprise workflows.' ),
					array( 'question' => 'How should this page convert?', 'answer' => 'Offer store links, demo requests, and comparison paths to help buyers move from research to evaluation.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectChroma', 'url' => '/products/perfectchroma/' ),
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'Color-Critical Workflows', 'url' => '/solutions/color-critical-workflows/' ),
					array( 'label' => 'Shop licenses', 'url' => '/store/' ),
				),
			)
		),
		'best-monitor-calibration-software' => qubyx_ci_seo_page(
			'Best Monitor Calibration Software for Professional Teams',
			'best-monitor-calibration-software',
			'A high-intent SEO comparison page for professional monitor calibration software buyers evaluating accuracy, reporting, support, and workflow scale.',
			array(
				'parent'          => 'compare',
				'primary_keyword' => 'best monitor calibration software',
				'intro'           => 'This page targets buyers comparing monitor calibration software for professional, medical, creative, and enterprise use. It should explain decision criteria rather than make unsupported ranking claims.',
				'sections'        => array(
					array( 'heading' => 'Define best by workflow', 'body' => 'The best software for a hospital is not always the best software for a photographer, manufacturer, or broadcast team. Buyers should compare standards, reporting, support, sensors, and deployment model.' ),
					array( 'heading' => 'What professional teams should compare', 'body' => 'Key criteria include target standards, calibration accuracy, verification, reports, scheduling, history, sensor support, license model, documentation, and enterprise support.' ),
					array( 'heading' => 'Where QUBYX fits', 'body' => 'QUBYX gives the site a portfolio story: PerfectLum for medical, PerfectChroma for creative color, PerfectEPD for e-paper, and RemoteQA for fleet operations.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Can this page claim QUBYX is the best?', 'answer' => 'Avoid unsupported superlatives. Present QUBYX as a strong fit for specific professional and enterprise workflows.' ),
					array( 'question' => 'Which pages should it link to?', 'answer' => 'Link to product pages, solution pages, comparison pages, store, and demo.' ),
					array( 'question' => 'Is this import-ready?', 'answer' => 'Yes. It is seeded as a child page under Compare.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'PerfectChroma', 'url' => '/products/perfectchroma/' ),
					array( 'label' => 'Compare', 'url' => '/compare/' ),
					array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
				),
			)
		),
		'medical-display-calibration-software' => qubyx_ci_seo_page(
			'Medical Display Calibration Software',
			'medical-display-calibration-software',
			'A medical display calibration software page for DICOM QA, radiology monitor calibration, remote reporting, and diagnostic display quality.',
			array(
				'parent'          => 'compare',
				'primary_keyword' => 'medical display calibration software',
				'intro'           => 'This page captures high-intent buyers who know they need medical display calibration software but have not yet chosen a product. It should bridge education, product fit, comparison, and conversion.',
				'sections'        => array(
					array( 'heading' => 'What medical calibration software should include', 'body' => 'Buyers should look for DICOM calibration, QA tests, scheduling, reports, history, sensor support, multi-display workflow, remote management options, and support.' ),
					array( 'heading' => 'Why PerfectLum is the primary QUBYX path', 'body' => 'PerfectLum is the primary product path for medical display calibration and QA after buyers understand the decision criteria.' ),
					array( 'heading' => 'When remote management matters', 'body' => 'Multi-site teams should also evaluate Qubyx RemoteQA, security review, support, maintenance plans, and volume licensing.' ),
				),
				'faqs'            => array(
					array( 'question' => 'Is this different from DICOM Calibration?', 'answer' => 'Yes. DICOM Calibration focuses on the standard and workflow; this page targets category-level software buyers.' ),
					array( 'question' => 'Which product should lead?', 'answer' => 'PerfectLum should be the primary product path.' ),
					array( 'question' => 'Should this page include pricing?', 'answer' => 'It can route to Store or Request Demo. Exact pricing should follow QUBYX commercial policy.' ),
				),
				'links'           => array(
					array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
					array( 'label' => 'DICOM Calibration', 'url' => '/solutions/dicom-calibration/' ),
					array( 'label' => 'Medical Display QA', 'url' => '/solutions/medical-display-qa/' ),
					array( 'label' => 'Store', 'url' => '/store/' ),
				),
			)
		),
	);

	foreach ( $seo_pages as $key => $page ) {
		$pages[ $key ] = isset( $pages[ $key ] ) ? array_replace_recursive( $pages[ $key ], $page ) : $page;
	}

	return $pages;
}

/**
 * Build a consistent SEO page seed.
 *
 * @param string $title Page title.
 * @param string $slug Page slug.
 * @param string $excerpt Meta excerpt.
 * @param array  $args Page content arguments.
 * @return array
 */
function qubyx_ci_seo_page( $title, $slug, $excerpt, $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'parent'          => '',
			'primary_keyword' => $title,
			'intro'           => $excerpt,
			'sections'        => array(),
			'faqs'            => array(),
			'links'           => array(),
			'seo_title'       => $title . ' | QUBYX',
			'seo_description' => $excerpt,
			'final_heading'   => 'Plan your QUBYX workflow',
			'final_body'      => 'Talk with QUBYX about the products, displays, sites, standards, sensors, reports, and support model that fit your organization. The team can help map the right software, hardware, and deployment path before you buy.',
		)
	);

	$page = array(
		'post_title'      => $title,
		'post_name'       => $slug,
		'post_excerpt'    => $excerpt,
		'post_content'    => qubyx_ci_build_seo_content( $args ),
		'seo_title'       => $args['seo_title'],
		'seo_description' => $args['seo_description'],
	);

	if ( ! empty( $args['parent'] ) ) {
		$page['parent'] = $args['parent'];
	}

	return $page;
}

/**
 * Build Gutenberg-compatible SEO body content.
 *
 * @param array $args Page content arguments.
 * @return string
 */
function qubyx_ci_build_seo_content( $args ) {
	$content  = '<!-- wp:paragraph --><p>' . esc_html( qubyx_ci_public_copy( $args['intro'] ) ) . '</p><!-- /wp:paragraph -->';

	foreach ( $args['sections'] as $section ) {
		$content .= '<!-- wp:heading --><h2>' . esc_html( qubyx_ci_public_copy( $section['heading'] ) ) . '</h2><!-- /wp:heading -->';
		$content .= '<!-- wp:paragraph --><p>' . esc_html( qubyx_ci_public_copy( $section['body'] ) ) . '</p><!-- /wp:paragraph -->';
	}

	if ( ! empty( $args['links'] ) ) {
		$content .= '<!-- wp:heading --><h2>Related QUBYX pages</h2><!-- /wp:heading --><!-- wp:list --><ul>';
		foreach ( $args['links'] as $link ) {
			$content .= '<li><a href="' . esc_url( $link['url'] ) . '">' . esc_html( $link['label'] ) . '</a></li>';
		}
		$content .= '</ul><!-- /wp:list -->';
	}

	if ( ! empty( $args['faqs'] ) ) {
		$content .= '<!-- wp:heading --><h2>Frequently asked questions</h2><!-- /wp:heading -->';
		foreach ( $args['faqs'] as $faq ) {
			$content .= '<!-- wp:heading {"level":3} --><h3>' . esc_html( qubyx_ci_public_copy( $faq['question'] ) ) . '</h3><!-- /wp:heading -->';
			$content .= '<!-- wp:paragraph --><p>' . esc_html( qubyx_ci_public_copy( $faq['answer'] ) ) . '</p><!-- /wp:paragraph -->';
		}
	}

	$content .= '<!-- wp:heading --><h2>' . esc_html( qubyx_ci_public_copy( $args['final_heading'] ) ) . '</h2><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html( qubyx_ci_public_copy( $args['final_body'] ) ) . '</p><!-- /wp:paragraph -->';

	return $content;
}

/**
 * Normalize planning copy into public-facing website copy.
 *
 * @param string $text Text to normalize.
 * @return string
 */
function qubyx_ci_public_copy( $text ) {
	$replacements = array(
		'This page should '                => 'QUBYX can ',
		'The page should '                 => 'QUBYX can ',
		'the page should '                 => 'the workflow can ',
		'A structured QA page should '     => 'A structured QA workflow can ',
		'QUBYX content should '            => 'QUBYX content can ',
		'RemoteQA content should '         => 'RemoteQA can ',
		'PerfectChroma content should '    => 'PerfectChroma can ',
		'Blog content should '             => 'Blog content can ',
		'Support content should '          => 'Support content can ',
		'Company content should '          => 'Company content can ',
		'The seed content supports'        => 'QUBYX supports',
		'the seed content supports'        => 'QUBYX supports',
		'seed content'                     => 'website content',
		'seed page'                        => 'website page',
		'seeded as WordPress pages'        => 'available as website pages',
		'seeded as a normal WordPress page' => 'available as a website page',
		'seeded as a child page'           => 'available as a dedicated page',
		'import-ready'                     => 'ready for publication',
		'WordPress'                        => 'website',
		'WPML'                             => 'multilingual',
	);

	return strtr( $text, $replacements );
}

/**
 * WooCommerce Store products used by the Store catalog.
 */
function qubyx_ci_store_products() {
	return array(
		'store-perfectlum-1-year' => qubyx_ci_store_product( 'PerfectLum 4', 'perfectlum-1-year-maintenance', 'Medical / DICOM', 'LUM', 'lum', '1 Year Maintenance Plan', 'Annual maintenance subscription', 'DICOM calibration and QA software for one workstation, including reporting, scheduling, and remote management readiness.', '480', '', 'medical', 'hospitals,education', '', '', 'Per-workstation licensing|Calibrates up to 6 displays|Windows and Mac compatible|DICOM, TG18, TG270, DIN, ACR workflows', '/store/perfectlum/' ),
		'store-perfectlum-3-years' => qubyx_ci_store_product( 'PerfectLum 3 Years', 'perfectlum-3-years-maintenance', 'Medical / DICOM', 'LUM', 'lum', '3 Years Maintenance Plan', 'Multi-year maintenance subscription', 'Extended maintenance for PerfectLum with updates, priority email support, remote desktop support, and license resets.', '288', '', 'medical', 'hospitals,education', 'Maintenance', '', 'Priority email-based support|Remote desktop TC connection|Access to all updates|License resets during 3 years', '/store/perfectlum/' ),
		'store-perfectlum-5-years' => qubyx_ci_store_product( 'PerfectLum 5 Years', 'perfectlum-5-years-maintenance', 'Medical / DICOM', 'LUM', 'lum', '5 Years Maintenance Plan', 'Best-value maintenance subscription', 'Longer maintenance coverage for PerfectLum teams that want updates, new releases, priority support, and license reset coverage.', '360', '', 'medical', 'hospitals,education', 'Most popular', 'pop', 'Unlimited priority email-based support|Remote desktop TC connection|Access to all updates|Unlock new releases of PerfectLum|License resets during 5 years', '/store/perfectlum/', true ),
		'store-perfectchroma-pro-license' => qubyx_ci_store_product( 'PerfectChroma Pro License', 'perfectchroma-pro-license', 'Color / Creative', 'CHR', 'chr', 'One Time Purchase', 'Lifetime license', 'Hardware calibration engine for essential color accuracy and seamless workflow integration.', '399', '199', 'color', 'color,consumer,education', '', '', 'Full PerfectChroma software|Support for major colorimeters|Delta-E below 1.0 accuracy|Smart calibration presets|1-year free updates', '/store/perfectchroma/' ),
		'store-perfectchroma-pro-bundle' => qubyx_ci_store_product( 'PerfectChroma Pro Bundle', 'perfectchroma-pro-bundle', 'Color / Creative', 'CHR', 'chr', 'One Time Purchase', 'Lifetime license bundle', 'Supercharged calibration bundle with X-Rite i1Display Pro, advanced 3D LUTs, and priority updates.', '699', '499', 'color', 'color,consumer,education', 'Most popular', 'pop', 'Full PerfectChroma software license|1x X-Rite i1Display Pro OEM Sensor|Delta-E below 1.0 professional accuracy|Photo, Video, and Web presets|Advanced LUT export', '/store/perfectchroma/', true ),
		'store-perfectchroma-studio-bundle' => qubyx_ci_store_product( 'PerfectChroma Studio Bundle', 'perfectchroma-studio-bundle', 'Color / Creative', 'CHR', 'chr', 'One Time Purchase', 'Lifetime studio bundle', 'Fleet-ready color calibration bundle with multiple licenses, remote management, and central reporting.', '999', '799', 'color', 'color,consumer', '', '', '3 PerfectChroma licenses|1 X-Rite i1Display Pro Sensor|Remote management dashboard|Profile distribution across network|Priority team support', '/store/perfectchroma/' ),
		'store-perfectepd-annual' => qubyx_ci_store_product( 'PerfectEPD Annual', 'perfectepd-annual', 'E-paper / OEM', 'EPD', 'epd', 'Annual Subscription', 'Annual validation subscription', 'E-paper display validation, reflectance, contrast, and uniformity QA for OEM teams and lab workflows.', '', '', 'epd', 'oem,education', '', '', 'Annual software access|Reflectance and contrast validation|OEM lab workflow support|Reporting for QA teams', '/store/perfectepd/', false, 'Request quote' ),
		'store-qubyx-web-remote-qa' => qubyx_ci_store_product( 'Qubyx Web Remote QA', 'qubyx-web-remote-qa-free', 'Remote QA', 'RQA', 'rqa', 'Free Hosted Access', 'Hosted web RemoteQA entry point', 'Free web access path for remote QA visibility, task review, and centralized display quality onboarding.', '0', '', 'remote,free', 'hospitals,oem,education', 'Free', 'new', 'Hosted web access|Remote QA onboarding path|Central display status story|Upgrade path for enterprise deployments', '/products/qubyx-remoteqa/', false, 'Try remote' ),
		'store-smartsensor-s1-oem' => qubyx_ci_store_product( 'Qubyx SmartSensor S1', 'qubyx-smartsensor-s1-oem', 'OEM hardware', 'S1', 's1', 'Manufacturing / OEM', 'OEM procurement path', 'Sensor option for manufacturers and OEM validation programs that need repeatable measurement in production or lab workflows.', '', '', 'sensors,oem', 'oem', '', '', 'OEM validation positioning|Production and lab workflow fit|Pairs with PerfectLum and PerfectEPD|Quote-led procurement', '/store/sensors/', false, 'Request quote' ),
		'store-smartsensor-s2-consumer' => qubyx_ci_store_product( 'Qubyx SmartSensor S2', 'qubyx-smartsensor-s2-consumer', 'Consumer hardware', 'S2', 's2', 'Consumer / Creative', 'General purchasing path', 'General-purpose sensor path for consumers and creative teams that need dependable color measurement.', '', '', 'sensors,consumer', 'consumer,color', '', '', 'Consumer and creative positioning|Color measurement workflow|Pairs with PerfectChroma|Simple purchase or quote path', '/store/sensors/', false, 'View sensor' ),
		'store-qubyx-os-tools' => qubyx_ci_store_product( 'Qubyx OS Tools', 'qubyx-os-tools-free', 'Open source tools', 'OST', 'rqa', 'Free / Open Source', 'Open-source color management tools', 'Open-source tools for advanced ICC Device Link profiles, 3D LUT generation, and vendor-independent color workflows.', '0', '', 'free,color,medical', 'hospitals,color,consumer,education', 'Free', 'new', 'Device Link ICC profile generation|3D LUT workflow support|Vendor-independent calibration path|Pairs with PerfectLum for enterprise QA', '/get-display-color-accuracy-solely-qubyx-os-tools/', false, 'Learn more' ),
		'store-perfectlum-s1-sensor' => qubyx_ci_store_product( 'PerfectLum and S1 Sensor', 'perfectlum-and-s1-sensor', 'PerfectLum bundle', 'BUN', 'bun', 'Software + sensor bundle', 'Bundle purchase', 'PerfectLum 4 bundled with the PerfectLum S1 luminance and colorimeter for DICOM calibration and display verification.', '680', '', 'bundles,medical,sensors', 'hospitals,oem', 'Back in stock', '', 'PerfectLum 4 software|PerfectLum S1 luminance and colorimeter|Easy setup and maintenance|Windows and Mac compatible', '/store/bundles/', false, 'Configure bundle' ),
	);
}

/**
 * Build a WooCommerce-ready Store product.
 */
function qubyx_ci_store_product( $title, $slug, $tag, $code, $icon, $plan, $period, $description, $regular_price, $sale_price, $categories, $audiences, $badge, $badge_class, $features, $link, $featured = false, $cta = 'Choose plan' ) {
	$price = '' !== $sale_price ? $sale_price : $regular_price;

	return array(
		'post_title'   => $title,
		'post_name'    => $slug,
		'post_excerpt' => $description,
		'post_content' => '<!-- wp:paragraph --><p>' . esc_html( $description ) . '</p><!-- /wp:paragraph -->',
		'post_status'  => 'publish',
		'meta'         => array(
			'_qubyx_store_product'     => '1',
			'_qubyx_store_tag'         => $tag,
			'_qubyx_store_code'        => $code,
			'_qubyx_store_icon'        => $icon,
			'_qubyx_store_plan'        => $plan,
			'_qubyx_store_period'      => $period,
			'_qubyx_store_categories'  => $categories,
			'_qubyx_store_audiences'   => $audiences,
			'_qubyx_store_badge'       => $badge,
			'_qubyx_store_badge_class' => $badge_class,
			'_qubyx_store_featured'    => $featured ? '1' : '0',
			'_qubyx_store_features'    => $features,
			'_qubyx_store_cta'         => $cta,
			'_qubyx_store_link'        => $link,
			'_regular_price'           => $regular_price,
			'_sale_price'              => $sale_price,
			'_price'                   => $price,
			'_virtual'                 => 'yes',
			'_downloadable'            => 'no',
			'_stock_status'            => 'instock',
			'_manage_stock'            => 'no',
			'_sold_individually'       => 'no',
		),
	);
}

/**
 * Product pages.
 */
function qubyx_ci_products() {
	return array(
		'perfectlum' => qubyx_ci_product(
			'PerfectLum',
			'perfectlum',
			'Medical display calibration and DICOM QA software',
			'PerfectLum calibrates, verifies, schedules, records, and reports medical display quality for diagnostic imaging teams.',
			'Software',
			1,
			array( 'product_category' => array( 'software' ) ),
			array(
				'DICOM Part 14 GSDF calibration and validation',
				'Scheduled conformance checks and acceptance tests',
				'History database and complete QA reporting',
				'Support for multi-display medical workstations',
			)
		),
		'perfectchroma' => qubyx_ci_product(
			'PerfectChroma',
			'perfectchroma',
			'Professional color calibration software',
			'PerfectChroma gives photographers, videographers, editors, designers, and studios a clearer path to consistent color output.',
			'Color accuracy',
			2,
			array( 'product_category' => array( 'software' ) ),
			array(
				'Smart presets for photography, video, web, and prepress',
				'Verification reports for color-critical delivery',
				'ICC profile and color validation workflows',
				'Support for professional colorimeter-based calibration',
			)
		),
		'perfectepd' => qubyx_ci_product(
			'PerfectEPD',
			'perfectepd',
			'E-paper display calibration and QA workflows',
			'PerfectEPD supports repeatable calibration and validation workflows for electronic paper display teams and OEMs.',
			'E-paper QA',
			3,
			array( 'product_category' => array( 'software' ) ),
			array(
				'Workflow support for e-paper display measurement',
				'Contrast, uniformity, and reflectance validation content model',
				'Reporting structure for manufacturer and QA teams',
				'Designed for OEM and specialized display programs',
			)
		),
		'qubyx-remoteqa' => qubyx_ci_product(
			'Qubyx RemoteQA',
			'qubyx-remoteqa',
			'Centralized remote quality assurance for display fleets',
			'Qubyx RemoteQA helps administrators schedule tasks, review status, and generate reports across connected displays and locations.',
			'Remote QA',
			4,
			array( 'product_category' => array( 'remote-qa' ) ),
			array(
				'Central task scheduling for calibration and QA',
				'Remote status review for distributed workstations',
				'Reports, history, statistics, and export-oriented workflows',
				'Hosted or local deployment positioning for enterprise teams',
			)
		),
		'qubyx-smartsensor-s1' => qubyx_ci_product(
			'Qubyx SmartSensor S1',
			'qubyx-smartsensor-s1',
			'Compact luminance sensor for routine QA',
			'SmartSensor S1 pairs with QUBYX workflows for practical medical display calibration and recurring luminance QA.',
			'Sensor',
			5,
			array( 'product_category' => array( 'sensors' ) ),
			array(
				'Luminance measurement for routine QA workflows',
				'Designed to pair with PerfectLum deployments',
				'Useful for consistent workstation checks',
				'Simple sensor story for software-and-hardware bundles',
			)
		),
		'qubyx-smartsensor-s2' => qubyx_ci_product(
			'Qubyx SmartSensor S2',
			'qubyx-smartsensor-s2',
			'Advanced sensor positioning for demanding validation workflows',
			'SmartSensor S2 is positioned for teams that need a more capable measurement path across luminance, color, and enterprise QA programs.',
			'Advanced sensor',
			6,
			array( 'product_category' => array( 'sensors' ) ),
			array(
				'Advanced measurement positioning for professional workflows',
				'Designed for PerfectLum, PerfectChroma, and RemoteQA narratives',
				'Comparison path against SmartSensor S1',
				'Built for enterprise product pages without unverified technical claims',
			)
		),
	);
}

/**
 * Build one product page.
 */
function qubyx_ci_product( $title, $slug, $eyebrow, $description, $tag, $order, $terms, $benefits ) {
	$features = array();
	foreach ( $benefits as $index => $benefit ) {
		$features[] = array(
			'badge'       => 0 === $index ? $tag : 'Workflow',
			'title'       => $benefit,
			'description' => 'Designed for teams that need measurable display quality, repeatable procedures, and clear evidence for every critical screen.',
			'span'        => 0 === $index ? 'wide' : '',
		);
	}

	return array(
		'post_title'      => $title,
		'post_name'       => $slug,
		'post_excerpt'    => $description,
		'post_content'    => qubyx_ci_build_product_content( $title, $slug, $eyebrow, $description, $tag, $benefits ),
		'menu_order'      => $order,
		'terms'           => $terms,
		'seo_title'       => $title . ' | QUBYX Display Calibration and QA',
		'seo_description' => $description,
		'meta'            => array(
			'hero_eyebrow'        => $eyebrow,
			'hero_headline'       => $title,
			'hero_description'    => $description,
			'cta_primary'         => array( 'title' => 'Request demo', 'url' => '/request-demo/', 'target' => '' ),
			'cta_secondary'       => array( 'title' => 'Contact sales', 'url' => '/contact/', 'target' => '' ),
			'features_intro'      => 'This product helps teams understand the workflow it improves, the evidence it creates, and how it connects to the broader QUBYX platform.',
			'features'            => $features,
			'benefits'            => array_map(
				function ( $benefit ) {
					return array( 'title' => $benefit, 'detail' => 'Supports repeatable display quality work, clearer reporting, and a more accountable calibration program.' );
				},
				$benefits
			),
			'specifications'      => array(
				array( 'label' => 'Primary audience', 'value' => 'Enterprise, professional, and regulated display workflows' ),
				array( 'label' => 'Deployment model', 'value' => 'Workstation, fleet, hosted, or local depending on product and customer needs' ),
				array( 'label' => 'Sales motion', 'value' => 'Demo, quote, evaluation, volume licensing, and partner deployment' ),
			),
			'comparison_intro'    => $title . ' is positioned against manual QA, generic utilities, and unsupported one-off calibration workflows.',
			'comparison_columns'  => array(
				array( 'name' => 'Manual workflow', 'highlight' => false ),
				array( 'name' => 'Generic utility', 'highlight' => false ),
				array( 'name' => $title, 'highlight' => true ),
			),
			'comparison_rows'     => array(
				array( 'feature' => 'Repeatable procedure', 'values' => array( array( 'value' => 'Manual' ), array( 'value' => 'Partial' ), array( 'value' => 'Yes' ) ) ),
				array( 'feature' => 'Reporting', 'values' => array( array( 'value' => 'Spreadsheet' ), array( 'value' => 'Basic' ), array( 'value' => 'Structured' ) ) ),
				array( 'feature' => 'Enterprise support', 'values' => array( array( 'value' => '-' ), array( 'value' => '-' ), array( 'value' => 'Yes' ) ) ),
			),
			'faqs'                => array(
				array( 'question' => 'Who is ' . $title . ' for?', 'answer' => $description ),
				array( 'question' => 'Can this be used in an enterprise workflow?', 'answer' => 'Yes. The product connects to QUBYX deployment, reporting, support, and purchasing workflows for teams and multi-site organizations.' ),
				array( 'question' => 'How does this product fit the QUBYX platform?', 'answer' => 'It can work alongside QUBYX software, sensors, RemoteQA, support, and store paths depending on the display quality program.' ),
			),
			'final_cta_heading'   => 'See how ' . $title . ' fits your display QA workflow.',
			'final_cta_text'      => 'Request a walkthrough, pricing guidance, or deployment conversation with QUBYX.',
			'final_cta_primary'   => array( 'title' => 'Request demo', 'url' => '/request-demo/', 'target' => '' ),
			'final_cta_secondary' => array( 'title' => 'Contact sales', 'url' => '/contact/', 'target' => '' ),
		),
	);
}

/**
 * Build SEO-rich product body content.
 *
 * @param string $title Product title.
 * @param string $slug Product slug.
 * @param string $eyebrow Product positioning.
 * @param string $description Product description.
 * @param string $tag Product tag.
 * @param array  $benefits Benefit bullets.
 * @return string
 */
function qubyx_ci_build_product_content( $title, $slug, $eyebrow, $description, $tag, $benefits ) {
	$related = array(
		'perfectlum' => array(
			array( 'label' => 'Medical Display QA', 'url' => '/solutions/medical-display-qa/' ),
			array( 'label' => 'DICOM Calibration', 'url' => '/solutions/dicom-calibration/' ),
			array( 'label' => 'Remote Monitor QA', 'url' => '/solutions/remote-monitor-qa/' ),
			array( 'label' => 'SmartSensor S1', 'url' => '/products/qubyx-smartsensor-s1/' ),
		),
		'perfectchroma' => array(
			array( 'label' => 'Color-Critical Workflows', 'url' => '/solutions/color-critical-workflows/' ),
			array( 'label' => 'Broadcast and Post-production', 'url' => '/industries/broadcast-post-production/' ),
			array( 'label' => 'DisplayCAL Alternative', 'url' => '/compare/displaycal-alternative/' ),
			array( 'label' => 'Store', 'url' => '/store/' ),
		),
		'perfectepd' => array(
			array( 'label' => 'E-paper Display QA', 'url' => '/solutions/epaper-display-qa/' ),
			array( 'label' => 'Display Manufacturing', 'url' => '/industries/display-manufacturing/' ),
			array( 'label' => 'OEM Display Calibration', 'url' => '/solutions/oem-display-calibration/' ),
			array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
		),
		'qubyx-remoteqa' => array(
			array( 'label' => 'Remote Monitor QA', 'url' => '/solutions/remote-monitor-qa/' ),
			array( 'label' => 'Enterprise Display Management', 'url' => '/solutions/enterprise-display-management/' ),
			array( 'label' => 'Security', 'url' => '/security/' ),
			array( 'label' => 'Contact support', 'url' => '/support/contact-support/' ),
		),
		'qubyx-smartsensor-s1' => array(
			array( 'label' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
			array( 'label' => 'Medical Display QA', 'url' => '/solutions/medical-display-qa/' ),
			array( 'label' => 'Warranty and RMA', 'url' => '/support/warranty-rma/' ),
			array( 'label' => 'Store', 'url' => '/store/' ),
		),
		'qubyx-smartsensor-s2' => array(
			array( 'label' => 'PerfectChroma', 'url' => '/products/perfectchroma/' ),
			array( 'label' => 'Display Manufacturing', 'url' => '/industries/display-manufacturing/' ),
			array( 'label' => 'Warranty and RMA', 'url' => '/support/warranty-rma/' ),
			array( 'label' => 'Request demo', 'url' => '/request-demo/' ),
		),
	);

	$content  = '<!-- wp:paragraph --><p>' . esc_html( $description ) . '</p><!-- /wp:paragraph -->';
	$content .= '<!-- wp:paragraph --><p>' . esc_html( $eyebrow ) . ' should be evaluated by the workflow it improves, the evidence it creates, and the way it fits into a broader QUBYX display quality program.</p><!-- /wp:paragraph -->';
	$content .= '<!-- wp:heading --><h2>' . esc_html( $title ) . ' for ' . esc_html( strtolower( $tag ) ) . ' workflows</h2><!-- /wp:heading -->';
	$content .= '<!-- wp:paragraph --><p>' . esc_html( $title ) . ' belongs in the QUBYX display quality portfolio for teams that need calibration, verification, reporting, repeatability, and a clear path from evaluation to deployment.</p><!-- /wp:paragraph -->';
	$content .= '<!-- wp:heading --><h2>What teams can use it for</h2><!-- /wp:heading --><!-- wp:list --><ul>';

	foreach ( $benefits as $benefit ) {
		$content .= '<li>' . esc_html( $benefit ) . '</li>';
	}

	$content .= '</ul><!-- /wp:list -->';
	$content .= '<!-- wp:heading --><h2>Enterprise evaluation criteria</h2><!-- /wp:heading -->';
	$content .= '<!-- wp:paragraph --><p>Evaluate ' . esc_html( $title ) . ' by workflow fit, number of displays, measurement method, reporting needs, support expectations, procurement model, and whether the deployment requires centralized QA or local workstation control.</p><!-- /wp:paragraph -->';
	$content .= '<!-- wp:heading --><h2>Related QUBYX pages</h2><!-- /wp:heading --><!-- wp:list --><ul>';

	foreach ( $related[ $slug ] ?? array() as $link ) {
		$content .= '<li><a href="' . esc_url( $link['url'] ) . '">' . esc_html( $link['label'] ) . '</a></li>';
	}

	$content .= '</ul><!-- /wp:list -->';
	$content .= '<!-- wp:heading --><h2>Frequently asked questions</h2><!-- /wp:heading -->';
	$content .= '<!-- wp:heading {"level":3} --><h3>Who is ' . esc_html( $title ) . ' for?</h3><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html( $description ) . '</p><!-- /wp:paragraph -->';
	$content .= '<!-- wp:heading {"level":3} --><h3>Can ' . esc_html( $title ) . ' support enterprise workflows?</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Yes. The page connects this product to QUBYX deployment, reporting, support, store, demo, and purchasing workflows.</p><!-- /wp:paragraph -->';
	$content .= '<!-- wp:heading {"level":3} --><h3>How does this product fit the QUBYX platform?</h3><!-- /wp:heading --><!-- wp:paragraph --><p>It can connect with QUBYX software, sensors, RemoteQA, support, store, and enterprise deployment paths depending on the display quality program.</p><!-- /wp:paragraph -->';

	return $content;
}

/**
 * Resource library entries.
 */
function qubyx_ci_resources() {
	return array(
		'dicom-display-calibration-guide' => array(
			'post_title'   => 'Complete Guide to DICOM Display Calibration for Hospitals',
			'post_name'    => 'dicom-display-calibration-guide',
			'post_excerpt' => 'A practical guide to DICOM Part 14 GSDF calibration, medical display QA, reports, and audit evidence.',
			'post_content' => '<h2>Why DICOM calibration matters</h2><p>Diagnostic display quality must be measurable, repeatable, and documented. A managed workflow helps teams move beyond ad hoc checks toward a program that can be reviewed and improved.</p><h2>What to document</h2><p>Record display identity, targets, sensor data, test results, corrective actions, operator details, and dates for every calibration or QA event.</p>',
			'terms'        => array( 'resource_category' => array( 'guides', 'compliance' ) ),
			'meta'         => array( 'reading_time' => 7, 'resource_layout' => 'guide', 'summary' => 'DICOM display calibration explained for hospital teams building a repeatable QA program.', 'show_toc' => 1 ),
		),
		'remote-monitor-qa-program' => array(
			'post_title'   => 'How to Build a Remote Monitor QA Program Across Multiple Sites',
			'post_name'    => 'remote-monitor-qa-program',
			'post_excerpt' => 'A remote QA playbook for scheduling, reporting, status review, and multi-site display quality ownership.',
			'post_content' => '<h2>Start with ownership</h2><p>Remote QA works best when teams define who owns display inventory, scheduling, exceptions, reports, and escalation.</p><h2>Centralize evidence</h2><p>A central server or managed service can reduce manual workstation visits and make audit preparation easier.</p>',
			'terms'        => array( 'resource_category' => array( 'guides', 'technical-notes' ) ),
			'meta'         => array( 'reading_time' => 6, 'resource_layout' => 'guide', 'summary' => 'A practical framework for moving display QA from local tasks to centralized operations.', 'show_toc' => 1 ),
		),
		'calman-alternative-enterprise-qa' => array(
			'post_title'   => 'Calman Alternative: What Enterprise Display QA Teams Should Compare',
			'post_name'    => 'calman-alternative-enterprise-qa',
			'post_excerpt' => 'A search-intent article for teams comparing professional calibration software, reporting, support, and deployment fit.',
			'post_content' => '<h2>Compare workflows, not just features</h2><p>Enterprise buyers should evaluate reporting, scheduling, sensor support, deployment controls, support, and how easily the workflow can be repeated by multiple operators.</p>',
			'terms'        => array( 'resource_category' => array( 'guides' ) ),
			'meta'         => array( 'reading_time' => 5, 'resource_layout' => 'guide', 'summary' => 'How to evaluate calibration software alternatives from an enterprise workflow perspective.', 'show_toc' => 1 ),
		),
		'displaycal-vs-commercial-software' => array(
			'post_title'   => 'DisplayCAL vs Commercial Calibration Software',
			'post_name'    => 'displaycal-vs-commercial-software',
			'post_excerpt' => 'A balanced comparison for technical teams deciding between open-source calibration and managed commercial QA.',
			'post_content' => '<h2>Open tools and managed programs solve different problems</h2><p>Open-source calibration can be valuable for technical users. Commercial QA becomes important when support, reports, procedures, scale, and accountability matter.</p>',
			'terms'        => array( 'resource_category' => array( 'guides', 'technical-notes' ) ),
			'meta'         => array( 'reading_time' => 5, 'resource_layout' => 'guide', 'summary' => 'A decision framework for open-source calibration tools versus supported enterprise workflows.', 'show_toc' => 1 ),
		),
		'aapm-tg18-display-qa-checklist' => array(
			'post_title'   => 'AAPM TG18 Display QA Checklist',
			'post_name'    => 'aapm-tg18-display-qa-checklist',
			'post_excerpt' => 'A compliance-oriented checklist for medical display QA teams building repeatable acceptance and constancy workflows.',
			'post_content' => '<h2>Build the checklist around evidence</h2><p>A strong medical display QA checklist covers acceptance testing, constancy checks, documentation, operator review, and corrective action workflows.</p>',
			'terms'        => array( 'resource_category' => array( 'compliance' ) ),
			'meta'         => array( 'reading_time' => 4, 'resource_layout' => 'guide', 'summary' => 'A practical checklist for medical display QA teams researching AAPM TG18 workflows.', 'show_toc' => 1 ),
		),
		'aapm-tg270-display-qa-guide' => array(
			'post_title'   => 'AAPM TG270 Display QA Guide for Modern Imaging Teams',
			'post_name'    => 'aapm-tg270-display-qa-guide',
			'post_excerpt' => 'A practical AAPM TG270 guide for medical display QA programs, enterprise imaging networks, remote workstations, and documentation workflows.',
			'post_content' => '<h2>Why TG270 belongs in modern display QA planning</h2><p>AAPM TG270 helps imaging teams think about display quality in modern clinical environments where workstations, networks, remote reading, and documentation requirements are more complex than a single room or single monitor.</p><h2>What to include in a QA program</h2><p>Teams should define display inventory, intended use, calibration targets, test frequency, measurement method, acceptance criteria, reporting, exception handling, and corrective action ownership.</p><h2>How QUBYX supports the workflow</h2><p>PerfectLum can anchor medical display calibration, SmartSensor hardware can support repeatable measurement, and RemoteQA can help administrators review status and reports across distributed workstations.</p>',
			'terms'        => array( 'resource_category' => array( 'guides', 'compliance' ) ),
			'meta'         => array( 'reading_time' => 7, 'resource_layout' => 'guide', 'summary' => 'AAPM TG270 explained for imaging teams building a scalable display QA program.', 'show_toc' => 1, 'resource_metrics' => array(
				array( 'value' => '90', 'label' => 'day implementation roadmap' ),
				array( 'value' => '3', 'label' => 'owner roles to define' ),
				array( 'value' => '1', 'label' => 'shared evidence model' ),
			) ),
		),
		'din-6868-157-display-qa' => array(
			'post_title'   => 'DIN 6868-157 Display QA: What Imaging Teams Should Know',
			'post_name'    => 'din-6868-157-display-qa',
			'post_excerpt' => 'A DIN 6868-157 display QA guide for medical imaging teams evaluating acceptance testing, constancy checks, reporting, and display quality evidence.',
			'post_content' => '<h2>DIN 6868-157 and display quality evidence</h2><p>DIN 6868-157 is an important search topic for imaging organizations that need structured display QA language, acceptance testing concepts, constancy workflows, documentation, and reviewable evidence.</p><h2>Build a repeatable workflow</h2><p>A useful program defines who owns the display, how measurements are performed, how often checks occur, what reports are kept, and how exceptions are escalated.</p><h2>Where QUBYX fits</h2><p>QUBYX content can connect DIN 6868-157 research to PerfectLum, DICOM calibration, medical display QA, SmartSensor measurement, and RemoteQA visibility for enterprise imaging teams.</p>',
			'terms'        => array( 'resource_category' => array( 'guides', 'compliance' ) ),
			'meta'         => array( 'reading_time' => 6, 'resource_layout' => 'guide', 'summary' => 'DIN 6868-157 concepts for medical display QA buyers and imaging administrators.', 'show_toc' => 1 ),
		),
			'epaper-display-measurement-basics' => array(
				'post_title'   => 'E-paper Display Contrast and Reflectance Measurement Basics',
				'post_name'    => 'epaper-display-measurement-basics',
				'post_excerpt' => 'A technical note introducing e-paper display measurement concepts for PerfectEPD content.',
				'post_content' => '<h2>Why e-paper measurement is different</h2><p>E-paper display quality depends on ambient conditions, reflectance, contrast behavior, viewing context, and repeatable measurement procedure design.</p>',
				'terms'        => array( 'resource_category' => array( 'technical-notes' ) ),
				'meta'         => array( 'reading_time' => 4, 'resource_layout' => 'guide', 'summary' => 'A starting technical note for e-paper display QA and PerfectEPD search demand.', 'show_toc' => 1 ),
			),
			'smartsensor-s2-launch-resource' => array(
				'post_title'      => 'QUBYX Introduces SmartSensor S2 for Advanced Display Validation',
				'post_name'       => 'qubyx-introduces-smartsensor-s2',
				'post_excerpt'    => 'QUBYX product news introducing the SmartSensor S2 story for advanced display validation workflows.',
				'post_content'    => '<h2>A stronger measurement story for display QA teams</h2><p>QUBYX is preparing SmartSensor S2 positioning for teams that need a more capable measurement story across luminance, color, and enterprise QA workflows.</p><h2>Where it fits</h2><p>The SmartSensor S2 narrative connects product evaluation, technical validation, and enterprise reporting needs for teams managing color-critical and medical display programs.</p>',
				'terms'           => array( 'resource_category' => array( 'news', 'product-updates' ) ),
				'meta'            => array( 'reading_time' => 3, 'resource_layout' => 'news', 'summary' => 'Product news for SmartSensor S2 and advanced display validation workflows.', 'show_toc' => 0 ),
				'seo_title'       => 'QUBYX SmartSensor S2 Product Update | QUBYX',
				'seo_description' => 'QUBYX SmartSensor S2 product news for advanced display validation, measurement workflows, and enterprise display QA programs.',
			),
			'remoteqa-multisite-resource' => array(
				'post_title'      => 'Qubyx RemoteQA Expands Multi-site Display Management Story',
				'post_name'       => 'remoteqa-multisite-display-management',
				'post_excerpt'    => 'A product update for centralized display QA operations and multi-site display management.',
				'post_content'    => '<h2>Remote QA as an operating model</h2><p>Multi-site teams need central visibility, scheduling, reporting, and exception handling. Qubyx RemoteQA content should lead with those operational outcomes.</p><h2>Why the update matters</h2><p>The message connects RemoteQA to healthcare networks, production teams, and enterprise IT groups that need display quality evidence without manually visiting every workstation.</p>',
				'terms'           => array( 'resource_category' => array( 'product-updates', 'news' ) ),
				'meta'            => array( 'reading_time' => 3, 'resource_layout' => 'news', 'summary' => 'RemoteQA product update for centralized display QA across multiple sites.', 'show_toc' => 0 ),
				'seo_title'       => 'Qubyx RemoteQA Multi-site Display Management Update | QUBYX',
				'seo_description' => 'Qubyx RemoteQA product update for centralized display QA, multi-site scheduling, reporting, and fleet visibility.',
			),
			'why-display-qa-matters-resource' => array(
				'post_title'      => 'Why Display QA Belongs in Enterprise Quality Programs',
				'post_name'       => 'why-display-qa-belongs-in-enterprise-quality-programs',
				'post_excerpt'    => 'A blog article framing display QA as operational infrastructure for regulated and color-critical teams.',
				'post_content'    => '<h2>Display quality is part of the trust layer</h2><p>Display QA is not just a technical maintenance task. For regulated, clinical, and color-critical teams, it is part of the trust layer between image data and human decisions.</p><blockquote>When screens become evidence surfaces, calibration becomes an operating habit instead of an occasional fix.</blockquote><h2>From workstation task to quality program</h2><p>The strongest teams treat calibration, verification, reporting, and exception handling as repeatable workflows that can be reviewed by operators, managers, customers, and auditors.</p>',
				'terms'           => array( 'resource_category' => array( 'blog' ) ),
				'meta'            => array( 'reading_time' => 4, 'resource_layout' => 'blog', 'summary' => 'A QUBYX perspective on why display QA belongs in enterprise quality programs.', 'show_toc' => 0, 'resource_author_name' => 'QUBYX Editorial Team', 'resource_author_role' => 'Display quality insights' ),
				'seo_title'       => 'Why Display QA Belongs in Enterprise Quality Programs | QUBYX',
				'seo_description' => 'A QUBYX blog article on display QA as operational infrastructure for regulated, clinical, and color-critical teams.',
			),
		);
	}

/**
 * Blog/news posts.
 */
function qubyx_ci_posts() {
	return array(
		'smartsensor-s2-launch' => array(
			'post_title'   => 'QUBYX Introduces SmartSensor S2 for Advanced Display Validation',
			'post_name'    => 'qubyx-introduces-smartsensor-s2',
			'post_excerpt' => 'QUBYX product news introducing the SmartSensor S2 story for advanced display validation workflows.',
			'post_content' => '<p>QUBYX is preparing SmartSensor S2 positioning for teams that need a more capable measurement story across luminance, color, and enterprise QA workflows.</p>',
			'terms'        => array( 'category' => array( 'news', 'product-updates' ) ),
		),
		'remoteqa-multisite' => array(
			'post_title'   => 'Qubyx RemoteQA Expands Multi-site Display Management Story',
			'post_name'    => 'remoteqa-multisite-display-management',
			'post_excerpt' => 'A product update for centralized display QA operations and multi-site display management.',
			'post_content' => '<p>Multi-site teams need central visibility, scheduling, reporting, and exception handling. Qubyx RemoteQA content should lead with those operational outcomes.</p>',
			'terms'        => array( 'category' => array( 'news', 'product-updates' ) ),
		),
		'why-display-qa-matters' => array(
			'post_title'   => 'Why Display QA Belongs in Enterprise Quality Programs',
			'post_name'    => 'why-display-qa-belongs-in-enterprise-quality-programs',
			'post_excerpt' => 'A blog post framing display QA as operational infrastructure.',
			'post_content' => '<p>Display QA is not just a technical maintenance task. For regulated, clinical, and color-critical teams, it is part of the trust layer between image data and human decisions.</p>',
			'terms'        => array( 'category' => array( 'blog' ) ),
		),
	);
}

/**
 * Menus.
 */
function qubyx_ci_menus() {
	return array(
		'primary' => array(
			'name'  => 'Qubyx Primary',
			'items' => array(
				array( 'key' => 'products', 'title' => 'Products', 'url' => '/products/' ),
				array( 'parent' => 'products', 'title' => 'PerfectLum', 'url' => '/products/perfectlum/' ),
				array( 'parent' => 'products', 'title' => 'PerfectChroma', 'url' => '/products/perfectchroma/' ),
				array( 'parent' => 'products', 'title' => 'PerfectEPD', 'url' => '/products/perfectepd/' ),
				array( 'parent' => 'products', 'title' => 'Qubyx RemoteQA', 'url' => '/products/qubyx-remoteqa/' ),
				array( 'parent' => 'products', 'title' => 'SmartSensor S1', 'url' => '/products/qubyx-smartsensor-s1/' ),
				array( 'parent' => 'products', 'title' => 'SmartSensor S2', 'url' => '/products/qubyx-smartsensor-s2/' ),
				array( 'key' => 'solutions', 'title' => 'Solutions', 'url' => '/solutions/' ),
				array( 'parent' => 'solutions', 'title' => 'Medical display QA', 'url' => '/solutions/medical-display-qa/' ),
				array( 'parent' => 'solutions', 'title' => 'DICOM calibration', 'url' => '/solutions/dicom-calibration/' ),
				array( 'parent' => 'solutions', 'title' => 'Multi-site hospital networks', 'url' => '/solutions/multi-site-hospital-networks/' ),
				array( 'parent' => 'solutions', 'title' => 'Enterprise display management', 'url' => '/solutions/enterprise-display-management/' ),
				array( 'parent' => 'solutions', 'title' => 'Remote monitor QA', 'url' => '/solutions/remote-monitor-qa/' ),
				array( 'parent' => 'solutions', 'title' => 'Color-critical workflows', 'url' => '/solutions/color-critical-workflows/' ),
				array( 'parent' => 'solutions', 'title' => 'OEM display calibration', 'url' => '/solutions/oem-display-calibration/' ),
				array( 'parent' => 'solutions', 'title' => 'E-paper display QA', 'url' => '/solutions/epaper-display-qa/' ),
				array( 'key' => 'industries', 'title' => 'Industries', 'url' => '/industries/' ),
				array( 'parent' => 'industries', 'title' => 'Healthcare', 'url' => '/industries/healthcare/' ),
				array( 'parent' => 'industries', 'title' => 'Medical imaging', 'url' => '/industries/medical-imaging/' ),
				array( 'parent' => 'industries', 'title' => 'Display manufacturing', 'url' => '/industries/display-manufacturing/' ),
				array( 'parent' => 'industries', 'title' => 'Broadcast and post-production', 'url' => '/industries/broadcast-post-production/' ),
				array( 'key' => 'store', 'title' => 'Store', 'url' => '/store/' ),
				array( 'parent' => 'store', 'title' => 'PerfectLum pricing', 'url' => '/store/perfectlum/' ),
				array( 'parent' => 'store', 'title' => 'PerfectChroma pricing', 'url' => '/store/perfectchroma/' ),
				array( 'parent' => 'store', 'title' => 'PerfectEPD pricing', 'url' => '/store/perfectepd/' ),
				array( 'parent' => 'store', 'title' => 'SmartSensor catalog', 'url' => '/store/sensors/' ),
				array( 'parent' => 'store', 'title' => 'Bundles', 'url' => '/store/bundles/' ),
				array( 'parent' => 'store', 'title' => 'Enterprise pricing', 'url' => '/store/enterprise/' ),
				array( 'parent' => 'store', 'title' => 'Education licensing', 'url' => '/store/education/' ),
				array( 'parent' => 'store', 'title' => 'Request quote', 'url' => '/request-demo/' ),
				array( 'key' => 'resources', 'title' => 'Resources', 'url' => '/resources/' ),
				array( 'parent' => 'resources', 'title' => 'Guides', 'url' => '/resources/category/guides/' ),
				array( 'parent' => 'resources', 'title' => 'Compliance', 'url' => '/resources/category/compliance/' ),
				array( 'key' => 'compare', 'parent' => 'resources', 'title' => 'Comparisons', 'url' => '/compare/' ),
				array( 'parent' => 'compare', 'title' => 'Calman alternative', 'url' => '/compare/calman-alternative/' ),
				array( 'parent' => 'compare', 'title' => 'DisplayCAL alternative', 'url' => '/compare/displaycal-alternative/' ),
				array( 'parent' => 'compare', 'title' => 'Datacolor Spyder alternative', 'url' => '/compare/datacolor-spyder-alternative/' ),
				array( 'parent' => 'compare', 'title' => 'Best monitor calibration software', 'url' => '/compare/best-monitor-calibration-software/' ),
				array( 'parent' => 'resources', 'title' => 'News', 'url' => '/resources/category/news/' ),
				array( 'parent' => 'resources', 'title' => 'Product updates', 'url' => '/resources/category/product-updates/' ),
				array( 'parent' => 'resources', 'title' => 'Blog', 'url' => '/resources/category/blog/' ),
				array( 'key' => 'support', 'title' => 'Support', 'url' => '/support/' ),
				array( 'parent' => 'support', 'title' => 'Downloads', 'url' => '/downloads/' ),
				array( 'parent' => 'support', 'title' => 'Documentation', 'url' => '/support/documentation/' ),
				array( 'parent' => 'support', 'title' => 'Contact support', 'url' => '/support/contact-support/' ),
				array( 'parent' => 'support', 'title' => 'Security', 'url' => '/security/' ),
				array( 'parent' => 'support', 'title' => 'Warranty and RMA', 'url' => '/support/warranty-rma/' ),
				array( 'key' => 'company', 'title' => 'Company', 'url' => '/company/' ),
				array( 'parent' => 'company', 'title' => 'About QUBYX', 'url' => '/company/about/' ),
				array( 'parent' => 'company', 'title' => 'Partners', 'url' => '/partners/' ),
				array( 'parent' => 'company', 'title' => 'Contact', 'url' => '/contact/' ),
				array( 'parent' => 'company', 'title' => 'Privacy', 'url' => '/privacy/' ),
			),
		),
		'footer'  => array(
			'name'  => 'Qubyx Footer Legal',
			'items' => array(
				array( 'title' => 'Privacy', 'url' => '/privacy/' ),
				array( 'title' => 'Terms', 'url' => '/terms/' ),
				array( 'title' => 'Cookies', 'url' => '/cookies/' ),
				array( 'title' => 'Security', 'url' => '/security/' ),
			),
		),
	);
}
