<?php
/**
 * 
 * File to register custom controls.
 * 
 * @package Articlewave
 */

 // register radio image control
require get_template_directory() . '/inc/customizer/custom-controls/radio-image/class-radio-image-control.php';
$wp_customize->register_control_type( 'ArticleWave_Control_Radio_Image' );


require get_template_directory() . '/inc/customizer/custom-controls/toggle/class-toggle-control.php';
$wp_customize->register_control_type( 'ArticleWave_Control_Toogle' );

require get_template_directory() . '/inc/customizer/custom-controls/typography/class-typography-control.php';
$wp_customize->register_control_type( 'ArticleWave_Control_Typography' );

// Load/Register control radio buttonset.
require_once get_template_directory() . '/inc/customizer/custom-controls/buttonset/class-buttonset-control.php';
$wp_customize->register_control_type( 'Articlewave_Control_Buttonset' );

// Load/Register control heading.
require_once get_template_directory() . '/inc/customizer/custom-controls/heading/class-heading-control.php';
$wp_customize->register_control_type( 'Articlewave_Control_Heading' );

require get_template_directory() . '/inc/customizer/custom-controls/repeater/class-repeater-control.php';
