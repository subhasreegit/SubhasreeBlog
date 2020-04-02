<?php
  
  //session start
  session_start();
  include("./Model/blogAction.php");

  if(isset($_SESSION['ID'])){

  } 
  else {

    //redirect the page to the login details page
    header('Location:http://www.example.com/login');
  }


  //made the object of the blogAction
  $object = new Model\blogAction();?>
  <html>
    <head>
      <title>View Page</title>
      <link rel = "stylesheet" type = "text/css" href = "../Css/homePageContentView.css">
    </head>
    <body>
      <div class = "container">
        <div class = "Header">
          <h1> WELCOME <?php echo $_SESSION ['username'];?></h1>
          <a href = " http://www.example.com/myBlog"><button> My Blog</button></a>
          <a href = "http://www.example.com/logout "><button> Log out</button></a>
        </div>
          <?php

          //calling the function and save the data on a array blogdataview to take the detail blog information of that blog
          $blogData = $object -> BlogDataView ( $_SESSION['BLOGID'] );

          //calling the function and save the data on a array of mydetails through which the detil information about the auther is called
          $personaldata = $object-> mydetails ( $_SESSION['ID'] );?>
          <div class = "contentbody">
            <?php
          foreach ( $blogData as $key => $value ) {

            //here we are displaying the image of the auther
            $object -> imageView ($_SESSION['ID'] );
            echo "<br>";
            foreach ( $personaldata as $key1 => $value1 ) {
              echo $value1 ['FirstName'] . " " . $value1['LastName']."<br>" . "<br>";

              //it shows the picture of the blog
              $object -> blogImageView ($value['BlogId'] );
              echo "<b>" . "Title:" . "</b>" . " " . $value['Title'] . "<br>";
              echo "<b>" . "Content:" . "</b>". " " . $value['Content'] . "<br>" . "<br>"?>
              <form action = "http://www.example.com/myblog" method = "POST" enctype = "multipart/form-data">
                <input type = "submit" name = "Back" id = "Back" value = "Back">
              </form>
              <?php 
            }?>
          </div>
          <?php
          }?>
      </div>
    </body>
  </html>


