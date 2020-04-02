<?php
  
  //session start  
  session_start();

  if(isset($_SESSION['ID'])) {

  } 
  else {

    //redirect to the log in page
    header('http://www.example.com/login'); 
  }

  //the object of blogaction classs
  $logInObj = new Model\blogAction(); 

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
        <a href="http://www.example.com/myblog"><button>Back</button></a>
        <a href="http://www.example.com/logout"><button>Log out</button></a>
      </div>
      <div class = "bodycontent">
         <h1>Do you want to delete this post</h1>
        <form action ="http://www.example.com/myblog" >
          <input type = "submit" name ="cancel" id="cancel" value = "Cancel">
        </form>
        <form action ="http://www.example.com/confirmdelete" >
          <input type = "submit" name ="Delete" id="Delete" value = "Delete">
        </form>
      </div>
    </div>
  </body>
  </html>

