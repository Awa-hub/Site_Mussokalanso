<div class="rs-breadcrumbs  porfolio-details">
  <?php
  global $rs_option;
  if(!empty($rs_option['blog_banner_main']['url'])) { ?>
  <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($rs_option['blog_banner_main']['url']);?>')">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner">
               <h1 class="page-title"><?php
                    if(!empty($rs_option['title_404'])){
                        echo esc_html($rs_option['title_404']);
                    }
                    else{
                        esc_html_e( '404.', 'batiment' ); }
                    ?>                            
                </h1>
                <?php if(function_exists('bcn_display')) {
                  bcn_display();
                }
              ?>   
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php }
  else{   
  ?>
  <div class="rs-breadcrumbs-inner">  
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="breadcrumbs-inner">
            <h1 class="page-title"><?php
                 if(!empty($rs_option['title_404'])){
                    echo esc_html($rs_option['title_404']);
                 }
                 else{
                    esc_html_e( '404.', 'batiment' ); }
                 ?>                     
            </h1>
            <?php 
                if(function_exists('bcn_display')) {
                    bcn_display();
                }
            ?> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
?>  
</div>