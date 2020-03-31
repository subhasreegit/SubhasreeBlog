<html>
<head>
  <title>The login page</title>
  <link rel = " stylesheet " type = " text/css " href = " ../Css/LoginPageDesign.css ">
</head>
<body>
  <div class = " Container ">
    <div class = "header">
      <h1> LOG IN WITH YOUR CREDENTIALS </h1>
    </div>
    <div class = " Login ">
      <p> LOG IN </p>
      <form action = "../Controller/homePage.php" method = "post">
        <label> Username: </label><br>
        <input type = "text"  name = "UserName" id = "UserName" placeholder = "USERNAME" required><br><br>
        <label> Password: </label><br>
        <input type = "password" name = "Password" id = "Password" placeholder = "PASSWORD" required><br><br>
        <input type = "submit" name = "LogIn" id = "LogIn" >
      </form>

    </div>
  </div>
</body>
</html>




