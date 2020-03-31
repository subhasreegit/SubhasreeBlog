<?php
    //session start
    session_start();

    if(isset($_SESSION['ID'])) {        
    }
    else{
        //redirect to the login page
        header('Location:../View/LogInDetails.php');
    }

    if(isset($_POST['View'])) {
        $_SESSION['BLOGID'] = $_POST['action'];

        //redirection to the view page
        header('Location:../View/viewpage.php'); 
        
    } 
    else if(isset($_POST['Edit'])) {
        $_SESSION['BLOGID'] = $_POST['action'];

        //redirecting to the editpost page
        header('Location:../View/editPost.php'); 
        
    } 
    else if(isset($_POST['Delete'])) {
        $_SESSION['BLOGID'] = $_POST['action'];

        //redirecting to the delete post page
        header('Location:../View/deletePost.php'); 
    }
