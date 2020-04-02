
  <html>
    <head>
      <title>Blog Page Website</title>
      <link rel = " stylesheet " type = " text/css " href = " ../Css/indexPageCss.css ">
    </head>
    <body>
      <div class = "container">
        <div class = "upper">
          <div class = " Header">
            <a href = "http://www.example.com/login"><button> Sign in </button></a>
            <a href = "http://www.example.com/signup"><button> Sign up </button></a>
          </div>
          <div class = "heading">
           <h1> WELCOME TO SUBHASREE BLOG WEBSITE</h1>
          </div>
        </div>
        <div class = "bodyContent">
          <?php 

          //object of blogaction class
          $logInObj = new Model\blogAction(); 

          //this function retrns the entire blog data
          $blogData = $logInObj->showBlogContent(); 
          foreach($blogData as $key => $value) { ?>
            <div class = "Content">
              <?php

              //this will view the auther image
              $logInObj -> imageView($value['PersonId']); 
              echo "<br>";

              //this will return the auther details
              $personaldata = $logInObj-> mydetails($value['PersonId']); 
              foreach($personaldata as $key1 => $value1) {
                echo $value1['FirstName']." ". $value1['LastName']."<br>" . "<br>";

                //here the blog image is showing
                $logInObj -> BlogImageView($value['BlogId']);
                echo "<b>" . "Title:" . "</b>" . "<br>"  . $value['Title'] .  "<br>";?>
                <form action = "http://www.example.com/fullContentShow" method = "POST">
                  <input type = "hidden" name = "fullContent" id = "fullContent" value = "<?php echo $value['BlogId']; ?>">
                  <input type = "hidden" name = "fname" id = "fname" value = "<?php echo $value1['FirstName']; ?>">
                  <input type = "hidden" name = "lname" id = "lname" value = "<?php echo $value1['LastName']; ?>">
                  <input type = "submit" name = "fcontent" id = "fcontent" value = "View Content">
                </form>
              <?php 
              }?>
            </div>
          <?php
          }?> 
        </div>
      </div>
    </body>
  </html>
              
  

    
