<?php
  //session start
  session_start();

  if(isset($_SESSION['ID'])) {        
  }
  else {
    //redirect to the login page
    header('Location:http://www.example.com/login');
  }

  if(isset($_POST['View'])) {
    $_SESSION['BLOGID'] = $_POST['action'];

    //redirection to the view page
    header('Location:http://www.example.com/myblogPageView');
        
  } 
  else if(isset($_POST['Edit'])) {
    $_SESSION['BLOGID'] = $_POST['action'];

    //redirecting to the editpost page
    header('Location:http://www.example.com/editpost');
        
  } 
  else if(isset($_POST['Delete'])) {
    $_SESSION['BLOGID'] = $_POST['action'];

    //redirecting to the delete post page
    header('Location:http://www.example.com/deletepost');
  }
