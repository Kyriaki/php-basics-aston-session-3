<?php session_start();
	$_SESSION['connected_user'] = 'niquetamerehanouna@baisetoi.com';
	$_SESSION['stored_user'] = array('username' => 'sale', 'password' => 'auperie');
?>
<?php include 'includes/datasource.inc.php' ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Template</title>
	</head>
	<body>
		<h1>Template</h1>
		<?php include 'includes/menu.inc.html' ?>
		<!-- <form action="page2.php" method="POST">
			<input type="text" name="pseudo">
			<input type="submit" name="submit">
		</form> -->
		<form action="page2.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="myfile">
			<input type="submit">
		</form>
		<ul>
			<?php foreach ($clients as $client):?>
				<li class="<?php if($client['aBool']) echo 'souin' ?>">
					<a href="#"><?php echo $client['name'] ?></a>
					<?php if ($client['name'] == "part en"): ?>
					<em>djihad</em>
					<div style="display:none">
						je suis caché avec une bombe
					</div>
				<?php endif ?>
				</li>
			<?php endforeach ?>
		</ul>

		<form action="poem.php" method="POST">
			Titre: <input type="text" name="title" placeholder="Titre du poème"><br/>
			Texte: <textarea name="poem" rows="8" cols="80"></textarea>
			<br/>
			Enregistrer dans : 
			<input type="radio" name="saveTo" value="file"> Fichier
			<input type="radio" name="saveTo" value="db"> BDD
			<input type="submit" value="Upload">
		</form>
		<?php include "includes/images.inc.html" ?>
	</body>
</html>