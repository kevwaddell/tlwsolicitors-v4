<section class="toolkit-banner fixed-bg" style="background-image: url('http://tlwsolicitors.dev/wp-content/uploads/2015/11/serious-injury.jpg')">
				
	<div class="tk-title-strip col-<?php echo (!empty($color)) ? $color : 'red'; ?>">
		<div class="container text-center">
			<?php echo get_the_title($post->post_parent); ?>
		</div>
	</div>
	
	<div class="tk-banner-txt">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</div>

	<div class="bg-lines col-<?php echo (!empty($color)) ? $color : 'red'; ?>"></div>
	<div class="top-drk-grad"></div>
	
</section>