var request = new XMLHttpRequest();
var blogText;
var userName;
var oldBlog = [];

function loadBlogForm(){
	document.getElementById("showBlogPage").style.display = "none";
	document.getElementById("blogPage").style.display = "block";
}

function submitBlog(){
	var blogText = document.getElementById("blogText").value;
	var userName = document.getElementById("usrInput").value;
	//request.open("POST", "api.php?&key=" + userName + "&message=" + blogText, false);
	//request.send();
	request.open("POST", "api.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send("key="+ userName + "&message=" + blogText);
}

function getIdsDb(){
	document.getElementById("showBlogPage").style.display = "block";
	document.getElementById("blogPage").style.display = "none";
/*
	var blogData = $.ajax({
	  dataType: "json",
	  url: "api.php",
	  data: "ID",
	  success: null
	});
*/
	$.get("api.php", function(blogText, status, request){
		//alert(data);


		oldBlog = JSON.parse(blogText);
		var oldBlogSplit = oldBlog.split(",");
		alert(oldBlogSplit);

		for (i = 0; i < oldBlog.lenght ; i++) {
			var newBlog = request.response;
			document.getElementById('showBlogText').innerHTML = oldBlog[i] + "<br>";
			//oldMsgs[i] = parseInt(oldMsgs[i]);
		}
		
	})
	
	//document.getElementById('showBlogText').innerHTML = blogData;
 	//var newblogposts = request.response; //all blog posts from database
	
	
	//var blogs_array = JSON.parse(request.response);
	//console.log(blogData);
}
/*
function getIdsDb(){
	request.open("GET", "api.php", false);
	request.send();

	response = JSON.parse(request.response);

	showBlog(response);
}


function showBlog(content){

	document.getElementById('showBlogText').innerHTML = "";
	for (i = 0 ; i < content.length ; i++) {
		document.getElementById('showBlogText').innerHTML += "<div id='blogText'" + content[i][0] + "></div>";
	}
}*/