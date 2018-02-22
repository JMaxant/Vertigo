<?php
//REQUIRES EVENT MANAGER PLUGIN
get_header();
$post=get_post();
$event=new EM_Event($post->ID);
?>
<main class="container">
     <section class="row">
          <article class="col-sm-12">
               <h1><?= $event->output('#_EVENTNAME'); ?></h1>
               <figure class="float-right"><?= $event->output('#_EVENTIMAGE{400,600}'); ?> </figure>
               <?= $event->output('#_EVENTNOTES'); ?>
               <?= $event->output('#_EVENTDATES'); ?>
          </article>
     </section>
</main>


<?php get_footer(); ?>
