<?php

  require '../../vendor/autoload.php';
  use Model\UserDataControl.php;
  
  echo "223";
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Regester'])){

    echo "404";
    $i = 0;
    $UserName = $_POST['UserName'];
    $Password = $_POST['PassWord'];
    $RePassword = $_POST['RePassword'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $EmailAddress = $_POST['Email'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Address = $_POST['Address'];

      
      /*if(isset($FirstName)) {
        echo "123";
        $FirstName = trim($UserName);
        $FirstNameResult = preg_match("/^[a-zA-Z]{1,}$/",$FirstName);

        if(!$LastNameResult) {
          echo "Only letters are available.Please enter your name correctly."
          $i = 1;
        }
      }

      if(isset($LastName)) {
        $LastName = trim($UserName);
        $LastNameResult = preg_match("^[A-Za-z]+$",$LastName);

        if(!$LastNameResult) {
          echo "Only letters are available.Please enter your name correctly."
          $i = 1;
        }
      }
*/

      /*if(isset($_POST['Email'])) {
        //$EmailAddress = trim($EmailAddress);
        $EmailResult = preg_match("/^([_a-z0-9-])+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})?$/",$_POST['Email']);
        if(!$EmailResult) {
          echo "Enter a valid email id ";
          $i = 1;
        }
      }*/
/*
      if(isset($PhoneNumber)) {
        $PhoneNumber = trim($PhoneNumber);
        $PhoneNumberResult = preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$PhoneNumberResult);

        if(!$PhoneNumberResult) {
          echo "Only letters are available.Please enter your name correctly."
          $i = 1;
        }
      }

      $response1 = $UserDataObj -> userNameCheck($UserName);

      $response2 = $UserDataObj -> emailCheck($EmailAddress);

      $response3 = $UserDataObj -> phoneNumberCheck($PhoneNumber);

      if ($response1 == 1) {
       echo "Username already exsist.Plese try another again.";
       $i = 1;
      }

      if($response2 == 1 ) {
        echo "Email id already exsist";
        $i = 1;
      }

      else if ($response3 == 1 ) {
        echo "PhoneNumber already exsist";
        $i = 1;
      }
    }

    /*if(isset($_POST['Regester'])){
      $file_name = $_FILES['file']['name'];
      $file_type = $_FILES['file']['type'];
      $file_size = $_FILES['file']['size'];
      $file_tem_loc = $_FILES['file']['tmp_name'];
      $file_store = "../images/".$file_name;
      move_uploaded_file($file_tem_loc, $file_store); //the image file is saved in the desired file                       
    }*/

    /*if($i == 0) {
      $dataTime = date("Y-m-d H:i:s");
      if($Password == $RePassword) {
        $UserDataObj = new UserData(); //the object of Userdata class
        $data = $UserDataObj -> UserCredentialEntry($FirstName,$LastName,$Address,$PhoneNumber,$EmailAddress, $UserName,$Password,$file_store,$dataTime); //through this function the user enter data is saved in the datase

        if($data == 1){
          //header("location:../View/LoginPageDetails.php"); //in login page redirect
          echo "successfull";
        } 
        else {
          //header("location:../View/SignUp.php");
          echo "Regerstr unsuccessfull.Please try again";
        }
      } 
    }*/
  }

























  /*if(isset($_POST["Regester"])){

    

    //here we made the object of UserData class
    $UserDataObj = new UserData();

    //this function will return the response of the userid or password is exsist or not
    $response1 = $UserDataObj -> userNameCheck($UserName);

    //this function will return a response that will define the email id is already in the database or not
    $response2 = $UserDataObj -> emailCheck($EmailAddress);

    //thsi will fine and return the response that the phone number is already exsist or not
    $response3 = $UserDataObj -> phoneNumberCheck($PhoneNumber);
    if($response1 == 1 && $response2 == 1 && $response3 == 1 ) {

        
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
*/
  
?>