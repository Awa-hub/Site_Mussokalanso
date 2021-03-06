<?php
/**
 * Enqueue scripts and styles.
 */
function batiment_scripts() {
	//register style
	wp_enqueue_style( 'boostrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css' );	
	wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() .'/assets/css/all.min.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css');
	wp_enqueue_style( 'flaticon', get_template_directory_uri() .'/assets/css/flaticon.css');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/assets/css/owl.carousel.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() .'/assets/css/slick.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/assets/css/magnific-popup.css');
	wp_enqueue_style( 'type-writter', get_template_directory_uri() .'/assets/css/type-writter.css');
	wp_enqueue_style( 'batiment-style-default', get_template_directory_uri() .'/assets/css/default.css' );
	wp_enqueue_style( 'batiment-style-responsive', get_template_directory_uri() .'/assets/css/responsive.css' );
	wp_enqueue_style( 'batiment-style', get_stylesheet_uri() );	
	//register scripts
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '20151215', true );	
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'batiment-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '20151215', true );
	if ( is_page_template( 'page-single.php' ) ) {
	wp_enqueue_script( 'jquery-nav', get_template_directory_uri() . '/assets/js/jquery.nav.js', array('jquery'), '20151215', true );
	}
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'batiment-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'batiment-type-writter', get_template_directory_uri() . '/assets/js/type.writter.js', array('jquery'), '20151215', true );	
	wp_enqueue_script('batiment-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '201513434', true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
	add_action( 'wp_enqueue_scripts', 'batiment_scripts' );

	add_action( 'wp_enqueue_scripts', 'batiment_rtl_scripts', 1500 );
	if ( !function_exists( 'batiment_rtl_scripts' ) ) {
		function batiment_rtl_scripts() {
			
			// RTL
			if ( is_rtl() ) {
				wp_enqueue_style( 'batiment-rtl', get_template_directory_uri() . '/assets/css/rtl.css', array(), 1.0 );
			}
			
			
		}
	}
	
	add_action( 'admin_enqueue_scripts', 'batiment_load_admin_styles' );
	function batiment_load_admin_styles() {
		wp_enqueue_style( 'batiment-admin-css', get_template_directory_uri() . '/assets/css/admin-style.css', true, '1.0.0' );
		wp_enqueue_script( 'batiment-admin-script', get_template_directory_uri() . '/assets/js/admin-script.js', array('jquery'), '20151215', true );
		
	}  
?>
