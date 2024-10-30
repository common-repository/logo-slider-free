<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }
	$content = '';
	
    $content .='<div class="content_area-'.$postid.'">';

    $lsuw_item_no           	 = get_post_meta($postid, 'lsuw_item_no', true);
    $lsuw_loop              	 = get_post_meta($postid, 'lsuw_loop', true);
    $lsuw_margin                 = get_post_meta($postid, 'lsuw_margin', true);
    $lsuw_navigation             = get_post_meta($postid, 'lsuw_navigation', true);
    $lsuw_navigation_position    = get_post_meta($postid, 'lsuw_navigation_position', true);
    $lsuw_pagination             = get_post_meta($postid, 'lsuw_pagination', true);
    $lsuw_pagination_position    = get_post_meta($postid, 'lsuw_pagination_position', true);
    $lsuw_autoplay               = get_post_meta($postid, 'lsuw_autoplay', true);
    $lsuw_autoplay_speed         = get_post_meta($postid, 'lsuw_autoplay_speed', true);
    $lsuw_stop_hover             = get_post_meta($postid, 'lsuw_stop_hover', true);
    $lsuw_autoplaytimeout        = get_post_meta($postid, 'lsuw_autoplaytimeout', true);
    $lsuw_itemsdesktop           = get_post_meta($postid, 'lsuw_itemsdesktop', true);
    $lsuw_itemsdesktopsmall      = get_post_meta($postid, 'lsuw_itemsdesktopsmall', true);
    $lsuw_itemsmobile            = get_post_meta($postid, 'lsuw_itemsmobile', true);
    $lsuw_nav_text_color         = get_post_meta($postid, 'lsuw_nav_text_color', true);
    $lsuw_nav_hover_text_color   = get_post_meta($postid, 'lsuw_nav_hover_text_color', true);
    $lsuw_nav_bg_color        	 = get_post_meta($postid, 'lsuw_nav_bg_color', true);
    $lsuw_nav_hover_bg_color     = get_post_meta($postid, 'lsuw_nav_hover_bg_color', true);
    $lsuw_pagination_color     	 = get_post_meta($postid, 'lsuw_pagination_color', true);
    $lsuw_pagination_bg_color    = get_post_meta($postid, 'lsuw_pagination_bg_color', true);
    $lsuw_pagination_style    	 = get_post_meta($postid, 'lsuw_pagination_style', true);

    $lsuw_hide_logo         = get_post_meta($postid, 'lsuw_hide_logo', true);
    $lsuw_logo_height       = get_post_meta($postid, 'lsuw_logo_height', true);
    $lsuw_hide_title 		= get_post_meta($postid, 'lsuw_hide_title', true);
    $lsuw_hide_links 		= get_post_meta($postid, 'lsuw_hide_links', true);
    $lsuw_hide_tooltips 	= get_post_meta($postid, 'lsuw_hide_tooltips', true);
    $lsuw_tooltip_width 	= get_post_meta($postid, 'lsuw_tooltip_width', true);
    $lsuw_tooltipsbg_color 	= get_post_meta($postid, 'lsuw_tooltipsbg_color', true);
    $lsuw_tooltip_color 	= get_post_meta($postid, 'lsuw_tooltip_color', true);
    $lsuw_title_color 		= get_post_meta($postid, 'lsuw_title_color', true);
    $lsuw_title_font_size 	= get_post_meta($postid, 'lsuw_title_font_size', true);
    $lsuw_title_align 		= get_post_meta($postid, 'lsuw_title_align', true);
    $lsuw_hide_desc 		= get_post_meta($postid, 'lsuw_hide_desc', true);
    $lsuw_desc_color 		= get_post_meta($postid, 'lsuw_desc_color', true);
    $lsuw_desc_font_size 	= get_post_meta($postid, 'lsuw_desc_font_size', true);
    $lsuw_desc_align 		= get_post_meta($postid, 'lsuw_desc_align', true);
    $lsuw_border_color 		= get_post_meta($postid, 'lsuw_border_color', true);
    $lsuw_hover_color 		= get_post_meta($postid, 'lsuw_hover_color', true);
    $lsuw_margin_size 		= get_post_meta($postid, 'lsuw_margin_size', true);
    $lsuw_position_tooltips = get_post_meta($postid, 'lsuw_position_tooltips', true);
    $lsuw_title_overlaycolor = get_post_meta($postid, 'lsuw_title_overlaycolor', true);	 
    $lsuw_excerpt           = get_post_meta($postid, 'lsuw_excerpt', true);   

    
	$content .='<script>
            jQuery(document).ready(function($) {
              $("#lsuw-'.$postid.'").owlCarousel({
                autoplay: '.$lsuw_autoplay.',
                autoplaySpeed: '.$lsuw_autoplay_speed.',
                autoplayHoverPause: '.$lsuw_stop_hover.',
                margin: '.$lsuw_margin.',
                autoplayTimeout: '.$lsuw_autoplaytimeout.',
                nav : '.$lsuw_navigation.',
                navText:["<",">"],
                dots: '.$lsuw_pagination.',
                smartSpeed: 450,
                clone:true,
                loop: '.$lsuw_loop.',
                responsive:{
                    0:{
                      items:'.$lsuw_itemsmobile.',
                    },
                    678:{
                      items:'.$lsuw_itemsdesktopsmall.',
                    },
                    980:{
                      items:'.$lsuw_itemsdesktop.',
                    },
                    1199:{
                      items:'.$lsuw_item_no.',
                    }
                }
              });
            });
          </script>';
		  
	$content.='<script type="text/javascript">
		jQuery(document).ready(function($){
			$(".img-tipso-'.$postid.'").tipso({
			  useTitle : false,
			  width : '.$lsuw_tooltip_width.',
			  position : "'.$lsuw_position_tooltips.'",
			  color : "#'.$lsuw_tooltip_color.'",
			  background : "#'.$lsuw_tooltipsbg_color.'",
			  delay : 200,
			  speed : 400,
			});
		});
	</script>';

    $content .='<style>';

	$content .='
		#lsuw-'.$postid.' .lsuw_slider_style1-link img {
		  height: '.$lsuw_logo_height.'px;
		  box-shadow:none;
		}
		';
		
	$content .='
    	.lsuw-logo-gird-3-thumbnail{
			margin:'.$lsuw_margin_size.'px;
			border:1px solid #'.$lsuw_border_color.';
    	}
    	.lsuw-logo-gird-3-thumbnail:hover{
			border:1px solid #'.$lsuw_hover_color.';
    	}
    	';
    $content .='.lsuw-logo-gird-3 .lsuw-logo-gird-3-content:before, .lsuw-logo-gird-3 .lsuw-logo-gird-3-content:after{
			background:'.$lsuw_title_overlaycolor.';
    	}';	
	$content .='
		.lsuw-logo-gird-3 img {
		  height: '.$lsuw_logo_height.'px;
		  width: 100%;
		  box-shadow:none;
		  border-radius:0;
		}';
	$content.='
		.lsuw-logo-gird-3-items .lsuw-logo-gird-3-title{
		  font-size: '.$lsuw_title_font_size.'px;
		  text-align: '.$lsuw_title_align.';
		  color: '.$lsuw_title_color.';
		}
	';
	$content.='
		.lsuw-logo-gird-3-description{
		  font-size: '.$lsuw_desc_font_size.'px;
		  text-align: '.$lsuw_desc_align.';
		  color: '.$lsuw_desc_color.';
		}
	';

	# Owl CSS
	if($lsuw_navigation_position == 1){
		$content .='
		#lsuw-'.$postid.' .owl-controls .owl-nav{
			margin-right: 0;
			margin-top: 0;
			position: absolute;
			right: 0;
			top: -50px;
		}';
	}
	else if($lsuw_navigation_position == 2){
		$content .='
		#lsuw-'.$postid.' .owl-controls .owl-nav{
			margin-right: 0;
			margin-top: 0;
			position: absolute;
			left: 0;
			top: -50px;
		}';
	}
	$content .='
		#lsuw-'.$postid.' .owl-nav .owl-prev{
			background: #'.$lsuw_nav_bg_color.';
			border-radius: 0;
			color: #'.$lsuw_nav_text_color.';
			cursor: pointer;
			display: inline-block;
			font-size: 14px;
			margin: 0 4px 0 0;
			padding: 5px;
			width: 25px;
		}';
	$content .='
		#lsuw-'.$postid.' .owl-nav .owl-next{
			background: #'.$lsuw_nav_bg_color.';
			border-radius: 0;
			color: #'.$lsuw_nav_text_color.';
			cursor: pointer;
			display: inline-block;
			font-size: 14px;
			margin: 0;
			padding: 5px;
			width: 25px;
		}';
	$content .='	
		#lsuw-'.$postid.' .owl-nav .owl-next:hover, #lsuw-'.$postid.' .owl-nav .owl-prev:hover {
		  background: #'.$lsuw_nav_hover_bg_color.';
		  color: #'.$lsuw_nav_hover_text_color.';
		}';
	$content .='	
		#lsuw-'.$postid.'.owl-theme .owl-dots {
		  text-align: '.$lsuw_pagination_position.';
		  margin-top: 10px;
		}';
	if($lsuw_pagination_style == 1){
		$content .='
		#lsuw-'.$postid.'.owl-theme .owl-dots .owl-dot span {
		  backface-visibility: visible;
		  background: #'.$lsuw_pagination_bg_color.';
		  border-radius: 30px;
		  display: block;
		  height: 10px;
		  margin: 5px 7px;
		  transition: opacity 200ms ease 0s;
		  width: 10px;
		}';
	}
	$content .='	
		#lsuw-'.$postid.'.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
		  background: #'.$lsuw_pagination_color.';
		}';	# End Owl CSS
	$content .='
		.lsuw_slider_style1{
			border: 1px solid #'.$lsuw_border_color.';
		}';
	$content .='
		.lsuw_slider_style1:hover{
			border: 1px solid #'.$lsuw_hover_color.';
		}';
	$content.='
		.lsuw_slider_style1-title{
		  font-size: '.$lsuw_title_font_size.'px;
		  text-align: '.$lsuw_title_align.';
		  color: '.$lsuw_title_color.';
		}
	';
	$content.='
		.lsuw_slider_style1 .lsuw_slider_style1-title a {
		  color: '.$lsuw_title_color.';
		}
	';

	$content .='</style>';

    require_once('excerpt.php');

    $content .= '<div id="lsuw-'.$postid.'" class="owl-carousel owl-theme">';
    while ($query->have_posts()) : $query->the_post();

	$web_url 	= get_post_meta( $post->ID, 'lsuw_url_input', true );
	$open_url 	= get_post_meta( $post->ID, 'lsuw_url_target', true );
	$post_thumb = get_the_post_thumbnail_url($post->ID);

		if($lsuw_hide_tooltips == 1){
		$content.='
			<div class="lsuw-logo-gird-3-thumbnail">
            <div class="lsuw-logo-gird-3 img-tipso-'.$postid.' tipso_style" data-tipso="'.esc_attr(get_the_title()).'">';
				if($lsuw_hide_logo == 1){
					$content.='<img src="'.$post_thumb.'" alt="'.esc_attr(get_the_title()).'" />';
				};
				$content.='
                <div class="lsuw-logo-gird-3-content">
                    <div class="lsuw-logo-gird-3-iconcontent">';
						if($lsuw_hide_links == 1){
							$content.='
								<ul class="lsuw-logo-gird-3-icon">
									<li><a target="'.$open_url.'" href="'.esc_url($web_url).'"><i class="fa fa-link"></i></a></li>
								</ul>
							';
						}
						if($lsuw_hide_title == 1){
							$content.='
							<div class="lsuw-logo-gird-3-items">
								<h3 class="lsuw-logo-gird-3-title">'.esc_attr(get_the_title()).'</h3>
							</div>';
						};
						$content.='
                    </div>
                </div>
            </div>';
			if($lsuw_hide_desc == 1){
				$content.='<div class="lsuw-logo-gird-3-description">'.lauw_get_excerpt($lsuw_excerpt).'</div>';
			};
				$content.='
			</div>';				
		}
		else {
		$content.='
			<div class="lsuw-logo-gird-3-thumbnail">		
            <div class="lsuw-logo-gird-3">';
				if($lsuw_hide_logo == 1){
					$content.='<img src="'.$post_thumb.'" alt="'.esc_attr(get_the_title()).'" />';
				};
				$content.='
                <div class="lsuw-logo-gird-3-content">
                    <div class="lsuw-logo-gird-3-iconcontent">';
						if($lsuw_hide_links == 1){
							$content.='
								<ul class="lsuw-logo-gird-3-icon">
									<li><a target="'.$open_url.'" href="'.esc_url($web_url).'"><i class="fa fa-link"></i></a></li>
								</ul>
							';
						}
						if($lsuw_hide_title == 1){
							$content.='
							<div class="lsuw-logo-gird-3-items">
								<h3 class="lsuw-logo-gird-3-title">'.esc_attr(get_the_title()).'</h3>
							</div>';
						};
						$content.='
                    </div>
                </div>
            </div>';
			if($lsuw_hide_desc == 1){
				$content.='<div class="lsuw-logo-gird-3-description">'.lauw_get_excerpt(92).'</div>';
			};
				$content.='
			</div>';				
		}

    endwhile;
    $content .='</div>';   #End owl carousal 
    $content .='</div>';   #End Content Area