<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */
get_header(); ?>
<div class="page-error">
    <div class="container">
        <div id="content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">    
                    <section class="error-404 not-found">    
                        <div class="page-content">
                            <h3>						
        						<?php
        						 if(!empty($rs_option['text_404'])){
        							 echo esc_html($rs_option['text_404']);
        						 }
        						 else{
        						  esc_html_e( 'Page Not Found', 'batiment' ); }
        						 ?>
                            </h3>

                            <div class="bs-sidebar">
                                <?php get_search_form(); ?>
                            </div><!-- .bs-sidebar -->
                            <a href="<?php echo esc_url( home_url('/') ); ?>">
    							<?php
                                 if(!empty($rs_option['back_home'])){
                                     echo esc_html($rs_option['back_home']);
                                 }
                                 else{
                                     esc_html_e('OR BACK TO HOMEPAGE', 'batiment'); 
                                  }
                                ?>
                            </a>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>   
</div> <!-- .page-error -->
<?php
get_footer();
