<?php
	session_start();

	
	session_destroy();
	header('Location:./LoginPageDetails.php');
?>
