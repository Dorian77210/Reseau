var checked = false;
$(document).ready(function(){


	$('#all').on('click', function(){

		checked = !checked;
		if(checked){
			$(this).prop('checked', true);
			$('input:checkbox').prop('checked', true);
			$('input:checkbox').parent('li').css('background', '#7fff1c');
		}
		else{
			$(this).prop('checked', false);
			$('input:checkbox').prop('checked', false);
			$('input:checkbox').parent('li').css('background', '#ffffff');
		}
	});

	$('input:checkbox').on('click', function(){

		var parentLi = $(this).parent('li');
		if($(this).prop('checked')) parentLi.css('background', '#7fff1c');
		else parentLi.css('background', '#ffffff');
	});
});
