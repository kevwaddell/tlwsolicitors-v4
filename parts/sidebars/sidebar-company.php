<?php
global $page_icon;
global $feedback_active;
global $number_pos;
global $freephone_num;

if ($post->post_parent == 0) {
$post_ID = $post->ID;
} else {
$post_ID = $post->post_parent;	
}	

$form_active = get_field('form_activated');

$feedback_args = array(
	'posts_per_page'   => 1,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
); 
$feedback_quote = get_posts($feedback_args); 

$child_args = array(
'sort_column' => 'menu_order',
'parent'	=> $post_ID
); 

$children = get_pages($child_args);

$sb_title = get_the_title();

$custom_sat_active = get_field('custom_sat_active', 'option');
$custom_sat_active_pgs = get_field('active_pages', 'option');
//echo '<pre>';print_r($custom_sat_active_pgs);echo '</pre>';
?>

<aside class="sidebar col-xs-4">

	<?php if ($form_active) : 
	$form = get_field('form');	
	?>
	<div class="contact-form sb-form-right">
		<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
		<h3 class="icon-header">Make a claim enquiry <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
		
		<?php gravity_form($form->id, false, true, false, null, true); ?>
					
	</div>	
	
	<?php endif; ?>
	
	<?php if ($number_pos == 'sidebar') { ?>
	<p class="tel-num tel-num-<?php echo (!empty($color)) ? $color : 'red'; ?>">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
	<?php } ?>
	
	<?php if (!empty($feedback_quote)) { ?>
	<div class="sb-quote wow fadeInUp">
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
	<div class="striped-box wow fadeInUp">
		<div class="customer-sat-header">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/_/css/img/customer-satisfaction-header.png" alt="Customer satisfaction Client Care Feedback">
		</div>
		<div class="customer-sat-year">
			<?php echo $custom_sat_year; ?>
		</div>
		<a href="<?php echo $custom_sat_download; ?>" class="btn btn-default btn-block" target="_blank" title="View report"><i class="fa fa-pie-chart fa-lg"></i>View report</a>
	</div>
	<?php } ?>

	<?php if (!empty($children)) { ?>
	<div class="menu-collapse closed wow fadeInUp">
	<a name="sb-menu-collapse" id="sb-menu-collapse"></a>
	<button class="sb-menu-btn btn btn-default btn-block"><?php echo get_the_title($post_ID); ?> Menu</button>
		<ul class="list-unstyled menu-links">
			
			<li class="page-item page-item-<?php echo $post_ID; ?><?php echo ($post->post_parent == 0) ? ' current_page_item':''; ?>"><a href="<?php echo get_permalink($post_ID); ?>"><?php echo get_the_title($post_ID); ?></a></li>
			
			
			<?php foreach ($children as $child) { 
			$g_child_args = array(
			'sort_column' => 'menu_order',
			'parent'	=> $child->ID
			); 

			$g_children = get_pages($g_child_args);
			?>
			<li class="page_item page-item-<?php echo $child->ID; ?><?php echo ($post->ID == $child->ID) ? ' current_page_item':''; ?><?php echo (!empty($g_children)) ? ' page_item_has_children hide-children':''; ?>">
				<a href="<?php echo get_permalink($child->ID); ?>"><?php echo get_the_title($child->ID); ?></a>
				
				<?php if (!empty($g_children)) { ?>
					<ul class="children">
						<li class="page_item page-item-<?php echo $child->ID; ?>"><a href="<?php echo get_permalink($child->ID); ?>">Overview</a></li>
						<?php foreach ($g_children as $g_child) { ?>
						<li class="page_item page-item-<?php echo $g_child->ID; ?>"><a href="<?php echo get_permalink($g_child->ID); ?>"><?php echo get_the_title($g_child->ID); ?></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
			</li>
			<?php } ?>	
			
		
		</ul>
	
	</div>
	<?php } ?>
			
</aside>