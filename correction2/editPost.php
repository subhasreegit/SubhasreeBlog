<?php
  session_start();
  include("./UserDataControl.php");

  if(isset($_SESSION['ID'])){
        
  }
  else{
    header('Location:/LogInDetails.php');
  }

  $logInObj = new UserData();
  $blogData = $logInObj->BlogData("Blog","password","root",$_SESSION['BLOGID']);?>
    <form action = "savePost.php" method="POST" enctype="multipart/form-data">
      Title: 
      <input type = "text" name = "title" id = "title" value = "<?php echo $blogData['Title']; ?>">
      <br><br>
      Content :
      <input type = "text" name = "content" id = "content" value = "<?php echo $blogData['Content']; ?>">
      <br><br>
      <input type = "submit" name = "save" id = "save" value = "Save">
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
  