<?php
/*
Header style 3
*/
global $rs_option;
$sticky = $rs_option['off_sticky']; 
$sticky_menu = ($sticky == 1) ? ' menu3sticky' : '';

?>

<header id="rs-header" class="header-styl-3">

    <!-- Header Menu Start -->
    <div class="header-inner<?php echo esc_attr($sticky_menu);?>">
      <div class="menu-area">
        <div class="container">
          <div class="row rows-equels">
           <?php if(!empty($rs_option['phone'])): ?>
            <div class="col-sm-4 hidden-xs hidden-sm">
              <div class="toolbar-contact">
                <i class="fa flaticon-phone-call"></i>
                <a href="tel:+<?php echo esc_attr(str_replace(" ","",($rs_option['phone'])))?>"> <?php echo esc_html($rs_option['phone']); ?></a>  
              </div>
            </div>
          <?php endif; ?>
            <div class="col-md-4 col-sm-12">
              <?php require get_parent_theme_file_path('inc/header/logo/logo.php'); ?>
            </div>


            <?php
                    if(!empty($rs_option['show-social'])){
                      $top_social = $rs_option['show-social']; 
                  
                        if($top_social == '1'){ ?>
            <div class="col-sm-4 hidden-xs hidden-sm">
              <div class="toolbar-sl-share">
                  <ul>
                         <?php        
                          if(!empty($rs_option['facebook'])) { ?>
                          <li> <a href="<?php echo esc_url($rs_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                          <?php } ?>
                          <?php if(!empty($rs_option['twitter'])) { ?>
                          <li> <a href="<?php echo esc_url($rs_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
                          <?php } ?>
                          <?php if(!empty($rs_option['rss'])) { ?>
                          <li> <a href="<?php  echo esc_url($rs_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
                          <?php } ?>
                          <?php if (!empty($rs_option['pinterest'])) { ?>
                          <li> <a href="<?php  echo esc_url($rs_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
                          <?php } ?>
                          <?php if (!empty($rs_option['linkedin'])) { ?>
                          <li> <a href="<?php  echo esc_url($rs_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>
                          <?php } ?>
                          <?php if (!empty($rs_option['google'])) { ?>
                          <li> <a href="<?php  echo esc_url($rs_option['google']);?> " target="_blank"><i class="fa fa-google-plus-square"></i></a> </li>
                          <?php } ?>
                          <?php if (!empty($rs_option['instagram'])) { ?>
                          <li> <a href="<?php  echo esc_url($rs_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>
                          <?php } ?>
                          <?php if(!empty($rs_option['vimeo'])) { ?>
                          <li> <a href="<?php  echo esc_url($rs_option['vimeo']);?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>
                          <?php } ?>
                          <?php if (!empty($rs_option['tumblr'])) { ?>
                          <li> <a href="<?php  echo esc_url($rs_option['tumblr']);?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>
                          <?php } ?>
                          <?php if (!empty($rs_option['youtube'])) { ?>
                          <li> <a href="<?php  echo esc_url($rs_option['youtube']);?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>
                          <?php } 
                     ?>
                  </ul>
                </div>
            </div>
            
          <?php  } }?>
          </div>
        </div>
        <div class="col-full border-full">
          <div class="container">
           <?php require get_parent_theme_file_path('inc/header/menu.php'); ?> 
          </div>                   
        </div>     
      </div>
      <!-- Header Menu End -->
    </div> 
<!-- Slider Start Here -->
<?php  
require get_parent_theme_file_path('inc/header/slider/slider.php'); ?>
<!-- End Slider area  -->
 <?php 
    get_template_part( 'inc/breadcrumbs' );
  ?>
</header>




