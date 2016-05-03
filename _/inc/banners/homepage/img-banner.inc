<?php  
$banner_bg_img = get_field('hp_banner_bg_img', 'option');
$banner_tags = get_field('hp_banner_tags', 'option');
$hp_banner_quick_links = get_field('hp_banner_quick_links', 'option');	
?>
<section id="top-banner" class="top-banner-img fixed-bg no-title" style="background-image: url(<?php echo $banner_bg_img;?>)">
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
	
	<div class="img-overlay"></div>
	<div class="top-drk-grad"></div>
</section>