<?php 
global $services_active;
$section_title = get_field('hp_services_section_title', 'option');
$hp_services_bg_img = get_field('hp_services_bg_img', 'option');
$hp_other_service_links = get_field('hp_other_service_links', 'option');
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'our-specialist-services'];	
?>
<?php if ($services_active) { ?>
<section id="services-section" class="pg-section with-header with-bg-img" style="background-image: url(<?php echo $hp_services_bg_img ;?>);">
<a name="our-specialist-services" id="our-specialist-services" class="section-target"></a>
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
		<nav class="services-nav">
			<?php foreach ($hp_other_service_links as $k => $pg) { 
			$icon = get_field( 'page_icon', $pg['page']);
			$color = get_field( 'page_colour', $pg['page']);
			?>
			<a href="<?php echo get_permalink($pg['page']); ?>" class="services-nav-link col-<?php echo $color; ?>"><i class="fa <?php echo $icon; ?> fa-lg"></i> <?php echo get_the_title($pg['page']); ?></a>
			<?php } ?>
		</nav>
	</div>
	<div class="overlay"></div>
</section>
<?php } ?>