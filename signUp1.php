<?php
include 'dbh.inc.php';
include 'reviews.inc.php';
session_start();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>signUp page</title>
    <link rel="stylesheet" href="signUp.css">
  </head>
  <body>
        <?php
      echo"<form method='POST' action ='".getSignUp1($conn)."' style='border:1px solid #ccc'>

              <div class='container'>
              <h1>Sign Up</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>


              <label for='uname'><b>Username</b></label>
              <input type='text' placeholder='Enter Username' name='uname' required>

              <label for='collegeName'><b>collegeName</b></label>
              <input type='text' placeholder='Enter collegeName' name='collegeName' required>


              <label for='pwd'><b>Password</b></label>
              <input type='password' placeholder='Enter Password' name='pwd' required>

              <div class='clearfix'>
                <button type='button' class='cancelbtn'>Cancel</button>
                <button type='submit' name ='signUpSubmit' class='signupbtn'>Sign Up</button>
              </div>
              </div>
          </form>";
          ?>

  </body>
</html>
