<?php
  require './vendor/autoload.php';

  $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

  if ('/' == $url) {
    include './View/index.php';
  }
  else if('/test' == $url) {
    require './Controller/test.php';
  }
  else if('/firstpage' == $url) {
    require './View/index.php';
  }
  else if('/login' == $url) {
    require './View/LoginPageDetails.php';
  }
  else if('/signup' == $url) {
    require './View/SignUp.php';
  }
  else if('/logout' == $url) {
    require './Controller/logout.php';
  }
  else if('/RegesterDataView' == $url) {
    require './Controller/RegesterDataView.php';
  }
  else if('/homepage' == $url) {
    require './View/homePageView.php';
  }
  else if('/homePage' == $url) {
    require './Controller/homePage.php';
  }
  else if('/myblog' == $url) {
    require './View/myBlog.php';
  }
  else if('/homepageviewblog' == $url) {
    require './View/homePageView.php';
  }
  else if('/homePageBlogContent' == $url) {
    require './View/homePageBlogContent.php';
  }
  else if('/fullContentShow' == $url) {
    require './View/fullContentShow.php';
  }
  else if('/myblogPageView' == $url) {
    require './View/viewpage.php';
  }
  else if('/addpost' == $url) {
    require './View/addPost.php';
  }
  else if('/editpost' == $url) {
    require './View/editPost.php';
  }
  else if('/deletepost' == $url) {
    require './View/deletePost.php';
  }
  else if('/savepost' == $url) {
    require './Controller/savePost.php';
  }
  else if('/confirmdelete' == $url) {
    require './Controller/confirmDelete.php';
  }
  else {
    require './notfound.php';
  }
  
?>