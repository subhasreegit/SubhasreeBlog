<?php
    include("./UserDataControl.php");

    $logInObj = new UserData();
    $logInObj->showBlogContent("Blog","password","root");
?>
<html>
    <head>
        <title>Blog page website</title>
        <link rel="stylesheet" type="text/css" href="./indesPageCss.css">
    </head>
    <body>
        <div class = "navBar">
          <a href="./LoginPageDetails.php"><button>Sign in</button></a>
          <a href="./SignUp.php"><button>Sign up</button></a>
        </div>
    </body>
</html>

