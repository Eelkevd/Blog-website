var request = new XMLHttpRequest();
var blogText;
var userName;
var selectedCat;
var oldBlog = []; //array for blogtext values from database

window.onload = function() {
/*
	$.get("api.php", function(blogText, status, request){
		//alert(blogText);
		//console.log("hello");
		oldBlog = JSON.parse(blogText);
		oldBlog.reverse();
		//console.log(oldBlog);
		
		oldBlog.forEach(function(element){
			//alert(element);
			document.getElementById('showBlogText').innerHTML += "<div id='newPost'>" + element + "</div>" + "<br>";
		});
	})*/
	var surl = "api.php?action=read"; 
	request.open('GET', surl, false);
 	//var newblogposts=request.response; //all blog posts from database
	request.send();
	
	oldBlog = JSON.parse(request.response);
	//alert(request.response);
	oldBlog.forEach(function(element){
			//alert(element);
			document.getElementById('showBlogText').innerHTML += "<div id='newPost'>" + element.title + "<br>" + element.blogText + "</div>" + "<br>";
	});

}

function loadBlogForm(){ // loads de blogform and close the blog overview page
	document.getElementById("showBlogPage").style.display = "none";
	document.getElementById("blogPage").style.display = "block";
}

function submitBlog(){ // submits the input data from the blogform page to database via PHP
	var titleBlog = document.getElementById("usrInput").value;
	var selectedCat = document.getElementById("selectorCat").value;
	var blogText = document.getElementById("blogText").value;

	if (titleBlog != "" && blogText != "") {
		alert(selectedCat);

		request.open("POST", "api.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send("title=" + titleBlog + "&key="+ selectedCat + "&message=" + blogText);
	}
	else {
		alert("Please fill in your title and your blog article");
	}
}

function getOldBlog(){
	document.getElementById("showBlogPage").style.display = "block";
	document.getElementById("blogPage").style.display = "none";

}

