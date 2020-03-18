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
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
    $dataTime = date("Y-m-d H:i:s");
  }
  if($MiddleName == "") {
    $MiddleName = "NULL";
  }

  if($Password == $RePassword) {
    $UserDataObj = new UserData();
    $Connection = $UserDataObj->ConnectionCheck("Blog","password","root");
    if($Connection == 1 ) {
      $data = $UserDataObj->SignUp($FirstName,$LastName,$Address,$PhoneNumber,$EmailAddress, $UserName,$Password,$imgContent,$dataTime);
      if($data == 1){
        header("location:./LoginPageDetails.php");
      } else {
        return 0;
      }
      
    } else {
        echo "There is a connection error in the database";
    }
  } else {
      echo "Re-enter the password";
  }
  
?>