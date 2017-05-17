var app = {};
app.limit = 10;
app.currentPage = 1;
app.maxPages = 5;
app.speedAnimation = 500;
app.urlServer = 'http://localhost/tp/chrono-sport/app/';

$(document).ready(function(){

	//mise en cache d'éléments ciblés par jquery
	var $currentPage = $('.pager span.currentPage');
	app.$ul_chrono = $('ul.chrono');
	app.$footer = $('.footer');
	$currentPage.text(app.currentPage);
	$('.pager span.maxPages').text(app.maxPages);

	$('.footer .next').on('click', function(){
		if(app.currentPage < app.maxPages){
			var offset = app.currentPage * app.limit;
			getArticles(offset, app.limit);
			app.currentPage++;
			$currentPage.text(app.currentPage);
		}
	});

	app.$footer.find('.prev').on('click', function(){
		if(app.currentPage > 1){
			app.currentPage--;
			$currentPage.text(app.currentPage);
		
			var positionTop = app.$ul_chrono.position().top;
			var newPosition = positionTop + 300;

			app.$ul_chrono.animate({
				'top' : newPosition
			}, app.speedAnimation);
		}
	});
	getArticles(0,app.limit);
});

function getArticles(offset, limit){
	var url = app.urlServer + 'article-list.php';

	$.ajax({
		url:url,
		method:'GET',
		data:{offset:offset, limit:limit},
		success:function(res){
			var articles = JSON.parse(res);
			if (app.currentPage > 1) {
			
				var positionTop = app.$ul_chrono.position().top;
				var newPosition = positionTop - 300;


				app.$ul_chrono.animate({
					'top': newPosition
				}, app.speedAnimation);
			
				app.$footer.find('.prev').css({
				'background-position': '0 -589px'
				});
			}

			displayArticles(articles);
			
		},
		error:function(res){

		}
	});
}

function displayArticles(articles){
	articles.forEach(function(article){
		var url = app.urlServer + 'article-by-id.php?id=' + article.id;
		var li = '';
		li += '<li>';
		li += '<span class="date">' + article.date + '</span>';
		li += '<a class="articleLink" href="'+article.id+'"><strong>' + article.category + '</strong>';
		li += ' ' + article.title + '</a>';
		li += '</li>';
		$('ul.chrono').append(li);
	});

	$('.articleLink').on('click', function(e){
		e.preventDefault(); //casse le comportement par défaut
		var articleId = $(this).attr('href');

		//ajax
		$.ajax({
			url:app.urlServer + 'article-by-id.php',
			method: 'GET',
			data: {'id':articleId},
			success:function(res){
				//var article = JSON.parse(res);
				displayArticleBody(res);
			},
			error:function(){

			}
		});
	})
}

function displayArticleBody(article){
	$('div#article').html('<p>' + article + '</p>');
}