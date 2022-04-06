<?php
/**
 * Team custom post type
 * This file is the basic custom post type for use any where in theme.
 * 
 * @package grassywp
 * @author RS Theme
 * @link http://www.rstheme.com
 */
global $rs_option;
function rs_portfolio_register_post_type() {
	$labels = array(
		'name'               => esc_html__( 'Portfolios', 'batiment'),
		'singular_name'      => esc_html__( 'Portfolio', 'batiment'),
		'add_new'            => esc_html_x( 'Add New Portfolio', 'rsconstruction', 'batiment'),
		'add_new_item'       => esc_html__( 'Add New Portfolio', 'batiment'),
		'edit_item'          => esc_html__( 'Edit Portfolio', 'batiment'),
		'new_item'           => esc_html__( 'New Portfolio', 'batiment'),
		'all_items'          => esc_html__( 'All Portfolios', 'batiment'),
		'view_item'          => esc_html__( 'View Portfolio', 'batiment'),
		'search_items'       => esc_html__( 'Search Portfolios', 'batiment'),
		'not_found'          => esc_html__( 'No Portfolios found', 'batiment'),
		'not_found_in_trash' => esc_html__( 'No Portfolios found in Trash', 'batiment'),
		'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'batiment'),
		'menu_name'          => esc_html__( 'Portfolio', 'batiment'),

	);
	global $rs_option;
	$portfolio_slug = (!empty($rs_option['portfolio_slug']))? $rs_option['portfolio_slug'] :'portfolio';
	$args = array(
		'labels'             => $labels,
		'public'             => true,	
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'can_export'         => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'rewrite' => 		 array('slug' => $portfolio_slug,'with_front' => false),
		'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
		'supports'           => array( 'title', 'thumbnail','editor' ),		
	);
	register_post_type( 'portfolios', $args );
}
add_action( 'init', 'rs_portfolio_register_post_type' );
function tr_create_portfolio() {
	global $rs_option;
	$portfolio_slug_cat = (!empty($rs_option['portfolio_slug']))? $rs_option['portfolio_slug'].'-category' :'portfolio-category';
	register_taxonomy(
		'portfolio-category',
		'portfolios',
		
		array(
			'label' => __( 'Categories','batiment'),
			'rewrite' => array( 'slug' => $portfolio_slug_cat ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'tr_create_portfolio' );

// Meta Box

/*--------------------------------------------------------------
*			Portfolio info
*-------------------------------------------------------------*/
function rs_portfolio_meta_box() {
	add_meta_box( 'member_info_meta', esc_html__( 'Portfolio Info', 'batiment'), 'rs_portfolio_member_info_meta_callback', 'portfolios', 'advanced', 'high', 2 );
}
add_action( 'add_meta_boxes', 'rs_portfolio_meta_box');

// member info callback
function rs_portfolio_member_info_meta_callback( $portfolio_info ) {
	wp_nonce_field( 'portfolio_metabox', 'portfolio_metabox' ); ?>
	<div style="margin: 10px 0;">
		<label for="tagline" style="width:150px; display:inline-block;">
			<?php esc_html_e( 'Read More Text', 'batiment') ?>
		</label>
		<?php $tagline = get_post_meta( $portfolio_info->ID, 'tagline', true ); ?>
		<input type="text" name="tagline" id="tagline" class="tagline" value="<?php echo esc_html($tagline); ?>" style="width:300px;"/>
	</div>
	<div style="margin: 10px 0;">
		<label for="client_name" style="width:150px; display:inline-block;">
			<?php $client_name = get_post_meta( $portfolio_info->ID, 'client_name', true ); 
			if($client_name =="")
			{
				$client_name = 'Client:';
			}
		?>
		<input type="text" name="client_name" id="client_name" class="client_name" value="<?php echo esc_html($client_name); ?>" style="width:150px; "/>
		</label>
		<?php $client = get_post_meta( $portfolio_info->ID, 'client', true ); ?>
		<input type="text" name="client" id="client" class="client" value="<?php echo esc_html($client); ?>" style="width:300px; "/>
	</div>

	<div style="margin: 10px 0;">
		<label for="location_name" style="width:150px; display:inline-block;">
			<?php $location_name = get_post_meta( $portfolio_info->ID, 'location_name', true ); 
			if($location_name =="")
			{
				$location_name = 'Location:';
			}
		?>
		<input type="text" name="location_name" id="location_name" class="location_name" value="<?php echo esc_html($location_name); ?>" style="width:150px; "/>
		</label>
		<?php $location = get_post_meta( $portfolio_info->ID, 'location', true ); ?>
		<input type="text" name="location" id="location" class="location" value="<?php echo esc_html($location); ?>" style="width:300px; "/>
	</div>

	<div style="margin: 10px 0;">
		<label for="surface_area_title" style="width:150px; display:inline-block;">
			<?php $surface_area_title = get_post_meta( $portfolio_info->ID, 'surface_area_title', true ); 
			if($surface_area_title =="")
			{
				$surface_area_title = 'Surface Area: ';
			}
		?>
		<input type="text" name="surface_area_title" id="surface_area_title" class="surface_area_title" value="<?php echo esc_html($surface_area_title); ?>" style="width:150px; "/>
		</label>
		<?php $surface_area = get_post_meta( $portfolio_info->ID, 'surface_area', true ); ?>
		<input type="text" name="surface_area" id="surface_area" class="surface_area" value="<?php echo esc_html($surface_area); ?>" style="width:300px; "/>
	</div>

	

	<div style="margin: 10px 0;">
		<label for ="created_title" style="width:150px; display:inline-block;">
			<?php $created_title = get_post_meta( $portfolio_info->ID, 'created_title', true ); 
			if($created_title =="")
			{
				$created_title = 'Architect:';
			}
		?>
			<input type="text" name="created_title" id="created_title" class="created_title" value="<?php echo esc_html($created_title); ?>" style="width:150px; "/>
		</label>
	
		<?php $created = get_post_meta( $portfolio_info->ID, 'created', true ); ?>
		<input type="text" name="created" id="created" class="created" value="<?php echo esc_html($created); ?>" style="width:300px;" />
	</div>

	<div style="margin: 10px 0;">
		<label for="complete_title" style="width:150px; display:inline-block;">
			<?php $complete_title = get_post_meta( $portfolio_info->ID, 'complete_title', true ); 
			if($complete_title =="")
			{
				$complete_title = 'Year Of Complited: ';
			}
		?>
		<input type="text" name="complete_title" id="complete_title" class="complete_title" value="<?php echo esc_html($complete_title); ?>" style="width:150px; "/>
		</label>
	
		<?php $date = get_post_meta( $portfolio_info->ID, 'date', true ); ?>
		<input type="text" name="date" id="date" class="date" value="<?php echo esc_html($date); ?>" style="width:300px;" />
	</div>

	<div style="margin: 10px 0;">
		<label for="project_value_title" style="width:150px; display:inline-block;">
			<?php $project_value_title = get_post_meta( $portfolio_info->ID, 'project_value_title', true ); 
			if($project_value_title =="")
			{
				$project_value_title = 'Project Value: ';
			}
		?>
		<input type="text" name="project_value_title" id="project_value_title" class="project_value_title" value="<?php echo esc_html($project_value_title); ?>" style="width:150px; "/>
		</label>
		<?php $project_value = get_post_meta( $portfolio_info->ID, 'project_value', true ); ?>
		<input type="text" name="project_value" id="project_value" class="project_value" value="<?php echo esc_html($project_value); ?>" style="width:300px;" />
	</div>
<?php }
/*--------------------------------------------------------------
 *			Save meta
*-------------------------------------------------------------*/
function save_rs_portfolio_social_meta( $post_id ) {
	if ( ! isset( $_POST['portfolio_metabox'] ) ) {
		return $post_id;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	if ( 'portfolios' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}
	$mymeta = array( 'tagline','client_name','location_name','surface_area_title','complete_title','created_title','created','date','project_value_title','location','client','surface_area','project_value' );
	foreach ( $mymeta as $keys ) {

		if ( is_array( $_POST[ $keys ] ) ) {
			$data = array();

			foreach ( $_POST[ $keys ] as $key => $value ) {
				$data[] = $value;
			}
		} else {
			$data = sanitize_text_field( $_POST[ $keys ] );
		}		
		update_post_meta( $post_id, $keys, $data );
	}
}
add_action( 'save_post', 'save_rs_portfolio_social_meta' );