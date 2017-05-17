<?php
	include 'config.php';
	include 'player.php';

	$players = player_get_all();

	if ($players) {
		echo json_encode($players);
	}

?>