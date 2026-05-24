<?php
/**
 * Single post (blog).
 *
 * @package Qubyx
 */

get_header();
while ( have_posts() ) : the_post();
	$reading = qubyx_reading_time();
	?>

	<section class="section section--article-header">
		<div class="container container--narrow">
			<?php get_template_part( 'template-parts/components/breadcrumb' ); ?>
			<p class="mono article__meta">
				<?php echo esc_html( get_the_date() ); ?>
				<span aria-hidden="true">·</span>
				<?php echo esc_html( sprintf( /* translators: %d minutes */ __( '%d min read', 'qubyx' ), $reading ) ); ?>
			</p>
			<h1 class="h-display"><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="article__lede"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="article__hero-media container container--wide">
			<?php the_post_thumbnail( 'qubyx-hero', array( 'loading' => 'eager' ) ); ?>
		</div>
	<?php endif; ?>

	<section class="section section--article-body">
		<div class="container container--narrow">
			<article class="prose">
				<?php the_content(); ?>
				<?php wp_link_pages( array(
					'before' => '<div class="page-links"><span>' . __( 'Pages:', 'qubyx' ) . '</span>',
					'after'  => '</div>',
				) ); ?>
			</article>

			<footer class="article__footer">
				<p class="mono"><?php esc_html_e( 'Filed under', 'qubyx' ); ?></p>
				<div class="article__tags"><?php the_category( ' ' ); the_tags( ' ', ' ' ); ?></div>
			</footer>
		</div>
	</section>

<?php endwhile; ?>

<?php get_template_part( 'template-parts/sections/cta' ); ?>
<?php get_footer();
