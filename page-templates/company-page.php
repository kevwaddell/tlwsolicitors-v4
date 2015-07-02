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
	
	if ($post->post_parent == 0) {
	$post_ID = $post->ID;
	} else {
	$post_ID = $post->post_parent;	
	}		
		
	$links_args = array(
	'sort_column' => 'menu_order',
	'parent'	=> $post_ID
	); 

	$links = get_pages($links_args);	
	
	if ( has_post_thumbnail() ) {
	$img_post = get_the_ID();
	} else {
	$img_post = $post->post_parent;
	}
	
	//echo '<pre>';print_r($brochure);echo '</pre>';
	if ($page_icon == 'null' || !$page_icon) {
	$page_icon = get_field('page_icon', $post->post_parent);
	}
	?>	
	
	<?php if ( has_post_thumbnail($img_post) ) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/pages/feat-img-slim.php'); ?>
	<?php } ?>
	
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content no-pad-top">

			<a name="main-content" id="main-content"></a>
			<main class="page-col-red">
				
					<article <?php post_class(); ?>>
					
						<div class="row">
							
							<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
						
							<div class="col-xs-7">
								<div class="entry wide-entry">
								
									<header class="pg-header">
										
										<?php if ($hide_title == 1 && $post->post_parent != 0) { ?>
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
	
	<?php include (STYLESHEETPATH . '/_/inc/pages/links-menu.php'); ?>
	
	<?php endwhile; ?>
	<?php endif; ?>
	
<?php get_footer(); ?>
