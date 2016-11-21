<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Liberty
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function liberty_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// If there is no author bio available, add a class to better style the page title
	if ( is_author() && ! get_the_author_meta( 'description' ) ) {
		$classes[] = 'no-taxonomy-description';
	}

	// If there is no taxonomy description, add a class to better style the page title
	if ( ! is_author() && is_archive() && ! get_the_archive_description() || is_search() ) {
		$classes[] = 'no-taxonomy-description';
	}

	if ( is_singular() ) {
		$classes[] = 'singular';
	}

	return $classes;
}
add_filter( 'body_class', 'liberty_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function liberty_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'liberty_pingback_header' );

/*
 * Filters the Categories archive widget to add a span around the post count
 */

function liberty_cat_count_span( $links ) {
	$links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return $links;
}
add_filter( 'wp_list_categories', 'liberty_cat_count_span' );

/*
 * Add a span around the post count in the Archives widget
 */

function liberty_archive_count_span( $links ) {
	$links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return $links;
}
add_filter( 'get_archives_link', 'liberty_archive_count_span' );

if ( ! function_exists( 'liberty_continue_reading_link' ) ) :
/**
 * Returns an ellipsis and "Continue reading" plus off-screen title link for excerpts
 */
function liberty_continue_reading_link() {
	return '&hellip; <a class="more-link" href="'. esc_url( get_permalink() ) . '">' . sprintf( wp_kses_post( __( 'Continue reading <span class="screen-reader-text">%1$s</span> <span class="meta-nav" aria-hidden="true">&rarr;</span>', 'liberty' ) ), esc_attr( strip_tags( get_the_title() ) ) ) . '</a>';
}
endif; // liberty_continue_reading_link


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with liberty_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function liberty_auto_excerpt_more( $more ) {
	return liberty_continue_reading_link();
}
add_filter( 'excerpt_more', 'liberty_auto_excerpt_more' );


/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function liberty_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= liberty_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'liberty_custom_excerpt_more' );

/**
 * Add preconnect for Google Fonts.
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function liberty_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'liberty-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'liberty_resource_hints', 10, 2 );
