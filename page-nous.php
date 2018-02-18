<?php
/*
Template Name: Nous
*/
get_header();
?>
<main id="nous" class="container">
    <figure id="a-la-une">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'headerPieces', array( 'class' => 'img-responsive') ); } ?>
   </figure>
     <nav class="row">
         <ul class="nav nav-tabs" id="tabNav" role="tablist">
             <li role="presentation" class="active nav-item">
                 <a href="#compagnie" data-toggle="tab" role="tab" aria-controls="compagnie">La Compagnie</a>
             </li>
             <li role="presentation" class="nav-item">
                 <a href="#contacts" data-toggle="tab" role="tab" aria-controls="contacts">Contacts</a>
             </li>
             <li role="presentation" class="nav-item">
                 <a href="#suivre" data-toggle="tab" role="tab" aria-controls="suivre">Nous Suivre</a>
             </li>
             <li role="presentation" class="nav-item">
                 <a href="#partenaires" data-toggle="tab" role="tab" aria-controls="partenaires">Partenaires</a>
             </li>
             <li role="presentation" class="nav-item">
                 <a href="#doucet" data-toggle="tab" role="tab" aria-controls="doucet">Guillaume Doucet</a>
             </li>
         </ul>
    </nav>

    <!-- Tab panes -->
    <section class="tab-content row">
        <article class="tab-pane active fade in" id="compagnie" role="tabpanel">
            <?php if( have_rows('compagnie') ):
                while ( have_rows('compagnie') ) : the_row(); ?>
                    <h2><?php the_sub_field('compagnie_titre'); ?></h2>
                    <div><?php the_sub_field('compagnie_texte'); ?></div>
                    <figure>
                        <?php $image = get_sub_field('compagnie_image');
                                  $size = 'thumbNous';
                        if($image) {
                            echo wp_get_attachment_image($image, $size);
                        } ?>
                    </figure>
                <?php endwhile;
            endif; ?>
        </article>
        <article class="tab-pane fade in" id="contacts" role="tabpanel">
            <?php if( have_rows('contacts') ):
                while ( have_rows('contacts') ) : the_row(); ?>
                    <div><?php the_sub_field('contacts_liens'); ?></div>
                    <figure>
                        <?php $image = get_sub_field('contacts_logo');
                                  $size = 'thumbNous';
                        if($image) {
                            echo wp_get_attachment_image($image, $size);
                        } ?>
                    </figure>
                <?php endwhile;
            endif; ?>
        </article>
        <article class="tab-pane fade in" id="suivre" role="tabpanel">
            <?php if( have_rows('suivre') ):
                while ( have_rows('suivre') ) : the_row(); ?>
                    <div><?php the_sub_field('suivre_liens'); ?></div>
                    <figure>
                        <?php
                        $imagefacebook = get_sub_field('suivre_facebook');
                        $size = 'thumbNous';
                        if($imagefacebook) {
                            ?>
                            <a href="https://fr-fr.facebook.com/legroupe.vertigo/">
                            <?php echo wp_get_attachment_image($imagefacebook, $size); ?>
                            </a>
                            <?php
                        }
                        $imagetwitter = get_sub_field('suivre_twitter');
                        $size = 'thumbNous';
                        if($imagetwitter) {
                            ?>
                            <a href="https://twitter.com/legroupevertigo?lang=fr">
                            <?php echo wp_get_attachment_image($imagetwitter, $size); ?>
                            </a>
                            <?php
                        }
                        $imageinstagram = get_sub_field('suivre_instagram');
                        $size = 'thumbNous';
                        if($imageinstagram) {
                            ?>
                            <a href="#">
                            <?php echo wp_get_attachment_image($imageinstagram, $size); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </figure>
                <?php endwhile;
            endif; ?>
        </article>
        <article class="tab-pane fade in" id="partenaires" role="tabpanel">
            <?php if( have_rows('partenaires') ):
                while ( have_rows('partenaires') ) : the_row(); ?>
                    <div><?php the_sub_field('partenaires_texte'); ?></div>
                    <figure>
                        <?php if( have_rows('partenaires_logos') ):
                            while ( have_rows('partenaires_logos') ) : the_row();
                                $image = get_sub_field('partenaires_logo');
                                $size = 'logoNous';
                                if($image) {
                                    echo wp_get_attachment_image($image, $size);
                                }
                            endwhile;
                        endif; ?>
                    </figure>
                    <div>
                        <?php if( have_rows('partenaires_bis') ):
                            while ( have_rows('partenaires_bis') ) : the_row(); ?>
                                <div><?php the_sub_field('partenaires_bis_lien'); ?></div>
                                <?php $image = get_sub_field('partenaires_bis_logo');
                                          $size = 'logoNous';
                                if($image) {
                                    echo wp_get_attachment_image($image, $size);
                                }
                            endwhile;
                        endif; ?>
                    </div>
                <?php endwhile;
            endif; ?>
        </article>
        <article class="tab-pane fade in" id="doucet" role="tabpanel">
            <?php if( have_rows('doucet') ):
                while ( have_rows('doucet') ) : the_row(); ?>
                    <figure>
                        <?php the_sub_field('doucet_legende'); ?>
                        <?php $image = get_sub_field('doucet_photo');
                                  $size = 'thumbNous';
                        if($image) {
                            echo wp_get_attachment_image($image, $size);
                        } ?>
                    </figure>
                    <div>
                        <?php the_sub_field('doucet_texte'); ?>
                    </div>
                <?php endwhile;
            endif; ?>
       </article>
   </section>
</main>
<?php get_footer(); ?>
