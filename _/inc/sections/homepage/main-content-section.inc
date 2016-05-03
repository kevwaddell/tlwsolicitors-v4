<?php  
global $hide_title;
global $post;
global $related_pages;
$section_title = "Service information";	
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'service-info-txt'];
?>
<article <?php post_class("content-section"); ?>>
	<a name="service-info-txt" id="service-info-txt" class="section-target"></a>
					
	<?php if (!empty($freephone_num)) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/sections/global-telephone-number.inc'); ?>		
	<?php } ?>
	
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
	
	<div class="container">
		<div class="entry wide-entry">
			<div class="main-txt home">
			<?php the_content(); ?>
			</div>	
			<?php if ($related_pages) { 
			$related_pages_total = count($related_pages);
			$col_span = 4;
			if ($related_pages_total > 1 ) {
				
				if ( $related_pages_total % 2 == 0 ) {
				$col_span = 6;	
				}
				
				if ( $related_pages_total % 4 == 0 ) {
				$col_span = 3;	
				}
				
				if ( $related_pages_total % 6 == 0 ) {
				$col_span = 4;	
				}
				
				if ( ($related_pages_total % 2 != 0) && ($related_pages_total > 3) ) {
				$col_span = 12;	
				}
			}
			?>
			<div class="info-links">
				<?php if ($related_pages_total > 1) { ?>
					<div class="row">		
				<?php } ?>
				<?php foreach ($related_pages as $rp) { 
				$icon = get_field('page_icon', $rp['page']->ID);
				?>
					<div class="col-xs-<?php echo $col_span; ?>">
						<a href="<?php echo get_permalink($rp['page']->ID); ?>" class="btn btn-default btn-block"><i class="fa <?php echo $icon; ?> fa-lg"></i> <?php echo $rp['link_title']; ?></a>	
					</div>
				<?php } ?>	
				<?php if ($related_pages_total > 1) { ?>
					</div>		
				<?php } ?>
			</div>
			<?php } ?>	
			
			<button id="intro-scroll-down-btn"><i class="fa fa-angle-down"></i><span class="sr-only">Go down to next section</span></button>
												
		</div>
	</div>
	
</article>