<?php
/*
 Header style 2
*/
global $rs_option;
$sticky = $rs_option['off_sticky']; 
$sticky_menu = ($sticky == 1) ? ' menu-sticky' : '';

?>
<header id="rs-header" class="header-transparent style2">
    <div class="header-inner<?php echo esc_attr($sticky_menu);?>">
        <!-- Toolbar Start -->
        <?php
            if(!empty($rs_option['show-top'])){
                $top_bar = $rs_option['show-top'];
                if($top_bar == ""){?>
                    <div class="top-gap">
                    <?php require get_parent_theme_file_path('inc/header/top-head/top-head-two.php');
                    ?>
                    </div>
                <?php
                }
                else{
                    if($top_bar =='1'){       
                        require get_parent_theme_file_path('inc/header/top-head/top-head-two.php');
                    } 
                }
            }
        ?>
        <!-- Toolbar End -->
        
        <!-- Header Menu Start -->
        <div class="menu-area">
        <div class="container">
            <div class="row rows-equels">
                <div class="col-sm-3 header-logo">
                  <?php  require get_parent_theme_file_path('inc/header/logo/logo.php'); ?>
                </div>
            <div class="col-sm-9 menu-responsive">   
                <?php if(!empty($rs_option['off_canvas']) || !empty($rs_option['off_search'])):
                        $menu_right='nav-right-bar';
                      else:
                        $menu_right=''; 
                      endif;
                require get_parent_theme_file_path('inc/header/menu.php');          
                  
                ?>
                <div class="sidebarmenu-area text-right">
                    <?php 
                        //include sticky search here
                        //require get_parent_theme_file_path('inc/header/search.php');
                        //off convas here
                    require get_parent_theme_file_path('inc/header/off-canvas.php');
                    ?> 
                </div>

               
                
            </div>
          </div>
        </div>
         
        </div>
        <!-- Header Menu End -->
    </div>
     <!-- End Slider area  -->
   <?php 
   get_template_part( 'inc/breadcrumbs' );
  ?>
</header>
<?php  
  require get_parent_theme_file_path('inc/header/slider/slider.php'); ?>
 
