<?php 
global $toolkit_active;
$toolkit_title = get_field('hp_toolkit_section_title', 'option');
$toolkit_intro = get_field('hp_toolkit_section_intro', 'option');
$color = get_field('hp_toolkit_section_bg_col', 'option');
$links = get_field('hp_toolkit_links', 'option');

if ( empty($toolkit_title) ) {
$toolkit_title = "Toolkit";
}

$section_title = "TLW ".$toolkit_title;

//echo '<pre class="debug">';print_r($slides);echo '</pre>';
$quick_links[] = ['link_title' => "TLW ".$toolkit_title, 'link_anchor' => 'toolkit-links'];	
?>
<?php if ($toolkit_active) { ?>
<section id="toolkit-section" class="pg-section <?php echo(count($links) > 1) ? "links-2":"links-1"; ?>">
	<a name="toolkit-links" id="toolkit-links" class="section-target"></a>
	
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
		<div class="tk-pg-intro font-slab-serif"><?php echo $toolkit_intro; ?></div>
	</div>	
	
	<div class="links-wrapper">
	
		<?php foreach ($links as $link) { 
		$page = get_page($link['page']);
		$pg_col = get_field('page_colour', $link['page']);
		$pg_icon = get_field('page_icon', $link['page']);
		$post_thumbnail_id = get_post_thumbnail_id( $page );
		$feat_img = wp_get_attachment_image_src($post_thumbnail_id, 'full' );
		
		?>
		<a href="<?php echo get_permalink($link['page']); ?>toolkit/" class="toolkit-link link-col-<?php echo $pg_col; ?>">
				
				<div class="bg-img" style="background-image: url(<?php echo $feat_img[0] ; ?>)">
					<div class="img-overlay"></div>
				</div>
				
				<i class="fa <?php echo $pg_icon; ?> link-icon"></i>
				<span><?php echo get_the_title($link['page']); ?></span>
		</a>
		<?php } ?>
		
		
	</div>
</section>
<?php } ?>