<?php 
$toolkit_page = get_field('toolkit_page');
$toolkit_content = apply_filters('the_content', $toolkit_page->post_content );
$toolkit_intro = get_field('toolkit_intro');
$section_title = "TLW Toolkit";	
//echo '<pre class="debug">';print_r($slides);echo '</pre>';
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'toolkit-links'];	
$page_icon = get_field('page_icon', $toolkit_page->ID);

$post_thumbnail_id = get_post_thumbnail_id( $toolkit_page );
$feat_img = wp_get_attachment_image_src($post_thumbnail_id, 'full' );
?>

<section id="toolkit-section" class="links-1 pg-section bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
	
	<a name="toolkit-links" id="toolkit-links" class="section-target"></a>
	
	<div class="bg-img" style="background-image: url(<?php echo $feat_img[0] ; ?>)">
		<div class="img-overlay"></div>
	</div>
	
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"> <?php echo get_the_title($toolkit_page->ID); ?></h2>
<!-- 		<div class="tk-pg-intro font-slab-serif"><?php echo $toolkit_intro; ?></div> -->
		<?php echo $toolkit_content; ?>
	</div>	
	
	<div class="links-wrapper links-1">
		<a href="<?php echo get_permalink($toolkit_page->ID); ?>" class="toolkit-link link-col-<?php echo $color; ?>">	
			<i class="fa <?php echo $page_icon; ?> link-icon"></i>
			<span>View Our <?php echo get_the_title($toolkit_page->post_parent); ?> Toolkit</span>
		</a>
	</div>
</section>