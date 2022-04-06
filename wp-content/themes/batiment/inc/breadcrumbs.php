<?php
 
	if(is_page()) {
		get_template_part( 'inc/page-header/breadcrumbs' );
	}

	if(is_singular( 'post' )){
		get_template_part( 'inc/page-header/breadcrumbs-single' );
	}
	if(is_singular( 'portfolios' )){
		get_template_part( 'inc/page-header/breadcrumbs-portfolio' );
	}
	if(is_singular('teams')){
		get_template_part( 'inc/page-header/breadcrumbs-team');
	}
	if(is_singular('services')){
		get_template_part( 'inc/page-header/breadcrumbs-service');
	}
	if(is_home() && !is_front_page() || is_home() && is_front_page()){
		get_template_part( 'inc/page-header/breadcrumbs-blog' );
	}
	if(is_archive()){		
		if(class_exists( 'WooCommerce' )){
		}
		elseif(class_exists( 'WooCommerce' ) && is_shop()){				
		}else{
			get_template_part( 'inc/page-header/breadcrumbs-archive');
		}
		
	}	
	if(is_404()){
		get_template_part( 'inc/page-header/breadcrumbs-404' );
	}
	if(is_search()){
		get_template_part( 'inc/page-header/breadcrumbs-search' );
	}
?>