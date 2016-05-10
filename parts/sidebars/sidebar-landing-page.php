<?php
global $how_it_works_active;
global $color;
?>
<div class="col-xs-4">
	<aside class="scroll-sidebar sidebar lp-sidebar">
		
		<div class="sb-plug text-center font-slab-serif bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>-dk">
			<i class="fa fa-comments txt-col-green"></i>
			<span class="header caps block txt-col-green">Contact us today</span>
			We are a specialist law firm working to put right the injustices of mis-selling, NOT a fly by night PPI company!
		</div>
		
		<div class="sb-plug-btn">
			<button type="button" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#contact-form-modal"><i class="fa fa-check-square fa-lg"></i> Claim Today</a>
		</div>
		
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
