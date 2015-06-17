<?php 
/*
Template Name: TLW Business home page
*/
 ?>

<?php get_template_part( 'parts/headers/header', 'for-business' ); ?>

	<?php include (STYLESHEETPATH . '/_/inc/for-business-home-page/biz-home-banner.php'); ?>	
	
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">

			<?php include (STYLESHEETPATH . '/_/inc/for-business-home-page/vars.php'); ?>	
			
			<main class="animated fadeIn">
			
				<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
				<article <?php post_class(); ?>>
				
				<?php include (STYLESHEETPATH . '/_/inc/for-business-home-page/home-intro.php'); ?>
				
				<?php if ($services_selects) { 	?>
				
				<?php include (STYLESHEETPATH . '/_/inc/for-business-home-page/start-enquiry-form.php'); ?>

				<?php }  ?>

				
				</article>
				
			</main>
			
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
