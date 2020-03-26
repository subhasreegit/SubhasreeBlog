<?php
  session_start();
  //include("./blogAction.php");
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);

  if(isset($_SESSION['ID'])){
        
  }
  else{
    header('Location:../Controller/LogInDetails.php');
  }

  $logInObj = new blogAction(); //the object of blogAction class

  $blogData = $logInObj -> BlogData($_SESSION['BLOGID']); //this function return the blog data of the particular blog id.
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
            Title: 
            <input type = "text" name = "title" id = "title" value = "<?php echo $blogData['Title']; ?>">
            <br><br>
            Content :
            <input type = "text" name = "content" id = "content" value = "<?php echo $blogData['Content']; ?>">
            <br><br>
            <input type = "submit" name = "save" id = "save" value = "Save">
          </form>
        </div>
      </div>

  