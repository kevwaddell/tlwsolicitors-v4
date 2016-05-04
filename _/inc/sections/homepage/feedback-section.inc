<?php
$hp_feedback_active = get_field('hp_feedback_active', 'option');
$quick_links[] = ['link_title' => "Client feedback", 'link_anchor' => 'feedback'];	 
?>
<?php if ($hp_feedback_active) { 
$hp_testimonials = get_field('hp_testimonials', 'option');	
$feedback_count = count($hp_testimonials);
$feedback_inner_width = $feedback_count * 100;
$item_width = 100 / $feedback_count;
echo '<pre class="debug">';print_r($item_width);echo '</pre>';
?>
<section id="feedback-section" class="pg-section">
<a name="feedback" id="feedback" class="section-target"></a>
	<div class="feedback-section-wrapper">
			
		<div class="feedback-section-inner">
		
		<?php foreach ($hp_testimonials as $quote) { 
		$feedback_counter++;
		$quote_id = $quote['hp_feedback'];
		$quote_txt = get_field('quote', $quote_id);	
		$client_name = get_field('client_name', $quote_id);		
		$location = get_field('location', $quote_id);	
		$gender = get_field('gender', $quote_id);
		$col = $quote['hp_feedback_col'];
		?>
			<div class="item bg-col-<?php echo $col; ?><?php echo ($feedback_counter == 1) ? " active":""; ?>">
				<div class="container feedback-quote">
					<div class="row">
						<div class="col-xs-2 text-left">
							<i class="fa fa-quote-left quote-icon"></i>
						</div>
						<div class="col-xs-8">
							<span class="gender-icon fa fa-<?php echo ($gender == 'm') ? 'male':'female'; ?>"></span>
							<blockquote class="no-border text-center"><?php echo $quote_txt; ?></blockquote>
							<span class="quote-name"><?php echo $client_name; ?>, <?php echo $location; ?></span>
						</div>
						<div class="col-xs-2 text-right">
							<i class="fa fa-quote-right quote-icon"></i>
						</div>
					</div>
				</div>
				
				<div class="overlay"></div>
				
			</div>
		<?php } ?>
	
		</div>
		
	</div>

</section>
<?php } ?>