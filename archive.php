<?php
/*
Template Name: Archives
*/
get_header();
$year=intval(date('Y'));
var_dump($year);
?>
<main class="container">
	<section class="row">
		<h1><?php the_title(); ?></h1>
		<?php


			$args=array('scope'=>'past');
			$headers=array('NOM', 'DATE', 'LIEU', 'VILLE');
			$contents=array('event_name', 'event_start_date','location_id');
			$pastEvents=gv_tabEvents($args, $headers,$contents,$class="table col-sm-12 pastEvents");
			if(!empty($pastEvents)){?>
				<article class="col-sm-12">
					<h2>Saison <?php echo $year; ?></h2>
					<?php echo $pastEvents;
			$year--;
		?>
		</article>
<?php } ?>
	</section>
</main>
<?php get_footer(); ?>
