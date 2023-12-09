<?php
/**
 * Ice Cream Shop: Customizer
 *
 * @subpackage Ice Cream Shop
 * @since 1.0
 */

use WPTRT\Customize\Section\Ice_Cream_Shop_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Ice_Cream_Shop_Button::class );

	$manager->add_section(
		new Ice_Cream_Shop_Button( $manager, 'ice_cream_shop_pro', [
			'title' => __( 'Ice Cream Shop Pro', 'ice-cream-shop' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'ice-cream-shop' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/ice-cream-shop-wp-theme/', 'ice-cream-shop')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'ice-cream-shop-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'ice-cream-shop-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function ice_cream_shop_customize_register( $wp_customize ) {

	$wp_customize->add_setting('ice_cream_shop_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('ice_cream_shop_logo_padding',array(
		'label' => __('Logo Margin','ice-cream-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('ice_cream_shop_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'ice_cream_shop_sanitize_float'
	));
	$wp_customize->add_control('ice_cream_shop_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','ice-cream-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('ice_cream_shop_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'ice_cream_shop_sanitize_float'
	));
	$wp_customize->add_control('ice_cream_shop_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','ice-cream-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('ice_cream_shop_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'ice_cream_shop_sanitize_float'
	));
	$wp_customize->add_control('ice_cream_shop_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','ice-cream-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('ice_cream_shop_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'ice_cream_shop_sanitize_float'
 	));
 	$wp_customize->add_control('ice_cream_shop_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','ice-cream-shop'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('ice_cream_shop_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'ice_cream_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('ice_cream_shop_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','ice-cream-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'ice_cream_shop_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_site_title_color', array(
		'label' => 'Title Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_setting('ice_cream_shop_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'ice_cream_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('ice_cream_shop_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','ice-cream-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'ice_cream_shop_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_site_tagline_color', array(
		'label' => 'Tagline Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_panel( 'ice_cream_shop_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'ice-cream-shop' ),
		'description' => __( 'Description of what this panel does.', 'ice-cream-shop' ),
	) );

	$wp_customize->add_section( 'ice_cream_shop_theme_options_section', array(
    	'title'      => __( 'General Settings', 'ice-cream-shop' ),
		'priority'   => 30,
		'panel' => 'ice_cream_shop_panel_id'
	) );

	$wp_customize->add_setting('ice_cream_shop_theme_options',array(
		'default' => 'One Column',
		'sanitize_callback' => 'ice_cream_shop_sanitize_choices'
	));
	$wp_customize->add_control('ice_cream_shop_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','ice-cream-shop'),
		'section' => 'ice_cream_shop_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','ice-cream-shop'),
		   'Right Sidebar' => __('Right Sidebar','ice-cream-shop'),
		   'One Column' => __('One Column','ice-cream-shop'),
		   'Grid Layout' => __('Grid Layout','ice-cream-shop')
		),
	));

	$wp_customize->add_setting('ice_cream_shop_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'ice_cream_shop_sanitize_choices'
	));
	$wp_customize->add_control('ice_cream_shop_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','ice-cream-shop'),
        'section' => 'ice_cream_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','ice-cream-shop'),
            'Right Sidebar' => __('Right Sidebar','ice-cream-shop'),
            'One Column' => __('One Column','ice-cream-shop')
        ),
	));

	$wp_customize->add_setting('ice_cream_shop_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'ice_cream_shop_sanitize_choices'
	));
	$wp_customize->add_control('ice_cream_shop_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','ice-cream-shop'),
        'section' => 'ice_cream_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','ice-cream-shop'),
            'Right Sidebar' => __('Right Sidebar','ice-cream-shop'),
            'One Column' => __('One Column','ice-cream-shop')
        ),
	));

	$wp_customize->add_setting('ice_cream_shop_archive_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'ice_cream_shop_sanitize_choices'
	));
	$wp_customize->add_control('ice_cream_shop_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','ice-cream-shop'),
        'section' => 'ice_cream_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','ice-cream-shop'),
            'Right Sidebar' => __('Right Sidebar','ice-cream-shop'),
            'One Column' => __('One Column','ice-cream-shop'),
            'Grid Layout' => __('Grid Layout','ice-cream-shop')
        ),
	));

	//home page header
	$wp_customize->add_section( 'ice_cream_shop_header_section' , array(
    	'title'    => __( 'Header Settings', 'ice-cream-shop' ),
		'priority' => null,
		'panel' => 'ice_cream_shop_panel_id'
	) );

    $wp_customize->add_setting('ice_cream_shop_contact_btn_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ice_cream_shop_contact_btn_text',array(
		'label'	=> __('Phone Number','ice-cream-shop'),
		'section' => 'ice_cream_shop_header_section',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'ice_cream_shop_header_menu_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_menu_col', array(
		'label' => 'Menu Color',
		'section' => 'ice_cream_shop_header_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_header_menu_active_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_menu_active_col', array(
		'label' => 'Menu Active Color',
		'section' => 'ice_cream_shop_header_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_header_submenu_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_submenu_col', array(
		'label' => 'SubMenu Color',
		'section' => 'ice_cream_shop_header_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_header_submenubg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_submenubg_col', array(
		'label' => 'SubMenu BG Color',
		'section' => 'ice_cream_shop_header_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_header_submenubghrv_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_submenubghrv_col', array(
		'label' => 'SubMenu Hover Color',
		'section' => 'ice_cream_shop_header_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_header_icons_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_icons_col', array(
		'label' => 'Icons Color',
		'section' => 'ice_cream_shop_header_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_header_cartno_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_cartno_col', array(
		'label' => 'Cart Number Color',
		'section' => 'ice_cream_shop_header_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_header_cartnobg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_cartnobg_col', array(
		'label' => 'Cart Number BG Color',
		'section' => 'ice_cream_shop_header_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_header_phoneno_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_phoneno_col', array(
		'label' => 'Phone Number Color',
		'section' => 'ice_cream_shop_header_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_header_phonenoicon_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_phonenoicon_col', array(
		'label' => 'Phone Number Icon Color',
		'section' => 'ice_cream_shop_header_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_header_phonenobg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_header_phonenobg_col', array(
		'label' => 'Phone Number BG Color',
		'section' => 'ice_cream_shop_header_section',
	)));




	//home page slider
	$wp_customize->add_section( 'ice_cream_shop_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'ice-cream-shop' ),
		'priority' => null,
		'panel' => 'ice_cream_shop_panel_id'
	) );

	$wp_customize->add_setting('ice_cream_shop_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'ice_cream_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('ice_cream_shop_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','ice-cream-shop'),
	   	'section' => 'ice_cream_shop_slider_section',
	));

	
	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'ice_cream_shop_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'ice_cream_shop_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'ice_cream_shop_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'ice-cream-shop' ),
			'description' => __('Image Size ( 600 x 650 )', 'ice-cream-shop' ),
			'section' => 'ice_cream_shop_slider_section',
			'type' => 'dropdown-pages'
		));
	}


	//Slider excerpt
	$wp_customize->add_setting( 'ice_cream_shop_slider_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'ice_cream_shop_sanitize_float',
	) );
	$wp_customize->add_control( 'ice_cream_shop_slider_excerpt_length', array(
		'label'       => esc_html__( 'Slider Excerpt length','ice-cream-shop' ),
		'section'     => 'ice_cream_shop_slider',
		'type'        => 'number',
		'settings'    => 'ice_cream_shop_slider_excerpt_length',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	



	$wp_customize->add_setting('ice_cream_shop_slider_offerbtnlink',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ice_cream_shop_slider_offerbtnlink',array(
		'label'	=> __('Button Link','ice-cream-shop'),
		'section' => 'ice_cream_shop_slider_section',
		'type' => 'text'
	));


	$wp_customize->add_setting( 'ice_cream_shop_slider_title_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_slider_title_col', array(
		'label' => 'Title Color',
		'section' => 'ice_cream_shop_slider_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_slider_description_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_slider_description_col', array(
		'label' => 'Description Color',
		'section' => 'ice_cream_shop_slider_section',
	)));


	$wp_customize->add_setting( 'ice_cream_shop_slider_buttontext_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_slider_buttontext_col', array(
		'label' => 'Button Text Color',
		'section' => 'ice_cream_shop_slider_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_slider_buttonbg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_slider_buttonbg_col', array(
		'label' => 'Button BG Color',
		'section' => 'ice_cream_shop_slider_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_slider_buttonbrd_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_slider_buttonbrd_col', array(
		'label' => 'Button Border Color',
		'section' => 'ice_cream_shop_slider_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_slider_boxbg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_slider_boxbg_col', array(
		'label' => 'Box BG Color',
		'section' => 'ice_cream_shop_slider_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_slider_boxbrd_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_slider_boxbrd_col', array(
		'label' => 'Box Border Color',
		'section' => 'ice_cream_shop_slider_section',
	)));


	$wp_customize->add_setting( 'ice_cream_shop_slider_prevnext_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_slider_prevnext_col', array(
		'label' => 'Prev Next Color',
		'section' => 'ice_cream_shop_slider_section',
	)));


	$wp_customize->add_setting( 'ice_cream_shop_slider_prevnextbg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_slider_prevnextbg_col', array(
		'label' => 'Prev Next BG Color',
		'section' => 'ice_cream_shop_slider_section',
	)));



	//productcategory Section
	$wp_customize->add_section('ice_cream_shop_productcategory_section',array(
		'title'	=> __('Product Category Section','ice-cream-shop'),
		'description'=> __('<b>Note :</b> This section will appear below the Slider Section.','ice-cream-shop'),
		'panel' => 'ice_cream_shop_panel_id',
	));
 
    $wp_customize->add_setting('ice_cream_shop_productcategorysection_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ice_cream_shop_productcategorysection_title',array(
		'label'	=> __('Section Heading','ice-cream-shop'),
		'section' => 'ice_cream_shop_productcategory_section',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'ice_cream_shop_productcategoryheading_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_productcategoryheading_col', array(
		'label' => 'Heading Color',
		'section' => 'ice_cream_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_productcategorytitle_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_productcategorytitle_col', array(
		'label' => 'Title Color',
		'section' => 'ice_cream_shop_productcategory_section',
	)));


	$wp_customize->add_setting( 'ice_cream_shop_productcategorytitlebg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_productcategorytitlebg_col', array(
		'label' => 'Title BG Color',
		'section' => 'ice_cream_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_productcategoryicon_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_productcategoryicon_col', array(
		'label' => 'Icon Color',
		'section' => 'ice_cream_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_productcategoryiconbg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_productcategoryiconbg_col', array(
		'label' => 'Icon BG Color',
		'section' => 'ice_cream_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_productcategorybox_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_productcategorybox_col', array(
		'label' => 'Box Color',
		'section' => 'ice_cream_shop_productcategory_section',
	)));



	// Featureproduct Section
	$wp_customize->add_section('ice_cream_shop_featureproduct_section',array(
		'title'	=> __('Feature Product Section','ice-cream-shop'),
		'description'=> __('<b>Note :</b> This section will appear below the Category Section.','ice-cream-shop'),
		'panel' => 'ice_cream_shop_panel_id',
	));

 
    $wp_customize->add_setting('ice_cream_shop_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ice_cream_shop_section_title',array(
		'label'	=> __('Section Heading','ice-cream-shop'),
		'section' => 'ice_cream_shop_featureproduct_section',
		'type' => 'text'
	));


	$wp_customize->add_setting( 'ice_cream_shop_featureproduct_heading_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_featureproduct_heading_col', array(
		'label' => 'Heading Color',
		'section' => 'ice_cream_shop_featureproduct_section',
	)));


	$wp_customize->add_setting( 'ice_cream_shop_featureproduct_title_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_featureproduct_title_col', array(
		'label' => 'Title Color',
		'section' => 'ice_cream_shop_featureproduct_section',
	)));


	$wp_customize->add_setting( 'ice_cream_shop_featureproduct_price_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_featureproduct_price_col', array(
		'label' => 'Price Color',
		'section' => 'ice_cream_shop_featureproduct_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_featureproduct_addtocart_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_featureproduct_addtocart_col', array(
		'label' => 'Add To Cart Color',
		'section' => 'ice_cream_shop_featureproduct_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_featureproduct_addtocarticon_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_featureproduct_addtocarticon_col', array(
		'label' => 'Add To Cart Icon Color',
		'section' => 'ice_cream_shop_featureproduct_section',
	)));

	$wp_customize->add_setting( 'ice_cream_shop_featureproduct_boxbg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_shop_featureproduct_boxbg_col', array(
		'label' => 'Box BG Color',
		'section' => 'ice_cream_shop_featureproduct_section',
	)));

	


	//Footer
    $wp_customize->add_section( 'ice_cream_shop_footer', array(
    	'title'  => __( 'Footer', 'ice-cream-shop' ),
		'priority' => null,
		'panel' => 'ice_cream_shop_panel_id'
	) );

	$wp_customize->add_setting('ice_cream_shop_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'ice_cream_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('ice_cream_shop_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','ice-cream-shop'),
       'section' => 'ice_cream_shop_footer'
    ));

    $wp_customize->add_setting('ice_cream_shop_footer_copy',array(
		'default' => 'Ice Cream Shop WordPress Theme By Luzuk',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ice_cream_shop_footer_copy',array(
		'label'	=> __('Copyright Text','ice-cream-shop'),
		'section' => 'ice_cream_shop_footer',
		'setting' => 'ice_cream_shop_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting('ice_cream_shop_footer_copylink',array(
		'default' => 'https://www.luzuk.com/themes/ice-cream-shop-wordpress-theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ice_cream_shop_footer_copylink',array(
		'label'	=> __('Copyright Link','ice-cream-shop'),
		'section' => 'ice_cream_shop_footer',
		'setting' => 'ice_cream_shop_footer_copylink',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'ice_cream_footerbg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_footerbg_col', array(
		'label' => 'BG Color',
		'section' => 'ice_cream_shop_footer',
	)));

	$wp_customize->add_setting( 'ice_cream_footertext_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_footertext_col', array(
		'label' => 'Text Color',
		'section' => 'ice_cream_shop_footer',
	)));

	$wp_customize->add_setting( 'ice_cream_footertoptobottom_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_footertoptobottom_col', array(
		'label' => 'Back To Top Color',
		'section' => 'ice_cream_shop_footer',
	)));

	$wp_customize->add_setting( 'ice_cream_footertoptobottombg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_footertoptobottombg_col', array(
		'label' => 'Back To Top BG Color',
		'section' => 'ice_cream_shop_footer',
	)));


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'ice_cream_shop_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'ice_cream_shop_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'ice_cream_shop_customize_register' );

function ice_cream_shop_customize_partial_blogname() {
	bloginfo( 'name' );
}

function ice_cream_shop_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if (class_exists('WP_Customize_Control')) {

   	class ice_cream_shop_Fontawesome_Icon_Chooser extends WP_Customize_Control {

      	public $type = 'icon';

      	public function render_content() { ?>
	     	<label>
	            <span class="customize-control-title">
	               <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) { ?>
	                <span class="description customize-control-description">
	                   <?php echo wp_kses_post($this->description); ?>
	                </span>
	            <?php } ?>

	            <div class="ice-cream-shop-selected-icon">
	                <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	                <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="ice-cream-shop-icon-list clearfix">
	                <?php
	                $ice_cream_shop_font_awesome_icon_array = ice_cream_shop_font_awesome_icon_array();
	                foreach ($ice_cream_shop_font_awesome_icon_array as $ice_cream_shop_font_awesome_icon) {
	                   $icon_class = $this->value() == $ice_cream_shop_font_awesome_icon ? 'icon-active' : '';
	                   echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($ice_cream_shop_font_awesome_icon) . '"></i></li>';
	                }
	                ?>
	            </ul>
	            <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	        </label>
	        <?php
      	}
  	}
}
function ice_cream_shop_customizer_script() {
   wp_enqueue_style( 'font-awesome-1', get_template_directory_uri().'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'ice_cream_shop_customizer_script' );