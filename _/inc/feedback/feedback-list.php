<?php if ($feedback_quotes) { 
$feed_counter = 0;	
?>

<!-- TEAM PROFILES SECTION -->
<section id="feedback-quotes">
	
		<?php foreach ($feedback_quotes as $quote) : 
		$feed_counter++;
		
		$name = get_field('client_name', $quote->ID);	
		$location = get_field('location', $quote->ID);	
		$quote = get_field('quote', $quote->ID);
		
		if ($feed_counter % 2 != 0) {
		$pointer = "pointer-left";	
		} else {
		$pointer = "pointer-right";		
		}	
		
		?>
		<div id="quote-<?php echo $feed_counter ; ?>" class="quote-wrap <?php echo $pointer; ?>">
			<blockquote class="quote text-center"><?php echo $quote ; ?></blockquote>
			<p class="name-location text-center"><?php echo $name ; ?> - <?php echo $location ; ?></p>	
		</div>
		<?php endforeach; ?>
	
	<a href="mailto:info@tlwsolicitors.co.uk?subject=TLW client feedback" class="icon-btn big-btn btn btn-default btn-block" title="Send us your feedback">Send us your feedback</a>					
	<?php include (STYLESHEETPATH . '/_/inc/pages/footer-info.php'); ?>

</section>
<!-- TEAM PROFILES SECTION -->

<?php } ?>
