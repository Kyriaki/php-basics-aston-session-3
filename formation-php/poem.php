<?php
	require 'config.php';

	if (isset($_POST['poem']) && isset($_POST['saveTo'])) {
		if ($_POST['saveTo'] == 'file') {
			writeToFile();
		}
		if ($_POST['saveTo'] == 'db') {
			writeToDB();
		}
	}

	function writeToFile()
	{
		$file = fopen('uploads/poem_' . date("mdY_His") . '.txt','a+');

		fseek($file, 0);
		fputs($file, $_POST['poem']);

		fclose($file);
	}
	function writeToDB()
	{
		$db = connect();
		if($db){
			$title = $_POST['title'];
			$text = $_POST['poem'];

			$sql = "INSERT INTO poem (title, text) VALUES ('$title', '$text')";
			$result = mysqli_query($db, $sql);
			if($result){
				echo "gg";
			}
			else{
				echo "bg";
			}
		}
	}

?>