<?php
/**
 * Comparison table.
 *
 * @package Qubyx
 */

$intro   = qubyx_field( 'comparison_intro', __( 'How a managed QUBYX program compares with manual QA and generic calibration utilities.', 'qubyx' ) );
$columns = qubyx_field( 'comparison_columns', array(
	array( 'name' => __( 'Manual QA', 'qubyx' ),  'highlight' => false ),
	array( 'name' => __( 'Generic utility', 'qubyx' ), 'highlight' => false ),
	array( 'name' => __( 'QUBYX platform', 'qubyx' ), 'highlight' => true ),
) );
$rows = qubyx_field( 'comparison_rows', array(
	array( 'feature' => __( 'Standards-oriented workflow', 'qubyx' ), 'values' => array( array( 'value' => '-' ), array( 'value' => __( 'Partial', 'qubyx' ) ), array( 'value' => __( 'Full', 'qubyx' ) ) ) ),
	array( 'feature' => __( 'Automated scheduling', 'qubyx' ),        'values' => array( array( 'value' => '-' ), array( 'value' => '-' ),               array( 'value' => __( 'Yes', 'qubyx' ) ) ) ),
	array( 'feature' => __( 'Remote fleet management', 'qubyx' ),     'values' => array( array( 'value' => '-' ), array( 'value' => '-' ),               array( 'value' => __( 'Yes', 'qubyx' ) ) ) ),
	array( 'feature' => __( 'Audit-ready reports', 'qubyx' ),         'values' => array( array( 'value' => __( 'Manual', 'qubyx' ) ), array( 'value' => __( 'Basic', 'qubyx' ) ), array( 'value' => __( 'Structured', 'qubyx' ) ) ) ),
	array( 'feature' => __( 'Enterprise purchasing path', 'qubyx' ),  'values' => array( array( 'value' => '-' ), array( 'value' => '-' ),               array( 'value' => __( 'Yes', 'qubyx' ) ) ) ),
) );
?>
<section class="section section--compare">
	<div class="container">
		<header class="section__header">
			<p class="eyebrow"><?php esc_html_e( 'Comparison', 'qubyx' ); ?></p>
			<h2 class="section__title">
				<?php esc_html_e( 'Why teams move from', 'qubyx' ); ?>
				<span class="accent"><?php esc_html_e( 'tools to programs.', 'qubyx' ); ?></span>
			</h2>
			<p class="section__lede"><?php echo esc_html( $intro ); ?></p>
		</header>

		<div class="compare">
			<div class="compare__head">
				<div class="compare__cell compare__cell--label">&nbsp;</div>
				<?php foreach ( $columns as $col ) :
					$is_hl = ! empty( $col['highlight'] );
					?>
					<div class="compare__cell compare__cell--col <?php echo $is_hl ? 'is-highlight' : ''; ?>">
						<?php echo esc_html( $col['name'] ); ?>
					</div>
				<?php endforeach; ?>
			</div>

			<?php foreach ( $rows as $row ) : ?>
				<div class="compare__row">
					<div class="compare__cell compare__cell--label"><?php echo esc_html( $row['feature'] ); ?></div>
					<?php foreach ( $row['values'] as $i => $v ) :
						$is_hl = ! empty( $columns[ $i ]['highlight'] );
						$val   = $v['value'] ?? '';
						$is_check_like = in_array( strtolower( $val ), array( 'yes', 'full', 'certified', 'structured' ), true );
						?>
						<div class="compare__cell <?php echo $is_hl ? 'is-highlight' : ''; ?>">
							<?php if ( $is_check_like ) : ?>
								<span class="compare__check"><?php echo qubyx_icon( 'check', 14 ); // phpcs:ignore ?> <?php echo esc_html( $val ); ?></span>
							<?php elseif ( '-' === $val ) : ?>
								<span class="compare__dash">-</span>
							<?php else : ?>
								<?php echo esc_html( $val ); ?>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
