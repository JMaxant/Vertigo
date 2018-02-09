<?php get_header();
/*
Template Name: Events
*/
// REQUIRES EVENTS MANAGER WP_PLUGIN
?>

<section class="container" id="events">
     	<div class="row">
          	<h1><?php the_title(); ?></h1>
		<?php ;
          	if (class_exists('EM_Events')) { ?>
	          <div>
	         	<?php
			$args = array('post_type'=>'event', 'post_status'=>'publish', 'posts_per_page'=>-1);
			$cats=EM_Categories::get($args); ?>
			<?php foreach($cats as $key => $value){
				$args=array('post_type'=>'event', 'post_status'=>'publish', 'posts_per_page'=>-1, 'category' => $value ->slug);
				$events=EM_Events::get($args);
				$ligne='<article>';
				$ligne.='<h2>'.$value->name.'</h2>';
				$ligne.='<table class="table">';
				$ligne.='<th>Date</th>';
				$ligne.='<th>Heure</th>';
				$ligne.='<th>Spectacle</th>';
				$ligne.='<th>Lieu</th>';
				$ligne.='<th>Ville</th>';
				foreach($events as $name) {
			                    $ligne.='<tr>';
			                    $ligne.='<td>'.$date=formatDate($name->event_start_date).'<br/><em>'.$attr=$name->event_attributes["Statut"].'</em></td>';
					$ligne.='<td>'.$heure=$name->event_start_time.'</td>';
			                    $ligne.='<td>'.$nom=$name->event_name.'</td>';
			                    $lieu=new EM_Location($name->location_id);
			                    $ligne.='<td><a href="'.$lieu->location_attribute['url'].'">'.$lieu->location_name.'</a><br/>'.$lieu->location_address.'</td>';
					$ligne.='<td>'.$lieu->location_town.'</td>';
			                    $ligne.='</tr>';
	               		};
				$ligne.='</table>';
				$ligne.='</article>';
				echo $ligne;
			}
			?>
          	</div>
<?php       } ?>
	</div>
</section>

<?php get_footer();?>
