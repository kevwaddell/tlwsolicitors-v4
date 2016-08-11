<?php 
/*
Template Name: Team Profiles Page
*/
 ?>
 
 <?php get_header(); ?>	
	
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	<?php 
		$freephone_num = get_field('freephone_num', 'option');
		$color = get_field('page_colour');
		$page_icon = get_field('page_icon');
		$active_sections = get_field('active_sections');
		$banner_active = false;	
		$quick_links = array();
		
		$team_args = array (
		'posts_per_page'   => -1,
		'orderby'          => 'menu_order',
		'order'            => 'ASC',
		'post_type'        => 'tlw_team_cpt',
		);
		
		$profiles = get_posts($team_args);
		
		if ( has_post_thumbnail() ) {
		$img_post = get_the_ID();
		}
		
		if ($active_sections && in_array("Page banner", $active_sections)) {
		$banner_active = true;	
		$banner_bg = get_field('banner_bg');
		$banner_quick_links = array();
		}
	?>	
	
	<!-- MAIN CONTENT START -->
	<main>
		
		<!-- BANNER SECTION -->
		<?php if ($banner_active && $banner_bg == 'slim-img') { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/img-banner-slim.inc'); ?>		
		<?php } ?>
		
		<?php if ($banner_active && $banner_bg == "video") { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/video-banner.inc'); ?>		
		<?php } ?>
		
		<?php if ($banner_active && $banner_bg == "img") { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/img-banner.inc'); ?>		
		<?php } ?>
		
		<!-- MAIN TEXT SECTION -->
		<?php include (STYLESHEETPATH . '/_/inc/sections/main-content-section.inc'); ?>
		
		<?php if (!empty($profiles)) { ?>
			<?php include (STYLESHEETPATH . '/_/inc/team-page/team-list-section.inc'); ?>		
		<?php } ?>
		
		<?php if ($active_sections) { ?>		
		<?php foreach ($active_sections as $section) { ?>
			<?php 
			switch($section){
				case "Downloads": include (STYLESHEETPATH . '/_/inc/sections/downloads-section.inc');
				break;
				case "Form": include (STYLESHEETPATH . '/_/inc/sections/form-section.inc');
				break;
				case "Services": include (STYLESHEETPATH . '/_/inc/sections/services-section.inc');
				break;
				case "Blog posts": include (STYLESHEETPATH . '/_/inc/sections/blog-section.inc');
				break;
				case "Feedback": include (STYLESHEETPATH . '/_/inc/sections/feedback-section.inc');
				break;
				case "Toolkit Links": include (STYLESHEETPATH . '/_/inc/sections/toolkit-section.inc');
				break;
			}	
			?>
		<?php } ?>
		<?php } ?>
				
	</main>	
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
