<?php
/**
* Plugin Name: RS Framework
* Plugin URI: https://codecanyon.net/user/rs-theme
* Description: RS Framework plugin for page metabox
* Version: 1.0
* Author: RS Theme
* Author URI: http://www.rstheme.com
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die( 'You shouldnt be here' );
}

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
require_once $dir .'/metaboxes/page-header.php';
require_once $dir .'/metaboxes/rs-functions.php';
require_once $dir .'/metaboxes/cmb2/init.php';
//for widget
require_once $dir .'/widgets/rs_contact.php';
require_once $dir .'/widgets/rs_recent_widget.php';
?>