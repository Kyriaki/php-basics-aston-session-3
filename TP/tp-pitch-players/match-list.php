<?php 

	include 'config.php';
	include 'match.php';

	$matchs = match_get_all();

	if($matchs) echo json_encode($matchs);

?>