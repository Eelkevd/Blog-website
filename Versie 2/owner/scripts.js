var request = new XMLHttpRequest();
var blogText;
var userName;
var selectedCat;
//var articleID;
var oldBlog = []; //array for blogtext values from database

shortcuts = { 
    // here you can fill in your own shortcuts! Just follow/copy the format and add your own shortcuts and their meaning.
    
    //"shortcut" : "what it should type", 
    "cg" : "CodeGorilla",
    "gn" : "Groningen",
    "www" : "world wide web" // <- last one doesn't need to end with a comma
	}

window.onload = function() {

	// load old blogs into blogpage
	var surl = "api.php?action=read"; 
	request.open('GET', surl, false);
	request.send();
	
	oldBlog = JSON.parse(request.response);
	oldBlog.reverse();

	oldBlog.forEach(function(element){
			var articleID = element.ID;
			//alert(articleID);
			// load old blogs
			document.getElementById('showBlogText').innerHTML += "<div id='newPost'>" + "<b>" + element.title + "</b>" + "<br>" + "<br>" + element.blogText + "</div>" + "<br>" + "<a href='commentsection.php?blogid=" + articleID + "'>comments" + "</a>";

	});

	// needed for shortcut function
    var ta = document.getElementById("blogText");
    var timer = 0;
    var re = new RegExp("\\b(" + Object.keys(shortcuts).join("|") + ")\\b", "g");
    
    update = function() {
        ta.value = ta.value.replace(re, function($0, $1) {
            return shortcuts[$1.toLowerCase()];
        });
    }
    
    ta.onkeydown = function() {
        clearTimeout(timer);
        timer = setTimeout(update, 200);
    }
}


function loadBlogForm(){ // displays de blogform page and closes the blog overview page
	document.getElementById("showBlogPage").style.display = "none";
	document.getElementById("blogPage").style.display = "block";
}

function getOldBlog(){ // displays de blogspage and closes blogform page
	document.getElementById("showBlogPage").style.display = "block";
	document.getElementById("blogPage").style.display = "none";
}


function submitBlog(){ // submits the input data from the blogform page to database via PHP
	var titleBlog = document.getElementById("usrInput").value;
	var catSports = document.getElementById("sportsCheckB").checked;
	var catNat = document.getElementById("natureCheckB").checked;
	var catPol = document.getElementById("politicsCheckB").checked;
	var blogText = document.getElementById("blogText").value;

	if (titleBlog != "" && blogText != "") {
		//alert(selectedCat);

		request.open("POST", "api.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send("title=" + titleBlog + "&cat1="+ catSports + "&cat2=" + catNat + "&cat3=" + catPol + "&message=" + blogText);
	}
	else {
		alert("Please fill in your title and your blog article");
	}
}


