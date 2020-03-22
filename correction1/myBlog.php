<?php
    session_start();
  include("./UserDataControl.php");

  if(isset($_SESSION['username'])){

  } else{
        header('Location:./LogInDetails.php');
    }
  $logInObj = new UserData();
  $logInObj->myBlog("Blog","password","root");

?>


<html>
  <head>
    <title>My Blog</title>
    <link rel="stylesheet" type="text/css" href="./homePageCss.css">
  </head>

<body>
    <div class = "navBar">
      <a href="./addPost.php"><button>Add Blog</button></a>
      <a href="./logout.php"><button>Log out</button></a>
      <a href='homePageView.php'><button>Back</button></a>
    </div>

</body>
</html>