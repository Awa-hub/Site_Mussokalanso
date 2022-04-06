<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'rs_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 $cmb CMB2 object.
 *
 * @return bool      True if metabox should show
 */
function rs_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_on_front' ) !== $cmb->object_id ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field $field Field object.
 *
 * @return bool              True if metabox should show
 */
function rs_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category.
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function rs_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
		<p><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label></p>
		<p><input id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo esc_html( $description ); ?></p>
	</div>
	<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function rs_display_text_small_column( $field_args, $field ) {
	?>
	<div class="custom-column-display <?php echo esc_attr( $field->row_classes() ); ?>">
		<p><?php echo $field->escaped_value(); ?></p>
		<p class="description"><?php echo esc_html( $field->args( 'description' ) ); ?></p>
	</div>
	<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array      $field_args Array of field parameters.
 * @param  CMB2_Field $field      Field object.
 */
function rs_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'rs_register_project_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rs_register_project_metabox() {
	$prefix = 'rs_'; 
	$cmb_project = new_cmb2_box( array(
		'id'            => $prefix . 'metabox-project',
		'title'         => esc_html__( 'Poject Images', 'brickx' ),
		'object_types'  => array( 'portfolios' ), // Post type
		// 'show_on_cb' => 'rs_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'rs_add_some_classes', // Add classes through a callback.
	) );

	$cmb_project->add_field( array(
	'name' => 'Upload Project Images',
	'desc' => '',
	'id'   => 'Screenshot',
	'type' => 'file_list',
	// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	// 'query_args' => array( 'type' => 'image' ), // Only images attachment
	// Optional, override default text strings
	'text' => array(
		'add_upload_files_text' => 'Upload Files', // default: "Add or Upload Files"
		'remove_image_text' => 'Replacement', // default: "Remove Image"
		'file_text' => 'Replacement', // default: "File:"
		'file_download_text' => 'Replacement', // default: "Download"
		'remove_text' => 'Replacement', // default: "Remove"
	),
) );

	$cmb_project->add_field( array(
		'name'             => esc_html__( 'Project Image Style', 'brickx' ),
		'desc'             => esc_html__( 'chosse your  style', 'brickx' ),
		'id'               => 'image_select',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'slider' => esc_html__( 'Slider', 'brickx' ),
			'gallery' => esc_html__( 'Gallery', 'brickx' ),
			
		),
	) );




}


add_action( 'cmb2_admin_init', 'rs_service_project_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rs_service_project_metabox() {
	$prefix = 'rs_'; 
	$cmb_project = new_cmb2_box( array(
		'id'            => $prefix . 'metabox-service',
		'title'         => esc_html__( 'Service Thumb Image', 'brickx' ),
		'object_types'  => array( 'services' ), // Post type
		
	) );

	$cmb_project->add_field( array(
	'name' => 'Upload Thumb Image',
	'desc' => '',
	'id'   => 'service-thumb',
	'type' => 'file',
	
) );


}

