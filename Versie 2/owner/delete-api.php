<?php

//php for deleting comments, only blogger/owner has this permission

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentId = $_GET["commentid"];

    $dsn = "mysql:dbname=blog;host=127.0.0.1";
    $user_name = "root";
    $pass_word = "";

    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {

		$sql = "DELETE FROM comments WHERE id=$commentId";

	    $connection->exec($sql);
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