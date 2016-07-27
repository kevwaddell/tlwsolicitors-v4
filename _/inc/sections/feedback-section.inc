<?php
$feedback_option = get_field('feedback_option');
?>

<?php if ($feedback_option == 'single') { ?>
<?php include (STYLESHEETPATH . '/_/inc/sections/feedback-single-section.inc'); ?>		
<?php } ?>

<?php if ($feedback_option == 'multiple') { ?>
<?php include (STYLESHEETPATH . '/_/inc/sections/feedback-slider-section.inc'); ?>	
<?php } ?>