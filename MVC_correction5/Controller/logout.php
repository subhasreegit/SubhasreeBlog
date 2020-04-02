<?php

  //the session is start
  session_start(); 

  //here we are destroying the session   
  session_destroy(); 

  //redirecting to the home page
  header("Location:http://www.example.com/firstpage");
?>
