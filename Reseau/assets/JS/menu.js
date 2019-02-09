var good = false;
$(document).ready(function(){

	$('.menu-mobile').on('click', function(){

		good = !good;
		if(good){

			$(this).css('color', '#da3c42');
			$('nav ul').slideDown("slow");
		}
		else{

			$(this).css('color', '#fff');
			$('nav ul').slideUp("slow");
		}
	});
});