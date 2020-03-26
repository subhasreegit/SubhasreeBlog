<?php

  //include("./UserDataControl.php");
  $address = "/var/www/html/Blog/MVC/Model/UserDataControl.php";
  include($address);

  if(isset($_POST["Regester"])){

    $UserName = $_POST['UserName'];
    $Password = $_POST['PassWord'];
    $RePassword = $_POST['RePassword'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $EmailAddress = $_POST['Email'];

    //here we made the object of UserData class
    $UserDataObj = new UserData();

    //this function will return the response of the userid or password is exsist or not
    $response1 = $UserDataObj -> userNamePasswordCheck($UserName,$Password);

    //this function will return a response that will define the email id is already in the database or not
    $response2 = $UserDataObj -> emailCheck($EmailAddress);

    //thsi will fine and return the response that the phone number is already exsist or not
    $response3 = $UserDataObj -> phoneNumberCheck($PhoneNumber);
    if($response1 == 1 && $response2 == 1 && $response3 == 1 ) {

        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Address = $_POST['Address'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST['Regester'])){
            $file_name = $_FILES['file']['name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];
            $file_tem_loc = $_FILES['file']['tmp_name'];
            $file_store = "../images/".$file_name;
            move_uploaded_file($file_tem_loc, $file_store); //the image file is saved in the desired file                       
          }
        }
        $dataTime = date("Y-m-d H:i:s");
      if($Password == $RePassword) {
        $UserDataObj = new UserData(); //the object of Userdata class
          $data = $UserDataObj -> UserCredentialEntry($FirstName,$LastName,$Address,$PhoneNumber,$EmailAddress, $UserName,$Password,$file_store,$dataTime); //through this function the user enter data is saved in the datase
          if($data == 1){
            header("location:../View/LoginPageDetails.php"); //in login page redirect
          } 
          else {
            return 0;
          }
      } 
      else {
        echo "Re-enter the password";
      }
    }
    else {
      if ($response1 == 1) {
        echo "Username or password already exsist.Plese try again.";
      }
      else if($response2 == 1 ) {
        echo "Email already exsist";
      }
      else if ($response3 == 1 ) {
        echo "PhoneNumber already exsist";
      }
      else {
        echo "Please change your emailid,phonenumber,userid,password.";
      }
    }
  }

  
?>