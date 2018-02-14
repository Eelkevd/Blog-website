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
					<h3 id="header3">Welcome to your backend, please login...</h3>
					<form action="login-api.php" method="post">
						<label>Username :</label>
						<input id="userName"  type="text"  name="username" placeholder="username" autofocus> <br />
						<label>Password :</label>
						<input id="password"  type="password"  name="password" placeholder="**********"> <br />
						<input name='submit' id="loginConfirm" align="center" type="submit" value="Login">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>