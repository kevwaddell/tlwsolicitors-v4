<?php
global $page_icon;
global $page_links;
global $feedback_active;
global $how_it_works_active;
global $number_pos;
global $freephone_num;
global $links;

$form_active = get_field('form_activated');

$feedback_args = array(
	'posts_per_page'   => 1,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
); 
$feedback_quote = get_posts($feedback_args); 

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
<aside class="sidebar col-xs-4">
	
	<?php if ($form_active) : 
	$form = get_field('form');	
	?>
	<a name="sb-form" id="sb-form"></a>
	<div class="contact-form sb-form-right">
		<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>
		<h3 class="icon-header">Make a claim enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
		
		<?php gravity_form($form->id, false, true, false, $form_array, true); ?>
					
	</div>	
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