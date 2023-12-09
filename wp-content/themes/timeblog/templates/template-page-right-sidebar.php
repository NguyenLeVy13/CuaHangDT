<?php
/**
Template Name:  Page Right Sidebar
**/

get_header();
?>
<section class="post-section av-py-default">
	<div class="av-container">
		<div class="av-columns-area wow fadeInUp">
			<div id="av-primary-content" class="av-column-8 av-pb-default av-pt-default wow fadeInUp">
				<?php 		
					the_post(); the_content(); 
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section> 
<?php get_footer(); ?>

