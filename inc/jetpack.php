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

/** Load the script with the `post-load` event listener.
 * jQuery is required to catch this event.
 */
if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
	function liberty_jetpack_script() {
		wp_enqueue_script( 'liberty-jetpack-script', get_template_directory_uri() . '/js/jetpack.js', array( 'jquery' ), '1.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'liberty_jetpack_script' );
}
