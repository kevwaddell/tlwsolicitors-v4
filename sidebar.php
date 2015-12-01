<?php 
global $freephone_active;
global $freephone_num;
global $number_pos;
global $show_feat_img;
global $feat_img_options;
$add_form = get_field('add_form');
$all_forms_active = get_field('all_forms_active', 'option');
//echo '<pre>';print_r($cats);echo '</pre>';
?>
<div class="col-xs-4">
	<aside class="sidebar">
		
		
		<?php if ($show_feat_img &&  $feat_img_options == 'sidebar') { ?>
		
		<?php if (has_post_thumbnail()) { 
		$img_atts = array('class'	=> "img-responsive");
		$thumb_id = get_post_thumbnail_id($post->ID);
		$thumb_args = array(
		'p' => $thumb_id,
		'posts_per_page' => 1,
		'post_type' => 'attachment',
		'include'	=> $thumb_id
		);
		$thumb_image = get_posts($thumb_args);
		
		if ($thumb_image[0]->post_excerpt) {
		$thumb_caption = $thumb_image[0]->post_excerpt;	
		}
		if ($thumb_image[0]->post_content) {
		$thumb_caption = $thumb_image[0]->post_content;	
		}
		?>
		<figure class="feat-img">
		<?php the_post_thumbnail( 'feat-img', $img_atts ); ?>
		
		<?php if ($thumb_caption) { ?>
		<figcaption class="feat-img-caption"><?php echo $thumb_caption; ?></figcaption>
		<?php } ?>
		</figure>
		
		<?php }  ?>
		
		<?php }  ?>
	
		
		<?php 
		$gallery_active = get_field('gallery_active');
		
		
		if ($gallery_active) { 
		$gallery_imgs = get_field('gallery_imgs');
		//echo '<pre>';print_r($gallery_imgs);echo '</pre>';	
			
		?>
		<div class="sidebar-block border-top-red">
			<h3 class="icon-header">Image Gallery <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
			<ul class="list-unstyled img-links clearfix">
		<?php foreach( $gallery_imgs as $gallery_img ): 
				if ($gallery_img['alt']) {
				$alt = $gallery_img['alt'];
				}	
				?>
				<li>
					<a href="<?php echo $gallery_img['sizes']['medium']; ?>" rel="fancybox" class="zoomable">
						<img src="<?php echo $gallery_img['sizes']['gallery-img']; ?>" class="img-responsive" width="<?php echo $gallery_img['sizes']['gallery-img-width']; ?>" height="<?php echo $gallery_img['sizes']['gallery-img-height']; ?>"<?php echo ($alt) ? ' alt="'.$alt.'"': ''; ?>>
					</a>
				</li>
		<?php endforeach; ?>
			</ul>
		</div>
	
		<?php } ?>
	
		
		<div id="search-form">
			<?php get_search_form(); ?>
		</div>
		
		<div class="cats-drop-down">
		<?php include (STYLESHEETPATH . '/_/inc/posts/cats-dropdown.php'); ?>
		</div>
		
		<?php include (STYLESHEETPATH . '/_/inc/sidebar/sb-btns.php'); ?>
		
		<?php if ($add_form && $all_forms_active) { 
		$form = get_field('form');
		?>
		<div class="contact-form sb-form-right">
			<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
			<h3 class="icon-header">Make a claim enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
			<?php include (STYLESHEETPATH . '/_/inc/global/forms-script-cap-name.php'); ?>
			<?php gravity_form($form->id, false, true, false, null, true); ?>
						
		</div>	
		<?php } ?>
		
		<?php if ($freephone_active && $number_pos == 'sidebar') { ?>
		<p class="tel-num">Call us <span>free<br><a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
		<?php } ?>	
			
	</aside>
</div>