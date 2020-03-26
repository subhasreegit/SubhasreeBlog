<?php
  session_start();
  //include("./UserDataControl.php");
  $address = "/var/www/html/Blog/MVC/Model/UserDataControl.php";
  include($address);

  if(isset($_SESSION['ID'])){
        
  }
  else {
    header('Location:../Controller/LogInDetails.php');
  }
  $id = $_SESSION['ID'];
  $title = $_POST['title'];
  $content = $_POST['Content'];
  $blogInObj = new UserData(); //the object of UserData class

  $response = $blogInObj->blogDataEntry($id,$title,$content); // this function return the response of the blog data entry is successful or not

  if($response) {
    echo "entry successfull";
    header('Location:../View/homePageView.php'); //redirecting to the homepage
  }
  else {
    echo "entry unsuccessfull";
    header('Location:../View/addPost.php'); //redirecting to the Addpost page
  }

?>