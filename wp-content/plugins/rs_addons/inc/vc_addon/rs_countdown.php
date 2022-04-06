<?php

	// Element Mapping
	 function vc_counter_mapping() {
         
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
         
    // Map the block with vc_map()
    vc_map( 
  
        array(
            'name' => __('Rs Counter', 'rsconstruction'),
            'base' => 'vc_counter',
            'description' => __('Rs counter for project', 'rsconstruction'), 
            'category' => __('by RS Theme', 'rsconstruction'),   
            'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',            
            'params' => array(   
                      
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Porject Title', 'brickx'),
                    'param_name' => 'title',
                    'value' => __( '', 'brickx'),
                    'description' => __( 'Project Title', 'brickx'),
                    'admin_label' => false,
                    'weight' => 0,
                   
                ),  
				
				array(
                    'type' => 'textfield',
                    'heading' => __( 'Counter Number', 'brickx'),
                    'param_name' => 'project',
                    'value' => __( '', 'brickx'),
                    'description' => __( 'Project counter (Example: 100 only number)', 'brickx'),
                    'admin_label' => false,
                    'weight' => 0,
                    
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Counter Post Text', 'brickx'),
                    'param_name' => 'post_text',
                    'value' => __( '', 'brickx'),
                    'description' => __( 'Counter post text here. Example: %, $ etc', 'brickx'),                    
                ),
                array(
					'type' => 'iconpicker',
					'heading' => __( 'Counter Icon', 'brickx'),
					'param_name' => 'icon_fontawesome',
					'value' => '', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => true,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),
				
					'description' => __( 'Select icon from library.', 'brickx'),
				),
                array(
                    "type" => "dropdown",
                    "heading" => __("Select Icon Align", "asvc"),
                    "param_name" => "align",
                    "value" => array(
                        __( 'Center', 'brickx') => '',
                        __( 'Left', 'brickx')   => 'left',
                        __( 'Right', 'brickx')  => 'right',
                    ),
                    "std" => 'style1',
                    "admin_label" => true,
                    "description" => __("", "asvc")
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Icon Color", "rsconstruction" ),
                    "param_name" => "icon_color",
                    "value" => '',
                    "description" => __( "Choose icon color here", "rsconstruction" ),
                    'group' => 'Styles',
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Number Color", "rsconstruction" ),
                    "param_name" => "number_color",
                    "value" => '',
                    "description" => __( "Choose number color here", "rsconstruction" ),
                    'group' => 'Styles',
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Title Color", "rsconstruction" ),
                    "param_name" => "title_color",
                    "value" => '',
                    "description" => __( "Choose title color here", "rsconstruction" ),
                    'group' => 'Styles',
                ),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'brickx'),
					'param_name' => 'el_class',
					'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'brickx'										                            ),
				),        
                     
           		 )
        )
    );                                
        
}

 add_action( 'vc_before_init', 'vc_counter_mapping' );
 
// Element HTML
function vc_counter_html( $atts ) {
     
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'title'            => 'Counter Title',
                'project'          => '',
                'post_text'        => '',
                'align'            => '',
                'icon_fontawesome' =>'',
                'icon_color'       =>'',
                'title_color'      =>'',
                'number_color'     =>'',
                'el_class'         =>'',
            ), 
            $atts,'vc_counter'
        )
    );
	
     //custom class added
	$wrapper_classes = array($el_class) ;			
	$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
	$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );

    $icon_color = ($icon_color) ? ' style="color: '.$icon_color.'"' : '';
    $title_color = ($title_color) ? ' style="color: '.$title_color.'"' : '';
    $number_color = ($number_color) ? ' style="color: '.$number_color.'"' : '';

    $post_text = ($post_text) ? '<span>'.$post_text.'</span>' : '';
    $count_icon = ($icon_fontawesome !== '') ? '<div class="count-icon"><i class="'.$icon_fontawesome.'"'.$icon_color.'></i></div>' : '';

    $html = '
	<div class="counter-top-area '.$align.'">
    <div class="rs-counter-list">
		'.$count_icon.'
        <div class="count-text"><div class="count-number"'.$number_color.'><h3 class="rs-counter"'.$number_color.'>' . $project. '</h3>'.$post_text.'</div>         
        <h4'.$title_color.'>'.$title.'</h4></div>
    </div></div>';
     
    return $html;
     
}
add_shortcode( 'vc_counter', 'vc_counter_html' );