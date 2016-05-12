<?php 
global $page_icon;
global $img_post;
global $color;
?>
<section id="slim-top-banner" class="top-banner-img-slim fixed-bg wht-border-bottom" style="background-image: url(<?php add_full_page_banner_img($img_post);?>)">
	<header class ="banner-title text-center bold">
		<?php if ($page_icon) { ?>
		<i class="fa <?php echo $page_icon; ?> <?php echo (!empty($color)) ? 'bg-col-'.$color.'-dk' : 'bg-col-red-dk'; ?>"></i>			
		<?php } ?>
		<?php if (is_home()) { ?>
		latest from <?php bloginfo('name'); ?>
		<?php } ?>
	</header>
	
	<div class="img-overlay"></div>
	<div class="top-drk-grad<?php echo (!empty($color)) ? ' col-'.$color : ''; ?>"></div>
</section>