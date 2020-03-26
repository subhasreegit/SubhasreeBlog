<?php

  $address = "/var/www/html/Blog/MVC/Model/UserDataControl.php";
  //include("../Model/UserDataControl.php");
  include($address);

  /*
  **Through this class the user desied actions will be performed.
  */

  class blogAction extends UserData {

    /*
    **Through this function the saved blog content will be viewed
    */

    public function BlogDataView($blogid) {
      $blogData = "select * from BlogData where BlogId = '$blogid'";
      $object = new DatabaseConnection ();
      $resPonse1 = $object -> ConnectionCheck ( $blogData ); 
      $blogData = [];
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
      $object = new DatabaseConnection();      
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
      $object = new DatabaseConnection();      
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