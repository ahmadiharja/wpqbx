<?php
/**
 * 404 template.
 *
 * @package Qubyx
 */

get_header(); ?>

<section class="section section--404">
	<div class="container container--narrow text-center">
		<p class="mono error-code">404</p>
		<h1 class="h-display"><?php esc_html_e( 'This page', 'qubyx' ); ?> <em><?php esc_html_e( 'wandered off.', 'qubyx' ); ?></em></h1>
		<p class="page__lede"><?php esc_html_e( 'The link may be old, or the page may have been moved. Try searching, or head back to safer ground.', 'qubyx' ); ?></p>

		<form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="screen-reader-text" for="s-404"><?php esc_html_e( 'Search', 'qubyx' ); ?></label>
			<input id="s-404" name="s" type="search" placeholder="<?php esc_attr_e( 'Search the site', 'qubyx' ); ?>" />
			<button type="submit" class="btn btn--primary btn--sm"><?php esc_html_e( 'Search', 'qubyx' ); ?></button>
		</form>

		<div class="text-center" style="margin-top: 2rem;">
			<a class="btn btn--ghost btn--md" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'qubyx' ); ?></a>
		</div>
	</div>
</section>

<?php get_footer();
