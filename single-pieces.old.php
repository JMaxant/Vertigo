<?php
get_header(); ?>
<figure>
	<?php the_post_thumbnail( 'headerPieces', array( 'class' => 'img-responsive' )); ?>
</figure>
<section id="pieces" class="container">
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<div class="row">
	<?php
        $thefields=get_field_objects(); //$thefields récupère toutes les données liées aux champs ACF
	if(!empty ($thefields)) { ?>
		<ul class="nav nav-tabs">
		<?php $i=0;
		foreach($thefields as $name => $value) {
			$class='';
			if($i===0){
				$class='class="active"';
			}
			if(!empty($value[value])) { //Créé un tab de navigation avec les infos contenues dans $thefields si le champ n'est pas vide ?>
			<li <?php echo $class ?> >
				<a href="#<?php echo $name ?>" data-toggle="tab"><?php echo $value[label]; ?></a>
			</li>
			<?php
			$i++;
			}
		} ?>
		</ul>
		<div class="tab-content">
			<?php $i=0;
				foreach($thefields as $name => $value) {
					$class=['tab-pane ']; // on définit la classe des div selon le statut de $i
					if($i===0){
						$class[]='active';
					}
					$class=implode(' ', $class);
					if(!empty($value['value'])){ ?>
			<div class="<?php echo $class ?>" id="<?php echo $name ?>" role="tabpanel">
				<article>
						<?php if(is_array($value[value])){
								while(have_rows($name)){
									the_row();
									$img=get_sub_field('img');
									if(count($img) > 3 ){ ?>
										<div class="carousel-pieces">
											<?php foreach($img as $slide) {
												$size='carouselsingle';
												$image=wp_get_attachment_image($slide['id'], $size);?>
												<figure>
													<a class="fancybox image" href=" <?php echo $slide['url']; ?>">
													<?php echo $image; ?>
													</a>
												</figure>
											 <?php  }?>
										</div>
								<?php	} else {
										foreach($img as $image){  ?>
											<figure>
												<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
											</figure>
									<?php	}
									}
									the_sub_field('videos');
								}
						}else if($value[label]==="Dates"){
							if(class_exists('EM_Events')){
								$args=array('post_type'=>'events', 'post_status'=>'publish', 'search'=>get_the_title());
								$events=EM_Events::get($args);
								$ligne='<table class="col-sm-12">';
								foreach($events as $event){
									$ligne.='<tr>';
							                $ligne.='<td>'.formatDate($event->event_start_date).'<br/><em>'.$event->event_attributes["Statut"].'</em></td>';
									$ligne.='<td>'.$event->event_start_time.'</td>';
							                $ligne.='<td>'.$event->event_name.'</td>';
							                $lieu=new EM_Location($event->location_id);
							                $ligne.='<td><a href="'.$lieu->location_attribute['url'].'">'.$lieu->location_name.'</a><br/>'.$lieu->location_address.'</td>';
									$ligne.='<td>'.$lieu->location_town.'</td>';
							                $ligne.='</tr>';
								}
								$ligne.="</table>";
								echo $ligne;
							}
						}else{
							echo $value[value];
					  	}?>
				</article>
			</div>
			<?php
			$i ++;
				};  //fin if(!empty($value['value']))
			};  	 // fin foreach
 		}; //FIN if(!empty)?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
