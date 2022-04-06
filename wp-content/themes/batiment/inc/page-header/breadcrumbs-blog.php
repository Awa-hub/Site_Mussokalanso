<div class="rs-breadcrumbs  porfolio-details">
  <?php
  global $rs_option;
  if(!empty($rs_option['blog_banner_main']['url'])) { ?>
  <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($rs_option['blog_banner_main']['url']);?>')">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner">
              <h1 class="page-title">
                <?php    
                if(!empty($rs_option['blog_title'])) { ?>
                <?php echo esc_html($rs_option['blog_title']);?>
                <?php }
                else{
                 esc_html_e('All Blogs','batiment');
                }
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
         <?php    
         if(!empty($rs_option['blog_title'])) { ?>
            <h1 class="page-title"><?php echo esc_html($rs_option['blog_title']);?></h1>
            <?php }
            else{
               ?>
               <h1 class="page-title"> <?php esc_html_e('Blog','batiment'); ?></h1>
           <?php  
               }?>          
          
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
?>  
</div>