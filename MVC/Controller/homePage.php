<?php
  session_start(); //session is start
  
  $_SESSION['username'] = $_POST['UserName'];
  $_SESSION['password'] = $_POST['Password'];
  
  if(isset($_SESSION['username'])){
      header('Location:../View/homePageView.php'); //redirecting the pge to homepage

  } else{
        header('Location:../View/LogInDetails.php'); //redirecting the page to the logIndetails
    }


 ?> 