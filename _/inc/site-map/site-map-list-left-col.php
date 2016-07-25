<div class="col-xs-6">
	
	<?php if ($services) { ?>
	
	<?php foreach ($services as $service) { ?>
	
	<?php 
	$icon = get_field('page_icon', $service->ID);
	
	if (!empty($icon)) {
	$icon_tag = '<i class="icon fa '.$icon.'"></i>';	
	}
	
	$service_args = array(
	'posts_per_page' => -1,
	'post_type'		=> 'page',
	'orderby'		=> 'menu_order',
	'post_parent'	=> $service->ID,
	'order'			=> 'ASC'
	);
	
	$service_children = get_posts($service_args);
	 ?>
	
		<div class="list-block">
			<h3><a href="<?php echo get_permalink($service->ID); ?>"><?php echo ($icon_tag) ? $icon_tag: ''; ?><?php echo $service->post_title; ?><i class="fa fa-angle-right fa-lg"></i></a></h3>
			
		<?php if ($service_children) { ?>
			
			<ul class="list-unstyled">
			
			<?php foreach ($service_children as $service_child) { 
			$gc_args = array(
			'posts_per_page' => -1,
			'post_type'		=> 'page',
			'orderby'		=> 'menu_order',
			'post_parent'	=> $service_child->ID,
			'order'			=> 'ASC'
			);
			$service_gchildren = get_posts($gc_args);
			?>
			<li><a href="<?php echo get_permalink($service_child->ID); ?>"><?php echo $service_child->post_title; ?></a></li>
				<?php if ($service_gchildren) { ?>
					<?php foreach ($service_gchildren as $g_child) { ?>
					<li><a href="<?php echo get_permalink($g_child->ID); ?>"><?php echo get_the_title($g_child->ID); ?></a></li>
					<?php } ?>
				<?php } ?>

			<?php } ?>
				
			</ul>	
			
		<?php } ?>

		</div>
	
	<?php } ?>

	<?php } ?>
	
<!--
	<?php if ($subjects) { ?>
		<h3><?php echo ($news_page_icon) ? '<i class="icon fa '.$news_page_icon.' f-lg"></i>': ''; ?><?php echo $news_page->post_title; ?><i class="fa fa-angle-right fa-lg"></i>: Tags</h3>
		
		<div class="list-block" style="text-transform: capitalize;">
			<?php wp_tag_cloud('smallest=14&largest=16&unit=px&separator= | '); ?>
		</div>
			
	<?php } ?>
-->
					
</div>