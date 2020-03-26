<?php
	session_start(); //the session is start

	
	session_destroy(); //here we are destroying the session

	header('Location:../index.php'); //redirecting to the home page
?>
