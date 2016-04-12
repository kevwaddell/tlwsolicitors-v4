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
		<!-- TOOLKIT BANNER SECTION -->
		<?php include (STYLESHEETPATH . '/_/inc/toolkit/toolkit-banner.inc'); ?>
		
		<!-- TOOLKIT SLIDES SECTION -->
		<?php include (STYLESHEETPATH . '/_/inc/toolkit/toolkit-slides.inc'); ?>
		
	</main>
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
