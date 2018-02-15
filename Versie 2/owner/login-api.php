<?php

session_start();

if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		echo "<script type='text/javascript'>alert('Please fill in a username and a password');</script>"; 
		echo "<script> window.history.go(-1); </script>";
	}
	else {
		$username = $_POST['username'];
		$password = $_POST['password'];

		//echo$username;
		//echo$password;

		include "configMSQLI.php";
		$connection = mysqli_connect($host, $user, $pass, $db);

		$sql = "SELECT * FROM loginadmin WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($connection, $sql);
		$rows = mysqli_num_rows($result);

		//$result = $connection->query($sql);

		if ($rows == 1) {
			//session_start();
			$_SESSION['username'] = $username;
			header("location:blog.php");
		}
		else {
			echo "<script type='text/javascript'>alert('The username and/or password is not correct');</script>"; 
			echo "<script> window.history.go(-1); </script>";
		}
		mysqli_close($connection); // Close Connection
	}
}

?>	