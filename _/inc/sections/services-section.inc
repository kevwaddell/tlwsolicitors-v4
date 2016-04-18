<?php 
$section_title = get_field('service_section_title');
$section_pgs = get_field('service_section_pgs');
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'our-specialist-services'];	
?>
<section id="services-section" class="pg-section with-header col-<?php echo (!empty($color)) ? $color : 'red'; ?> with-bg-img" style="background-image: url(<?php add_toolkit_banner_img($img_post);?>);">
<a name="our-specialist-services" id="our-specialist-services" class="section-target"></a>
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
		<nav class="services-nav">
			<?php foreach ($section_pgs as $pg) { ?>
			<a href="<?php echo get_permalink($pg['service_pg']); ?>"><?php echo get_the_title($pg['service_pg']); ?></a>
			<?php } ?>
		</nav>
	</div>
	<div class="col-overlay"></div>
	<div class="overlay"></div>
</section>