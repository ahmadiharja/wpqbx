<?php
/**
 * Helper functions used across templates.
 *
 * @package Qubyx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Safe ACF field reader with fallback.
 *
 * @param string $key      ACF field name.
 * @param mixed  $fallback Returned when ACF inactive or value is empty.
 * @param int|null $post_id Optional post ID.
 * @return mixed
 */
function qubyx_field( $key, $fallback = '', $post_id = null ) {
	$post_id = $post_id ?: get_the_ID();

	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $key, $post_id );
		if ( ! empty( $value ) || 0 === $value || '0' === $value ) {
			return $value;
		}
	}

	if ( $post_id ) {
		$value = get_post_meta( $post_id, $key, true );
		if ( ! empty( $value ) || 0 === $value || '0' === $value ) {
			return $value;
		}
	}

	return $fallback;
}

/**
 * Render a CTA link array from ACF.
 *
 * @param array  $link     ACF link field (url/title/target).
 * @param string $variant  Button variant.
 * @param string $fallback_label Optional fallback label.
 */
function qubyx_render_link( $link, $variant = 'btn--primary', $fallback_label = '' ) {
	if ( ! $link || ! is_array( $link ) ) {
		if ( $fallback_label ) {
			echo '<a class="btn ' . esc_attr( $variant ) . '" href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html( $fallback_label ) . '</a>';
		}
		return;
	}
	$url    = isset( $link['url'] )    ? $link['url']    : '#';
	$title  = isset( $link['title'] )  ? $link['title']  : $fallback_label;
	$target = isset( $link['target'] ) ? $link['target'] : '';

	printf(
		'<a class="btn %1$s" href="%2$s"%3$s>%4$s</a>',
		esc_attr( $variant ),
		esc_url( $url ),
		$target ? ' target="' . esc_attr( $target ) . '" rel="noopener"' : '',
		esc_html( $title )
	);
}

/**
 * Reading time calculator.
 */
function qubyx_reading_time( $post_id = null ) {
	$override = qubyx_field( 'reading_time', 0, $post_id );
	if ( $override ) {
		return (int) $override;
	}
	$content = get_post_field( 'post_content', $post_id ?: get_the_ID() );
	$words   = str_word_count( wp_strip_all_tags( (string) $content ) );
	return max( 1, (int) ceil( $words / 220 ) );
}

/**
 * Return the main resource taxonomy term for labels and layout decisions.
 */
function qubyx_get_resource_primary_term( $post_id = null ) {
	$post_id = $post_id ?: get_the_ID();
	$terms   = get_the_terms( $post_id, 'resource_category' );

	if ( ! $terms || is_wp_error( $terms ) ) {
		return null;
	}

	$priority = array( 'product-updates', 'news', 'blog', 'case-studies', 'guides', 'compliance', 'technical-notes' );
	usort(
		$terms,
		function ( $a, $b ) use ( $priority ) {
			$ai = array_search( $a->slug, $priority, true );
			$bi = array_search( $b->slug, $priority, true );
			$ai = false === $ai ? 99 : $ai;
			$bi = false === $bi ? 99 : $bi;
			return $ai <=> $bi;
		}
	);

	return $terms[0];
}

/**
 * Pick a resource article layout from metadata, with category fallback.
 */
function qubyx_get_resource_layout( $post_id = null ) {
	$post_id = $post_id ?: get_the_ID();
	$layout  = qubyx_field( 'resource_layout', '', $post_id );

	if ( in_array( $layout, array( 'guide', 'news', 'blog' ), true ) ) {
		return $layout;
	}

	$term = qubyx_get_resource_primary_term( $post_id );
	if ( $term && in_array( $term->slug, array( 'news', 'product-updates' ), true ) ) {
		return 'news';
	}

	if ( $term && 'blog' === $term->slug ) {
		return 'blog';
	}

	return 'guide';
}

/**
 * Resource category navigation model used by archive templates and nav copy.
 */
function qubyx_get_resource_category_nav() {
	return array(
		'guides'            => array( 'label' => __( 'Guides', 'qubyx' ), 'icon' => 'GT', 'description' => __( 'Long-form playbooks for calibration and QA workflows.', 'qubyx' ) ),
		'compliance'        => array( 'label' => __( 'Compliance', 'qubyx' ), 'icon' => 'ST', 'description' => __( 'Standards explainers and audit-ready evidence paths.', 'qubyx' ) ),
		'technical-notes'   => array( 'label' => __( 'Technical Notes', 'qubyx' ), 'icon' => 'TN', 'description' => __( 'Engineering notes on sensors, drift, and measurement.', 'qubyx' ) ),
		'case-studies'      => array( 'label' => __( 'Case Studies', 'qubyx' ), 'icon' => 'CS', 'description' => __( 'Customer deployment stories and outcomes.', 'qubyx' ) ),
		'news'              => array( 'label' => __( 'News', 'qubyx' ), 'icon' => 'NW', 'description' => __( 'Company announcements and press updates.', 'qubyx' ) ),
		'product-updates'   => array( 'label' => __( 'Product Updates', 'qubyx' ), 'icon' => 'UP', 'description' => __( 'Release notes and product improvements.', 'qubyx' ) ),
		'blog'              => array( 'label' => __( 'Blog', 'qubyx' ), 'icon' => 'BL', 'description' => __( 'Opinions and calibration market commentary.', 'qubyx' ) ),
	);
}

