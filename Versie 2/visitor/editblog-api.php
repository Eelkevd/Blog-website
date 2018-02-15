<?php

// php used for replacing blogtexts (editing)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$blog_id = $_POST['blogid'];
    $blog_text = $_POST["blogtext"];

    include 'configPDO.php';

    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo $blog_id;
    //echo $blog_text;

	try {

        $sql = "UPDATE blog SET blogText = '$blog_text' WHERE blog.ID = '$blog_id'";
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