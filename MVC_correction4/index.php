<?php
  require './vendor/autoload.php';

  $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

  if ('/' == $url) {
    include './View/index.php';
  }
  else if('/index.php/firstpage' == $url) {
    require './View/index.php';
  }
  else if('/index.php/a' == $url) {
    require './Model/UserData.php';
  }
  else if('/index.php/login' == $url) {
    require './View/LoginPageDetails.php';
  }
  else if('/index.php/signup' == $url) {
    require './View/SignUp.php';
  }
  else if('/index.php/logout' == $url) {
    require './Controller/logout.php';
  }
  else if('/index.php/RegesterDataView' == $url) {
    require './Controller/RegesterDataView.php';
  }
  else if('/index.php/homepage' == $url) {
    require './View/homePageView.php';
  }
  else if('/index.php/homePage' == $url) {
    require './Controller/homePage.php';
  }
  else if('/index.php/myblog' == $url) {
    require './View/myBlog.php';
  }
  else if('/index.php/homepageviewblog' == $url) {
    require './View/homePageView.php';
  }
  else if('/index.php/homePageBlogContent' == $url) {
    require './View/homePageBlogContent.php';
  }
  else if('/index.php/fullContentShow' == $url) {
    require './View/fullContentShow.php';
  }
  else if('/index.php/myblogPageView' == $url) {
    require './View/viewpage.php';
  }
  else if('/index.php/addpost' == $url) {
    require './View/addPost.php';
  }
  else if('/index.php/editpost' == $url) {
    require './View/editPost.php';
  }
  else if('/index.php/deletepost' == $url) {
    require './View/deletePost.php';
  }
  else if('/index.php/savepost' == $url) {
    require './Controller/savePost.php';
  }
  else if('/index.php/confirmdelete' == $url) {
    require './Controller/confirmDelete.php';
  }
  
?>