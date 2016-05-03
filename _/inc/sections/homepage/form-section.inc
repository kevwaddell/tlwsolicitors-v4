<?php
$all_forms_active = get_field('all_forms_active', 'option');
$form = get_field('hp_form', 'option');	
$section_title = get_field('hp_form_section_title', 'option');	
if (empty($section_title)) {
$section_title = $form->title;
}
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'request-a-callback'];	
?>
<?php if ($form_active && $all_forms_active) { ?>
<section id="form-section" class="pg-section with-header">
<a name="request-a-callback" id="request-a-callback" class="section-target"></a>
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
		
		<?php gravity_form($form->id, false, true, false, null, true); ?>
	</div>
</section>
<?php } ?>