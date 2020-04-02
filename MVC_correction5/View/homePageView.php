<?php
  session_start();
 
  if(isset($_SESSION['username'])){

  }
  else {
    header('Location:http://www.example.com/login');
  }

    // the obect of blogAction class
    $logInObj = new Model\blogAction();
     
    if(isset($_SESSION['username'])) {
      if(isset($_SESSION['password'])) {

        //checking the login details with databse
        $tempData = $logInObj -> LogInCheck($_SESSION['username'] ,$_SESSION['password']);

        if($tempData[1] != "NULL") {
          $_SESSION['ID'] = $tempData[1] ;

          //the detail blog contain is taken from this function
          $blogData = $logInObj -> showBlogContent(); 
          ?> 
          <html>
            <head>
              <title>After Log in</title>
              <link rel = "stylesheet" type = "text/css" href = "../Css/homePageCss.css ">
            </head>
            <body>
              <div class = "container">
                <div class = "Header">
                  <h1> WELCOME <?php echo $_SESSION ['username'];?></h1>
                  <a href = "http://www.example.com/myblog "><button> My Blog</button></a>
                  <a href = "http://www.example.com/logout "><button> Log out</button></a>
                </div>
                <div class = "fullbody">
                  <div class = "details">
                    <?php 

                      // returns the auther details
                      $temp = $logInObj->mydetails($_SESSION['ID']); 
                      foreach($temp as $key => $values) {
                        echo "<h1>" . " Personal Details " . "</h1>" . "<br>" . "<hr>" . "<br>";

                        //showing the auther image
                        $logInObj -> imageView($_SESSION['ID']); 
                        echo "<br>";
                        echo $values['FirstName'] . " " . $values["LastName"] . "<br>";
                        echo $values['Address'] . "<br>" . $values['PhoneNumber'] . "<br>" . $values["Email"] . "<br>" . "<br>";
                        echo "<hr>";
                      }?>
                  </div> 
                    
                    <?php  
                    foreach($blogData as $key => $value) {?>
                      <div class = "bodycontent" >
                        <?php

                        //shows the auther image
                        $logInObj-> imageView ($value['PersonId']);
                        echo "<br>";

                        //taking the auther details
                        $personaldata = $logInObj-> mydetails($value['PersonId']); 
                        foreach($personaldata as $key1 => $value1) {
                          echo $value1['FirstName'] . " " . $value1['LastName'] . "<br>" . "<br>";

                          //shows the blog image
                          $logInObj-> blogImageView ($value['BlogId']);
                          echo "<b>" . "Title:" . "</b>" ." ".$value['Title']."<br>";?>
                          <form action = "http://www.example.com/homePageBlogContent" method = "POST">
                            <input type = "hidden" name = "fullContent" id = "fullContent" value = "<?php echo $value['BlogId']; ?>">
                            <input type = "hidden" name = "fname" id = "fname" value = "<?php echo $value1['FirstName']; ?>">
                            <input type = "hidden" name = "lname" id = "lname" value = "<?php echo $value1['LastName']; ?>">
                            <input type = "submit" name = "fcontent" id = "fcontent" value = "View Content">
                          </form>
                          <?php 
                        }?>
                      </div>
                      <?php
                      }
                      ?> 
                      </div> 
                    </div>
              </div>
            </body>
          </html>
        <?php
        } 
        else {
          header("location:http://www.example.com/login");
        }  
      }
    }
    