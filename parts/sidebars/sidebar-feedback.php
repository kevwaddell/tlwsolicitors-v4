<?php
global $page_icon;
global $number_pos;
global $freephone_num;
global $links;

$form_active = get_field('form_activated');
$all_forms_active = get_field('all_forms_active', 'option');

$custom_sat_active = get_field('custom_sat_active', 'option');
$custom_sat_active_pgs = get_field('active_pages', 'option');
?>
<div class="col-xs-4">
	<aside class="sidebar">
		
		<?php if ($form_active && $all_forms_active) : 
		$form = get_field('form');	
		?>
		<?php if ($form->is_active == 1) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/global/forms-script-cap-name.php'); ?>
		<div class="contact-form sb-form-right">
			<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
			<h3 class="icon-header">Make a claim enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
			
			<?php gravity_form($form->id, false, true, false, null, true); ?>
						
		</div>	
		<?php } ?>
		<?php endif; ?>
		
		<?php if ($number_pos == 'sidebar') { ?>
		<p class="tel-num tel-num-<?php echo (!empty($color)) ? $color : 'red'; ?>">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
		<?php } ?>
		
		<?php if ($custom_sat_active && in_array($post->ID, $custom_sat_active_pgs)) {
		$custom_sat_year = get_field('custom_sat_year', 'option');	
		$custom_sat_download = get_field('custom_sat_download', 'option');		
		?>
		<div class="striped-box">
			<div class="customer-sat-header">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/_/css/img/customer-satisfaction-header.png" alt="Customer satisfaction Client Care Feedback">
			</div>
			<div class="customer-sat-year">
				<?php echo $custom_sat_year; ?>
			</div>
			<a href="<?php echo $custom_sat_download; ?>" class="btn btn-default btn-block" target="_blank" title="View report"><i class="fa fa-pie-chart fa-lg"></i>View report</a>
		</div>
		<?php } ?>
	
		<?php if (!empty($links)) { ?>
		<button class="sb-menu-btn service-menu-btn btn btn-default btn-block">About TLW Menu</button>
		<?php } ?>
						
	</aside>
</div>