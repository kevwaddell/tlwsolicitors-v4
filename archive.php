<?php get_header(); ?>

<?php
$freephone_num = get_field('freephone_num', 'option');
$news_page_id = get_option('page_for_posts');
$news_page = get_page($news_page_id);
$page_icon = get_field('page_icon', $news_page->ID);

if ( has_post_thumbnail($news_page_id) ) {
$img_post = $news_page_id;
}
?>

<!-- MAIN CONTENT START -->
<main class="page-col-red">
	
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

</main>
<!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
