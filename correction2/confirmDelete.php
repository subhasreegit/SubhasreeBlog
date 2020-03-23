<?php
  session_start();
  include("./UserDataControl.php");

  if(isset($_SESSION['ID'])){
        
  }
  else{
    header('Location:/LogInDetails.php');
  }

  $logInObj = new UserData();
  $blogData = $logInObj->deleteBlog("Blog","password","root",$_SESSION['BLOGID']);
  if($blogData) {
  	header('Location:./myBlog.php');
  } else {
  	echo "Unsuccessfull. Try again.";
  }
  ?>



  <html>
  <head>
    <title>My Blog</title>
    <link rel="stylesheet" type="text/css" href="./homePageCss.css">
  </head>

<body>
    <div class = "navBar">
      <a href="./myBlog.php"><button>Back</button></a>
      <a href="./logout.php"><button>Log out</button></a>
    </div>

</body>
</html>