<?php
/**
 /**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function batiment_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'batiment' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'batiment' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Shop', 'batiment' ),
			'id'            => 'sidebar_shop',
			'description'   => esc_html__( 'Sidebar Shop', 'batiment' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	register_sidebar( array(
		'name'          => esc_html__( 'Contact Information Widget', 'batiment' ),
		'id'            => 'contact-widget',
		'description'   => esc_html__( 'Add widgets here.', 'batiment' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Off Canvas Sidebar', 'batiment' ),
		'id'            => 'sidebarcanvas-1',
		'description'   => esc_html__( 'Add widgets here.', 'batiment' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


 	register_sidebar( array(
			'name' => __( 'Footer One Widget Area', 'batiment' ),
			'id' => 'footer1',
			'description' => __( 'Add Text widgets area', 'batiment' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 		 				

	 register_sidebar( array(
			'name' => __( 'Footer Two Widget Area', 'batiment' ),
			'id' => 'footer2',
			'description' => __( 'Add text box widgets area', 'batiment' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 
	register_sidebar( array(
			'name' => __( 'Footer Three Widget Area', 'batiment' ),
			'id' => 'footer3',
			'description' => __( 'Add text box widgets area', 'batiment' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 
	register_sidebar( array(
			'name' => __( 'Footer Four Widget Area', 'batiment' ),
			'id' => 'footer4',
			'description' => __( 'Add text box widgets area', 'batiment' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) );
				
}
add_action( 'widgets_init', 'batiment_widgets_init' );