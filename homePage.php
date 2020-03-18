<?php
  session_start();
  include("./UserDataControl.php");

  if(isset($_POST["LogIn"])) {
    $userName = $_POST['UserName'];
    $passWord = $_POST['Password'];
    $logInObj = new UserData();
    $tempData = $logInObj->LogInCheck($userName,$passWord);
    if ($tempData[0] == 1) {
      echo "welcome"."<br>";
      //$logInObj->LogInPageView($tempData[1]);
        $logInObj->LogInPageView($tempData[1]);
    } else {
      echo "<b>"."Enter correct user id and password"."<b>";
    }
  }
  

  

?>