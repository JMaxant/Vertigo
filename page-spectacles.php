<?php
/*
Template Name: Spectacles
*/
?>
<?php get_header(); ?>
<main id="spectacles"  class="container">
    	<section class="col-sm-12">
        <?php
        $pieces = new WP_Query(array(
            	'post_type' => 'pieces',
        ));
        if($pieces->have_posts()):?>
        		<div class="grid">
			<div class="grid-sizer"></div> <!--CONTENEUR VIDE UTILISE PAR MASONRY JS-->
	          <?php while($pieces->have_posts()): $pieces->the_post(); ?>
			<div class="grid-item">
		    		<figure class="effect-julia">
					<a href="<?php the_permalink();?>" ><?php the_post_thumbnail('thumbSpectacles');?></a>
					<figcaption>
						<h2><?php the_title(); ?></h2>
						<a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
					</figcaption>
				</figure>
			</div>
		<?php endwhile;?>
		</div>
<?php endif; ?>
	</section>
</main>

<?php get_footer();?>
