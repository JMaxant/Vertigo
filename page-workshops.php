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
          <?php if(have_rows('contenu')){
               while(have_rows('contenu')){
                    the_row();
                    $image=get_sub_field('img');
                    ?>
                    <article class="content col-md-12">
                         <figure class="col-sm-12 col-md-4">
                              <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']?>"/>
                         </figure>
                         <div class="col-sm-12 col-md-8"><?php the_sub_field('txt'); ?></div>
                    </article>
               <?php  } // fin while
          } // fin if
?>
     </div>
</section>

<?php ?>
<?php get_footer(); ?>
