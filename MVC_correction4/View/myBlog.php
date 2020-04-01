<?php
    session_start();

  if(isset($_SESSION['ID'])) {
  } 
  else {

    //it will redirect the page to the 
    header('Location:../View/LogInDetails.php');
  }?>
  <html>
    <head>
      <title> My Blog </title>
        <link rel = " stylesheet " type = " text/css " href = "../Css/myBlogCss.css ">
    </head>
  <body>  
    <div class = "container">
      <div class = "Header">
        <h1> MY BLOG PAGE </h1>
        <a href = " ../index.php/addpost"><button> Add Blog </button></a>
        <a href = " ../index.php/logout "><button> Log out </button></a>
        <a href = '../index.php/homepageviewblog '><button> Back </button></a>
      </div>
      <div class = "bodycontent">
        <?php
        //here we made the object function blogaction class
        $logInObj = new Model\blogAction();

        //Here we are calling this function to find the blog details
        $blogData = $logInObj->myBlogDetails();

        //here this function returns the auther details
        $personaldata = $logInObj-> mydetails($_SESSION['ID']);
        if($blogData) {
          foreach($blogData as $key => $value) {?>
            <div class = "contentbody">
              <?php

            //display the picture of the auther
            $logInObj-> imageView($_SESSION['ID']);
            echo "<br>";
            foreach($personaldata as $key1 => $value1) {
              echo $value1['FirstName'] . " " . $value1['LastName'] . "<br>" . "<br>";

              //shows the picture of the blog 
              $logInObj-> BlogImageView($value['BlogId']);
              echo "Title:" . " " . $value['Title'] . "<br>" . "<br>";?>
              <form action = "../Controller/test.php" method="POST" enctype="multipart/form-data">
                <input type = "hidden" name = "action" id = "action" value = "<?php echo $value['BlogId']; ?>">
                <input type = "submit" name = "View" id = "View" value = "View Post">
                <input type = "submit" name = "Edit" id = "Edit" value = "Edit Post">
                <input type = "submit" name = "Delete" id = "Delete" value = "Delete Post">
              </form>
            <?php 
            }?>
          </div>
          <?php
          }
        }?>
      </div>
    </div>
  </body>
</html>