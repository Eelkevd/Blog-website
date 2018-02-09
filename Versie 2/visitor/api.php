<?php

// posts and retrieves blogs

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titleBlog = $_POST["title"];
    $catSports = filter_var ($_POST["cat1"], FILTER_VALIDATE_BOOLEAN); 
    $catNat = filter_var ($_POST["cat2"], FILTER_VALIDATE_BOOLEAN); 
    $catPol = filter_var ($_POST["cat3"], FILTER_VALIDATE_BOOLEAN); 
    $blogText = $_POST["message"];

    $dsn = "mysql:dbname=blog;host=127.0.0.1";
    $user_name = "root";
    $pass_word = "";

    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$sql = "INSERT INTO blog (title, blogText)" .
		"VALUES ('$titleBlog', '$blogText')";
        $connection->exec($sql);

        $last_id = $connection->lastInsertId();

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
	}
	catch(PDOException $e) {
		echo $sql . $e->getMessage();
	}
	$connection = null;

	if(isset($_SERVER['HTTP_REFERER'])){
		$previous = $_SERVER['HTTP_REFERER'];
	}
}

header("Content-Type:application/json");

$verb = $_SERVER['REQUEST_METHOD'];
    if ($verb == 'GET') {
        if (isset($_GET )) {
            $json_response = returnBlogposts();
            echo $json_response;
        } else {
            http_response_code(200);
            
        }
    }

    function returnBlogposts () {
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db = "blog";

    $connection = mysqli_connect($host, $user, $pass, $db);

    $sql = "SELECT blog.ID, blog.title, categories.name, blog.blogText FROM categories INNER JOIN blog_categories ON categories.id = blog_categories.category_id INNER JOIN blog ON blog_categories.blog_id = blog.ID";
    
    $result = $connection->query($sql);

    $answer = array();
    foreach ($result as $row) {
        $answer[] = array($row['ID'], $row['title'], $row['name'], $row['blogText']);
    }
    //echo $answer;
    $json_answer = json_encode($answer);
    return $json_answer;
    $connection = null;
}
?>