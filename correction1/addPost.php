<?php
session_start();
    if(isset($_SESSION['ID'])){
        
    }
    else{
        header('Location:/LogInDetails.php');
    }
?>


<html>
  <head>
    <title>The add blog page</title>
    <link rel="stylesheet" type="text/css" href="./addBlogCss.css">
  </head>
  <body>
    <div class = 'Logout'>
        <a href='logout.php'><button> Sign out</button></a>
        <a href='myBlog.php'><button>Back</button></a>
    </div>
    <div class = "blogAdding">
      <form action="addBlogToDatabase.php" method="POST" enctype="multipart/form-data">
        TITLE: 
        <input type="text" name="title" id="title"><br><br>
        CONTENT: <br>
        <textarea type="text"  name="Content" id="Content" placeholder="Type here.." style="height='500';width='500';" required></textarea><br><br>
        <input type="submit"  name="submit" id ="submit" value="Submit"><br>
      </form>
    </div>
  </body>
</html>
