<figure class="feat-img-wide slim feat-img-col-<?php echo (!empty($color)) ? $color : 'red'; ?>" style="background-image: url(<?php add_slim_feat_img($img_post);?>)">
	<div class="striped-overlay"></div>
	<figcaption class="img-caption">
		<div class="container">
			<div class="row">
				<div class="col-xs-11 col-xs-offset-1">
					<?php if ($post->post_parent != 0 ) { ?>
					<span class="caption-inner"><?php echo ($page_icon) ? '<i class="fa '.$page_icon.' fa-lg"></i>' : ''; ?><span><?php echo get_the_title($post->post_parent); ?></span></span>
					<?php } else { ?>
					<span class="caption-inner"><?php echo ($page_icon) ? '<i class="fa '.$page_icon.' fa-lg"></i>' : ''; ?><span><?php the_title(); ?></span></span>
					<?php } ?>
				</div>
			</div>
		</div>
	</figcaption>
</figure>