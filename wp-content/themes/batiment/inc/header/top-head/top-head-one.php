<?php
/* Top Header part for grassy template
*/
global $rs_option;
$mobile_topbar = $rs_option['show-top-mobile'];
?>
<?php if(!empty($rs_option['show-top'])){ 
  if(is_page()){
     $rs_top_bar = get_post_meta(get_the_ID(), 'select-top', true);
     if($rs_top_bar == 'show' || $rs_top_bar == ''){
     ?> 
    <div class="toolbar-area mobile-top<?php echo esc_attr($mobile_topbar); ?>">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-7 col-xs-12">
            <div class="toolbar-contact">
              <ul>
                <?php if(!empty($rs_option['welcome-text'])) { ?>
                <li> <?php echo esc_html($rs_option['welcome-text']); ?> </li>
                <?php } ?>                
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-sm-5 col-xs-12">
            <div class="toolbar-sl-share">
              <ul>
                <?php
                if(!empty($rs_option['show-social'])){
                  $top_social = $rs_option['show-social']; 
              
                    if($top_social == '1'){              
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
                      }
                  }
                 ?>
              </ul>
            </div>
            <?php
            //include Cart here
            if(!empty($rs_option['wc_cart_icon'])) { ?>
                <?php  get_template_part('inc/header/cart'); ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php 
  }
 }
 else{
  ?>
  <div class="toolbar-area mobile-top<?php echo esc_attr($mobile_topbar); ?>">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-7 col-xs-12">
            <div class="toolbar-contact">
              <ul>
                <?php if(!empty($rs_option['welcome-text'])) { ?>
                <li> <?php echo esc_html($rs_option['welcome-text']); ?> </li>
                <?php } ?>                
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-sm-5 col-xs-12">
            <div class="toolbar-sl-share">
              <ul>
                <?php
                if(!empty($rs_option['show-social'])){
                  $top_social = $rs_option['show-social']; 
              
                    if($top_social == '1'){              
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
                      }
                  }
                 ?>
              </ul>
            </div>
             <?php
            //include Cart here
            if(!empty($rs_option['wc_cart_icon'])) { ?>
                <?php  get_template_part('inc/header/cart'); ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php
 }
} ?>
