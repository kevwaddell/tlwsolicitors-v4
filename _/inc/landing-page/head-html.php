<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#">
<head id="www-tlwsolicitors-co-uk" data-template-set="tlw-solicitors-theme">

	<meta charset="<?php bloginfo('charset'); ?>">
	<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
	
	<meta name="viewport" content ="width=device-width,user-scalable=yes" />
	<meta name="format-detection" content="telephone=yes">
	
	<meta name="geo.region" content="GB">
	<meta name="geo.placename" content="North Shields">
	<meta name="geo.position" content="55.009452;-1.490004">
	<meta name="ICBM" content="55.009452, -1.490004">
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if (function_exists('orderStyleJS')) { orderStyleJS( 'start' ); } ?>
	<?php wp_head(); ?>
	
	<?php 
	$color = get_field('page_colour', $post->ID);
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$bg_img = wp_get_attachment_image_src($post_thumbnail_id, 'full' );
	$bg_img_url = $bg_img[0];
	
	//echo '<pre>';print_r($wide_banner_img);echo '</pre>';
	
	if ( isset($_COOKIE['font_size']) ) {
    $font_size = $_COOKIE['font_size'];	
	} else {
	$font_size = "txt-sm";	
	}
	
	
	if ( isset($_GET['gclid']) ) {
	setcookie("gclid",$_GET['gclid'] ,0, '/' );
	}
	?>
	
	<?php 
	$global_scripts = get_field('global_scripts', 'options');	
	if (!empty($global_scripts)) { ?>
	<?php echo $global_scripts; ?>
	<?php } ?>
	
	<?php if (function_exists('orderStyleJS')) { orderStyleJS( 'end' ); } ?>
</head>
