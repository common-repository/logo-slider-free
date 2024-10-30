<?php

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	function lsuw_logo_slider_post_register() {

		# Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Logo Showcase', 'Post Type General Name', 'lsuw' ),
			'singular_name'       => _x( 'Logo', 'Post Type Singular Name', 'lsuw' ),
			'menu_name'           => __( 'Logo Showcase', 'lsuw' ),
			'parent_item_colon'   => __( 'Parent Logo', 'lsuw' ),
			'all_items'           => __( 'All Logos', 'lsuw' ),
			'view_item'           => __( 'View Logo', 'lsuw' ),
			'add_new_item'        => __( 'Add New Logo', 'lsuw' ),
			'add_new'             => __( 'Add New Logo', 'lsuw' ),
			'edit_item'           => __( 'Edit Logo', 'lsuw' ),
			'update_item'         => __( 'Update Logo', 'lsuw' ),
			'search_items'        => __( 'Search Logo', 'lsuw' ),
			'not_found'           => __( 'Not Found', 'lsuw' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'lsuw' ),
		);

		# Set other options for Custom Post Type

		$args = array(
			'label'               => __( 'logo', 'lsuw' ),
			'description'         => __( 'Logo reviews', 'lsuw' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'editor'),
			'taxonomies'          => array( 'genres' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'menu_icon'		      => 'dashicons-images-alt2'
		);

		// Registering your Custom Post Type
		register_post_type( 'lsuwshowcase', $args );

	}
	add_action( 'init', 'lsuw_logo_slider_post_register', 0 );

	# Registering Carousel Taxonomies
	function lsuw_logo_slider_taxonomies_register() {
		register_taxonomy( 'lsuwshowcasecat', 'lsuwshowcase', array(
			'hierarchical' => true,
			'label' => 'Logo Group',
			'query_var' => true,
			'rewrite' => true
		));
	}
	add_action( 'init', 'lsuw_logo_slider_taxonomies_register', 0 );

	# Add Option Page Generate Shortcode
	function lsuw_logo_slider_shortcode_submenu_page(){
		add_submenu_page('edit.php?post_type=lsuwshowcase', __('Generate Shortcode', 'lsuw'), __('Generate Shortcode', 'lsuw'), 'manage_options', 'post-new.php?post_type=lsuwgeneratelogo');
	}
	add_action('admin_menu', 'lsuw_logo_slider_shortcode_submenu_page');



	#Columns Declaration Function
	function lsuw_logo_slider_columns($lsuw_logo_slider_columns){

		$order='asc';

		if($_GET['order']=='asc') {
			$order='desc';
		}

		$lsuw_logo_slider_columns = array(
			"cb" => "<input type=\"checkbox\" />",

			"thumbnail" => __('Image', 'lsuw'),

			"title" => __('Name', 'lsuw'),

			"lsuw_catcols" => __('Categories', 'lsuw'),

			"date" => __('Date', 'lsuw'),

		);

		return $lsuw_logo_slider_columns;

	}
	
	#
	function lsuw_logo_slider_columns_display($lsuw_logo_slider_columns, $post_id){

		global $post;

		$width = (int) 80;
		$height = (int) 80;

		if ( 'thumbnail' == $lsuw_logo_slider_columns ) {

			if ( has_post_thumbnail($post_id)) {
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				echo $thumb;
			}
			else 
			{
				echo __('None');
			}
		}
		
		if ( 'lsuw_catcols' == $lsuw_logo_slider_columns ) {

			$terms = get_the_terms( $post_id , 'lsuwshowcasecat');
			$count = count($terms);

			if ( $terms ){

				$i = 0;

				foreach ( $terms as $term ) {
					echo '<a href="'.admin_url( 'edit.php?post_type=lsuwshowcase&lsuwshowcasecat='.$term->slug ).'">'.$term->name.'</a>';	

					if($i+1 != $count) {
						echo " , ";
					}
					$i++;
				}
			}
		}
	}


	# Add manage posts columns Filter 
	add_filter("manage_lsuwshowcase_posts_columns", "lsuw_logo_slider_columns");

	# Add manage posts custom column Action
	add_action("manage_lsuwshowcase_posts_custom_column",  "lsuw_logo_slider_columns_display", 10, 2 );	

	
	# Registering Post Type For Generate Shortcode
	function lsuw_logo_slider_shortcode_post_type() {

		# Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'All Shortcodes', 'Post Type General Name' ),
			'singular_name'       => _x( 'Carousel Shortcode', 'Post Type Singular Name' ),
			'menu_name'           => __( 'Carousel Shortcode' ),
			'parent_item_colon'   => __( 'Parent Shortcode' ),
			'all_items'           => __( 'All Shortcodes' ),
			'view_item'           => __( 'View Shortcode' ),
			'add_new_item'        => __( 'Add New Shortcode' ),
			'add_new'             => __( 'Generate Logo Shortcode' ),
			'edit_item'           => __( 'Edit Shortcode' ),
			'update_item'         => __( 'Update Shortcode' ),
			'search_items'        => __( 'Search Shortcode' ),
			'not_found'           => __( 'Not Found' ),
			'not_found_in_trash'  => __( 'Not found in Trash' )
		);

		# Set other options for Custom Post Type...
		$args = array(
			'labels'              => $labels,
			'label'               => __( 'carousel-sliders' ),
			'description'         => __( 'Carousel Slider news and reviews' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu' 		  => 'edit.php?post_type=lsuwshowcase',
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'supports'            => array( 'title' ),
			'menu_icon'		      => 'dashicons-images-alt2'
		);
		register_post_type( 'lsuwgeneratelogo', $args );
	}
	add_action( 'init', 'lsuw_logo_slider_shortcode_post_type', 0 );

	# Carousel Manage Shortcode Column 
	function lsuw_logo_slider_add_shortcode_column( $lsuwcolumns ) {
	 return array_merge( $lsuwcolumns, 
	  array(
	  		'shortcode' => __( 'Logo Shortcode', 'lsuw' ),
	  		'doshortcode' => __( 'Logo Template Shortcode', 'lsuw' ) )
	   );
	}
	add_filter( 'manage_lsuwgeneratelogo_posts_columns' , 'lsuw_logo_slider_add_shortcode_column' );


	function lsuw_logo_slider_add_posts_shortcode_display( $cpw_column, $post_id ) {
	 if ( $cpw_column == 'shortcode' ){
	  ?>
	  <input style="background:#ddd" type="text" onClick="this.select();" value="[lsuw_composer <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
	  <?php
	}

 	if ( $cpw_column == 'doshortcode' ){
  	?>

  	<textarea cols="40" rows="2" style="background:#ddd;" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[lsuw_composer id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
  	<?php  

 	}
}
add_action( 'manage_lsuwgeneratelogo_posts_custom_column' , 'lsuw_logo_slider_add_posts_shortcode_display', 10, 2 );