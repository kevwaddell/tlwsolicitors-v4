<?php  
global $hide_title;
$section_title = "Service information";	
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'service-info-txt'];
?>
<article <?php post_class("content-section"); ?>>
	<a name="service-info-txt" id="service-info-txt" class="section-target"></a>
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
	
	<div class="container">
	<div class="row">
		
		<div class="col-xs-11">
		<div class="entry wide-entry">
			
			<div class="main-txt">
				<?php the_content(); ?>
			</div>
														
		</div>
		</div>
		
		<?php include (STYLESHEETPATH . '/_/inc/global/page-tools.php'); ?>
	
	</div>
	</div>
	
</article>