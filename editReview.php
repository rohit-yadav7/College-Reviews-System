<?php
date_default_timezone_set('Asia/Calcutta');
include 'dbh.inc.php';
include 'reviews.inc.php';
 ?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>edit review</title>
<link rel="stylesheet" type="text/css" href=" CSS/style.css" >

</head>

<body>

  <?php
  $rid=$_POST['rid'];
  $uid=$_POST['uid'];
  $date=$_POST['date'];
  $message=$_POST['message'];
  echo " <form method='POST' action='".editReview($conn)."'>
  <input type='hidden' name='rid' value='".$rid."'>
	<input type='hidden' name='uid' value='".$uid."'>
	<input type='hidden' name='date' value='".$date."'>
	<textarea name='message'>".$message."</textarea><br>
  <button type='submit' name='editReview'>Submit</button>
  </form>";

   ?>
 </body>
</html>
