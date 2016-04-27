<?php 
$section_title = get_field('downloads_section_title');	
$download_section_files = get_field('download_section_files');
$files_count = count($download_section_files);
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'downloads'];	
?>
<section id="downloads-section" class="pg-section with-icon-logo bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
<a name="downloads" id="downloads" class="section-target"></a>
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
			
			<?php if ($files_count > 0) { ?>
			<div class="row download-items">
			<?php 
			$offset_num = 4;
			if ($files_count == 2) {
			$offset_num = 2;	
			}	
			?>
			
			<?php foreach ($download_section_files as $k => $file) { 
			$img = wp_get_attachment_image_src($file['file_img'], 'medium' );	
			?>
			<div class="col-xs-4 text-center download-item<?php echo ($files_count < 3 && $k == 0)? ' col-xs-offset-'.$offset_num : ''; ?>">
				<a href="<?php echo $file['file_download']; ?>" target="_blank">
					<img src="<?php echo $img[0]; ?>" height="390" />
					<span><?php echo $file['file_title']; ?></span>
				</a>
			</div>
			<?php } ?>

			</div>
			
			<?php } else { ?>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
					<div class="well well-lg text-center">
						<h3>Coming soon</h3>
						<p>Downloads are not available at the moment.</p>
					</div>
				</div>
			</div>
			<?php } ?>
		
	</div>
	<div class="overlay"></div>
</section>