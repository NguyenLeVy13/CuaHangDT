<?php
/**
 * The header for our theme
 *
 * @subpackage Ice Cream Shop
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'ice-cream-shop' ); ?></a>

<div id="header">
	<div class="container pd-0">
		<div class=" row mr-0">
			<div class="col-lg-3 col-md-12 col-sm-12 align-self-center pd-0">
				<div class="logo text-md-left text-center">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php endif; ?>
					<?php if (get_theme_mod('ice_cream_shop_show_site_title',true)) {?>
						<?php $ice_cream_shop_blog_info = get_bloginfo( 'name' ); ?>
						<?php if ( ! empty( $ice_cream_shop_blog_info ) ) : ?>
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif; ?>
						<?php endif; ?>
					<?php }?>
					<?php if (get_theme_mod('ice_cream_shop_show_tagline',true)) {?>
						<?php $ice_cream_shop_description = get_bloginfo( 'description', 'display' );
						if ( $ice_cream_shop_description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html($ice_cream_shop_description); ?></p>
						<?php endif; ?>
					<?php }?>
				</div>
			</div>
			<div class="col-lg-7 col-md-12 col-sm-12 main-bx">
				<div class="row mrg-0">
					<div class="col-lg-9 col-md-12 col-sm-12 pd-0">
						<div class="menu-bar row mrg-0 ">
							<div class="toggle-menu responsive-menu text-right">
								<?php if(has_nav_menu('primary')){ ?>
									<button onclick="ice_cream_shop_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','ice-cream-shop'); ?></span></button>
								<?php }?>
							</div>
							<div id="sidelong-menu" class="nav sidenav">
								<nav id="primary-site-navigation" class="nav-menu " role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'ice-cream-shop' ); ?>">
									<?php if(has_nav_menu('primary')){
										wp_nav_menu( array( 
											'theme_location' => 'primary',
											'container_class' => 'main-menu-navigation clearfix' ,
											'menu_class' => 'clearfix',
											'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
											'fallback_cb' => 'wp_page_menu',
										) ); 
									} ?>
									<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="ice_cream_shop_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','ice-cream-shop'); ?></span></a>
								</nav>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12 hicn">
						<div class="row m-0">
							<div class="col-lg-4 col-md-4 col-sm-4 col-4 pd-0">	
								<div class="wish"> 
									<i class="far fa-heart"></i>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-4 pd-0">
								<div class="search">
									<div id="search-icon">
										<i class="fa fa-search" aria-hidden="true"></i>
									</div>
								</div>
								<div id="search-form-container">
									<?php get_search_form(); ?>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-4 pd-0 ">
								<div class="cart">
									<?php if(class_exists('woocommerce')){ ?>
										<div class="cart">
											<div class="count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></div>
											<a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="far fa-shopping-cart"></i></a>

											<!-- <li class="cart_box">
												<span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
											</li> -->
										</div>
									<?php }?>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-lg-2 col-md-12 col-sm-12 pd-0">
			<?php
				$phone_number = get_theme_mod('ice_cream_shop_contact_btn_text');
			?>	
			<?php if ($phone_number) { ?>
				<div class="phn-text">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<a href="tel:<?php echo esc_html(get_theme_mod('ice_cream_shop_contact_btn_text')); ?>" ><?php echo esc_html($phone_number); ?></a>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<div class="h-shape">
		<div class="header-drip">
			<div class="header-drip1">
				<div class="header-drip2"></div>
			</div>
		</div>
	</div>
</div>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content">
		    <div class="container"> 
		      	<h1><?php single_post_title(); ?></h1>
		      	<div class="innheader-border"></div>
		      	<div class="theme-breadcrumb mt-2">
					<?php ice_cream_shop_breadcrumb();?>
				</div>
		    </div>
		</div>
	</div>
<?php } ?>