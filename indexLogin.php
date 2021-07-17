<?php
date_default_timezone_set('Asia/Calcutta');
include 'dbh.inc.php';
include 'reviews.inc.php';
session_start();
 ?>
<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="styleLogin.css">
<body>
      <div class="loginbox">
      <img src="Images/avatar.png" class="avatar">
          <h1>Login Here</h1>
          <?php
          echo"<form method='POST' action='".getLogin($conn)."'>
              <p>Username</p>
              <input type='text' name='uname' placeholder='Enter Username'>
              <p>Password</p>
              <input type='password' name='pwd' placeholder='Enter Password'>

              <input type='submit' name='loginSubmit' value='LogIn'>
            <br>
              
          </form>";

          ?>
      </div>

</body>
</head>
</html>
