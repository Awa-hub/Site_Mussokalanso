<div class="rs-breadcrumbs  porfolio-details">
    <?php        
        global $rs_option;
        $team_single_image = $rs_option['team_single_image']['url'];
        if(!empty($rs_option['team_single_image']['url'])){ ?>
        <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $team_single_image );?>')">   
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
                        endif;?>    
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
        <?php
        }
        ?>
  </div>