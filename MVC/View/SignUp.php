<!DOCTYPE html>
<html>
  <head>
    <title>Sign up/Regester yourself</title>
    <link rel = "stylesheet" type = "text/css" href = "../Css/SignUpPageDesign.css">

  </head>
    <body>
      <div class = "Container">
        <div class = "Header">
          <hr></hr><p>REGESTER YOURSELF</p><hr></hr>
        </div>
          <div class = "Details">
            <form action = "" method = "POST" enctype = "multipart/form-data">
              <label> First Name: </label> <br>
              <input type = "text"  name = "FirstName" id = "FirstName" placeholder = "FIRST NAME" required><br><br>
              <label> Last Name: </label><br>
              <input type = "text"  name = "LastName" id = "LastName" placeholder = "LAST NAME" required><br><br>
              <label> Phone Number: </label><br>
              <input type = "number"  name = "PhoneNumber" id = "PhoneNumber" placeholder = "PHONE NUMBER" required><br><br>
              <label> Address: </label><br>
              <textarea type = "text"  name = "Address" id = "Address" placeholder = "ADDRESS" required></textarea><br><br>
              <label> Input your Email: </lable><br>
              <input type = "text" name = "Email" id = "Email" pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" placeholder = " EMAIL ADDRESS" required><br><br>
              <label> Input your passport size photograph: </lable><br><br>
              <input type = "file" name = "file"><br><br>
              <label> Ueser Name: </label><br>
              <input type = "text" name = "UserName" id = "UserName" placeholder = "USER NAME" required><br><br>
              <label> Password: </label><br>
              <input type = "password" name = "PassWord" id = "PassWord" placeholder = "PASSWORD" required><br><br>
              <label> Re-enter your Password: </label><br>
              <input type = "password" name = "RePassword" id = "RePassword" placeholder = "PASSWORD" required><br><br>
              <input type = "submit" name = "Regester" id = "Regester" value = "Regester" >
            </form>
            <?php
              include("../Controller/RegesterDataView.php");
            ?>
        </div>
        <div class = " Footer ">
          <hr></hr><p> !!!!!REGESTER YOURSELF FOR FREE,OFFER IS FOR SMALL TIME!!!!! </p><hr></hr>
        </div>      
    </body>    
</html>

