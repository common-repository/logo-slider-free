<?php 

if ( ! defined( 'ABSPATH' ) )
	exit; # Exit if accessed directly

# shortocde
function lsuw_logo_slider_query($atts, $content = null){
	$atts = shortcode_atts(
		array(
			'id' => "",
			), $atts);
	global $post;
	$postid = $atts['id'];


	$lsuw_cat_name   	= get_post_meta($postid, 'lsuw_cat_name', true);
	$lsuw_theme_id      = get_post_meta($postid, 'lsuw_theme_id', true);
	$lsuw_order_cat    	= get_post_meta($postid, 'lsuw_order_cat', true);
	$lsuw_order_items   = get_post_meta($postid, 'lsuw_order_items', true);




	$lsuwcat =  array();
	$num = count($lsuw_cat_name);
	for($j=0; $j<$num; $j++){
		array_push($lsuwcat, $lsuw_cat_name[$j]);
	}

	$args = array(
		'post_type' 	 	=> 'lsuwshowcase',
		'post_status'	 	=> 'publish',
		'posts_per_page' 	=> -1,
		'orderby'	   	   	=> $lsuw_order_cat,
		'order'			 	=> $lsuw_order_items,
		'tax_query' 	 	=> array(
			array(
				'taxonomy' => 'lsuwshowcasecat',
				'field' => 'id',
				'terms' => $lsuwcat,
			)
		)
	);


	$query = new WP_Query($args);


	switch ($lsuw_theme_id) {
	    case '1':
	        require_once(lsuw_plugin_dir.'themes/theme-1.php');
	        break;
	    case '2':
	        require_once(lsuw_plugin_dir.'themes/theme-2.php');
	        break;
	    case '3':
	        require_once(lsuw_plugin_dir.'themes/theme-3.php');
	        break;        	        
	}

	return $content; 

}
add_shortcode('lsuw_composer', 'lsuw_logo_slider_query');