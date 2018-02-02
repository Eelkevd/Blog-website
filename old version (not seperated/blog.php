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

					 	<?php /*

					 		$sql = "SELECT category from blog";
					 		// ....
					 		for ($i = 0; $i < count.($sql); $i++){
					 			$categoryName = $i;

					 			echo "<option>" . $categoryName . "</option>";
					 		}
					 		// loopje door fetch_result
					 		//$waarde = // .... "pietje";	
					 		//echo "<option>" . $waarde . "</option>";
						*/
					 	?>
						 	<option value="none"></option>
							<option value="1">Sports</option>
							<option value="2">Nature</option>
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