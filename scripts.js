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
	//request.open("POST", "api.php?&key=" + userName + "&message=" + blogText, false);
	//request.send();
	request.open("POST", "api.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send("key="+ userName + "&message=" + blogText);
}

function getIdsDb(){

	//var blogResponse = request.response;
	//var id = 1;
	//var url = "api.php?action=read$id="+ id;
	grabChatMessageId(newMessage);

	var newMessage = request.response;
	var blogResponse = JSON.parse(newMessage);

		
		//chatMessage.innerHTML += "> " + mykey + ":" + " " + newMessage + "<br>";
		//document.getElementById("chatInput").value = "";

	//request.open("GET", url, false);
	//request.send();

	//var blog_array = JSON.parse(this.blogResponse);
	//var blog_array_lenght = blog_array.length;

	//for(var post in blogs_array){ 
		document.getElementById("showBlogText").innerHTML = blogResponse;
	//}
}

function grabChatMessageId(id){
	var url = "api.php?action=list$ID="+ id;
	//var urlRead = "https://codegorilla.nl/read_write/api.php?action=read&mykey=" + myKey + "&id=" + id;
	request.open('GET', url, false);
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