<?php

  //here the session is started
  session_start();

  if(isset($_SESSION['ID'])){      
  }
  else{

    // redirecting to login page
    header('Location:http://www.example.com/firstpage'); 
  }

  //creating the object of blogAction class
  $logInObj = new Model\blogAction(); 

  //through this function we delete the blog content
  $blogData = $logInObj -> deleteBlog($_SESSION['BLOGID']); 

  if ($blogData) {

    //redirecting to the myblog page
  	header('Location:http://www.example.com/myblog'); 

  } 
  else {
  	echo "Unsuccessfull. Try again."; 
  }
 ?>
