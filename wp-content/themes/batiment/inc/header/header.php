<?php
/*
Header Style
*/
global $rs_option;

	 //check individual header 
     $post_meta_header = get_post_meta(get_the_ID(), 'header_select', true);	 
	 if($post_meta_header!=''){		 	
			 if($post_meta_header == 'header2'){		 
				require get_parent_theme_file_path('inc/header/header-style2.php');				
			 }
			  if($post_meta_header == 'header3'){		 
				require get_parent_theme_file_path('inc/header/header-style3.php');		
			 }
			  if($post_meta_header == 'header4'){		 
				require get_parent_theme_file_path('inc/header/header-style4.php');		
			 }	 
			 if($post_meta_header == 'header1'){		
				require get_parent_theme_file_path('inc/header/header-style1.php');       
			 }
			 if($post_meta_header == 'header5'){		
				require get_parent_theme_file_path('inc/header/header-style5.php');       
			 }
			 if($post_meta_header == 'header6'){		
				require get_parent_theme_file_path('inc/header/header-style6.php');       
			 }
	 	}
	else if(!empty($rs_option['header_layout'])){		 
			 $header_style = $rs_option['header_layout'];	 			 
			 if($header_style == 'style2'){		 
				 require get_parent_theme_file_path('inc/header/header-style2.php');		
			 }
			  if($header_style == 'style3'){		 
				 require get_parent_theme_file_path('inc/header/header-style3.php');		
			 }
			  if($header_style == 'style4'){		 
				 require get_parent_theme_file_path('inc/header/header-style4.php');		
			 }	 
			 if($header_style == 'style1'){		
				require get_parent_theme_file_path('inc/header/header-style1.php');       
			 }
			 if($header_style == 'style5'){		
				require get_parent_theme_file_path('inc/header/header-style5.php');       
			 }
			 if($header_style == 'style6'){		
				require get_parent_theme_file_path('inc/header/header-style6.php');       
			 }		  
		}
		
	else{
		require get_parent_theme_file_path('inc/header/header-style1.php');

	}