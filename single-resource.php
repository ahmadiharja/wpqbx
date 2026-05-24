<?php
/**
 * Single Resource template with guide, news, and blog layouts.
 *
 * @package Qubyx
 */

get_header();

while ( have_posts() ) :
	the_post();

	$layout   = qubyx_get_resource_layout();
	$reading  = qubyx_reading_time();
	$summary  = qubyx_field( 'summary' );
	$show_toc = qubyx_field( 'show_toc', true );
	$related  = qubyx_field( 'related_resources' );
	$term     = qubyx_get_resource_primary_term();
	$cat      = $term ? $term->name : __( 'Resource', 'qubyx' );
	$cat_slug = $term ? $term->slug : 'guides';
	$metrics  = qubyx_field( 'resource_metrics', array() );
	$lede     = $summary ? $summary : get_the_excerpt();

	if ( 'news' === $layout ) :
		?>
		<article class="res-page res-news">
			<header class="res-news__hero">
				<div class="res-news__hero-inner res-container">
					<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
					<p class="res-news__date">
						<?php echo esc_html( get_the_date( 'M j' ) ); ?>
						<small><?php echo esc_html( get_the_date( 'Y' ) ); ?></small>
					</p>
					<span class="res-news__cat"><?php echo esc_html( $cat ); ?></span>
					<h1><?php the_title(); ?></h1>
					<?php if ( $lede ) : ?>
						<p class="res-news__lede"><?php echo esc_html( $lede ); ?></p>
					<?php endif; ?>
				</div>
			</header>

			<div class="res-news__cover">
				<div class="res-news__cover-inner res-card--<?php echo esc_attr( $cat_slug ); ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'qubyx-hero', array( 'loading' => 'eager' ) ); ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="res-news__layout">
				<div class="res-news__body" data-prose>
					<?php the_content(); ?>
					<?php wp_link_pages( array(
						'before' => '<div class="page-links"><span>' . __( 'Pages:', 'qubyx' ) . '</span>',
						'after'  => '</div>',
					) ); ?>
				</div>
				<aside class="res-news__sidebar">
					<div class="res-news__sidecard res-news__sidecard-news">
						<h4><?php esc_html_e( 'For updates', 'qubyx' ); ?></h4>
						<p><?php esc_html_e( 'Follow QUBYX product, release, and display QA announcements from the consolidated resource library.', 'qubyx' ); ?></p>
						<a href="<?php echo esc_url( home_url( '/resources/category/product-updates/' ) ); ?>"><?php esc_html_e( 'View product updates', 'qubyx' ); ?></a>
					</div>
					<div class="res-news__sidecard">
						<h4><?php esc_html_e( 'Article details', 'qubyx' ); ?></h4>
						<p><?php echo esc_html( $cat ); ?> / <?php echo esc_html( sprintf( /* translators: %d: minutes */ __( '%d min read', 'qubyx' ), $reading ) ); ?></p>
						<a href="<?php echo esc_url( get_post_type_archive_link( 'resource' ) ); ?>"><?php esc_html_e( 'All resources', 'qubyx' ); ?></a>
					</div>
				</aside>
			</div>
		</article>
	<?php elseif ( 'blog' === $layout ) : ?>
		<article class="res-page res-blog">
			<header class="res-blog__hero">
				<div class="res-blog__hero-inner res-container">
					<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
					<div class="res-blog__tags">
						<span class="res-blog__tag"><?php echo esc_html( $cat ); ?></span>
						<span class="res-blog__tag"><?php echo esc_html( sprintf( /* translators: %d: minutes */ __( '%d min read', 'qubyx' ), $reading ) ); ?></span>
					</div>
					<h1><?php the_title(); ?></h1>
					<?php if ( $lede ) : ?>
						<p class="res-blog__lede"><?php echo esc_html( $lede ); ?></p>
					<?php endif; ?>
					<div class="res-blog__byline">
						<span class="res-blog__avatar" aria-hidden="true"><?php echo esc_html( strtoupper( substr( qubyx_field( 'resource_author_name', 'QUBYX' ), 0, 1 ) ) ); ?></span>
						<div class="res-blog__author">
							<strong><?php echo esc_html( qubyx_field( 'resource_author_name', __( 'QUBYX Editorial Team', 'qubyx' ) ) ); ?></strong>
							<span><?php echo esc_html( qubyx_field( 'resource_author_role', __( 'Display quality insights', 'qubyx' ) ) ); ?> / <?php echo esc_html( get_the_date() ); ?></span>
						</div>
					</div>
				</div>
			</header>

			<div class="res-blog__feature">
				<div class="res-blog__feature-inner">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'qubyx-hero', array( 'loading' => 'eager' ) ); ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="res-blog__body" data-prose>
				<?php the_content(); ?>
				<?php wp_link_pages( array(
					'before' => '<div class="page-links"><span>' . __( 'Pages:', 'qubyx' ) . '</span>',
					'after'  => '</div>',
				) ); ?>
			</div>
		</article>
	<?php else : ?>
		<article class="res-page res-guide">
			<header class="res-guide__hero">
				<div class="res-guide__hero-inner res-container">
					<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
					<span class="res-guide__cat"><?php echo esc_html( $cat ); ?></span>
					<h1><?php the_title(); ?></h1>
					<?php if ( $lede ) : ?>
						<p class="res-guide__lede"><?php echo esc_html( $lede ); ?></p>
					<?php endif; ?>
					<div class="res-guide__meta">
						<span class="res-guide__meta-item"><strong><?php echo esc_html( sprintf( /* translators: %d: minutes */ __( '%d min', 'qubyx' ), $reading ) ); ?></strong><?php esc_html_e( 'read', 'qubyx' ); ?></span>
						<span class="res-guide__meta-item"><strong><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></strong><?php esc_html_e( 'updated', 'qubyx' ); ?></span>
						<span class="res-guide__meta-item"><strong><?php echo esc_html( $cat ); ?></strong><?php esc_html_e( 'resource type', 'qubyx' ); ?></span>
					</div>
				</div>

				<?php if ( is_array( $metrics ) && ! empty( $metrics ) ) : ?>
					<div class="res-guide__metrics res-container">
						<?php foreach ( array_slice( $metrics, 0, 3 ) as $metric ) : ?>
							<div class="res-guide__metric">
								<strong><?php echo esc_html( $metric['value'] ?? '' ); ?></strong>
								<span><?php echo esc_html( $metric['label'] ?? '' ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</header>

			<div class="res-guide__layout res-container">
				<?php if ( $show_toc ) : ?>
					<aside class="res-guide__toc" data-toc>
						<p class="res-guide__toc-label"><?php esc_html_e( 'On this page', 'qubyx' ); ?></p>
						<ol class="toc__list"></ol>
					</aside>
				<?php endif; ?>

				<div class="res-guide__body" data-prose>
					<?php the_content(); ?>
					<?php wp_link_pages( array(
						'before' => '<div class="page-links"><span>' . __( 'Pages:', 'qubyx' ) . '</span>',
						'after'  => '</div>',
					) ); ?>
				</div>
			</div>
		</article>
	<?php endif; ?>

	<?php
	$related_query = null;
	if ( $related && is_array( $related ) ) {
		$related_query = new WP_Query(
			array(
				'post_type'      => 'resource',
				'post__in'       => array_map( 'absint', $related ),
				'orderby'        => 'post__in',
				'posts_per_page' => 3,
			)
		);
	} elseif ( $term ) {
		$related_query = new WP_Query(
			array(
				'post_type'           => 'resource',
				'posts_per_page'      => 3,
				'post__not_in'        => array( get_the_ID() ),
				'ignore_sticky_posts' => true,
				'tax_query'           => array(
					array(
						'taxonomy' => 'resource_category',
						'field'    => 'slug',
						'terms'    => $term->slug,
					),
				),
			)
		);
	}

	if ( $related_query && $related_query->have_posts() ) :
		?>
		<section class="res-related">
			<div class="res-container">
				<h2><?php esc_html_e( 'Continue reading', 'qubyx' ); ?></h2>
				<div class="res-grid">
					<?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
						<?php qubyx_render_resource_card( get_the_ID() ); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php
		wp_reset_postdata();
	endif;
endwhile;
?>

<?php get_template_part( 'template-parts/sections/cta' ); ?>
<?php get_footer(); ?>
