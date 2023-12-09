<?php
/**
	* Define Theme Version
 */
define( 'TIMEBLOG_THEME_VERSION', '1.7' );	
	
function timeblog_css() {
	$parent_style = 'fiona-blog-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'timeblog-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('timeblog-color-default',get_stylesheet_directory_uri() .'/assets/css/color/default.css');
	wp_dequeue_style('fiona-blog-default');
	
	wp_enqueue_style('timeblog-media-query',get_stylesheet_directory_uri().'/assets/css/responsive.css');
	wp_dequeue_style('fiona-blog-media-query');
	
	wp_dequeue_style('fiona-blog-fonts');
	wp_enqueue_script('timeblog-custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);

}
add_action( 'wp_enqueue_scripts', 'timeblog_css',999);
   	

function timeblog_setup()	{	
	add_editor_style( array( 'assets/css/editor-style.css', timeblog_google_font() ) );
	
	add_theme_support( 'custom-header', apply_filters( 'timeblog_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 2000,
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'fiona_blog_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'timeblog_setup' );
	
/**
 * Register Google fonts for Avail.
 */
function timeblog_google_font() {
	
   $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function timeblog_scripts_styles() {
    wp_enqueue_style( 'timeblog-fonts', timeblog_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'timeblog_scripts_styles' );



/**
 * Import Options From Parent Theme
 *
 */
function timeblog_parent_theme_options() {
	$fiona_blog_mods = get_option( 'theme_mods_fiona-blog' );
	if ( ! empty( $fiona_blog_mods ) ) {
		foreach ( $fiona_blog_mods as $fiona_blog_mod_k => $fiona_blog_mod_v ) {
			set_theme_mod( $fiona_blog_mod_k, $fiona_blog_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'timeblog_parent_theme_options' );

/****
* This Theme supports
*/
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-logo' );
add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption'));


/**
 * Called all the Customize file.
 */
require( get_stylesheet_directory() . '/inc/customize/timeblog-premium.php');
