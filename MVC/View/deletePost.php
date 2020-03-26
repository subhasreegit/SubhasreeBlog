<?php
    session_start();
  //include("./blogAction.php");
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);

  if(isset($_SESSION['ID'])){

  } else{
        header('Location:./LogInDetails.php'); //redirect to the log in page
  }

  $logInObj = new blogAction(); //the object of blogaction classs

  $personaldata = $logInObj-> mydetails($_SESSION['ID']); //It returns the auther details
  ?>
  <html>
    <head>
      <title>Delete blog</title>
      <link rel="stylesheet" type="text/css" href="../Css/deletePageCss.css">
    </head>
    <body>
    <div class = "container">
      <div class = "Header">
        <a href="../View/myBlog.php"><button>Back</button></a>
        <a href="../Controller/logout.php"><button>Log out</button></a>
      </div>
      <div class = "bodycontent">
         <h1>Do you want to delete this post</h1>
        <form action ="../View/myBlog.php" >
          <input type = "submit" name ="cancel" id="cancel" value = "Cancel">
        </form>
        <form action ="../Controller/confirmDelete.php" >
          <input type = "submit" name ="Delete" id="Delete" value = "Delete">
        </form>
      </div>
    </div>
  </body>
  </html>

