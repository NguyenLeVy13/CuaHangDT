<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'ice_cream_shop_above_slider' ); ?>

	<?php if( get_theme_mod('ice_cream_shop_slider_hide_show') != ''){ ?>
		<div id="slider">
			<div class="sliderbx   ">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<?php $ice_cream_shop_slider_pages = array();
					for ( $count = 1; $count <= 4; $count++ ) {
						$mod = intval( get_theme_mod( 'ice_cream_shop_slider'. $count ));
						if ( 'page-none-selected' != $mod ) {
						$ice_cream_shop_slider_pages[] = $mod;
						}
					}
					if( !empty($ice_cream_shop_slider_pages) ) :
						$args = array(
							'post_type' => 'page',
							'post__in' => $ice_cream_shop_slider_pages,
							'orderby' => 'post__in'
						);
						$query = new WP_Query( $args );
					if ( $query->have_posts() ) :
						$i = 1;
					?>     
						<div class="carousel-inner" role="listbox">
							<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
							<div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>	
								<!-- <div class="row"> -->
									<div class="sliderimg ">
										<img class="slide-mainimg" src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
									</div>
									<!-- <div class="col-md-5"> -->
										<div class="slider_content">
											<h2><?php the_title(); ?></h2>
											<p><?php $excerpt = get_the_excerpt(); echo esc_html( ice_cream_shop_string_limit_words( $excerpt, esc_attr(get_theme_mod('ice_cream_shop_slider_excerpt_length','20')))); ?></p>
											<div class="btn">
												<a href="<?php echo esc_html(get_theme_mod('ice_cream_shop_slider_offerbtnlink')); ?>" class="read-btn"><span><?php esc_html_e('SHOP NOW','ice-cream-shop'); ?></span></a>
											</div>	
										</div>
									<!-- </div> -->
								<!-- </div>	 -->
							</div>
							<?php $i++; endwhile; 
							wp_reset_postdata();?>
						</div>
					<?php else : ?>
						<div class="no-postfound"></div>
					<?php endif;
					endif;?>
					<div class="s-nav">
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<div class="carousel-control-prev-icon icnbx" aria-hidden="true">
							<i class="fas fa-long-arrow-alt-left"></i>
						</div>
						<span class="stext"><?php esc_html_e( 'Prev','ice-cream-shop' );?></span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="stext"><?php esc_html_e( 'Next','ice-cream-shop' );?></span>
						<div class="carousel-control-next-icon icnbx" aria-hidden="true">
							<i class="fas fa-long-arrow-alt-right"></i>
						</div>
						
					</a>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php }?>
	
	<?php do_action('ice_cream_shop_below_slider'); ?>


	<section id="productcategory-section">
		<div class="container"> 
			<div class="p-sbox">
				<div class="productcategory-head text-center ">
					
					<?php if(get_theme_mod('ice_cream_shop_productcategorysection_title') != ''){?>
						<h3><?php echo esc_html(get_theme_mod('ice_cream_shop_productcategorysection_title')); ?>
							<!-- <div class="head-brd"></div> -->
						</h3>
					<?php }?>

				</div>
				<?php if(class_exists('woocommerce')){ ?>
					<div class="category">
						<div class="pcbox">
							<div class="row mr-0">  
							<?php
							$args = array(
								'number'     => 0,
								'orderby'    => 'title',
								'order'      => 'ASC',
								'hide_empty' => false
							);
							$product_categories = get_terms( 'product_cat', $args );

							$count = count($product_categories);
							if ( $count > 0 ){
								foreach ( $product_categories as $product_category ) {

								if(function_exists('get_term_meta')){
									if( isset( $product_category->term_id ) ){
										//show parent categories
											$thumbnail_id = get_term_meta($product_category->term_id, 'thumbnail_id', true);
											}
										// get the image URL for parent category
											$image = wp_get_attachment_url($thumbnail_id);
										}else{
											$image = esc_html(get_template_directory_uri()).'/images/default.png';
										}
									if( isset( $product_category->name ) ){
									echo '<div class="col-lg-3 col-md-6 col-sm-12 item cat-product hvr-float-shadow"> ';

									echo' <div class="pro-cat-img">   
											<a href="' . get_term_link( $product_category ) . '" data-hover="' . $product_category->name . '" ><img src="'.$image.'" alt="" width="270" height="377" />
												<div class="p-olay"></div></a>
											</div>  ';

											echo ' <div class="pro-cat-content"> ';
											// echo '<div class="pro-cat-oly"></div>';
											echo '<h5><a href="' . get_term_link( $product_category ) . '" data-hover="' . $product_category->name . '" >
													<span> ' . $product_category->name . '</span>
													</a>
												</h5>';
											echo '<a href="' . get_term_link( $product_category ) . '" data-hover="' . $product_category->name . '" >
												<i class="fa fa-eye" aria-hidden="true"></i>
											</a>';
											echo'</div>
										</div>';		
								}
								}
							}?>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php }?>
			</div>
		</div>
	</section>


	<?php do_action('ice_cream_shop_below_productcategory_section'); ?>

	<section id="featureproduct-section">
		<div class="container"> 
			<div class="featureproduct-head ">
				<?php if(get_theme_mod('ice_cream_shop_section_title') != ''){?>
					<h3><?php echo esc_html(get_theme_mod('ice_cream_shop_section_title')); ?></h3>
					<!-- <div class="heading-brd"></div> -->
				<?php }?>
			</div>
			<div class="featuresus-post-wrap">
				<div class="featuresus-post-boxes row">
					<div class="owl-carousel owl-theme">
						<?php
							if(function_exists('woocommerce_template_loop_add_to_cart') && function_exists('WC')){
				    			$args = array( 'post_type' => 'product', /*'stock' => 1,*/ 'posts_per_page' => 9, 'orderby' =>'date','order' => 'DESC' );
				    			$meta_query   = WC()->query->get_meta_query();
				    			$tax_query   = WC()->query->get_tax_query();
				    			$tax_query[] = array(
				    				'taxonomy' => 'product_visibility',
				    				'field'    => 'name',
				    				'terms'    => 'featured',
				    				'operator' => 'IN',
				    			);
				    			$args = array(
				    				'post_type'   =>  'product',
				    				'stock'       =>  1,
				    				'posts_per_page' => -1, 
				    				'orderby'     =>  'date',
				    				'order'       =>  'DESC',
				    				'meta_query'  =>  $meta_query,
				    				'tax_query'   => $tax_query,
				    			);
				    			$loop = new WP_Query( $args );
				    			if($loop->post_count > 0){
				    				while ( $loop->have_posts() ) : $loop->the_post(); global $product;
						?>
						<!-- <div class="</?php //echo $colCls;?> featuresbx wow zoomIn" data-wow-duration="1s"> -->
						<div class="item featuresbx wow zoomIn" data-wow-duration="1s">
							<div class="featuresus-single" >
								<div class="features-box"> 
									<div class="hi-icon">
										<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php if (has_post_thumbnail( $loop->post->ID )) 
			    								echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
			    								else
			    									echo '<img src="'.get_template_directory_uri().'/images/default.png" alt="featured products" />'; 
			    							?>
			    							<!-- <div class="skewd"></div>	 -->
			    							<?php if( get_theme_mod('product_button_display','show' ) == 'show') :
										?>	
										<div class="add-to-cart">
											<!-- <li><a href="<//?php echo esc_url(get_permalink()); ?>" class="see-more"><i class="fa fa-eye" ></i></a><li>

											<li><a href="<//?php echo esc_url(get_permalink()); ?>" class="wish"><i class="fa fa-heart" ></i></a><li> -->

											<!-- <li><a href="</?php echo esc_url(get_permalink()); ?>" class="more-button"><span></span><i class="fa fa-shopping-bag"></i></?php echo esc_html_e('Add to Cart','ice-cream-shop'); ?></a></li> -->
											<div class="clearfix"></div>
										</div>
									<?php endif ?>
										</a>
									</div>
								</div> 
								<div class="pcontent">
									
									<a class="add-to-cart" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">	
										<h3><?php the_title(); ?></h3>
									</a>
									<div class="row m-0 Pr_bx">
										<div class="col-lg-4 col-md-12 col-sm-12">
											<span class="price"><?php echo $product->get_price_html(); ?></span>
										</div>
										<div class="col-lg-8 col-md-12 col-sm-12 pd-0">
											<a class="cart-contents" href="<?php the_permalink(); ?>"><span>Add to Cart</span><i class="fas fa-shopping-cart"></i></a>
										</div>	
									</div>
								</div>			 
							</div>
						</div>
						<?php					
						endwhile; 
							}else{
						?>
						
						<?php }
							//wp_reset_query(); 
						}
							?>
						</div>	
				</div> 
			</div>
		</div>
	</section>
	

	<!-- <div class="container">
	  	<//?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content py-5">
	        	<//?php the_content(); ?>
	        </div>
	    <//?php endwhile; // end of the loop. ?>
	</div> -->
</main>

<?php get_footer(); ?>