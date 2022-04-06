<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function batiment_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'batiment_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function batiment_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

add_action( 'wp_head', 'batiment_pingback_header' );

/*
Register Fonts theme google font
*/
function batiment_studio_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'batiment' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Poppins|Lato
:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*
Enqueue scripts and styles.
*/
function batiment_studio_scripts() {
    wp_enqueue_style( 'studio-fonts', batiment_studio_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'batiment_studio_scripts' );


//Favicon Icon
function batiment_site_icon() {
 if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {     
  	global $rs_option;
  	 
  	if(!empty($rs_option['rs_favicon']['url']))
  	{?>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(($rs_option['rs_favicon']['url'])); ?>">	

 	<?php 
 		}
	}
}
add_filter('wp_head', 'batiment_site_icon');


//demo content file include here

function batiment_import_files() {
  return array(
    array(
      'import_file_name'           => 'RS Demo Import',
      'categories'                 => array( 'Category 1' ),
      'import_file_url'            => trailingslashit( get_template_directory_uri() ) . 'ocdi/batiment.wordpress.xml',
      'import_widget_file_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/batiment-widgets.wie',      
      'import_redux'               => array(
        array(
          'file_url'    => trailingslashit( get_template_directory_uri() ) . 'ocdi/redux_options_batiment.json',
          'option_name' => 'rs_option',
        ),
      ),
      
      'import_notice'              => __( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'batiment' ),
      
    ),
    
  );
}

add_filter( 'pt-ocdi/import_files', 'batiment_import_files' );

function batiment_after_import_setup() {
  // Assign menus to their locations.
  $main_menu  = get_term_by( 'name', 'Main Menu', 'nav_menu' );
  $main_menu2 = get_term_by( 'name', 'One Page Menu', 'nav_menu' );
  $main_menu3 = get_term_by( 'name', 'Menu Left', 'nav_menu' );
  $main_menu4 = get_term_by( 'name', 'Menu Right', 'nav_menu' );
  $main_menu5 = get_term_by( 'name', 'Footer Menu', 'nav_menu' );   
  set_theme_mod( 'nav_menu_locations', array(
      'menu-1' => $main_menu->term_id,  
      'menu-2' => $main_menu2->term_id,
      'menu-3' => $main_menu3->term_id,
      'menu-4' => $main_menu4->term_id,
      'menu-5' => $main_menu5->term_id      
    )
  );

  // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title( 'Home' );
  $blog_page_id  = get_page_by_title( 'Blog' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID ); 

   //Import Revolution Slider
  if ( class_exists( 'RevSlider' ) ) {
     $slider_array = array(
        get_template_directory()."/ocdi/sliders/architecture.zip",
        get_template_directory()."/ocdi/sliders/carpenter.zip",
        get_template_directory()."/ocdi/sliders/home3.zip",
        get_template_directory()."/ocdi/sliders/homeslide2.zip",
        get_template_directory()."/ocdi/sliders/home-slider.zip",       
        get_template_directory()."/ocdi/sliders/plumber-slider.zip",
        get_template_directory()."/ocdi/sliders/slider1.zip",
        get_template_directory()."/ocdi/sliders/slider2.zip",
        get_template_directory()."/ocdi/sliders/slider-clean.zip",
        get_template_directory()."/ocdi/sliders/videoslider.zip",              
        );

     $slider = new RevSlider();

     foreach($slider_array as $filepath){
       $slider->importSliderFromPost(true,true,$filepath);  
     }
  } 
}
add_action( 'pt-ocdi/after_import', 'batiment_after_import_setup' );

//for rtl

function batiment_vc_full_width_rtl_inline_script(){
  
    // Can't continue if the current view is not RTL.
    if( ! is_rtl() ) return;
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            function vc_single_row_full_width_rtl(event, data){
                data.el.css('right', data.offset).css('left', 'auto');
            }
            jQuery(document).on('vc-full-width-row-single', vc_single_row_full_width_rtl);
        });
    </script>
    <?php
}
add_action('wp_footer', 'batiment_vc_full_width_rtl_inline_script');