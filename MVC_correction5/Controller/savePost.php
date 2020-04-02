<?php

  //session start
  session_start();

  if(isset($_SESSION['ID'])) {        
  }
  else{
    //redirect to the login page
    header('Location:http://www.example.com/firstpage'); 
  }

  $TITLE = $_POST['title'];;
  $CONTENT = $_POST['content'];

  //the object of blogaction is created
  $logInObj = new Model\blogAction();

  //the function edit block is called to change in the blog content
  $blogData = $logInObj->editBlog($_SESSION['BLOGID'],$TITLE,$CONTENT);
  if($blogData) {

    //redirect to the my blog page
  	header('Location:http://www.example.com/myblog'); 
  } 
  else {

    //redirect to the editpost page
  	header('Location:http://www.example.com/editost'); 
  	
  }
?>
