<?php 
$topics_args = array(
	'hide_empty'               => 0,
	'hierarchical'             => 0,
);
	
$topics = get_categories($topics_args);
$topics_counter = 0;

if (is_category()) {
$cat_id = $cat;
}

//echo '<pre>';print_r($cat);echo '</pre>';
?>
<?php if ($topics) { ?>
<section class="cats-grid wow fadeInLeft">
	<h3 class="icon-header red mag-bot-0"><?php bloginfo('name'); ?> Blog Categories<i class="fa fa-newspaper-o fa-lg"></i></h3>
	
	<ul class="list-unstyled row">
		<?php foreach ($topics as $topic) { 
		$category_id = 	$topic->term_id;
		?>
		<li class="col-xs-3<?php echo ($cat_id && $cat_id == $category_id) ? ' current-cat':''; ?> wow fadeInRight" data-wow-delay="<?php echo $topics_counter; ?>s"><a href="<?php echo get_category_link( $category_id ); ?>" title="Go to: <?php echo get_cat_name($category_id); ?>"><?php echo get_cat_name($category_id); ?></a></li>
		<?php 
		$topics_counter += 0.2;	
			} ?>
	</ul>
	
	<div class="rule"></div>
	
</section>
<?php }  ?>