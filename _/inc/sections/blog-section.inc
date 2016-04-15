<?php
$section_title = get_field('blog_section_title');	
$quick_links[] = ['link_title' => $section_title, 'link_anchor' => 'recent-blog-articles'];	
?>
<a name="recent-blog-articles" id="recent-blog-articles"></a>
<section id="blog-posts" class="pg-section sub-col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
	<div class="container">
		<h2 class="text-center section-header bg-col-grayDk"><?php echo $section_title; ?></h2>
		<div class="container">
			<div class="row posts-list">
				<div class="col-xs-4 recent-post">
					<time class="article-date">March 29th 2016</time>
					<h3><a href="">Traumatic Head Injury: Guide to Care Options – Part 3</a></h3>
					<a href="" class="view-post-btn">View Article</a>
				</div>
				<div class="col-xs-4 recent-post">
					<time class="article-date">March 29th 2016</time>
					<h3><a href="">Traumatic Head Injury: Guide to Care Options – Part 3</a></h3>
					<a href="" class="view-post-btn">View Article</a>
				</div>
				<div class="col-xs-4 recent-post">
					<time class="article-date">March 29th 2016</time>
					<h3><a href="">Traumatic Head Injury: Guide to Care Options – Part 3</a></h3>
					<a href="" class="view-post-btn">View Article</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="cats-dropdown">

						<select id="cats" class="selectpicker" data-width="100%">
							<option value="0" data-hidden="true">Blog Categories</option>
						</select>
						
					</div>
				</div>
				<div class="col-xs-6">
					<div class="cats-dropdown">
	
						<select id="archive-dd" class="selectpicker" data-width="100%">
							<option value="0" data-hidden="true">Blog Archives</option>
						</select>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>