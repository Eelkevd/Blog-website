<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_id = $_POST["blogid"];
    $blog_comment = $_POST["comment"];

    //echo($blog_id);
   // echo($blog_comment);

    $dsn = "mysql:dbname=blog;host=127.0.0.1";
    $user_name = "root";
    $pass_word = "";

    //$connection = new mysqli("localhost","root", "", "blog");
    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//
	//echo $connection;

	try {

        $sql = "INSERT INTO comments (comment, blog_id) VALUES ('$blog_comment', $blog_id)";
        $connection->exec($sql);
            
        echo "<script> window.history.go(-2); </script>";
		//echo $blogText ."added to database";
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