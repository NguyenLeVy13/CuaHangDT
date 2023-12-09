<?php
/**
 * Custom header implementation
 */

function ice_cream_shop_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ice_cream_shop_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 600,
		'height'             => 650,
		'flex-width'         => true,
		'flex-height'        => true,
	) ) );
}

add_action( 'after_setup_theme', 'ice_cream_shop_custom_header_setup' );