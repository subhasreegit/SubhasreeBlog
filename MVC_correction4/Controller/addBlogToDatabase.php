<?php
  
  //session is started
  session_start();

  if(isset($_SESSION['ID'])) {        
  }
  else {

     //redirecting to the login page
    header('Location:../index.php/firstpage');
  }
  $id = $_SESSION['ID'];

  if (isset($_POST["submit"])) {
    $title = $_POST['title'];
    $content = $_POST['Content'];
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tem_loc = $_FILES['file']['tmp_name'];
    $file_store = "../images/".$file_name;

    //the the uploaded imgage is stored in the desired position
    move_uploaded_file($file_tem_loc, $file_store);

    //the object of UserData class
    $blogInObj = new Model\UserData(); 

    $response = $blogInObj -> blogDataEntry($id,$title,$content,$file_store); // this function return the response of the blog data entry is successful or not

    if($response) {
      echo "entry successfull";

      //redirecting to the homepage
      header('Location:../index.php/myblogPageView'); 
    }
    else {
      echo "entry unsuccessfull";

      //redirecting to the Addpost page
      header('Location:../index.php/addpost'); 
    }
  }

?>