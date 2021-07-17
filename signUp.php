<?php
include 'dbh.inc.php';
session_start();
  if (isset($_POST['uname'])) {
    $uname=$_POST['uname'];
  }
  if (isset($_POST['collegeName'])) {
    $collegeName=$_POST['collegeName'];
  }
  if (isset($_POST['pwd'])) {
    $pwd=$_POST['pwd'];
  }
  $reg="insert into user(uname,pwd,collegeName)values('$uname','$pwd','$collegeName')";
  mysqli_query($conn,$reg);
  echo"Registration Successfull";
  sleep(1);
  header("Location:colleges.php?signupSuccess&name=$_GET[name]&picture=$_GET[picture]");
 ?>
