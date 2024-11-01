<?php
/*
	Plugin Name: Skill Bars
	Plugin URI: https://themepoints.com/skillbars
	Description: Easy animated Shortcode skill bars for WordPress.
	Version: 1.2
	Author: Themepoints
	Author URI: http://themepoints.com
	License: GPLv2
	Text Domain: skillbar
	Domain Path: /languages
*/




	if ( ! defined( 'ABSPATH' ) )
	die("Can't load this file directly");

	define('TP_SKILLBARSHORTCODES_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('tp_skillbarshortcodes_plugin_dir', plugin_dir_path( __FILE__ ) );
	add_filter('widget_text', 'do_shortcode');


	/*==========================================================================
		Skill Bar Admin Scripts
	==========================================================================*/
	function tp_skillbar_shortcodes_script(){
		wp_enqueue_style('skillbar-css', TP_SKILLBARSHORTCODES_PLUGIN_PATH.'css/skillbar-css.css');
		wp_enqueue_script('jquery');
		wp_enqueue_script('skillbar-js', plugins_url( '/js/shortcodes_skillbar.js', __FILE__ ), array('jquery'), '1.0', false);
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script( 'skillbar_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}
	add_action('init', 'tp_skillbar_shortcodes_script');


	function tp_skillbar_shortcode( $atts  ) {
		extract( shortcode_atts( array(
			'title'			=> '',
			'percentage'	=> '80',
			'color'			=> '#333',
			'show_percent'	=> 'true',
		), $atts ) );

		$output = '<div class="skillbar" data-percent="'. $percentage .'%">';
			if ( $title !== '' ) $output .= '<div class="skillbar-title" style="background: '. $color .';"><em>'. $title .'</em></div>';
			$output .= '<div class="skillbar-bar" style="background: '. $color .';"></div>';
			if ( $show_percent == 'true' ) {
				$output .= '<div class="skillbar-percent">'.$percentage.'%</div>';
			}
		$output .= '</div>';
		
		return $output;
	}
	add_shortcode( 'skillbar', 'tp_skillbar_shortcode' );

?>