<nav id="top-nav" class="nav-closed">
	<div class="nav-wrapper">
		<button id="close-nav" class="btn no-rounded"><i class="fa fa-times fa-2x"></i></button>
		<?php wp_nav_menu(array( 
		'container' => 'false', 
		'menu' => 'Main Navigation', 
		'menu_class'  => 'menu clearfix list-unstyled',
		'fallback_cb' => false ) ); 
		?>
	</div>
</nav>