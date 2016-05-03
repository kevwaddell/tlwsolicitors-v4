<?php 
$banner_video_mp4 = get_field('hp_banner_video_mp4', 'option');	
$banner_video_webm = get_field('hp_banner_video_webm', 'option');	
$banner_video_poster = get_field('hp_banner_video_poster', 'option');
$banner_tags = get_field('hp_banner_tags', 'option');
$hp_banner_quick_links = get_field('hp_banner_quick_links', 'option');
$banner_quick_links[] = ['link_title' => 'Service Information', 'link_anchor' => 'service-info-txt'];
?>
<?php //echo '<pre>';print_r($banner_quick_links);echo '</pre>'; ?>
<section id="top-banner" class="top-banner-video">
	<?php if (in_array("title", $banner_options)) { ?>
	<header class ="banner-title text-center bold bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		<div class="container">
			<?php the_title(); ?>
		</div>
	</header>
	<?php } ?>
	<?php if (!empty($banner_tags)) { ?>
	<div class="tag-scroller">
		<?php foreach ($banner_tags as $k => $tag) { ?>
		<div class="tag-scroller-txt<?php echo ($k == 0) ? ' active':'' ; ?>"><?php echo $tag['banner_tag']; ?></div>
		<?php } ?>
	</div>		
	<?php } ?>
	
	
	<?php if ($hp_banner_quick_links) { ?>
	<nav class ="banner-links text-center">
		<?php foreach ($hp_banner_quick_links as $bl) { ?>
		<a href="#<?php echo $bl['link_anchor']; ?>" class="block bold font-slab-serif caps"><?php echo $bl['link_title']; ?></a>
		<?php } ?>
	</nav>
	<button id="scroll-down-btn"><i class="fa fa-angle-down"></i><span class="sr-only">Go down to next section</span></button>
	<?php } ?>
	
	<video autoplay loop muted id="bgvid" poster="<?php echo $banner_video_poster;?>">
		<source src="<?php echo get_stylesheet_directory_uri(); ?>/_/videos/serious-injury-video.webm" type="video/webm" />
		<source src="<?php echo get_stylesheet_directory_uri(); ?>/_/videos/serious-injury-video.mp4" type="video/mp4" />
	</video>
	<div class="video-overlay"></div>

</section>