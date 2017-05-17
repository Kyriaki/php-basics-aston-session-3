<?php
	include 'config.php';
	include 'match.php';

	$match = array(
		'place' => $_POST['place'],
		'date' => $_POST['date'],
		'players' => $_POST['players']
	);

	$result = match_save($match);

	echo json_encode($result);
?>