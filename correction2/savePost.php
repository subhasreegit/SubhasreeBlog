<?php
  session_start();
  include("./UserDataControl.php");

  if(isset($_SESSION['ID'])){
        
  }
  else{
    header('Location:/LogInDetails.php');
  }

  $TITLE = $_POST['title'];;
  $CONTENT = $_POST['content'];
  $logInObj = new UserData();
  $blogData = $logInObj->editBlog("Blog","password","root",$_SESSION['BLOGID'],$TITLE,$CONTENT);
  if($blogData) {
  	header('Location:./myBlog.php');
  } else {
  	header('Location:/editPost.php');
  	
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