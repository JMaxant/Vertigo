<?php get_header();
$url=home_url();
?>
<section id="notFound" class="container">
     <main class="row">
          <h1 class="text-center">Erreur 404</h1>
          <p class="text-center">La page demandée n'a pas pu être trouvée. Nous vous invitons à <a href="<?php echo esc_url($url);?>">retourner à l'accueil</a> !</p>
     </main>
</section>
<?php get_footer(); ?>
