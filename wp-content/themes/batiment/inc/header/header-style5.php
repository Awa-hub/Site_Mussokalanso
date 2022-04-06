<?php
/*
header style 5
*/
global $rs_option;
$sticky = $rs_option['off_sticky']; 
$sticky_menu = ($sticky == 1) ? ' menu-sticky' : '';
?>
<header id="rs-header" class="header-styl-5">
  <div class="header-inner<?php echo esc_attr($sticky_menu);?>">
       <!-- Toolbar Start -->
       <?php
          if(!empty($rs_option['show-top'])){
           $top_bar = $rs_option['show-top'];      
            if($top_bar == ""){ ?>
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
      <div class="coll border-full">
        <div class="container">
            <div class="row rows-equels">
                <div class="col-md-4 menu-lefts">
                	<nav class="nav navbar">
    					<div class="navbar-menu">
		                    <?php
								wp_nav_menu( array(
									'theme_location' => 'menu-3',
									'menu_id'        => 'menu-left',
								) );
							?>
						</div>
					</nav>
                </div>
                <div class="col-md-4">
                    <?php  require get_parent_theme_file_path('inc/header/logo/logo.php'); ?>
                </div>
                <div class="col-md-4 menu-rights">
                    <nav class="nav navbar">
        				<div class="navbar-menu">
    		            <?php
      								wp_nav_menu( array(
      									'theme_location' => 'menu-4',
      									'menu_id'        => 'menu-right',
      								) );
    							   ?>
    						  </div>
    					</nav>
                </div>
            </div>
            <div class="nav5">
                <?php require get_parent_theme_file_path('inc/header/menu.php'); ?> 
            </div>
        </div>        
      </div>        
  </div>
</div>

  <!-- Header Menu End --> 
  <!-- Slider Start Here -->
    <?php  require get_parent_theme_file_path('inc/header/slider/slider.php'); ?>
  <?php 
      get_template_part( 'inc/breadcrumbs' );
  ?>
</header>
