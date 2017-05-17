<form action="login.php" method="POST">
	<input type="text" name="username">
	<input type="text" name="password">
	<input type="submit">
</form>

<?php 
	session_start();
	if (isset($_POST['username'])) {
		if ($_SESSION['stored_user']['username'] === $_POST['username'] && $_SESSION['stored_user']['password'] === $_POST['password']) {
			echo "login successful";
		}
	}
?>