<?php
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);

  $blogid = $_POST['fullContent'];
  $fnamee = $_POST['fname'];
  $lnamee = $_POST['lname'];

  //the object of blogAction class
  $userObj = new blogAction;

  //through this blog data is taken
  $blogdata = $userObj -> blogData($blogid);?>
  

  <html>
    <head>
      <title>Blog Page Website</title>
      <link rel = " stylesheet " type = " text/css " href = " ../Css/indexContentPageCss.css ">
    </head>
    <body>
      <div class = "container">
        <div class = "upper">
          <div class = " Header">
            <a href = "./View/LoginPageDetails.php "><button> Sign in </button></a>
            <a href = "./View/SignUp.php"><button> Sign up </button></a>
          </div>
          <div class = "heading">
           <h1> WELCOME TO SUBHASREE BLOG WEBSITE</h1>
          </div>
        </div>
        <div class = "bodyContent">
          <div class = "pdata">
            <div class = "img">
              <?php 

              //through this the image of the auther is viewed
              $userObj -> imageView($blogdata['PersonId']); ?>
            </div>
            <div class = "data">
              <?php
              echo $fnamee . " " . $lnamee . "<br>" . "<br>";

              //through thi image of the blog is viewed
              $userObj -> BlogImageView($blogid);?>
            </div>
          </div>
          <div class = "blog">
            <?php
            echo "<b>" . "Title:" . "</b>"  . "<br>" . $blogdata['Title'] . "<br>";
            echo "<b>" . "Content:" .  "</b>" . "<br>" . $blogdata['Content'] . "<br>" . "<br>";?>
            <a href = "../index.php"><button>Back</button>
          </div>
        </div>
      </div>
    </body>
  </html>

