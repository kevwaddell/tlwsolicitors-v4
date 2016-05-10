<?php get_template_part( 'parts/headers/header', 'landing-page' ); ?>

<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>	
<?php 
$freephone_num = get_field('freephone_num', 'option');
$form = get_field('form');
$form_active = get_field('form_activated');
$color = get_field('page_colour');
$page_icon = get_field('page_icon');
$hide_title = get_field('hide_title'); 
$how_it_works_active = get_field('hiw_active');
$all_forms_active = get_field('all_forms_active', 'option');
 ?>	

<main id="main-content" class="page-wrapper page-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		 	
 	<article <?php post_class(); ?>>
	 	
	<div class="row">
		 	
		 	<div class="col-xs-8">
					
			 	<div class="entry entry-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
				 	
				 	<?php if ($hide_title != 1) { ?>
					<h2><?php the_title(); ?></h2>
					<?php } ?>
					
					<div class="main-txt">
					<?php the_content(); ?>
					</div>
					
			 	</div>
			
		 	</div>
		 
			 <?php get_template_part( 'parts/sidebars/sidebar', 'landing-page' ); ?>			 	
		 			
	</div>
	
	</article> 	

	
</main>

<div id="contact-form-modal" class="modal fade modal-col-<?php echo (!empty($color)) ? $color : 'red'; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-arrow-circle-down fa-lg"></i> Make your claim today</h4>
      </div>
      <div class="modal-body">
        <?php if ($form_active && $all_forms_active) : ?>
		<?php if ($form->is_active == 1) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/global/forms-script-cap-name.php'); ?>
	 	<div class="lp-form lp-form-<?php echo (!empty($color)) ? $color : 'red'; ?>">
	
		 	<?php gravity_form($form->id, false, true, false, array(), true); ?>
			
	 	</div>	
	 	<?php } ?>
		<?php endif; ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
		
<?php endwhile; ?>
<?php endif; ?>

</div>
<!-- MAIN CONTENT END -->

<?php if (!empty($freephone_num)) { ?>
	<div class="contact-details">
	<?php include (STYLESHEETPATH . '/_/inc/sections/global-telephone-number.inc'); ?>		
	<?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>
	</div>
<?php } ?>

</div>


<?php include (STYLESHEETPATH . '/_/inc/service-page/how-it-works.php'); ?>

<?php get_template_part( 'parts/footers/footer', 'landing-page' ); ?>