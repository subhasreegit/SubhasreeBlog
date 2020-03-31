<?php
  
  //session start  
  session_start();
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);

  if(isset($_SESSION['ID'])) {

  } 
  else {

    //redirect to the log in page
    header('Location:./LogInDetails.php'); 
  }

  //the object of blogaction classs
  $logInObj = new blogAction(); 

  //It returns the auther details
  $personaldata = $logInObj-> mydetails($_SESSION['ID']); 
  ?>
  <html>
    <head>
      <title>Delete blog</title>
      <link rel="stylesheet" type="text/css" href="../Css/deletePageCss.css">
    </head>
    <body>
    <div class = "container">
      <div class = "Header">
        <h1>SURE!!!</h1>
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

