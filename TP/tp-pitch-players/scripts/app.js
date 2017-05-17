var app = {
	urlServer:'http://localhost/tp/tp-pitch-players/',
	availablePlayers: null,
	currentDraggedPlayer: null,
	currentDraggedPlayerId: null,
	pitchBoundaries:{
		left:[120, 800],
		top:[0,500]
	},
	selectedPlayers : [],
	savedMatchs: []
};

$(document).ready(function(){
	app.$place = $('#place');
	app.$date = $('#date');

	$('#saveMatch').on('click',saveMatch);

	getPlayers();
	getMatchs();
});


function getPlayers(){
	$.get(app.urlServer + 'player-list.php').then(function(res){
		app.availablePlayers = JSON.parse(res);
		displayPlayers();
	});
}

function displayPlayers(){
	var i = 0;
	app.availablePlayers.forEach(function(player){
		var top = 30*i;
		i++;

		player.coords = {left: 0, top:top};
		$('div#players').append(
			'<div style="top:'+player.coords.top+'px" id="'+player.id+'" class="player">'+player.lastname+'</div>'
		);

		$('.player').draggable({
			stop:stopDrag
		});
	});
}

function stopDrag(){
	app.currentDraggedPlayer = $(this);
	app.currentDraggedPlayerId = $(this).attr('id');
	var position = app.currentDraggedPlayer.position();
	var coords = {
		'left': parseInt(position.left),
		'top': parseInt(position.top)
	}

	app.currentDraggedPlayer
		.html('top:'+ coords.top+ ';left:'+ coords.left);

	isOverPitch(coords);
}

function isOverPitch(coords){

	var isOkLeft = coords.left > app.pitchBoundaries.left[0] && coords.left < app.pitchBoundaries.left[1];
	var isOkTop = coords.top > app.pitchBoundaries.top[0] && coords.top < app.pitchBoundaries.top[1];

	if(isOkTop && isOkLeft){
		app.currentDraggedPlayer.addClass('good');
		if(!isSelected(app.currentDraggedPlayerId)){
			var player = {
				id: app.currentDraggedPlayerId,
				coords:coords
			};
			app.selectedPlayers.push(player);	
		}
	}else{
		app.currentDraggedPlayer.removeClass('good');
		removePlayer(app.currentDraggedPlayerId);
	}

}

function isSelected(playerId){
	for(var i=0; i < app.selectedPlayers.length; i++){
		if(app.selectedPlayers[i].id === playerId) return true;
	}
	return false;
}

function removePlayer(playerId){
	for (var i = 0; i < app.selectedPlayers.length; i++) {
		if(app.selectedPlayers[i].id === playerId){
			app.selectedPlayers.splice(i,1);
			return true;
		}
	}
	return false;

}

function saveMatch(){

	var match = {
		place:app.$place.val(),
		date:app.$date.val(),
		players:app.selectedPlayers
	};
	console.log(match);

	$.ajax({
		url: app.urlServer + 'match-save.php',
		method: 'POST',
		data: match,
		success:function(res){
			console.log(res);
		},
		error:function(res){

		}
	});
}

function getMatchs(){
	$.get(app.urlServer + 'match-list.php').then(function(res){
		app.savedMatchs = JSON.parse(res);
		displayMatchs(app.savedMatchs);
	});
}

function displayMatchs(matchs){
	matchs.forEach(function(match){
		var li = '';
		li += '<li>'+match.place+', '+match.date;
		li +=' <span id="'+match.id+'" class="compo">Compo</span>'
		li += '</li>';
		$('ul#savedMatchs').append(li);
	});

	$('.compo').on('click', function(){
		var matchId = $(this).attr('id');
		console.log(matchId);
		var players = getPlayersFromMatch(matchId);
		console.log(players);
		putPlayersOnPitch(players);
	});

}

function getPlayersFromMatch(matchId){
	for (var i = 0; i < app.savedMatchs.length; i++) {
		if(app.savedMatchs[i].id === matchId){
			return app.savedMatchs[i].players;
		}
		
	}
	return false;
}

function putPlayersOnPitch(players){
	resetPosition();
	for (var i = 0; i < players.length; i++) {
		for (var j = 0; j < app.availablePlayers.length; j++) {
			if (app.availablePlayers[j].id === players[i].player_id){
				var left = parseInt(players[i].coords.left);
				var top = parseInt(players[i].coords.top);
				$('#players').find('div#'+players[i].player_id).animate({
					left: left, 
					top: top
				}, 250);
			}
		}
	}
}

function resetPosition(){
	app.availablePlayers.forEach(function(player){
		$('#players').find('div#'+player.id).animate({
			left:player.coords.left,
			top:player.coords.top
		}, 250);
	});
}