<?php
global $page_icon;
global $page_links;
global $feedback_active;
global $how_it_works_active;
global $number_pos;
global $freephone_num;
global $links;

$form_active = get_field('form_activated');
$all_forms_active = get_field('all_forms_active', 'option');

if ($feedback_active) {
	$feedback_id = get_field('client_feedback');
} else {
	$feedback_args = array(
	'posts_per_page'   => 1,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
	'meta_key'	=> 'area',
	'meta_value'	=> 'business'
	); 
	$feedback_quote = get_posts($feedback_args); 	
	
	$feedback_id = $feedback_quote[0]->ID;
}

	$quote_txt = get_field('quote', $feedback_id);
	$client_name = get_field('client_name', $feedback_id);
	$location = get_field('location', $feedback_id);
	$company = get_field('company', $feedback_id);
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
			<h3 class="icon-header">Make an enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
			
			<?php gravity_form($form->id, false, true, false, false, true); ?>
						
		</div>
		<?php } ?>	
		<?php endif; ?>
		
				
		<?php if ($number_pos == 'sidebar') { ?>
			<p class="tel-num tel-num-<?php echo (!empty($color)) ? $color : 'red'; ?>">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
		<?php } ?>
		
		<?php if ($feedback_id) { ?>
		<div class="sb-quote">
			<blockquote><?php echo $quote_txt; ?></blockquote>
			<p class="text-center quote-name"><?php echo $client_name; ?><?php echo($company) ? '<br>'.$company:''; ?> - <?php echo $location; ?></p>
		</div>
		<?php } ?>
		
		<?php if ($how_it_works_active) { ?>	
		<div class="how-it-works-link">
			<a href="#how-it-works" class="hiw-link">
				<span class="txt-mid">The Claims Process</span>
				<span class="txt-lg">How it Works</span>
				<span class="txt-sml">Click here for more information</span>
			</a>
		</div>
		<?php } ?>
		
		<?php if (!empty($links)) { ?>
		<button class="service-menu-btn btn btn-default btn-block">Services Menu</button>
		<?php } ?>
								
	</aside>
</div>