<?php
/**
 * Single Product template.
 *
 * Pulls ACF product fields with sane fallbacks.
 *
 * @package Qubyx
 */

get_header();
while ( have_posts() ) : the_post();

	$eyebrow   = qubyx_field( 'hero_eyebrow', get_post_type_object( 'product' )->labels->singular_name );
	$headline  = qubyx_field( 'hero_headline', get_the_title() );
	$desc      = qubyx_field( 'hero_description', get_the_excerpt() );
	$image     = qubyx_field( 'hero_image' );
	$image_url = qubyx_field( 'hero_image_url' );
	$cta_p     = qubyx_field( 'cta_primary' );
	$cta_s     = qubyx_field( 'cta_secondary' );
	$benefits  = qubyx_field( 'benefits', array() );
	$specs     = qubyx_field( 'specifications', array() );
	?>

	<section class="section section--product-hero">
		<div class="container product-hero">
			<div class="product-hero__copy">
				<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
				<p class="eyebrow"><span class="eyebrow__dot" aria-hidden="true"></span><?php echo esc_html( $eyebrow ); ?></p>
				<h1 class="hero__title h-display"><?php echo esc_html( $headline ); ?></h1>
				<p class="product-hero__desc"><?php echo esc_html( $desc ); ?></p>
				<div class="hero__actions">
					<?php
					qubyx_render_link( $cta_p, 'btn--primary btn--lg', __( 'Get started', 'qubyx' ) );
					qubyx_render_link( $cta_s, 'btn--ghost btn--lg',  __( 'Read documentation', 'qubyx' ) );
					?>
				</div>
			</div>
			<div class="product-hero__media">
				<?php if ( $image && is_array( $image ) ) : ?>
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" />
				<?php elseif ( $image_url ) : ?>
					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $headline ); ?>" />
				<?php elseif ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'qubyx-hero' ); ?>
				<?php else : ?>
					<div class="product-hero__media-ghost"><?php echo qubyx_icon( 'sparkles', 40 ); // phpcs:ignore ?></div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/feature-grid' ); ?>

	<?php if ( ! empty( $benefits ) ) : ?>
		<section class="section section--benefits">
			<div class="container">
				<header class="section__header">
					<p class="eyebrow"><?php esc_html_e( 'Benefits', 'qubyx' ); ?></p>
					<h2 class="section__title"><?php esc_html_e( 'What it actually changes', 'qubyx' ); ?> <em><?php esc_html_e( 'for your team.', 'qubyx' ); ?></em></h2>
				</header>
				<ul class="benefit-list">
					<?php foreach ( $benefits as $b ) : ?>
						<li>
							<?php echo qubyx_icon( 'check', 18 ); // phpcs:ignore ?>
							<div>
								<strong><?php echo esc_html( $b['title'] ?? '' ); ?></strong>
								<?php if ( ! empty( $b['detail'] ) ) : ?>
									<span><?php echo esc_html( $b['detail'] ); ?></span>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $specs ) ) : ?>
		<section class="section section--specs">
			<div class="container">
				<header class="section__header">
					<p class="eyebrow"><?php esc_html_e( 'Specifications', 'qubyx' ); ?></p>
					<h2 class="section__title"><?php esc_html_e( 'For the engineers in the room', 'qubyx' ); ?>.</h2>
				</header>
				<dl class="specs">
					<?php foreach ( $specs as $row ) : ?>
						<div class="specs__row">
							<dt><?php echo esc_html( $row['label'] ?? '' ); ?></dt>
							<dd><?php echo esc_html( $row['value'] ?? '' ); ?></dd>
						</div>
					<?php endforeach; ?>
				</dl>
			</div>
		</section>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/sections/comparison' ); ?>

	<?php if ( get_the_content() ) : ?>
		<section class="section section--prose">
			<div class="container container--narrow">
				<article class="prose"><?php the_content(); ?></article>
			</div>
		</section>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/sections/faq' ); ?>

<?php endwhile; ?>

<?php get_template_part( 'template-parts/sections/cta' ); ?>
<?php get_footer();
