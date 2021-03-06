<?php
get_header();
?>
<section id="desktop">
     <div id="carouselDesktop" class="carousel slide carousel-fade" data-ride="carousel">
       <!-- Wrapper for slides -->
       	<div class="carousel-inner" role="listbox">
     		<?php
     		$imgSlide=0; //Utilisée pour mettre classe active sur class item
     		if (have_rows('slider')): //Début condition slider
     			while(have_rows('slider')):the_row(); // début boucle slider
     				$image=get_sub_field('image');
     				$size='full';
     				$class=['item '];				 // définit la classe attribuée à la div du slider en fonction de $imgSlide
     				if($imgSlide === 0){
     					$class[]='active';
     				}
     				$class=implode(' ', $class);
     					?>
         		<div class="<?php echo $class; ?>">
     					<?php
     					if($image){
     						echo wp_get_attachment_image($image, $size);
     					}
     					?>
         		</div>
     		<?php
     					$imgSlide++;
     				endwhile;
      			endif;
     			?>
          </div>
       	<a class="left carousel-control" href="#carouselDesktop" role="button" data-slide="prev">
         		<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
         		<span class="sr-only">Previous</span>
       	</a>
       	<a class="right carousel-control" href="#carouselDesktop" role="button" data-slide="next">
         		<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
         		<span class="sr-only">Next</span>
     	  </a>
     </div>
</section>
<section id="mobile">
     <div id="carouselMobile" class="carousel slide carousel-fade" data-ride="carousel">
       <!-- Wrapper for slides -->
       	<div class="carousel-inner" role="listbox">
     		<?php
     		$imgSlide=0; //Utilisée pour mettre classe active sur class item
     		if (have_rows('sliderMobile')): //Début condition slider
     			while(have_rows('sliderMobile')):the_row(); // début boucle slider
     				$image=get_sub_field('image');
     				$size='full';
     				$class=['item '];				 // définit la classe attribuée à la div du slider en fonction de $imgSlide
     				if($imgSlide === 0){
     					$class[]='active';
     				}
     				$class=implode(' ', $class);
     					?>
         		<div class="<?php echo $class; ?>">
     					<?php
     					if($image){
     						echo wp_get_attachment_image($image, $size);
     					}
     					?>
         		</div>
     		<?php
     					$imgSlide++;
     				endwhile;
      			endif;
     			?>
          </div>
       	<a class="left carousel-control" href="#carouselMobile" role="button" data-slide="prev">
         		<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
         		<span class="sr-only">Previous</span>
       	</a>
       	<a class="right carousel-control" href="#carouselMobile" role="button" data-slide="next">
         		<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
         		<span class="sr-only">Next</span>
     	  </a>
     </div>
</section>
<?php get_footer();?>
