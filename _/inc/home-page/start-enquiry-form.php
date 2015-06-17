<section id="enqiry-start-form" class="wow fadeInLeftBig" style="display: none;">
			
		<h2 class="text-center"><i class="fa fa-check-square-o"></i> Start your enquiry today</h2>
		
		<select name="service" id="service-select" data-width="100%" class="selectpicker btn-block text-center">
			<option data-hidden="true">Please select a service</option>
			<option value="<?php echo get_permalink($services_for_you_pg->ID); ?>"><?php echo get_the_title($for_you_pg); ?></option>
			<option value="<?php echo get_permalink($services_for_biz_pg->ID); ?>"><?php echo get_the_title($for_biz_pg); ?></option>
		</select>
		
		<select name="main-service-area" class="selectpicker btn-block service-area-select" data-width="100%" id="<?php echo $services_for_you_pg->post_name; ?>-select">
				<option data-hidden="true">Choose a service area</option>
				<?php foreach ($services_4u as $service) { ?>
				<option value="<?php echo get_permalink($service->ID); ?>"><?php echo get_the_title($service->ID); ?></option>
				<?php } ?>
		</select>
		
		<select name="main-service-area" class="selectpicker btn-block service-area-select" data-width="100%" id="<?php echo $services_for_biz_pg->post_name; ?>-select">
			<option data-hidden="true">Choose a service area</option>
			<?php foreach ($services_4biz as $service) { ?>
			<option value="<?php echo get_permalink($service->ID); ?>"><?php echo get_the_title($service->ID); ?></option>
			<?php } ?>
		</select>
		
		<?php foreach ($services_4biz as $service) { 
		
		$services_areas_args = array(
		'sort_column' => 'menu_order',
		'parent' => $service->ID,
		'post_type' => 'page'
		);
		
		$services_areas = get_pages($services_areas_args);
		//echo '<pre>';print_r($services_areas);echo '</pre>';
		if ($services_areas) {
		?>
		
		<select name="child-service-area" data-width="100%" class="selectpicker btn-block child-service-area-select" id="<?php echo $service->post_name; ?>-select">
			<option data-hidden="true">Services for <?php echo get_the_title($service->ID); ?></option>
			<?php foreach ($services_areas as $services_area) { ?>
			<option value="<?php echo get_permalink($services_area->ID); ?>"><?php echo get_the_title($services_area->ID); ?></option>
			<?php } ?>
		</select>
		
		<?php } ?>
		
		<?php } ?>
		
		<?php foreach ($services_4u as $service) { 
		
		$services_areas_args = array(
		'sort_column' => 'menu_order',
		'parent' => $service->ID,
		'post_type' => 'page'
		);
		
		$service_pg = get_page($service->ID);
		
		$services_areas = get_pages($services_areas_args);
		//echo '<pre>';print_r($services_areas);echo '</pre>';
		if ($services_areas) {
		?>
		<select name="child-service-area" data-width="100%" class="selectpicker btn-block child-service-area-select" id="<?php echo $service->post_name; ?>-select">
			<option data-hidden="true"><?php echo $service_pg->post_title; ?> Services</option>
			<?php foreach ($services_areas as $services_area) { ?>
			<option value="<?php echo get_permalink($services_area->ID); ?>"><?php echo get_the_title($services_area->ID); ?></option>
			<?php } ?>
		</select>
		
		<?php } ?>
		
		<?php } ?>
		<a href="<?php echo get_option('home'); ?>" id="start-enquiry-btn" class="submit-btn btn btn-default btn-block hidden">Start</a>
		
		<div class="rule"></div>
	
</section>
