<?php if ($how_it_works_active) { ?>	
	<div id="how-it-works" class="hidden panel-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		
		<div id="jmpress">
			<?php include (STYLESHEETPATH . '/_/inc/how-it-works/how-it-works-panel.php'); ?>
		</div>
		
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jmpress/0.4.5/jmpress.all.min.js"></script>
		
	</div>
<?php } ?>
