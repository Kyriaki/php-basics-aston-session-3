<?php 	
	include 'config.php';
	include 'article.php';

	$id = $_GET['id'];

	$articles = article_get_by_id($id);

	if($articles){
		echo json_encode($articles);
	}

?>