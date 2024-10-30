jQuery(document).ready(function($){
	"use strict";
	
	// Margin  & Column 

	var lsuw_theme_id = $("#lsuw_theme_id").val();	
	if( lsuw_theme_id == 1 || lsuw_theme_id == 2 || lsuw_theme_id == 3 ||lsuw_theme_id == 8 || lsuw_theme_id == 9 || lsuw_theme_id == 10 ){
		$("#lsuw_logo_slider_id2").show();
		$("#margin_area, #column_area").hide();
	} 
	else {
		$("#margin_area, #column_area").show();
		$("#lsuw_logo_slider_id2").hide();
	}

	if( lsuw_theme_id == 7 || lsuw_theme_id == 8 || lsuw_theme_id == 9 ){
		$("#isotop_area").show();
		$("#column_area").show("slow");
	}
	else {
		$("#isotop_area").hide();

	}

	if( lsuw_theme_id == 8 || lsuw_theme_id == 9 || lsuw_theme_id == 10 || lsuw_theme_id == 11 || lsuw_theme_id == 12){
		$("#lsuw_logo_slider_id2").hide();
	}	

	// Hide Logo Overlay 
	if( lsuw_theme_id == 1 || lsuw_theme_id == 4 || lsuw_theme_id == 7 || lsuw_theme_id == 10 || lsuw_theme_id == 11 || lsuw_theme_id == 12){
		$("#cap_control5").hide();
	}
	else {
		
		$("#cap_control5").show();
	}	


	$("#lsuw_theme_id").on('change', function(){

		var lsuw_theme_id = $("#lsuw_theme_id").val();
		if( lsuw_theme_id == 4 || lsuw_theme_id == 5 || lsuw_theme_id == 6 || lsuw_theme_id == 7 ){
			$("#margin_area, #column_area").show("slow");
			$("#lsuw_logo_slider_id2").hide("slow");
		}
		else {

			$("#lsuw_logo_slider_id2").show("slow");
			$("#margin_area, #column_area").hide("slow");

		}
		if( lsuw_theme_id == 7 || lsuw_theme_id == 8 || lsuw_theme_id == 9 ){
			$("#isotop_area").show("slow");
			$("#column_area").show("slow");
		}
		else {
			$("#isotop_area").hide("slow");

		}

		if( lsuw_theme_id == 8 || lsuw_theme_id == 9 || lsuw_theme_id == 10 || lsuw_theme_id == 11 || lsuw_theme_id == 12){
			$("#lsuw_logo_slider_id2").hide("slow");
		}

		// Hide Logo Overlay 
		if( lsuw_theme_id == 1 || lsuw_theme_id == 4 || lsuw_theme_id == 7 || lsuw_theme_id == 10 || lsuw_theme_id == 11 || lsuw_theme_id == 12){
			$("#cap_control5").hide();
		}
		else {
			
			$("#cap_control5").show();
		}					

	});


	$("#lsuw_hide_logo").on('change', function(){
		var getImgVal = $(this).val();
		if(getImgVal  == 2){
			$("#img_controller2").hide('slow');
		}
		if(getImgVal  == 1){
			$("#img_controller2").show('slow');
		}
	});
	
	
	$("#lsuw_hide_title").on('change', function(){
		var getImgCapVal = $(this).val();
		if(getImgCapVal  == 2){
			$("#cap_control1, #cap_control2, #cap_control3, #cap_control4").hide('slow');
		}
		if(getImgCapVal  == 1){
			$("#cap_control1, #cap_control2, #cap_control3, #cap_control4").show('slow');
		}
	});
	
	$("#lsuw_hide_desc").on('change', function(){
		var getImgDescVal = $(this).val();
		if(getImgDescVal  == 2){
			$("#desc_control2, #desc_control3, #desc_control4, #desc_control5").hide('slow');
		}
		if(getImgDescVal  == 1){
			$("#desc_control2, #desc_control3, #desc_control4, #desc_control5").show('slow');
		}
	});

	$("#lsuw_hide_tooltips").on('change', function(){
		var getImgTooltipVal = $(this).val();
		if(getImgTooltipVal  == 2){
			$("#tip_control1, #tip_control2, #tip_control3, #tooltips_position").hide('slow');
		}
		if(getImgTooltipVal  == 1){
			$("#tip_control1, #tip_control2, #tip_control3, #tooltips_position").show('slow');
		}
	});

	$("#navigation").on('change', function(){
		var getImgNavVal = $(this).val();
		if(getImgNavVal  == 'false'){
			$("#nav_control1, #nav_control2, #nav_control3, #nav_control4, #nav_control5").hide('slow');
		}
		if(getImgNavVal  == 'true'){
			$("#nav_control1, #nav_control2, #nav_control3, #nav_control4, #nav_control5").show('slow');
		}
	});

	$("#lsuw_pagination").on('change', function(){
		var getImgPagiVal = $(this).val();
		if(getImgPagiVal  == 'false'){
			$("#pagi_control1, #pagi_control2, #pagi_control3, #pagi_control4").hide('slow');
		}
		if(getImgPagiVal  == 'true'){
			$("#pagi_control1, #pagi_control2, #pagi_control3, #pagi_control4").show('slow');
		}
	});

	// Iso Top 
    $(".all-portfolios").isotope({
        itemSelector: '.single-portfolio',
        layoutMode: 'fitRows',
    });
    
    $('ul.filter li').click(function(){
        
      $("ul.filter li").removeClass("active");
      $(this).addClass("active");        

        var selector = $(this).attr('data-filter'); 
        $(".all-portfolios").isotope({ 
            filter: selector, 
            animationOptions: { 
                duration: 750, 
                easing: 'linear', 
                queue: false, 
            } 
        }); 
      return false; 
    });	
	

	

});