<?php 
$news_page_id = get_option('page_for_posts');
$news_page = get_page($news_page_id);
$contact_page = get_page_by_title("Contact us");
$np_page_icon = get_field('page_icon', $news_page_id);	
$twitter_url = get_field('twitter_page', 'options');	
$facebook_url = get_field('facebook_page', 'options');	
$google_url = get_field('google_page', 'options');	
$linkedin_url = get_field('linkedin_page', 'options');
?>
<div class="header-links">
	
	<span class="quick-links">
	<?php if (!is_home() && !is_singular('post') && !is_archive()) { ?>
	<a href="#search-pop-up" id="search-btn" class="btn btn-default"><span>Search</span><i class="fa fa-search fa-lg"></i></button>
	<a href="<?php echo get_permalink($news_page_id); ?>" class="btn btn-default" title="<?php echo $news_page->post_title; ?>"><span><?php echo $news_page->post_title; ?></span><i class="fa <?php echo $np_page_icon; ?> fa-lg"></i></a>
	<?php } ?>
	<a href="<?php echo get_permalink($contact_page->ID); ?>" class="btn btn-default" title="<?php echo $contact_page->post_title; ?>"><span><?php echo $contact_page->post_title; ?></span><i class="fa fa-envelope fa-lg"></i></a>
	</span>


	<span class="social-links">
	<?php if ($twitter_url) { ?>
	<a href="<?php echo $twitter_url; ?>" class="btn btn-default" target="_blank"><span class="sr-only">Twitter</span><i class="fa fa-twitter fa-lg"></i></a>
	<?php } ?>
	<?php if ($facebook_url) { ?>
	<a href="<?php echo $facebook_url; ?>" class="btn btn-default" target="_blank"><span class="sr-only">Facebook</span><i class="fa fa-facebook fa-lg"></i></a>
	<?php } ?>
	<?php if ($google_url) { ?>
	<a href="<?php echo $google_url; ?>" class="btn btn-default" target="_blank"><span class="sr-only">Google+</span><i class="fa fa-google-plus fa-lg"></i></a>
	<?php } ?>
	<?php if ($linkedin_url) { ?>
	<a href="<?php echo $linkedin_url; ?>" class="btn btn-default" target="_blank"><span class="sr-only">LinkedIn</span><i class="fa fa-linkedin fa-lg"></i></a>
	<?php } ?>
	</span>
	
</div>