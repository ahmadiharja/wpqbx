<?php
/**
 * Breadcrumb component (with schema.org markup).
 *
 * @package Qubyx
 */

$trail = qubyx_get_breadcrumb_trail();
if ( count( $trail ) < 2 ) {
	return;
}
?>
<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'qubyx' ); ?>" itemscope itemtype="https://schema.org/BreadcrumbList">
	<ol>
		<?php foreach ( $trail as $index => $crumb ) :
			$position = $index + 1;
		?>
			<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<?php if ( ! empty( $crumb['url'] ) ) : ?>
					<a itemprop="item" href="<?php echo esc_url( $crumb['url'] ); ?>"><span itemprop="name"><?php echo esc_html( $crumb['label'] ); ?></span></a>
				<?php else : ?>
					<span itemprop="name" aria-current="page"><?php echo esc_html( $crumb['label'] ); ?></span>
				<?php endif; ?>
				<meta itemprop="position" content="<?php echo esc_attr( $position ); ?>" />
				<?php if ( $index < count( $trail ) - 1 ) : ?>
					<span class="breadcrumb__sep" aria-hidden="true">/</span>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ol>
</nav>
