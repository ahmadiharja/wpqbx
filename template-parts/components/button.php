<?php
/**
 * Button component.
 *
 * Usage:
 *   get_template_part( 'template-parts/components/button', null, array(
 *     'label'   => 'Talk to sales',
 *     'href'    => '/contact/',
 *     'variant' => 'primary', // primary|ghost|link
 *     'size'    => 'md',      // sm|md|lg
 *     'icon'    => 'arrow-right',
 *     'target'  => '',
 *   ) );
 *
 * @package Qubyx
 */

$args      = wp_parse_args( $args ?? array(), array(
	'label'   => '',
	'href'    => '#',
	'variant' => 'primary',
	'size'    => 'md',
	'icon'    => '',
	'target'  => '',
	'block'   => false,
) );

$classes = array( 'btn' );
$classes[] = 'btn--' . $args['variant'];
$classes[] = 'btn--' . $args['size'];
if ( $args['block'] ) {
	$classes[] = 'btn--block';
}

$target_attr = $args['target'] ? ' target="' . esc_attr( $args['target'] ) . '" rel="noopener"' : '';
?>
<a class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" href="<?php echo esc_url( $args['href'] ); ?>"<?php echo $target_attr; // phpcs:ignore ?>>
	<span><?php echo esc_html( $args['label'] ); ?></span>
	<?php if ( $args['icon'] ) : ?>
		<span class="btn__icon" aria-hidden="true"><?php echo qubyx_icon( $args['icon'], 14 ); // phpcs:ignore ?></span>
	<?php endif; ?>
</a>
