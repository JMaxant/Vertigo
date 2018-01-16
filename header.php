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
	<nav class="navbar">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <img class="navbar-brand" src="test.svg" alt="Le Groupe Vertigo">
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SPECTACLES <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	          </ul>
	        <li class="active"><a href="#">DATES <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">NOUS</a></li>
	        <li><a href="#">WORKSHOPS</a></li>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">FR</a></li>
	        <li><a href="#">EN</a></li>
	      </ul>
	    </div>
	  </div>
		<div>
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
	<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="1.jpg" alt="...">
	    </div>
	    <div class="item">
	      <img src="2.jpg" alt="...">
	    </div>
	    <div class="item">
	      <img src="3.jpg" alt="...">
	    </div>
	    <div class="item">
	      <img src="4.jpg" alt="...">
	    </div>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
</header>
