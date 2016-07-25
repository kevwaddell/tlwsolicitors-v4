<?php include (STYLESHEETPATH . '/_/inc/landing-page/head-html.php'); 
	
$body_classes = array();	

if ( !isset($_GET['gsdm']) ) {
array_push($body_classes, 'loading');
}		
?>	

<body id="landing-page" <?php body_class($body_classes); ?>>
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

<?php 
$color = get_field('page_colour', $post->ID);
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$bg_img = wp_get_attachment_image_src($post_thumbnail_id, 'full' );
$bg_img_url = $bg_img[0];
$tag_line = get_field('tag_line', 'options');
?>
	
<div class="tlw-wrapper">
	<div class="lp-bg-img" style="background-image: url(<?php echo $bg_img_url; ?>)"></div>
	<div class="col-overlay"></div>
	<div class="striped-overlay"></div>
	
	<!-- HEADER LOGO AND NAVIGATION -->
	<header class="header abs-header" role="banner">

		<div class="header-inner">
			<div class="container">
				<div class="row">
					<div class="col-xs-4">
						<span class="tag-line"><?php echo $tag_line; ?></span>
					</div>
					<div class="col-xs-4">
						<p class="text-hide logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
					</div>
					<div class="col-xs-4">
					<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
					</div>
				</div>
			</div>
		</div>
		
			
		<div class="lp-header bg-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
			<div class="container">
				<h1 class="text-center"><?php the_title(); ?></h1>
			</div>
		</div>
				
	</header>
		
	<!-- MAIN CONTENT START -->
	<div class="container">