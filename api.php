<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = $_POST["key"]; 
    $blogText = $_POST["message"];
	$content = $userName ." ". $blogText;
	echo $content;
}

?>