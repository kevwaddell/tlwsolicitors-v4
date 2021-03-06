<?php
global $page_icon;
global $page_links;
global $feedback_active;
global $how_it_works_active;
global $number_pos;
global $freephone_num;
global $links;
$hw_box_active = get_field('hw_box_active', 'options');
$hw_pages = get_field('hw_pages', 'options');

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
?>
<div class="col-xs-4">
	<aside class="sidebar">
		
		<div class="sb-header no-set-hi">
			<div class="sb-head-top text-center">
				<h3><?php echo get_the_title() ?></h3>
				
				<?php if ($page_icon) { ?>
				<i class="pg-icon fa <?php echo $page_icon; ?> fa-3x"></i>
				<?php } ?>
				
			</div>
			<?php if ($feedback_id) { ?>
			<div class="sb-head-bot text-center">
				<blockquote><?php echo $quote_txt; ?></blockquote>
				<p class="text-center quote-name"><?php echo $client_name; ?> - <?php echo $location; ?></p>
			</div>
			<?php } ?>
		</div>
		
		<?php if ($hw_box_active && in_array(get_the_ID(), $hw_pages)) { 
		$hw_logo = get_field('hw_logo', 'options');	
		$hw_link = get_field('hw_link', 'options');
		$hw_box_text = get_field('hw_box_text', 'options');
		?>
		<div class="sb-headway">
			<a href="<?php echo $hw_link; ?>" rel="nofollow" target="_blank">
			<figure class="hw-logo" style="background-image: url(<?php echo $hw_logo[url]; ?>)"></figure>
			<p class="text-center"><?php echo $hw_box_text; ?></p>
			</a>
		</div>
		<?php } ?>
		
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