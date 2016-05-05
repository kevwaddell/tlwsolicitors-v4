<?php  
$banner_bg_img = get_field('banner_bg_img');
$banner_options = get_field('banner_options');
$banner_tags = get_field('banner_tags');
$banner_quick_links[] = ['link_title' => 'Service Information', 'link_anchor' => 'service-info-txt'];
$banner_service_links = get_field('banner_service_links');
if ($active_sections) {

	foreach ($active_sections as $as) {
		switch($as){
			case "Form": $banner_quick_links[] = ['link_title' => 'Request a Callback', 'link_anchor' => 'request-a-callback'];
			break;
			case "Downloads": $banner_quick_links[] = ['link_title' => 'Downloadable Rescourses', 'link_anchor' => 'downloads'];
			break;
			case "Toolkit Links": $banner_quick_links[] = ['link_title' => 'TLW Toolkit', 'link_anchor' => 'toolkit-links'];
			break;
		}
	}
	
	if (!in_array("Downloads", $active_sections)) {
	$banner_quick_links[] = ['link_title' => 'Recent Blog Articles', 'link_anchor' => 'recent-blog-articles'];	
	}
}		
?>
<section id="top-banner" class="top-banner-img fixed-bg<?php echo (in_array("title", $banner_options)) ? '' : ' no-title'; ?>" style="background-image: url(<?php echo $banner_bg_img;?>)">
	<?php if (in_array("title", $banner_options)) { ?>
	<header class ="banner-title text-center bold bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		<div class="container">
			<?php the_title(); ?>
		</div>
	</header>
	<?php } ?>
	
	<div class="tag-scroller">
		<?php if (!empty($banner_tags)) { ?>
		<?php foreach ($banner_tags as $k => $tag) { ?>
		<div class="tag-scroller-txt<?php echo ($k == 0) ? ' active':'' ; ?>"><?php echo $tag['banner_tag']; ?></div>
		<?php } ?>
		<?php } ?>
	</div>		
	
	<?php if (in_array("links", $banner_options) && !in_array("services", $banner_options)) { ?>
	<nav class ="banner-links text-center">
		<?php foreach ($banner_quick_links as $bl) { ?>
		<a href="#<?php echo $bl['link_anchor']; ?>" class="block bold font-slab-serif caps"><?php echo $bl['link_title']; ?></a>
		<?php } ?>
	</nav>
	<?php } ?>
	
	<?php if (in_array("services", $banner_options) && !in_array("links", $banner_options)) { ?>
	<div id="services-select" class="services-dropdown col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		<div class="container">				
			<select id="services-dd" class="selectpicker" data-width="100%">
				<option value="0" data-hidden="true">Our Specialist Areas</option>
				<?php foreach ($banner_service_links as $bl_option) { ?>
				<option value="<?php echo get_the_permalink($bl_option['link_page']); ?>"><?php echo get_the_title($bl_option['link_page']); ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<?php } ?>
	
	<button id="scroll-down-btn" class="btn<?php echo (in_array("services", $banner_options) && !in_array("links", $banner_options)) ? " abs-bottom":"" ; ?>"><i class="fa fa-angle-down"></i><span class="sr-only">Go down to next section</span></button>
	
	<div class="img-overlay"></div>
	<div class="top-drk-grad"></div>
</section>