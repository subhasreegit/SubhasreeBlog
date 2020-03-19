<?php

  include("./UserDataControl.php");

  if(isset($_POST["Regester"])){
   $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Address = $_POST['Address'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $EmailAddress = $_POST['Email'];
    $UserName = $_POST['UserName'];
    $Password = $_POST['PassWord'];
    $RePassword = $_POST['RePassword'];
    /*$check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }*/
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST['Regester'])){
              $file_name=$_FILES['file']['name'];
              $file_type=$_FILES['file']['type'];
              $file_size=$_FILES['file']['size'];
              $file_tem_loc=$_FILES['file']['tmp_name'];
              $file_store="images/".$file_name;
              if(move_uploaded_file($file_tem_loc, $file_store)){
                  //echo "<img src=".$file_store." width='150px' height='150px'>";
                   echo "Data inputed successfully";
               }       
          }
      }
    $dataTime = date("Y-m-d H:i:s");
  }

  if($Password == $RePassword) {
    $UserDataObj = new UserData();
    $Connection = $UserDataObj->ConnectionCheck("Blog","password","root");
    if($Connection == 1 ) {
      $data = $UserDataObj->SignUp($FirstName,$LastName,$Address,$PhoneNumber,$EmailAddress, $UserName,$Password, $file_store,$dataTime);
      /*if($data == 1){
        header("location:./LoginPageDetails.php");
      } else {
        return 0;
      }*/
      
    } else {
        echo "There is a connection error in the database";
    }
  } else {
      echo "Re-enter the password";
  }
  
?>