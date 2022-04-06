<?php

/*
Header Style 1
*/
global $rs_option;
$sticky = $rs_option['off_sticky']; 
$sticky_menu = ($sticky == 1) ? ' menu-sticky' : '';
?>

<header id="rs-header" class="header-style1">
    <div class="header-inner<?php echo esc_attr($sticky_menu);?>">
       <!-- Toolbar Start -->
       <?php
          if(!empty($rs_option['show-top'])){
           $top_bar = $rs_option['show-top'];
           if($top_bar == ""){?>
             <div class="top-gap">
              <?php get_template_part('inc/header/top-head/top-head-one');
              ?>
            </div>
          <?php
           }
           else{
           if($top_bar == '1'){
              get_template_part('inc/header/top-head/top-head-one');
            } 
          }
        }
      ?>
      <!-- Toolbar End -->
      <!-- Header Menu Start -->  
      <div class="menu-area">
        <div class="container">
          <div class="row menu-middle"> 
          <?php if(!empty($rs_option['phone']) || !empty($rs_option['top-email'])  || !empty($rs_option['top-location'])){
            $logo_col = 'col-sm-3';
            }
            else{$logo_col = '';}?>         
            <div class="<?php echo esc_attr($logo_col);?> col-xs-12">
              <?php  get_template_part('inc/header/logo/logo'); ?>
            </div>
            <?php if(!empty($rs_option['phone']) || !empty($rs_option['top-email']) || !empty($rs_option['top-location'])){?>
            <div class="col-sm-9 col-xs-12">
                <div class="toolbar-contact-style4">
                  <ul class="rs-contact-info">
                    <?php if(!empty($rs_option['phone'])) { ?>
                    <li class="rs-contact-phone">
                        <i class="fa flaticon-phone-call"></i>
                        <span class="contact-inf">
                          <span><?php if(!empty($rs_option['phone-pretext'])): echo esc_html($rs_option['phone-pretext']); endif;?> </span>
                          <a href="tel:+<?php echo esc_attr(str_replace(" ","",($rs_option['phone'])))?>"> <?php echo esc_html($rs_option['phone']); ?></a> 
                        </span>
                    </li>
                    <?php } ?>

                    <?php if(!empty($rs_option['top-email'])) { ?>
                    <li class="rs-contact-email">
                        <i class="fa flaticon-open-mail"></i>
                          <span class="contact-inf">
                              <span><?php if(!empty($rs_option['email-pretext'])): echo esc_html($rs_option['email-pretext']); endif;?> </span>
                              <a href="mailto:<?php echo esc_attr($rs_option['top-email'])?>"><?php echo esc_html($rs_option['top-email'])?></a> 
                          </span>
                    </li>
                    <?php } ?>
                    <?php if(!empty($rs_option['location-pretext'])) { ?>              
                    <li class="rs-contact-location">
                        <i class="fa flaticon-placeholder"></i>
                        <span class="contact-inf">
                          <span><?php if(!empty($rs_option['location-pretext'])): echo esc_html($rs_option['location-pretext']); endif;?> </span>
                         <?php echo esc_html($rs_option['top-location'])?>
                        </span>
                    </li>
                    <?php } ?>
                  </ul>
              </div>
            </div>
          <?php } ?>
          </div>
          <div class="menu_one">
              <div class="row">
                 <?php if(!empty($rs_option['quote']) || !empty($rs_option['off-canvas'])){
                    $menu_col = 'col-xs-10';
                 }
                 else{
                    $menu_col = 'col-xs-12';
                 }
                 ?>
                  <div class="<?php echo esc_attr($menu_col);?> menu-responsive">  
                    <?php if(!empty($rs_option['off_canvas']) || !empty($rs_option['off_search'])):
                          $canvas_right = 'nav-right-bar';
                        else:
                          $canvas_right = ''; 
                        endif;                    
                        get_template_part('inc/header/menu-single');               
                      ?>
                  </div>            
                  <?php
                  
                   if(!empty($rs_option['off_canvas'])):   
                      $off_canvas_menu = $rs_option['off_canvas'];                        
                  endif;  

                  $rs_off_menu = ( $off_canvas_menu == 1 ) ? 'menu-offcanvas' : '';
                  $quote_right = '';

                   if(!empty($rs_option['quote'])):   
                      $quote_right = $rs_option['quote'];                     
                  endif;
                  $rs_quote_menu = ( $quote_right == 1 ) ? 'rs-quote-off' : '';           
                   ?>

                 <?php if(!empty($rs_option['quote']) || !empty($rs_option['off-canvas'])){?>   
                 <div class="col-xs-2 <?php echo esc_attr($rs_off_menu); ?>">
                      <div class="get-quote <?php echo esc_attr($rs_quote_menu);?>">
                        <?php if (!empty($rs_option['quote'])) { ?>
                         <a href="<?php echo esc_url($rs_option['quote_link']); ?>" class="quote-button"><?php  echo esc_html($rs_option['quote']); ?></a>                            
                        <?php }
                            //off convas here
                            get_template_part('inc/header/off-canvas');
                          ?> 
                      </div>
                  </div>
                 <?php } ?>     
                </div>
          </div>
        </div>    
      </div>
      <!-- Header Menu End --> 
    </div>

    <!-- Slider Start Here -->
    <?php  get_template_part('inc/header/slider/slider'); ?>

    <!-- End Slider area  -->
    <?php 
        if(is_page()) {
          get_template_part( 'inc/page-header/breadcrumbs' );
        }
    ?>
</header>