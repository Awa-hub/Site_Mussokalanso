<?php
/*
Element Description: Rs Team Box
*/
     
    // Element Mapping
    function vc_rs_service_slider_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        
        $category_dropdown = array( __( 'All Categories', 'bstart' ) => '0' );  
        $args = array(
            'taxonomy' => array('service-category'),//ur taxonomy
            'hide_empty' => false,                  
        );

        $terms_= new WP_Term_Query( $args );
        foreach ( (array)$terms_->terms as $term ) {
            $category_dropdown[$term->name] = $term->slug;      
        } 
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Rs Service Slider', 'bstart'),
                'base' => 'vc_serviceslider',
                'description' => __('Rs Service Slider Information', 'bstart'), 
                'category' => __('by RS Theme', 'bstart'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                         
                     array(
                        "type" => "dropdown",
                        "heading" => __("Show title", "bstart"),
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
                    "heading" => __( "Categories", 'bstart' ),
                    "param_name" => "cat",
                    'value' => $category_dropdown,
                    ),                    
                            
                    
                    
                    array(
                        "type" => "textfield",
                        "heading" => __("Service Per Pgae", "bstart"),
                        "param_name" => "team_per",
                        'value' =>"6",
                        'description' => __( 'You can write how many team member show. ex(2)', 'bstart' ),                  
                    ),  
                
                    array(
                    'type' => 'css_editor',
                    'heading' => __( 'CSS box', 'bstart' ),
                    'param_name' => 'css',
                    'group' => __( 'Design Options', 'bstart' ),
                ),            
                        
                ),
                
                    
            )
        );                                   
    }
     
   add_action( 'vc_before_init', 'vc_rs_service_slider_mapping' );
     
    // Element HTML
    function vc_rsservice_slider_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'                 => '',                      
                    'team_per'              => '6',                                     
                    'css'                   => '' ,
                    'cat'                   => '',           
                ), 
                $atts,'vc_serviceslider'
           )
        );
    
        $a = shortcode_atts(array(
            'screenshots' => 'screenshots',
        ), $atts);

        $img = wp_get_attachment_image_src($a["screenshots"], "large");
        $imgSrc = $img[0];
        
        //extract content
        $atts['content'] = $content;

        //extact icon 
        $iconClass = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
        //extract css edit box
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts ); 

        

        $html='<div class="rs-team>
        <div class="team-carousel owl-carousel owl-navigation-yes">';       
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
                    'post_type' => 'services',
                    'posts_per_page' =>$team_per,
                    
            ));   
        }   
        else{
            $best_wp = new wp_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' =>$team_per,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'service-category',
                            'field' => 'slug', //can be set to ID
                            'terms' => $arr_cats//if field is ID you can reference by cat/term number
                        ),
                    )
            ));   
        }  
            
    
           $html = '<section id="rs-services-slider" class="rs-services gray-color">  
                <div>                   
                    <div class="clfeatures">
                        <div class="row common-height clearfix">
                            <div class="col-md-7 col-sm-12 col-xs-12 nopadding-sm clearfix">
                                <div class="vertical-middle">
                                    <div class="col-padding clearfix">
                                        <div id="item-thumb" class="item-thumb">';
                                            while($best_wp->have_posts()): $best_wp->the_post();
                                                $post_title= get_the_title($best_wp->ID);
                    
                        
                                                 $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full'); 
                                                 $post_meta_data = get_post_meta(get_the_ID(), 'service-thumb', true);
                                                   
                                                 $ttile = get_the_title();
           
                                            $html .= '<div class="owl-dot">';
                                            $html .= '<div class="servide-item">';
                                                 if( $post_meta_data !='' ){   
                                                    $html .='<img class="service_icon" src="'.$post_meta_data.'" alt="" />';
                                                    }else{
                                                       $html .='<img class="service_image" src="'.$post_img_url.'" alt="" />'; 
                                                    }
                                                $html .= '<h5 class="overlay-feature-title">
                                                    <a href="#">
                                                        '.$ttile.'
                                                    </a>
                                                </h5>

                                            </div>
                                            </div>';

                                            endwhile; 

                                        $html .= '</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5 col-sm-12 col-xs-12 nopadding" style="background-color: #FFF; padding: 0; box-shadow: -4px 1px 15px 3px rgba(0,0,0,0.07);">

                                <div id="feature-left" class="menu-carousel owl-carousel image-carousel feature-left custom-js owl-loaded">';
                                    while($best_wp->have_posts()): $best_wp->the_post();
                                                $post_title= get_the_title($best_wp->ID);
                    
                        
                                                 $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
                                                 $post_url = get_post_permalink($best_wp->ID); 
                                                 $title = get_the_title();
                                                 $excerpt = get_the_excerpt();
                                                $html .='<div class="cl-ft-item">
                                                    <a href="'.$post_url.'">
                                                        <img src="'. $post_img_url.'" alt="" >
                                                    </a>
                                                    <div class="feature-content clearfix">
                                                        <div class="heading-block">
                                                            <h4 class="feature-title">
                                                                <a href="'.$post_url.'">
                                                                    '.$title.'
                                                                </a>
                                                            </h4>
                                                            '.$excerpt.'
                                                        </div>
                                                    </div>
                                                </div>';                      
                                                endwhile;            
                                $html .='</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>' ;
    return $html; 
}

add_shortcode( 'vc_serviceslider', 'vc_rsservice_slider_html' );