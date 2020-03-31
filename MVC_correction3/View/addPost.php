<?php
  
  //session start
  session_start();
  
    if(isset($_SESSION['ID'])) {        
    }
    else {
      
      //it will redirect the page to the login page
      header('Location:../index.php/firstpage');
    }
?>


<html>
  <head>
    <title>The add blog page</title>
    <link rel="stylesheet" type="text/css" href="../Css/addBlogCss.css">
  </head>
  <body>
    <div class = "container">
      <div class = "header">
        <h1> HERE YOU CAN WRITE YOUR DREAM, YOUR PASSION,YOUR LOVE</h1>
        <a href='../index.php/logout '><button> Sign out</button></a>
        <a href='../index.php/myblog'><button>Back</button></a>
      </div>
      <div class = "blogAdding">
        <form action="../index.php/addBlogToDatabase" method="POST" enctype="multipart/form-data">
          <label> Input the picture which suits for your Blog content: </lable><br><br>
          <input type = "file" name = "file"><br><br>
          TITLE: <br>
          <textarea type="text" name="title" id="title" placeholder="Type here.." rows="4" cols="50" required></textarea><br><br>
          CONTENT:<br>
          <textarea type="text"  name="Content" id="Content" placeholder="Type here.." rows="25" cols="50" required></textarea><br><br>
          <input type="submit"  name="submit" id ="submit" value="Submit"><br>
        </form>
      </div>
    </div>
  </body>
</html>
