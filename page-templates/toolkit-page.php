<?php 
/*
Template Name: Toolkit page
*/
 ?>

<?php get_header(); ?>	
	
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	<?php 
		$links = get_field('banner_links', 'option');
		$freephone_num = get_field('freephone_num', 'option');
		$number_pos = get_field('tel_num_position');
		if (empty($number_pos)) {
		$number_pos = "bottom";	
		}
		$form_active = get_field('form_activated');
		$color = get_field('page_colour');
		$page_icon = get_field('page_icon');
		$download_active = get_field('download_active');
		$brochure = get_field('brochure');
		$bk_download_active = get_field('bk_download_active');
		$page_links = get_field('page_links');
		$on_page_script = get_field('on_page_script');
		$main_title = get_field('main_title');
		$feedback_active = get_field('feedback_active'); 
		$how_it_works_active = get_field('hiw_active');
		$all_forms_active = get_field('all_forms_active', 'option');
		
		if ($page_icon == 'null' || !$page_icon) {
		$parent = get_page($post->post_parent);
		$grand_parent = $parent->post_parent;
		$page_icon = get_field('page_icon', $post->post_parent);
			if ($page_icon == 'null' || !$page_icon) {
			$page_icon = get_field('page_icon', $grand_parent);	
			}
		}
	?>	
	<!-- MAIN CONTENT START -->

	
	<main>
		<section class="toolkit-banner fixed-bg" style="background-image: url('http://tlwsolicitors.dev/wp-content/uploads/2015/11/serious-injury.jpg')">
				
			<div class="tk-title-strip col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
				<div class="container text-center">
					<?php echo get_the_title($post->post_parent); ?>
				</div>
			</div>
			
			<div class="tk-banner-txt">
				<div class="container">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div>

			<div class="bg-lines col-<?php echo (!empty($color)) ? $color : 'red'; ?>"></div>
			<div class="top-drk-grad"></div>
			
		</section>
	</main>
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
