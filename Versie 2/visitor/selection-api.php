<?php

// php for selecting post by category

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

	$json_answer = json_encode($answer);
	return $json_answer;
	$connection = null;
}

?>