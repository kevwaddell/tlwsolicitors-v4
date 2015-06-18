<?php 
/*
Template Name: Feedback page template
*/
 ?>

<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
	<?php
		$feedback_args = array(
			'posts_per_page'   => 10,
			'post_type' => 'tlw_testimonial_cpt',
			'orderby'          => 'rand',
		); 
		$feedback_quotes = get_posts($feedback_args); 
		$freephone_num = get_field('freephone_num', 'option');
		$number_pos = get_field('tel_num_position');
		$color = get_field('page_colour');
		$page_icon = get_field('page_icon');
		$hide_title = get_field('hide_title'); 
		
		if (empty($number_pos)) {
		$number_pos = "bottom";	
		}
		
		if (!$page_icon) {
		$page_icon = get_field('page_icon', $post->post_parent);
		}
		//echo '<pre>';print_r($feedback_quotes);echo '</pre>';
		?>
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">
			
			<a name="main-content" id="main-content"></a>	
			<main class="page-col-red">
				
					<article <?php post_class(); ?>>
					
						<div class="row">
											
							<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
							
							<div class="col-lg-7">
								
								<div class="entry wide-entry">
									<header class="pg-header">	
										<?php if ($hide_title == 1) { ?>
										<div class="service-tag"><?php the_title(); ?></div>
										<?php } ?>
			
										<?php if ($hide_title != 1) { ?>
										<h1><?php the_title(); ?></h1>
										<?php } ?>
									</header>
									
									<div class="main-txt">
									<?php the_content(); ?>
									</div>
									
									<div class="rule"></div>
									
								</div>
								
							<?php include (STYLESHEETPATH . '/_/inc/feedback/feedback-list.php'); ?>			
							
							</div>
							
							<?php get_template_part( 'parts/sidebars/sidebar', 'feedback' ); ?>
							
						</div>
						
					</article>
					
			</main>
			


		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
