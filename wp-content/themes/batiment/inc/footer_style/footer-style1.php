<?php
/*
Grassy footer style 1
*/
if(is_active_sidebar('footer1')):
   $top_gap='';
  else:
    $top_gap='top_gap';
  endif;
?>
<footer id="rs-footer" class="rs-footer footer-style-1 <?php echo esc_attr($top_gap);?>">
<!-- adding footer widget -->	
 <?php require get_parent_theme_file_path('inc/footer_style/footer-top.php'); ?>
  <div class="footer-bottom">
      <div class="container">
          <div class="row">
            <?php if ( has_nav_menu( 'menu-5' ) ) {?>
              <div class="col-sm-12">
                  <nav class="nav-footer">
                      <div class="navbar-footer">
                        <?php
                          wp_nav_menu( array(
                            'theme_location' => 'menu-5',
                            'menu_id'        => 'footer-menu',
                          ) );
                         ?>
                      </div>
                  </nav> 
                </div>                            
            <?php } ?>

              <div class="col-md-4 col-sm-6">
                  <div class="copyright">
                     <?php require get_parent_theme_file_path('inc/footer_style/copyright.php'); ?>
                  </div>
              </div>
              <div class="col-md-8 col-sm-6">
                  <div class="text-right ft-bottom-right">
                      <div class="footer-bottom-share">
                        <?php require get_parent_theme_file_path('inc/footer_style/footer-social.php');?>
                      </div>                                
                  </div>
              </div>
          </div>
      </div>
  </div>
</footer><!-- end footer -->
