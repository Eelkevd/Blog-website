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
						<section id="categories-content">
							<h3 id="headerCat">Categories</h3>
							<div class="category-element">
								<select id="categories">
								  <option value="sports">Sports</option>
								  <option value="nature">Nature</option>
								  <option value="politics">Politics</option>
								</select>
								<button id = "send" onclick="getBlogpost(); return false;">Send</button>
							</div>
						</section>
					
					<div id="showBlogText"></div>
					<div id="oldComm"></div>
				</div>
			</div>
		</div>
	</body>

</html>