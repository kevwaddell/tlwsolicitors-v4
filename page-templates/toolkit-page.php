<?php 
/*
Template Name: Toolkit page
*/
 ?>

<?php get_header(); ?>	
	
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	<?php 
		$freephone_num = get_field('freephone_num', 'option');
		$form_active = get_field('form_activated');
		$color = get_field('page_colour');
		$page_icon = get_field('page_icon');
		$feedback_active = get_field('feedback_active'); 
		$how_it_works_active = get_field('hiw_active');
		$all_forms_active = get_field('all_forms_active', 'option');
		$slides_active = get_field('tk_slides_active');
		$active_sections = get_field('active_sections');
		
		if ($page_icon == 'null' || !$page_icon) {
		$parent = get_page($post->post_parent);
		$grand_parent = $parent->post_parent;
		$page_icon = get_field('page_icon', $post->post_parent);
			if ($page_icon == 'null' || !$page_icon) {
			$page_icon = get_field('page_icon', $grand_parent);	
			}
		}
		
		if ( has_post_thumbnail() ) {
		$img_post = get_the_ID();
		} else {
		$img_post = $post->post_parent;
		$parent = get_post($img_post);	
		
			if (!has_post_thumbnail($img_post) && $parent->post_parent != 0) {
			$img_post = $parent->post_parent;
			}
		}
	?>	
	<!-- MAIN CONTENT START -->

	
	<main>
		<!-- TOOLKIT BANNER SECTION -->
		<?php include (STYLESHEETPATH . '/_/inc/toolkit/toolkit-banner.inc'); ?>
		
		<!-- TOOLKIT SLIDES SECTION -->
		<?php if ($slides_active) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/toolkit/toolkit-slides.inc'); ?>		
		<?php } ?>
		
		<?php foreach ($active_sections as $section) { ?>
			<?php 
			switch($section){
				case "Downloads": include (STYLESHEETPATH . '/_/inc/sections/downloads-section.inc');
				break;
				case "Form": include (STYLESHEETPATH . '/_/inc/sections/form-section.inc');
				break;
				case "Services": include (STYLESHEETPATH . '/_/inc/sections/services-section.inc');
				break;
				case "Blog posts": include (STYLESHEETPATH . '/_/inc/sections/recent-blog.inc');
				break;
				case "Feedback": include (STYLESHEETPATH . '/_/inc/sections/feedback-section.inc');
				break;
			}	
			?>
		<?php } ?>
		
	</main>
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
