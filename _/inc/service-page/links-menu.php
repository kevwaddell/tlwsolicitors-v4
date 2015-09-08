<?php if (!empty($links)) { ?>

<div class="links-menu closed">
	<div class="links-menu-inner">
		<div class="container">
			<ul class="list-unstyled row">
				
				<?php foreach ($links as $link) { 
				$pg = get_page($link['page_link']);
				$related_pages = get_field('page_links', $link['page_link']);
				$clr = get_field('page_colour', $link['page_link']);
				$pg_icon = get_field('page_icon', $link['page_link']);
				
				//Load child pages for parent page
				$child_args = array(
				'sort_column' => 'menu_order',
				'parent'	=> $link['page_link']
				); 
				$children = get_pages($child_args);
				?>
				<li class="col-xs-12 link-col-<?php echo $clr; ?><?php echo (empty($children)) ? '':' with-children closed'; ?>">
					<a href="<?php echo get_permalink($pg->ID); ?>"<?php echo (empty($children)) ? '':' class="dropdown-link"'; ?>><i class="fa <?php echo $pg_icon; ?> fa-3x"></i><?php echo get_the_title($pg->ID); ?></a>
					<?php if (!empty($children) || !empty($related_pages)) { ?>
						<ul class="list-unstyled children row"> 
							<li class="col-xs-4"><a href="<?php echo get_permalink($pg->ID); ?>">Overview</a></li>
							<?php if ($related_pages) { ?>
								<?php foreach ($related_pages as $rel_pg) { ?>
								<li class="col-xs-4"><a href="<?php echo get_permalink($rel_pg['page']->ID); ?>"><?php echo $rel_pg['link_title']; ?></a></li>
								<?php } ?>
							<?php } ?>
							<?php foreach ($children as $child) { ?>
							<li class="col-xs-4"><a href="<?php echo get_permalink($child->ID); ?>"><?php echo get_the_title($child->ID); ?></a></li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>
				
				<?php } ?>	
				
			
			</ul>
		</div>
	</div>
	<button class="close-btn"><span class="fa fa-times fa-lg"></span></button>
</div>
<?php } ?>

