/*Fichier pour javascript custom */
jQuery(document).ready(function(){
	jQuery('.carousel-pieces').slick({
		dots:true,
		infinite:true,
		speed:300,
		slidesToShow:1,
		centerMode:true,
		variableWidth:true
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
});
