<?php
/*
Template Name: Workshops
*/
get_header();
if(!empty(the_post_thumbnail())){ ?>
	<figure class="col-sm-12">
	<?php
     	the_post_thumbnail('headerPieces', array('class'=>'img-responsive'));
	?>
	</figure>
<?php	} ?>
<section id="workshops" class="container">
     <div class="row">
          <?php if(have_posts()){
		while(have_posts()){
			the_post();
			$workshop=get_the_content();
		}
	}?>
	<article class="col-sm-12">
		<?php echo $workshop ?>
	</article>
     </div>
</section>
<?php get_footer(); ?>
