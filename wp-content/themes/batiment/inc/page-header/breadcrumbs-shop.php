<?php
    global $rs_option;    
?>
<?php
  $header_trans = '';
    if(!empty($rs_option['header_layout'])){  
               
        $header_style = $rs_option['header_layout'];               
        if($header_style == 'style2'){       
            $header_trans = 'heads_trans';    
        }
    }
?>

<?php $post_menu_type = get_query_var(get_the_ID(), 'menu-type', true); ?>

<div class="rs-breadcrumbs  porfolio-details <?php echo esc_attr($header_trans);?>">
    <?php   
      if(!empty($rs_option['shop_banner']['url'])){ 
         $shop_banner = $rs_option['shop_banner']['url'];?>
        <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $shop_banner );?>')">   
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">            
                    <h1 class="page-title"><?php woocommerce_page_title();?></h1>
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
          <div class="<?php echo esc_attr($header_width);?>">
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                  <h1 class="page-title">
                    <?php woocommerce_page_title();?>
                  </h1> 
                  <?php if(function_exists('bcn_display')) {
                  bcn_display();
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