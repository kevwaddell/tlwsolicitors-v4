<header class="header<?php echo (is_page_template('page-templates/toolkit-page.php') || is_page_template('page-templates/service-home-page.php')) ? ' abs-header':''; ?>" role="banner">
<!--
	<?php if (!is_page_template('page-templates/toolkit-page.php') || !is_page_template('page-templates/service-home-page.php')) { ?>
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	
	<?php } ?>
-->
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
			<?php if (is_front_page() || is_single() || is_home() || is_category() || is_archive()) { ?>
			<span class="tag-line"><?php echo $tag_line; ?></span>
			<?php } else { ?>
			<span class="tag-line">Services for <b>You</b></span>
			<?php } ?>
			<span class="contact-link rs"><i class="fa fa-envelope"></i> 
			<a href="mailto:<?php echo $main_email; ?>" onclick="ga('send', 'event', 'Email', 'click to email', 'site header');" title="Email us now"><?php echo $main_email; ?></a></span>		
			</div>
			
		</div>
	<?php }  ?>

	<div class="header-inner">
	
		<div class="container">
			
			<div class="row">
			
				<div class="col-xs-4">
					<?php if (is_front_page()) { ?>
					<h1 class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
					<?php } else { ?>
					<p class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
					<?php } ?>
				</div>
				
				<div class="col-xs-6 text-right">
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
