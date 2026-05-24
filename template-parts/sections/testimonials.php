<?php
/**
 * Testimonials section.
 *
 * @package Qubyx
 */

$testimonials = qubyx_field( 'testimonials', array(
	array(
		'quote' => __( 'QUBYX gives our team a repeatable way to document display quality instead of chasing manual spreadsheets.', 'qubyx' ),
		'name'  => __( 'Medical Physics Lead', 'qubyx' ),
		'title' => __( 'Multi-site imaging network', 'qubyx' ),
	),
	array(
		'quote' => __( 'Remote scheduling and reporting are the difference between reactive QA and a managed display program.', 'qubyx' ),
		'name'  => __( 'Enterprise PACS Administrator', 'qubyx' ),
		'title' => __( 'Hospital IT operations', 'qubyx' ),
	),
	array(
		'quote' => __( 'For color work, the value is simple: fewer surprises between the monitor, the client, and delivery.', 'qubyx' ),
		'name'  => __( 'Studio Technical Director', 'qubyx' ),
		'title' => __( 'Post-production facility', 'qubyx' ),
	),
) );
?>
<section class="section section--testimonials">
	<div class="container">
		<header class="section__header">
			<p class="eyebrow"><?php esc_html_e( 'Enterprise proof', 'qubyx' ); ?></p>
			<h2 class="section__title">
				<?php esc_html_e( 'Built for teams that need', 'qubyx' ); ?>
				<span class="accent"><?php esc_html_e( 'evidence, not guesswork.', 'qubyx' ); ?></span>
			</h2>
		</header>

		<div class="quotes">
			<?php foreach ( $testimonials as $i => $t ) :
				$initial = strtoupper( mb_substr( $t['name'], 0, 1 ) );
				?>
				<figure class="quote <?php echo 1 === $i ? 'quote--feature' : ''; ?>">
					<blockquote>
						<p>&ldquo;<?php echo esc_html( $t['quote'] ); ?>&rdquo;</p>
					</blockquote>
					<figcaption>
						<span class="quote__avatar" aria-hidden="true"><?php echo esc_html( $initial ); ?></span>
						<span class="quote__person">
							<strong><?php echo esc_html( $t['name'] ); ?></strong>
							<span class="quote__title"><?php echo esc_html( $t['title'] ); ?></span>
						</span>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>
