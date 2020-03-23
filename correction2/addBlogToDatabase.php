<?php
session_start();
include("./UserDataControl.php");

    if(isset($_SESSION['ID'])){
        
    }
    else{
        header('Location:/LogInDetails.php');
    }
    $id = $_SESSION['ID'];
    $title = $_POST['title'];
    $content = $_POST['Content'];

    $blogInObj = new UserData();
    $response = $blogInObj->blogDataEntry("Blog","password","root",$id,$title,$content);
    if($response) {
      echo "entry successfull";
      header('Location:./homePageView.php');
    }
    else {
        echo "entry unsuccessfull";
        header('Location:./addPost.php');
    }

?>

<!-- <html>
  <head>
    <title></title>
  </head>

<body>

    <div class = "Logout">  
      <a href="./logout.php"><button> Sign out</button></a>
    </div>
</body>
</html> -->