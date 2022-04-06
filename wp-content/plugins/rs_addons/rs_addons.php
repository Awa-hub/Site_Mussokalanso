<?php
/**
* Plugin Name: Rs Addons
* Plugin URI: https://codecanyon.net/user/rs-theme
* Description: by Rs Addons plugin
* Version: 1.0
* Author: RS Theme
* Author URI: http://www.rstheme.com
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die( 'You shouldnt be here' );
}

function check_some_other_plugin() {
    if ( is_plugin_active('js_composer/js_composer.php') ) {
        
      // Create multi dropdown param type
        vc_add_shortcode_param( 'dropdown_multi', 'dropdown_multi_settings_field' );
        function dropdown_multi_settings_field( $param, $value ) {
           $param_line = '';
           $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
           foreach ( $param['value'] as $text_val => $val ) {
               if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
                            $text_val = $val;
                        }
                        $text_val = __($text_val, "js_composer");
                        $selected = '';

                        if(!is_array($value)) {
                            $param_value_arr = explode(',',$value);
                        } else {
                            $param_value_arr = $value;
                        }

                        if ($value!=='' && in_array($val, $param_value_arr)) {
                            $selected = ' selected="selected"';
                        }
                        $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
                    }
           $param_line .= '</select>';

           return  $param_line;
        } 

  }
}
add_action( 'admin_init', 'check_some_other_plugin' );

//register_activation_hook( __FILE__ , 'vc_plugin_active' );

/**
* Function when plugin is activated
*
* @param void
*
*/
//Including file that manages all template

//All Post type include here

$dir = plugin_dir_path( __FILE__ );
//For team
require_once $dir .'/inc/team/team.php';
//For portfolio
require_once $dir .'/inc/portfolio/portfolio.php';
//For client
require_once $dir .'/inc/client/client.php';
//For client
require_once $dir .'/inc/service/service.php';


//shordcode 
require_once $dir .'/inc/vc_addon/rs_client.php';
require_once $dir .'/inc/vc_addon/rs_contact.php';
require_once $dir .'/inc/vc_addon/rs_countdown.php';
require_once $dir .'/inc/vc_addon/rs_heading.php';
require_once $dir .'/inc/vc_addon/rs_services.php';
// require_once $dir .'/inc/vc_addon/rs_icon_title.php';
require_once $dir .'/inc/vc_addon/rs_team.php';
require_once $dir .'/inc/vc_addon/rs_blog.php';
require_once $dir .'/inc/vc_addon/rs_video.php';
require_once $dir .'/inc/vc_addon/rs_portfolio.php';
require_once $dir .'/inc/vc_addon/rs_about.php';
require_once $dir .'/inc/vc_addon/rs_service_slider.php';
require_once $dir .'/inc/vc_addon/rs_banner.php';?>