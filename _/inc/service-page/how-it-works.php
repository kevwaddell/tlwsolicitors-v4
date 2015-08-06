<?php if ($how_it_works_active) { 
$process_id = get_field('hiw_process');	
$processes = get_field('hiw_processes', $process_id);
$process_counter = 0;	
$process_total = count($processes);
//echo '<pre>';print_r($processes);echo '</pre>';	
?>	
	<div id="how-it-works" class="hidden">
		
		<header class="hiw-header">
			<div class="row">
				<div class="col-xs-3">
			<h3><span>The Claims Process</span>How it works</h3>
				</div>
				<div class="col-xs-8">
					<nav class="hiw-nav">
						
						<?php for ($i = 0; $i < ($process_total-1); $i++) { ?>
						
						<a href="#<?php echo ($i == 0) ? 'start' : 'slide'.$i; ?>"><?php echo ($i+1); ?></a>
						
						<?php } ?>
					</nav>
				</div>
				<div class="col-xs-1">
					<button id="close-how-it-works"><span class="sr-only">Close</span><i class="fa fa-times fa-2x"></i></button>
				</div>
			</div>
		</header>
		
		<div id="jmpress">
			<?php include (STYLESHEETPATH . '/_/inc/how-it-works/how-it-works-panel.php'); ?>
		</div>
		
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jmpress/0.4.5/jmpress.all.min.js"></script>
		
	</div>
<?php } ?>
