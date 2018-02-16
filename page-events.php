<?php get_header();
/*
Template Name: Events
*/
// REQUIRES EVENTS MANAGER WP_PLUGIN
?>

<section class="container" id="events">
     	<div class="row">
          	<h1>DATES A VENIR</h1>
		<?php
			$args=array('post_type'=>'event', 'post_status'=>'publish', 'posts_per_page'=>-1);
			$headers=array('NOM', 'DATE', 'LIEU', 'VILLE');
			$contents=array('event_name', 'event_start_date','location_id');
			$events=gv_tabEvents($args, $headers, $contents);
			if(!empty($events)){ ?>
				<article class="col-sm-12">
				<?php echo $events; ?>
				</article>
		<?php	}
			$args=array('post_type'=>'event', 'post_status'=>'publish', 'posts_per_page'=>-1, 'tag'=>'residence');
			$headers=array('NOM', 'DATE', 'LIEU', 'VILLE');
			$contents=array('event_name', 'event_start_date','location_id');
			$residence=gv_tabEvents($args, $headers,$contents);
			if(!empty($residence)){?>
				<article class="col-sm-12">
					<h2>RESIDENCES</h2>
				<?php echo $residence; ?>
				</article>
		<?php } ?>
	</div>
</section>
<?php get_footer();?>
