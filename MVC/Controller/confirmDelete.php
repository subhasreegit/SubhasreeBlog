<?php
  session_start();
  //include("./blogAction.php");
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);


  if(isset($_SESSION['ID'])){
        
  }
  else{
    header('Location:../View/LogInDetails.php'); // redirecting to login page
  }

  $logInObj = new blogAction(); //creating the object of blogAction class

  $blogData = $logInObj -> deleteBlog($_SESSION['BLOGID']); //through this function we delete the blog content

  if($blogData) {
  	header('Location:../View/myBlog.php'); //redirecting to the myblog page

  } else {
  	echo "Unsuccessfull. Try again."; 
  }
  ?>
