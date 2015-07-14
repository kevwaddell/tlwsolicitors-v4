<?php include (STYLESHEETPATH . '/_/inc/landing-page/head-html.php'); ?>	

<body id="landing-page" <?php body_class($font_size); ?>>
<?php if ($_SERVER['SERVER_NAME']=='www.tlwsolicitors.co.uk') { ?>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PLBR4F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PLBR4F');</script>
<!-- End Google Tag Manager -->
<?php } ?>

<?php if (in_array("page", $active_scripts)) {
$op_script = get_field('on_page_script', $post->ID);	
?>
<?php echo $op_script; ?>
<?php } ?>


<div class="tlw-wrapper">
	<div class="lp-bg-img" style="background-image: url(<?php echo $bg_img_url; ?>)"></div><div class="col-overlay  bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>"></div><div class="striped-overlay"></div>
	
	<!-- HEADER LOGO AND NAVIGATION -->
	<header class="header" role="banner">
	 <?php include (STYLESHEETPATH . '/_/inc/global/col-strip.php'); ?>	

		<div class="header-inner">
			<p class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
		</div>
		
			
		<div class="lp-header bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
			<div class="container">
				<h1 class="text-center"><?php the_title(); ?></h1>
			</div>
		</div>
				
	</header>
		
	<!-- MAIN CONTENT START -->
	<div class="container">
	
	<div class="content">