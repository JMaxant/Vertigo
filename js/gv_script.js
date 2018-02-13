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
});
