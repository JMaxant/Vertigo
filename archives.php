<?php
/*
Template Name: Archives
*/
get_header();

$date=new DateTime();
$year=intval($date->format('Y'));

$args=array('scope' => 'all', 'order' => 'DESC');
$events=EM_Events::get($args);
if(!empty($events)){
	$tableau='<h2>Saison '.$year.'</h2>';
	$tableau.='<table class=" table col-sm-12 pastEvents">';
	$tableau.='<thead>';
	$tableau.='<tr>';
	$tableau.='<th>NOM</th>';
	$tableau.='<th>DATE</th>';
	$tableau.='<th>LIEU</th>';
	$tableau.='<th>VILLE</th>';
	$tableau.='</tr>';
	$tableau.='</thead>';
	$tableau.='<tbody>';
	foreach($events as $event){
		if(($event->event_start_date < $date->format('Y-m-d')) && ($event->event_start_date > $date->format('Y-01-01'))){ //trie les évènements en ne prenant que ceux qui sont compris entre le 1er janvier de l'année en cours et la date du jour
			$tableau.='<tr>';
			$tableau.='<td><a href="'.get_permalink($event->event_attributes['lien']).'">'.mb_strtoupper($event->event_name).'</a></td>';
			$tableau.='<td>'.formatDate($event->event_start_date).'</td>';
			$lieu= new EM_Location($event->location_id);
			$tableau.='<td>'.mb_strtoupper($lieu->location_name).'</td>';
			$tableau.='<td>'.mb_strtoupper($lieu->location_town).'</td>';
		}
	}
	$tableau.='</tr>';
	$tableau.='</tbody>';
	$tableau.='</table>';
}
?>
          <main>
	          <section class="container">
		          <h1><?php the_title(); ?></h1>
          		<article class="row">
	               	<?php
	               	echo $tableau;
	               	?>
		          </article>
		          <?php
			          $year--;
			          while($year >= 2011){
			                    $args=array('year' => $year, 'order' =>'DESC');
			                    $headers=array('NOM', 'DATE', 'LIEU', 'VILLE');
			                    $contents=array('event_name', 'event_start_date','location_id');
			                    $class='table col-sm-12 pastEvents';
			                    $archives=gv_tabEvents($args, $headers,$contents, $class);
				                    if(!empty($archives)){ ?>
				                              <article class="row">
				                              <h2>Saison <?php echo $year; ?></h2>
				                              <?php
				                                   echo $archives;
				                               ?>
				                              </article>
				                    <?php     }
		                         	$year--;
		 		}
	     			$parent=get_permalink(wp_get_post_parent_id($post_ID));
  	     ?>
				<footer class="row">
				     <p>Retourner à notre <a href="<?= $parent; ?>">Agenda</a><p>
				</footer>
               </section>
          </main>

<?php get_footer(); ?>
