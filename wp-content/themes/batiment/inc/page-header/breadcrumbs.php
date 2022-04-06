<?php
$post_meta_data = get_post_meta(get_the_ID(), 'banner_image', true);?>
<?php if($post_meta_data!=''){   
?>
<div class="rs-breadcrumbs">
    <div class="breadcrumbs-single" style="background-image: url(<?php echo esc_url($post_meta_data); ?>)">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner">
              <?php 
                $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
              <?php if($post_meta_title == 'show'){             
              ?>
              <h1 class="page-title">
                <?php the_title();?>
              </h1>
              <?php } 
              $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
              if($rs_breadcrumbs == 'show'):        
              if(function_exists('bcn_display')) {
                    bcn_display();
                    }
                endif;
              ?>        
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php }
else{   
$post_meta_bread = get_post_meta(get_the_ID(), 'select-bread', true);?>
<?php if($post_meta_bread =='Show' || $post_meta_bread ==''){?>
<div class="rs-breadcrumbs  porfolio-details">
  <div class="rs-breadcrumbs-inner">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="breadcrumbs-inner">
            <?php 
                $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                <?php if( $post_meta_title != 'hide' ){             
                ?>
                <h1 class="page-title">
                    <?php the_title();?>
                </h1>
                <?php } 
                $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                if( $rs_breadcrumbs != 'hide' ):        
                if(function_exists('bcn_display')){?>
                    <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                <?php } 
                endif;
            ?>    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  }
  else{
    $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
    <?php if($post_meta_title == 'hide'){
      }
    else{
      ?>
      <div class="container inner-page-title">
        <h1>
          <?php the_title();?>
        </h1>
      </div>
  <?php } 
      }
  }
?>