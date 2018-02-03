<?php
/*
Template Name: Nous
*/
get_header(); ?>
<figure>
	<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' )); ?>
</figure>
<section id="nous" class="container">
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<div class="row">
	<?php
        $thefields=get_field_objects();
	   // var_dump($thefields);
	if(!empty ($thefields)) { ?>
		<ul class="nav nav-tabs">
		<?php $i=0;
		foreach($thefields as $name => $value) {
				if(!empty ($value[value])){ ?>
					<li <?php if ($i === 0) {echo 'class="active"' ;} ?> >
						<a href="#<?php echo $name ?>" data-toggle="tab"><?php echo $value[label]; ?></a>
					</li>
			<?php $i++;
				}
			}
		} ?>
		</ul>
		<div class="tab-content">
			<?php if(!empty($thefields)){
				$i=0;
				foreach($thefields as $name => $value) {?>
			<div class="tab-pane<?php if ($i === 0) {echo " "."active"; } ?>" id="<?php echo $name ?>" role="tabpanel">
				<article>
					<?php echo $value[value]; ?>
				</article>
			</div>
			<?php
			$i ++;
			};  	 // fin foreach
 		}; //FIN if(!empty)?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
