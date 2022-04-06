<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
    get_header(); ?>
  </div>
</div>
<!-- Main content Start -->

<div class="main-contain"> 
  
  <!-- Team Detail Start -->  
  <div class="rs-porfolio-details">
    <div class="container">
    	<div id="content">
	      <?php while ( have_posts() ) : the_post();
		  ?>
	      <div class="project-desc">        
	        <?php
	            the_content( sprintf(
	              wp_kses(
	                /* translators: %s: Name of current post. Only visible to screen readers */
	                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'batiment' ),
	                array(
	                  'span' => array(
	                    'class' => array(),
	                  ),
	                )
	              ),
	              get_the_title()
	            ) );

	            wp_link_pages( array(
	              'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'batiment' ),
	              'after'  => '</div>',
	            ) );
	          ?>
	      </div>
      	<?php endwhile; ?>
    </div>
  </div>
</div>
<!-- Portfolio Detail End -->
<?php
get_footer();
