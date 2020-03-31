<?php

  //session start
  session_start();
 
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);

  if(isset($_SESSION['ID'])) {        
  }
  else{
    //redirect to the login page
    header('Location:../View/LogInDetails.php'); 
  }

  $TITLE = $_POST['title'];;
  $CONTENT = $_POST['content'];

  //the object of blogaction is created
  $logInObj = new blogAction();

  //the function edit block is called to change in the blog content
  $blogData = $logInObj->editBlog($_SESSION['BLOGID'],$TITLE,$CONTENT);
  if($blogData) {

    //redirect to the my blog page
  	header('Location:../View/myBlog.php'); 
  } 
  else {

    //redirect to the editpost page
  	header('Location:../View/editPost.php'); 
  	
  }
?>
