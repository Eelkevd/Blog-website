<?php

// php used for retrieving comments from the database

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

	$sql = "SELECT * FROM comments";
	
	$result = $connection->query($sql);

	$answer = array();
	foreach ($result as $row) {
		$answer[] = array($row['id'], $row['comment'], $row['blog_id']);
	}
	
	$json_answer = json_encode($answer);
	return $json_answer;
	$connection = null;
}

?>
