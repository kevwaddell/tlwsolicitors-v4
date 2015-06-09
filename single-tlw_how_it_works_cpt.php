<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">

			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); 
			$freephone_num = get_field('freephone_num', 'option');
			?>	
			<main class="page-col-red animated fadeIn">
				
				<article <?php post_class(); ?>>
					
					<div class="entry wide-entry">
						
						<header class="pg-header">		
							<h1 class="text-center"><?php the_title(); ?></h1>
						</header>
		
						<div class="how-it-works-single">
							
						</div>
						
					</div>
						
				</article>
				
			</main>
			
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
<?php get_footer(); ?>
