/*Fichier pour javascript custom */
jQuery(document).ready(function(){
	jQuery('.carousel-pieces').slick({
		dots:true,
		infinite:true,
		speed:300,
		slidesToShow:1,
		centerMode:true,
		variableWidth:true,
		autoplay:true,
		autoplaySpeed:4000
	});
	// init Masonry
          var $grid = jQuery('.grid').masonry({
            	itemSelector: '.grid-item',
            	percentPosition: true,
            	columnWidth: '.grid-sizer',
            	gutter:30
          });
          // layout Masonry after each image loads
          $grid.imagesLoaded().progress( function() {
            	$grid.masonry();
	});
			jQuery(document).bind('keyup', function(e) {
			  if (e.keyCode==39) {
				  jQuery('a.carousel-control.right').trigger('click');
			  }   

			  else if(e.keyCode==37){
				  jQuery('a.carousel-control.left').trigger('click');
			  }

			});
			jQuery(document).bind('keyup', function(e) {
			  if (e.keyCode==39) {
				  jQuery('button.slick-next').trigger('click');
			  }   

			  else if(e.keyCode==37){
				  jQuery('button.slick-prev').trigger('click');
			  }

			});
});
