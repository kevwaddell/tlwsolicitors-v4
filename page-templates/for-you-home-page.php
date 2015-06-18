<?php 
/*
Template Name: TLW Personal home page
*/
 ?>

<?php get_header(); ?>

	<?php include (STYLESHEETPATH . '/_/inc/for-you-home-page/personal-home-banner.php'); ?>	
	
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">

			<?php include (STYLESHEETPATH . '/_/inc/for-you-home-page/vars.php'); ?>	
			
			<main>
			
				<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
				<article <?php post_class(); ?>>
				
				<?php include (STYLESHEETPATH . '/_/inc/for-you-home-page/home-intro.php'); ?>
				
				<?php if ($services_selects) { 	?>
				
				<?php include (STYLESHEETPATH . '/_/inc/for-you-home-page/start-enquiry-form.php'); ?>
				
				<?php }  ?>
				
				<?php include (STYLESHEETPATH . '/_/inc/for-you-home-page/latest-campaigns.php'); ?>		
			
				
				<?php if ($feedback_active) { ?>
				<?php include (STYLESHEETPATH . '/_/inc/for-you-home-page/quotes.php'); ?>
				<?php }  ?>

				
				</article>
				
			</main>
			
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
