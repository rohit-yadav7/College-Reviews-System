<?php

 function setReviews($conn){
   if (isset($_POST['ReviewSubmit'])) {
    $uid=$_POST['uid'];
    $date=$_POST['date'];
    $message=$_POST['message'];
    $collegeName=$_POST['collegeName'];
    $sql="INSERT INTO reviews(uid,date,message,collegeName) VALUES('$uid',  '$date',  '$message','$collegeName')";
    $result=$conn->query($sql);
   }
 }

 function getReviews($conn){
   // $sql ="SELECT * FROM reviews";
   // $result=$conn->query($sql);
   // while ($row=$result->fetch_assoc()) {
   //   $uid=$row['uid'];
   //   $sql2 ="SELECT * FROM user WHERE uid='$uid'";
   //   $result2=$conn->query($sql2);
   //   if ($row2=$result2->fetch_assoc()) {
   //     if ($name==$row2['collegeName']) {
   //       echo "<div class='review-box'><p>";
   //       echo $row2['uname']."<br>";
   //       echo $row2['collegeName']."<br>";
   //       echo $row['date']."<br><br>";
   //       echo nl2br($row['message']);
   //       echo "</p>";
   //     }
   //
   //     if (isset($_SESSION['uid'])) {
   //       if ($_SESSION['uid']==$row2['uid']) {
   //         echo" <form class='delete-form' method='POST' action ='".deleteReview($conn)."' >
   //            <input type='hidden' name='rid' value='".$row['rid']."' >
   //            <button type='submit' name='ReviewDelete'>Delete</button>
   //          </form>
   //           <form class='edit-form' method='POST' action ='editReview.php' >
   //             <input type='hidden' name='rid' value='".$row['rid']."' >
   //             <input type='hidden' name='uid' value='".$row['uid']."' >
   //             <input type='hidden' name='date' value='".$row['date']."' >
   //             <input type='hidden' name='message' value='".$row['message']."' >
   //           <button  >Edit</button>
   //           </form>";
   //       }
   //     }
   //
   //    echo" </div>";
   //   }
   //
   // }
 }

 function editReview($conn){
   if (isset($_POST['editReview'])) {
    $rid=$_POST['rid'];
    $uname=$_POST['uname'];
    $date=$_POST['date'];
    $message=$_POST['message'];

    $sql="UPDATE reviews SET message='$message' WHERE rid='$rid' ";
    $result=$conn->query($sql);
    header("Location:colleges.php?name=$_GET[name]&picture=$_GET[picture]");
   }
 }
 function deleteReview($conn){
   if (isset($_POST['ReviewDelete'])) {
    $rid=$_POST['rid'];

    $sql="DELETE FROM reviews WHERE rid='$rid'";
    $result=$conn->query($sql);
    header("Location:colleges.php?name=$_GET[name]&picture=$_GET[picture]");
   }
 }
 function getLogin($conn){
   if (isset($_POST['loginSubmit'])) {
  $uname=$_POST['uname'];
  $pwd=$_POST['pwd'];
   $sql ="SELECT * FROM user WHERE uname='$uname' AND pwd='$pwd'";
   $result=$conn->query($sql);
   if (mysqli_num_rows($result)>0) {
     if ($row=$result->fetch_assoc()) {
       $_SESSION['uid'] =$row['uid'];
       $_SESSION['collegeName']=$row['collegeName'];

       header("Location:colleges.php?loginsuccess&name=$_GET[name]&picture=$_GET[picture]");
       exit();
     }
   }else {
     header("Location:colleges.php?loginfailed&name=$_GET[name]");
     exit();
   }
 }
}


 function userLogout(){
   if (isset($_POST['logoutSubmit'])) {
     session_start();
     session_destroy();
      header("Location:colleges.php?name=$_GET[name]&picture=$_GET[picture]");
      exit();
   }
 }
 function getSignUp1($conn){
   if (isset($_POST['signUpSubmit'])) {


       $uname=$_POST['uname'];


       $collegeName=$_POST['collegeName'];


       $pwd=$_POST['pwd'];

     $reg="insert into user(uname,pwd,collegeName)values('$uname','$pwd','$collegeName')";
     mysqli_query($conn,$reg);
     echo"Registration Successfull";
     sleep(5);
     header("Location:colleges.php?signupSuccess&name=$_GET[name]&picture=$_GET[picture]");
   }
  }



?>
