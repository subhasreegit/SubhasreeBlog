<?php
  //session start
  session_start();
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);

  if(isset($_SESSION['ID'])) {       
  }
  else {

    //it will reirect the page to the login page
    header('Location:../Controller/LogInDetails.php');
  }

  //the object of blogAction class
  $logInObj = new blogAction(); 

  //this function return the blog data of the particular blog id
  $blogData = $logInObj -> BlogData($_SESSION['BLOGID']); 
  ?>
  <html>
    <head>
      <title>Edit post</title>
      <link rel="stylesheet" type="text/css" href="../Css/editPageCss.css">
    </head>
    <body>
      <div class = "container">
        <div class = "Header">
          <h1> HERE YOU CAN EDIT</h1>
          <a href="../View/myBlog.php"><button>Back</button></a>
          <a href="../Controller/logout.php"><button>Log out</button></a>
        </div>
        <div class = "bodycontent">
          <form action = "savePost.php" method="POST" enctype="multipart/form-data">
            Title: <br> 
            <textarea type = "text" name = "title" id = "title" rows="4" cols="50"><?php echo $blogData['Title'];?></textarea>
            <br><br>
            Content : <br>
            <textarea type = "text" name = "content" rows="20" cols="50" id = "content"><?php echo $blogData['Content']; ?></textarea>
            <br><br>
            <input type = "submit" name = "save" id = "save" value = "Save">
          </form>
        </div>
      </div>

  