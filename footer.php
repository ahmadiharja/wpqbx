<?php
/**
 * The footer for the Qubyx theme.
 *
 * @package Qubyx
 */
?>
</main><!-- #main -->

<footer class="site-footer">
	<div class="container">
		<div class="site-footer__top">
			<div class="site-footer__brand">
				<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php if ( has_custom_logo() ) {
						the_custom_logo();
					} else {
						echo '<span class="site-footer__brand-text">' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
					} ?>
				</a>
				<p class="site-footer__tagline">
					<?php echo esc_html( get_bloginfo( 'description' ) ?: __( 'Enterprise display calibration, verification, sensors, and remote QA for medical and color-critical organizations.', 'qubyx' ) ); ?>
				</p>
				<form class="site-footer__newsletter" action="#" method="post" novalidate>
					<label for="footer-email" class="screen-reader-text"><?php esc_html_e( 'Email address', 'qubyx' ); ?></label>
					<input id="footer-email" type="email" placeholder="<?php esc_attr_e( 'you@hospital.org', 'qubyx' ); ?>" required>
					<button type="submit" class="btn btn--primary btn--sm"><?php esc_html_e( 'Subscribe', 'qubyx' ); ?></button>
				</form>
			</div>

			<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Footer navigation', 'qubyx' ); ?>">
				<?php
				$columns = array(
					__( 'Product', 'qubyx' ) => array(
						__( 'PerfectLum', 'qubyx' )       => '/products/perfectlum/',
						__( 'PerfectChroma', 'qubyx' )    => '/products/perfectchroma/',
						__( 'PerfectEPD', 'qubyx' )       => '/products/perfectepd/',
						__( 'Qubyx RemoteQA', 'qubyx' )   => '/products/qubyx-remoteqa/',
						__( 'SmartSensor S1', 'qubyx' )   => '/products/qubyx-smartsensor-s1/',
						__( 'SmartSensor S2', 'qubyx' )   => '/products/qubyx-smartsensor-s2/',
					),
					__( 'Solutions', 'qubyx' ) => array(
						__( 'Medical display QA', 'qubyx' )         => '/solutions/medical-display-qa/',
						__( 'Enterprise display management', 'qubyx' ) => '/solutions/enterprise-display-management/',
						__( 'Color-critical workflows', 'qubyx' )   => '/solutions/color-critical-workflows/',
						__( 'OEM display calibration', 'qubyx' )    => '/solutions/oem-display-calibration/',
						__( 'E-paper display QA', 'qubyx' )         => '/solutions/epaper-display-qa/',
					),
					__( 'Resources', 'qubyx' ) => array(
						__( 'Resource library', 'qubyx' ) => '/resources/',
						__( 'Compliance guides', 'qubyx' ) => '/resources/category/compliance/',
						__( 'Technical notes', 'qubyx' )  => '/resources/category/technical-notes/',
						__( 'Comparison pages', 'qubyx' ) => '/compare/',
							__( 'Blog', 'qubyx' )             => '/resources/category/blog/',
							__( 'News', 'qubyx' )             => '/resources/category/news/',
							__( 'Product updates', 'qubyx' )  => '/resources/category/product-updates/',
					),
					__( 'Support', 'qubyx' ) => array(
						__( 'Downloads', 'qubyx' )        => '/downloads/',
						__( 'Documentation', 'qubyx' )    => '/support/documentation/',
						__( 'Contact support', 'qubyx' )  => '/support/contact-support/',
						__( 'Warranty and RMA', 'qubyx' ) => '/support/warranty-rma/',
						__( 'Store', 'qubyx' )            => '/store/',
					),
					__( 'Company', 'qubyx' ) => array(
						__( 'About', 'qubyx' )            => '/company/about/',
						__( 'Partners', 'qubyx' )         => '/partners/',
						__( 'Contact', 'qubyx' )          => '/contact/',
						__( 'Request demo', 'qubyx' )     => '/request-demo/',
					),
				);

				foreach ( $columns as $heading => $links ) :
					?>
					<div class="site-footer__col">
						<h4><?php echo esc_html( $heading ); ?></h4>
						<ul>
							<?php foreach ( $links as $label => $href ) : ?>
								<li><a href="<?php echo esc_url( home_url( $href ) ); ?>"><?php echo esc_html( $label ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</nav>
		</div>

		<div class="site-footer__bottom">
			<p class="site-footer__copyright">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'qubyx' ); ?>
			</p>
			<nav class="site-footer__legal" aria-label="<?php esc_attr_e( 'Legal', 'qubyx' ); ?>">
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'site-footer__legal-list',
						'depth'          => 1,
						'fallback_cb'    => false,
					) );
				} else {
					echo '<ul class="site-footer__legal-list">';
					echo '<li><a href="' . esc_url( home_url( '/privacy/' ) ) . '">' . esc_html__( 'Privacy', 'qubyx' ) . '</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/terms/' ) ) . '">' . esc_html__( 'Terms', 'qubyx' ) . '</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/cookies/' ) ) . '">' . esc_html__( 'Cookies', 'qubyx' ) . '</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/security/' ) ) . '">' . esc_html__( 'Security', 'qubyx' ) . '</a></li>';
					echo '</ul>';
				}
				?>
			</nav>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
