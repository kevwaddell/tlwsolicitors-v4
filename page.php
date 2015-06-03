<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">

			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
			<?php 
			$related_pages = get_field('page_links'); 
			$hide_title = get_field('hide_title'); 
			?>	
			 <main class="page-col-red animated fadeIn">
			 	<div class="row">
			 	 		 	
				 	<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
				 	
				 	<div class="col-xs-10 col-xs-offset-1">
				 	
						<article <?php post_class(); ?>>
							
							<?php if ($hide_title != 1) { ?>
								<h1><?php the_title(); ?></h1>
							<?php } ?>
							
								<div class="main-txt">
									<?php the_content(); ?>
								</div>
							
							</article>
						
				 	</div>
					
			 	</div>
			 	
			 </main>
					
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->

<?php get_footer(); ?>
