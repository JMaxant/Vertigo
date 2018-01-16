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
<body>
<header>
	<nav>
  				<?php
			wp_nav_menu( array(
				'menu' =>'top-menu',
				'theme_location' => 'primary',
				'depth' => 2,
				'container' => 'div',
				'container_class' => 'navbar-collapse collapse',
				'container_id' => 'navbar',
				'menu_class' => 'nav navbar-nav navbar-right',
				'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
				'walker' => new wp_bootstrap_navwalker()
			));
			 ?>
  		</div>
	</nav>
</header>
