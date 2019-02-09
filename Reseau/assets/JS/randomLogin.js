function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

var caracteres = "abcdefghijklmnopqrsuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$(document).ready(function(){

	$('.random').on('click', function(){
		var randomLogin = "";
		for(var i = 0; i < 15; i++){

			randomLogin += caracteres[getRandomInt(caracteres.length)];
		}
		$('.login').prop('value', randomLogin);
	});
});