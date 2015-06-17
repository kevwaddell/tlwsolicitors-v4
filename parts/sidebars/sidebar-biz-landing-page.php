<?php
global $page_icon;
global $page_links;
global $feedback_active;
global $how_it_works_active;
global $number_pos;
global $freephone_num;

if ($post->post_parent == 0) {
$post_ID = $post->ID;
} else {
$post_ID = $post->post_parent;	
}	

if ($feedback_active) {
	$client_feedback = get_field('client_feedback');
	$quote_txt = get_field('quote', $client_feedback);	
	$client_name = get_field('client_name', $client_feedback);
	$location = get_field('location', $client_feedback);	
} else {
	$feedback_args = array(
	'posts_per_page'   => 1,
	'post_type' => 'tlw_testimonial_cpt',
	'orderby'          => 'rand',
	); 
	$feedback_quote = get_posts($feedback_args); 	
	
	$quote_txt = get_field('quote', $feedback_quote[0]->ID);
	$client_name = get_field('client_name', $feedback_quote[0]->ID);
	$location = get_field('location', $feedback_quote[0]->ID);	
}

$child_args = array(
'sort_column' => 'menu_order',
'parent'	=> $post_ID
); 

$children = get_pages($child_args);
?>
<aside class="sidebar col-xs-4">
	
	<div class="sb-header no-set-hi">
		<div class="sb-head-top text-center">
			<h3><span>Services for</span><?php echo get_the_title() ?></h3>
			
			<?php if ($page_icon) { ?>
			<i class="pg-icon fa <?php echo $page_icon; ?> fa-3x"></i>
			<?php } ?>
			
		</div>
		<div class="sb-head-bot text-center">
			<blockquote><?php echo $quote_txt; ?></blockquote>
			<p class="text-center quote-name"><?php echo $client_name; ?>, <?php echo $location; ?></p>
		</div>
	</div>
	
	<?php if ($number_pos == 'sidebar') { ?>
	<p class="tel-num tel-num-<?php echo (!empty($color)) ? $color : 'red'; ?> wow fadeInUp">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
	<?php } ?>
	
	<?php if ($how_it_works_active) { ?>	
	<div class="how-it-works-link wow fadeInUp">
		<a href="#how-it-works" class="hiw-link">
			<span class="txt-mid">The Claims Process</span>
			<span class="txt-lg">How it Works</span>
			<span class="txt-sml">Click here for more information</span>
		</a>
	</div>
	<?php } ?>
	
	<?php if (!empty($children)) { ?>
	<div class="menu-collapse closed wow fadeInUp">
	<a name="sb-menu-collapse" id="sb-menu-collapse"></a>
	<button class="sb-menu-btn btn btn-default btn-block">Services Menu</button>
		<ul class="list-unstyled menu-links">
			
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