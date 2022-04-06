<?php
/*
Element Description: Rs Blog Box*/
    
    // Element Mapping
     function vc_rsBlog_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }  

        $categories = get_categories();
		$category_dropdown = array( 'All Categories' => '0' );

		foreach ( $categories as $category ) {
			$category_dropdown[$category->name] = $category->slug;
		}    
        // Map the block with vc_map()
        vc_map( 
            array(
				'name'        => __('Rs Blog Module', 'brickx'),
				'base'        => 'vc_rsBlog',
				'description' => __('Blog Module', 'brickx'), 
				'category'    => __('by RS Theme', 'brickx'),   
				'icon'        => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
				'params'      => array(			
		            array(
						"type"       => "dropdown",
						"heading"    => __("Show title", 'brickx'),
						"param_name" => "title",
						"value"      => array(				    						
							'Yes' => "Yes", 
							'No'  => "No",											
						),						
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Author Info", 'brickx'),
						"param_name" => "blog_information",
						"value" 	 => array(			    						
							'No'  => "",											
							'Yes' => "yes", 
						),
					),					
					array(
						"type"       => "dropdown",
						"heading"    => __("Show Short Description", 'brickx'),
						"param_name" => "description",
						"value"      => array(	
						    'No' => "", 						    						
							'Yes' => "Yes", 
																								
						),						
					),                    
                    array(
						"type"       => "dropdown",
						"heading"    => __("Show ReadMore", 'brickx'),
						"param_name" => "readmore",
						"value"      => array(
							'No' => "",
							'Yes' => "Yes",
							
						),						
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Read More Type", 'brickx'),
						"param_name" => "readmore_type",
						"value"      => array(
						    'Select' => "",						    						
							'Text' => "rm_text", 
							'Icon' => "rm_icon",
						),
						"dependency" => Array('element' => 'readmore', 'value' => array('Yes')),						
					),
					array(
						"type" => "textfield",
						"heading" => __("Read More Text", 'brickx'),
						"param_name" => "more_text",
						'description' => __( 'Type your read more text here', 'brickx' ),
						"dependency" => Array('element' => 'readmore_type', 'value' => array('rm_text')),
					),
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Read More Icon', 'brickx' ),
						'param_name' => 'more_icon',
						'value' => 'fa fa-users', // default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'iconsPerPage' => 2000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),					
						'description' => __( 'Select icon from library.', 'brickx' ),
						"dependency" => Array('element' => 'readmore_type', 'value' => array('rm_icon')),
					),
					array(
						"type"       => "dropdown_multi",
						"holder"     => "div",
						"class"      => "",
						"heading"    => __( "Categories", 'brickx' ),
						"param_name" => "cat",
						'value'      => $category_dropdown,
					),					
					array(
						"type"       => "dropdown",
						"heading"    => __("Blog Style", 'brickx'),
						"param_name" => "blog_style",
						"value"      => array(						    						
							'Slider' => "Slider", 
							'Grid' => "Grid",									
						),						
					),
					array(
							"type"       => "dropdown",
							"heading"    => __("Blog Column Per Row", 'brickx'),
							"param_name" => "pre_row",
							"value"      => array(							
								'Col-1' => "Col-1", 
								'Col-2' => "Col-2",
								'Col-3' => "Col-3",	
								'Col-4' => "Col-4",																						
							),
							"dependency" => Array('element' => 'blog_style', 'value' => array('Grid')),						
						),	
					
					array(
						"type" => "textfield",
						"heading" => __("Post Per page", 'brickx'),
						"param_name" => "post_per",
						'description' => __( 'Write -1 to show all', 'brickx' ),										
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),	
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
     
  add_action( 'vc_before_init', 'vc_rsBlog_mapping' );    
 
     
   function vc_rsBlog_html( $atts, $content ='' ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					
					'title'                 => '',
					'degination'            => '',	
					'post_per'              => '',	
					'description'           => '',
					'blog_style'            =>'Slider',
					'blog_information'      =>'',
					'pre_row'               => 'Col-1',
					'col_lg'                => '3',
					'col_md'                => '3',
					'col_sm'                => '3',
					'col_xs'                => '2',
					'col_mobile'            => '1',
					'slider_nav'            => 'false',
					'slider_dots'           => 'true',
					'slider_autoplay'       => 'true',
					'slider_stop_on_hover'  => 'true',
					'slider_interval'       => '5000',
					'slider_autoplay_speed' => '200',
					'slider_loop'           => 'true',
					'el_class'              =>'',				
					'icon_fontawesome'      => 'fa fa-users',					
					'css'                   => '',   
					'cat'                   => '' ,
					'readmore'              => '',
					'readmore_type'         => '',
					'more_text'             => 'Read More',
					'more_icon'             => '',
                ), 
                $atts,'vc_rsBlog'
           )
        );
	
		$a      = shortcode_atts(array( 'screenshots' => 'screenshots',), $atts);
		$cat    = empty( $cat ) ? '' : $cat;
		$img    = wp_get_attachment_image_src($a["screenshots"], "large");
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
		
		//custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );


		$owl_data = array( 
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'dots'               => ( $slider_dots == 'false' ) ? false : true,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
			'autoplayTimeout'    => $slider_interval,
			'stagePadding'       => 12,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
			'loop'               => ( $slider_loop === 'true' ) ? true : false,
			'margin'             => 20,
			'stagePadding'       => 0,
			'items'       => 3,
			'responsive'         => array(
				'0'    => array( 'items' => $col_mobile ),
				'480'  => array( 'items' => $col_xs ),
				'768'  => array( 'items' => $col_sm ),
				'992'  => array( 'items' => $col_md ),
				'1200' => array( 'items' => $col_lg ),
				)				
			);
		$owl_data = json_encode( $owl_data );
		
		if($blog_style=='Slider'){
		
       
        // query post       	
		
		$html='<div class="rs-blog home-blog-area '.$css_class_custom.'">
		<div class="blog-carousel blog-slider owl-carousel owl-navigation-yes" data-carousel-options="'.esc_attr( $owl_data ).'">';                      
		$post_title_show='';
		$degination='';
		$taxonomy='category';
        if( empty($cat) ){
        	$best_wp = new wp_Query(array(
								'posts_per_page' =>$post_per,
								'order' => 'DESC',								
								'tax_query' => array(
								array(                
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 
								'post-format-aside',
								'post-format-audio',
								'post-format-chat',
								'post-format-gallery',
								'post-format-image',
								'post-format-link',
								'post-format-quote',
								'post-format-status',
								'post-format-video'
								),
								'operator' => 'NOT IN'
								)
							)
				));	
        }
        else{
		$best_wp = new wp_Query(array(
								'posts_per_page' =>$post_per,
								'order' => 'DESC',
								'category_name'       => $cat,
								'tax_query' => array(
								array(                
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 
								'post-format-aside',
								'post-format-audio',
								'post-format-chat',
								'post-format-gallery',
								'post-format-image',
								'post-format-link',
								'post-format-quote',
								'post-format-status',
								'post-format-video'
								),
								'operator' => 'NOT IN'
								)
							)
				));	
          }
		
			while($best_wp->have_posts()): $best_wp->the_post();
			   $post_title= get_the_title($best_wp->ID);
			   
			    if($title!='No'){
			   		 $post_title_show= get_the_title($best_wp->ID);
				}			
						
			    $post_img_url = get_the_post_thumbnail_url($best_wp->ID);
			    $post_url=get_post_permalink($best_wp->ID); 
				
				if($degination!='No'){
			    $designation = get_post_meta( get_the_ID(), 'designation', true );
				}
			    
				$post_date=get_the_date();				
				//$post_comment=get_wp_count_comments($best_wp->ID);
				$post_admin=get_the_author();
				$post_author_image=get_avatar(( $best_wp->ID ) , 70 ); 	
				$post_content=get_the_excerpt(); 
				$user_id='';
				$author_desigination=get_the_author_meta( 'position', $user_id );
				$comments_count=get_comments_number( '0', '1', '%' );	
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
								
				    $cat_name = esc_html( $categories[0]->name );
				    $link= esc_url( get_category_link( $categories[0]->term_id ) ) ;
				}			
			
				  $readmore_text = ($readmore == 'Yes') ? '<div class="blog-link"><a href="'.$post_url.'">'.$more_text.'</a></div>' : '';
				  $readmore_icon = ($readmore == 'Yes') ? '<div class="blog-link-icon"><a href="'.$post_url.'"><i class="'.$more_icon.'"></i></a></div>' : '';
		

			$html .='<div class="blog-item">
						<div class="blog-img">
                            <img src="'.$post_img_url.'" alt="'.$post_title.'" />
                        </div>
                        <div class="blog-content">
                            <div class="display-table">
                                <div class="display-table-cell">
                                	<div class="blog-date">
                                		'.$post_date.'
                                	</div>
                                    <h3><a href="'.$post_url.'">'.$post_title.'</a></h3>';

                                    if($blog_information !== '') {
                                    	$html .='<ul class="blog-meta clearfix">
                                    		<li class="author">'.$post_admin.'</li>
                                    		<li><a href="'.$link.'">'.$cat_name.'</a></li>
                                    	</ul>';
                                    }

                                    if ($description == 'Yes') {
	                                    $html .='<div class="excerpt">
											'.$post_content.'
										</div>';
                                    }
                                    if ($readmore_type != 'rm_text') {
								    	
								    	$html .=''.$readmore_icon;

                                    } else{
								    	$html .=''.$readmore_text;
                                    }
                                $html .='</div>
                            </div>
                        </div>
                    </div>';


			endwhile; 
			wp_reset_query();
			}
			else
			{	
			
			
			$html='<div class="rs-blog-grid rs-blog '.$css_class_custom.'">
					<div class="row">';                      
					$post_title_show='';
					$degination='';
					$categories= '';
							$best_wp = new wp_Query(array(
								'posts_per_page' =>$post_per,
								'order' => 'DESC',
								'category_name'       => $cat,
								'tax_query' => array(
								array(                
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 
								'post-format-aside',
								'post-format-audio',
								'post-format-chat',
								'post-format-gallery',
								'post-format-image',
								'post-format-link',
								'post-format-quote',
								'post-format-status',
								'post-format-video'
								),
								'operator' => 'NOT IN'
								)
								)
				));	
       
				   
					
						while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);
							}			
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'thumb-medium');
							$post_url=get_post_permalink($best_wp->ID); 
							
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}
							
							$post_date=get_the_date();					
							$post_admin=get_the_author();
							$post_author_image=get_avatar(( $best_wp->ID ) , 70 ); 	
							$post_content=get_the_excerpt(); 
							$user_id='';
							$author_desigination=get_the_author_meta( 'position', $user_id );
							$comments_count=get_comments_number( '0', '1', '%' );
							$categories = get_the_category();
                            
							if ( ! empty( $categories ) ) {

							    $cat_name = esc_html( $categories[0]->name );
							    $link= esc_url( get_category_link( $categories[0]->term_id ) ) ;
							}					
							
                            $readmore_text_grid = ($readmore == 'Yes') ? '<div class="blog-button"><a href="'.$post_url.'">'.$more_text.'</a></div>' : '';
                            $readmore_text_icon = ($readmore == 'Yes') ? '<div class="blog-button-icon"><a href="'.$post_url.'"><i class="'.$more_icon.'"></i></a></div>' : '';
                
							//checking column grid
							$per_item=$pre_row;
							$col='';
							if($per_item =='Col-1'){				
								$col='12';
								
							}
							if($per_item =='Col-4'){				
								$col='3';				
							}
							if($per_item =='Col-2'){				
								$col='6';				
							}
							if($per_item =='Col-3'){				
								$col='4';				
							}
							
							$html .='<div class="col-md-'.$col.' col-sm-12 col-xs-12">
							<div class="blog-item">
							<div class="blog-img"> 
								<a href="'.$post_url.'">
									<img src="'.$post_img_url.'" alt="'.$post_title.'" />
								</a>
							</div>
							<div class="full-blog-content"> 
								<div class="blog-meta">';
								if($blog_information) {
								$html .='<ul class="cate_sec">
										<li class="date"><i class="fa fa-calendar"></i> '.$post_date.'</li>
										<li> <i class="fa fa-user"></i> '.$post_admin.'</li>
									</ul>';
								}
								$html .='<h3 class="blog-title">
									<a href="'.$post_url.'"> '.$post_title.' </a>
								</h3>';
						$html .='</div>						
								<div class="blog-desc">
									'.$post_content.'
								</div>';

                                if ($readmore_type != 'rm_text') {
							    	
							    	$html .=''.$readmore_text_icon;

                                } else{
							    	$html .=''.$readmore_text_grid;
                                }
							$html .='</div>
							</div>


					</div>';
			endwhile; 
			wp_reset_query();
				
			}
			$html .='</div>
			</div>';	
					  
			return $html; 
			}

		add_shortcode( 'vc_rsBlog', 'vc_rsBlog_html' );