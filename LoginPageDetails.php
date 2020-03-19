<html>
<head>
  <title>The login page</title>
  <link rel="stylesheet" type="text/css" href="./LoginPageDesign.css">
</head>
<body>
  <div class="Container">
    <div class="Login">
      <p>LOG IN</p>
      <form action="./homePage.php" method="post">
        <label>Username:</label><br>
        <input type="text"  name="UserName" id="UserName" placeholder="USERNAME" pattern="[a-zA-Z]{1,}" required><br><br>
        <label>Password: </label><br>
        <input type="password" name="Password" id="Password" placeholder="PASSWORD" required><br><br>
        <input type="submit" name="LogIn" id="LogIn">
        
      </form>

    </div>
  </div>
</body>
</html>




