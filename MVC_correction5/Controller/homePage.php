<?php
  
  //session is start
  session_start(); 
  
  $_SESSION['username'] = $_POST['UserName'];
  $_SESSION['password'] = $_POST['Password'];
  
  if(isset($_POST['UserName'])){
    if(isset($_POST['Password'])) {

      if(isset($_SESSION['username'])) {

        //redirecting the pge to homepage
        header('Location:http://www.example.com/homepage'); 
      }
    }
  } 
  else {

    //redirecting the page to the logIndetails 
    header('Location:http://www.example.com/login'); 
  }


 ?> 