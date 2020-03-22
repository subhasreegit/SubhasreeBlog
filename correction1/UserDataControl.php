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
      echo "<img src=".$PersonalDetail['ImageAddress']." width='150px' height='150px' style='border-radius: 50%''>"."<br>"."<br>" .$PersonalDetail['CreatedTime'];

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
      echo $Id."<br>".$title."<br>".$content."<br>";
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

    public function myBlog($databseName,$Password,$database)  {
      $blogData = "select * from BlogData";
      $object = new UserData();
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$blogData); 
      while ($blogDetail = mysqli_fetch_assoc($resPonse1)) {
        $data1 = $blogDetail['PersonId']."<br>";
        $ID = $_SESSION['ID'];
        if ($blogDetail['PersonId'] == $ID) {
          $PersonalData = "select FirstName,LastName,ImageAddress,CreatedTime from PersonalDetails where PersonId='$data1'";
          $resPonse2 = $object->ConnectionCheck("$databseName","$Password","$database",$PersonalData);
          $PersonalDetail = mysqli_fetch_assoc($resPonse2);
          echo "<br>";
          echo "<img src=".$PersonalDetail['ImageAddress']." width='100px' height='100px' style='border-radius: 50%''>"."<br>"."<br>" .$PersonalDetail['CreatedTime']."<br>";
          echo $PersonalDetail['FirstName']." ".$PersonalDetail['LastName']."<br>";
          echo "TITLE:"."<br>".$blogDetail['Title'];
          echo "<br>"."<br>";
          $data1 = $blogDetail['BlogId'];
          echo $data1;
          /*$_SESSION['blogId'] = $blogDetail['BlogId'];
          echo '<a href="./deletePost.php"><button>Delete Blog</button></a>';
          echo  '<a href="./editPost.php"><button>Edit Blog</button></a>';
          echo '<a href="./viewPost.php"><button>view Blog</button></a>';*/
          echo '<form action="test.php" method="post">';
          //$_SESSION['blogId'] = $blogDetail['BlogId'];
          echo '<input type="hidden" name="BlogId" id="BlogId" value = $data1>';
          echo '<input type="submit" name="View" id="View" value="View">';
          echo '<input type="submit" name="Edit" id="Edit" Value="Edit">';
          echo '<input type="submit" name="Delete" id="Delete" value="Delete">';
          echo '</form>';
          //echo '<form action="editPost.php" method="post">';
          //$_SESSION['blogId'] = $blogDetail['BlogId'];
          //echo '<input type="submit" name="Edit" id="Edit" Value="Edit">';
          //echo '</form>';
          //echo '<form action="deletePost.php" method="post">';
          //$_SESSION['blogId'] = $blogDetail['BlogId'];
          //echo '<input type="submit" name="Delete" id="Delete" value="Delete">';
          //echo '</form>';
        }
      }// Querry String; get_assoc; 
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

    public function editBlog($databseName,$Password,$database) {
      $blogData = "select * from BlogData";
      $object = new UserData();
      $resPonse1 = $object->ConnectionCheck("$databseName","$Password","$database",$blogData); 
      while ($blogDetail = mysqli_fetch_assoc($resPonse1)) {
        $data1 = $blogDetail['PersonId'];
        $ID = $_SESSION['ID'];
        if ($data1 == $ID) {
          $Blogid = $blogDetail['BlogId'];
          /*$PersonalData = "select FirstName,LastName,ImageAddress,CreatedTime from PersonalDetails where PersonId='$data1'";
          $resPonse2 = $object->ConnectionCheck("$databseName","$Password","$database",$PersonalData);
          $PersonalDetail = mysqli_fetch_assoc($resPonse2);
          echo "<br>";
          echo "<img src=".$PersonalDetail['ImageAddress']." width='100px' height='100px' style='border-radius: 50%''>"."<br>"."<br>" .$PersonalDetail['CreatedTime']."<br>";
          echo $PersonalDetail['FirstName']." ".$PersonalDetail['LastName']."<br>";*/

          $title = $blogDetail['Title'];
          $content = $blogDetail['Content'];
          /*echo '<form action="" method="post">';
          echo '<label>Title:</label>'.'<br>';
          echo '<input type="text"  name="title" value = "$title">'.'<br>'.'<br>';
          echo '<label>Content:</label>'.'<br>';
          echo '<input type="text"  name="content" value = "content">'.'<br>'.'<br>';
          echo '<a href="./myBlog.php"><button>Cancel</button></a>';
          echo '<a href="./editPostSave.php"><button>Save</button></a>';
          echo '</form>';*/

      }
    }
  }

}
?>
  
