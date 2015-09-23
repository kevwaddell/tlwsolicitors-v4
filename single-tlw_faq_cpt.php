<?php get_header(); ?>
	<!-- MAIN CONTENT START -->
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
	<?php 
	$freephone_num = get_field('freephone_num', 'option');
	$faq_qestions = get_field('faq_qestions');	
	$faq_page_id = get_field('faq_page');
	$faq_page = get_page($faq_page_id);
	$color = get_field('page_colour', $faq_page_id);
	$page_icon = get_field('page_icon', $faq_page_id);
	$contact_us_pg = get_page_by_title("Contact us");
	//echo '<pre>';print_r($contact_us_pg);echo '</pre>';
	
	if ( has_post_thumbnail($faq_page_id) ) {
	$img_post = $faq_page_id;
	} else {
	$img_post = $faq_page->post_parent;
	$parent = get_post($img_post);	
	
		if (!has_post_thumbnail($img_post) && $parent->post_parent != 0) {
		$img_post = $parent->post_parent;
		}
	}
	
	?>
	
	
	
	<?php if ( has_post_thumbnail($img_post) ) { ?>
	<?php include (STYLESHEETPATH . '/_/inc/faqs/feat-img-slim.php'); ?>
	<?php } ?>
	
	<div class="container">
	
		<div class="content no-pad-top">
			
			<main class="page-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
				
				<article <?php post_class(); ?>>
					
					<div class="entry wide-entry">
						
						<header class="pg-header with-tag">		
							<h1 class="text-center"><?php echo get_the_title($faq_page_id); ?></h1>
						</header>
						
						<div class="main-txt">
							<?php the_content(); ?>
						</div>
						
						<?php if ($faq_qestions) { ?>
						
						<section id="faqs-single" class="col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
							<h3 class="icon-header">FAQ's <i class="fa fa-comments fa-lg"></i></h3>
							<?php foreach ($faq_qestions as $faq) { 	?>

							<div class="faq wow slideInUp">
								<p class="faq-q"><?php echo $faq['faq_question']; ?></p>
								<div class="faq-a">
								<?php echo $faq['faq_answer']; ?>
								</div>
								<div class="rule"></div>
							</div>
							
						<?php } ?>

						</section>
						<div class="faq-message text-center wow slideInUp">
							<h3 class="txt-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">Can't find an answer to your question?</h3>
							<p><a href="<?php echo get_permalink($contact_us_pg->ID); ?>">Contact us today</a>
							And we will help you in any way we can</p>
						</div>
						<?php } ?>
						
					</div>
						
				</article>
				
			</main>

		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
				
	<?php endwhile; ?>
	<?php endif; ?>
	
<?php get_footer(); ?>
