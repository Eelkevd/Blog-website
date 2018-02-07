<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titleBlog = $_POST["title"];
    $catSports = filter_var ($_POST["cat1"], FILTER_VALIDATE_BOOLEAN); 
    $catNat = filter_var ($_POST["cat2"], FILTER_VALIDATE_BOOLEAN); 
    $catPol = filter_var ($_POST["cat3"], FILTER_VALIDATE_BOOLEAN); 
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
		$sql = "INSERT INTO blog (title, blogText)" .
		"VALUES ('$titleBlog', '$blogText')";
        $connection->exec($sql);

        /*$sql = "INSERT INTO categories (name)" .
        "VALUES ('$selectedCat')";
		$connection->exec($sql);*/

        $last_id = $connection->lastInsertId();

        echo $last_id;

        echo $catSports;
        echo $catNat;
        echo $catPol;

        if ($catSports) {
                $varSport = "1";

                $sql = "INSERT INTO blog_categories (category_id, blog_id)" .
                "VALUES ('$varSport', '$last_id')";
                $connection->exec($sql);

            } 

        if ($catNat) {
                $varNat = "2";

                $sql = "INSERT INTO blog_categories (category_id, blog_id)" .
                "VALUES ('$varNat', '$last_id')";
                $connection->exec($sql);
            } 

        if ($catPol) {
                $varPol = "3";

                $sql = "INSERT INTO blog_categories (category_id, blog_id)" .
                "VALUES ('$varPol', '$last_id')";
                $connection->exec($sql);
            }

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

if ($_SERVER["REQUEST_METHOD"] === 'GET'){
	$dsn = "mysql:dbname=blog;host=127.0.0.1";
    $user_name = "root";
    $pass_word = "";

    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
    	$sql = 'SELECT * FROM blog';
    	$statement = $connection->query($sql);
    	$result = $statement->fetchall(\PDO::FETCH_ASSOC);


    	$oldBlogText = array(); //stored fetched ids

    	foreach ($result as $row) {
    		//print $row['']
    		$oldBlogText[] = $row;
    	}
    	
        $resultJSON = json_encode($oldBlogText);

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