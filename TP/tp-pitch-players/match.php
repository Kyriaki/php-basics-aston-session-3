<?php

	function match_save($match){
		$db = mysqli_connect(HOST, USER, PASS, DB);

		if($db){
			$sql = mysqli_prepare($db, 'INSERT INTO game (place, date) VALUES (?, ?)');
			if(!$sql) echo mysqli_error();
			mysqli_stmt_bind_param($sql, "ss", $match['place'], $match['date']);
			if(mysqli_stmt_execute($sql)){
				$match_id = mysqli_insert_id($db);
				foreach($match['players'] as $player){
					$coords = serialize($player['coords']);
					$sql = mysqli_prepare($db, 'INSERT INTO game_player (game_id, player_id, coords) VALUES (?, ?, ?)');
					mysqli_stmt_bind_param($sql, "sss", $match_id, $player['id'], $coords);
					mysqli_stmt_execute($sql);
				}
				return "SOUIN";
			} else {
				return "t'es un baisé";
			}
		}
	}

	function match_get_all(){
		$db = mysqli_connect(HOST, USER, PASS, DB);
		$sql = "SELECT *  FROM game ORDER BY date DESC";
		$matchs = array();
		if($result = mysqli_query($db, $sql)){
			while ($match = mysqli_fetch_array($result)) {
				$players = array();
				$sql2 = "SELECT player_id, coords FROM game_player";
				$sql2 .= " WHERE game_id = " . $match['id'];
				if($result2 = mysqli_query($db, $sql2)){
					while ($player = mysqli_fetch_array($result2)) {
						$coords = unserialize($player['coords']);
						$player['coords'] = $coords;
						array_push($players, $player);
					}
				}
				$match['players'] = $players;
				array_push($matchs,$match);
			}
		return $matchs;
		} else {
			return "t un naz";
		}
		mysqli_close($db);
	}

?>