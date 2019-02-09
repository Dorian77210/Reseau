$(document).ready(function(){

	$('.password').on('keyup', function(e){

		//on recupere les attributs 
		var span = $('.confirmation');
		var progress = $('.progress');
		var length = $(this).val().length;
		if(length == 0){
			span.text('');
			progress.css({
				'width'		: 		'0%',
				'background': 		'white'
			});
		}
		else if(length <= 4){

			span.text('Mot de passe faible').css('color', '#fb1809');
			progress.css({
				'width' 	: 		'33%',
				'background': 		'#fb1809'
				}

			);
		} 
		else if(length > 4 && length <= 8){

			span.text('Mot de passe moyen').css('color', '#faed14');
			progress.css({
				'width'		: 		'66%',
				'background': 		'#faed14'
			});
		} 
		else if(length > 8){

			span.text('Mot de passe fort').css('color', '#82fa14');
			progress.css({
				'width'		: 		'100%',
				'background': 		'#82fa14'
			});
		}
	});		
});
