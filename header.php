<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="container-fluid" id="nav">
	<nav class="row">
		<div class="col-sm-12">
       			<div class="navbar-header">
	         			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topLeft" aria-expanded="false" aria-controls="navbar">
				           <span class="sr-only">Toggle navigation</span>
				           <span class="icon-bar"></span>
				           <span class="icon-bar"></span>
				           <span class="icon-bar"></span>
			         </button>
		     	</div>
	<?php if(function_exists('the_custom_logo')){
    			the_custom_logo();
		};
		wp_nav_menu( array(
			'menu' =>'top-menu',
			'theme_location' => 'primary',
			'depth' => 2,
			'container' => 'div',
			'container_class' => 'navbar navbar-collapse collapse',
			'container_id' => 'topLeft',
			'menu_class' => 'nav navbar-nav navbar-left',
			'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
			'walker' => new wp_bootstrap_navwalker()
		));
		if(function_exists('dynamic_sidebar')){
			dynamic_sidebar( 'Widgets header' );
		}?>
		</div>
	</nav>
</header>
