<?php 
/*
Template Name: FAQ's page template
*/
 ?>


<?php get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

<?php 
	$freephone_num = get_field('freephone_num', 'option');
	$number_pos = get_field('tel_num_position');
	$page_icon = get_field('page_icon');
	$color = get_field('page_colour');
	$hide_title = get_field('hide_title'); 
	$services_links = get_field('banner_links', 'option');
	
	if ( has_post_thumbnail() ) {
	$img_post = get_the_ID();
	} else {
	$img_post = $post->post_parent;
	$parent = get_post($img_post);	
	
		if (!has_post_thumbnail($img_post) && $parent->post_parent != 0) {
		$img_post = $parent->post_parent;
		}
	}
	
	//echo '<pre>';print_r($img_post);echo '</pre>';
	
	if (empty($number_pos)) {
	$number_pos = "bottom";	
	}
	
	//echo '<pre>';print_r($number_pos);echo '</pre>';
	
	if ($page_icon == 'null' || !$page_icon) {
	$parent = get_page($post->post_parent);
	$grand_parent = $parent->post_parent;
	$page_icon = get_field('page_icon', $post->post_parent);
		if ($page_icon == 'null' || !$page_icon) {
		$page_icon = get_field('page_icon', $grand_parent);	
		}
	}
?>	

	<?php if ( has_post_thumbnail($img_post) ) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/faqs/feat-img-slim.php'); ?>
	<?php } ?>

	<!-- MAIN CONTENT START -->
	<div class="container">
	
		<div class="content no-pad-top">
<?php ?>

<!-- PAGE TOP SECTION -->
		<main class="page-col-red">
			
			<article class="page">
				
				<div class="entry">
					
					<div class="main-txt">
						<?php the_content(); ?>
					</div>
									
					<div class="rule"></div>
									
				</div>
				
				<section id="faqs-list">
					<h3 class="icon-header"><?php the_title(); ?> for <b>You</b> <i class="fa fa-comments fa-lg"></i></h3>
					<?php foreach ($services_links as $link) { 
					$pg_id = $link['page_link'];
					$pg_title = $link['link_title'];
					$col = get_field('page_colour', $pg_id);
					$icon = get_field('page_icon', $pg_id);
					$sub_pages_args = array (
					'post_type' => 'tlw_faq_cpt',	
					'posts_per_page' => -1,
					'meta_key'	=> 'faq_service_area',
					'meta_value' => $pg_id,
					'orderby'	=> 'title',
					'order'	=> 'ASC'
					);
					$sub_pages = get_posts($sub_pages_args);
					//echo '<pre>';print_r($sub_pages);echo '</pre>';
					?>
						<?php if ($sub_pages) { ?>
						<div class="faq-header faqs-open col-<?php echo $col; ?>">
							<i class="fa <?php echo $icon; ?> fa-lg"></i>
							<?php echo str_replace('<br>', ' ', $pg_title) ; ?>
						</div>
						<div class="faqs-sub-pgs faqs-sub-open">
							<?php foreach ($sub_pages as $sb) { 
							$faq_page_id = get_field('faq_page', $sb->ID);
							?>
							<div class="faq-list-item col-<?php echo $col; ?>">
								<a href="<?php echo get_permalink($sb->ID); ?>"><?php echo get_the_title($faq_page_id); ?></a>
							</div>
							<?php } ?>
						</div>
						<?php } ?>
					<?php } ?>
				
				<div class="rule"></div>
				</section>
				
				
				
				<div class="faq-message text-center">
					<h3 class="txt-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">Can't find an answer to your question?</h3>
					<p><a href="<?php echo get_permalink($contact_us_pg->ID); ?>">Contact us today</a>
					And we will help you in any way we can</p>
				</div>

				
			</article>
			
		
		</main>
					
		</div><!-- CONTENT END -->
		
	</div><!-- MAIN CONTENT CONTAINER END -->
	
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
