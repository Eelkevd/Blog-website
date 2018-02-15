<?php 



if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $search = $_GET["search"];

    include 'configPDO.php';

    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {

	    $sql = "SELECT blog.ID, blog.title, categories.name, blog.blogText FROM categories INNER JOIN blog_categories ON categories.id = blog_categories.category_id INNER JOIN blog ON blog_categories.blog_id = blog.ID WHERE blog.blogText LIKE '%$search%'";
	    
		$result = $connection->query($sql);

		//$answer = array();
	    foreach ($result as $row) {
			echo "<div id='newPost'>", "<b>", $row['title'], "</b>", "<br />", $row['blogText'], "<br />", "</div>";
		}

		$connection = null;

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