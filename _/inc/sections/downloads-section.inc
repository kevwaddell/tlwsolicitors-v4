<?php 
$section_title = get_field('downloads_section_title');	
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'downloads'];	
?>
<section id="downloads-section" class="pg-section with-icon-logo col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
<a name="downloads" id="downloads" class="section-target"></a>
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
		<div class="row download-items">
			<div class="col-xs-4 text-center download-item">
				<a href="#" target="_blank">
					<img src="" height="390" width="280" />
					<span>Serious Injury Toolkit</span>
				</a>
			</div>
			<div class="col-xs-4 text-center download-item">
				<a href="#" target="_blank">
					<img src="" height="390" width="280" />
					<span>Spinal & Brain injury guide to services</span>
				</a>
			</div>
			<div class="col-xs-4 text-center download-item">
				<a href="#" target="_blank">
					<img src="" height="390" width="280" />
					<span>Serious Injury brochure</span>
				</a>
			</div>
		</div>
	</div>
	<div class="overlay"></div>
</section>