<?php

	session_start();
	//include("./UserDataControl.php");

    if(isset($_SESSION['ID'])){
        
    }
    else{
        header('Location:../View/LogInDetails.php');
    }

    if(isset($_POST['View'])) {
    	$_SESSION['BLOGID'] = $_POST['action'];
    	header('Location:../View/viewpage.php'); //redirection to the view page
    	
    } else if(isset($_POST['Edit'])) {
    	$_SESSION['BLOGID'] = $_POST['action'];
    	header('Location:../View/editPost.php'); //redirecting to the editpost page
    	
    } else if(isset($_POST['Delete'])) {
    	$_SESSION['BLOGID'] = $_POST['action'];
    	header('Location:../View/deletePost.php'); //redirecting to the delete post page
    }
