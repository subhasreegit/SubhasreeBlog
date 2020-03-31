<?php

  //here the session is started
  session_start();
  include("./Model/blogAction.php");

  if(isset($_SESSION['ID'])){      
  }
  else{

    // redirecting to login page
    header('Location:../index.php/firstpage'); 
  }

  //creating the object of blogAction class
  $logInObj = new blogAction(); 

  //through this function we delete the blog content
  $blogData = $logInObj -> deleteBlog($_SESSION['BLOGID']); 

  if ($blogData) {

    //redirecting to the myblog page
  	header('Location:../index.php/myblog'); 

  } 
  else {
  	echo "Unsuccessfull. Try again."; 
  }
 ?>
