<?php
    session_start();
  //include("./blogAction.php");
  $address = "/var/www/html/Blog/MVC/Model/blogAction.php";
  include($address);

  if(isset($_SESSION['ID'])){

  } else{
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
        <a href = " ../View/addPost.php "><button> Add Blog </button></a>
        <a href = " ../Controller/logout.php "><button> Log out </button></a>
        <a href = '../View/homePageView.php '><button> Back </button></a>
      </div>
      <div class = "bodycontent">
        <?php
        //here we made the object function blogaction class
        $logInObj = new blogAction();

        //Here we are calling this function to find the blog details
        $blogData = $logInObj->myBlogDetails();

        //here this function returns the auther details
        $personaldata = $logInObj-> mydetails($_SESSION['ID']);
        if($blogData) {
          foreach($blogData as $key => $value) {

            //display the picture of the auther
            $logInObj-> imageView($_SESSION['ID']);
            echo "<br>";
            foreach($personaldata as $key1 => $value1) {
              echo $value1['FirstName'] . " " . $value1['LastName'] . "<br>";
              echo "Title:" . " " . $value['Title'] . "<br>" . "<br>";?>
              <form action = "../Controller/test.php" method="POST" enctype="multipart/form-data">
                <input type = "hidden" name = "action" id = "action" value = "<?php echo $value['BlogId']; ?>">
                <input type = "submit" name = "View" id = "View" value = "View Post">
                <input type = "submit" name = "Edit" id = "Edit" value = "Edit Post">
                <input type = "submit" name = "Delete" id = "Delete" value = "Delete Post">
              </form>
            <?php 
            }
          }
        }?>
      </div>
    </div>
  </body>
</html>