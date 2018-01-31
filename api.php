<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = $_POST["key"]; 
    $blogText = $_POST["message"];

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
		$sql = "INSERT INTO blog (blogText)" .
		"VALUES ('$blogText')";
		$connection->exec($sql);
		 echo $blogText ."added to database";
	}
	catch(PDOException $e) {
		echo $sql . $e->getMessage();
	}
	$connection = null;

	if(isset($_SERVER['HTTP_REFERER'])){
		$previous = $_SERVER['HTTP_REFERER'];
	}
}

if ($_SERVER["REQUEST_METHOD"] === 'GET'){
	$dsn = "mysql:dbname=blog;host=127.0.0.1";
    $user_name = "root";
    $pass_word = "";

    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
    	$sql = 'SELECT blogText FROM blog';
    	$statement = $connection->query($sql);
    	$result = $statement->fetchall(\PDO::FETCH_ASSOC);

    	$ids = array(); //stored fetched ids

    	foreach ($result as $row) {
    		//print $row['']
    		$ids[] = $row['blogText'];
    	}
    	$resultJSON = json_encode($ids);

    	echo $resultJSON;
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