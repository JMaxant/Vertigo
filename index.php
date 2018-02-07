<?php
get_header();
?>
<section id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
  <!-- Wrapper for slides -->
  	<div class="carousel-inner" role="listbox">
		<?php
		$imgSlide=0; //Utilisée pour mettre classe active sur class item
		if (have_rows('slider')): //Début condition slider
			while(have_rows('slider')):the_row(); // début boucle slider
				$image=get_sub_field('image');
				$size='full';
					?>
    		<div class="item <?php if ( $imgSlide ===0 ) { ?>active <?php } ?>">
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
  	<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
    		<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  	</a>
  	<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
    		<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
	</a>
</section>
<?php get_footer(); ?>
