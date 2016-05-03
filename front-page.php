<?php get_header(); ?>	
	
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	<?php 
		$freephone_num = get_field('freephone_num', 'option');
		$hp_sections = get_field('hp_active_sections', 'option');
		$banner_active = get_field('hp_top_banner_active', 'option');	
		$related_pages = get_field('page_links');
		$quick_links = array();
		$downloads_active = false;
		$form_active = false;
		$services_active = false;
		$blog_posts_active = false;
		$feedback_active = false;
		$toolkit_active = false;
		
		if ($banner_active) {
		$hp_banner_type = get_field('hp_banner_type', 'option');
		}
		
		//echo '<pre class="debug">';print_r($related_pages);echo '</pre>';
		
		foreach ($hp_sections as $s) { 
			
			switch($s){
				case "Downloads": $downloads_active = true;
				break;
				case "Form": $form_active = true;
				break;
				case "Services": $services_active = true;
				break;
				case "Blog posts": $blog_posts_active = true;
				break;
				case "Feedback": $feedback_active = true;
				break;
				case "Toolkit Links": $toolkit_active = true;
				break;
			}	
			
		}
		
	?>	
	
	<!-- MAIN CONTENT START -->
	<main>
		
		<!-- BANNER SECTION -->
		<?php if ($banner_active && $hp_banner_type == "video") { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/homepage/video-banner.inc'); ?>		
		<?php } ?>
		
		<?php if ($banner_active && $hp_banner_type == "img") { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/homepage/img-banner.inc'); ?>		
		<?php } ?>
		
		
		<!-- MAIN TEXT SECTION -->
		<?php include (STYLESHEETPATH . '/_/inc/sections/homepage/main-content-section.inc'); ?>
		
		<?php if ($hp_sections) { ?>		
			<?php foreach ($hp_sections as $section) { ?>
				<?php 
				switch($section){
					case "Downloads": include (STYLESHEETPATH . '/_/inc/sections/homepage/downloads-section.inc');
					break;
					case "Form": include (STYLESHEETPATH . '/_/inc/sections/homepage/form-section.inc');
					break;
					case "Services": include (STYLESHEETPATH . '/_/inc/sections/homepage/services-section.inc');
					break;
					case "Blog posts": include (STYLESHEETPATH . '/_/inc/sections/homepage/blog-section.inc');
					break;
					case "Feedback": include (STYLESHEETPATH . '/_/inc/sections/homepage/feedback-section.inc');
					break;
					case "Toolkit Links": include (STYLESHEETPATH . '/_/inc/sections/homepage/toolkit-section.inc');
					break;
				}	
				?>
			<?php } ?>
		<?php } ?>
		
	</main>	
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
