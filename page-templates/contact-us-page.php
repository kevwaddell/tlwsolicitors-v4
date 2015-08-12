<?php 
/*
Template Name: Contact Us Page
*/
 ?>

<?php get_header(); ?>

	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">

			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
			<?php 
			$form = get_field('form');
			$all_forms_active = get_field('all_forms_active', 'option');
			//echo '<pre>';print_r($_GET);echo '</pre>';
			 ?>	
			
			<main <?php post_class('page-col-red'); ?>>
			 
			<?php the_content(); ?>
			 	
			 	<div class="row">
				
					<div class="col-xs-8">
						
						<a id="make-a-claim" name="make-a-claim"></a>
						
						<div class="contact-form">
						<?php if ($form) { 
						//echo '<pre>';print_r($form->is_active);echo '</pre>';	
						?>
						<h3 class="icon-header" style="margin-bottom: 0px;"><?php echo $form->title; ?> <i class="fa fa-cog fa-lg"></i></h3>
					
						<?php if ($form->is_active == 1 && $all_forms_active) { ?>
						
						<?php include (STYLESHEETPATH . '/_/inc/global/forms-script-cap-name.php'); ?>
						
						<?php gravity_form($form->id, false, true, false, null, true); ?>
						
						<?php } else { ?>
						<br>
						<?php include (STYLESHEETPATH . '/_/inc/global/contact-form-offline.php'); ?>	
						<?php } ?>
						
						<?php }  ?>
						</div>
						
					</div>
					
					<?php get_template_part( 'parts/sidebars/sidebar', 'contact-us' ); ?>			
					
			</main>
					
			<?php endwhile; ?>
<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
