<?php 
$banner_video_mp4 = get_field('banner_video_mp4');	
$banner_video_webm = get_field('banner_video_webm');	
$banner_video_poster = get_field('banner_video_poster');
$banner_options = get_field('banner_options');
$banner_tags = get_field('banner_tags');
$banner_quick_links[] = ['link_title' => 'Service Information', 'link_anchor' => 'service-info-txt'];
if ($active_sections) {
	foreach ($active_sections as $as) {
		switch($as){
			case "Form": $banner_quick_links[] = ['link_title' => 'Request a Callback', 'link_anchor' => 'request-a-callback'];
			break;
			case "Downloads": $banner_quick_links[] = ['link_title' => 'Downloadable Rescourses', 'link_anchor' => 'downloads'];
			break;
			case "Toolkit Links": $banner_quick_links[] = ['link_title' => 'TLW Toolkit', 'link_anchor' => 'tlw-toolkit'];
			break;
		}
	}
}

?>
<?php //echo '<pre>';print_r($banner_quick_links);echo '</pre>'; ?>
<section id="top-banner" class="top-banner video-banner">
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
	
	
	<?php if (in_array("links", $banner_options)) { ?>
	<nav class ="banner-links text-center">
		<?php foreach ($banner_quick_links as $bl) { ?>
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