<footer class="container">
     	<div class="row">
       <?php
       	$custom_logo_id = get_theme_mod( 'custom_logo' );
        	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        	if ( has_custom_logo() ) {
             	echo '<img src="'. esc_url( $logo[0] ) .'">';
	}
	?>
       		<nav id=footer-menu>
         			<ul>
			          <li><a href="#mentions" data-toggle="modal">Mentions légales</a></li>
			          <li><a href="#social" data-toggle="modal">Social networks</a></li>
			          <li><a href="#apropos" data-toggle="modal">A propos</a></li>
         			</ul>
		</nav>
		<div id="mentions" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				 <div class="modal-content">
				  	<div class="modal-header">
					 	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Mentions légales</h4>
					</div>
					<div class="modal-body">
						<p>raison sociale, forme juridique, adresse de l'établissement ou du siège social (et non pas une simple boîte postale), montant du capital social ;
adresse de courrier électronique et numéro de téléphone ;</p>
						<p>nom et adresse de l'autorité ayant délivré l'autorisation d'exercer quand celle-ci est nécessaire
nom du directeur de la publication et coordonnées de l'hébergeur du site (nom, dénomination ou raison sociale, adresse et numéro de téléphone) pour les blogs et les forums ;
pour un site marchand, conditions générales de vente (CGV) : prix (exprimé en euros et TTC), frais et date de livraison, modalité de paiement, service après-vente, droit de rétractation, durée de l'offre, coût de la technique de communication à distance ;
numéro de déclaration simplifiée Cnil, dans le cas de collecte de données sur les clients (non obligatoire, mais recommandé).</p>
					</div>
				</div><!-- /.modal-content -->
			 </div><!-- /.modal-dialog -->
	 	</div><!-- /.modal -->
		<div id="social" class="modal fade" tabindex="-1" role="dialog">
		 	<div class="modal-dialog" role="document">
			  	<div class="modal-content">
				 	<div class="modal-header">
					 	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Social networks</h4>
					</div>
					<div class="modal-body">
					  	<p>Oui, pleins.</p>
						<?php 		    if(function_exists('dynamic_sidebar')){
									    dynamic_sidebar( 'Widgets footer' );
								    }
						?>
					</div>
				</div><!-- /.modal-content -->
			 </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<div id="apropos" class="modal fade" tabindex="-1" role="dialog">
		 	<div class="modal-dialog" role="document">
			  	<div class="modal-content">
				 	<div class="modal-header">
					 	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">A propos</h4>
					</div>
					<div class="modal-body">
					  	<p>Ce site a été réalisé  en 2018 dans le cadre de la formation de Technicien Intégrateur Web, dispensée par Buroscope.</p>
						<p>Il a été réalisé par <a href="mailto:joubrelfrederic@gmail.com">Frédéric Joubrel</a>, <a href="http://www.steven-luu.com">Steven Luu</a>, <a href="http://www.julien-maxant.com">Julien Maxant</a> et <a href="http://thierry.alwaysdata.net">Thierry Nativel</a>.</p>
					</div>
				</div><!-- /.modal-content -->
			 </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
