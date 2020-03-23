<?php
  session_start();
  include("./UserDataControl.php");
  
  if(isset($_SESSION['username'])){

  } else{
        header('Location:./LogInDetails.php');
    }


    $logInObj = new UserData();
    $tempData = $logInObj->LogInCheck($_SESSION['username'] ,$_SESSION['password']);
    $_SESSION['ID'] = $tempData[1] ;
    echo "<div class='Data'>";
    if ($tempData[0] == 1) {
      echo "<br>"."Personal Details"."<br>"."<hr>";
        $logInObj->imageView("Blog","password","root",$tempData[1]);
        $logInObj->LogInPageCredentialView("Blog","password","root",$tempData[1]);
        echo "<br>"."<hr>";
        $logInObj->showBlogContent("Blog","password","root");
    } else {
      echo "<b>"."Enter correct user id and password"."<b>";
    }
    echo "</div>";
?>

<html>
  <head>
    <title>After Log in</title>
    <link rel="stylesheet" type="text/css" href="./homePageCss.css">
  </head>

<body>
    <div class = "Logout">  
      <a href="./myBlog.php"><button> My Blog</button></a>
      <a href="./logout.php"><button> Sign out</button></a>
    </div>
</body>
</html>
  