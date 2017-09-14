<?php

// Intrigrate Redux framework
require_once ('inc/redux-framework-master/redux-framework.php');
require_once ('inc/redux-framework-master/sample/theme-function.php');

// Style
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
	
	// Enque Style
	wp_enqueue_style( 'ts-css-bootstrap', get_theme_file_uri( '/assets/css/bootstrap.css' ), array( 'twentyseventeen-style' ), '4.0' );
	wp_enqueue_style( 'ts-css-fontawesome', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_enqueue_style( 'ts-css-custom', get_theme_file_uri( '/assets/css/custom.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_enqueue_style( 'ts-form-custom', 'http://cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css%22%20rel=%22stylesheet', array( 'twentyseventeen-style' ), '1.0' );
	
	wp_enqueue_script( 'ts-js-bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array(), '4.0', true );
}

// Menu register
register_nav_menus( array(
        'ts_main_menu' => __( 'Main Menu TS', 'twentyseventeen' ),
) );

//for read more function
	function ts_read_more($limit){
		$post_content = explode(' ', get_the_content());
		$limit_content = array_slice($post_content, 0, $limit);
		
		echo implode(' ',$limit_content);
	}

// create a URL to the child theme
function get_template_directory_child() {
    $directory_template = get_template_directory_uri(); 
    $directory_child = str_replace('storefront', '', $directory_template) . 'child-storefront';

    return $directory_child;
}

// Intrigrate Custom Navigation Walker
require_once('inc/wp-bootstrap-navwalker.php');


// Alert Short code

function ts_alert_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'content' 	=> 'null',
        'color' 	=> '#BEA424',
		'background'=> '#F7EEBF' 
    ), $atts, 'ts_alert_shortcode' ));

    return '<div style= "color:' .$color.'; background:'.$background.'; width: 100%; padding : 20px;" >'.$content.'</div>';
}
add_shortcode( 'alert', 'ts_alert_shortcode' );

