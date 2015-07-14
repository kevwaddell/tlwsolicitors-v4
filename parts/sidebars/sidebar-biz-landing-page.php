<?php
global $page_icon;
global $page_links;
global $feedback_active;
global $how_it_works_active;
global $number_pos;
global $freephone_num;
global $links;

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
		
		<div class="sb-header no-set-hi">
			<div class="sb-head-top text-center">
				<h3><span>Services for</span><?php echo get_the_title() ?></h3>
				
				<?php if ($page_icon) { ?>
				<i class="pg-icon fa <?php echo $page_icon; ?> fa-3x"></i>
				<?php } ?>
				
			</div>
			<?php if ($feedback_id) { ?>
			<div class="sb-head-bot text-center">
				<blockquote><?php echo $quote_txt; ?></blockquote>
				<p class="text-center quote-name"><?php echo $client_name; ?><?php echo($company) ? '<br>'.$company:''; ?> - <?php echo $location; ?></p>
			</div>
			<?php } ?>
		</div>
		
		<?php if ($number_pos == 'sidebar') { ?>
		<p class="tel-num tel-num-<?php echo (!empty($color)) ? $color : 'red'; ?>">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
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