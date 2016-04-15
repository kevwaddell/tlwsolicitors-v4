<?php 
$section_title = get_field('service_section_title');
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'request-a-callback'];	
?>
<a name="our-specialist-services" id="our-specialist-services"></a>
<section id="services-section" class="pg-section with-header col-<?php echo (!empty($color)) ? $color : 'red'; ?> with-bg-img" style="background-image: url(<?php add_toolkit_banner_img($img_post);?>);">
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
		<nav class="services-nav">
			<a href="#">brain injury or head injury</a>
			<a href="#">Spinal injury</a></li>
			<a href="#">Orthopaedic injuries</a>
		</nav>
	</div>
	<div class="col-overlay"></div>
	<div class="overlay"></div>
</section>