<?php
/*
Template Name: Workshops
*/
get_header(); ?>
<figure>
     <?php the_post_thumbnail('full', array('class'=>'img-responsive'));?>
</figure>
<section id="workshop" class="container">
     <div class="row">
          <h1><?php the_title();?></h1>
          <?php if (have_posts()){
               while(have_posts()){
                    the_post();
                    the_content();
               }
          } ?>
     </div>
</section>

<?php get_footer(); ?>
