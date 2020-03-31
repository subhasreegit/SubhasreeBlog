<?php

  /*
  **In this function the connecttion of the databse is checked
  */

  class DatabaseConnection {

    /*
    **Here the connection is checked and the response is returned
    */
    public function ConnectionCheck ($Querry) {
      $mysqli = new mysqli("localhost" , "root" , "password" , "Blog");
      if ($mysqli -> connect_errno) {
        echo "Connection failed";
        exit();
      }
      else{
        $resPonse1 = $mysqli -> query($Querry);
        return $resPonse1;
      }
    }

    /*
    **database connection is closed
    */

    public function MyDatabaseClose ($mysqli) {
      mysql_close ($mysqli) ; 
    }
  }
?>