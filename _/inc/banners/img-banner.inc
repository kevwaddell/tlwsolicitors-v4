<?php  
$banner_options = get_field('banner_options');
$banner_tags = get_field('banner_tags');
$banner_service_links = get_field('banner_service_links');	
$banner_sub_service_links = get_field('banner_sub_service_links');
?>
<section id="top-banner" class="top-banner-img fixed-bg<?php echo (in_array("title", $banner_options)) ? '' : ' no-title'; ?>" style="background-image: url(<?php add_full_page_banner_img($img_post);?>)">
	<?php if (in_array("title", $banner_options)) { ?>
	<header class ="banner-title text-center bold bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		<div class="container">
			<?php the_title(); ?>
		</div>
	</header>
	<?php } ?>
	
	<div class="tag-scroller<?php echo (in_array("title", $banner_options)) ? " with-banner-title":""; ?>">
		<?php if (!empty($banner_tags)) { ?>
		<?php foreach ($banner_tags as $k => $tag) { ?>
		<div class="tag-scroller-txt<?php echo ($k == 0) ? ' active':'' ; ?>"><?php echo $tag['banner_tag']; ?></div>
		<?php } ?>
		<?php } ?>
	</div>		
	
	<?php if ( in_array("services", $banner_options) ) { ?>
	<div class="container">	
		<div id="services-banner-links" class="banner-links col-<?php echo (!empty($color)) ? $color : 'red'; ?>">	
			<div class="banner-links-header">Our Specialist Areas</div>	
			<div class="main-services">
				<?php foreach ($banner_service_links as $bl) { ?>
				<a href="<?php echo get_the_permalink($bl['link_page']); ?>"><?php echo get_the_title($bl['link_page']); ?></a>
				<?php } ?>
			</div>
			<?php if (!empty($banner_sub_service_links)) { ?>
			<div class="sub-services">
				<?php foreach ($banner_sub_service_links as $sbl_pgs) { ?>
				<a href="<?php echo get_the_permalink($sbl_pgs['link_page']); ?>"><?php echo get_the_title($sbl_pgs['link_page']); ?></a>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	
	<button id="scroll-down-btn" class="btn<?php echo (in_array("services", $banner_options) && !in_array("links", $banner_options)) ? " abs-bottom":"" ; ?>"><i class="fa fa-angle-down"></i><span class="sr-only">Go down to next section</span></button>
	
	<div class="img-overlay"></div>
	<div class="top-drk-grad"></div>
</section>