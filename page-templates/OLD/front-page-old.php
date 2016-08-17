<?php get_header(); ?>

	<?php include (STYLESHEETPATH . '/_/inc/home-page/home-banner.php'); ?>	
	
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">

			<?php include (STYLESHEETPATH . '/_/inc/home-page/vars.php'); ?>	
			
			<main>
			
				<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
				<article <?php post_class(); ?>>
				
				<?php include (STYLESHEETPATH . '/_/inc/home-page/home-intro.php'); ?>
				
				<?php if ($services_4u) { 	?>
				
				<?php include (STYLESHEETPATH . '/_/inc/home-page/start-enquiry-form.php'); ?>
				
				<?php }  ?>
								
				</article>
				
			</main>
			
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
