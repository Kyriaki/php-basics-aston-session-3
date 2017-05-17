<?php
	require 'config.php';

	$db = connect();

	if($db){
		$poems = array();
		$sql = "SELECT * FROM poem";
		$result = mysqli_query($db, $sql);
		while ($poem = mysqli_fetch_array($result)) {
			//echo $poem['title'];
			array_push($poems, $poem['title']);
		};
		echo json_encode($poems);
	}

?>