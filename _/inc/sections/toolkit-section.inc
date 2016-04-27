<?php 
$toolkit_page = get_field('toolkit_page');
$toolkit_intro = get_field('toolkit_intro');
$section_title = "TLW Toolkit";	
//echo '<pre class="debug">';print_r($slides);echo '</pre>';
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'toolkit-links'];	
?>

<section id="toolkit-section" class="pg-section with-icon-logo bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
	<a name="toolkit-links" id="toolkit-links" class="section-target"></a>
	
	<div class="container">
		<span class="tk-icon fa <?php echo $page_icon; ?> fa-4x"></span>
		<div class="tk-parent-pg-title font-slab-serif caps"><?php echo get_the_title($toolkit_page->post_parent); ?></div>		
		<div class="tk-pg-title font-slab-serif caps"><?php echo get_the_title($toolkit_page->ID); ?></div>	
		<div class="tk-pg-intro font-slab-serif"><?php echo $toolkit_intro; ?></div>
		<a href="<?php echo get_permalink($toolkit_page->ID); ?>" class="btn btn-default btn-block font-slab-serif caps">View Toolkit</a>
	</div>
	
	<div class="overlay"></div>
</section>