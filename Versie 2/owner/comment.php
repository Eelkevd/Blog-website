<?php

// php for posting comments 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_id = $_POST["blogid"];
    $blog_comment = $_POST["comment"];

    include 'configPDO.php';
    
    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {

        $sql = "INSERT INTO comments (comment, blog_id) VALUES ('$blog_comment', $blog_id)";
        $connection->exec($sql);
            
        echo "<script> window.history.go(-2); </script>";
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