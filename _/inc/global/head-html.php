<!-- Microdata markup added by Google Structured Data Markup Helper. -->
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head id="www-tlwsolicitors-co-uk" data-template-set="tlw-solicitors-theme">
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
	
	<meta name="viewport" content ="width=device-width,user-scalable=yes" />
	<meta name="format-detection" content="telephone=yes">
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	
	<!--[if IE]>
	<style type="text/css">
	
		.nav-overlay {
		width: auto !important;
		}
		
	</style>
	<![endif]-->
	
	<?php 
	$url = explode('/',$_SERVER['REQUEST_URI']);
	global $post;
	$global_scripts = get_field('global_scripts', 'options');
	
	if ( isset($_COOKIE['font_size']) ) {
    $font_size = $_COOKIE['font_size'];	
	} else {
	$font_size = "txt-sm";	
	}
	
	if ( isset($_GET['src']) && $_GET['src'] == "mis-sold-solar-co-uk" ) {
	setcookie("src",$_GET['src'] , strtotime( '+6 months' ), "/financial-mis-selling/solar-panel-mis-selling" );
	}
	?>
	
	<?php if (!empty($global_scripts)) { ?>
	<?php echo $global_scripts; ?>
	<?php } ?>
</head>