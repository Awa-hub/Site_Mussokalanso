<?php
/*
Element Description: Grassy Portfolio Box
*/
     // Element Mapping
    function rs_banner_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('RS Background Image', 'rubrash'),
                'base' => 'rs_background',
                'description' => __('RS Background Information', 'rubrash'), 
                'category' => __('by RS Theme', 'rubrash'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(

                	array(
                	    'type' => 'attach_image',
                	    'param_name' => 'background_image',
                	    'heading' => __('Select Background Image', 'rubrash'),
                   		'description' => __( 'Select your image here', 'brickx'),
                	),
                         
                    array(
                   		'type' => 'textfield',
                   		'heading' => __( 'Skill Title', 'brickx'),
                   		'param_name' => 'skill_title',
                   		'description' => __( 'Set your skill title here', 'brickx'),
                   	),

                   	array(
						'type' => 'param_group',
						'heading' => __( 'Values', 'js_composer' ),
						'param_name' => 'values',
						'description' => __( 'Enter values for graph - value, title and color.', 'js_composer' ),
						'value' => urlencode( json_encode( array(
							array(
								'label' => __( 'Development', 'js_composer' ),
								'value' => '90',
							),
							array(
								'label' => __( 'Design', 'js_composer' ),
								'value' => '80',
							),
							array(
								'label' => __( 'Marketing', 'js_composer' ),
								'value' => '70',
							),
						) ) ),
						'params' => array(
							array(
								'type' => 'textfield',
								'heading' => __( 'Label', 'js_composer' ),
								'param_name' => 'label',
								'description' => __( 'Enter text used as title of bar.', 'js_composer' ),
								'admin_label' => true,
							),
							array(
								'type' => 'textfield',
								'heading' => __( 'Value', 'js_composer' ),
								'param_name' => 'value',
								'description' => __( 'Enter value of bar.', 'js_composer' ),
								'admin_label' => true,
							),
							array(
								'type' => 'dropdown',
								'heading' => __( 'Color', 'js_composer' ),
								'param_name' => 'color',
								'value' => array(
										__( 'Default', 'js_composer' ) => '',
									) + array(
										__( 'Classic Grey', 'js_composer' ) => 'bar_grey',
										__( 'Classic Blue', 'js_composer' ) => 'bar_blue',
										__( 'Classic Turquoise', 'js_composer' ) => 'bar_turquoise',
										__( 'Classic Green', 'js_composer' ) => 'bar_green',
										__( 'Classic Orange', 'js_composer' ) => 'bar_orange',
										__( 'Classic Red', 'js_composer' ) => 'bar_red',
										__( 'Classic Black', 'js_composer' ) => 'bar_black',
									) + getVcShared( 'colors-dashed' ) + array(
										__( 'Custom Color', 'js_composer' ) => 'custom',
									),
								'description' => __( 'Select single bar background color.', 'js_composer' ),
								'admin_label' => true,
								'param_holder_class' => 'vc_colored-dropdown',
							),
							array(
								'type' => 'colorpicker',
								'heading' => __( 'Custom color', 'js_composer' ),
								'param_name' => 'customcolor',
								'description' => __( 'Select custom single bar background color.', 'js_composer' ),
								'dependency' => array(
									'element' => 'color',
									'value' => array( 'custom' ),
								),
							),
							array(
								'type' => 'colorpicker',
								'heading' => __( 'Custom text color', 'js_composer' ),
								'param_name' => 'customtxtcolor',
								'description' => __( 'Select custom single bar text color.', 'js_composer' ),
								'dependency' => array(
									'element' => 'color',
									'value' => array( 'custom' ),
								),
							),
						),
					),				
								
				  
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Icon color', 'brickx'),
						'param_name' => 'color',
						"value" => '#ffffff', //Default color
						"description" => __( "Choose color", "rubrash" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					),		
							
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Title color", "rubrash" ),
						"param_name" => "titlecolor",
						"value" => '#ffffff', //Default color
						"description" => __( "Choose color", "rubrash" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),					  
							 
					
					array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Tag line color", "rubrash" ),
					"param_name" => "linecolor",
					"value" => '#ffffff', //Default  color
					"description" => __( "Choose color", "rubrash" ),
					'admin_label' => false,
					'weight' => 0,
					'group' => 'Style',
				 ),	
				  array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
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
     add_action( 'vc_before_init', 'rs_banner_mapping' );
     
    // Element HTML
     function rs_banner_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'about_image'   => '',
                    'skill_title'   => '',
                    'about_title'   => '',
                    'progress_name'   => '',
                    'tagline' => '',					
					'titlecolor' => '',
					'column' =>'',
					'per_page' => '9',
					'el_class' => '',
					'icon_fontawesome' => 'fa fa-search',
					'color' => '',
					'css' => ''            
                ), 
                $atts,'rs_background'
           )
        );

        wp_register_style( 'about-css', plugins_url( '/css/about.css',  __FILE__) );
        wp_enqueue_style( 'about-css' );
	
        $image = wp_get_attachment_image_src( $about_image, 'full' );

        // foreach ( $values as $data ) {
        // 	$new_line = $data;
        // 	$new_line['value'] = isset( $data['value'] ) ? $data['value'] : 0;
        // 	$new_line['label'] = isset( $data['label'] ) ? $data['label'] : '';
        // 	$new_line['bgcolor'] = isset( $data['color'] ) && 'custom' !== $data['color'] ? '' : $custombgcolor;
        // 	$new_line['txtcolor'] = isset( $data['color'] ) && 'custom' !== $data['color'] ? '' : $customtxtcolor;
        // 	if ( isset( $data['customcolor'] ) && ( ! isset( $data['color'] ) || 'custom' === $data['color'] ) ) {
        // 		$new_line['bgcolor'] = ' style="background-color: ' . esc_attr( $data['customcolor'] ) . ';"';
        // 	}
        // 	if ( isset( $data['customtxtcolor'] ) && ( ! isset( $data['color'] ) || 'custom' === $data['color'] ) ) {
        // 		$new_line['txtcolor'] = ' style="color: ' . esc_attr( $data['customtxtcolor'] ) . ';"';
        // 	}

        // 	if ( $max_value < (float) $new_line['value'] ) {
        // 		$max_value = $new_line['value'];
        // 	}
        // 	$graph_lines_data[] = $new_line;
        // }

    	
	   //  $output .='<div class="rs-about row">
				//     <div class="col-lg-6 col-md-6 col-sm-12">
				//         <div class="about-left">
				//             <img src="'.$image[0].'" class="hidden-xs" alt="'.$about_title.'" />
				//             <div class="about-skill">
				//                 <h3>'.$skill_title.'</h3>
				//                 <div class="skill-list">';
				//                 		foreach ( $graph_lines_data as $line ) {
				//                 	        $output .='<div class="progress">
				//                 	            <div class="lead">' . $line['label'] . ' <span class="wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay="1s">100%</span></div>
				//                 	            <div class="progress-bar bg-success wow fadeInLeft" data-progress="100%" style="width: 100%;" data-wow-duration="1.2s" data-wow-delay="1s"> </div>
				//                 	        </div>';
				//                 	    }
				//                 $output .='</div>
				//             </div>
				//         </div>
				//     </div>
				//     <div class="col-lg-6 col-md-6 col-sm-12">
				//         <div class="about-right">
				//             <div class="display-table">
				//                 <div class="display-table-cell">
				//                     <div class="sec-title">
				//                         <h3>About Me !</h3>
				//                         <span>I m Sojib mahabub, Web Designer & Developer</span>
				//                     </div>
				//                     <p>Suspendisse ex neque, sollicitudin in velit eu, luctus gravida nunc. Nulla pulvinar risus sed metus euismod sodales ut sed nisi. Nulla posu ere suscip it finibus. Quis que placerat vitae lacus ut scelerisque.similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks rea sonable. The generated Lorem Ipsum.</p>
				//                     <ul>
				//                         <li><a href="#rs-portfolio" class="primary-btn mr-25 smoothPortfolio">My Portfolio</a></li>
				//                         <li><a href="#rs-contact" class="transparent-btn white-color smoothContact">Hire Me</a></li>
				//                     </ul>
				//                 </div>
				//             </div>
				//         </div>
				//     </div>
				// </div>';  


	    return $output;
    }

add_shortcode( 'rs_background', 'rs_banner_html' );  