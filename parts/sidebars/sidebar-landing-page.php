<?php
global $form_active; 
global $form;
global $number_pos;
global $color;
global $freephone_num;
global $how_it_works_active;
$all_forms_active = get_field('all_forms_active', 'option');
?>
<div class="col-xs-4">
	<aside class="scroll-sidebar sidebar lp-sidebar">
		<?php if ($form_active && $all_forms_active) : ?>
		<?php if ($form->is_active == 1) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/global/forms-script-cap-name.php'); ?>
	 	<div class="lp-form lp-form-<?php echo (!empty($color)) ? $color : 'red'; ?>">
	
		 	<h3>Make your claim today <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
	
		 	<?php gravity_form($form->id, false, true, false, null, true); ?>
			
	 	</div>	
	 	<?php } ?>
		<?php endif; ?>
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
	</aside>
</div>
