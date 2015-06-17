<figure class="feat-img-wide ex-wide feat-img-col-<?php echo (!empty($color)) ? $color : 'red'; ?> animated fadeInLeft">
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
	<?php add_extra_wide_feat_img($post) ; ?>
	<div class="col-overlay"></div><div class="striped-overlay"></div>
	<?php if ($post->post_parent != 0 ) { ?>
	<figcaption class="img-caption"><?php echo ($page_icon) ? '<i class="fa '.$page_icon.' fa-lg"></i>' : ''; ?><span><?php echo get_the_title($post->post_parent); ?></span></figcaption>
	<?php } ?>
</figure>