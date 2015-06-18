<header class="header" role="banner">
<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>
	<?php 
	$freephone_num = get_field('freephone_num', 'option');
	$main_email = get_field('main_email', 'option');
	$tag_line = get_field('tag_line', 'options');	
	?>
	<?php if (isset($freephone_num) && isset($main_email)) { ?>
		<div class="contact-links">
			
			<div class="container">
			<span class="contact-link ls"><i class="fa fa-phone fa-lg"></i> 
			<a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event', 'mobile', 'click to call', 'site header');" title="Call us now"><?php echo $freephone_num; ?></a></span>
			<span class="tag-line">Services for <b>Business</b></span>
			<span class="contact-link rs"><i class="fa fa-envelope"></i> 
			<a href="mailto:<?php echo $main_email; ?>" onclick="ga('send', 'event', 'Email', 'click to email', 'site header');" title="Email us now"><?php echo $main_email; ?></a></span>		
			</div>
			
		</div>
	<?php }  ?>


	
	<div class="header-inner">
	
		<div class="container">
			
			<div class="row">
			
				<div class="col-xs-5">
					<p class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
				</div>
				
				<div class="col-xs-5 text-right">
					<?php include (STYLESHEETPATH . '/_/inc/global/header-links.php'); ?>
				</div>
				
				<div class="col-xs-2 text-right">
					<div class="nav-action">
						<span>Menu</span><button id="nav-btn" class="in-active"><i class="fa fa-bars fa-lg"></i></button>
					</div>
				</div>
			
			</div>
		
		</div>
	
	</div>
			
</header>
