<?php
  $html ='<div class="rs-portfolio '.$css_class_custom.' '.$col_filter.' '.$portfolio_style.'">
		<div class="portfolio-content '.$css_class.'">';
        // Get taxonomy form portfolio
         if($show_filter !='No'):
	        $html .= '<div class="portfolio-filter filter-'.strtolower($filter_align).'">
		                <button class="active" data-filter="*">'.$all_project.'</button>'; 
		                $taxonomy = "portfolio-category";
	                    $arr= explode(',', $cat);

						for ($i=0; $i < count($arr) ; $i++) { 
		               	 $cats = get_term_by('slug', $arr[$i], $taxonomy);

		               	 if(is_object($cats)):
		               	 	$slug= '.filter_'.$cats->slug;

		               	 	$html .= '<button data-filter="'.$slug.'">'.$cats->name.'</button>';	
		               	 endif;
		               }			

	                
	        $html .=' </div>'; 
	    endif;
		
        $html .='<div class="row"> <div class="grid">'; 
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
						'post_type' => 'portfolios',
						'posts_per_page' =>$per_page,						
					));		           	
	            }
	            else{ 	           
				   $best_wp = new wp_Query(array(
						'post_type' => 'portfolios',
						'posts_per_page' =>$per_page,
						'tax_query' => array(
					        array(
					            'taxonomy' => 'portfolio-category',
					            'field' => 'slug', //can be set to ID
					            'terms' => $arr_cats//if field is ID you can reference by cat/term number
					        ),
					    )
					));	
				}

       			if( $best_wp->have_posts() ): while( $best_wp->have_posts() ) : $best_wp->the_post();
				$termsArray = get_the_terms( $best_wp->ID, "portfolio-category" );  //Get the terms for this particular item
				 $termsString = ""; //initialize the string that will contain the terms
				foreach ( $termsArray as $term ) { // for each term

					$termsString .= 'filter_'.$term->slug.' '; //create a string that has all the slugs 

				}

				
			   $post_title = get_the_title($best_wp->ID);			  
			    if($title!='No'){
			   		 $post_title_show = get_the_title($best_wp->ID);
				}	
				else{
					 $post_title_show = '';
				}	
				$post_title_show_hover = get_the_title($best_wp->ID);		
			    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
			    $post_url=get_post_permalink($best_wp->ID); 			    
				if($tagline!='No'){
			   		 $post_tagline = get_post_meta( get_the_ID(), 'tagline', true );
				}
				else{
					 $post_tagline='';
				}
				$cats_show = get_the_term_list( $best_wp->ID, $taxonomy, ' ', ', ');
				

				$html .='
				
				<div class="col-md-'.$col_group.' '.$col_full.' col-xs-6 grid-item mb-30 '.$termsString.'">
                            <div class="portfolio-item">
                                <div class="portfolio-img">
                                   <img src="'.$post_img_url.'" alt="'.$post_title.'" />';
                                   if($post_title_show !== '' || $post_tagline !== ''){	
                                   $html .='<div class="title-block">
                                   		<h3 class="p-title"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
                                   		<p class="p-desc">'.$post_tagline.'</p>
                                   </div>';
                              		}
                                $html .='</div>
                                <div class="portfolio-content">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <a class="image-popup p-zoom" href="'.$post_img_url.'">
                                                <span class="vc_icon_element-icon '.$icon_fontawesome.'"></span>
                                            </a>
                                            <h3 class="p-title"><a href="'.$post_url.'">'.$post_title_show_hover.'</a></h3>										
                                            <p class="p-category">'.$cats_show.'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
					
						endwhile; 
				wp_reset_query();
			endif;
			
		$html .= "</div></div>
		</div>
		</div>";		
	  return $html;
?>