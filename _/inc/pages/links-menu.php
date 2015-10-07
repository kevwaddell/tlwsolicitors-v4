<?php if (!empty($links)) { 
	if ($post->post_parent == 0) {
	$p_page_icon = $page_icon;
	} else {
	$p_page_icon = get_field('page_icon', $post->post_parent);	
	}
?>
<div class="links-menu closed">
	<div class="links-menu-inner">
		<div class="container">
			<ul class="list-unstyled">
				
				<li class="link-col-<?php echo $color; ?>">
					<a href="<?php echo get_permalink($post_ID); ?>"><i class="fa <?php echo $p_page_icon; ?> fa-3x"></i><?php echo get_the_title($post_ID); ?></a>
				</li>
				
				<?php foreach ($links as $link) { 
				$clr = get_field('page_colour', $link->ID);
				if (empty($clr)) {
				$clr = 'red';	
				}
				$pg_icon = get_field('page_icon',  $link->ID);
				?>
				<li class="link-col-<?php echo $clr; ?>">
					<a href="<?php echo get_permalink($link->ID); ?>"><i class="fa <?php echo $pg_icon; ?> fa-3x"></i><?php echo get_the_title($link->ID); ?></a>
				</li>
				
				<?php } ?>	
				
			
			</ul>
		</div>
	</div>
	<button class="close-btn"><span class="fa fa-times fa-lg"></span></button>
</div>
<?php } ?>

