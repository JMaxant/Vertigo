<?php get_header();
/*
Template Name: Events
*/
// REQUIRES EVENTS MANAGER WP_PLUGIN
?>

<main class="container" id="events">
     <section class="row">
     	<h1>DATES A VENIR</h1>
		<?php
			$args=array('post_type'=>'event', 'post_status'=>'publish', 'posts_per_page'=>-1, 'tag'=>'-residence'); // Tableau principal : affiche tout les évènements à venir, sauf les pièces en résidence
			$headers=array('NOM', 'DATE', 'LIEU', 'VILLE');
			$contents=array('event_name', 'event_start_date','location_id');
			$events=gv_tabEvents($args, $headers, $contents);
			if(!empty($events)){ ?>
				<article class="col-sm-12">
				<?php echo $events; ?>
				</article>
		<?php }
			$args=array('post_type'=>'event', 'post_status'=>'publish', 'posts_per_page'=>-1, 'tag'=>'residence'); // Tableau secondaire : n'affiche que les pièces en résidence
			$headers=array('NOM', 'DATE', 'LIEU', 'VILLE');
			$contents=array('event_name', 'event_start_date','location_id');
			$residence=gv_tabEvents($args, $headers,$contents);
			if(!empty($residence)){?>
				<article class="col-sm-12">
					<h2>RESIDENCES</h2>
				<?php echo $residence; ?>
				</article>
		<?php }
		          $args=array('scope'=>'past'); // Tableau secondaire : n'affiche que les pièces en résidence
		          $headers=array('NOM', 'DATE', 'LIEU', 'VILLE');
		          $contents=array('event_name', 'event_start_date','location_id');
		          $pastEvents=gv_tabEvents($args, $headers,$contents,$class="table col-sm-12 pastEvents");
		          if(!empty($pastEvents)){?>
		          <article class="col-sm-12">
		                   	<h2>Passés</h2>
		               <?php echo $pastEvents; ?>
		          </article>
          <?php } ?>
     </section>
</main>
<?php get_footer();?>
