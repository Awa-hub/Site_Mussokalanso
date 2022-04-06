<?php 
    /**
    * Sample template tag function for outputting a cmb2 file_list
    *
    * @param  string  $file_list_meta_key The field meta key. ('wiki_test_file_list')
    * @param  string  $img_size           Size of image to show
    */
    function cmb2_output_file_list( $file_list_meta_key, $img_size = 'medium' ) {

        // Get the list of files
        $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
        echo '<div class="file-list-wrap"><div class="portfolio-carousel owl-carousel">';

        // Loop through them and output an image
        foreach ( (array) $files as $attachment_id => $attachment_url ) {
            echo '<div class="file-list-image">';
            echo '<a class="image-popup p-zoom" href="'.$attachment_url.'">';
            echo wp_get_attachment_image( $attachment_id, $img_size );
            echo '</a>';
            echo '</div>';
        }
        echo '</div></div>';
    }   
?>
<!-- Portfolio Detail Start -->
<div class="container">
    <div id="content">
      <!-- Portfolio Detail Start -->
      <div class="rs-porfolio-details">
    <div class="container">
        <?php while ( have_posts() ) : the_post();
            $post_client        = get_post_meta( get_the_ID(), 'client', true );
            $post_location      = get_post_meta( get_the_ID(), 'location', true );
            $post_surface_area  = get_post_meta( get_the_ID(), 'surface_area', true );
            $post_date          = get_post_meta( get_the_ID(), 'date', true );
            $post_project_value = get_post_meta( get_the_ID(), 'project_value', true );
            $post_created       = get_post_meta( get_the_ID(), 'created', true );

            $post_client_name   = get_post_meta( get_the_ID(), 'client_name', true );
            $location_name      = get_post_meta( get_the_ID(), 'location_name', true );
            $surface_area_title  = get_post_meta( get_the_ID(), 'surface_area_title', true );
            $created_title       = get_post_meta( get_the_ID(), 'created_title', true );
            $complete_title  =     get_post_meta( get_the_ID(), 'complete_title', true );
            $project_value_title       = get_post_meta( get_the_ID(), 'project_value_title', true );
        ?>
   
        <div class="ps-image-wrap clearfix">
            <div class="ps-image">                
                <?php cmb2_output_file_list( 'Screenshot', 'small' ); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-7">
                <div class="project-desc">      
                    <?php the_content(); ?>
                </div>                
            </div>
            <div class="col-md-5">
                <?php if($post_created || $post_date || $post_client || $post_location || $post_surface_area || $post_project_value){ ?>
                  <div class="ps-informations">
                      <h3 class="info-title"><?php esc_html_e('Project Information','batiment');?></h3>
                      <ul>
                        <?php if($post_client){?>
                        <li><span><?php echo esc_html($post_client_name);?>  </span><?php   echo esc_html($post_client); ?></li>
                        <?php }?>

                        <?php if($post_location){?>
                        <li><span><?php echo esc_html($location_name);?> </span><?php echo esc_html($post_location); ?></li>
                        <?php }?>

                        <?php if($post_surface_area){?>
                        <li><span><?php echo esc_html($surface_area_title);?> </span><?php echo esc_html($post_surface_area).' m'; ?><sup><?php esc_html_e('2', 'batiment'); ?></sup></li>
                        <?php }?>

                        <?php if($post_date){?>
                        <li><span><?php echo esc_html($complete_title);?>  </span><?php   echo esc_html($post_date); ?></li>
                        <?php }?>
                        
                        <?php if($post_project_value){?>
                        <li><span><?php echo esc_html($project_value_title);?>  </span><?php  echo esc_html($post_project_value); ?></li>
                        <?php }?>

                        <?php if($post_created){?>
                        <li><span><?php echo esc_html($created_title);?> </span><?php echo esc_html($post_created); ?></li>
                        <?php }?>

                      </ul>
                  </div>              
                <?php } ?>                 
            </div>
        </div>

      <?php endwhile; ?>      
      <?php
          get_template_part( 'pagination' );
      ?>          
      <!-- .ps-navigation -->  
          
    </div>
      </div>
    </div>
</div>
<!-- Portfolio Detail End -->