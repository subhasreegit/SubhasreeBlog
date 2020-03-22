<?php

	session_start();
	include("./UserDataControl.php");

    if(isset($_SESSION['ID'])){
        
    }
    else{
        header('Location:/LogInDetails.php');
    }

    if(isset($_POST['Edit'])) {
    	//echo "123";
    	echo $_POST['BlogId'];
    }