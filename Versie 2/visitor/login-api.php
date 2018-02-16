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

		include "configMSQLI.php";
		$connection = mysqli_connect($host, $user, $pass, $db);

		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		$sql = "SELECT username, password FROM registervisitor WHERE username = '$username'";
		//$result = mysqli_query($connection, $sql);
		$result = mysqli_query($connection, $sql);
		//$rows = mysqli_num_rows($result);

		$count = mysqli_num_rows($result);

		//$result = $connection->query($sql);
		//$hashP = $rows['password'];

		//$hashP = "";

		while($row = $result->fetch_assoc()) { 
			$hashP = $row['password'];
			//echo $hashP;

			if ($count == 1 && password_verify ($password , $hashP )) {
				session_start();
				$_SESSION['username'] = $username;
				header("location:blogreg.php");
			} 

			else {
				echo "<script type='text/javascript'>alert('The username and/or password is not correct');</script>"; 
				echo "<script> window.history.go(-1); </script>";
			}

		}

		
		mysqli_close($connection); // Close Connection
	}
}

?>	