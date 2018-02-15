<?php

// include database login data
include "configMSQLI.php";
$connection = mysqli_connect($host, $user, $pass, $db);

session_start();// Starting Session

// Storing Session
$user_check = $_SESSION['username'];

// SQL Query To Fetch Complete Information Of User
$sql = "SELECT username FROM loginadmin WHERE username = '$user_check'";

$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$login_session = $row['username'];

if(!isset($login_session)){
	mysqli_close($connection); // Closing Connection
	header('Location: login.php'); // Redirecting To Home Page
}

?>