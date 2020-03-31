<?php

  include("./Model/UserDataControl.php");

  if (isset($_POST["Regester"])) {
    $i = 0;
    $UserName = $_POST['UserName'];
    $Password = $_POST['PassWord'];
    $RePassword = $_POST['RePassword'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $EmailAddress = $_POST['Email'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Address = $_POST['Address'];

    //the object of user data class is created
    $UserDataObj = new UserData();
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tem_loc = $_FILES['file']['tmp_name'];
    $file_store = "../images/".$file_name;

    //the uploaded image is stored in the given path folder
    move_uploaded_file($file_tem_loc, $file_store);


    if(isset($_POST["FirstName"])) {

      //back end firstname check
      $firstNameCheck = preg_match("/^([a-zA-Z' ]+)$/",$_POST['FirstName']);
      if(!$firstNameCheck) {
        echo "<br>" . "Only characters are allowed in the First name" . "<br>";
        $i = 1;
      }
    }

    if(isset($_POST["LastName"])) {

      //backend lastname check
      $firstNameCheck = preg_match("/^([a-zA-Z' ]+)$/",$_POST['LastName']);
      if(!$firstNameCheck) {
        echo "<br>" . "Only characters are allowed in the Last name" . "<br>";
        $i = 1;
      }
    }


    if(isset($_POST['Email'])) {

      //backend email check
      $firstNameCheck = preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$_POST['Email']);
      if(!$firstNameCheck) {
        echo "<br>" . "Enter valid Email Id" . "<br>";
        $i = 1;
      }
      else {

        //calling the fuction username check for the user name avability
        $response1  = $UserDataObj -> userNameCheck($EmailAddress);
        if($response1 == 1) {
          echo "<br>" . "This email already exsist enter another one.";
           $i = 1;
        }
      }
    }

    if(isset($_POST["PhoneNumber"])) {

        //backend phone number check
        $firstNameCheck = preg_match("/^[0-9]{10}$/",$_POST['PhoneNumber']);
        if(!$firstNameCheck) {
          echo "<br>" .  "Enter correct phone number";
          $i = 1;
        }
        else {

          //call th function to check weather the the phone number exsist or not
          $response3 = $UserDataObj -> phoneNumberCheck($PhoneNumber);
          if($response1 == 1) {
            echo "<br>" . "This Phone number already exsist enter another one.";
            $i = 1;
          }
        }
      }

    if($_POST['UserName']) {

      //calling the fuction username check for the user name avability
      $response1  = $UserDataObj -> userNameCheck($UserName);
      if($response1 == 1) {
        echo "<br>" . "This usernam already exsist enter another username.";
        $i = 1;
      }
    }

    if($i == 0) {
      if($Password == $RePassword) {

        //the date function will return today's date and time
        $dataTime = date("Y-m-d H:i:s");

        //through this function the datais saved in the database
        $data = $UserDataObj -> UserCredentialEntry($FirstName,$LastName,$Address,$PhoneNumber,$EmailAddress, $UserName,$Password,$file_store,$dataTime); //through this function the user enter data is saved in the datase
        if($data == 1){
          header("location:../index.php/login"); //in login page redirect
        } 
        else {
          return 0;
        }
      }
      else {
        echo "Re enter password";
      }
    }
  }  
?>