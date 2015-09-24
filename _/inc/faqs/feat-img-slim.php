<figure class="feat-img-wide slim feat-img-col-<?php echo (!empty($color)) ? $color : 'red'; ?>" style="background-image: url(<?php add_slim_feat_img($img_post);?>)">
	<div class="striped-overlay"></div>
	<figcaption class="img-caption">
		<div class="container">
					<span class="caption-inner" style="margin-left: 0px;"><?php echo ($page_icon) ? '<i class="fa '.$page_icon.' fa-lg"></i>' : ''; ?><span><?php echo get_the_title($faq_page->post_parent); ?></span></span>
		</div>
	</figcaption>
</figure>