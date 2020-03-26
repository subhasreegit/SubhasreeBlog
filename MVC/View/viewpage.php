<?php
    session_start();
    //include("./blogAction.php");
    $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
    include($address);

  if(isset($_SESSION['ID'])){

  } else{
        header('Location:./LogInDetails.php');
  }
  //made the object of the blogAction
  $object = new blogAction();?>
  <html>
    <head>
      <title>View Page</title>
      <link rel = "stylesheet" type = "text/css" href = "../Css/homePageCss.css">
    </head>
    <body>
      <div class = "container">
        <div class = "Header">
          <h1> WELCOME <?php echo $_SESSION ['username'];?></h1>
          <a href = " ../View/myBlog.php "><button> My Blog</button></a>
          <a href = " ../Controller/logout.php "><button> Sign out</button></a>
        </div>
        <div class = "body content">
          <?php
          //calling the function and save the data on a array blogdataview to take the detail blog information of that blog
          $blogData = $object -> BlogDataView ( $_SESSION['BLOGID'] );

          //calling the function and save the data on a array of mydetails through which the detil information about the auther is called
          $personaldata = $object-> mydetails ( $_SESSION['ID'] );
          foreach ( $blogData as $key => $value ) {

            //here we are displaying the image of the auther
            $object -> imageView ($_SESSION['ID'] );
            echo "<br>";
            foreach ( $personaldata as $key1 => $value1 ) {
              echo $value1 ['FirstName'] . " " . $value1['LastName']."<br>";
              echo "Title:" . " " . $value['Title'] . "<br>";
              echo "Content:" . " " . $value['Content'] . "<br>"?>
              <form action = "test.php" method = "POST" enctype = "multipart/form-data">
                <input type = "submit" name = "Edit" id = "Edit" value = "Edit Post">
                <input type = "submit" name = "Delete" id = "Delete" value = "Delete Post">
              </form>
              <?php 
            }
          }?>
        </div>
      </div>
    </body>
  </html>


