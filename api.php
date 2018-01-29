<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = $_GET["key"]; 
    $blogText = $_GET["message"];
	$content = $userName . $blogText;
	echo $content;
}

?>