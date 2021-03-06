<?php 
/*
Template Name: Team Page
*/
 ?>

<?php get_header(); ?>

	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content">
			<?php
			$position_args = array(
				'orderby'       => 'meta_value', 
			    'hide_empty'    => true); 
			$positions = get_terms( 'tlw_positions_tax', $position_args );
			//echo '<pre>';print_r($positions);echo '</pre>';
			$tabs_counter = 0;
			$panels_counter = 0;
			$freephone_num = get_field('freephone_num', 'option');
			?>
			

			<?php 
			$hide_title = get_field('hide_title'); 
			$page_icon = get_field('page_icon');
			$color = get_field('page_colour');
			
			if ($post->post_parent == 0) {
			$post_ID = $post->ID;
			} else {
			$post_ID = $post->post_parent;	
			}		
				
			$links_args = array(
			'sort_column' => 'menu_order',
			'parent'	=> $post_ID
			); 
		
			$links = get_pages($links_args);	
			
			if (!$page_icon) {
			$page_icon = get_field('page_icon', $post->post_parent);
			}
			 ?>	
			<a name="main-content" id="main-content"></a>
			<main class="page-col-red">
					
					<article <?php post_class(); ?>>
					
						<div class="row">
									
							<?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
						
							<div class="col-xs-7">
													
								<div class="entry wide-entry">
									
									<header class="pg-header">	
										<?php if ($hide_title == 1) { ?>
										<div class="service-tag"><?php the_title(); ?></div>
										<?php } ?>
			
										<?php if ($hide_title != 1) { ?>
										<h1><?php the_title(); ?></h1>
										<?php } ?>
									</header>
									
									<div class="main-txt">
									<?php the_content(); ?>
									</div>
									
									<footer class="footer-pg-info">
									 <p class="tel-num">Call us <span>free <a href="tel:<?php echo str_replace(' ', '', $freephone_num); ?>" onclick="ga('send', 'event','Freephone click', 'tap', '<?php echo $post->post_title; ?> - Call back')" title="Call us now"><?php echo $freephone_num; ?></a></span></p>
									</footer>
								
								</div>
								
								<?php include (STYLESHEETPATH . '/_/inc/team-page/team-list.php'); ?>
							
							</div>
							
							<?php get_template_part( 'parts/sidebars/sidebar', 'company' ); ?>
							
						</div>
						
					</article>
					
			</main>
		
			</div><!-- CONTENT END -->
		
		</div><!-- MAIN CONTENT CONTAINER END -->	
		
		<?php include (STYLESHEETPATH . '/_/inc/pages/links-menu.php'); ?>	
					
		<?php endwhile; ?>
		<?php endif; ?>


<?php get_footer(); ?>
