<?php 
/*
Template Name: Contact Us Page
*/
 ?>

<?php get_header(); ?>


<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$color = get_field('page_colour');
$freephone_num = get_field('freephone_num', 'option');
$form = get_field('form');
$active_sections = get_field('active_sections');

if ( has_post_thumbnail() ) {
$img_post = get_the_ID();
}

 ?>	

<main <?php post_class('page-col-red'); ?>>
 	<?php if (in_array("Page banner", $active_sections)) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/contact-us/top-banner-intro.inc'); ?>		
	<?php } ?>
	
	<!-- MAIN TEXT SECTION -->
	<?php include (STYLESHEETPATH . '/_/inc/contact-us/main-content-section.inc'); ?>
	
 	<?php if ($active_sections) { ?>		
	<?php foreach ($active_sections as $section) { ?>
		<?php 
		switch($section){
			case "Form": include (STYLESHEETPATH . '/_/inc/contact-us/form-section.inc');
			break;
			case "Location Map": include (STYLESHEETPATH . '/_/inc/sections/location-section.inc');
			break; 
		}	
		?>
	<?php } ?>
	<?php } ?>	
		
</main>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
