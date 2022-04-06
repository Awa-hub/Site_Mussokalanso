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
	      //take metafield value
	        $designation = get_post_meta(  get_the_ID(), 'designation', true );
	        $company = get_post_meta(  get_the_ID(), 'company', true );
	        $speciality = get_post_meta(  get_the_ID(), 'speciality', true );
	        $address = get_post_meta(  get_the_ID(), 'address', true );
	        $city = get_post_meta(  get_the_ID(), 'city', true );
	        $state = get_post_meta(  get_the_ID(), 'state', true );
	        $country = get_post_meta(  get_the_ID(), 'country', true );
	        $phone = get_post_meta(  get_the_ID(), 'phone', true );
	        $email = get_post_meta(  get_the_ID(), 'email', true );
	        $website = get_post_meta(  get_the_ID(), 'website', true );
	        $facebook = get_post_meta( get_the_ID(), 'facebook', true );
	        $twitter = get_post_meta( get_the_ID(), 'twitter', true );
	        $google_plus = get_post_meta( get_the_ID(), 'google_plus', true );
	        $linkedin = get_post_meta( get_the_ID(), 'linkedin', true );
		  ?>
	      <div class="row">
		        <div class="col-md-4 col-sm-12">
		          <div class="ps-image">
		            <?php the_post_thumbnail(); ?>
		          </div>
		        </div>
		        <div class="col-md-8 col-sm-12">
		          <?php if( $designation || $company || $facebook || $twitter || $google_plus ){ ?>
		          <div class="ps-informations">
		            <h3 class="info-title">
		              <?php esc_html_e( 'Team Information','batiment' );?>
		            </h3>
		            <ul>
		              <?php if($designation):?>
		                <li><span>
		                  <?php esc_html_e( 'Designation:','batiment' );?>
		                  </span><?php echo esc_html($designation); ?>
		                </li>
		              <?php endif;?>

		              <?php if($company):?>
		                <li>
		                  <span><?php esc_html_e( 'Company:','batiment' );?></span>
		                  <?php echo esc_html($company); ?>
		                </li>
		              <?php endif?>

		              <?php if($speciality):?>
		                <li>
		                  <span><?php esc_html_e( 'Speciality:','batiment' );?></span>
		                  <?php echo esc_html($speciality); ?>
		                </li>
		              <?php endif?>

		              <?php if($facebook):?>
		                <li class="social-icon">
		                  <a href="<?php  echo esc_url( $facebook ); ?>" target="_blank"> 
		                    <i class="fa fa-facebook"></i>
		                  </a>
		                </li>
		              <?php endif;?>
		              <?php if($twitter):?>
		                <li class="social-icon">
		                  <a href="<?php  echo esc_url( $twitter ); ?>" target="_blank"> 
		                    <i class="fa fa-twitter" aria-hidden="true"></i>
		                  </a>
		                </li>
		              <?php endif;?>
		              <?php if($google_plus):?>
		                <li class="social-icon">
		                  <a href="<?php  echo esc_url( $google_plus ); ?>" target="_blank">
		                    <i class="fa fa-google-plus"></i>
		                  </a>
		                </li>
		              <?php endif; ?>
		              <?php if($linkedin):?>
		              <li class="social-icon"><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"> <i class="fa fa-linkedin"></i></a></li>
		              <?php endif; ?>
		              <div class="clear-fix"></div>
		              <?php if($address):?>
		              <li>
		                <span>
		                <?php esc_html_e( 'Address:','batiment' );?>
		                </span>
		                <?php  echo esc_html( $address ); ?>
		              </li>
		              <?php endif; ?> 
		              <?php if($city):?>
		              <li>
		                <span>
		                <?php esc_html_e( 'City:','batiment' );?>
		                </span>
		                <?php  echo esc_html( $city ); ?>
		              </li>
		              <?php endif;?>

		              <?php if($state):?>
		              <li>
		                <span>
		                <?php esc_html_e( 'State:','batiment' );?>
		                </span><?php echo esc_html( $state ); ?>
		              </li>
		              <?php endif;?>

		              <?php if($country):?>
		                    <li>
		                      <span>
		                      <?php esc_html_e( 'Country:','batiment' );?>
		                      </span><?php echo esc_html( $country ); ?>
		                    </li>
		              <?php endif; ?>

		              <?php if($phone):?>
		                    <li>
		                      <span>
		                      <?php esc_html_e( 'Phone:','batiment' );?>
		                      </span><?php echo esc_html( $phone ); ?>
		                    </li>
		              <?php endif; ?>

		              <?php if($email):?>
		                    <li>
		                      <span>
		                        <?php esc_html_e( 'Email:','batiment' );?>
		                    </span>
		                    <a href="mailto:<?php echo esc_attr( $email ); ?>">
		                       <?php  echo esc_html( $email ); ?>
		                    </a>
		                  </li>
		              <?php endif;?>

		              <?php if($website):?>
		                    <li><span>
		                      <?php esc_html_e('Website:','batiment');?>
		                      </span><a href="<?php echo esc_url( $website); ?>" target="_blank">
		                      <?php  echo esc_url($website); ?>
		                      </a>
		                    </li>
		              <?php endif;?>
		            </ul>
		          </div>
		          <?php } ?>
		        </div>
	      </div>
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
	      <?php
            get_template_part( 'pagination');
          ?>
      <?php endwhile; ?>
    </div>
  </div>
</div>
<!-- Portfolio Detail End -->
<?php
get_footer();
