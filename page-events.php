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
			$req=new WP_Query();											 // récupération de l'url de la page des représentations passées pour le lien h3
			$all=$req->query(array('post_type' =>'page', 'posts_per_page' => '-1'));
			$id=get_the_id();
			$links=get_page_children($id,$all);
			foreach($links as $link)
				if($link->post_name==='representations-passees'){
					$archives=$link->guid;
				}
			?>
		<article class="col-sm-12 text-center">
			<h3>Représentations passées</h3>
			<p>Vous pouvez retrouver ici <a href="<?php echo $archives; ?>">l'ensemble de nos tournées précédentes</a>.</p>
		</article>
     </section>
</main>
<?php get_footer();?>
