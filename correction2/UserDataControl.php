<?php

  class UserData {
    public function ConnectionCheck($databseName,$password,$database,$Querry) {
      $mysqli = new mysqli("localhost","$database","$password","$databseName");
      if ($mysqli -> connect_errno) {
        echo "Connection failed";
        exit();
      }
      else{
        $resPonse1 = $mysqli->query($Querry);
        return $resPonse1;

      }
    }

    public function UserCredentialEntry($databseName,$Password,$database,$firstName,$lastName,$address,$phoneNumber,$emailAddress,$userName,$password,$file_store,$dataTime) {
      $personalDataEntry = " INSERT INTO PersonalDetails (FirstName,LastName,Address,PhoneNumber,Email,ImageAddress,CreatedTime) VALUES ('$firstName','$lastName','$address','$phoneNumber','$emailAddress','$file_store','$dataTime')";
      $userNamePasswordEntry = "INSERT INTO Credential(UserName,Password) VALUES('$userName','$password')";
      $object = new UserData();
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$personalDataEntry);
      $resPonse2 = $object->ConnectionCheck("$databseName","$Password","$database",$userNamePasswordEntry);
      if($resPonse1) {
        if($resPonse2) {
          return 1;
        }
      } else {
        return 0;
      }
    }   

    public function LogInCheck($userName,$passWord) {
      $i=0;
      $conn = new mysqli("localhost","root","password","Blog");
      $PersonalIdSelect = "select PersonId from Credential where UserName='$userName' and Password='$passWord'";
      $personalIdConn = $conn->query($PersonalIdSelect);
      $PersonalIdVal = mysqli_fetch_assoc($personalIdConn);
      if($PersonalIdVal['PersonId'] != "") {
        $temp[$i++] = 1;
        $temp[$i] = $PersonalIdVal['PersonId'];
      } else {
        $temp[$i++] = 0;
        $temp[$i] = "NULL";
      }
      return $temp;
    }

    public function imageView($databseName,$Password,$database,$personId) {
      $PersonalData = "select ImageAddress,CreatedTime from PersonalDetails where PersonId='$personId'";
       $object = new UserData();
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$PersonalData);
      $PersonalDetail = mysqli_fetch_assoc($resPonse1);
      echo "<img src=".$PersonalDetail['ImageAddress']." width='100px' height='100px' style='border-radius: 50%''>"."<br>"."<br>" .$PersonalDetail['CreatedTime'];

    }

    public function LogInPageCredentialView($databseName,$Password,$database,$personId) {
      $PersonalData = "select FirstName,LastName,Address,PhoneNumber,Email,ImageAddress,CreatedTime from PersonalDetails where PersonId='$personId'";
      $object = new UserData();
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$PersonalData);
      $PersonalDetail = mysqli_fetch_assoc($resPonse1);
      echo "<br>";
      echo $PersonalDetail['FirstName']." ".$PersonalDetail['LastName']."<br>".$PersonalDetail['Address']."<br>".$PersonalDetail['Email']."<br>".$PersonalDetail['PhoneNumber'];

    }

    public function blogDataEntry($databseName,$Password,$database,$Id,$title,$content) {
      //echo $Id."<br>".$title."<br>".$content."<br>";
      $contentEntry = " INSERT INTO BlogData (Title,Content,PersonId) VALUES ('$title','$content','$Id')";
      $object = new UserData();      
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$contentEntry);
      print_r($resPonse1);
      if($resPonse1) {
          return 1;
      } else {
        return 0;
      }
    } 

    public function myBlogDetails($databseName,$Password,$database)  {
      $blogData = "select * from BlogData";
      $object = new UserData();
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$blogData); 
      $blogData = [];
      while ($blogDetail = mysqli_fetch_assoc($resPonse1)) {
        $data1 = $blogDetail['PersonId']."<br>";
        $ID = $_SESSION['ID'];
        if ($blogDetail['PersonId'] == $ID) {
          $blogdata[] = $blogDetail;

        }
      }
      return $blogdata;
    }

    public function mydetails($databseName,$Password,$database,$data1) {
      $object = new UserData();
      $PersonalData = "select FirstName,LastName from PersonalDetails where PersonId='$data1'";
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$PersonalData);
      while ($PersonalDatas = mysqli_fetch_assoc($resPonse1)) {
          $blogdata[] = $PersonalDatas;
        }
        return $blogdata;
      }
    
      

    public function showBlogContent($databseName,$Password,$database)  {
      $blogData = "select * from BlogData";
      $object = new UserData();
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$blogData); 
      while ($blogDetail = mysqli_fetch_assoc($resPonse1)) {
        $data1 = $blogDetail['PersonId'];
          $PersonalData = "select FirstName,LastName,ImageAddress,CreatedTime from PersonalDetails where PersonId='$data1'";
          $resPonse2 = $object->ConnectionCheck("$databseName","$Password","$database",$PersonalData);
          $PersonalDetail = mysqli_fetch_assoc($resPonse2);
          echo "<br>";
          echo "<img src=".$PersonalDetail['ImageAddress']." width='100px' height='100px' style='border-radius: 50%''>"."<br>"."<br>" .$PersonalDetail['CreatedTime']."<br>";
          echo $PersonalDetail['FirstName']." ".$PersonalDetail['LastName']."<br>";
          echo "TITLE:"."<br>".$blogDetail['Title']."<br>"."CONTENT:"."<br>".$blogDetail['Content'];
          echo "<br>"."<br>";
              
      }
    }

    public function myBlogContent($databseName,$Password,$database)  {
      $blogData = "select * from BlogData";
      $object = new UserData();
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$blogData); 
      while ($blogDetail = mysqli_fetch_assoc($resPonse1)) {
        $data1 = $blogDetail['PersonId'];
        $ID = $_SESSION['ID'];
        if ($data1 == $ID) {
          $PersonalData = "select FirstName,LastName,ImageAddress,CreatedTime from PersonalDetails where PersonId='$data1'";
          $resPonse2 = $object->ConnectionCheck("$databseName","$Password","$database",$PersonalData);
          $PersonalDetail = mysqli_fetch_assoc($resPonse2);
          echo "<br>";
          echo "<img src=".$PersonalDetail['ImageAddress']." width='100px' height='100px' style='border-radius: 50%''>"."<br>"."<br>" .$PersonalDetail['CreatedTime']."<br>";
          echo $PersonalDetail['FirstName']." ".$PersonalDetail['LastName']."<br>";
          echo "TITLE:"."<br>".$blogDetail['Title']."<br>"."CONTENT:"."<br>".$blogDetail['Content'];
          echo "<br>"."<br>";
        }      
      }
    }

    public function blogData($databseName,$Password,$database,$blogid) {
      $blogDetails = "select Title,Content from BlogData where BlogId = '$blogid'";
      $object = new UserData();
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$blogDetails);
      $Blogdata = [];
      while($blogDetails = mysqli_fetch_assoc($resPonse1)) {
        $BlogData = $blogDetails;
      }
      return $BlogData;
    }

    public function editBlog($databseName,$Password,$database,$blogid,$title,$content) {
     $contentEntry = "update BlogData set Title ='$title', Content = '$content'  where BlogId = '$blogid'";
      $object = new UserData();      
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$contentEntry);
      print_r($resPonse1);
      if($resPonse1) {
          return 1;
      } else {
        return 0;
      }
    } 

    public function deleteBlog($databseName,$Password,$database,$blogid) {
     $contentEntry = "delete from BlogData where BlogId = '$blogid'";
      $object = new UserData();      
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$contentEntry);
      print_r($resPonse1);
      if($resPonse1) {
          return 1;
      } else {
        return 0;
      }
    } 
}
?>
  
