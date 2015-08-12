<?php
global $page_icon;
global $feedback_active;
global $number_pos;
global $freephone_num;
global $links;
$all_forms_active = get_field('all_forms_active', 'option');

$form_active = get_field('form_activated');

$feedback_args = array(
	'posts_per_page'   => 1,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
	'meta_key'	=> 'area',
	'meta_value'	=> 'personal'
); 
$feedback_quote = get_posts($feedback_args); 

$sb_title = get_the_title();

$custom_sat_active = get_field('custom_sat_active', 'option');
$custom_sat_active_pgs = get_field('active_pages', 'option');
//echo '<pre>';print_r($custom_sat_active_pgs);echo '</pre>';
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
		
		<?php if (!empty($feedback_quote)) { ?>
		<div class="sb-quote">
			<?php foreach ($feedback_quote as $quote) { 
			$quote_txt = get_field('quote', $quote->ID);	
			$client_name = get_field('client_name', $quote->ID);
			$location = get_field('location', $quote->ID);		
			?>
			<blockquote><?php echo $quote_txt; ?></blockquote>
			<p class="text-center"><?php echo $client_name; ?>, <?php echo $location; ?></p>
			<?php } ?>
		</div>
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