<?php if ($download_active) { 
$extra_txt = get_field('download_extra_txt');	
$btn_title = get_field('btn_title');
$file_type = get_field('file_type');

if ($file_type === "file") {
$file = get_field('download_file');		
}

if ($file_type === "img") {
$img_data = get_field('download_img');		
$img = $img_data['sizes']['large'];
//echo '<pre>';print_r($img);echo '</pre>';
}
?>

<button id="booklet-download-btn" class="btn btn-default btn-block icon-btn icon-btn-lg btn-col-<?php echo (!empty($color)) ? $color : 'red'; ?>"><?php echo $btn_title; ?><i class="fa fa-arrow-circle-down fa-lg"></i></button>
<section id="booklet-download" class="form-closed">
	<div class="form-wrap">
		<div class="contact-form">
			<div class="gform_heading" style="margin-bottom: 20px;">
              <?php echo $extra_txt; ?>
            </div>
			<?php gravity_form(20, false, false, false, false, true); ?>
			<div id="hidden-download" class="hidden">
				
				<?php if ($file_type === "file") { ?>
				<a href="<?php echo $file; ?>" target="_blank" id="download-booklet-btn" class="icon-btn btn btn-default btn-block big-btn caps download-btn"><?php echo $$btn_title; ?></a>
				<?php } ?>
				
				<?php if ($file_type === "img") { ?>
				<img src="<?php echo $img; ?>" class="img-responsive">
				<?php } ?>
				
			</div>

		</div>
	</div>
</section>
<?php } ?>