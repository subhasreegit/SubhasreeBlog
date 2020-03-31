<?php

  $address = "./Model/UserDataControl.php";
  include($address);
  

  /*
  **Through this class the user desied actions will be performed. and it inherited the userdata class
  */

  class blogAction extends UserData {

    /*
    **Through this function the saved blog content will be viewed
    */

    public function BlogDataView($blogid) {
      $blogData = "select * from BlogData where BlogId = '$blogid'";

      //here the Databaseconnection object is created
      $object = new DatabaseConnection ();

      //The connection check function is called
      $resPonse1 = $object -> ConnectionCheck ( $blogData ); 
      $blogData = [];

      //value is fetched
      while ( $blogDetail = mysqli_fetch_assoc ( $resPonse1 )) {
        $blogdata[] = $blogDetail;
      }
      return $blogdata;
    }

    /*
    **Through this function the saved blog content will be edited
    */


    public function editBlog($blogid,$title,$content) {
       $contentEntry = "update BlogData set Title ='$title', Content = '$content'  where BlogId = '$blogid'";

       //the database connection object is made
      $object = new DatabaseConnection();      

      //connectio check function is called
      $resPonse1 = $object -> ConnectionCheck($contentEntry);
      print_r ($resPonse1);
      if ($resPonse1) {
        return 1;
      } else {
        return 0;
      }
    }

    /*
    **Through this function the saved blog content will be deleted
    */
 

    public function deleteBlog($blogid) {
      $contentEntry = "delete from BlogData where BlogId = '$blogid'";

      //database connction object is created
      $object = new DatabaseConnection();   

      //connection check function is called   
      $resPonse1 = $object -> ConnectionCheck($contentEntry);
      print_r ($resPonse1);
      if ($resPonse1) {
        return 1;
      } else {
        return 0;
      }
    }
  }
?>