<?php
/**
 * ribalta-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ribalta-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ribalta_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ribalta-theme, use a find and replace
		* to change 'ribalta-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ribalta-theme', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ribalta-theme' ),
			'menu-2' => esc_html__( 'Secondary', 'ribalta-theme' ),
			'menu-3' => esc_html__( 'Extended', 'ribalta-theme' ),
		)
	);
	

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ribalta_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ribalta_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ribalta_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ribalta_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'ribalta_theme_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function ribalta_theme_scripts() {
	wp_enqueue_style( 'ribalta-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'ribalta-theme-custom-style', get_template_directory_uri() . '/dist/css/style.css', array(), _S_VERSION );
	wp_enqueue_script( 'ribalta-theme-nav', get_template_directory_uri() . '/js/nav.js', array('jquery'), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'ribalta_theme_scripts' );

function custom_admin_styles() {
    wp_enqueue_style('admin-styles', get_template_directory_uri() . '/admin-assets/admin-style.css');
}

add_action('admin_enqueue_scripts', 'custom_admin_styles');

function custom_editor_color_palette() {
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => 'Color 1',
            'slug'  => 'color-1',
            'color' => '#785013',
        ),
        array(
            'name'  => 'Color 2',
            'slug'  => 'color-2',
            'color' => '#494033',
        ),
        array(
            'name'  => 'Color 3',
            'slug'  => 'color-3',
            'color' => '#EDE1D0',
        ),
        array(
            'name'  => 'Color 4',
            'slug'  => 'color-4',
            'color' => '#CAB089',
        ),
        array(
            'name'  => 'Color 5',
            'slug'  => 'color-5',
            'color' => '#E39D5D',
        ),
        array(
            'name'  => 'Color 6',
            'slug'  => 'color-6',
            'color' => '#252525',
        ),
        array(
            'name'  => 'Color 7',
            'slug'  => 'color-7',
            'color' => '#817F7F',
        ),
        array(
            'name'  => 'Color 8',
            'slug'  => 'color-8',
            'color' => '#fafafa',
        ),
    ));
}
add_action('after_setup_theme', 'custom_editor_color_palette');

function add_page_slug_to_body_class($classes) {
    global $post;

    if (is_singular() && $post) {
        $classes[] = 'page-slug-' . $post->post_name;
    }

    return $classes;
}
add_filter('body_class', 'add_page_slug_to_body_class');

function custom_post_type_spettacoli() {
    $labels = array(
        'name' => 'Spettacoli',
        'singular_name' => 'Spettacolo',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'spettacoli'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('spettacoli', $args);
}
add_action('init', 'custom_post_type_spettacoli');

function custom_post_type_compagnia() {
    $labels = array(
        'name' => 'Compagnia',
        'singular_name' => 'Compagnia',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'compagnia'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('compagnia', $args);
}
add_action('init', 'custom_post_type_compagnia');

function custom_post_type_collaborazioni() {
    $labels = array(
        'name' => 'Collaborazioni',
        'singular_name' => 'Collaborazioni',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'collaborazioni'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('collaborazioni', $args);
}
add_action('init', 'custom_post_type_collaborazioni');

