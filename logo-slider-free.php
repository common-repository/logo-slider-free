<?php
	/*
	Plugin Name: Logo Slider Free
	Plugin URI: http://pluginspoint.com/logoshowcase
	Description: Logo Slider ultimate WordPress plugin allow to Display a list of clients, supporters, partners or sponsors logos in your WordPress website easily.
	Version: 1.0
	Author: Plugins Point
	Author URI: http://pluginspoint.com
	TextDomain: lsuw
	License: GPLv2
	*/


	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	define('LSUW_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('lsuw_plugin_dir', plugin_dir_path(__FILE__) );


	# Load plugin necessary files 
	function lsuw_logo_slider_init(){

		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'lsuw_fontawesome-css', LSUW_PLUGIN_PATH.'assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'lsuw_carousel-min-css', LSUW_PLUGIN_PATH.'assets/css/owl.carousel.min.css' );
		wp_enqueue_style( 'lsuw_theme-theme-css', LSUW_PLUGIN_PATH.'assets/css/owl.theme.default.css' );
		wp_enqueue_style( 'lsuw_animate-css', LSUW_PLUGIN_PATH.'assets/css/animate.css' );
		wp_enqueue_style( 'lsuw_app-tipso-css', LSUW_PLUGIN_PATH.'assets/css/tipso.css' );
		wp_enqueue_style( 'lsuw_app-css', LSUW_PLUGIN_PATH.'assets/css/app.css' );
		wp_enqueue_script( 'lsuw_logos_js', plugins_url( 'assets/js/app_script.js', __FILE__), array(), '1.0.0', true );
		wp_enqueue_script( 'lsuw_carousel_slider_js', plugins_url( '/assets/js/owl.carousel.js' , __FILE__ ) , array( 'jquery' ) );
		wp_enqueue_script( 'lsuw_carousel_mousewheel_js', plugins_url( '/assets/js/jquery.mousewheel.min.js' , __FILE__ ) , array( 'jquery' ) );
		wp_enqueue_script( 'lsuw_carousel_colorpicker_js', plugins_url( '/assets/js/jscolor.js' , __FILE__ ) , array( 'jquery' ) );
		wp_enqueue_script( 'lsuw_carousel_tipso_js', plugins_url( '/assets/js/tipso.js' , __FILE__ ) , array( 'jquery' ) );

		wp_enqueue_script( 'lsuw_isotop_js', plugins_url( '/assets/js/isotope.pkgd.min.js' , __FILE__ ) , array( 'jquery' ) );				
	}
	add_action( 'init', 'lsuw_logo_slider_init' );

	# Load plugin admin enqueue scripts
	function lsuw_logo_slider_load_admin_scripts() {

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( '/assets/js/wp-color-picker-alpha.js', __FILE__ ), array( 'wp-color-picker' ));

	}
	add_action('admin_enqueue_scripts', 'lsuw_logo_slider_load_admin_scripts');


	# Load plugin Translations
	function lsuw_logo_slider_load_textdomain(){

		load_plugin_textdomain('lsuw', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );

	}
	add_action('plugins_loaded', 'lsuw_logo_slider_load_textdomain');

	# Post Type
	require_once( 'lib/post-type/lsuw-post-type.php' );

	# Metabox
	require_once( 'lib/metaboxes/lsuw-metaboxes.php' );

	#Shortcode
	require_once( 'lib/shortcodes/lsuw-shortcode.php' );

?>