/**
 * Render one compact resource card.
 */
function qubyx_render_resource_card( $post_id = null, $heading_level = 3 ) {
	$post_id = $post_id ?: get_the_ID();
	$term    = qubyx_get_resource_primary_term( $post_id );
	$slug    = $term ? $term->slug : 'guides';
	$label   = $term ? $term->name : __( 'Resource', 'qubyx' );
	$reading = qubyx_reading_time( $post_id );
	$tag     = 'h' . max( 2, min( 4, (int) $heading_level ) );
	?>
	<a class="res-card res-card--<?php echo esc_attr( $slug ); ?>" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
		<div class="res-card__image">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<?php echo get_the_post_thumbnail( $post_id, 'qubyx-card', array( 'loading' => 'lazy' ) ); ?>
			<?php endif; ?>
		</div>
		<div class="res-card__body">
			<p class="res-card__meta">
				<?php echo esc_html( $label ); ?>
				<span class="dot" aria-hidden="true"></span>
				<?php echo esc_html( sprintf( /* translators: %d: minutes */ __( '%d min read', 'qubyx' ), $reading ) ); ?>
			</p>
			<<?php echo esc_html( $tag ); ?>><?php echo esc_html( get_the_title( $post_id ) ); ?></<?php echo esc_html( $tag ); ?>>
			<p><?php echo esc_html( get_the_excerpt( $post_id ) ); ?></p>
		</div>
	</a>
	<?php
}

/**
 * Output an inline SVG icon from a small built-in library.
 * Keeps the bundle tiny and avoids icon-font requests.
 */
function qubyx_icon( $name, $size = 20, $attrs = '' ) {
	$icons = array(
		'arrow-right' => '<path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="1.75" fill="none" stroke-linecap="round" stroke-linejoin="round"/>',
		'check'       => '<path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>',
		'shield'      => '<path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linejoin="round"/><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>',
		'gauge'       => '<path d="M12 2a10 10 0 1 0 7.07 17.07" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/><path d="M12 12l5-5" stroke="currentColor" stroke-width="1.75" fill="none" stroke-linecap="round"/>',
		'bolt'        => '<path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linejoin="round"/>',
		'globe'       => '<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18" stroke="currentColor" stroke-width="1.5" fill="none"/>',
		'plug'        => '<path d="M9 7V3M15 7V3M6 11h12v3a6 6 0 0 1-12 0v-3zM12 20v3" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>',
		'sparkles'    => '<path d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3zM19 14l.7 2.1L22 17l-2.3.9L19 20l-.7-2.1L16 17l2.3-.9L19 14z" stroke="currentColor" stroke-width="1.25" fill="none" stroke-linejoin="round"/>',
		'play'        => '<path d="M6 4l14 8-14 8V4z" stroke="currentColor" stroke-width="1.5" fill="currentColor"/>',
		'plus'        => '<path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.75" fill="none" stroke-linecap="round"/>',
		'minus'       => '<path d="M5 12h14" stroke="currentColor" stroke-width="1.75" fill="none" stroke-linecap="round"/>',
	);

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}
	return sprintf(
		'<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" %2$s>%3$s</svg>',
		(int) $size,
		$attrs,
		$icons[ $name ]
	);
}

/**
 * Print breadcrumb-friendly post URL paths.
 */
function qubyx_get_breadcrumb_trail() {
	$trail = array();
	$trail[] = array( 'label' => __( 'Home', 'qubyx' ), 'url' => home_url( '/' ) );

	if ( is_singular( 'product' ) ) {
		$trail[] = array( 'label' => __( 'Products', 'qubyx' ), 'url' => get_post_type_archive_link( 'product' ) );
		$trail[] = array( 'label' => get_the_title(), 'url' => '' );
	} elseif ( is_singular( 'resource' ) ) {
		$trail[] = array( 'label' => __( 'Resources', 'qubyx' ), 'url' => get_post_type_archive_link( 'resource' ) );
		$trail[] = array( 'label' => get_the_title(), 'url' => '' );
	} elseif ( is_singular( 'post' ) ) {
		$trail[] = array( 'label' => __( 'Journal', 'qubyx' ), 'url' => home_url( '/blog/' ) );
		$trail[] = array( 'label' => get_the_title(), 'url' => '' );
	} elseif ( is_page() ) {
		$trail[] = array( 'label' => get_the_title(), 'url' => '' );
	} elseif ( is_post_type_archive( 'product' ) ) {
		$trail[] = array( 'label' => __( 'Products', 'qubyx' ), 'url' => '' );
	} elseif ( is_post_type_archive( 'resource' ) ) {
		$trail[] = array( 'label' => __( 'Resources', 'qubyx' ), 'url' => '' );
	} elseif ( is_archive() ) {
		$trail[] = array( 'label' => get_the_archive_title(), 'url' => '' );
	}

	return $trail;
}

/**
 * Comment count formatter.
 */
function qubyx_excerpt_more( $more ) {
	return ' ...';
}
add_filter( 'excerpt_more', 'qubyx_excerpt_more' );

/**
 * Limit excerpt length.
 */
function qubyx_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'qubyx_excerpt_length', 999 );
