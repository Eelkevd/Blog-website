<!doctype html>
<html>
	<head>
		<title>The Big Blog</title>
		<link rel="stylesheet" type="text/css" href="stylesheetBlog.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>

	<body>
		<div id="positionC">
				<div id="blogEditPage">
					<h1>Edit your post:</h1>
					
					<form action="editblog-api.php" method="post">
						<textarea name="blogtext" id="blogText"><?php 

							include "configMSQLI.php";
						    $blog_id = $_GET['blogid'];

						    $connection = mysqli_connect($host, $user, $pass, $db);

							$sql = "SELECT blogText FROM blog WHERE blog.ID = $blog_id";
							$result = $connection->query($sql);

							foreach ($result as $row) {
								echo $row['blogText'];
							}

							?></textarea>
						<input type="hidden" name="blogid" id="blogid" value="<?php
							echo $_GET['blogid'];
						?>
						"/><br />
						<input type="submit" value="Confirm"/>
					</form>
					<input type="submit" onclick="goBack()" value="return">
				</div>
			</div>
	</body>
<script>

	function goBack(){
		window.history.go(-1);
		//document.getElementById("showBlogPage").style.display = "block";
	}

</script>

</html>