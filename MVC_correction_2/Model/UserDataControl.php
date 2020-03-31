<?php
  $address = "/var/www/html/Blog/MVC/Model/DatabaseConnection.php";
  include($address);

  /*
  **Here the class userData is consist of the functions through which we can store the data taken by the usr in the database, find the data from the database. and it nherited the class DatabaseConnection
  */

  class UserData extends DatabaseConnection {

    
    /*
    **checking of the username and password available or not
    */

    public function userNameCheck($username) {
      $userNameReturn = "select PersonId from Credential where UserName = '$username'";

      //the object of databaseConnection
      $object = new DatabaseConnection ();

      //calling the function connectioncheck
      $resPonse1 = $object -> ConnectionCheck ($userNameReturn);

      //the fetched value assignment 
      $val1 = mysqli_fetch_assoc ($resPonse1);
      if(!$val1) {
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

      //the object of databaseConnection
      $object = new DatabaseConnection ();

      //calling the function connectioncheck
      $resPonse1 = $object -> ConnectionCheck ($emailResponse); 

      //the fetched value assignment 
      $val1 = mysqli_fetch_assoc ($resPonse1);
      if(!$val1) {
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
      $emailResponse = "select PersonId from PersonalDetails where PhoneNumber = '$phoneNumber'";

      //the object of databaseConnection
      $object = new DatabaseConnection ();

      //calling the function connectioncheck
      $resPonse1 = $object -> ConnectionCheck ($emailResponse); 

      //the fetched value assignment 
      $val1 = mysqli_fetch_assoc ($resPonse1);
      if(!$val1) {
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

      //the object of databaseConnection
      $object = new DatabaseConnection();

      //connectio check
      $resPonse1 = $object -> ConnectionCheck ( $personalDataEntry );

      //connection check
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

    public function blogDataEntry($Id,$title,$content,$imageAddres) {
      $contentEntry = " INSERT INTO BlogData (Title,Content,PersonId,ImageBlog) VALUES ('$title','$content','$Id','$imageAddres')";

      //the object of databaseConnection
      $object = new DatabaseConnection ();    

      //connection check  
      $resPonse1 = $object -> ConnectionCheck ($contentEntry);
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

      //the object of databaseConnection
      $object = new DatabaseConnection();

      //connection check
      $personalIdConn = $object -> ConnectionCheck($PersonalIdSelect);   

      //value fetched  
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

      //the object of databaseConnection
       $object = new DatabaseConnection();

       //connection check
      $resPonse1 = $object -> ConnectionCheck ($PersonalData);

      //value fetched
      $PersonalDetail= mysqli_fetch_assoc ($resPonse1);
      if($PersonalDetail == "NULL") {
        echo "<img src = '../images/2-min.jpg' width = '100px' height = '100px'>" . "<br>" . "<br>" . $PersonalDetail['CreatedTime'];
      }
      else {
        echo "<img src = ".$PersonalDetail['ImageAddress']." width = '100px' height = '100px' style = 'border-radius: 50%'>" . "<br>" . "<br>" . $PersonalDetail['CreatedTime'];
      }
    }

    /*
    ** It shows the picture of the blogImage
    **/

    public function BlogImageView($blogId) {
      $PersonalData = "select ImageBlog from BlogData where BlogId='$blogId'";

      //the object of databaseConnection
       $object = new DatabaseConnection();

       //connection check
      $resPonse1 = $object -> ConnectionCheck ($PersonalData);

      //value fetched
       while($PersonalDetail = mysqli_fetch_assoc ($resPonse1)) {
        if ($PersonalDetail['ImageBlog'] == "") {
          echo "<img src = '../images/img-2.jpg' width = '300px' height = '150px'>" . "<br>" . "<br>";
        }
        else {
          echo "<img src = ".$PersonalDetail['ImageBlog']."  width = '300px' height = '150px'>" . "<br>" . "<br>";
        }
       
      }
    }


    /*
    **It returns the entire personal details 
    */

    public function myBlogDetails()  { 
      $blogData = "select * from BlogData";

      ////the object of databaseConnection
      $object = new DatabaseConnection();

      //connection check
      $resPonse1 = $object -> ConnectionCheck ($blogData); 
      $blogdata = [];

      //value fetched
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

      //the object of databaseConnection
      $object = new DatabaseConnection();

      //connection check
      $resPonse1 = $object -> ConnectionCheck ($blogDetails);
      $Blogdata = [];

      //value fetched
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

      //the object of databaseConnection
      $object = new DatabaseConnection ();

      //connection check
      $resPonse1 = $object -> ConnectionCheck ($PersonalData);

      //value fetched
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

      //the object of databaseConnection
      $object = new DatabaseConnection ();

      //connection checked
      $resPonse1 = $object -> ConnectionCheck($blogData); 
      $blogdata = [];

      //value fetched
      while ($blogDetail = mysqli_fetch_assoc ($resPonse1)) {      
        $blogdata [] = $blogDetail;       
      }
      return $blogdata;
    } 
  }
?>
  
