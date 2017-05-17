<?php 
	if (isset($_POST['pseudo'])) {
	 	echo "Merci ". $_POST['pseudo'] ." espèce de gros connard";
	}

	session_start();
	print_r($_FILES);
	$maxSize = 250000;
	$allowedMimes = [
		'image/jpg',
		'image/jpeg',
		'image/png',
		'image/gif',
		'application/pdf'
	];
	$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/files/uploads';



	if(isset($_FILES['myfile'])) {
		$originalName = $_FILES['myfile']['name'];

		if($_FILES['myfile']['size'] > $maxSize){
			echo 'Fichier trop lourd !';
		} elseif (!in_array($_FILES['myfile']['type'], $allowedMimes)) {
			echo 'Type de fichier non autorisé !';
		} elseif (file_exists('$uploadDir '. '/'. '$originalName')) {
			echo 'Fichier déjà existant';
		}
		else {
			move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadDir . '/' . $originalName);
		}
	}
 
?>