<?php
/*
Grassy footer style 2
*/
?>
<footer id="rs-footer" class="rs-footer footer-style-2">
<?php if(is_active_sidebar('footer1') || is_active_sidebar('footer2') || is_active_sidebar('footer3') || is_active_sidebar('footer4'))
{
?>
  <div class="footer-top">
      <div class="container">
          <div class="row">                   
              <div class="col-md-4">                                          
                  <div class="about-widget">
                   <?php
                       if(!empty($rs_option['footer_logo']['url'])) { ?>
                          <img src="<?php echo esc_url( $rs_option['footer_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                         <?php }               
                      ?>
                    <?php dynamic_sidebar('footer1') ?>
                  </div> 

                  <div class="footer-bottom">
                    <div class="footer-bottom-share">
                       <?php require get_parent_theme_file_path('inc/footer_style/footer-social.php');   ?>
                    </div>                                
                  </div>                        
              </div>                            
              <div class="col-md-4">
                  <?php dynamic_sidebar('footer2'); ?>   
              </div>
              <div class="col-md-4">
                 <?php dynamic_sidebar('footer3'); ?>   
              </div>
          </div>
      </div>
  </div>
<?php } ?>

  <div class="footer-bottom">
      <div class="container">
          <div class="row">
              <div class="col-md-4 col-sm-6">
                  <div class="copyright">
                     <?php require get_parent_theme_file_path('inc/footer_style/copyright.php'); ?>
                  </div>
              </div>
              <div class="col-md-8 col-sm-6">
                  <div class="right-menu">
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
              </div>
          </div>
      </div>
  </div>
</footer>