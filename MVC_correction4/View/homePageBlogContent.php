<?php

  $blogid = $_POST['fullContent'];
  $fnamee = $_POST['fname'];
  $lnamee = $_POST['lname'];

  //the object of the blogaction is created
  $userObj = new Model\blogAction;

  //through this the blogdata is created
  $blogdata = $userObj -> blogData($blogid);?>
  

  <html>
    <head>
      <title>Blog Page Website</title>
      <link rel = " stylesheet " type = " text/css " href = " ../Css/homePageContentView.css ">
    </head>
    <body>
      <div class = "container">
          <div class = " Header">
            <h1> YOUR BLOG CONTENT</h1>
            <a href = "../index.php/logout "><button>Log Out</button></a>
          </div>
        <div class = "bodyContent">
          <?php 

          //through this the auther image is viewed
          $userObj -> imageView($blogdata['PersonId']); 
          echo "<br>" . $fnamee . " " . $lnamee . "<br>" . "<br>";

          //through this blog image is ivewed
          $userObj -> blogImageView($blogid);
          echo "<b>" . "Title:" . "</b>"  . "<br>" . $blogdata['Title'] . "<br>";
          echo "<b>" . "Content:" .  "</b>" . "<br>" . $blogdata['Content'] . "<br>" . "<br>";?>
          <a href = "../index.php/homepageviewblog"><button>Back</button></a>
        </div>
      </body>
    </html>

