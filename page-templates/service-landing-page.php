<?php 
/*
Template Name: Service Landing page template
*/
 ?>

<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
			<?php 
			$links = get_field('banner_links', 'option');
			$freephone_num = get_field('freephone_num', 'option');
			$number_pos = get_field('tel_num_position');
			if (empty($number_pos)) {
			$number_pos = "bottom";	
			}
			$form_active = get_field('form_activated');
			$color = get_field('page_colour');
			$page_icon = get_field('page_icon');
			$page_links = get_field('page_links');
			$on_page_script = get_field('on_page_script');
			$main_title = get_field('main_title');
			$feedback_active = get_field('feedback_active'); 
			$how_it_works_active = get_field('hiw_active');
			$all_forms_active = get_field('all_forms_active', 'option');
			
			if ($page_icon == 'null' || !$page_icon) {
			$parent = get_page($post->post_parent);
			$grand_parent = $parent->post_parent;
			$page_icon = get_field('page_icon', $post->post_parent);
				if ($page_icon == 'null' || !$page_icon) {
				$page_icon = get_field('page_icon', $grand_parent);	
				}
			}
			?>	
	<div class="title-banner bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		<div class="container">
			<?php the_title(); ?>
		</div>
	</div>
				
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="banner-img banner-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		<?php include (STYLESHEETPATH . '/_/inc/service-page/banner-feat-img.php'); ?>
		
		<?php if ($main_title) { ?>
		<div class="lp-title">
			<div class="container">
				<div class="row">
					<div class="col-xs-8">
						<h1><?php echo $main_title; ?></h1>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if ($form_active && $all_forms_active) : 
		$form = get_field('form');	
		?>
		<?php if ($form->is_active == 1) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/global/forms-script-cap-name.php'); ?>
		<div class="banner-form">
			<div class="container">
				<div class="row">
					<div class="col-xs-4 col-xs-offset-8">
						
						<a name="banner-form" id="banner-form"></a>
						<div class="contact-form">
							<h3 class="icon-header">Make a claim today <i class="fa fa-arrow-circle-down fa-lg"></i></h3>
							
							<?php gravity_form($form->id, false, true, false, $form_array, true); ?>
										
						</div>	
						
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php endif; ?>
		
	</div>
	<?php } ?>
	
	<div class="container">
	
		<div class="content pad-bot-none">

			<?php if (!empty($on_page_script)) { ?>
			<?php echo $on_page_script; ?>
			<?php } ?>
			<a name="main-content" id="main-content"></a>
			<main class="page-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
					 	
			 	<article <?php post_class(); ?>>
				 	
				 	<div class="row">
					 			 	
						 <?php include (STYLESHEETPATH . '/_/inc/global/access-btns.php'); ?>
					 	
					 	<div class="col-xs-7">
					 	
						 	<div class="entry wide-entry">
	
								<div class="main-txt">
								<?php the_content(); ?>
								</div>
								
								<?php include (STYLESHEETPATH . '/_/inc/service-page/footer-info.php'); ?>
							
						 	</div>
						
					 	</div>
					 	
					 	<?php get_template_part( 'parts/sidebars/sidebar', 'services-landing-page' ); ?>
					 			
				 	</div>
				
				</article>
							 	
			</main>

	</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
	
	<?php include (STYLESHEETPATH . '/_/inc/service-page/links-menu.php'); ?>
	
	<?php include (STYLESHEETPATH . '/_/inc/service-page/how-it-works.php'); ?>
						
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
