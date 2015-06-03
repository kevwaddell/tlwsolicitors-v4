<?php include (STYLESHEETPATH . '/_/inc/global/head-html.php'); ?>	

<body <?php body_class($font_size); ?>>
	
<?php if (in_array("page", $active_scripts)) {
$op_script = get_field('on_page_script', $post->ID);	
?>
<?php echo $op_script; ?>
<?php } ?>

<nav id="side-nav">
	<button id="close-nav" class="btn btn-block"><i class="fa fa-arrow-circle-left fa-3x"></i></button>
	<div class="nav-wrapper">
		<?php wp_nav_menu(array( 
		'container' => 'false', 
		'menu' => 'Main Navigation', 
		'menu_class'  => 'menu clearfix list-unstyled',
		'fallback_cb' => false ) ); 
		?>
	</div>
</nav>


<div class="tlw-wrapper nav-closed">
	
	<!-- HEADER LOGO AND NAVIGATION -->
	<?php include (STYLESHEETPATH . '/_/inc/global/masthead.php'); ?>	
		
	<?php if (!is_front_page() && !is_page('services-for-you') && !is_page_template('page-templates/service-landing-page.php')) { ?>
	<?php include (STYLESHEETPATH . '/_/inc/global/breadcrumbs.php'); ?>	
	<?php }  ?>