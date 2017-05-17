<?php

	function article_get_all($range){
		$db = mysqli_connect(HOST, USER, PASS, DB);
		$articles = array();
		if($db){
			mysqli_set_charset($db, 'utf8');
			$sql = "SELECT article.id, title, body, date, category.name as category";
			$sql .= " FROM article ";
			$sql .= " JOIN category ON article.category = category.id";
			$sql .= " ORDER BY date DESC ";
			$sql .= " LIMIT ". $range['offset'] . "," . $range['limit'] . "";
			if($result = mysqli_query($db, $sql)){
				while($article = mysqli_fetch_array($result)){
					$date = date_create($article['date']);
					$article['date'] = date_format($date, 'd/m');
					array_push($articles, $article);
				}
				return $articles;
			}
			else{
				return null;
			}
		}
	}

	function article_get_by_id($id){
		$db = mysqli_connect(HOST, USER, PASS, DB);
		$articles = array();
		if($db){
			mysqli_set_charset($db, 'utf8');
			$sql = "SELECT body FROM article";
			$sql .= " WHERE article.id = ". $id;
			if($result = mysqli_query($db, $sql)){
				while($article = mysqli_fetch_array($result)){
					array_push($articles, $article);
				}
				return $articles;
			}
			else{
				return null;
			}
		}
	}


	function article_save(){
		return;
	}
?>