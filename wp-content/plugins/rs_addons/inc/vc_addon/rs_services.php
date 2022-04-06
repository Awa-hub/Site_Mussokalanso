<?php
/*
Element Description: Rs Services Box
*/
    // Element Mapping
     function vc_RsServices_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Rs Service Box', 'brickx'),
                'base' => 'vc_RsServices',
                'description' => __('Rs Service Box Information', 'brickx'), 
                'category' => __('by RS Theme', 'brickx'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                         
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Rs Service Title ', 'brickx' ),
                        'param_name' => 'title',
                        'value' => __( '', 'brickx' ),
                        'description' => __( 'Rs services title here', 'brickx' ),
                        'admin_label' => false,
                        'weight' => 0,
                       
                    ),                   
             				
					array(
						"type" => "textarea_html",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Services content here", "brickx" ),
						"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a 	"param_name"
						"value" =>'',
						"description" => __( "Duis in mi erat. Phasellus vitae in to lorem vehicula, viverra libero quis, sodalesnulla. Donec at the turpis quis tellus laoreet.", "brickx" )
					 ),
					 
					 array(
						"type" => "dropdown",
						"heading" => __("Select Sevices Style", "brickx"),
						"param_name" => "service_style",
						"value" => array(						    
							'Style 1' => "1",						
							'Style 2' => "2",
							'Style 3' => "3",
							'Style 4' => "4",
							'Style 5' => "5",
						),						
					),

					  array(
					 	"type" => "dropdown",
					 	"heading" => __("Select Sevices Align", "brickx"),
					 	"param_name" => "service_align",
					 	"value" => array(						    
							'Left'   => "left",
							'Right'  => "right", 
							'Center' => "center",
					 	),						
					 ),
										
					array(
						"type"        => "attach_image",
						"heading"     => __( "Service Image", "brickx" ),
						"description" => __( "Add services image", "brickx" ),
						"param_name"  => "screenshots",
						"value"       => "",
						"dependency" => Array('element' => 'service_style', 'value' => array('2','3','4','5')),
					),
													
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Service Icon', 'brickx' ),
						'param_name' => 'icon_fontawesome',
						'value' => 'fa fa-users', // default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),					
						'description' => __( 'Select icon from library.', 'brickx' ),
						"dependency" => Array('element' => 'service_style', 'value' => array('1')),
					),
					
					array(
						'type' => 'textfield',
						'heading' => __( 'Read More Text', 'brickx' ),
						'param_name' => 'read_text',
						'description' => __( 'Type your read more button text here.', 'brickx' ),						
					),

					array(
						'type' => 'vc_link',
						'heading' => __( 'URL (Link)', 'brickx' ),
						'param_name' => 'button_link',
						'description' => __( 'Add link to Serices Pages.', 'brickx' ),						
					),
					
					array(
							'type' => 'textfield',
							'heading' => __( 'Extra class name', 'brickx' ),
							'param_name' => 'el_class',
							'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'brickx' ),
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
     
  add_action( 'vc_before_init', 'vc_RsServices_mapping' );
     
    // Element HTML
    function vc_RsServices_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'title'            => '',
					'icon_fontawesome' => 'fa fa-users',
					'icon'             => 'Image',
					'text_font'        => '',
					'el_class'         =>'',
					'service_style'    => '1',
					'service_align'    => 'left',
					'read_text'        => '',
					'button_link'      => '',
					'css'              => '','vc_RsServices'
                ), 
                $atts,'vc_RsServices'
            )
        );
	
        $a = shortcode_atts(array(
          'screenshots' => 'screenshots',
        ), $atts);
        
		
		//Link check
		
		//parse link for vc linke		
		$button_link = ( '||' === $button_link ) ? '' : $button_link;
		$button_link = vc_build_link( $button_link );
		$use_link = false;
		if ( strlen( $button_link['url'] ) > 0 ) {
			$use_link = true;
			$a_href = $button_link['url'];
			$a_title = $button_link['title'];
			$a_target = $button_link['target'];
		}
		
		if ( $use_link ) {
			$attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
			$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
			if ( ! empty( $a_target ) ) {
				$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
			}
		}
		$attributes = implode( ' ', $attributes );
		
		
		//Checl icon or image here		
		
        $img = wp_get_attachment_image_src($a["screenshots"], "large");
        // var_dump($img[0]);

        if(!empty($img[0])){
        	 $imgSrc = $img[0];
        	 $imageClass = '<a '. $attributes.'><img src="'.$imgSrc.'" alt="'.$title.'" /></a>';
        }

       
		
		
		$icon = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
		$iconClass='<i class="'.$icon.'"></i>';
		
		$read_text = ($read_text) ? '<a '.$attributes.' class="btn-more">'.$read_text.'</a>' : '';
       
        $service_title = '';

        if ($button_link != '') {
        	$service_title = '<h3 class="services-title services-title2"><a '. $attributes.'>'.$title.'</a></h3>';
        } else {
        	$service_title .= '<h3 class="services-title">'.$title.'</h3>';
        }

        

		//extract content
		$atts['content'] = $content;

		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
		 //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
  
		
        //checking services style
                
        // Fill $html var with data
		if($service_style=='1')
		{
        $html = '
		<div class="rs-services1 '.$service_align.'">
		<div class="services-wrap '.$css_class.' '.$css_class_custom.'"> 
         <div class="services-item">
            <div class="services-icon">
                '.$iconClass.'
             </div>
        
			<div class="services-desc">
				'.$service_title.'
				<p>'.$atts['content'].'</p>
				'.$read_text.'
				</div>
			</div>	
		</div></div>
	';   	
  	return $html;
	}
	else{
		$html = '<div class="rs-services"><div class="service-inner services-style-'.$service_style.' '.$service_align.' '.$css_class.' '.$css_class_custom.'">
		<div class="services-wrap"> 
         <div class="services-item">
            <div class="services-icon">
                '.$imageClass.'
             </div>
        
		<div class="services-desc">
			'.$service_title.'
			<p>'.$atts['content'].'</p>
			'.$read_text.'
		</div>		
		</div>	
	</div>
	</div></div>';   	
  		return $html;
	}
 }
add_shortcode( 'vc_RsServices', 'vc_RsServices_html' );
 