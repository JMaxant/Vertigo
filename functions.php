<?php
/*************CHARGEMENT DES SCRIPTS/CSS****************************/
/*****************Préfixe perso GV = Groupe Vertigo **********************/
define('GV_VERSION','1.0.0');

//CHARGEMENT FRONT
function gv_scripts(){
// CHARGEMENT CSS
	wp_enqueue_style('gv_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), GV_VERSION, 'all' );
	wp_enqueue_style('gv_slick', get_template_directory_uri().'/css/slick.css', array(), GV_VERSION, 'all');
	wp_enqueue_style('gv_slick-theme', get_template_directory_uri().'/css/slick-theme.css', array(), GV_VERSION, 'all');
	wp_enqueue_style('gv_custom', get_template_directory_uri() . '/style.css', array('gv_bootstrap-core'), GV_VERSION, 'all' );

// CHARGEMENT JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), GV_VERSION, true);
	wp_enqueue_script('gv_slick', get_template_directory_uri().'/js/slick.min.js', array('jquery'), GV_VERSION, true);
	wp_enqueue_script( 'gv_masonry', get_template_directory_uri(). '/js/masonry.min.js', array('jquery'), GV_VERSION, true);
	wp_enqueue_script('gv_imagesLoaded', get_template_directory_uri().'/js/imagesLoaded.min.js', array('jquery'), GV_VERSION, true);
	wp_enqueue_script('gv_custom_js', get_template_directory_uri().'/js/gv_script.js', array('jquery', 'bootstrap-js'), GV_VERSION, true);

} //Fin fonction gv_scripts

add_action('wp_enqueue_scripts', 'gv_scripts');
/***********TAILLE D'IMAGES PERSONALISEES************************/
if(function_exists(add_image_size)){
	add_image_size( 'thumbSpectacles', 350, 0, true); /* Taille personalisées pour les vignettes page_spectacles*/
	add_image_size( 'headerPieces', 1920, 900, true); /* Taille personalisées pour les vignettes single_pièces */
	add_image_size('carouselsingle', 300, 200, true); /* Taille personnalisée pour les carousels des single pièces = force la hauteur max à 200px */
	add_image_size('thumbNous', 600, 400, true); /* Taille personnalisée pour les images de la page Nous */
	add_image_size('logoNous', 300, 200, true); /* Taille personnalisée pour les LOGOS Partenaires de la page Nous */
}
/************SETUP UTILITAIRES****************/
function gv_setup(){
	// AJOUT IMAGE A LA UNE
	add_theme_support('post-thumbnails');
	// AJOUT BALISE <TITLE>
	add_theme_support('title-tag');
	// AJOUT LOGO CUSTOM
	add_theme_support('custom-logo', array('height'=>100, 'width' =>400, 'flex-height'=>true, 'flex-width'=>true));
	// RETRAIT N° VERSION WP
	remove_action('wp_head', 'wp_generator');
	 // RETRAIT GUILLEMETS A LA FRANCAISE
	remove_filter('the_content', 'wptexturize');
	// ACTIVE LE NAVWALKER CUSTOM
	require_once('includes/wp_bootstrap_navwalker.php');
	// ACTIVE LA GESTION DES MENUS
	register_nav_menus( array( 'primary' => 'Principal', 'secondary' =>'Secondaire', 'footer' =>'Footer'));
}
add_action('after_setup_theme', 'gv_setup');
/**************SIDEBAR - pour widget Newsletter section NOUS***********/
add_action( 'widgets_init', 'gv_register_sidebars' );

function gv_register_sidebars() {
   	register_sidebar(
	          array(
	        	'name' => ( 'Widgets Newsletter' ),
	        	'description' => ( 'Sidebar créée pour l\'intégration du plugin MailJet' ),
	        	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        	'after_widget' => '</div>',
	        	'before_title' => '<h3 class="widget-title">',
	        	'after_title' => '</h3>'
    		)
	);
}
/************************FORMATAGE DATE EVENTS MANAGER***********************/
/*Event Manager sort par défaut les dates en format YYYY/MM/DD, cette fonction a donc pour but de la reformater en JJ-mois-YYYY*/
function formatDate($date){
	$moisChiffre=['01','02','03','04','05','06','07','08','09','10','11','12'];
	$moisLettre=['JAN', 'FEV', 'MAR','AVR','MAI','JUIN','JUIL','AOÛT','SEPT','OCT','NOV','DEC'];
	$date=explode('-', $date);
	$dateFormatee=$date[2].' '.$moisLettre[($date[1] - 1)].' '.$date[0];
	return $dateFormatee;
}
function formatHeure($heure){
	$heure=explode(':', $heure);
	$heureFormatee=$heure[0].'h'.$heure[1];
	return $heureFormatee;
}
/*Fonction pour la création de tableaux de Dates
*$args= arguments pour la requête EM_Events
*$headers= th du tableau
*$contents= td du tableau
*$class=argument optionnel pour ajouter les classes au tableau (par défaut table col-sm-12)
*$idp=argument optionnel, qui va comparer l'id du post courant à l'id trouvée dans le champ acf lien (qui renvoie de la page Agenda vers la single pièce) pour n'afficher que les posts de cette pièce
*/
function gv_tabEvents($args, $headers, $contents,  $class='table col-sm-12',$idp=null){
	if(class_exists('EM_Events')){
		$events=EM_Events::get($args);
		if(!empty($events)){
			$tableau='<table class="'.$class.'">';
			foreach($headers as $header){
				$tableau.='<th>'.$header.'</th>';
			}
			if($idp){
				$eventsSingle=[];
				foreach($events as $event){
					if($event->event_attributes['lien']==$idp){
						$eventsSingle[]=$event;
					}
				}
				$events=$eventsSingle;
			}
			foreach($events as $event){
				$tableau.='<tr>';
				foreach($contents as $key => $content){
					$horslesmurs='<br/>'.$event->event_attributes['Hors_Les_Murs'];
					switch ($content) {
						case event_start_date:
							$tableau.='<td><p>'.formatDate($event->$content).'</p></td>';
							break;
						case location_id:
							$lieu=new EM_Location($event->$content);
							if(!empty($lieu->location_attribute['url'])){
								$tableau.='<td><p><a href="'.$lieu->location_attribute['url'].'">'.mb_strtoupper($lieu->location_name).'</a>'.$horslesmurs.'</p></td>';
							}else{
								$tableau.='<td><p>'.mb_strtoupper($lieu->location_name).$horslesmurs.'</p></td>';
							}
							$tableau.='<td><p>'.mb_strtoupper($lieu->location_town).'</p></td>';
							break;
						default:
							if(!empty($event->event_attributes['lien'])){
								$tableau.='<td><p><a href="'.get_permalink($event->event_attributes['lien']).'"/>'.mb_strtoupper($event->$content).'</a><br/>'.$event->event_attributes['Statut'].'</p></td>';
							}else{
								$tableau.='<td><p>'.mb_strtoupper($event->$content).'<br/>'.$event->event_attributes["Statut"].'</p</td>';
							break;
							}
					}
				}
				$tableau.='</tr>';
			}
			$tableau.='</table>';
			return $tableau;
		}
	}
};
/*****************CPT******************/
/*pieces*/
function wpm_custom_post_type() {
	$labels = array(
		'name'                => _x( 'Pièces', 'Post Type General Name'),
		'singular_name'       => _x( 'Pièce', 'Post Type Singular Name'),
		'menu_name'           => __( 'Pièces'),
		'all_items'           => __( 'Toutes les pièces'),
		'view_item'           => __( 'Voir les pièces'),
		'add_new_item'        => __( 'Ajouter une nouvelle pièce'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la pièce'),
		'update_item'         => __( 'Modifier la pièce'),
		'search_items'        => __( 'Rechercher une pièce'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);

	$args = array(
		'label'               => __( 'Pièces'),
		'description'         => __( 'Tous sur nos pièces'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/*
		* Différentes options supplémentaires
		*/
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'pieces'),

	);
	register_post_type( 'pieces', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );  ?>
