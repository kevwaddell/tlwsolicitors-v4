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
	'meta_value'	=> 'personal'
	); 
	$feedback_quote = get_posts($feedback_args); 	
	
	$feedback_id = $feedback_quote[0]->ID;
}

$quote_txt = get_field('quote', $feedback_id);	
$client_name = get_field('client_name', $feedback_id);
$location = get_field('location', $feedback_id);	

$radio_ads_active = get_field('radio_adverts_active', 'option');

if ($radio_ads_active) {
$radio_ads_title = get_field('radio_adverts_title', 'option');	
$radio_ads = get_field('radio_adverts', 'option');	
$r_ads = array();
$radio_stations = get_field('radio_stations', 'option');
	
	foreach ($radio_ads as $radio_ad) {
		
		if ($radio_ad['advert_service'] == $post->ID) {
			array_push($r_ads, $radio_ad);
		}
	} 
}
?>
<div class="col-xs-4">
	<aside class="sidebar">
		
		<?php if ($form_active && $all_forms_active) : 
		$form = get_field('form');	
		?>
		<?php if ($form->is_active == 1) { ?>
		<a name="sb-form" id="sb-form"></a>
		<div class="contact-form sb-form-right">
			<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>
			<h3 class="icon-header">Make a claim enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
			
			<?php gravity_form($form->id, false, true, false, $form_array, true); ?>
						
		</div>	
		<?php } ?>
		<?php endif; ?>
			
		<?php if ($number_pos == 'sidebar') { ?>
		<p class="tel-num tel-num-<?php echo (!empty($color)) ? $color : 'red'; ?>">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
		<?php } ?>
		
		<?php if ($feedback_id) { ?>
		<div class="sb-quote">
			<blockquote><?php echo $quote_txt; ?></blockquote>
			<p class="text-center quote-name"><?php echo $client_name; ?> - <?php echo $location; ?></p>
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
		<button class="sb-menu-btn service-menu-btn btn btn-default btn-block">Services Menu</button>
		<?php } ?>
				
		<?php if ($radio_ads_active && !empty($r_ads)) : ?>
		<div class="sb-radio-adverts">
			<h4 class="icon-header"><i class="fa fa-microphone fa-lg"></i><?php echo $radio_ads_title; ?></h4>
			
			<div class="sb-audio-player">
				<?php foreach ($r_ads as $radio_ad) { ?>
				<dl>
					<dt><?php echo $radio_ad['advert_title']; ?></dt>
					<dd><?php echo do_shortcode('[sc_embed_player_template1 fileurl="'.$radio_ad['advert_file']  .'"]'); ?></dd>
				</dl>
				<?php } ?>
			</div>
		</div>
		<?php endif; ?>
		
	</aside>
</div>