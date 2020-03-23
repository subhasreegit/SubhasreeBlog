<?php

	session_start();
	include("./UserDataControl.php");

    if(isset($_SESSION['ID'])){
        
    }
    else{
        header('Location:/LogInDetails.php');
    }

    if(isset($_POST['View'])) {
    	$_SESSION['BLOGID'] = $_POST['action'];
    	header('Location:./viewpage.php');
    	
    } else if(isset($_POST['Edit'])) {
    	$_SESSION['BLOGID'] = $_POST['action'];
    	header('Location:./editPost.php');
    	
    } else if(isset($_POST['Delete'])) {
    	$_SESSION['BLOGID'] = $_POST['action'];
    	header('Location:./deletePost.php');    	
    }
