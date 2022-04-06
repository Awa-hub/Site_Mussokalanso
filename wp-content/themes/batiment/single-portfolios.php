<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */

get_header(); ?>

<!-- Breadcrumbs Start -->

<!-- Breadcrumbs End --> 

<?php 
	 
  $portfolio_layout = get_post_meta( get_the_ID(), 'image_select', true );


    if ($portfolio_layout == 'slider' || $portfolio_layout == ''){
        require get_parent_theme_file_path('inc/portfolio/single-slider.php');       
    } 

    if ($portfolio_layout == 'gallery') {         
        require get_parent_theme_file_path('inc/portfolio/single-gallery.php');             
    }

?>
  

<?php
get_footer();
?>