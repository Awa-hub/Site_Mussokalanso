<?php
/*
Grassy inlcude footer
*/
if(is_page()){
	 //check individual footer 
     $post_meta_footer = get_post_meta(get_the_ID(), 'select-footer', true);	   
	 if($post_meta_footer == ''){
		 //checking footer style form global settings
	 	    if(!empty($rs_option['footer_layout'])){ 	    	
			$footer_style=$rs_option['footer_layout'];
				 
			 
			 if($footer_style == 'style2'){		 
				require get_parent_theme_file_path('inc/footer_style/footer-style2.php');		
			 }
			  if($footer_style == 'style3'){		 
				 require get_parent_theme_file_path('inc/footer_style/footer-style3.php');		
			 }
			  if($footer_style == 'style4'){		 
				 require get_parent_theme_file_path('inc/footer_style/footer-style4.php');		
			 }
			 if($footer_style == 'style5'){		 
				 require get_parent_theme_file_path('inc/footer_style/footer-style5.php');		
			 }	 
			 if($footer_style == 'style1'){		
				require get_parent_theme_file_path('inc/footer_style/footer-style1.php');       
			 }
		}
		else{
			require get_parent_theme_file_path('inc/footer_style/footer-style1.php');
		}
	 } 	 
	 else{
		 //checking footer style form global settings
			 if($post_meta_footer == 'footer1'){		
				require get_parent_theme_file_path('inc/footer_style/footer-style1.php');	
			 }			 
			 if($post_meta_footer == 'footer2'){		 
				 require get_parent_theme_file_path('inc/footer_style/footer-style2.php');		
			 }
			  if($post_meta_footer == 'footer3'){		 
				 require get_parent_theme_file_path('inc/footer_style/footer-style3.php');		
			 }		
		
			  if($post_meta_footer == 'footer4'){
				   require get_parent_theme_file_path('inc/footer_style/footer-style4.php');		
			 } 
			 if($post_meta_footer == 'footer5'){
				   require get_parent_theme_file_path('inc/footer_style/footer-style5.php');		
			 } 
		  
 		}
	 }

 	else if(!empty($rs_option['footer_layout']))
	{
		$footer_style = $rs_option['footer_layout'];
		 if($footer_style == ''){
			 $footer_style ='inc/footer_style/Footer Style 1';
		 } 	
		 if($footer_style == 'style2'){		 
			 require get_parent_theme_file_path('inc/footer_style/footer-style2.php');		
		 }
		  if($footer_style == 'style3'){		 
			 require get_parent_theme_file_path('inc/footer_style/footer-style3.php');		
		 }
		  if($footer_style == 'style4'){		 
			 require get_parent_theme_file_path('inc/footer_style/footer-style4.php');		
		 }
		 if($footer_style == 'style5'){		 
			 require get_parent_theme_file_path('inc/footer_style/footer-style5.php');		
		 }	 
		 if($footer_style == 'style1'){		
			require get_parent_theme_file_path('inc/footer_style/footer-style1.php');       
		 }

 	}
	else{
		require get_parent_theme_file_path('inc/footer_style/footer-style1.php'); 
	}
?>
