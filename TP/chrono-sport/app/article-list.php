<?php

	include 'config.php';
	include 'article.php';

	$range = array(
		'offset' => $_GET['offset'],
		'limit' => $_GET['limit']
	);

	$articles = article_get_all($range);

	if($articles){
		echo json_encode($articles);
	}

?>