add_action( 'cmb2_admin_init', 'rs_register_header_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rs_register_header_metabox() {
	$prefix = 'rs_'; 

  /**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Header Settings', 'brickx' ),
		'object_types'  => array( 'page', 'portfolios', 'post', 'teams' ), // Post type
		// 'show_on_cb' => 'rs_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'rs_add_some_classes', // Add classes through a callback.
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Select Banner Image', 'brickx' ),
		'desc' => esc_html__( 'Upload an image or enter a URL for page banner.', 'brickx' ),
		'id'   => 'banner_image',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Select Header Style', 'brickx' ),
		'desc'             => esc_html__( 'chosse your individual header style', 'brickx' ),
		'id'               => 'header_select',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'header1' => esc_html__( 'Header Style 1', 'brickx' ),
			'header2' => esc_html__( 'Header Style 2', 'brickx' ),
			'header3' => esc_html__( 'Header Style 3', 'brickx' ),
			'header4' => esc_html__( 'Header Style 4', 'brickx' ),
			'header5' => esc_html__( 'Header Style 5', 'brickx' ),
			'header6' => esc_html__( 'Header Style 6', 'brickx' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Logo Type', 'brickx' ),
		'desc'             => esc_html__( 'You can select logo type', 'brickx' ),
		'id'               => 'select-logo',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'light' => esc_html__( 'Light', 'brickx' ),
			'dark' => esc_html__( 'Dark', 'brickx' ),			
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Show Page Title', 'brickx' ),
		'desc'             => esc_html__( 'You can show/hide page title', 'brickx' ),
		'id'               => 'select-title',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'show' => esc_html__( 'Show', 'brickx' ),
			'hide' => esc_html__( 'Hide', 'brickx' ),			
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Show Top Bar', 'brickx' ),
		'desc'             => esc_html__( 'You can show/hide topbar', 'brickx' ),
		'id'               => 'select-top',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'show' => esc_html__( 'Show', 'brickx' ),
			'hide' => esc_html__( 'Hide', 'brickx' ),			
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Show Breadcurmbs', 'brickx' ),
		'desc'             => esc_html__( 'You can show/hide  breadcurmbs here', 'brickx' ),
		'id'               => 'select-bread',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'show' => esc_html__( 'Show', 'brickx' ),
			'hide' => esc_html__( 'Hide', 'brickx' ),			
		),
	) 
);
}

//page section metabox

add_action( 'cmb2_admin_init', 'rs_register_page_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rs_register_page_metabox() {
	$prefix = 'rs_demo_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_meta_page = new_cmb2_box( array(
		'id'            => $prefix . 'page',
		'title'         => esc_html__( 'Page Settings', 'brickx' ),
		'object_types'  => array( 'page' ), // Post type
		// 'show_on_cb' => 'rs_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'rs_add_some_classes', // Add classes through a callback.
	) );

	$cmb_meta_page->add_field( array(
		'name'    => esc_html__( 'Content Top Padding', 'brickx' ),
		'desc'    => esc_html__( 'example(100px)', 'brickx' ),
		'default' => esc_attr__( '100px', 'brickx' ),
		'id'      => 'content_top',
		'type'    => 'text_medium',
	) );

	$cmb_meta_page->add_field( array(
		'name'    => esc_html__( 'Content Bottom Padding', 'brickx' ),
		'desc'    => esc_html__( 'example(100px)', 'brickx' ),
		'default' => esc_attr__( '100px', 'brickx' ),
		'id'      => 'content_bottom',
		'type'    => 'text_medium',
	) );

}

add_action( 'cmb2_admin_init', 'rs_register_footer_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rs_register_footer_metabox() {
	$prefix = 'rs_demo_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'footer',
		'title'         => esc_html__( 'Footer Settings', 'brickx' ),
		'object_types'  => array( 'page' ), // Post type
		// 'show_on_cb' => 'rs_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'rs_add_some_classes', // Add classes through a callback.
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Select Footer Style', 'brickx' ),
		'desc'             => esc_html__( 'chosse your individual footer style', 'brickx' ),
		'id'               => 'select-footer',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'footer1' => esc_html__( 'Footer Style 1', 'brickx' ),
			'footer2' => esc_html__( 'Footer Style 2', 'brickx' ),
			'footer3' => esc_html__( 'Footer Style 3', 'brickx' ),
			'footer4' => esc_html__( 'Footer Style 4', 'brickx' ),
			'footer5' => esc_html__( 'Footer Style 5', 'brickx' ),
		),
	) );	
}


/**
 * Callback to define the optionss-saved message.
 *
 * @param CMB2  $cmb The CMB2 object.
 * @param array $args {
 *     An array of message arguments
 *
 *     @type bool   $is_options_page Whether current page is this options page.
 *     @type bool   $should_notify   Whether options were saved and we should be notified.
 *     @type bool   $is_updated      Whether options were updated with save (or stayed the same).
 *     @type string $setting         For add_settings_error(), Slug title of the setting to which
 *                                   this error applies.
 *     @type string $code            For add_settings_error(), Slug-name to identify the error.
 *                                   Used as part of 'id' attribute in HTML output.
 *     @type string $message         For add_settings_error(), The formatted message text to display
 *                                   to the user (will be shown inside styled `<div>` and `<p>` tags).
 *                                   Will be 'Settings updated.' if $is_updated is true, else 'Nothing to update.'
 *     @type string $type            For add_settings_error(), Message type, controls HTML class.
 *                                   Accepts 'error', 'updated', '', 'notice-warning', etc.
 *                                   Will be 'updated' if $is_updated is true, else 'notice-warning'.
 * }
 */
function rs_options_page_message_callback( $cmb, $args ) {
	if ( ! empty( $args['should_notify'] ) ) {

		if ( $args['is_updated'] ) {

			// Modify the updated message.
			$args['message'] = sprintf( esc_html__( '%s &mdash; Updated!', 'brickx' ), $cmb->prop( 'title' ) );
		}

		add_settings_error( $args['setting'], $args['code'], $args['message'], $args['type'] );
	}
}

/**
 * Only show this box in the CMB2 REST API if the user is logged in.
 *
 * @param  bool                 $is_allowed     Whether this box and its fields are allowed to be viewed.
 * @param  CMB2_REST_Controller $cmb_controller The controller object.
 *                                              CMB2 object available via `$cmb_controller->rest_box->cmb`.
 *
 * @return bool                 Whether this box and its fields are allowed to be viewed.
 */
function rs_limit_rest_view_to_logged_in_users( $is_allowed, $cmb_controller ) {
	if ( ! is_user_logged_in() ) {
		$is_allowed = false;
	}

	return $is_allowed;
}

