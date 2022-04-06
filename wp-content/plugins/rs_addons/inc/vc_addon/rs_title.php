<?php
/*
Element Description: Custom Heading*/

    // Element Mapping
    function vc_single_title_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Single Title', 'brickx'),
                'base' => 'vc_single_title',
                'description' => __('Add single title', 'brickx'),
                'category' => __('by RS Theme', 'brickx'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                         
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
				'type' => 'textfield',
				'heading' => __( 'Font Size', 'brickx' ),
				'param_name' => 'el_fontsize',				
				'description' => __( 'add your tiitle font size as like ex(10px).', 'brickx' ),
			),	 
						
			array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'brickx' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
			),					
			
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Title color", "brickx" ),
				"param_name" => "titlecolor",
				"value" => '#4caf50', //Default Red color
				"description" => __( "Choose title color", "brickx" ),
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
  
add_action( 'vc_before_init', 'vc_single_title_mapping' );
  
 // Element HTML
 function vc_single_title_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
					'titlecolor' => '',					
					'el_class' =>'',
					'el_fontsize' => '24px',
					'css' => ''
                ), 
                $atts, 'vc_single_title'
            )
        );
		
		//for css edit box value extract
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
        //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
		
		//fontsize
		$wrapper_classes_font = array($el_fontsize) ;			
		$class_to_font = implode( ' ', array_filter( $wrapper_classes_font ) );		
		$css_class_font = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_font, $atts );
		$font_style_size='font-size:'.$css_class_font.'';
  
         
        // Fill $html var with data
        $html = '
        <div class="sec-title-single '.$css_class.' '.$css_class_custom.'">         
            <h3 style="color:'.$titlecolor.'; '.$font_style_size.'">'.$title.'</h3>             
                   
        </div>';   	
         
        return $html;
         
    }
add_shortcode( 'vc_single_title', 'vc_single_title_html' );