<!doctype html>
<html>
	<head>
		<title>The Big Blog</title>
		<link rel="stylesheet" type="text/css" href="stylesheetLogin.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>

	<body>
		<header id="header" align="center"><b>Ye old Blog</b></header>

		<div id="btnGrp" align="center">

		</div>

		<div class="contentElement">
			<div id="positionC">
				<div align="center" id="loginWrap">

					<h3 id="header3">Welcome! Login or just pay us a visit</h3>
					<div id="btnGrp" align="center">
						<div id="btnBlogInput" onclick="loadRegister()">Register</div>
						<div id="btnShowBlog" onclick="window.location.href = 'blogvisitor.php'">I'm just visiting</div>
					</div>

					<div id="loginKnownUser">
						<h3>LOG IN</h3>
						<form action="login-api.php" method="post">
							<label>Username :</label>
							<input id="userName"  type="text"  name="username" placeholder="username" autofocus> <br />
							<label>Password :</label>
							<input id="password"  type="password"  name="password" placeholder="**********"> <br />
							<input name='submit' id="loginConfirm" align="center" type="submit" value="Login">
							
						</form>
						<input type="submit" id="forgotPassword" onclick="forgotPassword()" value="Forgot my password">
					</div>

					<div id="formForgotP">
						<h3>PlEASE FILL IN YOUR EMAIL, YOUR A LINK TO RESET YOUR PASSWORD WILL BE SEND THERE</h3>
						<form action="reset_user_password.php" method="post">
							<label>Email :</label>
							<input id="regEmail"  type="text"  name="email" placeholder="email"> <br />
							<input type="submit" id="submitMail" onclick="forgotPassword()">
							<input type="cancel" id="cancelReg" onclick="window.location.href = 'login.php'" value="Cancel">
						</form>
					</div>

					<div id="regNew">
						<h3>REGISTER</h3>
						<form action="register-api.php" method="post">
							<label>Username :</label>
							<input id="regUsername"  type="text"  name="username" placeholder="username" autofocus> <br />
							<label>Password :</label>
							<input id="regPassword"  type="password"  name="password" placeholder="**********"> <br />
							<label>Email :</label>
							<input id="regEmail"  type="text"  name="email" placeholder="email"> <br />
							<input name='submit' id="regConfirm" align="center" type="submit" value="Confirm">
							<input type="cancel" id="cancelReg" onclick="window.location.href = 'login.php'" value="Cancel">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<script>

$(document).ready(function(){ //keypress function, when enter is pressed; button is activated
	
	$('#myKey').keypress(function(e){
		if(e.keyCode==13) // 13 = enter
		$('#loginConfirm').click(); // id for div or button
	});
});

// page display
function loadRegister(){ // displays de blogform page and closes the blog overview page
	document.getElementById("loginKnownUser").style.display = "none";
	document.getElementById("formForgotP").style.display = "none";
	document.getElementById("regNew").style.display = "block";
}

function forgotPassword(){
	document.getElementById("loginKnownUser").style.display = "none";
	document.getElementById("formForgotP").style.display = "block";
	document.getElementById("regNew").style.display = "none";
}

</script>