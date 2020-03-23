<?php
    session_start();
  include("./UserDataControl.php");

  if(isset($_SESSION['ID'])){

  } else{
        header('Location:./LogInDetails.php');
    }
  $logInObj = new UserData();
  $blogData = $logInObj->myBlogDetails("Blog","password","root");
  $personaldata = $logInObj-> mydetails("Blog","password","root",$_SESSION['ID']);
  foreach($blogData as $key => $value) {
    $logInObj-> imageView("Blog","password","root",$_SESSION['ID']);
    echo "<br>";
    foreach($personaldata as $key1 => $value1) {
      echo $value1['FirstName']." ". $value1['LastName']."<br>";
      echo "Title:"." ".$value['Title']."<br>";?>
      <form action = "test.php" method="POST" enctype="multipart/form-data">
        <input type = "hidden" name = "action" id = "action" value = "<?php echo $value['BlogId']; ?>">
        <input type = "submit" name = "View" id = "View" value = "View Post">
        <input type = "submit" name = "Edit" id = "Edit" value = "Edit Post">
        <input type = "submit" name = "Delete" id = "Delete" value = "Delete Post">
      </form>
    <?php 
    }
  }

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