var request = new XMLHttpRequest();
var blogText;
var userName;

function loadBlogForm(){
	document.getElementById("showBlogPage").style.display = "none";
	document.getElementById("blogPage").style.display = "block";
}
function loadBlogPage(){
	document.getElementById("showBlogPage").style.display = "block";
	document.getElementById("blogPage").style.display = "none";
}

function submitBlog(){
	var blogText = document.getElementById("blogText").value;
	var userName = document.getElementById("usrInput").value;
	request.open("POST", "api.php?&key=" + userName + "&message=" + blogText, false);
	request.send();
}
/*
function hideAllContent() {
	var contentElements = document.getElementsByClassName("contentElement");
	for (i = 0; i < contentElements.length; i++) {
		contentElements[i].style.display = "none";
	}
}

function navigate(input) {
	hideAllContent();
	document.getElementById(input).style.display = "block";
}

hideAllContent();
*/