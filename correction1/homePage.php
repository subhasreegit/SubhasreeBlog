<?php
  session_start();
  
  $_SESSION['username'] = $_POST['UserName'];
  $_SESSION['password'] = $_POST['Password'];
  
  if(isset($_SESSION['username'])){
      header('Location:./homePageView.php');

  } else{
        header('Location:./LogInDetails.php');
    }


 ?> 