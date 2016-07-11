<?php
/**
 * Liberty functions and definitions
 *
 * @package Liberty
 */

if ( ! function_exists( 'liberty_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function liberty_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Liberty, use a find and replace
	 * to change 'liberty' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'liberty', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/* Add support for editor styles */
	add_editor_style( array( 'editor-style.css', liberty_fonts_url() ) );

	add_theme_support( 'custom-logo', array(
		'height'      => 300,
		'width'       => 300,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'liberty' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'liberty_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );
}
endif; // liberty_setup
add_action( 'after_setup_theme', 'liberty_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function liberty_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'liberty_content_width', 739 );
}
add_action( 'after_setup_theme', 'liberty_content_width', 0 );

/*
 * Adjust $content_width for full-width page template
 */

if ( ! function_exists( 'liberty_content_width' ) ) :

function liberty_content_width() {
	global $content_width;

	if ( is_page_template( 'fullwidth-page.php' ) ) {
		$content_width = 1088; //pixels
	}
}
add_action( 'template_redirect', 'liberty_content_width' );

endif; // if ! function_exists( 'liberty_content_width' )

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function liberty_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function liberty_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'liberty' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 1', 'liberty' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 2', 'liberty' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 3', 'liberty' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'liberty_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function liberty_scripts() {
	wp_enqueue_style( 'liberty-style', get_stylesheet_uri() );

	wp_enqueue_style( 'liberty-fonts', liberty_fonts_url(), array(), null );

	wp_enqueue_script( 'liberty-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '20150623', true );

	$adminbar = is_admin_bar_showing();
	wp_localize_script( 'liberty-script', 'libertyadminbar', array( $adminbar ) );

	wp_enqueue_script( 'liberty-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'liberty-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'liberty_scripts' );

/**
 * Register Google Fonts
 */
function liberty_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Roboto Slab, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto_slab = esc_html_x( 'on', 'Roboto Slab font: on or off', 'liberty' );

	/* Translators: If there are characters in your language that are not
	 * supported by Lora; translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto_mono = esc_html_x( 'on', 'Roboto Mono font: on or off', 'liberty' );

	if ( 'off' !== $roboto_slab || 'off' !== $roboto_mono ) {

		$font_families = array();

		if ( 'off' !== $roboto_slab ) {
			$font_families[] = 'Roboto Slab:300,400,700';
		}

		if ( 'off' !== $roboto_mono ) {
			$font_families[] = 'Roboto Mono:300,300i,400,400i,500,500i,700,700i';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue Google Fonts for custom headers
 */
function liberty_admin_scripts( $hook_suffix ) {

	wp_enqueue_style( 'liberty-fonts', liberty_fonts_url(), array(), null );

}
add_action( 'admin_print_styles-appearance_page_custom-header', 'liberty_admin_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
