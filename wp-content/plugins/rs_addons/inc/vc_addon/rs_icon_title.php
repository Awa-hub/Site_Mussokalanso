<?php
/*
Element Description: Rs Icon Title
*/

// Element Mapping
function vc_Icon_Title_mapping() {
     
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
        return;
    }
     
    // Map the block with vc_map()
    vc_map( 
        array(
            'name' => __('Rs Icon Title', 'brickx'),
            'base' => 'vc_icon_title',
            'description' => __('Rs Icon Title', 'brickx'), 
            'category' => __('by RS Theme', 'brickx'),   
            'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
            'params' => array(   
                     
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Title ', 'brickx' ),
                    'param_name' => 'title',
                    'value' => __( '', 'brickx' ),
                    'description' => __( 'Icon title here', 'brickx' ),
                    'admin_label' => false,
                    'weight' => 0,                   
                ),                   
         									 
				array(
					"type" => "dropdown",
					"heading" => __("Select Icon Type", "brickx"),
					"param_name" => "icon_type",
					"value" => array(						    
						'Icon' => "icon",
						'Image' => "image"
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
					"heading"     => __( "Select Image", "brickx" ),
					"description" => __( "Add your image here", "brickx" ),
					"param_name"  => "screenshots",
					"value"       => "",
					"dependency" => Array('element' => 'icon_type', 'value' => array('image')),
				),		
												
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Select Icon', 'brickx' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-users', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),					
					'description' => __( 'Select icon from library.', 'brickx' ),
					"dependency" => Array('element' => 'icon_type', 'value' => array('icon')),
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
     
  add_action( 'vc_before_init', 'vc_Icon_Title_mapping' );
     
    // Element HTML
    function vc_Icon_Title_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'icon_type'        => 'icon',
					'tile'             => 'dsAD',
					'icon_fontawesome' => 'fa fa-users',
					'text_font'        => '',
					'el_class'         =>'',
					'service_style'    => '1',
					'service_align'    => 'left',
					'button_link'      => '',
					'css'              => '',
                ), 
                $atts,'vc_icon_title'
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
		
              
       	if ($icon_type == 'image') {
	        $img = wp_get_attachment_image_src($a["screenshots"], "large");

	        $imgSrc = $img[0];
			$imageClass = '<a '. $attributes.'><img src="'.$imgSrc.'" alt="'.$title.'" /></a>';
       	} else {
       		$icon = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
       		$iconClass='<i class="'.$icon.'"></i>';
       	}        


		//extract content
		$atts['content'] = $content;

		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
		 //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
  
	
        $html = '
		<div class="rs-icon-title '.$css_class.' '.$css_class_custom.'"> 
            <div class="rs-icon-wrap">
                '.$icon_type.'
            </div>
			<div class="rs-desc-wrap">
				'.$title.'
			</div>
		</div>
	';   	
  	return $html;
 }
add_shortcode( 'vc_icon_title', 'vc_Icon_Title_html' );
 