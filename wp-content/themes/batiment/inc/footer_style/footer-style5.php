<?php
/*
Grassy footer style 3
*/
?>
<footer id="rs-footer" class="rs-footer footer-style-5">
  <div class="footer-top">
    <div class="border-full-footer">
      <div class="container footer-style-55">
          <div class="row">
              <div class="col-md-6">  
                <div class="about-widget">
                 <?php
                     if(!empty($rs_option['footer_logo']['url'])) { ?>
                        <img src="<?php echo esc_url( $rs_option['footer_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                       <?php }               
                    ?>
                </div>
              </div>
              <div class="col-md-6"> 
                  <div class="footer-bottom footer-top-sosal"> 
                    <div class="footer-bottom-share">
                     <?php require get_parent_theme_file_path('inc/footer_style/footer-social.php');   ?>
                    </div> 
                </div>
              </div>          
          </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
          <div class="col-md-4 col-sm-4">            
              <div class="copyright">
                  <?php require get_parent_theme_file_path('inc/footer_style/copyright.php'); ?>
              </div>
          </div>
          <div class="col-md-8 col-sm-8">
              <div class="right-menu">
                 <?php if ( has_nav_menu( 'menu-5' ) ) {?>
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
            <?php } ?>                          
              </div>
          </div>
      </div>
    </div>
  </div>
</footer>