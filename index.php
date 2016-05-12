<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	
		<main class="page-col-red">
		
			<?php
			$freephone_num = get_field('freephone_num', 'option');
			$news_page_id = get_option('page_for_posts');
			$news_page = get_page($news_page_id);
			//echo '<pre>';print_r($news_page);echo '</pre>';
			$page_icon = get_field('page_icon', $news_page->ID);
			$paged = (get_query_var('paged') != 0) ? get_query_var('paged'):1;
			
			if ( has_post_thumbnail($news_page_id) ) {
			$img_post = $news_page_id;
			}
			
			//echo '<pre>';print_r($paged);echo '</pre>';
			?>
			
			<?php if ($img_post) { ?>
			<?php include (STYLESHEETPATH . '/_/inc/banners/blog/img-banner-index-pg.inc'); ?>		
			<?php } ?>
			
			<?php if (!empty($freephone_num)) { ?>
			<?php include (STYLESHEETPATH . '/_/inc/sections/global-telephone-number.inc'); ?>		
			<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>
			<?php } ?>
			
			<!-- PAGE TOP BAR SECTION -->
			<?php include (STYLESHEETPATH . '/_/inc/posts/index-top-bar.php'); ?>	
			
			<!-- POSTS LIST -->
			<?php include (STYLESHEETPATH . '/_/inc/posts/index-post-list.php'); ?>	
			
			<!-- SOCIAL FEED -->
			<?php include (STYLESHEETPATH . '/_/inc/posts/social-feed-slider.php'); ?>		

		</main><!-- CONTENT END -->

<?php get_footer(); ?>
