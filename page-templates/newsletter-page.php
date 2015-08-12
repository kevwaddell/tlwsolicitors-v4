<?php 
/*
Template Name: Newsletter sign up template
*/
?>
<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">

			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
			<?php 
			$form = get_field('form');
			$hide_title = get_field('hide_title'); 
			$all_forms_active = get_field('all_forms_active', 'option');
			 ?>	
			 <main class="page-col-red">
				 
				 <div class="row">
					 	 
					<?php include (STYLESHEETPATH . '/_/inc/global/access-btns-fleft.php'); ?>
				 
				 	<div class="col-xs-7">
				 	
						<article <?php post_class(); ?>>
							<?php if ($hide_title != 1) { ?>
								<h1><?php the_title(); ?></h1>
							<?php } ?>
							<div class="main-text">
								<?php the_content(); ?>
							
							<?php if ($form) { ?>
							
							<?php if ($form->is_active == 1 && $all_forms_active) { ?>
								<?php include (STYLESHEETPATH . '/_/inc/global/forms-script-cap-name.php'); ?>
								<?php gravity_form($form->id, false, false, false, null, true); ?>
							<?php } else { ?>
								<br>
								<div class="alert alert-danger text-center">
								<h4>Sorry our newsletter sign up form is off-line at the moment</h4>
								<p>Please contact us on <a href="mailto:info@tlwsolicitors.co.uk">info@tlwsolicitors.co.uk</a> or call <strong>0800 169 5925</strong></p>
								</div>
							<?php } ?>
							
							<?php }  ?>
							</div>
							
						</article>
					 
					 </div>
					 
					<?php get_template_part( 'parts/sidebars/sidebar', 'newsletter' ); ?>
				
				 </div>
			 
			 </main>
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
