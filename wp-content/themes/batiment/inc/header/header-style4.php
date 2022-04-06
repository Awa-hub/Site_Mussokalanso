<?php
    /*
        header style 4
    */
    global $rs_option;
    $sticky = $rs_option['off_sticky']; 
    $sticky_menu = ($sticky == 1) ? ' menu-sticky' : '';
?>
<header id="rs-header" class="header-style-4">

    <div class="header-inner<?php echo esc_attr($sticky_menu);?>">
        <!-- Toolbar Start -->
        <?php
          if(!empty($rs_option['show-top'])){
           $top_bar = $rs_option['show-top'];
           if($top_bar == ""){
             ?>
             <div class="top-gap">
              <?php require get_parent_theme_file_path('inc/header/top-head.php');
              ?>
            </div>
          <?php
           }
            else{
               if($top_bar == 1){
                require get_parent_theme_file_path('inc/header/top-head.php');
               } 
            }
        }
        ?>
        <!-- Toolbar End -->
        
        <!-- Header Menu Start -->
        <div class="menu-area">
            <div class="container main-menu-responsive">
                <div class="row">
                    <div class="col-md-12">
                      <?php require get_parent_theme_file_path('inc/header/logo/logo.php'); ?>
                    </div>
                </div>
            </div>
            <div class="fullwidth_menu menu-responsive">
                <div class="container">
                    <div class="row">
                         <div class="col-md-10">  
                             <?php 
                                require get_parent_theme_file_path('inc/header/menu.php');
                              ?> 
                         </div> 
                         <div class="col-md-2"> 
                              <?php if(!empty($rs_option['off_canvas']) || !empty($rs_option['off_search'])):
                                    $menu_right = 'nav-right-bar';
                                  else:
                                    $menu_right=''; 
                                    endif;  
                              ?>
                              <div class="sidebarmenu-area text-right">
                                  <?php 
                                    //search box here
                                    require get_parent_theme_file_path('inc/header/search.php');
                                    //off convas here
                                    require get_parent_theme_file_path('inc/header/off-canvas.php');
                                  ?> 
                              </div>
                        </div>
                   </div>
                </div>  
            </div>
        </div>
    </div>
 <!-- Slider Start Here -->
    <?php  require get_parent_theme_file_path('inc/header/slider/slider.php');?>
  <?php 
        get_template_part( 'inc/breadcrumbs' );
    ?>
  <!-- Header Menu End --> 
</header>