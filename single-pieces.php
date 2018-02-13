<?php
/*
Template Name: Pièces
Template Post Type: post, pieces
*/
get_header(); ?>
<figure>
	<?php the_post_thumbnail( 'headerPieces', array( 'class' => 'img-responsive' )); ?>
</figure>
<header>
    	<h1><?php the_title(); ?></h1>
</header>
<section id="pieces" class="container">
	<div class="row">
	<?php
        $thefields=get_field_objects();
	if(!empty ($thefields)) { ?>
		<ul class="nav nav-tabs">
		<?php $i=0;
		foreach($thefields as $name => $value) {
			if(!empty($value[value])) {?>
			<li <?php if ($i === 0) {echo 'class="active"' ;} ?> >
				<a href="#<?php echo $name ?>" data-toggle="tab"><?php echo $value[label]; ?></a>
			</li>
			<?php $i++;
			}
		} ?>
		</ul>
		<div class="tab-content">
			<?php $i=0;
				foreach($thefields as $name => $value) {
					if(!empty($value['value'])){ ?>
			<div class="tab-pane<?php if ($i === 0) {echo " "."active"; } ?>" id="<?php echo $name ?>" role="tabpanel">
				<article>
						<?php if(is_array($value[value])){
							if(have_rows($name)){
								while(have_rows($name)){
									the_row();
									the_sub_field('videos');
									$img=get_sub_field('img');
									if(count($img) > 3 ){ ?>
										<div class="carousel-pieces">
											<?php foreach($img as $slide) {
												$size='medium';
												$image=wp_get_attachment_image($slide['id'], $size);?>
												<figure>
													<?php echo $image; ?>
												</figure>
											 <?php  }?>
										</div>
								<?php	} else {
										foreach($img as $image){  ?>
											<figure>
												<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
											</figure>
									<?php	}
									}
								}
							} 					 
					} else {
						echo $value[value];
					  	}?>
				</article>
			</div>
			<?php
			$i ++;
				};  //fin if(!empty($value['value']))
			};  	 // fin foreach
 		}; //FIN if(!empty)?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
