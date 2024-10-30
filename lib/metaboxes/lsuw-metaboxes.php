<?php

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

function lsuw_logo_slider_meta_boxes() {

	$lsuwlogo = array( 'lsuwgeneratelogo');
    add_meta_box(
        'lsuw_logo_slider_id1',                                 # Metabox
        __( 'Logo Settings', 'lsuw' ),           				# Title
        'lsuw_logo_slider_meta_type_func',                      # Call Back func
       	$lsuwlogo,                                         		# post type
        'normal'                                                # Text Content
    );

    add_meta_box(
        'lsuw_logo_slider_id2',                                 # Metabox
        __( 'Logo Slider Options', 'lsuw' ),           			# Title
        'lsuw_logo_slider_settings_func',                       # Call Back func
       	$lsuwlogo,                                         		# post type
        'side'                                                  # Text Content
    );

    add_meta_box(
        'lsuw_logo_slider_id3',                					# Metabox
        __( 'Logo Details', 'lsuw' ),           				# Title
        'lsuw_logo_slider_details_func',               			# Call Back func
       	'lsuwshowcase',                                        	# post type
        'normal'                                                # Text Content
    );

}
add_action( 'add_meta_boxes', 'lsuw_logo_slider_meta_boxes' );

# Call Back Function...
function lsuw_logo_slider_meta_type_func( $post, $args){

	#Call get post meta.
	$lsuw_cat_name 			  	= get_post_meta($post->ID, 'lsuw_cat_name', true);
	if(empty($lsuw_cat_name)){
		$lsuw_cat_name = array();
	}
	$lsuw_theme_id 			  	= get_post_meta($post->ID, 'lsuw_theme_id', true);
	$lsuw_order_cat 			= get_post_meta($post->ID, 'lsuw_order_cat', true);
	$lsuw_order_items 			= get_post_meta($post->ID, 'lsuw_order_items', true);
	$lsuw_hide_logo				= get_post_meta($post->ID, 'lsuw_hide_logo', true);
	$lsuw_hide_title			= get_post_meta($post->ID, 'lsuw_hide_title', true);
	$lsuw_hide_links			= get_post_meta($post->ID, 'lsuw_hide_links', true);
	$lsuw_hide_tooltips			= get_post_meta($post->ID, 'lsuw_hide_tooltips', true);
	$lsuw_position_tooltips		= get_post_meta($post->ID, 'lsuw_position_tooltips', true);
	$lsuw_logo_height           = get_post_meta($post->ID, 'lsuw_logo_height', true);
	$lsuw_tooltipsbg_color 		= get_post_meta($post->ID, 'lsuw_tooltipsbg_color', true);
	$lsuw_tooltip_width 		= get_post_meta($post->ID, 'lsuw_tooltip_width', true);
	$lsuw_tooltip_color 		= get_post_meta($post->ID, 'lsuw_tooltip_color', true);
	$lsuw_border_color 			= get_post_meta($post->ID, 'lsuw_border_color', true);
	$lsuw_hover_color 			= get_post_meta($post->ID, 'lsuw_hover_color', true);
	$lsuw_margin_size 			= get_post_meta($post->ID, 'lsuw_margin_size', true);
	$lsuw_title_color         	= get_post_meta($post->ID, 'lsuw_title_color', true);
	$lsuw_title_overlaycolor    = get_post_meta($post->ID, 'lsuw_title_overlaycolor', true);
	$lsuw_title_font_size       = get_post_meta($post->ID, 'lsuw_title_font_size', true);
	$lsuw_title_align        	= get_post_meta($post->ID, 'lsuw_title_align', true);
	$lsuw_hide_desc        		= get_post_meta($post->ID, 'lsuw_hide_desc', true);
	$lsuw_desc_color        	= get_post_meta($post->ID, 'lsuw_desc_color', true);
	$lsuw_desc_font_size        = get_post_meta($post->ID, 'lsuw_desc_font_size', true);
	$lsuw_desc_align        	= get_post_meta($post->ID, 'lsuw_desc_align', true);
	$lsuw_column        		= get_post_meta($post->ID, 'lsuw_column', true);
	$lsuw_isotop_align        	= get_post_meta($post->ID, 'lsuw_isotop_align', true);
	$lsuw_excerpt        		= get_post_meta($post->ID, 'lsuw_excerpt', true);

?>
<div class="wrap">
	<table class="form-table">
		<tr valign="top">
			<th scope="row">
				<label for="lsuw_cat_name"><?php _e('Categories', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<?php
					$args = array( 
						'taxonomy'     => 'lsuwshowcasecat',
						'orderby'      => 'name',
						'show_count'   => 1,
						'pad_counts'   => 1, 
						'hierarchical' => 1,
						'echo'         => 0
					);
					$allthecats = get_categories( $args );
				?>

				<select required="" style="min-width:162px !important" class="timezone_string" name="lsuw_cat_name[]" multiple="multiple" size="10" style="height: 100px;">
					<?php
						foreach( $allthecats as $category ):
						$cat_id = $category->cat_ID;
						if(in_array($category->cat_ID, $lsuw_cat_name)){
							echo 	$selected = 'selected';
						}
						else
						{
							echo	$selected = '';
						}	
					?>
					<option <?php echo $selected; ?> value="<?php echo $cat_id; ?>"><?php echo $category->cat_name; ?></option>
					<?php endforeach; ?>	
				</select>					
			</td>
		</tr>
		<!-- End Categories -->


		<tr valign="top">
			<th scope="row">
				<label for="lsuw_theme_id"><?php _e('Styles', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_theme_id" id="lsuw_theme_id" class="timezone_string">
					<option value="1" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '1' ); ?>><?php _e('Default', 'lsuw')?></option>
					<option value="2" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '2' ); ?>><?php _e('Slider 1', 'lsuw')?></option>
					<option value="3" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '3' ); ?>><?php _e('Slider 2', 'lsuw')?></option>
					
					<option disabled value="4" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '4' ); ?>><?php _e('Grid Style 1 -Pro', 'lsuw')?></option>
					<option disabled value="5" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '5' ); ?>><?php _e('Grid Style 2 -Pro', 'lsuw')?></option>
					<option disabled value="6" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '6' ); ?>><?php _e('Grid Style 3 -Pro', 'lsuw')?></option>
					<option disabled value="7" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '7' ); ?>><?php _e('Isotope 1 -Pro', 'lsuw')?></option>
					<option disabled value="8" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '8' ); ?>><?php _e('Isotope 2 -Pro', 'lsuw')?></option>
					<option disabled value="9" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '9' ); ?>><?php _e('Isotope 3 -Pro', 'lsuw')?></option>
					<option disabled value="10" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '10' ); ?>><?php _e('List 1 -Pro', 'lsuw')?></option>
					<option disabled value="11" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '11' ); ?>><?php _e('List 2 -Pro', 'lsuw')?></option>		
					<option disabled value="12" <?php if ( isset ( $lsuw_theme_id ) ) selected( $lsuw_theme_id, '12' ); ?>><?php _e('List 3 -Pro', 'lsuw')?></option>	
				</select>
			</td>
		</tr>
		<!-- End Carousel Styles -->

		<tr valign="top" id="isotop_area">
			<th scope="row">
				<label for="lsuw_isotop_align"><?php _e('Isotop Align', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_isotop_align" id="lsuw_isotop_align" class="timezone_string">
					<option value="left" <?php if ( isset ( $lsuw_isotop_align ) ) selected( $lsuw_isotop_align, 'left' ); ?>><?php _e('Left', 'lsuw')?></option>
					<option value="center" <?php if ( isset ( $lsuw_isotop_align ) ) selected( $lsuw_isotop_align, 'center' ); ?>><?php _e('Center', 'lsuw')?></option>
					<option value="right" <?php if ( isset ( $lsuw_isotop_align ) ) selected( $lsuw_isotop_align, 'right' ); ?>><?php _e('Right', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Isotop Align -->

		<tr valign="top" id="column_area">
			<th scope="row">
				<label for="lsuw_column"><?php _e('Column', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_column" id="lsuw_column" class="timezone_string">
					<option value="6" <?php if ( isset ( $lsuw_column ) ) selected( $lsuw_column, '6' ); ?>><?php _e('Six', 'lsuw')?></option>
					<option value="5" <?php if ( isset ( $lsuw_column ) ) selected( $lsuw_column, '5' ); ?>><?php _e('Five', 'lsuw')?></option>
					<option value="4" <?php if ( isset ( $lsuw_column ) ) selected( $lsuw_column, '4' ); ?>><?php _e('Four', 'lsuw')?></option>	
					<option value="3" <?php if ( isset ( $lsuw_column ) ) selected( $lsuw_column, '3' ); ?>><?php _e('Three', 'lsuw')?></option>
					<option value="2" <?php if ( isset ( $lsuw_column ) ) selected( $lsuw_column, '2' ); ?>><?php _e('Two', 'lsuw')?></option>											
					<option value="1" <?php if ( isset ( $lsuw_column ) ) selected( $lsuw_column, '1' ); ?>><?php _e('One', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Column -->


		<tr valign="top">
			<th scope="row">
				<label for="lsuw_order_cat"><?php _e('Order By', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_order_cat" id="lsuw_order_cat" class="timezone_string">
					<option value="author" <?php if ( isset ( $lsuw_order_cat ) ) selected( $lsuw_order_cat, 'author' ); ?>><?php _e('Author', 'lsuw')?></option>
					<option value="post_date" <?php if ( isset ( $lsuw_order_cat ) ) selected( $lsuw_order_cat, 'post_date' ); ?>><?php _e('Date', 'lsuw')?></option>
					<option value="title" <?php if ( isset ( $lsuw_order_cat ) ) selected( $lsuw_order_cat, 'title' ); ?>><?php _e('Title', 'lsuw')?></option>
					<option value="modified" <?php if ( isset ( $lsuw_order_cat ) ) selected( $lsuw_order_cat, 'modified' ); ?>><?php _e('Modified', 'lsuw')?></option>
					<option value="rand" <?php if ( isset ( $lsuw_order_cat ) ) selected( $lsuw_order_cat, 'rand' ); ?>><?php _e('Rand', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Order By -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_order_items"><?php _e('Order', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_order_items" id="lsuw_order_items" class="timezone_string">
					<option value="DESC" <?php if ( isset ( $lsuw_order_items ) ) selected( $lsuw_order_items, 'DESC' ); ?>><?php _e('Descending', 'lsuw')?></option>
					<option value="ASC" <?php if ( isset ( $lsuw_order_items ) ) selected( $lsuw_order_items, 'ASC' ); ?>><?php _e('Ascending', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Order -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_hide_logo"><?php _e('Logo', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_hide_logo" id="lsuw_hide_logo" class="timezone_string">
					<option value="1" <?php if ( isset ( $lsuw_hide_logo ) ) selected( $lsuw_hide_logo, '1' ); ?>><?php _e('Show', 'lsuw')?></option>
					<option value="2" <?php if ( isset ( $lsuw_hide_logo ) ) selected( $lsuw_hide_logo, '2' ); ?>><?php _e('Hide', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Logo Show/Hide -->

		<tr valign="top" id="img_controller2" style="<?php if($lsuw_hide_logo == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_logo_height"><?php _e('Logo Height (px)', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_logo_height" id="lsuw_logo_height" maxlength="4" class="timezone_string" required value="<?php  if($lsuw_logo_height !=''){echo $lsuw_logo_height; }else{ echo '150';} ?>">
			</td>
		</tr>
		<!-- End Logo Height -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_hide_title"><?php _e('Logo Title', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_hide_title" id="lsuw_hide_title" class="timezone_string">
					<option value="2" <?php if ( isset ( $lsuw_hide_title ) ) selected( $lsuw_hide_title, '2' ); ?>><?php _e('Hide', 'lsuw')?></option>
					<option value="1" <?php if ( isset ( $lsuw_hide_title ) ) selected( $lsuw_hide_title, '1' ); ?>><?php _e('Show', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Logo Title -->

		<tr valign="top" id="cap_control2" style="<?php if($lsuw_hide_title == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_title_color"><?php _e('Logo Title Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" class="color-picker" data-alpha="true" data-default-color="#000" name="lsuw_title_color" value="<?php echo $lsuw_title_color?>" readonly />
			</td>
		</tr>
		<!-- End Caption Background Color -->

		<tr valign="top" id="cap_control3" style="<?php if($lsuw_hide_title == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_title_font_size"><?php _e('Title Font Size', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_title_font_size" id="lsuw_title_font_size">
					<?php for($i=12; $i<=72; $i++){?>
					<option value="<?php echo $i; ?>" <?php if ( isset ( $lsuw_title_font_size ) ) selected( $lsuw_title_font_size, $i ); ?>><?php echo $i."px";?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<!-- End Title Font Size-->
		
		<tr valign="top" id="cap_control4" style="<?php if($lsuw_hide_title == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_title_align"><?php _e('Title Text Alignment', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_title_align" id="lsuw_title_align" class="timezone_string">
					<option value="center" <?php if ( isset ( $lsuw_title_align ) ) selected( $lsuw_title_align, 'center' ); ?>><?php _e('Center', 'lsuw')?></option>
					<option value="left" <?php if ( isset ( $lsuw_title_align ) ) selected( $lsuw_title_align, 'left' ); ?>><?php _e('Left', 'lsuw')?></option>
					<option value="right" <?php if ( isset ( $lsuw_title_align ) ) selected( $lsuw_title_align, 'right' ); ?>><?php _e('Right', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Title Text Alignment-->

		<tr valign="top" id="cap_control5">
			<th scope="row">
				<label for="lsuw_title_overlaycolor"><?php _e('Logo Overlay Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" class="color-picker" data-alpha="true" data-default-color="#000" name="lsuw_title_overlaycolor" value="<?php echo $lsuw_title_overlaycolor?>" readonly />
			</td>
		</tr>
		<!-- End Caption Background Color -->		
		
		
		<tr valign="top">
			<th scope="row">
				<label for="lsuw_hide_desc"><?php _e('Logo Description', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_hide_desc" id="lsuw_hide_desc" class="timezone_string">
					<option value="2" <?php if ( isset ( $lsuw_hide_desc ) ) selected( $lsuw_hide_desc, '2' ); ?>><?php _e('Hide', 'lsuw')?></option>
					<option value="1" <?php if ( isset ( $lsuw_hide_desc ) ) selected( $lsuw_hide_desc, '1' ); ?>><?php _e('Show', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Description Content -->

		<tr valign="top" id="desc_control2" style="<?php if($lsuw_hide_desc == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_desc_color"><?php _e('Description Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" class="color-picker" data-alpha="true" data-default-color="#000" name="lsuw_desc_color" value="<?php echo $lsuw_desc_color?>" readonly />
			</td>
		</tr>
		<!-- End Description Text Color -->
		
		<tr valign="top" id="desc_control3" style="<?php if($lsuw_hide_desc == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_desc_font_size"><?php _e('Description Font Size', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_desc_font_size" id="lsuw_desc_font_size">
					<?php for($i=12; $i<=72; $i++){?>
					<option value="<?php echo $i; ?>" <?php if ( isset ( $lsuw_desc_font_size ) ) selected( $lsuw_desc_font_size, $i ); ?>><?php echo $i."px";?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<!-- End Description Font Size-->
		
		<tr valign="top" id="desc_control4" style="<?php if($lsuw_hide_desc == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_desc_align"><?php _e('Description Text Alignment', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_desc_align" id="lsuw_desc_align" class="timezone_string">
					<option value="center" <?php if ( isset ( $lsuw_desc_align ) ) selected( $lsuw_desc_align, 'center' ); ?>><?php _e('Center', 'lsuw')?></option>
					<option value="left" <?php if ( isset ( $lsuw_desc_align ) ) selected( $lsuw_desc_align, 'left' ); ?>><?php _e('Left', 'lsuw')?></option>
					<option value="right" <?php if ( isset ( $lsuw_desc_align ) ) selected( $lsuw_desc_align, 'right' ); ?>><?php _e('Right', 'lsuw')?></option>
					<option value="justify" <?php if ( isset ( $lsuw_desc_align ) ) selected( $lsuw_desc_align, 'justify' ); ?>><?php _e('Justify', 'lsuw')?></option>					
				</select>
			</td>
		</tr>
		<!-- End Description Text Alignment -->


		<tr valign="top" id="desc_control5" style="<?php if($lsuw_hide_desc == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_excerpt"><?php _e('Excerpt Length in Words', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_excerpt" value="<?php if($lsuw_excerpt !=''){echo $lsuw_excerpt;} else{ echo "86"; }  ?>" class="timezone_string" >
			</td>
		</tr>				
		<!-- End Tooltip Background Color -->		

		
		<tr valign="top">
			<th scope="row">
				<label for="lsuw_hide_links"><?php _e('Permalink', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_hide_links" id="lsuw_hide_links" class="timezone_string">
					<option value="1" <?php if ( isset ( $lsuw_hide_links ) ) selected( $lsuw_hide_links, '1' ); ?>><?php _e('Show', 'lsuw')?></option>
					<option value="2" <?php if ( isset ( $lsuw_hide_links ) ) selected( $lsuw_hide_links, '2' ); ?>><?php _e('Hide', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Show/Hide Permalink -->
		
		<tr valign="top">
			<th scope="row">
				<label for="lsuw_hide_tooltips"><?php _e('Tooltip', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_hide_tooltips" id="lsuw_hide_tooltips" class="timezone_string">
					<option value="1" <?php if ( isset ( $lsuw_hide_tooltips ) ) selected( $lsuw_hide_tooltips, '1' ); ?>><?php _e('Show', 'lsuw')?></option>
					<option disabled value="2" <?php if ( isset ( $lsuw_hide_tooltips ) ) selected( $lsuw_hide_tooltips, '2' ); ?>><?php _e('Hide -Pro', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Show/Hide Tooltip -->

		<tr valign="top" id="tooltips_position" style="<?php if($lsuw_hide_tooltips == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_position_tooltips"><?php _e('Tooltip Position', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_position_tooltips" id="lsuw_position_tooltips" class="timezone_string">
					<option value="top" <?php if ( isset ( $lsuw_position_tooltips ) ) selected( $lsuw_position_tooltips, 'top' ); ?>><?php _e('Top', 'lsuw')?></option>
					<option disabled value="bottom" <?php if ( isset ( $lsuw_position_tooltips ) ) selected( $lsuw_position_tooltips, 'bottom' ); ?>><?php _e('Bottom -Pro', 'lsuw')?></option>
					<option disabled value="left" <?php if ( isset ( $lsuw_position_tooltips ) ) selected( $lsuw_position_tooltips, 'left' ); ?>><?php _e('Left -Pro', 'lsuw')?></option>
					<option disabled value="right" <?php if ( isset ( $lsuw_position_tooltips ) ) selected( $lsuw_position_tooltips, 'right' ); ?>><?php _e('Right -Pro', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Show/Hide Tooltip -->


		<tr valign="top" id="tip_control1" style="<?php if($lsuw_hide_tooltips == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_tooltipsbg_color"><?php _e('Tooltip Background Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_tooltipsbg_color" value="<?php if($lsuw_tooltipsbg_color !=''){echo $lsuw_tooltipsbg_color;} else{ echo "#000";} ?>" class="jscolor" readonly>
			</td>
		</tr>				
		<!-- End Tooltip Background Color -->

		<tr valign="top" id="tip_control2" style="<?php if($lsuw_hide_tooltips == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_tooltip_color"><?php _e('Tooltip Text Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_tooltip_color" value="<?php if($lsuw_tooltip_color !=''){echo $lsuw_tooltip_color;} else{ echo "#fff";} ?>" class="jscolor" readonly />
			</td>
		</tr>				
		<!-- End Tooltip Text Color -->

		<tr valign="top" id="tip_control3" style="<?php if($lsuw_hide_tooltips == 2){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_tooltip_width"><?php _e('Tooltip Width (px)', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_tooltip_width" id="lsuw_tooltip_width" maxlength="4" class="timezone_string" value="<?php  if($lsuw_tooltip_width !=''){echo $lsuw_tooltip_width; }else{ echo '150';} ?>">
			</td>
		</tr>
		<!-- End Logo Height -->
		
		<tr valign="top" id="margin_area">
			<th scope="row">
				<label for="lsuw_margin_size"><?php _e('Items Margin', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_margin_size" id="lsuw_margin_size">
					<?php for($i=0; $i<=50; $i++){?>
					<option value="<?php echo $i; ?>" <?php if ( isset ( $lsuw_margin_size ) ) selected( $lsuw_margin_size, $i ); ?>><?php echo $i."px";?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<!-- End Margin Size -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_border_color"><?php _e('Border Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_border_color" value="<?php if($lsuw_border_color !=''){echo $lsuw_border_color;} else{ echo "#e7e7e7";} ?>" class="jscolor" readonly />
			</td>
		</tr>				
		<!-- End Border Color -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_hover_color"><?php _e('Border Hover Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_hover_color" value="<?php if($lsuw_hover_color !=''){echo $lsuw_hover_color;} else{ echo "#f5903b";} ?>" class="jscolor" readonly />
			</td>
		</tr>				
		<!-- End Border Hover Color -->
													
	</table>
</div>
<?php }   //

	function lsuw_logo_slider_settings_func($post, $args){

		#Call get post meta.
		$lsuw_item_no 				= get_post_meta($post->ID, 'lsuw_item_no', true);
		$lsuw_loop 					= get_post_meta($post->ID, 'lsuw_loop', true);
		$lsuw_margin 				= get_post_meta($post->ID, 'lsuw_margin', true);
		$lsuw_navigation 			= get_post_meta($post->ID, 'lsuw_navigation', true);
		$lsuw_navigation_position 	= get_post_meta($post->ID, 'lsuw_navigation_position', true);
		$lsuw_pagination 			= get_post_meta($post->ID, 'lsuw_pagination', true);
		$lsuw_pagination_position 	= get_post_meta($post->ID, 'lsuw_pagination_position', true);
		$lsuw_autoplay   			= get_post_meta($post->ID, 'lsuw_autoplay', true);
		$lsuw_autoplay_speed   		= get_post_meta($post->ID, 'lsuw_autoplay_speed', true);
		$lsuw_stop_hover   			= get_post_meta($post->ID, 'lsuw_stop_hover', true);
		$lsuw_itemsdesktop   		= get_post_meta($post->ID, 'lsuw_itemsdesktop', true);
		$lsuw_itemsdesktopsmall  	= get_post_meta($post->ID, 'lsuw_itemsdesktopsmall', true);
		$lsuw_itemsmobile   		= get_post_meta($post->ID, 'lsuw_itemsmobile', true);
		$lsuw_autoplaytimeout    	= get_post_meta($post->ID, 'lsuw_autoplaytimeout', true);
		$lsuw_nav_text_color     	= get_post_meta($post->ID, 'lsuw_nav_text_color', true);	
		$lsuw_nav_hover_text_color  = get_post_meta($post->ID, 'lsuw_nav_hover_text_color', true);	
		$lsuw_nav_bg_color       	= get_post_meta($post->ID, 'lsuw_nav_bg_color', true);
		$lsuw_nav_hover_bg_color    = get_post_meta($post->ID, 'lsuw_nav_hover_bg_color', true);
		$lsuw_pagination_color   	= get_post_meta($post->ID, 'lsuw_pagination_color', true);
		$lsuw_pagination_bg_color	= get_post_meta($post->ID, 'lsuw_pagination_bg_color', true);
		$lsuw_pagination_style		= get_post_meta($post->ID, 'lsuw_pagination_style', true);
	
?>
<div class="wrap">

	<table class="form-table">
		<tr valign="top">
			<th scope="row">
				<label for="lsuw_autoplay"><?php _e('Autoplay', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_autoplay" id="lsuw_autoplay" class="timezone_string fixcarousel">
					<option value="true" <?php if ( isset ( $lsuw_autoplay ) ) selected( $lsuw_autoplay, 'true' ); ?>><?php _e('True', 'lsuw')?></option>
					<option value="false" <?php if ( isset ( $lsuw_autoplay ) ) selected( $lsuw_autoplay, 'false' ); ?>><?php _e('False', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Autoplay -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_autoplay_speed"><?php _e('Slide Delay', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_autoplay_speed" id="lsuw_autoplay_speed" maxlength="4" class="timezone_string" required value="<?php  if($lsuw_autoplay_speed !=''){echo $lsuw_autoplay_speed; }else{ echo '700';} ?>">							
			</td>
		</tr>
		<!-- End Slide Delay -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_stop_hover"><?php _e('Stop Hover', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_stop_hover" id="lsuw_stop_hover" class="timezone_string fixcarousel">
					<option value="true" <?php if ( isset ( $lsuw_stop_hover ) ) selected( $lsuw_stop_hover, 'true' ); ?>><?php _e('True', 'lsuw')?></option>	
					<option value="false" <?php if ( isset ( $lsuw_stop_hover ) ) selected( $lsuw_stop_hover, 'false' ); ?>><?php _e('False', 'lsuw')?></option>
				</select>							
			</td>
		</tr>
		<!-- End Stop Hover -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_autoplaytimeout"><?php _e('Autoplay Time Out (Sec)', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_autoplaytimeout" id="lsuw_autoplaytimeout" class="timezone_string fixcarousel">
					<option value="1000" <?php if ( isset ( $lsuw_autoplaytimeout ) ) selected( $lsuw_autoplaytimeout, '1000' ); ?>><?php _e('1', 'lsuw')?></option>
					<option disabled value="2000" <?php if ( isset ( $lsuw_autoplaytimeout ) ) selected( $lsuw_autoplaytimeout, '2000' ); ?>><?php _e('2', 'lsuw')?></option>
					<option disabled value="3000" <?php if ( isset ( $lsuw_autoplaytimeout ) ) selected( $lsuw_autoplaytimeout, '3000' ); ?>><?php _e('3', 'lsuw')?></option>
					<option disabled value="4000" <?php if ( isset ( $lsuw_autoplaytimeout ) ) selected( $lsuw_autoplaytimeout, '4000' ); ?>><?php _e('4', 'lsuw')?></option>
					<option disabled value="5000" <?php if ( isset ( $lsuw_autoplaytimeout ) ) selected( $lsuw_autoplaytimeout, '5000' ); ?>><?php _e('5', 'lsuw')?></option>
					<option disabled value="6000" <?php if ( isset ( $lsuw_autoplaytimeout ) ) selected( $lsuw_autoplaytimeout, '6000' ); ?>><?php _e('6', 'lsuw')?></option>
					<option disabled value="7000" <?php if ( isset ( $lsuw_autoplaytimeout ) ) selected( $lsuw_autoplaytimeout, '7000' ); ?>><?php _e('7', 'lsuw')?></option>
					<option disabled value="8000" <?php if ( isset ( $lsuw_autoplaytimeout ) ) selected( $lsuw_autoplaytimeout, '8000' ); ?>><?php _e('8', 'lsuw')?></option>
					<option disabled value="9000" <?php if ( isset ( $lsuw_autoplaytimeout ) ) selected( $lsuw_autoplaytimeout, '9000' ); ?>><?php _e('9', 'lsuw')?></option>
					<option disabled value="10000" <?php if ( isset ( $lsuw_autoplaytimeout ) ) selected( $lsuw_autoplaytimeout, '10000' ); ?>><?php _e('10', 'lsuw')?></option>
				</select>							
			</td>
		</tr>
		<!-- End Autoplay Time Out -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_item_no"><?php _e('Items No', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_item_no" id="lsuw_item_no" class="timezone_string fixcarousel">
					<option value="3" <?php if ( isset ( $lsuw_item_no ) )  selected( $lsuw_item_no, '3' ); ?>><?php _e('3', 'lsuw')?></option>
					<option value="1" <?php if ( isset ( $lsuw_item_no ) )  selected( $lsuw_item_no, '1' ); ?>><?php _e('1', 'lsuw')?></option>
					<option value="2" <?php if ( isset ( $lsuw_item_no ) )  selected( $lsuw_item_no, '2' ); ?>><?php _e('2', 'lsuw')?></option>
					<option value="4" <?php if ( isset ( $lsuw_item_no ) )  selected( $lsuw_item_no, '4' ); ?>><?php _e('4', 'lsuw')?></option>
					<option disabled value="5" <?php if ( isset ( $lsuw_item_no ) )  selected( $lsuw_item_no, '5' ); ?>><?php _e('5', 'lsuw')?></option>
					<option disabled value="6" <?php if ( isset ( $lsuw_item_no ) )  selected( $lsuw_item_no, '6' ); ?>><?php _e('6', 'lsuw')?></option>
					<option disabled value="7" <?php if ( isset ( $lsuw_item_no ) )  selected( $lsuw_item_no, '7' ); ?>><?php _e('7', 'lsuw')?></option>
					<option disabled value="8" <?php if ( isset ( $lsuw_item_no ) )  selected( $lsuw_item_no, '8' ); ?>><?php _e('8', 'lsuw')?></option>
					<option disabled value="9" <?php if ( isset ( $lsuw_item_no ) )  selected( $lsuw_item_no, '9' ); ?>><?php _e('9', 'lsuw')?></option>
					<option disabled value="10" <?php if ( isset ( $lsuw_item_no ) ) selected( $lsuw_item_no, '10' ); ?>><?php _e('10', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Items No -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_itemsdesktop"><?php _e('Items Desktop', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_itemsdesktop" id="lsuw_itemsdesktop" class="timezone_string fixcarousel">

					<option value="3" <?php if ( isset ( $lsuw_itemsdesktop ) ) selected( $lsuw_itemsdesktop, '3' ); ?>><?php _e('3', 'lsuw')?></option>
					<option value="1" <?php if ( isset ( $lsuw_itemsdesktop ) ) selected( $lsuw_itemsdesktop, '1' ); ?>><?php _e('1', 'lsuw')?></option>
					<option value="2" <?php if ( isset ( $lsuw_itemsdesktop ) ) selected( $lsuw_itemsdesktop, '2' ); ?>><?php _e('2', 'lsuw')?></option>
					<option disabled value="4" <?php if ( isset ( $lsuw_itemsdesktop ) ) selected( $lsuw_itemsdesktop, '4' ); ?>><?php _e('4', 'lsuw')?></option>
					<option disabled value="5" <?php if ( isset ( $lsuw_itemsdesktop ) ) selected( $lsuw_itemsdesktop, '5' ); ?>><?php _e('5', 'lsuw')?></option>
					<option disabled value="6" <?php if ( isset ( $lsuw_itemsdesktop ) ) selected( $lsuw_itemsdesktop, '6' ); ?>><?php _e('6', 'lsuw')?></option>
					<option disabled value="7" <?php if ( isset ( $lsuw_itemsdesktop ) ) selected( $lsuw_itemsdesktop, '7' ); ?>><?php _e('7', 'lsuw')?></option>
					<option disabled value="8" <?php if ( isset ( $lsuw_itemsdesktop ) ) selected( $lsuw_itemsdesktop, '8' ); ?>><?php _e('8', 'lsuw')?></option>
					<option disabled value="9" <?php if ( isset ( $lsuw_itemsdesktop ) ) selected( $lsuw_itemsdesktop, '9' ); ?>><?php _e('9', 'lsuw')?></option>
					<option disabled value="10" <?php if ( isset ( $lsuw_itemsdesktop ) ) selected( $lsuw_itemsdesktop, '10' ); ?>><?php _e('10', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Items Desktop -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_itemsdesktopsmall"><?php _e('Items Desktop Small', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_itemsdesktopsmall" id="lsuw_itemsdesktopsmall" class="timezone_string fixcarousel">
					<option value="1" <?php if ( isset ( $lsuw_itemsdesktopsmall ) ) selected( $lsuw_itemsdesktopsmall, '1' ); ?>><?php _e('1', 'lsuw')?></option>
					<option value="2" <?php if ( isset ( $lsuw_itemsdesktopsmall ) ) selected( $lsuw_itemsdesktopsmall, '2' ); ?>><?php _e('2', 'lsuw')?></option>
					<option value="3" <?php if ( isset ( $lsuw_itemsdesktopsmall ) ) selected( $lsuw_itemsdesktopsmall, '3' ); ?>><?php _e('3', 'lsuw')?></option>
					<option value="4" <?php if ( isset ( $lsuw_itemsdesktopsmall ) ) selected( $lsuw_itemsdesktopsmall, '4' ); ?>><?php _e('4', 'lsuw')?></option>
					<option value="5" <?php if ( isset ( $lsuw_itemsdesktopsmall ) ) selected( $lsuw_itemsdesktopsmall, '5' ); ?>><?php _e('5', 'lsuw')?></option>
					<option value="6" <?php if ( isset ( $lsuw_itemsdesktopsmall ) ) selected( $lsuw_itemsdesktopsmall, '6' ); ?>><?php _e('6', 'lsuw')?></option>
					<option value="7" <?php if ( isset ( $lsuw_itemsdesktopsmall ) ) selected( $lsuw_itemsdesktopsmall, '7' ); ?>><?php _e('7', 'lsuw')?></option>
					<option value="8" <?php if ( isset ( $lsuw_itemsdesktopsmall ) ) selected( $lsuw_itemsdesktopsmall, '8' ); ?>><?php _e('8', 'lsuw')?></option>
					<option value="9" <?php if ( isset ( $lsuw_itemsdesktopsmall ) ) selected( $lsuw_itemsdesktopsmall, '9' ); ?>><?php _e('9', 'lsuw')?></option>
					<option value="10" <?php if ( isset ( $lsuw_itemsdesktopsmall ) ) selected( $lsuw_itemsdesktopsmall, '10' ); ?>><?php _e('10', 'lsuw')?></option>
				</select>			
			</td>
		</tr>
		<!-- End Items Desktop Small -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_itemsmobile"><?php _e('Items Mobile', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_itemsmobile" id="lsuw_itemsmobile" class="timezone_string fixcarousel">
					<option value="1" <?php if ( isset ( $lsuw_itemsmobile ) ) selected( $lsuw_itemsmobile, '1' ); ?>><?php _e('1', 'lsuw')?></option>
					<option value="2" <?php if ( isset ( $lsuw_itemsmobile ) ) selected( $lsuw_itemsmobile, '2' ); ?>><?php _e('2', 'lsuw')?></option>
					<option value="3" <?php if ( isset ( $lsuw_itemsmobile ) ) selected( $lsuw_itemsmobile, '3' ); ?>><?php _e('3', 'lsuw')?></option>
					<option value="4" <?php if ( isset ( $lsuw_itemsmobile ) ) selected( $lsuw_itemsmobile, '4' ); ?>><?php _e('4', 'lsuw')?></option>
					<option value="5" <?php if ( isset ( $lsuw_itemsmobile ) ) selected( $lsuw_itemsmobile, '5' ); ?>><?php _e('5', 'lsuw')?></option>
					<option value="6" <?php if ( isset ( $lsuw_itemsmobile ) ) selected( $lsuw_itemsmobile, '6' ); ?>><?php _e('6', 'lsuw')?></option>
					<option value="7" <?php if ( isset ( $lsuw_itemsmobile ) ) selected( $lsuw_itemsmobile, '7' ); ?>><?php _e('7', 'lsuw')?></option>
					<option value="8" <?php if ( isset ( $lsuw_itemsmobile ) ) selected( $lsuw_itemsmobile, '8' ); ?>><?php _e('8', 'lsuw')?></option>
					<option value="9" <?php if ( isset ( $lsuw_itemsmobile ) ) selected( $lsuw_itemsmobile, '9' ); ?>><?php _e('9', 'lsuw')?></option>
					<option value="10" <?php if ( isset ( $lsuw_itemsmobile ) ) selected( $lsuw_itemsmobile, '10' ); ?>><?php _e('10', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Items Mobile -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_loop"><?php _e('Loop', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_loop" id="lsuw_loop" class="timezone_string fixcarousel">
					<option value="true" <?php if ( isset ( $lsuw_loop ) ) selected( $lsuw_loop, 'true' ); ?>><?php _e('True', 'lsuw')?></option>
					<option value="false" <?php if ( isset ( $lsuw_loop ) ) selected( $lsuw_loop, 'false' ); ?>><?php _e('False', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Loop -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_margin"><?php _e('Margin', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="number" name="lsuw_margin" id="lsuw_margin" maxlength="3" class="timezone_string fixcarousel" value="<?php if($lsuw_margin !=''){echo $lsuw_margin;} else{ echo '0'; } ?>" value="0">
			</td>
		</tr>
		<!-- End Margin -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_navigation"><?php _e('Navigation', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_navigation" id="lsuw_navigation" class="timezone_string fixcarousel">
					<option value="true" <?php if ( isset ( $lsuw_navigation ) ) selected( $lsuw_navigation, 'true' ); ?>><?php _e('True', 'lsuw')?></option>
					<option disabled value="false" <?php if ( isset ( $lsuw_navigation ) ) selected( $lsuw_navigation, 'false' ); ?>><?php _e('False', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Navigation -->

		<tr valign="top" id="nav_control1" style="<?php if($lsuw_navigation == 'false'){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_navigation_position"><?php _e('Navigation Position', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_navigation_position" id="lsuw_navigation_position" class="timezone_string fixcarousel">
					<option value="1" <?php if ( isset ( $lsuw_navigation_position ) ) selected( $lsuw_navigation_position, '1' ); ?>><?php _e('Top Right', 'lsuw')?></option>
					<option disabled value="2" <?php if ( isset ( $lsuw_navigation_position ) ) selected( $lsuw_navigation_position, '2' ); ?>><?php _e('Top Left', 'lsuw')?></option>
					<option disabled value="3" <?php if ( isset ( $lsuw_navigation_position ) ) selected( $lsuw_navigation_position, '3' ); ?>><?php _e('Bottom Center', 'lsuw')?></option>
					<option disabled value="4" <?php if ( isset ( $lsuw_navigation_position ) ) selected( $lsuw_navigation_position, '4' ); ?>><?php _e('Bottom Left', 'lsuw')?></option>
					<option disabled value="5" <?php if ( isset ( $lsuw_navigation_position ) ) selected( $lsuw_navigation_position, '5' ); ?>><?php _e('Bottom Right', 'lsuw')?></option>
					<option disabled value="6" <?php if ( isset ( $lsuw_navigation_position ) ) selected( $lsuw_navigation_position, '6' ); ?>><?php _e('Centred', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Navigation Position -->

		<tr valign="top" id="nav_control2" style="<?php if($lsuw_navigation == 'false'){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_nav_text_color"><?php _e('Navigation Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_nav_text_color" value="<?php if($lsuw_nav_text_color !=''){echo $lsuw_nav_text_color;} else{ echo "#afafaf";} ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Navigation Color -->

		<tr valign="top" id="nav_control3" style="<?php if($lsuw_navigation == 'false'){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_nav_hover_text_color"><?php _e('Navigation Hover Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_nav_hover_text_color" value="<?php if($lsuw_nav_hover_text_color !=''){echo $lsuw_nav_hover_text_color;} else{ echo "#ffffff";} ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Navigation Hover Color -->

		<tr valign="top" id="nav_control4" style="<?php if($lsuw_navigation == 'false'){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_nav_bg_color"><?php _e('Navigation Background Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_nav_bg_color" value="<?php if($lsuw_nav_bg_color !=''){echo $lsuw_nav_bg_color;} else{ echo "#f0f0f0";} ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Navigation Background Color -->

		<tr valign="top" id="nav_control5" style="<?php if($lsuw_navigation == 'false'){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_nav_hover_bg_color"><?php _e('Navigation Hover Background Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_nav_hover_bg_color" value="<?php if($lsuw_nav_hover_bg_color !=''){echo $lsuw_nav_hover_bg_color;} else{ echo "#f5903b";} ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Navigation Hover Background Color -->

		<tr valign="top">
			<th scope="row">
				<label for="lsuw_pagination"><?php _e('Pagination', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_pagination" id="lsuw_pagination" class="timezone_string fixcarousel">
					<option value="true" <?php if ( isset ( $lsuw_pagination ) ) selected( $lsuw_pagination, 'true' ); ?>><?php _e('True', 'lsuw')?></option>
					<option disabled value="false" <?php if ( isset ( $lsuw_pagination ) ) selected( $lsuw_pagination, 'false' ); ?>><?php _e('False', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Pagination -->

		<tr valign="top" id="pagi_control1" style="<?php if($lsuw_pagination == 'false'){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_pagination_color"><?php _e('Pagination Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_pagination_color" value="<?php if($lsuw_pagination_color !=''){echo $lsuw_pagination_color;} else{ echo "#f5903b";} ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Pagination Color -->

		<tr valign="top" id="pagi_control2" style="<?php if($lsuw_pagination == 'false'){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_pagination_bg_color"><?php _e('Pagination Background Color', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="lsuw_pagination_bg_color" value="<?php if($lsuw_pagination_bg_color !=''){echo $lsuw_pagination_bg_color;} else{ echo "#bbbbbb";} ?>" class="jscolor" readonly>
			</td>
		</tr>
		<!-- End Pagination Background Color -->

		<tr valign="top" id="pagi_control3" style="<?php if($lsuw_pagination == 'false'){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_pagination_style"><?php _e('Pagination Style', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_pagination_style" id="lsuw_pagination_style" class="timezone_string fixcarousel">
					<option value="1" <?php if ( isset ( $lsuw_pagination_style ) ) selected( $lsuw_pagination_style, '1' ); ?>><?php _e('Round', 'lsuw')?></option>
					<option disabled value="2" <?php if ( isset ( $lsuw_pagination_style ) ) selected( $lsuw_pagination_style, '2' ); ?>><?php _e('Square', 'lsuw')?></option>
					<option disabled value="3" <?php if ( isset ( $lsuw_pagination_style ) ) selected( $lsuw_pagination_style, '3' ); ?>><?php _e('Star', 'lsuw')?></option>
					<option disabled value="4" <?php if ( isset ( $lsuw_pagination_style ) ) selected( $lsuw_pagination_style, '4' ); ?>><?php _e('Line', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Pagination Position -->

		<tr valign="top" id="pagi_control4" style="<?php if($lsuw_pagination == 'false'){	echo "display:none;"; }?>">
			<th scope="row">
				<label for="lsuw_pagination_position"><?php _e('Pagination Position', 'lsuw')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="lsuw_pagination_position" id="lsuw_pagination_position" class="timezone_string fixcarousel">
					<option value="center" <?php if ( isset ( $lsuw_pagination_position ) ) selected( $lsuw_pagination_position, 'center' ); ?>><?php _e('Center', 'lsuw')?></option>
					<option disabled value="left" <?php if ( isset ( $lsuw_pagination_position ) ) selected( $lsuw_pagination_position, 'left' ); ?>><?php _e('Left', 'lsuw')?></option>
					<option disabled value="right" <?php if ( isset ( $lsuw_pagination_position ) ) selected( $lsuw_pagination_position, 'right' ); ?>><?php _e('Right', 'lsuw')?></option>
				</select>
			</td>
		</tr>
		<!-- End Pagination Position -->
		
	</table>
</div>
<?php }   //

	function lsuw_logo_slider_details_func($post, $args){

		#Call get post meta.
		$lsuw_url_input          	= get_post_meta($post->ID, 'lsuw_url_input', true);
		$lsuw_url_target       = get_post_meta($post->ID, 'lsuw_url_target', true);
		?>
		<div class="wrap">
			<table class="form-table"> 
				<tr valign="top">
					<th scope="row">
						<label for="lsuw_url_input"><?php _e('Website URL', 'lsuw')?></label>
					</th>
					<td style="vertical-align: middle;">
						<input type="text" name="lsuw_url_input" value="<?php if($lsuw_url_input !=''){echo $lsuw_url_input;} else{ echo "";} ?>">
					</td>
				</tr>
				<!-- End Navigation Background Color -->
				
				<tr valign="top">
					<th scope="row">
						<label for="lsuw_url_target"><?php _e('Target URL', 'lsuw')?></label>
					</th>
					<td style="vertical-align: middle;">
						<select name="lsuw_url_target" id="lsuw_url_target" class="timezone_string">
							<option value="_self" <?php if ( isset ( $lsuw_url_target ) ) selected( $lsuw_url_target, '_self' ); ?>><?php _e('Self', 'lsuw')?></option>
							<option disabled value="_blank" <?php if ( isset ( $lsuw_url_target ) ) selected( $lsuw_url_target, '_blank' ); ?>><?php _e('Blank', 'lsuw')?></option>
						</select>
					<br/>
					<span class="description">Example: ( Open your target link to same page or a new page.)</span>
					</td>
				</tr>
				<!-- End Navigation Background Color -->

			</table>
		</div>
<?php	}

	
# Data save in custom metabox field
function lsuw_meta_box_save_func($post_id){

	# Doing autosave then return.
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;


	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_column' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_column', $_POST['lsuw_column'] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_cat_name' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_cat_name', $_POST['lsuw_cat_name'] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_isotop_align' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_isotop_align', $_POST['lsuw_isotop_align'] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_theme_id' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_theme_id', $_POST['lsuw_theme_id'] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_order_cat' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_order_cat', $_POST[ 'lsuw_order_cat' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_order_items' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_order_items', $_POST[ 'lsuw_order_items' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_url_input' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_url_input', $_POST['lsuw_url_input'] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_url_target' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_url_target', $_POST['lsuw_url_target'] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_hide_logo' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_hide_logo', $_POST[ 'lsuw_hide_logo' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_logo_height' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_logo_height', $_POST[ 'lsuw_logo_height' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_hide_title' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_hide_title', $_POST[ 'lsuw_hide_title' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_title_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_title_color', $_POST[ 'lsuw_title_color' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_title_overlaycolor' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_title_overlaycolor', $_POST[ 'lsuw_title_overlaycolor' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_hide_links' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_hide_links', $_POST[ 'lsuw_hide_links' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_title_align' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_title_align', $_POST[ 'lsuw_title_align' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_hide_desc' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_hide_desc', $_POST[ 'lsuw_hide_desc' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_desc_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_desc_color', $_POST[ 'lsuw_desc_color' ] );
	}	
	
	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_desc_font_size' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_desc_font_size', $_POST[ 'lsuw_desc_font_size' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_desc_align' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_desc_align', $_POST[ 'lsuw_desc_align' ] );
	}

    if( isset($_POST['lsuw_excerpt'])) {
		if( $_POST['lsuw_excerpt'] == '' || $_POST['lsuw_excerpt'] == 0 || $_POST['lsuw_excerpt'] == null || ( strlen($_POST['lsuw_excerpt']) > 3) ||  !is_numeric($_POST['lsuw_excerpt'])){

			update_post_meta( $post_id, 'lsuw_excerpt', 86 );	

		} else
		{
      		update_post_meta( $post_id, 'lsuw_excerpt', esc_html($_POST['lsuw_excerpt']) );  			
		}
    } else {

      		update_post_meta( $post_id, 'lsuw_excerpt', 86 );  			
    }

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_title_font_size' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_title_font_size', $_POST[ 'lsuw_title_font_size' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_hide_tooltips' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_hide_tooltips', $_POST[ 'lsuw_hide_tooltips' ] );
	}	

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_position_tooltips' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_position_tooltips', $_POST[ 'lsuw_position_tooltips' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_tooltipsbg_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_tooltipsbg_color', $_POST[ 'lsuw_tooltipsbg_color' ] );
	}

	#Checks for input and saves
	if( isset( $_POST[ 'lsuw_tooltip_width' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_tooltip_width', esc_html($_POST['lsuw_tooltip_width']) );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_tooltip_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_tooltip_color', $_POST[ 'lsuw_tooltip_color' ] );
	}

	#Checks for input and saves
	if( isset( $_POST[ 'lsuw_margin_size' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_margin_size', esc_html($_POST['lsuw_margin_size']) );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_border_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_border_color', $_POST[ 'lsuw_border_color' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_hover_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_hover_color', $_POST[ 'lsuw_hover_color' ] );
	}
	

    // Carousal Settings

	#Checks for input and sanitizes/saves if needed
    if( isset($_POST['lsuw_item_no']) && ($_POST['lsuw_item_no'] != '') ) {
        update_post_meta( $post_id, 'lsuw_item_no', esc_html($_POST['lsuw_item_no']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_loop']) && ($_POST['lsuw_loop'] != '') ) {
        update_post_meta( $post_id, 'lsuw_loop', esc_html($_POST['lsuw_loop']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset( $_POST['lsuw_margin'] ) ) {
    	if(strlen($_POST['lsuw_margin']) > 2){     // input value length greate than 2 

    	} else{
	    	if( $_POST['lsuw_margin'] == '' || $_POST['lsuw_margin'] == is_null($_POST['lsuw_margin']) ){

	    		update_post_meta( $post_id, 'lsuw_margin', 0 );

	    	}
	    	else
	    	{
	    		if (is_numeric($_POST['lsuw_margin'])) {

	    			update_post_meta( $post_id, 'lsuw_margin', esc_html($_POST['lsuw_margin']) );

	    		}
	    	}
    	}
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_navigation']) && ($_POST['lsuw_navigation'] != '') ) {
        update_post_meta( $post_id, 'lsuw_navigation', esc_html($_POST['lsuw_navigation']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_navigation_position']) && ($_POST['lsuw_navigation_position'] != '') ) {
        update_post_meta( $post_id, 'lsuw_navigation_position', esc_html($_POST['lsuw_navigation_position']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_pagination_position']) && ($_POST['lsuw_pagination_position'] != '') ) {
        update_post_meta( $post_id, 'lsuw_pagination_position', esc_html($_POST['lsuw_pagination_position']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_pagination']) && ($_POST['lsuw_pagination'] != '') ) {
        update_post_meta( $post_id, 'lsuw_pagination', esc_html($_POST['lsuw_pagination']) );
    }
	
	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_pagination_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_pagination_color', $_POST[ 'lsuw_pagination_color' ] );
	}
	
	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_pagination_bg_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_pagination_bg_color', $_POST[ 'lsuw_pagination_bg_color' ] );
	}

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_pagination_style']) && ($_POST['lsuw_pagination_style'] != '') ) {
        update_post_meta( $post_id, 'lsuw_pagination_style', esc_html($_POST['lsuw_pagination_style']) );
    }    
    
 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_autoplay']) && ($_POST['lsuw_autoplay'] != '') ) {
        update_post_meta( $post_id, 'lsuw_autoplay', esc_html($_POST['lsuw_autoplay']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset( $_POST['lsuw_autoplay_speed'] ) ) {
    	if(strlen($_POST['lsuw_autoplay_speed']) > 4 ){

    	} else{

    		if($_POST['lsuw_autoplay_speed'] == '' || is_null($_POST['lsuw_autoplay_speed'])){

    			update_post_meta( $post_id, 'lsuw_autoplay_speed', 700 );
    		}
    		else{
	    		if (is_numeric($_POST['lsuw_autoplay_speed']) && strlen($_POST['lsuw_autoplay_speed']) <= 4) {

	    			update_post_meta( $post_id, 'lsuw_autoplay_speed', esc_html($_POST['lsuw_autoplay_speed']) );

	    		}    

    		}
    	}
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_stop_hover']) && ($_POST['lsuw_stop_hover'] != '') ) {
        update_post_meta( $post_id, 'lsuw_stop_hover', esc_html($_POST['lsuw_stop_hover']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_itemsdesktop']) && ($_POST['lsuw_itemsdesktop'] != '') ) {
        update_post_meta( $post_id, 'lsuw_itemsdesktop', esc_html($_POST['lsuw_itemsdesktop']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_itemsdesktopsmall']) && ($_POST['lsuw_itemsdesktopsmall'] != '') ) {
        update_post_meta( $post_id, 'lsuw_itemsdesktopsmall', esc_html($_POST['lsuw_itemsdesktopsmall']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_itemsmobile']) && ($_POST['lsuw_itemsmobile'] != '') ) {
        update_post_meta( $post_id, 'lsuw_itemsmobile', esc_html($_POST['lsuw_itemsmobile']) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if( isset($_POST['lsuw_autoplaytimeout']) && ($_POST['lsuw_autoplaytimeout'] != '') ) {
        update_post_meta( $post_id, 'lsuw_autoplaytimeout', esc_html($_POST['lsuw_autoplaytimeout']) );
    }

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_nav_text_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_nav_text_color', $_POST[ 'lsuw_nav_text_color' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_nav_hover_text_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_nav_hover_text_color', $_POST[ 'lsuw_nav_hover_text_color' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_nav_bg_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_nav_bg_color', $_POST[ 'lsuw_nav_bg_color' ] );
	}

	#Checks for input and saves if needed
	if( isset( $_POST[ 'lsuw_nav_hover_bg_color' ] ) ) {
	    update_post_meta( $post_id, 'lsuw_nav_hover_bg_color', $_POST[ 'lsuw_nav_hover_bg_color' ] );
	}

}
add_action( 'save_post', 'lsuw_meta_box_save_func' );
# Custom metabox field end