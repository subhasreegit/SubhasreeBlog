<?php

  //session start
  session_start();
 
  include("./Model/blogAction.php");

  if(isset($_SESSION['ID'])) {        
  }
  else{
    //redirect to the login page
    header('Location../index.php/firstpage'); 
  }

  $TITLE = $_POST['title'];;
  $CONTENT = $_POST['content'];

  //the object of blogaction is created
  $logInObj = new blogAction();

  //the function edit block is called to change in the blog content
  $blogData = $logInObj->editBlog($_SESSION['BLOGID'],$TITLE,$CONTENT);
  if($blogData) {

    //redirect to the my blog page
  	header('Location:../index.php/myblog'); 
  } 
  else {

    //redirect to the editpost page
  	header('Location:../index.php/editost'); 
  	
  }
?>
