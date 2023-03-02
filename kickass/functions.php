<?php
/**
 * Kick Ass Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kick_Ass_Theme
 */

// Kick Ass Version
define('KICKASS_VERSION', '1.0.0');

if ( ! function_exists( 'kickass_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kickass_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kick Ass Theme, use a find and replace
	 * to change 'kickass' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kickass', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary-menu' => esc_html__( 'Main Navigation', 'kickass' )
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Register editor style
	add_editor_style( 'style.css' );
}
endif;
add_action( 'after_setup_theme', 'kickass_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kickass_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kickass_content_width', 640 );
}
add_action( 'after_setup_theme', 'kickass_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kickass_widgets_init() {

	// main sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'kickass' ),
		'id'            => 'main-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kickass' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// footer widgets
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'kickass' ),
		'id'            => 'footer-column-1',
		'description'   => esc_html__( 'Add widgets here.', 'kickass' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'kickass' ),
		'id'            => 'footer-column-2',
		'description'   => esc_html__( 'Add widgets here.', 'kickass' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'kickass' ),
		'id'            => 'footer-column-3',
		'description'   => esc_html__( 'Add widgets here.', 'kickass' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'kickass' ),
		'id'            => 'footer-column-4',
		'description'   => esc_html__( 'Add widgets here.', 'kickass' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'kickass_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kickass_scripts() {
	/* styles */
	// main css
	wp_enqueue_style( 'kickass-style', get_stylesheet_uri() );

	// inline css from custom css
	$kickass_options_css = get_option( 'kickass_custom_css_theme_options' );
	wp_add_inline_style( 'kickass-custom-style', $kickass_options_css['ka_custom_editor_box'] );

	/* scripts */
	// main js
	wp_enqueue_script( 'kickass-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), KICKASS_VERSION, true );

	// navigation
	wp_enqueue_script( 'kickass-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), KICKASS_VERSION, true );

	// accessibility
	wp_enqueue_script( 'kickass-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', false, KICKASS_VERSION, true );

	// comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// inline js from custom js
	$kickass_options_js = get_option( 'kickass_custom_js_theme_options' );
	wp_enqueue_script( 'kickass-custom-scripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), KICKASS_VERSION, true );
	wp_add_inline_script( 'kickass-custom-scripts', $kickass_options_js['ka_custom_editor_box'] );
}
add_action( 'wp_enqueue_scripts', 'kickass_scripts' );

/**
 * Enqueue styles (backend)
 */
function kickass_admin_style() {
  wp_enqueue_style( 'kickass-admin-styles', get_template_directory_uri().'/assets/css/admin.css' );
  wp_enqueue_script( 'kickass-admin-highlight', get_template_directory_uri() . '/assets/js/libraries/highlight.min.js', array('jquery'), KICKASS_VERSION, true );
  wp_enqueue_script( 'kickass-admin-js', get_template_directory_uri() . '/assets/js/admin-scripts.js', array('jquery'), KICKASS_VERSION, true );
}
add_action('admin_enqueue_scripts', 'kickass_admin_style');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * TinyMCE extended
 */
require get_template_directory() . '/inc/tinymce/eteam-list-links/list-links.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom CSS template page.
 */
require get_template_directory() . '/inc/custom-css.php';

/**
 * Custom JS template page.
 */
require get_template_directory() . '/inc/custom-js.php';

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/lib/class-tgm-plugin-activation.php';

/**
 * Register the required plugins for this theme.
 *
 *  <snip />
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function kickass_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'         => 'Advanced Custom Fields PRO',
			'slug'         => 'advanced-custom-fields-pro',
			'source'       => get_template_directory_uri() . '/inc/lib/zip/advanced-custom-fields-pro.zip',
			'required'     => false,
		),

		array(
			'name'         => 'RevSlider (slider)',
			'slug'         => 'revslider',
			'source'       => get_template_directory_uri() . '/inc/lib/zip/revslider.zip',
			'required'     => false,
		),

		array(
			'name'      => 'Page Builder by SiteOrigin',
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),

		array(
			'name'      => 'Zen Addons SiteOrigin (extras)',
			'slug'      => 'zen-addons-for-siteorigin-page-builder',
			'required'  => false,
		),

		array(
			'name'      => 'Simple Image Sizes',
			'slug'      => 'simple-image-sizes',
			'required'  => false,
		),

		array(
			'name'      => 'Duplicate Post',
			'slug'      => 'duplicate-post',
			'required'  => false,
		),

		array(
			'name'      => 'UpdraftPlus (backup module)',
			'slug'      => 'updraftplus',
			'required'  => false,
		),

		array(
			'name'      => 'Easy WP SMTP (mailer)',
			'slug'      => 'easy-wp-smtp',
			'required'  => false,
		),

		array(
			'name'      => 'White Label CMS (branding)',
			'slug'      => 'white-label-cms',
			'required'  => false,
		),

		array(
			'name'      => 'Admin Menu Editor (client GUI)',
			'slug'      => 'admin-menu-editor',
			'required'  => false,
		),

		array(
			'name'      => 'Contact Form 7 (kontakt form)',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

		array(
			'name'      => 'MailPoet (newsletters)',
			'slug'      => 'mailpoet',
			'required'  => false,
		),

		array(
			'name'      => 'WooCommerce (webshop)',
			'slug'      => 'woocommerce',
			'required'  => false,
		),

		array(
			'name'      => 'Yoast (seo module)',
			'slug'      => 'wordpress-seo',
			'required'  => false,
		),

		array(
			'name'      => 'Turn Off REST API (security module)',
			'slug'      => 'turn-off-rest-api',
			'required'  => false,
		),

		array(
			'name'         => 'Please Redirect 404 (redirector)',
			'slug'         => 'please-redirect-404',
			'source'       => get_template_directory_uri() . '/inc/lib/zip/please-redirect-404.zip',
			'required'     => false,
		),

		array(
			'name'         => 'CC Cookie Consent - Reloaded (cookie consent)',
			'slug'         => 'cc-cookie-consent',
			'source'       => get_template_directory_uri() . '/inc/lib/zip/cc-cookie-consent.zip',
			'required'     => false,
		),

		array(
			'name'         => 'Eteam Utilities (extras)',
			'slug'         => 'eteam-utilities',
			'source'       => get_template_directory_uri() . '/inc/lib/zip/eteam-utilities.zip',
			'required'     => false,
		),

		// <snip />
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => false,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}

add_action( 'tgmpa_register', 'kickass_register_required_plugins' );

/**
 * Widgets additions.
 */
if ( class_exists( 'SiteOrigin_Widget' ) ) :
	include get_template_directory() . '/inc/eteam-widgets.php';
endif;

/**
 * Prevent ODP description.
 * 
 * @since 1.0.1
 */
function kickass_prevent_odp_description() {
    echo '<meta name="robots" content="noodp">';
}
add_action( 'wp_head', 'kickass_prevent_odp_description' );

/**
 * Generates temporary meta description.
 * 
 * @since 1.0.1
 */
function kickass_generates_temp_description() {
    global $post;
    $post_type = get_post_type( $post );
    if ( $post_type == "page" ) {
        $desc = get_post_meta( $post->ID, '_yoast_wpseo_metadesc', true ); 
        if( $desc == "" ) {
            if ( has_excerpt( $post->ID ) ) {
                $desc = $post->post_excerpt;
            } else {
                $desc = trim( strip_tags( strip_shortcodes( $post->post_content ) ) );
                $desc = substr( $desc, 0, 155 ); 
            }
            echo '<meta name="description" content="'.$desc.'">';
        }
    }
}
add_action( 'wp_head', 'kickass_generates_temp_description' );