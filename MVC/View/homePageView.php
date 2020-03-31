<?php
  session_start();

  require '../../vendor/autoload.php';
  use Model\blogAction.php;
  //include("./blogAction.php");
  /*$address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);*/
  
  if(isset($_SESSION['username'])){

  } else{
        header('Location:./LogInDetails.php');
    }


    $logInObj = new blogAction(); // the obect of blogAction class
    if(isset($_SESSION['username'])) {
      if(isset($_SESSION['password'])) {
        $tempData = $logInObj -> LogInCheck($_SESSION['username'] ,$_SESSION['password']); //checking the login details with databse
        $_SESSION['ID'] = $tempData[1] ;
        $blogData = $logInObj -> showBlogContent(); //the detail blog contain is taken from this function
        ?> 
        <html>
          <head>
            <title>After Log in</title>
            <link rel = "stylesheet" type = "text/css" href = "../Css/homePageCss.css ">
          </head>
          <body>
            <div class = "container">
              <div class = "Header">
                <h1> WELCOME <?php echo $_SESSION ['username'];?></h1>
                <a href = " ./myBlog.php "><button> My Blog</button></a>
                <a href = " ../Controller/logout.php "><button> Sign out</button></a>
              </div>
                <div class = "details">
                <?php 
                  $temp = $logInObj->mydetails($_SESSION['ID']); // showing the auther image
                  foreach($temp as $key => $values) {
                    echo "<h1>";
                    echo " Personal Details " . "</h1>" . "<br>" . "<hr>" . "<br>";
                    $logInObj -> imageView($_SESSION['ID']); //showing the uther image
                    echo "<br>";
                    echo $values['FirstName'] . " " . $values["LastName"] . "<br>";
                    echo $values['Address'] . "<br>" . $values['PhoneNumber'] . "<br>" . $values["Email"] . "<br>" . "<br>";
                    echo "<hr>";
                  }?>
                </div> 
                <div class = "bodycontent" >
                <?php  foreach($blogData as $key => $value) {
                    $logInObj-> imageView ($value['PersonId']);
                    echo "<br>";
                    $personaldata = $logInObj-> mydetails($value['PersonId']); //taking the auther details
                    foreach($personaldata as $key1 => $value1) {
                      echo $value1['FirstName']." ". $value1['LastName']."<br>";
                      echo $value1['Address']."<br>";
                      echo "Title:"." ".$value['Title']."<br>";
                      echo "Content:"." ".$value['Content']."<br>"."<br>";?>
                      <?php 
                    }
                  }
                  ?> 
                  </div> 
            </div>
          </body>
        </html>
      <?php
      } 
    }
    else {
      echo "Enter the sufficient login details";
    }  