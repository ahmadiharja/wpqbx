<?php
/**
 * Resource hub archive template.
 *
 * @package Qubyx
 */

get_header();

$category_nav = qubyx_get_resource_category_nav();
$featured     = new WP_Query(
	array(
		'post_type'           => 'resource',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
	)
);
$featured_ids = wp_list_pluck( $featured->posts, 'ID' );
?>

<section class="res-page res-hub">
	<header class="res-hub__hero">
		<div class="res-container">
			<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
			<p class="eyebrow"><span class="eyebrow__dot" aria-hidden="true"></span><?php esc_html_e( 'Resource library', 'qubyx' ); ?></p>
			<h1><?php esc_html_e( 'Display calibration resources for every team.', 'qubyx' ); ?></h1>
			<p><?php esc_html_e( 'Guides, compliance explainers, technical notes, case studies, product updates, news, and blog insights in one import-friendly WordPress library.', 'qubyx' ); ?></p>
			<form class="res-hub__search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label class="screen-reader-text" for="resource-search"><?php esc_html_e( 'Search resources', 'qubyx' ); ?></label>
				<input id="resource-search" type="search" name="s" placeholder="<?php esc_attr_e( 'Search calibration topics', 'qubyx' ); ?>" />
				<input type="hidden" name="post_type" value="resource" />
				<button type="submit"><?php esc_html_e( 'Search', 'qubyx' ); ?></button>
			</form>
		</div>
	</header>

	<nav class="res-hub__chips res-container" aria-label="<?php esc_attr_e( 'Resource categories', 'qubyx' ); ?>">
		<a class="res-hub__chip is-active" href="<?php echo esc_url( get_post_type_archive_link( 'resource' ) ); ?>">
			<span class="res-hub__chip-icon" aria-hidden="true"><?php esc_html_e( 'All', 'qubyx' ); ?></span>
			<?php esc_html_e( 'All resources', 'qubyx' ); ?>
		</a>
		<?php foreach ( $category_nav as $slug => $item ) :
			$term_link = get_term_link( $slug, 'resource_category' );
			if ( is_wp_error( $term_link ) ) {
				continue;
			}
			?>
			<a class="res-hub__chip" href="<?php echo esc_url( $term_link ); ?>">
				<span class="res-hub__chip-icon" aria-hidden="true"><?php echo esc_html( $item['icon'] ); ?></span>
				<?php echo esc_html( $item['label'] ); ?>
			</a>
		<?php endforeach; ?>
	</nav>

	<div class="res-container res-hub__main">
		<?php if ( $featured->have_posts() ) : ?>
			<section class="res-hub__featured" aria-label="<?php esc_attr_e( 'Featured resources', 'qubyx' ); ?>">
				<?php
				$featured->the_post();
				$main_term = qubyx_get_resource_primary_term( get_the_ID() );
				?>
				<a class="res-hub__featured-main" href="<?php the_permalink(); ?>">
					<div class="res-hub__featured-image">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'qubyx-hero', array( 'loading' => 'eager' ) ); ?>
						<?php endif; ?>
					</div>
					<div class="res-hub__featured-body">
						<span class="res-hub__tag"><?php echo esc_html( $main_term ? $main_term->name : __( 'Featured', 'qubyx' ) ); ?></span>
						<h2><?php the_title(); ?></h2>
						<p><?php echo esc_html( get_the_excerpt() ); ?></p>
						<div class="res-hub__featured-meta">
							<span><?php echo esc_html( sprintf( /* translators: %d: minutes */ __( '%d min read', 'qubyx' ), qubyx_reading_time() ) ); ?></span>
							<span><?php echo esc_html( get_the_date() ); ?></span>
						</div>
					</div>
				</a>

				<div class="res-hub__featured-side">
					<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>
						<?php $side_term = qubyx_get_resource_primary_term( get_the_ID() ); ?>
						<a class="res-hub__featured-side-card" href="<?php the_permalink(); ?>">
							<span class="res-hub__tag"><?php echo esc_html( $side_term ? $side_term->name : __( 'Resource', 'qubyx' ) ); ?></span>
							<h3><?php the_title(); ?></h3>
							<p><?php echo esc_html( get_the_excerpt() ); ?></p>
						</a>
					<?php endwhile; ?>
				</div>
			</section>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<?php foreach ( $category_nav as $slug => $item ) :
			$term = get_term_by( 'slug', $slug, 'resource_category' );
			if ( ! $term ) {
				continue;
			}

			$section = new WP_Query(
				array(
					'post_type'           => 'resource',
					'posts_per_page'      => 3,
					'post__not_in'        => $featured_ids,
					'ignore_sticky_posts' => true,
					'tax_query'           => array(
						array(
							'taxonomy' => 'resource_category',
							'field'    => 'slug',
							'terms'    => $slug,
						),
					),
				)
			);

			if ( ! $section->have_posts() ) {
				continue;
			}

			$term_link = get_term_link( $term );
			?>
			<section class="res-section">
				<header class="res-section__head">
					<div>
						<p class="res-section__kicker"><?php echo esc_html( $item['description'] ); ?></p>
						<h2 class="res-section__title"><?php echo esc_html( $item['label'] ); ?></h2>
					</div>
					<?php if ( ! is_wp_error( $term_link ) ) : ?>
						<a class="res-section__more" href="<?php echo esc_url( $term_link ); ?>"><?php esc_html_e( 'View all', 'qubyx' ); ?></a>
					<?php endif; ?>
				</header>
				<div class="res-grid">
					<?php while ( $section->have_posts() ) : $section->the_post(); ?>
						<?php qubyx_render_resource_card( get_the_ID() ); ?>
					<?php endwhile; ?>
				</div>
			</section>
			<?php
			wp_reset_postdata();
		endforeach;
		?>

		<?php if ( ! have_posts() && ! $featured_ids ) : ?>
			<p class="res-hub__empty"><?php esc_html_e( 'Resource articles will appear here after running the Qubyx Content Importer.', 'qubyx' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/cta' ); ?>
<?php get_footer(); ?>
