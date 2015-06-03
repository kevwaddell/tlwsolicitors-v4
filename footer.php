	
		<!-- FOOTER START -->
		<section id="footer-info">
		
			<footer class="container">
				
				<div class="row">
				
					<div class="col-xs-3">
					<h3>Services for You</h3>
					<?php wp_nav_menu(array( 'container_class' => 'footer-nav', 'theme_location' => 'footer_menu', 'fallback_cb' => false ) ); ?>
					</div>
					
					<div class="col-xs-3">
					<h3>Services for Business</h3>
					<?php wp_nav_menu(array( 'container_class' => 'footer-nav', 'theme_location' => 'footer_menu_business', 'fallback_cb' => false ) ); ?>
					</div>
					
					<div class="col-xs-3">
					<h3 class="hidden-xs">General</h3>
					<?php wp_nav_menu(array( 'container_class' => 'footer-nav', 'theme_location' => 'footer_menu_general', 'fallback_cb' => false ) ); ?>
					</div>
					
					<div class="col-xs-3">
					<?php wp_nav_menu(array( 'container_class' => 'social-links clearfix', 'theme_location' => 'social_links_menu', 'fallback_cb' => false ) ); ?>
					
					<div id="footer-logo" class="hidden-xs text-hide"><?php bloginfo('name'); ?></div>
					
					<div class="compliance-notice">
						<?php $compliance_notice = get_field('compliance_notice', 'option');?>
						<?php if (isset($compliance_notice)) { ?>
						<?php echo $compliance_notice; ?>
						<?php }  ?>
					</div>
					
					</div>
				
				</div>
				
				<div class="copyright">
					<p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. <br>All rights reserved.</p>
				</div>
				
			</footer>
			
		</section>
		
		<div class="nav-overlay"></div>
		
</div><!-- MAIN WRAPPER END -->
		
		<button id="back-2-top" class="hidden"><i class="fa fa-chevron-circle-up fa-2x"></i><span class="sr-only">Back to top</span></button>	
				
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('User actions') ) : ?><?php endif; ?>
		
		<?php include (STYLESHEETPATH . '/_/inc/global/no-script.php'); ?>
		<?php if (!is_home() && !is_single() && !is_archive()) { ?>	
		<?php include (STYLESHEETPATH . '/_/inc/global/search-pop-up.php'); ?>
		<?php } ?>
		
		<?php wp_footer(); ?>

	</body>
</html>