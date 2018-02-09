<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentId = $_GET["commentid"];

    $dsn = "mysql:dbname=blog;host=127.0.0.1";
    $user_name = "root";
    $pass_word = "";

    //$connection = new mysqli("localhost","root", "", "blog");
    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$content = $userName ." ". $blogText;
	//
	//echo $connection;

	try {

		$sql = "DELETE FROM comments WHERE id=$commentId";

	    // use exec() because no results are returned
	    $connection->exec($sql);
	    //echo "Record deleted successfully";
	    echo "<script> window.history.go(-1); </script>";

	}
	catch(PDOException $e) {
		echo $sql . $e->getMessage();
	}
	$connection = null;

	if(isset($_SERVER['HTTP_REFERER'])){
		$previous = $_SERVER['HTTP_REFERER'];
	}
}


?>