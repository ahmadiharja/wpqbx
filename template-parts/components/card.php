<?php
/**
 * Generic card component.
 *
 * Args:
 *   - href, title, excerpt, image, eyebrow, meta, icon (svg name)
 *   - tone: 'default' | 'dark' | 'feature'
 *
 * @package Qubyx
 */

$args = wp_parse_args( $args ?? array(), array(
	'href'    => '',
	'title'   => '',
	'excerpt' => '',
	'image'   => '',
	'eyebrow' => '',
	'meta'    => '',
	'icon'    => '',
	'tone'    => 'default',
) );

$tag = $args['href'] ? 'a' : 'div';
$class = 'card card--' . esc_attr( $args['tone'] );
if ( $args['href'] ) {
	$class .= ' card--linked';
}
?>
<<?php echo esc_html( $tag ); ?> class="<?php echo esc_attr( $class ); ?>"<?php if ( $args['href'] ) : ?> href="<?php echo esc_url( $args['href'] ); ?>"<?php endif; ?>>

	<?php if ( $args['image'] ) : ?>
		<div class="card__media">
			<img loading="lazy" src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php echo esc_attr( $args['title'] ); ?>" />
		</div>
	<?php elseif ( $args['icon'] ) : ?>
		<div class="card__icon"><?php echo qubyx_icon( $args['icon'], 24 ); // phpcs:ignore ?></div>
	<?php endif; ?>

	<div class="card__body">
		<?php if ( $args['eyebrow'] ) : ?>
			<p class="card__eyebrow"><?php echo esc_html( $args['eyebrow'] ); ?></p>
		<?php endif; ?>

		<?php if ( $args['title'] ) : ?>
			<h3 class="card__title"><?php echo esc_html( $args['title'] ); ?></h3>
		<?php endif; ?>

		<?php if ( $args['excerpt'] ) : ?>
			<p class="card__excerpt"><?php echo esc_html( $args['excerpt'] ); ?></p>
		<?php endif; ?>

		<?php if ( $args['meta'] ) : ?>
			<p class="card__meta"><?php echo esc_html( $args['meta'] ); ?></p>
		<?php endif; ?>

		<?php if ( $args['href'] ) : ?>
			<span class="card__link" aria-hidden="true">
				<?php esc_html_e( 'Read more', 'qubyx' ); ?>
				<?php echo qubyx_icon( 'arrow-right', 14 ); // phpcs:ignore ?>
			</span>
		<?php endif; ?>
	</div>
</<?php echo esc_html( $tag ); ?>>
