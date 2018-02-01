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



// CHARGEMENT BACK
function gv_admin_scripts() {
	// wp_enqueue_style('bootstrap-adm-core', get_template_directory_uri().'/css/bootstrap.min.css', array(),GV_VERSION);
}
//FIN FONCTION gv_admin_scripts
add_action('admin_init','gv_admin_scripts' );


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

	// On peut définir ici d'autres options pour notre custom post type

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

	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'pieces', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );  ?>
