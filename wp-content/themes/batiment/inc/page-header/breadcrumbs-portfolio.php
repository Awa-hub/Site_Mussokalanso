
<div class="rs-breadcrumbs  porfolio-details">
<?php
   global $rs_option;    
   if(!empty($rs_option['portfolio_single_image']['url'])){
    $portfolio_single = $rs_option['portfolio_single_image']['url']; 
   ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $portfolio_single );?>')"> 
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="breadcrumbs-inner"> 
            <?php if(get_the_title()):?>         
              <h1 class="page-title"><?php the_title();?></h1>
            <?php endif; ?>          
            <?php if(function_exists('bcn_display')) {
                bcn_display();
              }
            ?>
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php } else{    
  ?>
  <div class="rs-breadcrumbs-inner">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="breadcrumbs-inner">
            <?php if(get_the_title()):?>         
                <h1 class="page-title"><?php the_title();?></h1>
            <?php endif; 
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


