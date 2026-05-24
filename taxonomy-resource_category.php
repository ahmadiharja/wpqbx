<?php
/**
 * Resource category archive template.
 *
 * @package Qubyx
 */

get_header();

$term         = get_queried_object();
$category_nav = qubyx_get_resource_category_nav();
$active_slug  = $term instanceof WP_Term ? $term->slug : '';
?>

<section class="res-page res-cat">
	<header class="res-cat__hero">
		<div class="res-container">
			<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
			<p class="res-cat__crumb">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'resource' ) ); ?>"><?php esc_html_e( 'Resources', 'qubyx' ); ?></a>
				<span aria-hidden="true">/</span>
				<?php echo esc_html( single_term_title( '', false ) ); ?>
			</p>
			<h1><?php echo esc_html( single_term_title( '', false ) ); ?></h1>
			<p>
				<?php
				if ( term_description() ) {
					echo wp_kses_post( wp_strip_all_tags( term_description() ) );
				} elseif ( isset( $category_nav[ $active_slug ]['description'] ) ) {
					echo esc_html( $category_nav[ $active_slug ]['description'] );
				}
				?>
			</p>
		</div>
	</header>

	<nav class="res-hub__chips res-container" aria-label="<?php esc_attr_e( 'Resource categories', 'qubyx' ); ?>">
		<a class="res-hub__chip" href="<?php echo esc_url( get_post_type_archive_link( 'resource' ) ); ?>">
			<span class="res-hub__chip-icon" aria-hidden="true"><?php esc_html_e( 'All', 'qubyx' ); ?></span>
			<?php esc_html_e( 'All resources', 'qubyx' ); ?>
		</a>
		<?php foreach ( $category_nav as $slug => $item ) :
			$term_link = get_term_link( $slug, 'resource_category' );
			if ( is_wp_error( $term_link ) ) {
				continue;
			}
			?>
			<a class="res-hub__chip <?php echo esc_attr( $active_slug === $slug ? 'is-active' : '' ); ?>" href="<?php echo esc_url( $term_link ); ?>">
				<span class="res-hub__chip-icon" aria-hidden="true"><?php echo esc_html( $item['icon'] ); ?></span>
				<?php echo esc_html( $item['label'] ); ?>
			</a>
		<?php endforeach; ?>
	</nav>

	<div class="res-container res-cat__main">
		<?php if ( have_posts() ) : ?>
			<div class="res-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php qubyx_render_resource_card( get_the_ID() ); ?>
				<?php endwhile; ?>
			</div>

			<div class="pagination">
				<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
			</div>
		<?php else : ?>
			<p class="res-hub__empty"><?php esc_html_e( 'No resources are published in this category yet.', 'qubyx' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/cta' ); ?>
<?php get_footer(); ?>
