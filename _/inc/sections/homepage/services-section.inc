<?php 
global $services_active;
$section_title = get_field('hp_services_section_title', 'option');
$hp_services_bg_img = get_field('hp_services_bg_img', 'option');
$hp_primary_service_links = get_field('hp_primary_service_links', 'options');
$hp_second_service_links = get_field('hp_second_service_links', 'option');
if ( (count($hp_primary_service_links) > 2)  || ( count($hp_primary_service_links) < 2) ) {
$hp_second_service_links = array_merge($hp_primary_service_links, $hp_second_service_links);
}
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'our-specialist-services'];	
?>
<?php if ($services_active) { ?>
<section id="services-section" class="pg-section with-header with-bg-img" style="background-image: url(<?php echo $hp_services_bg_img ;?>);">
<a name="our-specialist-services" id="our-specialist-services" class="section-target"></a>
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
		<?php if (count($hp_primary_service_links) == 2) { ?>
		<nav class="primary-services-nav">
			<div class="row">
				<?php foreach ($hp_primary_service_links as $ppg) { 
				$icon = get_field( 'page_icon', $ppg['page']);	
				$color = get_field( 'page_colour', $ppg['page']);
				?>
				<div class="col-xs-6">
					<a href="<?php echo get_permalink($ppg['page']); ?>" class="services-nav-link col-<?php echo $color; ?>"><i class="fa <?php echo $icon; ?> fa-lg"></i> <?php echo get_the_title($ppg['page']); ?></a>
				</div>
				<?php } ?>
			</div>
		</nav>
		<?php } ?>
		<nav class="services-nav">
			<?php foreach ($hp_second_service_links as $k => $pg) { 
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