<?php
/*
Element Description: Rs Custom Video*/

    // Element Mapping
    function vc_video_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Rs Video', 'brickx'),
                'base' => 'vc_video',
                'description' => __('Rs Video Addon', 'brickx'), 
                'category' => __('by RS Theme', 'brickx'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
             	array(
                     "type" => "attach_image",
                     "heading" => __("Video Image", "brickx"),
                     "param_name" => "image",
                     "value" => "",
                     "description" => __("Select image from media library.", "brickx"),
                 ),          
			array(
				'type' => 'textfield',
				'holder' => 'h3',
				'class' => 'title-class',
				'heading' => __( 'Title', 'brickx' ),
				'param_name' => 'title',
				'value' => __( '', 'brickx' ),
				'description' => __( 'Heading title area', 'brickx' ),
				'admin_label' => false,
				'weight' => 0,
			   
			),  	

			array(
				'type' => 'textarea_html',
				'holder' => 'h4',
				'class' => 'text-class',
				'heading' => __( 'Text', 'brickx' ),
				'param_name' => 'description',
				'value' => __( '', 'brickx' ),
				'description' => __( 'Description text here', 'brickx' ),
				'admin_label' => false,
				'weight' => 0,                        
			),	

			array(
				'type' => 'textfield',
				'heading' => __( 'Video link', 'brickx' ),
				'param_name' => 'video_link',
				'value' => __( '', 'brickx' ),
				'description' => __( 'Video link here', 'brickx' ),
				'admin_label' => false,
				'weight' => 0,
			   
			),

			 array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'brickx' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'brickx' ),
			),		
			
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Title color", 'brickx' ),
				"param_name" => "titlecolor",
				"value" => '#4caf50', //Default Red color
				"description" => __( "Choose title color", 'brickx' ),
				'admin_label' => false,
				'weight' => 0,
				'group' => 'Style',
			 ),                    
						
			array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'brickx' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'brickx' ),
			),                  
                        
         ),
      )
   );                                      
}
  
add_action( 'vc_before_init', 'vc_video_mapping' );
  
 // Element HTML
 function vc_video_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'layout'                 => '2',
					'image'                 => '',
					'title'                  => '',
					'titlecolor'             => '',
					'subcolor'               => '',                   
					'description'            => '',                    
					'video_link'             => '',                    
					'font_heading_container' => '',
					'el_class'               =>'',
					'css'                    => ''
                ), 
                $atts, 'vc_video'
            )
        );
		
		//for css edit box value extract
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
         //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
  
  		$a = shortcode_atts(array(
  		    'screenshots' => 'screenshots',
  		), $atts);

  		$image = wp_get_attachment_image_src( $image, 'full' );

        // Fill $html var with data

       	if ($layout == 2) {
       		$html = '<div class="rs-video-2">
					    <img src="'.$image[0].'" alt="'.esc_attr($title).'">
					    <a class="popup-videos" href="'.esc_attr($video_link).'" title="'.esc_attr($title).'">
							<i class="fa fa-play"></i>
						</a>
					    <div class="overly-border"></div>
					</div>';

			return $html;
       	} else {
	        $html = '
	        <div class="rs-video '.$css_class.' '.$css_class_custom.'">
	        	<div class="title-dsc">         
		            <h4 style="color:'.$titlecolor.'">'.esc_attr($title).'</h4>             
		            <p>'.esc_attr($description).'</p>             
		        </div>
	            <div class="videos-icon">
	                <a class="popup-videos" href="'.esc_attr($video_link).'">
	                <span><i class="fa fa-play-circle" aria-hidden="true"></i></span>
	                </a>
	            </div>       
	        </div>';  	
	         
	        return $html;
       	}

         
    }
add_shortcode( 'vc_video', 'vc_video_html' );