<?php 
/*
Template Name: Company page template
*/
 ?>

<?php get_header(); ?>

	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	
	<?php 
	$freephone_num = get_field('freephone_num', 'option');
	$number_pos = get_field('tel_num_position');
	$page_icon = get_field('page_icon');
	$color = get_field('page_colour');
	$hide_title = get_field('hide_title'); 
	$latest_news_active = get_field('latest_news_active');
	
	if (empty($number_pos)) {
	$number_pos = "bottom";	
	}
	//echo '<pre>';print_r($brochure);echo '</pre>';
	if ($page_icon == 'null' || !$page_icon) {
	$page_icon = get_field('page_icon', $post->post_parent);
	}
	?>	
	
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">
			
			<?php if ( has_post_thumbnail() ) { ?>
			<?php include (STYLESHEETPATH . '/_/inc/service-page/extra-wide-feat-img.php'); ?>
			<?php } ?>

			<a name="main-content" id="main-content"></a>
			<main class="page-col-red animated fadeInUp">
				
					<article <?php post_class(); ?>>
					
						<div class="row">
							
							<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
						
							<div class="col-xs-7">
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
									
									<?php include (STYLESHEETPATH . '/_/inc/pages/footer-info.php'); ?>
									
									<?php include (STYLESHEETPATH . '/_/inc/global/latest-news-panel.php'); ?>
									
								</div>
							
							</div>
							
							<?php get_template_part( 'parts/sidebars/sidebar', 'company' ); ?>
							
						</div>
						
					</article>
					
			</main>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
	
	<?php endwhile; ?>
	<?php endif; ?>
	
<?php get_footer(); ?>
