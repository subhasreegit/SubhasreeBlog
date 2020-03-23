<?php
    session_start();
  include("./UserDataControl.php");

  if(isset($_SESSION['ID'])){

  } else{
        header('Location:./LogInDetails.php');
  }

  $logInObj = new UserData();
  $personaldata = $logInObj-> mydetails("Blog","password","root",$_SESSION['ID']);
  echo "Are you sure to delete this post?"?>
  <form action ="./myBlog.php" >
    <input type = "submit" name ="cancel" id="cancel" value = "Cancel">
  </form>
  <form action ="./confirmDelete.php" >
    <input type = "submit" name ="Delete" id="Delete" value = "Delete">
  </form>




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