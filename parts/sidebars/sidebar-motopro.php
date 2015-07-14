<?php 
$mp_tel = get_field('mp_tel');
$mp_web = get_field('mp_website');
$mp_email = get_field('mp_email'); 
?>
<div class="col-xs-4">
	<aside class="sidebar">
		<div class="mp-info">
			<div class="logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/_/css/img/motopro-logo.png" alt="MotoPro - Motoring Law Experts"></div>
			<div class="mp-ff-tel">
				<span>Freephone:</span>
				<?php echo $mp_tel; ?>	
			</div>
			<div class="mp-links">
				<a href="http://<?php echo $mp_web; ?>" title="Visit MotoPro Website" class="icon-btn">
				<i class="fa fa-info-circle fa-lg icon"></i>
				<?php echo $mp_web; ?>
				</a>
				<a href="mailto:<?php echo $mp_email; ?>" title="Email MotoPro" class="icon-btn">
				<i class="fa fa-envelope fa-lg icon"></i>
				<?php echo $mp_email; ?>
				</a>
			</div>
		</div>
	</aside>
</div>