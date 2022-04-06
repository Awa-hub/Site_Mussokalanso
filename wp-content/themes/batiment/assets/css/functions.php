<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */
if ( ! function_exists( 'batiment_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */ 

 
function batiment_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on batiment, use a find and replace
	 * to change 'batiment' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'batiment', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );	
	
	function batiment_custom_excerpt_length( $length ) {
		return 20;
	}	
	add_filter( 'excerpt_length', 'batiment_custom_excerpt_length', 999 );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'batiment' ),
		'menu-2' => esc_html__( 'Single Template Primary Menu', 'batiment' ),
		'menu-3' => esc_html__( 'Left Menu (Header)', 'batiment' ),
		'menu-4' => esc_html__( 'Right Menu (Header)', 'batiment' ),
		'menu-5' => esc_html__( 'Footer Menu', 'batiment' ),
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
	add_theme_support( 'custom-background', apply_filters( 'batiment_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'batiment_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function batiment_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'batiment_content_width', 640 );
}
add_action( 'after_setup_theme', 'batiment_content_width', 0 );

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 *  Enqueue scripts and styles.
 */
require_once get_template_directory() . '/inc/template-scripts.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-sidebar.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';



// TGM Plugin Activation
if (is_admin()) {
	require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/framework/tgm-config.php';	
}


/**
 * Implement widgets
 */
require_once get_template_directory() . '/framework/widgets/rs_recent_widget.php';
require_once get_template_directory() . '/framework/widgets/rs_contact.php';

/**
 * Custom Style
 */

require_once get_template_directory() . '/framework/custom.php';


/**
 * Redux frameworks additions
 */

require_once get_template_directory() . '/libs/theme-option/config.php';


/**
||-> add_image_size //Resize images
*/
/* ========= RESIZE IMAGES ===================================== */

add_image_size( 'batiment_blog_slider_pic',  367, 426, true );




//remove revolution slid metabox

function batiment_remove_revolution_slider_meta_boxes() {
	
	remove_meta_box( 'mymetabox_revslider_0', 'client', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'portfolios', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'teams', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
}

add_action( 'do_meta_boxes', 'batiment_remove_revolution_slider_meta_boxes' );	


//----------------------------------------------------------------------
// Remove Redux Framework NewsFlash
//----------------------------------------------------------------------
if ( ! class_exists( 'reduxNewsflash' ) ):
    class reduxNewsflash {
        public function __construct( $parent, $params ) {

        }
    }
endif;

function batiment_removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'batiment_removeDemoModeLink');


/**
 * Registers an editor stylesheet for the theme.
 */
function batiment_theme_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'batiment_theme_add_editor_styles' );

//woocommerce support added

add_theme_support( 'woocommerce' );

//------------------------------------------------------------------------
//Organize Comments form field
//-----------------------------------------------------------------------
function batiment_wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'batiment_wpb_move_comment_field_to_bottom' );

