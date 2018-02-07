<?php get_header();
/*
Template Name: Events
*/
// REQUIRES EVENTS MANAGER WP_PLUGIN
?>

<section class="container" id="events">
     <div class="row">
          <h1><?php the_title(); ?></h1>
          <?php $args = array('post_type'=>'event', 'post_status'=>'publish', 'posts_per_page'=>-1, 'location');
          if (class_exists('EM_Events')) {?>
               <div>
               <?php $events=EM_Events::get($args);
               $ligne='<table class="table">';
               $ligne.='<th>Date</th>';
               $ligne.='<th>Spectacle</th>';
               $ligne.='<th>Lieu</th>';
               foreach($events as $name) {
                    $ligne.='<tr>';
                    $ligne.='<td>'.$date=formatDate($name->event_start_date).'<br/>'.$residence=$name->event_attributes["En résidence"].$prod=$name->event_attributes["En production"].'</td>';
		;
                    $ligne.='<td>'.$nom=$name->event_name.'</td>';
                    $lieu=new EM_Location($name->location_id);
                    $ligne.='<td>'.$lieu->location_name.'</td>';
                    $ligne.='</tr>';
               };
               echo $ligne;?>
          </div>
	<?php     }
	?>
	</div>
</section>

<?php get_footer();?>
