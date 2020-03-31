<?php
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);

  $blogid = $_POST['fullContent'];
  $fnamee = $_POST['fname'];
  $lnamee = $_POST['lname'];

  //the object of the blogaction is created
  $userObj = new blogAction;

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
            <a href = "./View/LoginPageDetails.php "><button> Sign in </button></a>
            <a href = "./View/SignUp.php"><button> Sign up </button></a>
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
          <a href = "../View/homePageView.php"><button>Back</button></a>
        </div>
      </body>
    </html>

