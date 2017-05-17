<?php
	session_start();
	echo $_SESSION['connected_user'];

	echo "<a href='logout.php'>Logout</a>";
?>