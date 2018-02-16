<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST['email'];

    $newPassword = password_hash("$password", PASSWORD_DEFAULT);

    include 'configPDO.php';
    
    $connection = new PDO($dsn, $user_name, $pass_word);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = stripslashes($username);
    $password = stripslashes($password);

	try {

        $sql = "INSERT INTO registervisitor (username, password, email) VALUES ('$username', '$newPassword', '$email')";
        $connection->exec($sql);
        echo "<script type='text/javascript'>alert('Successfully registered!');</script>"; 
        echo "<script> window.history.go(-1); </script>";
	}
	catch(PDOException $e) {
		echo $sql . $e->getMessage();
	}
	$connection = null;

	if(isset($_SERVER['HTTP_REFERER'])){
		$previous = $_SERVER['HTTP_REFERER'];
	}
}

?>