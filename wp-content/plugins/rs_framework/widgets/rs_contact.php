<?php 
// Register and load the widget
function rs_contact_widget() {
    register_widget( 'contact_widget' );
}
add_action( 'widgets_init', 'rs_contact_widget' );

//Contact info Widget 
class contact_widget extends WP_Widget {
 
   /** constructor */
   function __construct() {
    parent::__construct(
      'contact_widget', 
      __('RS Contact Info', 'batiment'),
      array( 'description' => __( 'Display your contact info!', 'batiment' ), )
    );
  }
 
    /** @see WP_Widget::widget */
    function widget($args, $instance) { 
        extract( $args );
        $title    = apply_filters('widget_title', $instance['title']);       
        $address  = $instance['address'];       
        $email  = $instance['email'];
        $phone   = $instance['phone'];
        $hour   = $instance['hour'];
        $fax   = $instance['fax'];
        echo ($before_widget); 
        if ( $title )
        echo ($before_title . $title . $after_title); ?>
  
  <!-- Contact Info Widget -->
  <ul class="fa-ul">

		<?php

		if (!empty($address))
		      echo '<li><i class="fa fa-globe" ></i>'. esc_html($address) .'</li>';
		if (!empty($phone))
		      echo '<li><i class="fa fa-phone" ></i>'. esc_html($phone) .'</li>';
		
		if (!empty($email))
		      echo '<li><i class="fa fa-envelope" ></i><a href="mailto:'. esc_attr($email) .'";>'. esc_html($email) .'</a></li>';
    if (!empty($fax))
          echo '<li><i class="fa fa-fax" ></i>'. esc_html($fax) .'</li>';    
		if (!empty($hour))
		      echo '<li><i class="fa fa-clock-o"></i>'. esc_html($hour) .'</li>';		
		?>

  </ul>

      <?php echo wp_kses_post($after_widget); ?>
     <?php
    }
 
  /** @see WP_Widget::update  */
  function update($new_instance, $old_instance) {   
        $instance            = $old_instance;
        $instance['title']   = strip_tags($new_instance['title']);
        $instance['address'] = strip_tags($new_instance['address']);	
        $instance['email']   = strip_tags($new_instance['email']);
        $instance['phone']   = strip_tags($new_instance['phone']);
        $instance['hour']  = strip_tags($new_instance['hour']);
        $instance['fax']     = strip_tags($new_instance['fax']);
        
        return $instance;
    }
 
    /** @see WP_Widget::form */
    function form($instance) {  
		
     $title   = ($instance['title'])? $instance['title'] : '';    
     $address = ($instance['address'])? $instance['address'] :''; 
     $email   = ($instance['email'])? $instance['email'] : '';
     $phone   = ($instance['phone'])? $instance['phone'] : '';
     $hour    = ($instance['hour'])? $instance['hour'] : '';
     $fax     = ($instance['fax'])? $instance['fax'] : '';
     ?>
      
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'batiment'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_js( $title); ?>" />
        </p>        
        
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'batiment'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_js($address); ?>" />
        </p>
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'batiment'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_js($phone); ?>" />
        </p>
       
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'batiment'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_js($email); ?>" />
        </p>       
        
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('fax')); ?>"><?php esc_html_e('Fax:', 'batiment'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('fax')); ?>" name="<?php echo esc_attr($this->get_field_name('fax')); ?>" type="text" value="<?php echo esc_js($fax); ?>" />
        </p>
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('hour')); ?>"><?php esc_html_e('Opening Hour:', 'batiment'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('hour')); ?>" name="<?php echo esc_attr($this->get_field_name('hour')); ?>" type="text" value="<?php echo esc_js($hour); ?>" />
        </p>
       
        <?php 
    }

 
} // end class
