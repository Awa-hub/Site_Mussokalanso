<?php
/*
Element Description: Grassy Call to Box
*/
 
// Element Class 

function graasy_call_to_action() {   

  // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Grassy Call to Action', 'appone'),
                'base' => 'vc_grassyCallBox',
                'description' => __('Grassy Call to Action Information', 'appone'), 
                'category' => __('by RS Theme', 'appone'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                         
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Grassy Expereince Years', 'brickx'),
                        'param_name' => 'years',
                        'value' => __( '', 'brickx'),
                        'description' => __( 'Expereince years here', 'brickx'),
                        'admin_label' => false,
                        'weight' => 0,
                       
                    ),  
                     
             				
					array(
						"type" => "textarea_html",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Tag Line", "appone" ),
						"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a 	"param_name"
						"value" =>'',
						"description" => __( "Enter your tag line content.", "appone" )
					 ),
								
										
					 array(
                        'type' => 'textfield',
                        'holder' => 'h4',
                        'class' => 'tag-btn',
                        'heading' => __( 'Button Text', 'brickx'),
                        'param_name' => 'tag_btn',
                        'value' => __( '', 'brickx'),
                        'description' => __( 'Tag line button text here', 'brickx'),
                        'admin_label' => false,
                        'weight' => 0,                        
                    ),	
					
					array(
						'type' => 'vc_link',
						'heading' => __( 'URL (Link)', 'brickx'),
						'param_name' => 'tag_link',
						'description' => __( 'Add link to button.', 'brickx'),
						// compatible with btn2 and converted from href{btn1}
					),										
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'brickx'),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'brickx'),
					),	
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Years color", "appone" ),
						"param_name" => "yearcolor",
						"value" => '#4caf50', //Default Red color
						"description" => __( "Choose years color", "appone" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),
					 
					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Tag line color", "appone" ),
						"param_name" => "tagline",
						"value" => '#212121', //Default Red color
						"description" => __( "Choose Tag line color", "appone" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),
                     
					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Background color", "appone" ),
						"param_name" => "btn-color",
						"value" => '#ffffff', //Default Red color
						"description" => __( "Choose Button color", "appone" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),
                     
					  array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Border color", "appone" ),
						"param_name" => "btn_bordercolor",
						"value" => '#4caf50', //Default Red color
						"description" => __( "Choose Button Border color", "appone" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),
					 
                    array(
                        'type' => 'google_fonts',
                        'param_name' => 'text_font',
                        'settings' => array(
                            'fields' => array(
                                'font_family_description' => __( 'Select Font Family.', 'brickx'),
                                'font_style_description' => __( 'Select Font Style.', 'brickx'),
                            ),
                        ), 
                        'weight' => 0,
                        'group' => 'Style',                    
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
	
add_action( 'vc_before_init', 'graasy_call_to_action' );

/*
*
* @param array $atts    - the attributes of shortcode
* @param string $content - the content between the shortcodes tags
*
* @return string $html - the HTML content for this shortcode.
*/
// Element HTML
 function vc_grassyCallBox_html( $atts, $content ) {
         $attributes = array();
        // Params extraction
         extract(
			$atts = shortcode_atts(	
                array(
                    'years'   => '4caf50',
                    'tag_btn' => '',
					'tag_link' => '',
					'btn_color' => '',
					'tag_btn' =>'',
					'btn_bordercolor' => '',
					'el_class' =>'',
					'text_font' => '',
					'css' => ''
                ), 
                $atts,'vc_grassyCallBox'
            )
        );
		//extract content
		$atts['content'] = $content;
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		//parse link for vc link		
		$tag_link = ( '||' === $tag_link ) ? '' : $tag_link;
		$tag_link = vc_build_link( $tag_link );
		$use_link = false;
		if ( strlen( $tag_link['url'] ) > 0 ) {
			$use_link = true;
			$a_href = $tag_link['url'];
			$a_title = $tag_link['title'];
			$a_target = $tag_link['target'];
		}
		
		if ( $use_link ) {
			$attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
			$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
			if ( ! empty( $a_target ) ) {
				$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
			}
		}
		$attributes = implode( ' ', $attributes );
		
		 //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
      
        $html = '
        <div class="rs-about '.$css_class_custom.'">
			<div class="about-exp '.$css_class.'" style="border:5px solid '.$btn_bordercolor.' ">
					<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<h2 class="exp-title">'.$atts['years'].'</h2>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<p class="exp-desc mt-5">
							'.$atts['content'].' 
						</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="text-right">
							<a ' . $attributes . ' class="readon border mt-30">'.$tag_btn.'</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	';           
	return $html;
  }
add_shortcode( 'vc_grassyCallBox', 'vc_grassyCallBox_html' );
?>