<?php
/*
Template Name: NousT
*/
get_header();
?>
<!-- -->
<section id="nous">
    <div id="a-la-une">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'class' => 'img-responsive') ); } ?>
        <?php // 'thumbnail', array( 'class' => 'img-responsive attachment-post-thumbnail size-post-thumbnail') ?>
    </div>

    <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
        <li role="presentation" class="active nav-item">
            <a href="#compagnie" class="nav-link" data-toggle="tab" role="tab" aria-controls="compagnie">La Compagnie</a>
        </li>
        <li role="presentation" class="nav-item">
            <a href="#contacts" class="nav-link" data-toggle="tab" role="tab" aria-controls="contacts">Contacts</a>
        </li>
        <li role="presentation" class="nav-item">
            <a href="#suivre" class="nav-link" data-toggle="tab" role="tab" aria-controls="suivre">Nous Suivre</a>
        </li>
        <li role="presentation" class="nav-item">
            <a href="#partenaires" class="nav-link" data-toggle="tab" role="tab" aria-controls="partenaires">Partenaires</a>
        </li>
        <li role="presentation" class="nav-item">
            <a href="#doucet" class="nav-link" data-toggle="tab" role="tab" aria-controls="doucet">Guillaume Doucet</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="compagnie" role="tabpanel">
            <?php if( have_rows('compagnie') ):
                while ( have_rows('compagnie') ) : the_row(); ?>
                    <h2><?php the_sub_field('compagnie_titre'); ?></h2>
                    <div><?php the_sub_field('compagnie_texte'); ?></div>
                    <figure>
                        <?php $image = get_sub_field('compagnie_image');
                        if($image) {
                            echo wp_get_attachment_image($image);
                        } ?>
                    </figure>
                <?php endwhile;
            endif; ?>
        </div>
        <div class="tab-pane" id="contacts" role="tabpanel">
            <?php if( have_rows('contacts') ):
                while ( have_rows('contacts') ) : the_row(); ?>
                    <div><?php the_sub_field('contacts_liens'); ?></div>
                    <figure>
                        <?php $image = get_sub_field('contacts_logo');
                        if($image) {
                            echo wp_get_attachment_image($image);
                        } ?>
                    </figure>
                <?php endwhile;
            endif; ?>
        </div>
        <div class="tab-pane" id="suivre" role="tabpanel">
            <?php if( have_rows('suivre') ):
                while ( have_rows('suivre') ) : the_row(); ?>
                    <div><?php the_sub_field('suivre_liens'); ?></div>
                    <figure>
                        <?php
                        $imagefacebook = get_sub_field('suivre_facebook');
                        if($imagefacebook) {
                            ?>
                            <a href="https://fr-fr.facebook.com/legroupe.vertigo/">
                            <?php echo wp_get_attachment_image($imagefacebook); ?>
                            </a>
                            <?php
                        }
                        $imagetwitter = get_sub_field('suivre_twitter');
                        if($imagetwitter) {
                            ?>
                            <a href="https://twitter.com/legroupevertigo?lang=fr">
                            <?php echo wp_get_attachment_image($imagetwitter); ?>
                            </a>
                            <?php
                        }
                        $imageinstagram = get_sub_field('suivre_instagram');
                        if($imageinstagram) {
                            ?>
                            <a href="#">
                            <?php echo wp_get_attachment_image($imageinstagram); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </figure>
                <?php endwhile;
            endif; ?>
        </div>
        <div class="tab-pane" id="partenaires" role="tabpanel">
            <?php if( have_rows('partenaires') ):
                while ( have_rows('partenaires') ) : the_row(); ?>
                    <div><?php the_sub_field('partenaires_texte'); ?></div>
                    <figure>
                        <?php if( have_rows('partenaires_logos') ):
                            while ( have_rows('partenaires_logos') ) : the_row();
                                $image = get_sub_field('partenaires_logo');
                                if($image) {
                                    echo wp_get_attachment_image($image);
                                }
                            endwhile;
                        endif; ?>
                    </figure>
                    <div>
                        <?php if( have_rows('partenaires_bis') ):
                            while ( have_rows('partenaires_bis') ) : the_row(); ?>
                                <div><?php the_sub_field('partenaires_bis_lien'); ?></div>
                                <?php $image = get_sub_field('partenaires_bis_logo');
                                if($image) {
                                    echo wp_get_attachment_image($image);
                                }
                            endwhile;
                        endif; ?>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>
        <div class="tab-pane" id="doucet" role="tabpanel">
            <?php if( have_rows('doucet') ):
                while ( have_rows('doucet') ) : the_row(); ?>
                    <figure>
                        <?php the_sub_field('doucet_legende'); ?>
                        <?php $image = get_sub_field('doucet_photo');
                        if($image) {
                            echo wp_get_attachment_image($image);
                        } ?>
                    </figure>
                    <div>
                        <?php the_sub_field('doucet_texte'); ?>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>

<!-- -->
<?php get_footer(); ?>
