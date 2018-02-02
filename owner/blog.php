<!doctype html>
<html>
	<head>
		<title>The Big Blog</title>
		<link rel="stylesheet" type="text/css" href="stylesheetBlog.css">
		<script src="scripts.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>

	<body>
		<header id="header" align="center"><b>Ye old Blog</b></header>
		<div id="btnGrp" align="center">
			<div id="btnBlogInput" onclick="loadBlogForm()">write blog</div>
			<div id="btnShowBlog" onclick="getOldBlog()">show blogs</div>
		</div>
		<div class="contentElement">
			<div id="positionC">
				<div id="blogPage">
					 <input type="text" name="usrname" placeholder="title" id="usrInput"> <br />
					 <select id=selectorCat>

					 	<?php 
					 	$dsn = "mysql:dbname=blog;host=127.0.0.1";
					    $user_name = "root";
					    $pass_word = "";

					    $connection = new PDO($dsn, $user_name, $pass_word);
					    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					    try{
					    	$sql = 'SELECT name FROM categories';
					    	$statement = $connection->query($sql);
					    	$result = $statement->fetchall(\PDO::FETCH_ASSOC);

					    	$catName = array(); //stored fetched ids

					    	foreach ($result as $row) {
					    		//print $row['']
					    		$catName[] = $row['name'];
					    	}
					    	//resultJSON = json_encode($catName);
					    	//$oldBlog = JSON.parse(blogText);
							
							for ($i = 0; $i < count.($catName); $i++){
					 			$categoryName = $i;

					 			echo "<option>" . $categoryName . "</option>";
					 		}
					 		//
					    	echo $resultJSON;
					    }
					    catch(PDOException $e) {
					    	echo $sql . $e->getMessage();
					    }

					    $connection = null;
					    if(isset($_SERVER['HTTP_REFERER'])){
							$previous = $_SERVER['HTTP_REFERER'];
						}

					 		// loopje door fetch_result
					 		//$waarde = // .... "pietje";	
					 		//echo "<option>" . $waarde . "</option>";
						
					 	?>
						 	<!--<option value="none"></option>
							<option value="sports">Sports</option>
							<option value="nature">Nature</option>-->
						</select> <br />
					 <textarea name="comment" form="blogInput" id="blogText" placeholder="Type your article"></textarea>
					 <div id="btnSubBlog" onclick="submitBlog()" align="center">Submit</div>
				</div>
				<div id="showBlogPage">
					<div id="showUsrname"> </div>
					<div id="showBlogText"></div>
				</div>
			</div>
		</div>
	</body>

</html>