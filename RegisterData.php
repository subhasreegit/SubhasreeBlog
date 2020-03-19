<?php
  spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class);
    require_once('./' . $class . '.php');
  });

  $servername = "localhost";
  $username = "root";
  $password = "password";
  $dbname = "Blog";


  $conn = new mysqli($servername, $username, $password, $dbname);

  if(isset($_POST['name'])){
    if( isset($_POST['PassWord'])){
      $FirstName=$_POST['firstname'];
      $LastName=$_POST['LastName'];
      $EmaIl=$_POST['email'];
      $PhoneNumber=$_POST['NumBer'];
      $UserName=$_POST['name'];
      $PassWord=$_POST['PassWord'];
    }
  }

    echo "123";

?>