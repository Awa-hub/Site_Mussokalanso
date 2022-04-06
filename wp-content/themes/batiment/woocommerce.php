<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */

get_header();
global $rs_option;
require get_parent_theme_file_path('inc/page-header/breadcrumbs-shop.php');
// Layout class



if ( $rs_option['shop-layout'] == 'full' ) {
	$batiment_layout_class = 'col-sm-12 col-xs-12';
}
elseif( $rs_option['shop-layout'] == 'left-col' || $rs_option['shop-layout'] == 'right-col'){
	$batiment_layout_class = 'col-md-9 col-xs-12';
}
else{
	$batiment_layout_class = 'col-sm-12 col-xs-12';
}
?>
<div class="container">
	<div id="content" class="site-content">		
		<div class="row">
			<?php
				if(!empty($rs_option['disable-sidebar']) && is_product()){
					?>
					<div class="col-sm-12 col-xs-12">
					    <?php					
							woocommerce_content();						
						?>
					</div>
					<?php
				}else{				
					if ( $rs_option['shop-layout'] == 'left-col'  ) {
						get_sidebar('woocommerce');
					}
					?>    			
				    <div class="<?php echo esc_attr($batiment_layout_class);?>">
					    <?php					
							woocommerce_content();						
		   				 ?>
				    </div>
					<?php
					if ( $rs_option['shop-layout'] == 'right-col'  ) {
						get_sidebar('woocommerce');
					}	
				}
			?>
		</div>
	</div>
</div>
<?php
get_footer();

