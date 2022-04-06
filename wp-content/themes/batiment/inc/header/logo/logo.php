<?php 
    global $rs_option;
    $logo_height = !empty($rs_option['logo-height']) ? 'style = "max-height: '.$rs_option['logo-height'].'"' : '';
    $sticky_logo_height =!empty($rs_option['sticky-logo-height']) ? 'style = "max-height: '.$rs_option['sticky-logo-height'].'"' : '';
    $post_meta_header = get_post_meta(get_the_ID(), 'select-logo', true); 

 if($post_meta_header == 'light'){ ?>
  <div class="logo-area">
    <?php
       if (!empty( $rs_option['logo_light']['url'] ) ) { ?>
    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses_post($logo_height);?> src="<?php echo esc_url( $rs_option['logo_light']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
    <?php }	else{?>
      <h1 id="logo">
          <span class="site-name"><a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
          </span>
      </h1><!-- end of #logo -->
    <?php } 
    ?>
  </div>
  <?php } else {?>

  <div class="logo-area">
    <?php
       if (!empty( $rs_option['logo']['url'] ) ) { ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses_post($logo_height);?> src="<?php echo esc_url( $rs_option['logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
    <?php } else{?>
      <h1 id="logo">
          <span class="site-name"><a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
          </span>
      </h1><!-- end of #logo -->
    <?php } 
    ?>
  </div>
<?php }

 if (!empty( $rs_option['rswplogo_sticky']['url'] ) ) { ?>
    <div class="logo-area sticky-logo">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses_post($sticky_logo_height);?> src="<?php echo esc_url( $rs_option['rswplogo_sticky']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
       </div>
<?php } 

