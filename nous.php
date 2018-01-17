<?php
/*
Template Name: Nous
*/
get_header();
?>
<!-- -->
<section id="nous">
    <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
        <li role="presentation" class="active nav-item">
            <a href="#compagnie" class="nav-link" data-toggle="tab" role="tab" aria-controls="compagnie">La Compagnie</a>
        </li>
        <li role="presentation" class="nav-item">
            <a href="#suivre" class="nav-link" data-toggle="tab" role="tab" aria-controls="suivre">Nous Suivre</a>
        </li>
        <li role="presentation" class="nav-item">
            <a href="#contacts" class="nav-link" data-toggle="tab" role="tab" aria-controls="contacts">Contacts</a>
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
            <?php the_field('compagnie'); ?>
        </div>
        <div class="tab-pane" id="suivre" role="tabpanel">
            <?php the_field('suivre'); ?>
        </div>
        <div class="tab-pane" id="contacts" role="tabpanel">
            <?php the_field('contacts'); ?>
        </div>
        <div class="tab-pane" id="partenaires" role="tabpanel">
            <?php the_field('partenaires'); ?>
        </div>
        <div class="tab-pane" id="doucet" role="tabpanel">
            <?php the_field('doucet'); ?>
        </div>
    </div>
</section>

<!-- -->
<script>
/*petit code pour les tabs/navs*/
$(function () {
    $('#myTab a:last').tab('show')
})
</script>
<!-- -->

<!-- -->
<?php get_footer(); ?>
