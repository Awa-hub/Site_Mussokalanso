<?php
/*
Element Description: Rs Custom Heading*/

    // Element Mapping
    function vc_infobox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Rs Heading', 'rsconstruction'),
                'base' => 'vc_infobox',
                'description' => __('Rs heading box', 'rsconstruction'), 
                'category' => __('by RS Theme', 'rsconstruction'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                         
			array(
				'type'        => 'textfield',
				'holder'      => 'h3',
				'class'       => 'title-class',
				'heading'     => __( 'Title', 'brickx'),
				'param_name'  => 'title',
				'value'       => __( '', 'brickx'),
				'description' => __( 'Heading title area', 'brickx'),
				'admin_label' => false,
				'weight'      => 0,
			   
			),  
			 
			array(
				'type'        => 'textfield',
				'holder'      => 'h4',
				'class'       => 'text-class',
				'heading'     => __( 'Subtitle', 'brickx'),
				'param_name'  => 'sub_text',
				'value'       => __( '', 'brickx'),
				'description' => __( 'Sub title text here', 'brickx'),
				'admin_label' => false,
				'weight'      => 0,                        
			),

			array(
				'type'        => 'textfield',
				'heading'     => __( 'Watermark Text', 'brickx'),
				'param_name'  => 'watermark',
				'value'       => __( '', 'brickx'),
				'description' => __( 'Watermark text here', 'brickx'),                   
			),	

			array(
				'type'        => 'textarea_html',
				'heading'     => __( 'Text', 'brickx'),
				'param_name'  => 'content',
				'value'       => __( '', 'brickx'),
				'description' => __( 'Description text here', 'brickx'),                    
			),
			array(
			    "type" => "dropdown",
			    "heading" => __("Select Align", "rsconstruction"),
			    "param_name" => "align",
			    "value" => array(
			        __( 'Left', 'brickx')   => '',
			        __( 'Center', 'brickx') => 'center',
			        __( 'Right', 'brickx')  => 'right',
			    ),
			),

			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Title color", "rsconstruction" ),
				"param_name" => "title_color",
				"value" => '',
				"description" => __( "Choose title color", "rsconstruction" ),
                'group' => 'Styles',
			),

			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Sub Text Color", "rsconstruction" ),
				"param_name" => "sub_text_color",
				"value" => '',
				"description" => __( "Choose sub text color here", "rsconstruction" ),
                'group' => 'Styles',
			),

			array(
				'type'        => 'textfield',
				'heading'     => __( 'Extra class name', 'brickx'),
				'param_name'  => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'brickx'),
			),		                     
						
			array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'brickx'),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'brickx'),
			),                  
                        
         ),
      )
   );                                
        
}
  
add_action( 'vc_before_init', 'vc_infobox_mapping' );
  
// Element HTML
function vc_infobox_html($atts, $content) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'title'          => '',
					'title_color'    => '',
					'sub_text'       => '',
					'sub_text_color' => '',
					'watermark'      => '',
					'description'    => '',
					'align'          => '',
					'el_class'       =>'',
					'css'            => ''
                ), 
                $atts, 'vc_infobox'
            )
        );

		//for css edit box value extract
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
         //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );

		$title_color = ($title_color) ? ' style="color: '.$title_color.'"' : '';
		$sub_text_color = ($sub_text_color) ? ' style="color: '.$sub_text_color.'"' : '';

		$watermark_text = ($watermark) ? '<span class="watermark">'.wp_kses_post($watermark).'</span>' : '';
		$main_title = ($title) ? '<h2'.$title_color.'>'.$watermark_text.''.wp_kses_post($title).'</h2>' : '';
		$sub_text = ($sub_text) ? '<span'.$sub_text_color.' class="sub-text">'.wp_kses_post($sub_text).'</span>' : '';
         
        // Fill $html var with data
        $html = '
        <div class="rs-heading '.$css_class.' '.$css_class_custom.' '.$align.'">
        	<div class="title-inner">
	            '.$sub_text.'
	            '.$main_title.'
	        </div>';
	        if ($content) {
            	$html .= '<div class="description"><p>'.$content.'</p></div>';
        	}
        $html .= '</div>';  	
         
        return $html;         
    }
add_shortcode( 'vc_infobox', 'vc_infobox_html' );