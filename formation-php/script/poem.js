var app = {
	urlServer:'http://localhost/formation-php/'
}


$(document).ready(function(){

	loadPoems();

	$('#sendAjax').on('click', function(){

		var message = $('#message').val();

		$.ajax({
			url: app.urlServer + 'poem-add.php',
			method:'POST',
			data:{message : message},
			success: function(res){},
			error: function(){}
		});
	});
	
});

function loadPoems(){
		var url = app.urlServer + 'poem-list.php';
		$.ajax({
			url:url,
			method:'GET',
			success: function(res){
				var poems = JSON.parse(res);
				poems.forEach(function(poem){
					$('body').append("<p>" + poem + "</p>");
				});
				console.log(res);
			},
			error: function(){
				console.log('erreur');

			}
		});
	}
