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

    public function SignUp($firstName,$lastName,$address,$phoneNumber,$emailAddress,$userName,$password,$file_store,$dataTime) {
      $i=0;
      $conn = new mysqli("localhost", "root", "password", "Blog");
      $personalDataEntry = " INSERT INTO PersonalDetails (FirstName,LastName,Address,PhoneNumber,Email) VALUES ('$firstName','$lastName','$address','$phoneNumber','$emailAddress')";
      mysqli_query($conn, $personalDataEntry);
      $userNamePasswordEntry = "INSERT INTO Credential(UserName,Password) VALUES('$userName','$password')";
      mysqli_query($conn, $userNamePasswordEntry);
      $imageEntry = "INSERT INTO Image(ImaGe,Created) VALUES('$file_store','$dataTime')";
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

      if ($_SERVER['REQUEST_METHOD'] == 'POST'){  
              
            echo "YOUR UPLOADED PICTURE IS:"."<br>";
            $_SESSION['imgdata1']=$_FILES['file']['name'];
            $_SESSION['imgdata2']=$_FILES['file']['type'];
            $_SESSION['imgdata3']=$_FILES['file']['size'];
            $_SESSION['imgdata4']=$_FILES['file']['tmp_name'];


            if(isset($_POST['upload'])){
                $file_name=$_FILES['file']['name'];
                $file_type=$_FILES['file']['type'];
                $file_size=$_FILES['file']['size'];
                $file_tem_loc=$_FILES['file']['tmp_name'];
                $file_store="images/".$file_name;
                if(move_uploaded_file($file_tem_loc, $file_store)){
                    echo "<img src=".$file_store." width='150px' height='150px'>";
                 }       
            }
        }

    }
  }
?>