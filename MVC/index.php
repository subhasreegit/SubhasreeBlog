<?php
  //$address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  //include("./Model/blogAction.php");
  //require '../../vendor/autoload.php';
  //include($address);
  require '../../vendor/autoload.php';
  use Model\blogAction.php;
  
  
?>


  <html>
    <head>
      <title>Blog Page Website</title>
      <link rel = " stylesheet " type = " text/css " href = " ./Css/indexPageCss.css ">
    </head>
    <body>
      <div class = "container">
        <div class = " Header">
          <a href = "./View/LoginPageDetails.php "><button> Sign in </button></a>
          <a href = "./View/SignUp.php"><button> Sign up </button></a>
        </div>
        <div class = "heading">
         <h1> WELCOME TO SUBHASREE BLOG WEBSITE</h1>
          <hr>
        </div>
        <div class = "bodyContent">
          <?php 
          $logInObj = new blogAction(); //object of blogaction class
          $blogData = $logInObj->showBlogContent(); //this function retrns the entire blog data
          foreach($blogData as $key => $value) {
            $logInObj -> imageView($value['PersonId']); //this will view the auther image
            echo "<br>";
            $personaldata = $logInObj-> mydetails($value['PersonId']); //this will return the auther details
            foreach($personaldata as $key1 => $value1) {
              echo $value1['FirstName']." ". $value1['LastName']."<br>";
              echo "Title:"." ".$value['Title']."<br>";
              echo "Content:"." ".$value['Content']."<br>"."<br>";?>
              <?php 
            }
          }?> 
        </div>
      </div>
    </body>
  </html>
              
  

    
