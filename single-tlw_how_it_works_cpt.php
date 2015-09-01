<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">

			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
			
			<?php 
			$processes = get_field('hiw_processes');	
			?>
			<main class="page-col-red">
				
				<article <?php post_class(); ?>>
					
					<div class="entry wide-entry">
						
						<header class="pg-header with-tag">		
							<h1 class="text-center"><?php the_title(); ?></h1>
						</header>
						
						<div class="main-txt">
							<?php the_content(); ?>
						</div>
						
						<?php if ($processes) { ?>
						
						<div class="how-it-works-single">
							<h3 class="icon-header text-center">How it Works<i class="fa fa-cogs fa-lg"></i></h3>
							
							<?php foreach ($processes as $panel) { 	?>

							<div class="step<?php echo ($panel['hiw_col']) ? ' col-'.$panel['hiw_col'] : ''; ?> wow slideInUp">
								
								<?php if (($process_counter + 1) != $process_total) { ?>
								<div class="number"><?php echo ($process_counter + 1); ?></div>
								<?php } ?>
								
								
								<?php if ($panel['hiw_icon_1'] && $panel['hiw_icon_2'] && $panel['hiw_icon_3']) { 
								//echo '<pre>';print_r($panel['hiw_icon_1']['sizes']['post-list-img']);echo '</pre>';	
								$icon_1 = $panel['hiw_icon_1']['sizes']['post-list-img'];
								$icon_2 = $panel['hiw_icon_2']['sizes']['post-list-img'];
								$icon_3 = $panel['hiw_icon_3']['sizes']['post-list-img'];
								?>
								
								<div class="icons">
									<div class="icon" style="background-image: url(<?php echo $icon_1; ?>)"></div>
									<div class="icon" style="background-image: url(<?php echo $icon_2; ?>)"></div>
									<div class="icon" style="background-image: url(<?php echo $icon_3; ?>)"></div>
								</div>
								
								<?php } ?>
							    <p class="header"><?php echo $panel['hiw_header']; ?></p>
							    <p class="text"><?php echo $panel['hiw_text']; ?></p>
							    
							</div>
							
							<?php 
							$process_counter++;
							} ?>

						</div>
						<?php } ?>
						
					</div>
						
				</article>
				
			</main>
			
			<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
<?php get_footer(); ?>
