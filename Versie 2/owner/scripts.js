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

		request.open("GET", "comment-api.php?", false);
		request.send();
			
		returnComm = JSON.parse(request.response);

		console.log(returnComm);

			for (var i = 0 ; i < oldBlog.length ; i++) {
				var b = oldBlog[i];
				//console.log(b);
				document.getElementById('showBlogText').innerHTML += "<div id='newPost'>" + "<b>" + b[1] + "</b>" + "<br>" + "<br>" + b[2] + "</div>" + "<br>" + "<a href='commentsection.php?blogid=" + b[0] + "'> Post your own comment" + "</a>";

				for(var j = 0; j < returnComm.length; j++){ 

					var k = returnComm[j];

					if (k[2] == b[0]) {
			   		document.getElementById("showBlogText").innerHTML += "<div id='newCommHeader'>" + "Comments" + "</div>" + "<div id='newComm'>" + "Anomynous:" + " " + k[1] + "</div>";
					}
		  		}
		  	}


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

	function getBlogpost() {
	    	var blogcategories = document.getElementById("categories").value;
	    	var blogScreen = document.getElementById("showBlogText");

	    	request.open("GET", "selection-api.php?", false);
			request.send();

			returnblog = JSON.parse(request.response);
			returnblog.reverse();



			//returnblog.reverse();
			//alert(returnblog);

			jQuery('#showBlogText').html('');

			for (var i = 0 ; i < returnblog.length ; i++) {
				var b = returnblog[i];
				//console.log(b);
				if (blogcategories == b[2]) {

	   			document.getElementById("showBlogText").innerHTML += "<div id='newPost'>" + "<b>" + b[1] + "</b>" + "<br>" + "<br>" + b[3] + "</div>" + "<br>" + "<a href='commentsection.php?blogid=" + b[0] + "'>comments" + "</a>";
	   			for(var j = 0; j < returnComm.length; j++){ 

					var k = returnComm[j];

					if (k[2] == b[0]) {
			   		document.getElementById("showBlogText").innerHTML += "<div id='newComm'>" + "Anomynous:" + " " + k[1] + "</div>";
					}
		  		}
	   		}
		}
	}

