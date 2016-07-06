<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Liberty
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function liberty_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'render'         => 'liberty_infinite_scroll_render',
		'footer'         => 'masthead',
		'footer_widgets' => array( 'footer-1', 'footer-2', 'footer-3' ),
	) );

	add_theme_support( 'jetpack-responsive-videos' );

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'liberty-site-logo', '300', '300' );

	add_theme_support( 'site-logo', array( 'size' => 'liberty-site-logo' ) );

} // end function liberty_jetpack_setup
add_action( 'after_setup_theme', 'liberty_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function liberty_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function liberty_infinite_scroll_render
