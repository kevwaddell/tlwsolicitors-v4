<?php 
global $toolkit_active;
$toolkit_title = get_field('hp_toolkit_section_title', 'option');
$toolkit_intro = get_field('hp_toolkit_section_intro', 'option');
$color = get_field('hp_toolkit_section_bg_col', 'option');
$links = get_field('hp_toolkit_links', 'option');
$total_links = count($links);
$links_odd = true;

if ($total_links % 2 == 0) {
$links_odd = false;	
}

if ( empty($toolkit_title) ) {
$toolkit_title = "Toolkit";
}

//echo '<pre class="debug">';print_r($slides);echo '</pre>';
$quick_links[] = ['link_title' => "TLW ".$toolkit_title, 'link_anchor' => 'toolkit-links'];	
?>
<?php if ($toolkit_active) { ?>
<section id="toolkit-section" class="pg-section with-icon-logo bg-col-<?php echo (!empty($color)) ? $color : 'grayDk'; ?>">
	<a name="toolkit-links" id="toolkit-links" class="section-target"></a>
	
	<div class="container">
		<span class="tk-icon fa <?php echo $page_icon; ?> fa-4x"></span>
		<div class="tk-parent-pg-title font-slab-serif caps"><?php bloginfo('name'); ?></div>		
		<div class="tk-pg-title font-slab-serif caps"><?php echo $toolkit_title; ?></div>	
		<div class="tk-pg-intro font-slab-serif"><?php echo $toolkit_intro; ?></div>
		<div class="links-wrapper <?php echo($links_odd) ? "links-odd":"links-even"; ?>">
		<?php if ($links_odd) { ?>
		
			<?php foreach ($links as $link) { 
			$page = get_page($link['page']);
			?>
			<a href="<?php echo get_permalink($link['page']); ?>" class="toolkit-link">
					<i class="fa fa-heartbeat link-icon"></i>
					<?php echo get_the_title($link['page']); ?>
			</a>
			<?php } ?>
			
		<?php } else { ?>
		<div class="row">
			<?php foreach ($links as $link) { 
			$page = get_page($link['page']);
			?>
			<div class="col-xs-6">
				<a href="<?php echo get_permalink($link['page']); ?>" class="toolkit-link">
					<i class="fa fa-heartbeat link-icon"></i>
					<?php echo get_the_title($link['page']); ?>
				</a>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		
		</div>
	</div>
	
	<div class="overlay"></div>
</section>
<?php } ?>