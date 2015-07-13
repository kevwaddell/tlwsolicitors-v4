<?php get_header(); ?>

	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	<?php 
	$hide_title = get_field('hide_title'); 
	$form_active = get_field('form_activated');
	?>	
	
	<?php if ( has_post_thumbnail($img_post) ) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/pages/feat-img-slim.php'); ?>
	<?php } ?>
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">

			 <main class="page-col-red">
			 	<div class="row">
			 	 		 	
				 	<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				 	
				 	<div class="col-xs-11">
				 	
						<article <?php post_class(); ?>>
							
							<?php if ($hide_title != 1) { ?>
								<h1><?php the_title(); ?></h1>
							<?php } ?>
							
								<div class="main-txt">
								<?php the_content(); ?>
									
								<?php if ($form_active) : 
								$form = get_field('form');	
								?>
								<div class="contact-form">
									<?php gravity_form($form->id, false, true, false, null, true); ?>			
								</div>	
								
								<?php endif; ?>

								</div>
							
							</article>
						
				 	</div>
					
			 	</div>
			 	
			 </main>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
					
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
