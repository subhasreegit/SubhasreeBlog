<?php
  session_start();
  //include("./blogAction.php");
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);

  if(isset($_SESSION['ID'])){
        
  }
  else{
    header('Location:../View/LogInDetails.php'); //redirect to the login page
  }

  $TITLE = $_POST['title'];;
  $CONTENT = $_POST['content'];
  $logInObj = new blogAction();
  $blogData = $logInObj->editBlog($_SESSION['BLOGID'],$TITLE,$CONTENT);
  if($blogData) {
  	header('Location:../View/myBlog.php'); //redirect to the my blog page
  } else {
  	header('Location:../View/editPost.php'); //redirect to the editpost page
  	
  }
  ?>
