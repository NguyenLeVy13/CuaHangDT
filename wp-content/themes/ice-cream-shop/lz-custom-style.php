<?php 

	$ice_cream_shop_custom_style = '';

	// Logo Size
	$ice_cream_shop_logo_top_padding = get_theme_mod('ice_cream_shop_logo_top_padding');
	$ice_cream_shop_logo_bottom_padding = get_theme_mod('ice_cream_shop_logo_bottom_padding');
	$ice_cream_shop_logo_left_padding = get_theme_mod('ice_cream_shop_logo_left_padding');
	$ice_cream_shop_logo_right_padding = get_theme_mod('ice_cream_shop_logo_right_padding');

	if( $ice_cream_shop_logo_top_padding != '' || $ice_cream_shop_logo_bottom_padding != '' || $ice_cream_shop_logo_left_padding != '' || $ice_cream_shop_logo_right_padding != ''){
		$ice_cream_shop_custom_style .=' .logo {';
			$ice_cream_shop_custom_style .=' padding-top: '.esc_attr($ice_cream_shop_logo_top_padding).'px; padding-bottom: '.esc_attr($ice_cream_shop_logo_bottom_padding).'px; padding-left: '.esc_attr($ice_cream_shop_logo_left_padding).'px; padding-right: '.esc_attr($ice_cream_shop_logo_right_padding).'px;';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_site_title_color = get_theme_mod('ice_cream_shop_site_title_color');
	if ( $ice_cream_shop_site_title_color != '') {
		$ice_cream_shop_custom_style .=' h1.site-title a, p.site-title a {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_site_title_color).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_site_tagline_color = get_theme_mod('ice_cream_shop_site_tagline_color');
	if ( $ice_cream_shop_site_tagline_color != '') {
		$ice_cream_shop_custom_style .=' p.site-description {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_site_tagline_color).';';
		$ice_cream_shop_custom_style .=' }';
	}



	// Header color

	$ice_cream_shop_header_menu_col = get_theme_mod('ice_cream_shop_header_menu_col');
	if ( $ice_cream_shop_header_menu_col != '') {
		$ice_cream_shop_custom_style .=' .nav-menu ul li a {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_header_menu_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_header_menu_active_col = get_theme_mod('ice_cream_shop_header_menu_active_col');
	if ( $ice_cream_shop_header_menu_active_col != '') {
		$ice_cream_shop_custom_style .=' .nav-menu ul li.current_page_item a {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_header_menu_active_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_header_submenu_col = get_theme_mod('ice_cream_shop_header_submenu_col');
	if ( $ice_cream_shop_header_submenu_col != '') {
		$ice_cream_shop_custom_style .=' .nav-menu ul ul a {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_header_submenu_col).';';
		$ice_cream_shop_custom_style .=' }';
	}


	$ice_cream_shop_header_submenubg_col = get_theme_mod('ice_cream_shop_header_submenubg_col');
	if ( $ice_cream_shop_header_submenubg_col != '') {
		$ice_cream_shop_custom_style .=' .nav-menu ul ul a {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_shop_header_submenubg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}


	$ice_cream_shop_header_submenubghrv_col = get_theme_mod('ice_cream_shop_header_submenubghrv_col');
	if ( $ice_cream_shop_header_submenubghrv_col != '') {
		$ice_cream_shop_custom_style .=' .nav-menu ul ul a:hover {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_shop_header_submenubghrv_col).';';
		$ice_cream_shop_custom_style .=' }';
	}


	$ice_cream_shop_header_icons_col = get_theme_mod('ice_cream_shop_header_icons_col');
	if ( $ice_cream_shop_header_icons_col != '') {
		$ice_cream_shop_custom_style .=' .hicn i {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_header_icons_col).'!important;';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_header_cartno_col = get_theme_mod('ice_cream_shop_header_cartno_col');
	if ( $ice_cream_shop_header_cartno_col != '') {
		$ice_cream_shop_custom_style .=' #header .count {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_header_cartno_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_header_cartnobg_col = get_theme_mod('ice_cream_shop_header_cartnobg_col');
	if ( $ice_cream_shop_header_cartnobg_col != '') {
		$ice_cream_shop_custom_style .=' #header .count {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_shop_header_cartnobg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_header_phoneno_col = get_theme_mod('ice_cream_shop_header_phoneno_col');
	if ( $ice_cream_shop_header_phoneno_col != '') {
		$ice_cream_shop_custom_style .=' #header .phn-text a {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_header_phoneno_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_header_phonenoicon_col = get_theme_mod('ice_cream_shop_header_phonenoicon_col');
	if ( $ice_cream_shop_header_phonenoicon_col != '') {
		$ice_cream_shop_custom_style .='#header .phn-text i {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_header_phonenoicon_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_header_phonenobg_col = get_theme_mod('ice_cream_shop_header_phonenobg_col');
	if ( $ice_cream_shop_header_phonenobg_col != '') {
		$ice_cream_shop_custom_style .=' #header .phn-text {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_shop_header_phonenobg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	//slider

	$ice_cream_shop_slider_title_col = get_theme_mod('ice_cream_shop_slider_title_col');
	if ( $ice_cream_shop_slider_title_col != '') {
		$ice_cream_shop_custom_style .=' #slider .slider_content h2 {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_slider_title_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_slider_description_col = get_theme_mod('ice_cream_shop_slider_description_col');
	if ( $ice_cream_shop_slider_description_col != '') {
		$ice_cream_shop_custom_style .=' #slider .slider_content p {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_slider_description_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_slider_buttontext_col = get_theme_mod('ice_cream_shop_slider_buttontext_col');
	if ( $ice_cream_shop_slider_buttontext_col != '') {
		$ice_cream_shop_custom_style .=' #slider .btn a {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_slider_buttontext_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_slider_buttonbg_col = get_theme_mod('ice_cream_shop_slider_buttonbg_col');
	if ( $ice_cream_shop_slider_buttonbg_col != '') {
		$ice_cream_shop_custom_style .=' #slider .btn a {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_shop_slider_buttonbg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_slider_buttonbrd_col = get_theme_mod('ice_cream_shop_slider_buttonbrd_col');
	if ( $ice_cream_shop_slider_buttonbrd_col != '') {
		$ice_cream_shop_custom_style .=' #slider .btn a {';
			$ice_cream_shop_custom_style .=' border-color:'.esc_attr($ice_cream_shop_slider_buttonbrd_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	
	$ice_cream_shop_slider_boxbg_col = get_theme_mod('ice_cream_shop_slider_boxbg_col');
	if ( $ice_cream_shop_slider_boxbg_col != '') {
		$ice_cream_shop_custom_style .=' #slider .slider_content {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_shop_slider_boxbg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_slider_boxbrd_col = get_theme_mod('ice_cream_shop_slider_boxbrd_col');
	if ( $ice_cream_shop_slider_boxbrd_col != '') {
		$ice_cream_shop_custom_style .=' #slider .slider_content {';
			$ice_cream_shop_custom_style .=' border-color:'.esc_attr($ice_cream_shop_slider_boxbrd_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_slider_prevnext_col = get_theme_mod('ice_cream_shop_slider_prevnext_col');
	if ( $ice_cream_shop_slider_prevnext_col != '') {
		$ice_cream_shop_custom_style .=' .carousel-control-prev, .carousel-control-next {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_slider_prevnext_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_slider_prevnextbg_col = get_theme_mod('ice_cream_shop_slider_prevnextbg_col');
	if ( $ice_cream_shop_slider_prevnextbg_col != '') {
		$ice_cream_shop_custom_style .=' #slider .carousel-control-prev:after, #slider .carousel-control-next:after {';
			$ice_cream_shop_custom_style .=' background-color:'.esc_attr($ice_cream_shop_slider_prevnextbg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}


	// product category

	$ice_cream_shop_productcategoryheading_col = get_theme_mod('ice_cream_shop_productcategoryheading_col');
	if ( $ice_cream_shop_productcategoryheading_col != '') {
		$ice_cream_shop_custom_style .=' #productcategory-section .productcategory-head h3 {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_productcategoryheading_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_productcategorytitle_col = get_theme_mod('ice_cream_shop_productcategorytitle_col');
	if ( $ice_cream_shop_productcategorytitle_col != '') {
		$ice_cream_shop_custom_style .=' #productcategory-section .pro-cat-content h5 a {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_productcategorytitle_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_productcategorytitlebg_col = get_theme_mod('ice_cream_shop_productcategorytitlebg_col');
	if ( $ice_cream_shop_productcategorytitlebg_col != '') {
		$ice_cream_shop_custom_style .=' #productcategory-section .pro-cat-content {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_shop_productcategorytitlebg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_productcategoryicon_col = get_theme_mod('ice_cream_shop_productcategoryicon_col');
	if ( $ice_cream_shop_productcategoryicon_col != '') {
		$ice_cream_shop_custom_style .=' #productcategory-section .pro-cat-content i {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_productcategoryicon_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_productcategoryiconbg_col = get_theme_mod('ice_cream_shop_productcategoryiconbg_col');
	if ( $ice_cream_shop_productcategoryiconbg_col != '') {
		$ice_cream_shop_custom_style .=' #productcategory-section .pro-cat-content i {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_shop_productcategoryiconbg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_productcategorybox_col = get_theme_mod('ice_cream_shop_productcategorybox_col');
	if ( $ice_cream_shop_productcategorybox_col != '') {
		$ice_cream_shop_custom_style .=' #productcategory-section .p-sbox {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_shop_productcategorybox_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	//featured product

	$ice_cream_shop_featureproduct_heading_col = get_theme_mod('ice_cream_shop_featureproduct_heading_col');
	if ( $ice_cream_shop_featureproduct_heading_col != '') {
		$ice_cream_shop_custom_style .=' #featureproduct-section .featureproduct-head h3 {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_featureproduct_heading_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_featureproduct_title_col = get_theme_mod('ice_cream_shop_featureproduct_title_col');
	if ( $ice_cream_shop_featureproduct_title_col != '') {
		$ice_cream_shop_custom_style .=' #featureproduct-section .pcontent h3 {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_featureproduct_title_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_featureproduct_price_col = get_theme_mod('ice_cream_shop_featureproduct_price_col');
	if ( $ice_cream_shop_featureproduct_price_col != '') {
		$ice_cream_shop_custom_style .=' #featureproduct-section .price ins {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_featureproduct_price_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_featureproduct_addtocart_col = get_theme_mod('ice_cream_shop_featureproduct_addtocart_col');
	if ( $ice_cream_shop_featureproduct_addtocart_col != '') {
		$ice_cream_shop_custom_style .=' #featureproduct-section .cart-contents {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_featureproduct_addtocart_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_featureproduct_addtocarticon_col = get_theme_mod('ice_cream_shop_featureproduct_addtocarticon_col');
	if ( $ice_cream_shop_featureproduct_addtocarticon_col != '') {
		$ice_cream_shop_custom_style .=' #featureproduct-section .cart-contents i {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_shop_featureproduct_addtocarticon_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_shop_featureproduct_boxbg_col = get_theme_mod('ice_cream_shop_featureproduct_boxbg_col');
	if ( $ice_cream_shop_featureproduct_boxbg_col != '') {
		$ice_cream_shop_custom_style .=' #featureproduct-section .cart-contents i,#featureproduct-section .Pr_bx {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_shop_featureproduct_boxbg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	//footer

	$ice_cream_footerbg_col = get_theme_mod('ice_cream_footerbg_col');
	if ( $ice_cream_footerbg_col != '') {
		$ice_cream_shop_custom_style .=' #colophon {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_footerbg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_footertext_col = get_theme_mod('ice_cream_footertext_col');
	if ( $ice_cream_footertext_col != '') {
		$ice_cream_shop_custom_style .=' .site-info p, .site-info a,
		.site-footer a, .site-footer p, #colophon caption, .site-footer .widget_rss .rss-date, .site-footer .widget_rss li cite,#colophon,
		.site-footer h1, .site-footer h2, .site-footer h3, .site-footer h4, .site-footer h5, .site-footer h6,
		.clear:after, .entry-content:after, .entry-footer:after, .comment-content:after, .site-header:after, .site-content:after, .site-footer:after, .nav-links:after, .pagination:after, .comment-author:after, .widget-area:after, .widget:after, .comment-meta:after {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_footertext_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_footertoptobottom_col = get_theme_mod('ice_cream_footertoptobottom_col');
	if ( $ice_cream_footertoptobottom_col != '') {
		$ice_cream_shop_custom_style .=' .back-to-top-text {';
			$ice_cream_shop_custom_style .=' color:'.esc_attr($ice_cream_footertoptobottom_col).';';
		$ice_cream_shop_custom_style .=' }';
	}

	$ice_cream_footertoptobottombg_col = get_theme_mod('ice_cream_footertoptobottombg_col');
	if ( $ice_cream_footertoptobottombg_col != '') {
		$ice_cream_shop_custom_style .=' .back-to-top {';
			$ice_cream_shop_custom_style .=' background:'.esc_attr($ice_cream_footertoptobottombg_col).';';
		$ice_cream_shop_custom_style .=' }';
	}