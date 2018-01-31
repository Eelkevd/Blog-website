<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = $_POST["key"]; 
    $blogText = $_POST["message"];

    $dsn = "mysql:dn=blogdb;host=127.0.0.1"
    $user_name = "root";
    $pass_word = "";

    //$connection = new mysqli("localhost","root", "", "blog");
    $connection = new PDO($dsn, $user_name, $pass_word)
	//$content = $userName ." ". $blogText;
	//echo $content;
	try {
		$sql = "INSERT INTO blog (message)" .
		"VALUES ('$blogText')";
		$connection->exec($sql);
		  $blogText ."added to database";
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
}

?>