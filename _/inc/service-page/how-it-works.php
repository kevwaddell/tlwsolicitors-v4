<?php if ($how_it_works_active) { 
$process_id = get_field('hiw_process');	
$processes = get_field('hiw_processes', $process_id);
$process_counter = 0;	
$process_total = count($processes);
//echo '<pre>';print_r($processes);echo '</pre>';	
?>	
	<div id="how-it-works" class="hidden panel-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		
		<div id="jmpress">
			<?php include (STYLESHEETPATH . '/_/inc/how-it-works/how-it-works-panel.php'); ?>
		</div>
		
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jmpress/0.4.5/jmpress.all.min.js"></script>
		
	</div>
<?php } ?>
