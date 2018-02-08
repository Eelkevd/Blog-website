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
}