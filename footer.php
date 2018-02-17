<footer class="container">
     <div class="row">
       <?php
       $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) {
             echo '<img src="'. esc_url( $logo[0] ) .'">';
        } else {
             echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
        }
       ?>
       <nav id=footer-menu>
         <ul>
           <li><a href="#">Mentions légales</a></li>
           <li><a href="#">Social networks</a></li>
           <li><a href="#">A propos</a></li>
         </ul>
     </div>
</footer>
<?php wp_footer(); ?>
</body>
