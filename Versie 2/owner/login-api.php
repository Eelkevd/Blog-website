<?php

session_start();

if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or password is invalid :(";
	}
	else {
		$username = $_POST['username'];
		$password = $_POST['password'];

		//echo$username;
		//echo$password;

		include "configMSQLI.php";
		$connection = mysqli_connect($host, $user, $pass, $db);

		$sql = "SELECT * FROM loginadmin WHERE username = '$username' AND password = '$password'";
		$result = msqli_query($connection, $sql);
		$rows = msqli_num_rows($result);

		//$result = $connection->query($sql);

		if ($rows == 1) {
			session_start();
			$_SESSION['username'] = $username;
			header("location:blog.php");
		}
		else {
			echo "wrong username or password";
		}
		mysql_close($connection); // Closing Connection
	}
}

?>	