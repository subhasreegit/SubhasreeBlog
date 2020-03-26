<?php
  $address = "/var/www/html/Blog/MVC/Model/DatabaseConnection.php";
  //include ("./DatabaseConnection.php ");
  include($address);
  /*
  **Here the class userData is consist of the functions through which we can store the data taken by the usr in the database, find the data from the database.
  */

  class UserData extends DatabaseConnection {

    
    /*
    **checking of the username and password available or not
    */

    public function userNamePasswordCheck($username,$password) {
      $userNameReturn = "select PersonId from Credential where UserName = '$username'";
      $passwordReturn = "select PersonId from Credential where Password = '$password'";
      $object = new DatabaseConnection ();
      $resPonse1 = $object -> ConnectionCheck ($userNameReturn); 
      $resPonse1 = $object -> ConnectionCheck ($passwordReturn); 
      $val1 = mysqli_fetch_assoc ($resPonse1);
      $val2 = mysqli_fetch_assoc ($resPonse1);
      if($val1) {
        return 0;
      }
      else if ($val2) {
        return 0;
      }
      else {
        return 1;
      }
    }

    /*
    **this function will check the email id already exsist or not
    */

    public function emailCheck($email) {
      $emailResponse = "select PersonId from PersonalDetails where Email = '$email'";
      $object = new DatabaseConnection ();
      $resPonse1 = $object -> ConnectionCheck ($emailResponse); 
      $val1 = mysqli_fetch_assoc ($resPonse1);
      if($val1) {
        return 0;
      }
      else {
        return 1;
      }
    }

    /*
    **this function will check the phone number is vallied or not
    */

     public function phoneNumberCheck($phoneNumber) {
      $emailResponse = "select PersonId from PersonalDetails where PhoneNumber = '$phonenumber'";
      $object = new DatabaseConnection ();
      $resPonse1 = $object -> ConnectionCheck ($emailResponse); 
      $val1 = mysqli_fetch_assoc ($resPonse1);
      if($val1) {
        return 0;
      }
      else {
        return 1;
      }
    }



    /*
    **Through this function we are putting the personal details in the database
    */


    public function UserCredentialEntry ( $firstName , $lastName , $address , $phoneNumber , $emailAddress , $userName , $password , $file_store , $dataTime ) {
      $personalDataEntry = " INSERT INTO PersonalDetails ( FirstName , LastName , Address , PhoneNumber , Email , ImageAddress , CreatedTime) VALUES ('$firstName','$lastName','$address','$phoneNumber','$emailAddress','$file_store','$dataTime')";
      $userNamePasswordEntry = "INSERT INTO Credential(UserName,Password) VALUES('$userName','$password')";
      $object = new DatabaseConnection();
      $resPonse1 = $object -> ConnectionCheck ( $personalDataEntry );
      $resPonse2 = $object -> ConnectionCheck ( $userNamePasswordEntry );
      if ($resPonse1) {
        if ($resPonse2) {
          return 1;
        }
      } 
      else {
        return 0;
      }
    }

    /*
    **Using this function we are putting the user proved blog details in the databse
    */

    public function blogDataEntry($Id,$title,$content) {
      $contentEntry = " INSERT INTO BlogData (Title,Content,PersonId) VALUES ('$title','$content','$Id')";
      $object = new DatabaseConnection ();      
      $resPonse1 = $object -> ConnectionCheck ($contentEntry);
      print_r ($resPonse1);
      if ($resPonse1) {
          return 1;
      } 
      else {
        return 0;
      }
    }  

    /*
    **Through this function we are checking the log in details and it returns the person id of the user
    */  

    public function LogInCheck ($userName,$passWord) {
      $i=0;
      $PersonalIdSelect = "select PersonId from Credential where UserName='$userName' and Password='$passWord'";
      $object = new DatabaseConnection();
      $personalIdConn = $object -> ConnectionCheck($PersonalIdSelect);     
      $PersonalIdVal = mysqli_fetch_assoc ($personalIdConn);
      if ($PersonalIdVal['PersonId'] != "") {
        $temp[$i++] = 1;
        $temp[$i] = $PersonalIdVal['PersonId'];
      }
      else {
        $temp[$i++] = 0;
        $temp[$i] = "NULL";
      }
      return $temp;
    }

    /*
    ** Through this function we display the image of the user who has loged in.
    */

    public function imageView($personId) {
      $PersonalData = "select ImageAddress,CreatedTime from PersonalDetails where PersonId='$personId'";
       $object = new DatabaseConnection();
      $resPonse1 = $object -> ConnectionCheck ($PersonalData);
      $PersonalDetail= mysqli_fetch_assoc ($resPonse1);
      echo "<img src = ".$PersonalDetail['ImageAddress']." width = '100px' height = '100px' style = 'border-radius: 50%'>" . "<br>" . "<br>" . $PersonalDetail['CreatedTime'];
    }

    /*
    **It returns the entire personal details 
    */

    public function myBlogDetails()  { 
      $blogData = "select * from BlogData";
      $object = new DatabaseConnection();
      $resPonse1 = $object -> ConnectionCheck ($blogData); 
      $blogdata = [];
      while ($blogDetail = mysqli_fetch_assoc ($resPonse1)) { 
        $data1 = $blogDetail['PersonId'] ;
        $ID = $_SESSION['ID'];
        if ($blogDetail['PersonId'] == $ID) {
        $blogdata[] = $blogDetail;
        }
      }
      return $blogdata;
    }

    /*
    **It retuns the blog details whoes person id is send
    */

    public function blogData($blogid) {
      $blogDetails = "select * from BlogData where BlogId = '$blogid'";
      $object = new DatabaseConnection();
      $resPonse1 = $object -> ConnectionCheck ($blogDetails);
      $Blogdata = [];
      while($blogDetails = mysqli_fetch_assoc ($resPonse1)) {
        $Blogdata = $blogDetails;
      }
      return $Blogdata;
    }

    /*
    **It retuns the personal details whoes person id is send
    */

    public function mydetails($data1) {
      $PersonalData = "select * from PersonalDetails where PersonId='$data1'";
      $blogdata = [];
      $object = new DatabaseConnection ();
      $resPonse1 = $object -> ConnectionCheck ($PersonalData);
      while ($PersonalDatas = mysqli_fetch_assoc ($resPonse1)) {
        $blogdata[] = $PersonalDatas;
      }
      return $blogdata;
    }

    /*
    **It retuns the blog details of every blog 
    */

    public function showBlogContent()  {
      $blogData = "select * from BlogData";
      $object = new DatabaseConnection ();
      $resPonse1 = $object -> ConnectionCheck($blogData); 
      $blogdata = [];
      while ($blogDetail = mysqli_fetch_assoc ($resPonse1)) {      
        $blogdata [] = $blogDetail;       
      }
      return $blogdata;
    } 
  }
?>
  
