<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( ! function_exists( 'shera_blog_enqueue_styles' ) ) :
    /**
     * Load assets.
     *
     * @since 1.0.0
     */
    function shera_blog_enqueue_styles() {
        wp_enqueue_style( 'shera-blog-style-parent', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'shera-blog-style', get_stylesheet_directory_uri() . '/style.css', array( 'shera-blog-style-parent' ), '1.0.0' );
        wp_enqueue_script( 'shera-blog-custom', get_theme_file_uri( '/body-class.js' ), array( 'jquery' ), '20151215', true );
    }
endif;
add_action( 'wp_enqueue_scripts', 'shera_blog_enqueue_styles', 99 );

if ( ! function_exists( 'shera_blog_customize_backend_styles' ) ) :
    /**
     * Load assets.
     *
     * @since 1.0.0
     */
    function shera_blog_customize_backend_styles() {
        wp_enqueue_style( 'shera-blog-style', get_stylesheet_directory_uri() . '/customizer-style.css' );
    }
endif;
add_action( 'customize_controls_enqueue_scripts', 'shera_blog_customize_backend_styles', 99 );