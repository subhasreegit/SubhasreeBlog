<?php

  //here the session is started
  session_start();
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);

  if(isset($_SESSION['ID'])){      
  }
  else{

    // redirecting to login page
    header('Location:../View/LogInDetails.php'); 
  }

  //creating the object of blogAction class
  $logInObj = new blogAction(); 

  //through this function we delete the blog content
  $blogData = $logInObj -> deleteBlog($_SESSION['BLOGID']); 

  if ($blogData) {

    //redirecting to the myblog page
  	header('Location:../View/myBlog.php'); 

  } 
  else {
  	echo "Unsuccessfull. Try again."; 
  }
 ?>
