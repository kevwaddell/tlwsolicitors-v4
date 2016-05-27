<?php 
global $post;
$pg_icon = get_field('page_icon', $post->post_parent);
?>
<section id="slim-top-banner" class="top-banner-img-slim fixed-bg" style="background-image: url(<?php add_full_page_banner_img($img_post);?>)">
	<header class ="banner-title text-center bold">
		<?php if ($page_icon) { ?>
		<i class="fa <?php echo $pg_icon; ?> <?php echo (!empty($color)) ? 'bg-col-'.$color.'-dk' : 'bg-col-red-dk'; ?>"></i>			
		<?php } ?>
		<?php echo get_the_title($post->post_parent); ?>
	</header>
	
	<div class="img-overlay"></div>
	<div class="top-drk-grad<?php echo (!empty($color)) ? ' col-'.$color : ''; ?>"></div>
</section>