<?php
/*
Element Description: Rs Team Box
*/
     
    // Element Mapping
    function vc_grassyTeam_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        
        $category_dropdown = array( __( 'All Categories', 'brickx' ) => '0' );	
        $args = array(
            'taxonomy' => array('team-category'),//ur taxonomy
            'hide_empty' => false,                  
        );

		$terms_= new WP_Term_Query( $args );
		foreach ( (array)$terms_->terms as $term ) {
			$category_dropdown[$term->name] = $term->slug;		
		} 
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Rs Team Showcase', 'brickx'),
                'base' => 'vc_grassyTeam',
                'description' => __('Rs Team Showcase Information', 'brickx'), 
                'category' => __('by RS Theme', 'brickx'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                         
                     array(
						"type" => "dropdown",
						"heading" => __("Show title", "brickx"),
						"param_name" => "title",
						"value" => array(							    						
							'Yes' => "Yes", 
							'No' => "No",																																										
						),
						
					),  
					array(
					"type" => "dropdown_multi",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Categories", 'brickx' ),
					"param_name" => "cat",
					'value' => $category_dropdown,
					),                    
             				
					array(
						"type" => "dropdown",
						"heading" => __("Show Short Degination", "brickx"),
						"param_name" => "degination",
						"value" => array(	
						    						
							'Yes' => "Yes", 
							'No' => "No", 																																															
						),
						
					),
					
					array(
						"type" => "dropdown",
						"heading" => __("Show Short Description", 'brickx'),
						"param_name" => "description",
						"value" => array(	
						    						
							'Yes' => "Yes", 
							'No' => "No", 																																															
						),
						
					),	
					
					array(
						"type" => "textfield",
						"heading" => __("Team Per Pgae", "brickx"),
						"param_name" => "team_per",
						'value' =>"6",
						'description' => __( 'You can write how many team member show. ex(2)', 'brickx' ),					
					),	


					array(
						"type" => "dropdown",
						"heading" => __("Team Type", "brickx"),
						"param_name" => "type",
						"value" => array(							
							'Slider' => "Slider", 
							'Grid' => "Grid"											
						),
						
					),

					array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'brickx' ),
					"param_name" => "col_lg",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "3",
					"group" 	  => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),	
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'brickx' ),
					"param_name" => "col_md",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "3",
					"group" 	  => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'brickx' ),
					"param_name" => "col_sm",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "3",
					"group" 	  => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'brickx' ),
					"param_name" => "col_xs",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "2",
					"group" 	  => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Small Phones < 480px )", 'brickx' ),
					"param_name" => "col_mobile",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "1",
					"group" 	  => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),

					array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Dots", 'brickx' ),
					"param_name" => "slider_dots",
					"value" => array(
						__( 'Disabled', 'brickx' ) => 'false',
						__( 'Enabled', 'brickx' )  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'brickx' ),
					"group" => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'brickx' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( "Enable", "brickx" )  => 'true',
						__( "Disable", "brickx" ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'brickx' ),
					"group" => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'brickx' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( "Enable", "brickx" )  => 'true',
						__( "Disable", "brickx" ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'brickx' ),
					"group" => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),

				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Interval", 'brickx' ),
					"param_name"  => "slider_interval",
					"value" 	  => array( 
						__( "5 Seconds", "brickx" )  => '5000',
						__( "4 Seconds", "brickx" )  => '4000',
						__( "3 Seconds", "brickx" )  => '3000',
						__( "2 Seconds", "brickx" )  => '4000',
						__( "1 Seconds", "brickx" )  => '1000',
						),
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'brickx' ),
					"group" 	  => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),
				array(
					"type"		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Slide Speed", 'brickx' ),
					"param_name"  => "slider_autoplay_speed",
					"value" 	  => 200,
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'brickx' ),
					"group" 	  => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),	
				array(
					"type" 		 => "dropdown",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Loop", 'brickx' ),
					"param_name" => "slider_loop",
					"value" 	 => array( 
						__( "Enable", "brickx" )  => 'true',
						__( "Disable", "brickx" ) => 'false',
						),
					"description"=> __( "Loop to first item. Default: Enable", 'brickx' ),
					"group" 	 => __( "Slider Options", 'brickx' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),

					array(
						"type" => "dropdown",
						"heading" => __("Select Team Grid", "brickx"),
						"param_name" => "team_col",
						"value" => array(							
							'2 Column' => "2 Column", 
							'3 Column' => "3 Column",
							'4 Column' => "4 Column",
							'Full Width' => "Full Width"																	
						),
						"dependency" => Array('element' => 'type', 'value' => array('Grid')),
						
					),	

					array(
						"type" => "dropdown",
						"heading" => __("Select Team Style", "brickx"),
						"param_name" => "team_style",
						"value" => array(							
							'Style 1' => "Style 1", 
							'Style 2' => "Style 2",
							'Style 3' => "Style 3",
							'Style 4' => "Style 4"																																														
						),
						"dependency" => Array('element' => 'type', 'value' => array('Grid')),						
					),
					array(
						"type" => "dropdown",
						"heading" => __("Select Team Style", "brickx"),
						"param_name" => "slider_style",
						"value" => array(							
							'Style 1' => "team-slider-style1", 
							'Style 2' => "team-slider-style2"
						),
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),						 
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Team Icon', 'brickx' ),
						'param_name' => 'icon_fontawesome',
						'value' => 'fa fa-users', // default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
					
						'description' => __( 'Select icon from library.', 'brickx' ),
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
     
   add_action( 'vc_before_init', 'vc_grassyTeam_mapping' );
     
    // Element HTML
    function vc_grassyTeam_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'title'                 => '',
					'degination'            => '',		
					'description'           => '',	
					'team_per'              => '6',				
					'icon_fontawesome'      => 'fa fa-users',
					'type'                  => 'Slider',	
					'team_col'              => '',
					'team_style'            => 'Style 1',
					'slider_style'          => 'team-slider-style1',
					'col_lg'                => '3',
					'col_md'                => '3',
					'col_sm'                => '3',
					'col_xs'                => '2',
					'col_mobile'            => '1',
					'slider_nav'            => 'true',
					'slider_dots'           => 'false',
					'slider_autoplay'       => 'true',
					'slider_stop_on_hover'  => 'true',
					'slider_interval'       => '5000',
					'slider_autoplay_speed' => '200',
					'slider_loop'           => 'true',				
					'css'                   => '' ,
					'cat'					=> '',           
                ), 
                $atts,'vc_grassyTeam'
           )
        );
	
        $a = shortcode_atts(array(
            'screenshots' => 'screenshots',
        ), $atts);

        $img = wp_get_attachment_image_src($a["screenshots"], "large");
        // $imgSrc = $img[0];
        if(!empty($img[0])){
        	 $imgSrc = $img[0];
        }
		
		//extract content
		$atts['content'] = $content;

		//extact icon 
		$iconClass = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts ); 

		$owl_data = array( 
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'dots'               => ( $slider_dots === 'true' ) ? true : false,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
			'autoplayTimeout'    => $slider_interval,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
			'loop'               => ( $slider_loop === 'true' ) ? true : false,
			'margin'             => 20,
			'responsive'         => array(
				'0'    => array( 'items' => $col_mobile ),
				'480'  => array( 'items' => $col_xs ),
				'768'  => array( 'items' => $col_sm ),
				'992'  => array( 'items' => $col_md ),
				'1200' => array( 'items' => $col_lg ),
				)				
			);
		$owl_data = json_encode( $owl_data );	           


        if($type == 'Slider'){

		$html='<div class="rs-team '.$slider_style.'">
		<div class="team-carousel owl-carousel owl-navigation-yes" data-carousel-options="'.esc_attr( $owl_data ).'">';		
		$post_title_show='';
		$degination='';
		$description_team='';
			
        //******************//
        // query post
        //******************//
        $cat;
        $arr_cats=array();
        $arr= explode(',', $cat);  

			for ($i=0; $i < count($arr) ; $i++) { 
           	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
           	// if(is_object($cats)):
           	$arr_cats[]= $arr[$i];
           	//endif;
        }  

		if(empty($cat)){
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					
			));	  
        }   
        else{
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					'tax_query' => array(
				        array(
				            'taxonomy' => 'team-category',
				            'field' => 'slug', //can be set to ID
				            'terms' => $arr_cats//if field is ID you can reference by cat/term number
				        ),
				    )
			));	  
        }  
			while($best_wp->have_posts()): $best_wp->the_post();
			   $post_title= get_the_title($best_wp->ID);
			   
			    if($title!='No'){
			   		 $post_title_show= get_the_title($best_wp->ID);
				}		
						
			    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
			    $post_url=get_post_permalink($best_wp->ID); 
				
				if($degination!='No'){
			    $designation = get_post_meta( get_the_ID(), 'designation', true );
				}
			    
				if($description!='No'){
			    $description_team = get_post_meta( get_the_ID(), 'description', true );
				}
			   
				
				//retrive social icon values
				
				 $facebook = get_post_meta( get_the_ID(), 'facebook', true );
				 $twitter = get_post_meta( get_the_ID(), 'twitter', true );
				 $google_plus = get_post_meta( get_the_ID(), 'google_plus', true );
				 $linkedin = get_post_meta( get_the_ID(), 'linkedin', true );
				 $fb='';
				 $tw='';
				 $gp='';
				 $ldin='';				 
				if($facebook!=''){
					$fb='<a href="'.$facebook.'" class="social-icon"><i class="fa fa-facebook"></i></a> ';
				}
				if($twitter!=''){
					$tw='<a href="'.$twitter.'" class="social-icon"><i class="fa fa-twitter"></i></a>';
				}
				if($google_plus!=''){
					$gp='<a href="'.$google_plus.'" class="social-icon"><i class="fa fa-google-plus"></i></a> ';
				}
				if($linkedin!=''){
					$ldin='<a href="'.$linkedin.'" class="social-icon"><i class="fa fa-pinterest-p"></i></a>';
				}				 
				$team_normal_text = '<h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
				<span class="team-title">'.$designation.'</span>';

			if ($slider_style == 'team-slider-style2') {
				$html .='<div class="team-item-wrap">
				    <div class="team-img">
				        <img src="'.$post_img_url.'" alt="'.$post_title.'" />
				        <div class="normal-text">
				            '.$team_normal_text.'
				        </div>
				    </div>
				    <div class="team-content">
				        <div class="overly-border"></div>
				        <div class="display-table">
				            <div class="display-table-cell">
				                <h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
				                <span class="team-title">'.$designation.'</span>
				                <p class="team-desc">'.$description_team.'</p>
			                  	<div class="team-social">			  
			                  	  '.$fb.'
			                	  '.$gp.'
			                	  '.$tw.'
			                	  '.$ldin.'	
			                  	</div>
				            </div>
				        </div>
				    </div>
				</div>';
			} else {
				$html .='<div class="team-item">
						<div class="team-inner-wrap">
							<div class="team-img"> <img src="'.$post_img_url.'" alt="'.$post_title.'" />
								<div class="overlay">
								    <div class="overly-border"></div>
								    <div class="overlay-element">
								        <div class="social-icons">
											'.$fb.'
											'.$gp.'
											'.$tw.'
											'.$ldin.'
								        </div>
								    </div>
								</div>
							</div>
							<div class="team-content">
							  <h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
							  <span class="team-title">'.$designation.'</span>
							</div>
				  		</div>
				  	</div>';
			}				 	
			
		endwhile; 
       	wp_reset_query();
		$html .='</div>
	   <div>
	 </div>
	</div>'
	;
    return $html; 
    }


	if($type == 'Grid'){
		//Slect grid layout
		 $team_col_grid ='';		
		//echo $team_col;
        if($team_col == '2 Column'){
        	$team_col_grid = 6;
        }
         if($team_col == '3 Column'){
        	$team_col_grid = 4;
        }
         if($team_col == '4 Column'){
        	$team_col_grid = 3;
        }
         if($team_col == 'Full Width'){
        	$team_col_grid = 12;
        }

        $team_style_grid = '';

        if($team_style == 'Style 1'){
        	$team_style_grid = 'team-style1';
        }

         if($team_style == 'Style 2'){
        	$team_style_grid = 'team-style2';
        }
         if($team_style == 'Style 3'){
        	$team_style_grid = 'team-style3';
        }
         if($team_style == 'Style 4'){
        	$team_style_grid = 'team-style4';
        }

		$html='<div class="rs-team"><div class="team-gird">';		
		$post_title_show ='';
		$degination ='';
		$description_team = '';        
		$arr_cats=array();
        $arr= explode(',', $cat);
			for ($i=0; $i < count($arr) ; $i++) { 
           	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
           	// if(is_object($cats)):
           	$arr_cats[]= $arr[$i];
           	//endif;
        }   

        if($cat == 0 || $cat == ''){
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					
			));	  
        }   
        else{
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					'tax_query' => array(
				        array(
				            'taxonomy' => 'team-category',
				            'field' => 'slug', //can be set to ID
				            'terms' => $arr_cats//if field is ID you can reference by cat/term number
				        ),
				    )
			));	  
        }      

		    
		
			while($best_wp->have_posts()): $best_wp->the_post();
			   $post_title= get_the_title($best_wp->ID);
			   $post_content= get_the_content($best_wp->ID);
			   $trimmed_content = wp_trim_words( $post_content, 60, '...' );
			   
			    if($title!='No'){
			   		 $post_title_show = get_the_title($best_wp->ID);
				}		
						
			    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
			    $post_url=get_post_permalink($best_wp->ID); 
				
				if($degination!='No'){
			     $designation = get_post_meta( get_the_ID(), 'designation', true );
				}
			    
				if($description!='No'){
			     $description_team = get_post_meta( get_the_ID(), 'description', true );
				}

			   $team_normal_text = '<h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
			   <span class="team-title">'.$designation.'</span>';
				
				//retrive social icon values
				
				 $facebook = get_post_meta( get_the_ID(), 'facebook', true );
				 $twitter = get_post_meta( get_the_ID(), 'twitter', true );
				 $google_plus = get_post_meta( get_the_ID(), 'google_plus', true );
				 $linkedin = get_post_meta( get_the_ID(), 'linkedin', true );
				 $fb='';
				 $tw='';
				 $gp='';
				 $ldin='';
				 if($facebook!=''){
					 $fb='<a href="'.$facebook.'" class="social-icon"><i class="fa fa-facebook"></i></a> ';
				}
				 if($twitter!=''){
					 $tw='<a href="'.$twitter.'" class="social-icon"><i class="fa fa-twitter"></i></a>';
				}
				 if($google_plus!=''){
					 $gp='<a href="'.$google_plus.'" class="social-icon"><i class="fa fa-google-plus"></i></a> ';
				}
				 if($linkedin!=''){
					 $ldin='<a href="'.$linkedin.'" class="social-icon"><i class="fa fa-pinterest-p"></i></a>';
				}
				 
				if($team_style_grid=='team-style1'){	
				$html .='<div class="col-md-'.$team_col_grid.' col-sm-6 col-xs-12 '.$team_style_grid.'">
							<div class="team-item">
								<div class="team-img"> <img src="'.$post_img_url.'" alt="'.$post_title.'" />
									<div class="overlay">
									    <div class="overly-border"></div>
									    <div class="overlay-element">
									        <div class="social-icons">
												'.$fb.'
												'.$gp.'
												'.$tw.'
												'.$ldin.'
									        </div>
									    </div>
									</div>
								</div>
								<div class="team-content">
								  <h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
								  <span class="team-title">'.$designation.'</span>
								</div>
						  	</div>
			  			</div>';
				}

				if($team_style_grid == 'team-style2'){	
						$html .='<div class="team-item col-md-'.$team_col_grid.' col-sm-6 col-xs-12 '.$team_style_grid.'">
							<div class="team-inner-wrap">
							    <div class="team-img">
							        <img src="'.$post_img_url.'" alt="'.$post_title.'" />
							        <div class="normal-text">
							            '.$team_normal_text.'
							        </div>
							    </div>
							    <div class="team-content">
							        <div class="overly-border"></div>
							        <div class="display-table">
							            <div class="display-table-cell">
							                <h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
							                <span class="team-title">'.$designation.'</span>
							                <p class="team-desc">'.$description_team.'</p>
						                  	<div class="team-social">			  
						                  	  '.$fb.'
						                	  '.$gp.'
						                	  '.$tw.'
						                	  '.$ldin.'	
						                  	</div>
							            </div>
							        </div>
							    </div>
							</div>
					  </div>		
					';
				}
				if($team_style_grid == 'team-style3'){	
						$html .='<div class="team-item col-md-'.$team_col_grid.' col-sm-6 col-xs-12 '.$team_style_grid.'">
							<div class="team-wrapper">
							    <div class="team_photo">
							        <a href="'.$post_url.'">
										<img src="'.$post_img_url.'" class="img_team" alt="'.$post_title.'" />
							        </a>
							    </div>
							    <div class="team_desc">
							        <div class="name">
							        	<a href="'.$post_url.'">'.$post_title_show.'</a>
							            <div class="designation">'.$designation.'</div>
							        </div>

							        <div class="team-social">
										'.$fb.'
										'.$gp.'
										'.$tw.'
										'.$ldin.'
							        </div>
							    </div>
							</div>
					  	</div>';
				}
				if($team_style_grid=='team-style4'){	
						$html .='<div class="col-md-'.$team_col_grid.' col-sm-6 col-xs-12 '.$team_style_grid.'">
							<div class="inner">
								<div class="row">
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="team-img">
											<a href="'.$post_url.'"><img src="'.$post_img_url.'" alt="'.$post_title.'" /></a>
										</div>
									</div>
									<div class="col-md-9 col-sm-6 col-xs-12">		
										<div class="team-content">
										  <div class="display-table">
											<div class="display-table-cell">
											  <h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
											  <span class="team-title">'.$designation.'</span>
											  <p class="team-desc">'.$trimmed_content.'</p>
											</div>
										  </div>
										  	<div class="team-social">			  
										  	  '.$fb.'
											  '.$gp.'
											  '.$tw.'
											  '.$ldin.'			
										  	</div>
										</div>
									</div>	
								</div>
							</div>
					  </div>		
					';
				}
endwhile; 
wp_reset_query();


$html .='</div></div>';

        return $html; 
	}
}

add_shortcode( 'vc_grassyTeam', 'vc_grassyTeam_html' );