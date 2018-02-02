<?php
/*
Template Name: Spectacles
*/
?>
<?php get_header(); ?>
<div class="container">
    	<div class="row">
        <?php
        $pieces = new WP_Query(array(
            	'post_type' => 'pieces',
        ));
        if($pieces->have_posts()):?>
        <?php while($pieces->have_posts()): $pieces->the_post();?>
    		<figure class="col-sm-4">
			<a href="<?php the_permalink();?>" ><?php the_post_thumbnail('medium');?></a>
			<figcaption>
				<h2><?php the_title(); ?></h2>
				<p><?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>">Voir plus</a>
				</p>
			</figcaption>
		</figure>
        <?php endwhile;?>
<?php endif; ?>
    	</div>
</div>

<?php get_footer();?>
