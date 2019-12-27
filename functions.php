<?php
/**
 * OnPoint functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OnPoint
 */


// OnPoint Constants
define('ONPOINT_THEME',get_template_directory());
define('ONPOINT_THEME_URI',get_template_directory_uri());


if ( ! function_exists( 'onpoint_setup' ) ) :

	function onpoint_setup() {

		load_theme_textdomain( 'onpoint', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );


		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'onpoint' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );


		add_theme_support( 'custom-background', apply_filters( 'onpoint_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );


		add_theme_support( 'customize-selective-refresh-widgets' );


		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'onpoint_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onpoint_content_width() {
	
	$GLOBALS['content_width'] = apply_filters( 'onpoint_content_width', 640 );
}
add_action( 'after_setup_theme', 'onpoint_content_width', 0 );


function onpoint_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'onpoint' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'onpoint' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Ad Space', 'onpoint' ),
		'id'            => 'adspace-1',
		'description'   => esc_html__( 'Add Advertisement here.', 'onpoint' ),
	) );
}
add_action( 'widgets_init', 'onpoint_widgets_init' );

function onpoint_scripts() {
	wp_enqueue_style( 'onpoint-style', get_stylesheet_uri() );

	wp_enqueue_script( 'onpoint-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'onpoint-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'onpoint_scripts' );


require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load Theme Files 
require ONPOINT_THEME . '/inc/enqueue.php';

require ONPOINT_THEME . '/theme-functions/theme-functions.php';

require ONPOINT_THEME . '/woocommerce/woocommerce.php';
require ONPOINT_THEME . '/vc_templates/vc_init.php';


// Theme Options 
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) .
 '/theme-options/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/theme-options/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . 
'/theme-options/onpoint/config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/theme-options/onpoint/config.php' );
}

require ONPOINT_THEME . '/inc/dynamic-styles.php';