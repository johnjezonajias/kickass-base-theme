<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'kickass_child_config_parent_css' ) ):
    function kickass_child_config_parent_css() {
        wp_enqueue_style( 'kickass_child_config_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'kickass_child_config_parent_css', 10 );

// END ENQUEUE PARENT ACTION

if ( ! function_exists( 'kickass_child' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kickass_child() {
	// Register editor style
	add_editor_style( 'style.css' );
}
endif;
add_action( 'after_setup_theme', 'kickass_child' );

/**
 * Custom header logo
 */
add_theme_support( 'custom-logo', apply_filters( 'kickass_child_custom_logo_args', array(
	'width'       		=> 240,
	'height'      		=> 80,
	'flex-height' 		=> true,
	'flex-width'  		=> true
)));

/**
 * Register custom JS
 */
function kickass_child_register_js() {
	wp_enqueue_script( 'kickass-child-lity-script', get_stylesheet_directory_uri() . '/assets/js/lity.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'kickass-child-hoverIntent-script', get_stylesheet_directory_uri() . '/assets/js/hoverIntent.js', array('jquery'), '', true );
	wp_enqueue_script( 'kickass-child-superfish-script', get_stylesheet_directory_uri() . '/assets/js/superfish.js', array('jquery'), '', true );
	wp_enqueue_script( 'kickass-child-slidebars-script', get_stylesheet_directory_uri() . '/assets/js/slidebars.js', array('jquery'), '', true );
	wp_enqueue_script( 'kickass-child-custom-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'kickass_child_register_js', 10 );


/**
 * Register custom CSS
 */
function kickass_child_register_styles() {
	wp_enqueue_style( 'kickass-child-hamburger-style',  get_stylesheet_directory_uri() . '/assets/css/hamburgers.min.css' );
	wp_enqueue_style( 'kickass-child-superfish-style',  get_stylesheet_directory_uri() . '/assets/css/superfish.css' );
	wp_enqueue_style( 'kickass-child-superfish-vertical-style',  get_stylesheet_directory_uri() . '/assets/css/superfish-vertical.css' );
	wp_enqueue_style( 'kickass-child-lity-style',  get_stylesheet_directory_uri() . '/assets/css/lity.min.css' );
	wp_enqueue_style( 'kickass-child-slidebars-style',  get_stylesheet_directory_uri() . '/assets/css/slidebars.min.css' );
}
add_action( 'wp_enqueue_scripts', 'kickass_child_register_styles' );

/**
 * Functions to add SiteOrigin Widget framework.
 *
 * @package Kickass
 */

// Define base widget folder url.
define( 'KICKASS_WIDGET_FOLDER_URI', get_stylesheet_directory_uri() . '/inc/widgets/' );

/**
 * Add new widgets list.
 *
 * @return array
 */
function kickass_child_widgets_collection( $folders ) {

	// Get widgets folder.
	$folders[] = get_stylesheet_directory() . '/inc/widgets/';

	// Return folders list.
	return $folders;
}
add_filter( 'siteorigin_widgets_widget_folders', 'kickass_child_widgets_collection' );

/**
 * Add browser body class
 */
function kickass_child_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $is_edge;
	if( $is_lynx ) $classes[] = 'lynx';
	elseif( $is_gecko ) $classes[] = 'firefox';
	elseif( $is_opera ) $classes[] = 'opera';
	elseif( $is_NS4 ) $classes[] = 'ns4';
	elseif( $is_safari ) $classes[] = 'safari';
	elseif( $is_chrome ) $classes[] = 'chrome';
	elseif( $is_edge ) $classes[] = 'edge';
	elseif( $is_IE ) {
		$classes[] = 'ie';
		if( preg_match( '/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version )) $classes[] = 'ie'.$browser_version[1];
	} else $classes[] = 'unknown';

	if( $is_iphone ) $classes[] = 'iphone';
	if( stristr( $_SERVER['HTTP_USER_AGENT'],"mac" ) ) {
		$classes[] = 'osx';
	} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux" ) ) {
		$classes[] = 'linux';
	} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows" ) ) {
		$classes[] = 'windows';
	}
	return $classes;
}
add_filter('body_class','kickass_child_body_class');

/**
 * Custom HOOK's
 */
require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Custom Widgets
 */
register_sidebar( array(
	'name'          => esc_html__( 'Bottom Section', 'kickass' ),
	'id'            => 'bottom-section',
	'description'   => esc_html__( 'Bottom section page template.', 'kickass' ),
	'before_widget' => '<div id="bottom-section-wrapper">',
	'after_widget'  => '</div>',
	'before_title'  => '',
	'after_title'   => '',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Gallery Bottom Section', 'kickass' ),
	'id'            => 'bottom-gallery-section',
	'description'   => esc_html__( 'Gallery bottom section page template.', 'kickass' ),
	'before_widget' => '<div id="gallery-section-wrapper">',
	'after_widget'  => '</div>',
	'before_title'  => '',
	'after_title'   => '',
) );


/**
 * Custom Thumbnails
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'eteam-boxslider-thumbnail', 405, 245, true );