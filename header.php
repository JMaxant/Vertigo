<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="witdh=device-width, initial-scale=1">
	<?php if(is_home()): ?>
		<meta name="description" content="Lorem ipsum dolor" />
	<?php endif;?>
	<?php if(is_front_page()): ?>
		<meta name="description" content="Lorem ipsum dolor" />
	<?php endif;?>
	<?php if(is_front_page() && is_page()): ?>
		<meta name="description" content="Lorem ipsum dolor" />
	<?php endif;?>
	<?php if(is_single()): ?>
		<meta name="description" content="Lorem ipsum dolor" />
	<?php endif;?>
	<?php if(is_page()): ?>
		<meta name="description" content="Lorem ipsum dolor" />
	<?php endif;?>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="nav">
	<nav>
		<div class="container-fluid">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topLeft" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
       </div>
			 <?php if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo(); }
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
		));?>
		</div>
	</nav>
</header>
