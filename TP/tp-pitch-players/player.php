<?php

	function player_get_all(){
		$db = mysqli_connect(HOST, USER, PASS, DB);
		$players = array();
		if($db){
			mysqli_set_charset($db, 'utf8');
			$sql = "SELECT * FROM player";
			if($result = mysqli_query($db, $sql)){
				while($player = mysqli_fetch_array($result)){
					array_push($players, $player);
				}
				return $players;
			}
			else{
				return null;
			}
		}
	}
?>