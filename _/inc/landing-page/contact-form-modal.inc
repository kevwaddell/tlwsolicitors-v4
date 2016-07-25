<div id="contact-form-modal" class="modal fade modal-col-<?php echo (!empty($color)) ? $color : 'red'; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center font-slab-serif caps"><i class="fa fa-check-square pull-left"></i> Make your claim today</h4>
      </div>
      <div class="modal-body">
		<?php if ($form->is_active == 1) { ?>
		<?php include (STYLESHEETPATH . '/_/inc/global/forms-script-cap-name.php'); ?>
	 	<div class="lp-form lp-form-<?php echo (!empty($color)) ? $color : 'red'; ?>">
	
		 	<?php gravity_form($form->id, false, true, false, array(), true); ?>
			
	 	</div>	
	 	<?php } ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->