<div class="rs-breadcrumbs  porfolio-details">
  <?php
  global $rs_option;
  if(!empty($rs_option['blog_banner_main']['url'])) { ?>
  <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($rs_option['blog_banner_main']['url']);?>')">
      <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="breadcrumbs-inner">         
          <?php if ( have_posts() ) : ?>
              <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'batiment' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
              <?php else : ?>
              <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'batiment' ); ?></h1>
          <?php endif; ?>     
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
  	        <?php if ( have_posts() ) : ?>
    			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'batiment' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    			<?php else : ?>
    			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'batiment' ); ?></h1>
    			<?php endif; ?>     
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
