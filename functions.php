<?php
/*************CHARGEMENT DES SCRIPTS/CSS****************************/
/*****************Préfixe perso GV = Groupe Vertigo **********************/
define('GV_VERSION','1.0.0');

//CHARGEMENT FRONT
function gv_scripts(){
// CHARGEMENT CSS
	wp_enqueue_style('gv_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), GV_VERSION, 'all' );
	wp_enqueue_style('gv_custom', get_template_directory_uri() . '/style.css', array('gv_bootstrap-core'), GV_VERSION, 'all' );	
// CHARGEMENT JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), GV_VERSION, true);
	wp_enqueue_script('gv_custom_js', get_template_directory_uri().'/js/gv_script.js', array('jquery', 'bootstrap-js'), GV_VERSION, true);
} //Fin fonction gv_scripts

add_action('wp_enqueue_scripts', 'gv_scripts');
/***********TAILLE D'IMAGES PERSONALISEES************************/
if (function_exists( 'add_image_size'  ) {
	add_image_size( 'thumbSpectacles', 400, 400, true );/* Taille personalisées pour les vignettes page_spectacles*/
	add_image_size( 'headerPieces', 1920, 930, true );/* Taille personalisées pour les vignettes page_spectacles*/
}
/************SETUP UTILITAIRES****************/

function gv_setup(){
	// AJOUT IMAGE A LA UNE
	add_theme_support('post-thumbnails');
	// AJOUT BALISE <TITLE>
	add_theme_support('title-tag');
	// RETRAIT N° VERSION WP
	remove_action('wp_head', 'wp_generator');
	 // RETRAIT GUILLEMETS A LA FRANCAISE
	remove_filter('the_content', 'wptexturize');
	// ACTIVE LE NAVWALKER CUSTOM
	require_once('includes/wp_bootstrap_navwalker.php');
	// ACTIVE LA GESTION DES MENUS
	register_nav_menus( array( 'primary' => 'Principal', 'secondary' =>'Secondaire', 'footer' =>'Footer'));
}
/********************AFFICHAGE DATES + CATEGORIES*********************/

function gv_postMeta($date1, $date2, $cat, $tags){
	$chaine='publié le <time class="entry-date" datetime="';
	$chaine.=$date1;
	$chaine.='">';
	$chaine.=$date2;
	$chaine.='</time> dans la catégorie';
	$chaine.=$cat;
	$chaine.= ' avec les étiquettes : '.$tags;

	return $chaine;
}
add_action('after_setup_theme', 'gv_setup');

/*****************MODIF TEXTE EXCERPTS + READ MORE*****************/
function gv_ReadMore($more){
	return '<a class="more-link" href="'.get_permalink().'">'.'En savoir plus'.'</a>';
}
add_filter('excerpt_more', 'gv_ReadMore');

/************************FORMATAGE DATE EVENTS MANAGER***********************/
/*Event Manager sort par défaut les dates en format YYYY/MM/DD, cette fonction a donc pour but de la reformater en JJ-mois-YYYY*/
function formatDate($date){
	$moisChiffre=['01','02','03','04','05','06','07','08','09','10','11','12'];
	$moisLettre=['janvier', 'février', 'mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre'];
	$date=explode('-', $date);
	$moisReplace=$date[1];
	$mois=str_replace($moisChiffre, $moisLettre,$moisReplace);
	$dateFormatee=$date[2].' '.$mois.' '.$date[0];
	return $dateFormatee;
}

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
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'pieces'),

	);
	register_post_type( 'pieces', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );  ?>
