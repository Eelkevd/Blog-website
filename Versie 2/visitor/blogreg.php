<?php
	include "session.php";
	session_status ();
?>

<!doctype html>
<html>
	<head>
		<title>The Big Blog</title>
		<link rel="stylesheet" type="text/css" href="stylesheetBlog.css">
		<script src="scriptsreg.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>

	<body>
		<header id="header" align="center"><b>Ye old Blog</b></header>
		<p id="welcomeUser" align="center">Welcome: <?php echo $login_session; ?></p>

		<div id="btnGrp" align="center">
			<div id="btnShowBlog" onclick="getOldBlog()">show blogs</div>
			<div id="btnLogout" onclick="window.location.href = 'logout.php'">log out</div>
		</div>

		<div class="contentElement">
			<div id="positionC">

				<div id="blogPage">
					 <input type="text" name="usrname" placeholder="title" id="usrInput"> <br />
					 <div id="categoryBoxes">
						<input type="checkbox" id="sportsCheckB" name="subscribe" value="sports">
	    				<label for="subscribeNews">Sports</label>
	    				<input type="checkbox" id="natureCheckB" name="subscribe" value="nature">
	    				<label for="subscribeNews">Nature</label>
	    				<input type="checkbox" id="politicsCheckB" name="subscribe" value="politics">
	    				<label for="subscribeNews">Politics</label>
					 </div>
					 <textarea name="comment" form="blogInput" id="blogText" placeholder="Type your article"></textarea>
					 <div id="btnSubBlog" onclick="submitBlog()" align="center">Submit</div>
				</div>

				<div id="showBlogPage">
					<div>
						<h3 class="header3">Search blogs</h3>
						<input type="text" name="searchQ" placeholder="search.." id="searchInput">
						<button id = "send" onclick="searchBlog(); return false;">Send</button>
					</div>
						<section id="categories-content">
							<h3 class="header3">Categories</h3>
							<div class="category-element">
								<select id="categories">
									<option value="all">All</option>
									<option value="sports">Sports</option>
									<option value="nature">Nature</option>
								 	<option value="politics">Politics</option>
								</select>
								<button id = "send" onclick="getBlogpost(); return false;">Send</button>
							</div>
						</section>	
					<div id="showBlogText"></div>
				</div>
			</div>
		</div>
	</body>
</html>