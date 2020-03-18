<?php
  class UserData {
    public function ConnectionCheck($databseName,$password,$database) {
      $mysqli= new mysqli("localhost","$database","$password","$databseName");
      if ($mysqli -> connect_errno) {
        return 0;
      }
      else{
        return 1;
      }
    }

    public function SignUp($firstName,$lastName,$address,$phoneNumber,$emailAddress,$userName,$password,$imgContent,$dataTime) {
      $i=0;
      echo $phoneNumber;
      $conn = new mysqli($servername, $username, $password, $dbname);
      $personalDataEntry = " INSERT INTO PersonalDetails (FirstName,LastName,Address,PhoneNumber,Email) VALUES ('$firstName','$lastName','$address','$phoneNumber','$emailAddress')";
      mysqli_query($conn, $personalDataEntry);
      $userNamePasswordEntry = "INSERT INTO Credential(UserName,Password) VALUES('$userName','$password')";
      mysqli_query($conn, $userNamePasswordEntry);
      $imageEntry = "INSERT INTO Image(ImaGe,Created) VALUES('$imgContent','$dataTime')";
      mysqli_query($conn, $imageEntry);
      if($personalDataEntry) {
        $i=1;
      } else if ($userNamePasswordEntry) {
        $i = 1;
      } else if ($imageEntry) {
        $i = 1;
      }
      if($i == 1){
        return $i;
      } else {
        return 0;
      }
    }

    public function LogInCheck($userName,$passWord) {
      $i=0;
      $conn = new mysqli("localhost","root","password","Blog");
      $PersonalIdSelect = "select PersonId from Credential where UserName='$userName' and Password='$passWord'";
      $personalIdConn=mysqli_query($conn,$PersonalIdSelect);
      $PersonalIdVal=mysqli_fetch_assoc($personalIdConn);
      if($PersonalIdVal['PersonId'] != "") {
        $temp[$i++] = 1;
        $temp[$i] = $PersonalIdVal['PersonId'];
      } else {
        $temp[$i++] = 0;
        $temp[$i] = "NULL";
      }
      return $temp;
    }

    public function LogInPageView($personId) {
      $db = new mysqli("localhost","root","password","Blog");
      /*$result = $db->query("SELECT image FROM Image WHERE PersonId = $personId");
       if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
      }else{
        echo 'Image not found...';
      }*/
      $PersonalData = "select FirstName,LastName,Address,PhoneNumber,Email from PersonalDetails where PersonId='".$personId."'";
      $personDetailsConn = mysqli_query($db,$PersonalData);
      $PersonalDetail = mysqli_fetch_assoc($personDetailsConn);
      echo $PersonalDetail['FirstName']." ".$PersonalDetail['LastName']."<br>".$PersonalDetail['Address']."<br>".$PersonalDetail['Email']."<br>".$PersonalDetail['PhoneNumber'];

    }
  }
?>